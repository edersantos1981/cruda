$(document).ready(function () {

    document.getElementById('csvfile').addEventListener('change', upload, false);
    function upload(evt) {

        /*
         * Paso 1. Verificar extensión del archivo.
         */
        try {
            paso1_VerificaExtensionCsv();
        } catch (excepcion) {
            alert(excepcion.message);
            return false;
        }

        /*
         * Paso 2. Apertura del Archivo
         * @type FileReader
         */
        var archivo = evt.target.files[0];
        var reader = new FileReader();
        reader.readAsText(archivo);

        /*
         * Verificación Paso 2.
         * @returns {Boolean}
         */
        reader.onerror = function () {
            alert('Error al intentar abrir el archivo ' + archivo.fileName);
            return false;
        };

        /*
         * Paso 3. Parsing del archivo y actualización de la GUI.
         * 
         * @param {event} event
         * @returns {Boolean}
         */
        reader.onload = function (event) {

            /*
             * Paso 3.1. Parsing del Archivo CSV.
             * @type type
             */
            var data = Papa.parse(event.target.result, {header: true});
            var datos = data.data;
            var metadatos = data.meta;

            /*
             * Paso 3.1. Verificación de Encabezados.
             * @todo 09/05/2022 renombrar método y return.
             * @todo 09/05/2022 evaluar caso de encabezado único. El sistema IGUAL arroja error hoy, pero revisar el código para ver POR QUÉ.
             * 
             */
            try {
                paso3_1VerificaEncabezados(metadatos);
                paso3_2_1GuiActualizaTablaPreview(Object.keys(datos[0]), datos);
                paso3_2_2GuiActualizaSelectCampos(Object.keys(datos[0]));
                $('#rowPreview').show();
            } catch (excepcion) {
                alert(excepcion.message);
                return false;
            }

            // Tratamiento de Tabulador como delimitador
            var deli = (metadatos["delimiter"] == '\t') ? "tab" : metadatos["delimiter"];
            $('#delimitador').val(deli);

            // Registro de logs en consola para fines de debugging.
            // registraConsoleLog(datos, metadatos);

        };



    }

    /*
     * Paso 1. Verifica expresión regular de extensión de archivo CSV.
     * @type RegExp 
     */
    function paso1_VerificaExtensionCsv() {
        var regex = /(.csv)$/;
        if (!regex.test($("#csvfile").val().toLowerCase())) {
            throw new ExcepcionGui("ERROR\n\nPor favor elija un archivo en formato CSV.");
        }

    }

    /*
     * Detección de campos repetidos o campo único
     */
    function paso3_1VerificaEncabezados(metadatos) {

        if (metadatos["fields"].length !== metadatos["fields"].filter((e, i, a) => a.indexOf(e) === i).length) {
            throw new ExcepcionGui("ERROR\n\nSe han detectados nombres de campo repetidos en el archivo.");
        }
        return true;

    }

    /*
     * Actualiza la tabla de previsualización
     * @param {Array} camposArchivoCsv
     * @param {Array} filasArchivoCsv
     * @returns {void} 
     */
    function paso3_2_1GuiActualizaTablaPreview(camposArchivoCsv, filasArchivoCsv) {

        // Limpia carga previa
        var table = $("#csvtable > tbody");
        table.children().remove();

        // Carga de Encabezados
        var row = "<tr>";
        for (var i = 0; i < camposArchivoCsv.length; i++) {
            row += "<th>" + camposArchivoCsv[i] + "</th>";
        }
        row += "</tr>";
        table.append(row);

        // Carga de Datos / Filas
        var totalFilasPreview = 12;
        for (var i = 0; i < (filasArchivoCsv.length > totalFilasPreview ? totalFilasPreview : filasArchivoCsv.length); i++) {
            if (filasArchivoCsv[i] != "") {
                row = "<tr>";
                for (var j = 0; j < Object.values(filasArchivoCsv[i]).length; j++) {
                    var cols = "<td>" + Object.values(filasArchivoCsv[i])[j] + "</td>";
                    row += cols;
                }
                row += "</tr>";
                table.append(row);
            }
        }

    }

    /*
     * 
     * Actualiza la selección de campos archivo csv X campos bd 
     * Remueve eventuales campos cargados en archivos previos
     * Añade campos "Seleccione" por defecto
     * Añade campos obtenidos en los metadatos del CSV
     * 
     * @param {Array} camposArchivoCsv
     * @returns {void}
     */
    function paso3_2_2GuiActualizaSelectCampos(camposArchivoCsv) {

        // 1. Limpieza de selects previamente cargados y carga de array de Constantes / valores predeterminados.
        $('.selectPreview').children().remove();
        var arrayPrecargaCamposSelect = cargaArrayCamposSelect();

        // 2. Carga de opciones "Elija"
        $('.selectPreview').append('<option value="">Elija</option>');

        // 3. Carga de opciones
        $('.selectPreview').each(function (i, obj) {
            for (var j = 0; j < camposArchivoCsv.length; j++) {
                var campoEncontrado = null;
                // Este if verifica que el campo se encuentre entre los predeterminados.
                // @todo 09/05/2022 Renombrar superrArray.
                if (camposArchivoCsv[j] in arrayPrecargaCamposSelect) {
                    // Este if verifica preselecciona el campo en el select caso este coincida con la columna del CSV.
                    // Ejemplo 1: Cuando se encuentre un campo CARRERAS en el CSV y se esté preseleccionando el selectCarrera.
                    // Ejemplo 2: Cuando se encuentre un campo SUPLENTE1 en el CSV y se esté preseleccionando el SelectSuplente1.
                    campoEncontrado = (arrayPrecargaCamposSelect[camposArchivoCsv[j]] == obj.id) ? " selected " : null;
                }
                $('#' + obj.id).append('<option value="' + parseInt(j + 1) + '"' + campoEncontrado + '>' + camposArchivoCsv[j] + '</option>');

            }
        });

    }

    /*
     * Crea array predeterminado de posibles campos CSV.
     * @returns {Array|previewCSV_L2.cargaArrayCamposSelect.arrayCamposSelect}
     */
    function cargaArrayCamposSelect() {

        var arrayCamposSelect = new Array();
        arrayCamposSelect["CARRERA"] = "selectCarrera";
        arrayCamposSelect["CARRERAS"] = "selectCarrera";
        arrayCamposSelect["ASIGNATURAS"] = "selectAsignatura";
        arrayCamposSelect["ASIGNATURA"] = "selectAsignatura";
        arrayCamposSelect["PRESIDENTE"] = "selectPresidente";
        arrayCamposSelect["VOCAL 1"] = "selectVocal1";
        arrayCamposSelect["VOCAL1"] = "selectVocal1";
        arrayCamposSelect["VOCAL 2"] = "selectVocal2";
        arrayCamposSelect["VOCAL2"] = "selectVocal2";
        arrayCamposSelect["SUPLENTE1"] = "selectSuplente1";
        arrayCamposSelect["SUPLENTE 1"] = "selectSuplente1";
        arrayCamposSelect["SUPLENTE2"] = "selectSuplente2";
        arrayCamposSelect["SUPLENTE 2"] = "selectSuplente2";
        arrayCamposSelect["SUPLENTE3"] = "selectSuplente3";
        arrayCamposSelect["SUPLENTE 3"] = "selectSuplente3";
        arrayCamposSelect["1 llamado"] = "selectFecha1";
        arrayCamposSelect["1   llamado"] = "selectFecha1";
        arrayCamposSelect["HORA"] = "selectHora1";
        arrayCamposSelect["2 llamado"] = "selectFecha2";
        arrayCamposSelect["2   llamado"] = "selectFecha2";

        return arrayCamposSelect;
    }

    function registraConsoleLog(datos, metadatos) {

        //                console.log("Data : ", datos);
        //                /*
        //                 
        console.log("Metadatos : ", metadatos);
        console.log("Delimitador : ", metadatos.delimiter);
        //                 console.log("Salto de linea: ", metadatos["linebreak"]);
        //                 console.log("Campos Método 1 : ", metadatos["fields"]);
        //                 
        //                 // Este método NO SIRVE pues no repite encabezados iguales (ejemplo: dos columnas con el nombre SUPLENTE).
        console.log("Campos Método 2: ", Object.keys(datos[0]));
        //                 console.log("Ejemplo de Entrada : ", Object.entries(datos[0]));
        //                console.log("Ejemplo de Valores : ", Object.entries(datos[0]));
        //                console.log("Ejemplo de Valores : ", Object.entries(datos[1]));
        //                */
        //                console.log(datos[0]);
        //                console.log(datos[1]);

    }

    /*
     * Emula las clases de tipo Exception.
     * Es totalmente desestructurado.
     */
    function ExcepcionGui(mensaje_) {
        this.message = mensaje_;
    }

});
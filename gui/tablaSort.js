$(document).ready(function () {
    $('#csvtable').DataTable({
        "pageLength": 10,
        "aaSorting": [],
        columnDefs: [{
            //orderable: false
            orderable: false,
            targets: columnasSinSort
        }],
        
        dom: 'Bfrtip',
        buttons: [
            //            'copy', 'csv', 'excel', 'pdf', 'print',
            {
                extend: 'print',
                text: 'Imprimir (Alt+P)',
                key: {
                    key: 'p',
                    altKey: true
                }
/*            },
            {
                extend: 'excel',
                text: 'Exportar a Excel (Alt+X)',
                key: {
                    key: 'x',
                    altKey: true
                },
            },
            {
                extend: 'pdf',
                text: 'Exportar a PDF'
            },
            {
                extend: 'copy',
                text: 'Copiar en Portapeles (Alt+C)',
                key: {
                    key: 'c',
                    altKey: true
                }*/
            }

        ],
        
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
    });
    $('.dataTables_length').addClass('bs-select');
});
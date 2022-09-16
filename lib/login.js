/*
 * 
Implementación SSO Google

Posibles estados:
1) Varias cuentas Google logueadas
- Abre index y permite elegir cuenta. If cuenta == @uarg OK, else alert

2) Ninguna cuenta logueada
- Abre index y permite loguear.

3) Una sola cuenta.
Verifica dominio. If cuenta == @uarg la toma. Else alert error, abrir el sitio de Google.
 *
 **/
function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    var url = '../Vista/subida.php';

    /*
     * Modificación específica para esta aplicación.
     * Desactiva el filtro de correos institucionales.
     * 
    if (profile.getEmail().indexOf("@uarg.unpa.edu.ar", profile.getEmail().length - "@uarg.unpa.edu.ar".length) === -1) {
        alert("Por favor elija un correo institucional (@uarg.unpa.edu.ar)");
        window.open('http://www.gmail.com/', "Gmail");
        return null;
    }
    */

    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
//    alert(profile.getName());
    $.redirectPost(url, {"email": profile.getEmail(), "nombre": profile.getName(), "imagen": profile.getImageUrl(), "googleid": profile.getId()});
}

// jquery extend function
$.extend(
        {
            redirectPost: function (location, args)
            {
                var form = $('<form></form>');
                form.attr("method", "post");
                form.attr("action", location);

                $.each(args, function (key, value) {
                    var field = $('<input></input>');

                    field.attr("type", "hidden");
                    field.attr("name", key);
                    field.attr("value", value);

                    form.append(field);
                });
                $(form).appendTo('body').submit();
            }
        });

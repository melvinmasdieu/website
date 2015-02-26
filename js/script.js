$(document).ready(function () {

    //CONNEXION
    $('#login-form').on('submit', function (e) {
        e.preventDefault();

        var login = $('#login').val();
        var password = $('#password').val();
        $.ajax({
            url: ,
            type: 'POST',
            data: {
                name: name,
                mail: mail,
                role: role
            },
            success: function (response) {

            }
        });
    });

    //DÉCONNEXION
    $('#login-form').on('submit', function (e) {
        e.preventDefault();

        var login = $('#login').val();
        var password = $('#password').val();
        $.ajax({
            url: ,
            type: 'POST',
            data: {
                name: name,
                mail: mail,
                role: role
            },
            success: function (response) {

            }
        });
    });

});

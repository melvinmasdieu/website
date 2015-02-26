$(document).ready(function () {

    //CONNEXION
    $('#login-form').on('submit', function (e) {
        e.preventDefault();

        var login = $('#login').val();
        var password = $('#password').val();
        $.ajax({
            url: '/lib/connexion.php',
            type: 'POST',
            data: {
                'login': login,
                'password': password
            },
            success: function (response) {

            }
        });
    });

    //DÉCONNEXION
    function deconnexion() {

        $.ajax({
            url: '/lib/deconnexion.php',
            type: 'POST',
            data: {

            },
            success: function (response) {

            }
        });
    }

});

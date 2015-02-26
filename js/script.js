$(document).ready(function () {

    //CONNEXION
    $('#login-form').on('submit', function (e) {
        e.preventDefault();
        var login = $('#login').val();
        var password = $('#password').val();
        $.ajax({
            url: '/index.php',
            type: 'POST',
            data: {
                'action': 'connection',
                'login': login,
                'password': password
            },
            success: function (response) {
                alert(response);
                var href = $('#details-user');
                href.text('deconnexion');
                href.attr('href', "onclick='deconnexion()'");
                href.attr('alt', 'deconnexion');
            }
        });
    });

    //DECONNEXION
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

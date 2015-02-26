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
            success: function (data) {
                if(data == 1) {
                    $.ajax({
                        url: '/index.php',
                        type: 'POST',
                        data: {
                            'action': 'load',
                            'pageId': 4
                        },
                        success: function (response) {
                            document.getElementById('content').innerHTML = response;
                            var href = $('#details-user');
                            href.text('deconnexion');
                            href.attr('href', "onclick='deconnexion()'");
                            href.attr('alt', 'deconnexion');
                        }
                    });
                }
                else {
                    $.noty.defaults = {
                        layout: 'BottomRight',
                        theme: 'relax', // or 'relax'
                        type: 'warning',
                        text: 'Erreur de connexion, login ou mot de passe incorrect !',
                        timeout: 500
                    };
                }
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

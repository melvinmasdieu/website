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
                if(data == "1") {
                    $.ajax({
                        url: '/index.php',
                        type: 'POST',
                        data: {
                            'action': 'load',
                            'pageId': 4
                        },
                        success: function (response) {
                            $('#content').html(response);
                            var href = $('#signout');
                            href.attr('onclick', "deconnexion()");
                        }
                    });
                }
                else {
                    /*noty({
                        layout: 'bottomRight',
                        theme: 'relax', // or 'relax'
                        type: 'warning',
                        text: 'Erreur de connexion, login ou mot de passe incorrect !',
                        timeout: 500
                    });*/
                    alert("Erreur de connexion.");
                }
            }
        });
    });

    //DECONNEXION
    function deconnexion() {

        $.ajax({
            url: '/index.php',
                        type: 'POST',
                        data: {
                            'action': 'load',
                            'pageId': 5
            },
            success: function (response) {
                            $('#content').html(response);                            
                            var href = $('#signin');
                            href.attr('onclick', "inscription()"); //Passer par 2 boutons séparés pour inscription/déconnexion
                        }
                    });
    }

    function inscription() {

        $.ajax({
            url: '/index.php',
            type: 'POST',
            data: {
                'action': 'load',
                'pageId': 6
            },
            success: function (response) {
                $('#content').html(response);                            
                var href = $('#signout');
                href.attr('onclick', "deconnexion()"); //Passer par 2 boutons séparés pour inscription/déconnexion
            }
        });
    }

});

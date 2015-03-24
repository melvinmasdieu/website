!function() {
    $(function () {
       'use strict';

        var handler = {

            init : function(tools) {

                this.load = {
                    header                  : 1,
                    footer                  : 2,
                    login                   : 3,
                    confirm_connect         : 4,
                    confirm_disconnect      : 5,
                    sign_up                 : 6,
                    top_menu_connected      : 7,
                    top_menu_disconnected   : 8,
                    sign_up_confirm         : 9
                };
                this.gui = {
                    header                  : $('#header'),
                    content                 : $('#content')
                };
                this.buttons = {
                    login_form              : $('#login-form'),
                    sign_up_form            : $('#sign-up-form'),
                    sign_up                 : $('#signup'),
                    sign_out                : $('#signout')
                };
                this.inputs = {
                    name                    : $('#name'),
                    email                   : $('#email'),
                    login                   : $('#login'),
                    password                : $('#password')

                };

                this.event(tools)

            },

            event : function(tools) {

                this.buttons.login_form.on('submit', function () {
                    tools.connection();
                });

                this.buttons.sign_up_form.on('submit', function() {
                    tools.register();
                });

                this.buttons.sign_up.on('keypress', function (e) {
                    if (e.which == 13) {
                        tools.sign_up();
                    }
                });

                this.buttons.sign_up.on('click', function () {
                    tools.sign_up();
                });

                this.buttons.sign_out.on('keypress', function (e) {
                    if (e.which == 13) {
                        tools.disconnection();
                    }
                });

                this.buttons.sign_out.on('click', function () {
                    tools.disconnection();
                });

            }

        };

        var tools = {

            connection : function() {
                $.ajax({
                    url: '/index.php',
                    type: 'POST',
                    data: {
                        'action': 'connection',
                        'login': handler.inputs.login.val(),
                        'password': handler.inputs.password.val()
                    },
                    success: function (data) {
                        if (data == "1") {
                            tools.show_content(handler.load.confirm_connect);
                            tools.show_header(handler.load.top_menu_connected);
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
            },

            show_content : function(load_number) {
                $.ajax({
                    url: '/index.php',
                    type: 'POST',
                    data: {
                        'action': 'load',
                        'pageId': load_number
                    },
                    success: function (response) {
                        handler.gui.content.html(response);
                    }
                });
            },

            show_header : function(load_number) {
                $.ajax({
                    url: '/index.php',
                    type: 'POST',
                    data: {
                        'action': 'load',
                        'pageId': load_number
                    },
                    success: function (response) {
                        handler.gui.header.html(response);
                    }
                });
            },

            disconnection : function() {
                tools.show_content(handler.load.confirm_disconnect);
                tools.show_header(handler.load.top_menu_disconnected);
            },

            sign_up : function() {
                tools.show_content(handler.load.sign_up);
            },

            register : function() {
                $.ajax({
                    url: '/index.php',
                    type: 'POST',
                    data: {
                        'action': 'signup',
                        'login': handler.inputs.login.val(),
                        'password': handler.inputs.password.val(),
                        'email': handler.inputs.email.val()
                    },
                    success: function (data) {
                        if(data == "1") {
                            alert("inscription ok");
                            tools.show_content(handler.load.sign_up_confirm);
                        } else {
                            alert("problème à l'inscription !");
                        }
                    }
                });
            }

        };

        handler.init(tools);

    });

}();

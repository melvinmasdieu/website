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
                    sign_up_confirm         : 9,
                    page_pathologie         : 10
                };
                this.gui = {
                    header                  : $('#header'),
                    content                 : $('#content'),
                    pathologies             : $('#pathologies')

                };
                this.buttons = {
                    accueil                 : $('#accueil'),
                    login_form              : $('#login-form'),
                    sign_up_form            : $('#sign-up-form'),
                    sign_up                 : $('#signup'),
                    sign_out                : $('#signout'),
                    patho                   : $('#patho')
                };
                this.inputs = {
                    name                    : $('#name'),
                    email                   : $('#email'),
                    login                   : $('#login'),
                    login_password          : $('#login-password'),
                    signup_password         : $('#signup-password')
                };

                this.event(tools);

            },

            event : function(tools) {

                this.buttons.accueil.on('click', function () {
                   tools.accueil();
                });

                this.buttons.patho.on('click', function () {
                   tools.patho_page();
                });

                this.buttons.login_form.on('click', function () {
                    tools.connection();
                });

                this.inputs.login_password.on('keypress', function (e) {
                    if (e.which == 13) {
                        tools.connection();
                    }
                });

                this.buttons.sign_up_form.on('click', function() {
                    tools.register();
                });

                this.inputs.signup_password.on('keypress', function (e) {
                    if (e.which == 13) {
                        tools.register();
                    }
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
                        'password': handler.inputs.login_password.val()
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
                        handler.init(tools);
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
                        handler.init(tools);
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
                        'email': handler.inputs.email.val(),
                        'password': handler.inputs.signup_password.val()
                    },
                    success: function (data) {
                        if(data == "1") {
                            alert("inscription ok");
                            tools.show_content(handler.load.sign_up_confirm);
                        } else {
                            alert(data);
                        }
                    }
                });
            },

            accueil : function() {
                location.reload();
            },

            patho_page : function() {
                tools.show_content(handler.load.page_pathologie);
                tools.get_patho();
            },

            get_patho : function() {
                $.ajax({
                    url:'index.php',
                    type: 'POST',
                    data: {
                        'action': 'pathologies'
                    },
                    success: function (data) {
                        handler.gui.pathologies.html(data);
                    }
                });
            }

        };

        handler.init(tools);

    });

}();

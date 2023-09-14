hdApp = angular.module('MetronicApp', ['uiSwitch']);
/* Setup blank page controller */
hdApp.controller('ContactUsController', ['$rootScope', '$scope', 'settings', '$http', function ($rootScope, $scope, settings, $http) {
        $scope.$on('$viewContentLoaded', function () {
            // initialize core components
            App.initAjax();

            // set default layout mode
            $rootScope.settings.layout.pageContentWhite = true;
            $rootScope.settings.layout.pageBodySolid = false;
            $rootScope.settings.layout.pageSidebarClosed = false;
            //Login Check
            $rootScope.checkLogin = function () {
                $http({
                    url: 'admin_login_check',
                    method: 'get'
                }).then(function (response) {
                    if (response.data == 0) {
                        window.location.href = 'admin';
                    }
                });
            };
            $rootScope.checkLogin();



            $rootScope.getAllContactUs = function () {
                $http({
                    url: 'get_all_contact_us',
                    method: 'get',
                    dataType: 'jsonp'
                }).then(function (response) {
                    if (response.data) {
                        $scope.contactus = response.data;

                    }

                });
            };
            $rootScope.getAllContactUs();

            //Edit Holiday Function
            $scope.editContactUs = function (contact_us_id) {
                $rootScope.edit_contact_us_id = contact_us_id;
                window.location.href = 'admin_dashboard#/edit_contact_us';
            };


        });
    }]);

hdApp.controller('AddContactUsController', ['$rootScope', '$scope', 'settings', '$http', function ($rootScope, $scope, settings, $http) {
        $scope.$on('$viewContentLoaded', function () {
            // initialize core components
            App.initAjax();

            // set default layout mode
            $rootScope.settings.layout.pageContentWhite = true;
            $rootScope.settings.layout.pageBodySolid = false;
            $rootScope.settings.layout.pageSidebarClosed = false;

            //Login Check
            $rootScope.checkLogin = function () {
                $http({
                    url: 'admin_login_check',
                    method: 'get'
                }).then(function (response) {
                    if (response.data == 0) {
                        window.location.href = 'admin';
                    }
                });
            };
            $rootScope.checkLogin();




            //form submit function - Add Faq
            $scope.submit = function (isValid) {
                // remove the tooltip 
                $rootScope.removeToolTip();
                if (isValid) {
                    $('#submit').attr('disabled', 'disabled');
                    $(".pageloader").show();
                    $http({
                        url: 'save_contact_us',
                        method: 'POST',
                        data: {address: $scope.address, email: $scope.email, phone: $scope.phone, admin_email: $scope.admin_email, sending_email: $scope.sending_email, sending_email_password: $scope.sending_email_password, sender_name: $scope.sender_name, mail_host: $scope.mail_host, port: $scope.port, map: $scope.map}
                    }).then(function (response) {
                        $('#submit').attr('disabled', false);
                        $(".pageloader").hide();
                        var msg = "";
                        if (response.data == 1) {
                            setTimeout(function () {
                                msg = "Contact Us saved successfully";
                                swal("Success!", msg, "success");
                            }, 10);
                            setTimeout(function () {
                                window.location.href = 'admin_dashboard#/contact_us';
                            }, 1000);
                        } else if (response.data == 2) {
                            msg = "Session expired, please login";
                            swal("Error!", msg, "error");
                            window.location.href = 'admin';
                        } else {
                            msg = "Something went wrong, please try again later";
                            swal("Error!", msg, "error");
                        }
                    });
                } else {
                    var error = $scope.add_contact_us.$error;
                    angular.forEach(error.required, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;
                            var msg = fieldName + " required";
                            $("#" + fieldName).addClass('has-error');
                            $("#" + fieldName).focus();
                            $rootScope.setToolTip(fieldName, msg);
                        }
                    });
                    angular.forEach(error.email, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;
                            var msg = "Enter valid email";
                            $("#" + fieldName).addClass('has-error');
                            $("#" + fieldName).focus();
                            $rootScope.setToolTip(fieldName, msg);
                        }
                    });
                }
            };

            $scope.goback = function () {
                window.history.back();
            };



            //Set tooltip for error message
            $rootScope.setToolTip = function (fieldName, msg) {
                $("#" + fieldName).attr("data-toggle", "tooltip");
                $("#" + fieldName).attr("data-placement", "bottom");
                $("#" + fieldName).attr("data-original-title", msg);
                $('[data-toggle="tooltip"]').tooltip();
            };
            //Remove tooltip for error message
            $rootScope.removeToolTip = function () {
                $(":input").attr("data-toggle", "");
                $(":input").attr("data-placement", "");
                $(":input").attr("data-original-title", "");
            };

            //keyup function to remove the error classes
            $(":input").keyup(function () {
                $(this).removeClass('has-error');
            });
            $(":input").click(function () {
                $(this).removeClass('has-error');
            });

        });
    }]);

hdApp.controller('EditContactUsController', ['$rootScope', '$scope', 'settings', '$http', function ($rootScope, $scope, settings, $http) {
        $scope.$on('$viewContentLoaded', function () {
            // initialize core components
            App.initAjax();

            // set default layout mode
            $rootScope.settings.layout.pageContentWhite = true;
            $rootScope.settings.layout.pageBodySolid = false;
            $rootScope.settings.layout.pageSidebarClosed = false;

            //Login Check
            $rootScope.checkLogin = function () {
                $http({
                    url: 'admin_login_check',
                    method: 'get'
                }).then(function (response) {
                    if (response.data == 0) {
                        window.location.href = 'admin';
                    }
                });
            };
            $rootScope.checkLogin();


            if ($rootScope.edit_contact_us_id) {
                $scope.edit_id = $rootScope.edit_contact_us_id;
                localStorage.setItem('edit_id', $scope.edit_id);
            } else {
                $scope.edit_id = localStorage.getItem('edit_id');
            }



            // Get particular Contact Us
            $rootScope.getContactUs = function () {
                if ($scope.edit_id) {
                    $http({
                        url: 'get_contact_us',
                        method: 'get',
                        params: {id: $scope.edit_id}
                    }).then(function (response) {
                        if (response.data) {
                            $scope.showroom_address = response.data.showroom_address;
                            $scope.factory_address = response.data.factory_address;
                            $scope.email = response.data.email;
                            $scope.phone = response.data.phone;
                            $scope.mobile = response.data.mobile;
                            $scope.fax = response.data.fax;

                        }

                    });
                }
            };
            $rootScope.getContactUs();

            //form submit function - Edit Services Category
            $scope.edit = function (isValid) {

                // remove the tooltip 
                $rootScope.removeToolTip();
                if (isValid) {
                    $('#submit').attr('disabled', 'disabled');
                    $(".pageloader").show();
                    $http({
                        url: 'edit_contact_us',
                        method: 'POST',
                        data: {id: $scope.edit_id, showroom_address: $scope.showroom_address, factory_address: $scope.factory_address, email: $scope.email, phone: $scope.phone, mobile: $scope.mobile, fax: $scope.fax}
                    }).then(function (response) {
                        $('#submit').attr('disabled', false);
                        $(".pageloader").hide();
                        var msg = "";
                        if (response.data == 1) {
                            setTimeout(function () {
                                msg = "Contact Us updated successfully";
                                swal("Success!", msg, "success");
                            }, 10);
                            setTimeout(function () {
                                window.location.href = 'admin_dashboard#/contact_us';
                            }, 1000);
                        } else if (response.data == 2) {
                            msg = "Session expired, please login";
                            swal("Error!", msg, "error");
                            window.location.href = 'admin';
                        } else {
                            msg = "Something went wrong, please try again later";
                            swal("Error!", msg, "error");
                        }
                    });
                } else {

                    var error = $scope.edit_contact_us.$error;
                    angular.forEach(error.required, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;
                            var msg = fieldName + " required";
                            $("#" + fieldName).addClass('has-error');
                            $("#" + fieldName).focus();
                            $rootScope.setToolTip(fieldName, msg);
                        }
                    });
                    angular.forEach(error.email, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;
                            var msg = "Enter valid email";
                            $("#" + fieldName).addClass('has-error');
                            $("#" + fieldName).focus();
                            $rootScope.setToolTip(fieldName, msg);
                        }
                    });
                }
            };

            //Get Active Switch Values
            $rootScope.switchValues = function (value) {
                if (value) {
                    return 1;
                }
                return 0;
            };

            $scope.goback = function () {
                window.history.back();
            };

            //Set tooltip for error message
            $rootScope.setToolTip = function (fieldName, msg) {
                $("#" + fieldName).attr("data-toggle", "tooltip");
                $("#" + fieldName).attr("data-placement", "bottom");
                $("#" + fieldName).attr("data-original-title", msg);
                $('[data-toggle="tooltip"]').tooltip();
            };
            //Remove tooltip for error message
            $rootScope.removeToolTip = function () {
                $(":input").attr("data-toggle", "");
                $(":input").attr("data-placement", "");
                $(":input").attr("data-original-title", "");
            };

            //keyup function to remove the error classes
            $(":input").keyup(function () {
                $(this).removeClass('has-error');
            });
            $(":input").click(function () {
                $(this).removeClass('has-error');
            });

        });
    }])
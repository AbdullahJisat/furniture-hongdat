
var titanApp = angular.module('MetronicApp', ['uiSwitch']);
/* Setup blank page controller */
titanApp.controller('UsersController', ['$rootScope', '$scope', 'settings', '$http', function ($rootScope, $scope, settings, $http) {
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






            $rootScope.getAllUsers = function () {
                $http({
                    url: 'get_all_users',
                    method: 'get',
                    dataType: 'jsonp'
                }).then(function (response) {
                    if (response.data) {
                        $scope.users = response.data;
                    }

                });
            };
            $rootScope.getAllUsers();


            //Edit Category function
            $scope.editUser = function (user_id) {
                $rootScope.edit_user_id = user_id;
                window.location.href = 'admin_dashboard#/edit_user';
            };


        });
    }]);


titanApp.controller('AddUserController', ['$rootScope', '$scope', 'settings', '$http', function ($rootScope, $scope, settings, $http) {
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



            //form submit function - Add user
            $scope.submit = function (isValid) {
                // remove the tooltip 
                $rootScope.removeToolTip();
                if (isValid) {
                    //Validate the password

                    if (!($scope.password).match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/)) {
                        var fieldName = "password";
                        var msg = "Password should contain atleast one number,one lower case and one upper case character";
                        $("#" + fieldName).addClass('has-error');
                        $rootScope.setToolTip(fieldName, msg);
                        return false;
                    }

                    $(".pageloader").show();
                    $('#submit').attr('disabled', 'disabled');
                    //send request
                    $http({
                        url: 'save_user',
                        method: 'POST',
                        data: {employee_id: $scope.employee_id, name: $scope.user_name, email: $scope.email, mobile: $scope.mobile, password: $scope.password, active: "1"}
                    }).then(function (response) {
                        $('#submit').attr('disabled', false);
                        $(".pageloader").hide();
                        var msg = "";
                        if (response.data == 1) {
                            setTimeout(function () {
                                msg = "User saved successfully";
                                swal("Success!", msg, "success");
                            }, 10);
                            setTimeout(function () {
                                window.location.href = 'admin_dashboard#/users';
                            }, 1000);
                        } else if (response.data == 2) {
                            msg = "Session expired, please login";
                            swal("Error!", msg, "error");
                            window.location.href = 'admin';
                        } else if (response.data == 3) {
                            msg = "User already exists";
                            swal("Error!", msg, "error");
                            $scope.employee_id = "";
                            $("#employee_id").addClass('has-error');
                            var feild_name = "employee_id";
                            $rootScope.setToolTip(feild_name, msg);
                        } else {
                            msg = "Something went wrong, please try again later";
                            swal("Error!", msg, "error");
                        }

                    });
                } else {
                    var error = $scope.add_user.$error;
                    angular.forEach(error.required, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;
                            var msg = fieldName + " required";
                            $("#" + fieldName).addClass('has-error');
                            $rootScope.setToolTip(fieldName, msg);
                        }
                    });
                    angular.forEach(error.email, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;
                            var msg = "Enter valid email";
                            $("#" + fieldName).addClass('has-error');
                            $rootScope.setToolTip(fieldName, msg);
                        }
                    });
                    angular.forEach(error.minlength, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;
                            var msg = "Enter minimum 3 characters";
                            $("#" + fieldName).addClass('has-error');
                            $rootScope.setToolTip(fieldName, msg);
                        }
                    });

                }
            };




            $scope.goback = function () {
                window.history.back();
            };
            //Get Active Switch Values
            $rootScope.switchValues = function (value) {
                if (value) {
                    return 1;
                }
                return 0;
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

            $("#generate").click(function () {
                $scope.password = $rootScope.setGenerateCode(10);
                $scope.$apply();
            });

            $rootScope.setGenerateCode = function (length) {
                var result = '';
                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                var charactersLength = characters.length;
                for (var i = 0; i < length; i++) {
                    result += characters.charAt(Math.floor(Math.random() * charactersLength));
                }
                return result;
            };

            //Password Icon
            $("#eye").click(function () {
                $scope.show_password = false;
                $scope.$apply();
                $("#password").prop("type", "text");
            });
            $("#eye-slash").click(function () {
                $scope.show_password = true;
                $scope.$apply();
                $("#password").prop("type", "password");
            });
        });
    }]);


titanApp.controller('EditUserController', ['$rootScope', '$scope', 'settings', '$http', function ($rootScope, $scope, settings, $http) {
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


            if ($rootScope.edit_user_id) {
                $scope.edit_id = $rootScope.edit_user_id;
                localStorage.setItem('edit_id', $scope.edit_id);
            } else {
                $scope.edit_id = localStorage.getItem('edit_id');
            }

            // Get particular Services Category
            $rootScope.getUser = function () {
                if ($scope.edit_id) {
                    $http({
                        url: 'get_user',
                        method: 'get',
                        params: {id: $scope.edit_id}
                    }).then(function (response) {
                        if (response.data) {
                            $scope.edit_user_name = response.data.name;
                            $scope.edit_employee_id = response.data.employee_id;
                            $scope.edit_password = response.data.password;
                            $scope.edit_email = response.data.email;
                            $scope.edit_mobile = response.data.mobile;
                            $scope.edit_active = response.data.active;
                        }

                    });
                }
            };
            $rootScope.getUser();

            //form submit function - Edit Services Category
            $scope.edit = function (isValid) {
                // remove the tooltip 
                $rootScope.removeToolTip();
                if (isValid) {
                    //Validate the password
                    if (typeof $scope.password !== "undefined") {
                        if (!($scope.password).match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/)) {
                            var fieldName = "password";
                            var msg = "Password should contain atleast one number,one lower case and one upper case character";
                            $("#" + fieldName).addClass('has-error');
                            $rootScope.setToolTip(fieldName, msg);
                            return false;
                        }
                    }
                    $('#submit').attr('disabled', 'disabled');
                    $(".pageloader").show();
                    //Send request
                    $http({
                        url: 'edit_user',
                        method: 'POST',
                        data: {id: $scope.edit_id, employee_id: $scope.edit_employee_id, name: $scope.edit_user_name, email: $scope.edit_email, mobile: $scope.edit_mobile, password: $scope.password, active: $rootScope.switchValues($scope.edit_active)}
                    }).then(function (response) {
                        $('#submit').attr('disabled', false);
                        $(".pageloader").hide();
                        var msg = "";
                        if (response.data == 1) {
                            setTimeout(function () {
                                msg = "User updated successfully";
                                swal("Success!", msg, "success");
                            }, 10);
                            setTimeout(function () {
                                window.location.href = 'admin_dashboard#/users';
                            }, 1000);
                        } else if (response.data == 2) {
                            msg = "Session expired, please login";
                            swal("Error!", msg, "error");
                            window.location.href = '/admin';
                        } else if (response.data == 3) {
                            msg = "User already exists";
                            swal("Error!", msg, "error");
                            $("#employee_id").addClass('has-error');
                            var feild_name = "employee_id";
                            $rootScope.setToolTip(feild_name, msg);
                        } else {
                            msg = "Something went wrong, please try again later";
                            swal("Error!", msg, "error");
                        }
                    });
                } else {
                    var error = $scope.edit_user.$error;
                    angular.forEach(error.required, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;
                            var msg = fieldName + " required";
                            $("#" + fieldName).addClass('has-error');
                            $rootScope.setToolTip(fieldName, msg);
                        }
                    });
                    angular.forEach(error.email, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;
                            var msg = "Enter valid email";
                            $("#" + fieldName).addClass('has-error');
                            $rootScope.setToolTip(fieldName, msg);
                        }
                    });
                    angular.forEach(error.minlength, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;
                            var msg = "Enter minimum 3 characters";
                            $("#" + fieldName).addClass('has-error');
                            $rootScope.setToolTip(fieldName, msg);
                        }
                    });
                }
            };

            $scope.showPasswordEdit = function () {
                if (!$scope.show_edit_password) {
                    $scope.show_edit_password = true;
                } else {
                    $scope.show_edit_password = false;
                }
            };

            $scope.goback = function () {
                window.history.back();
            };
            //Get Active Switch Values
            $rootScope.switchValues = function (value) {
                if (value) {
                    return 1;
                }
                return 0;
            };


            //Edit Password Validations
            $rootScope.editPasswordValidations = function (status, password, confirm_password) {
                if (status) {
                    if (angular.element('#edit_new_password').length || angular.element('#edit_confirm_password').length) {
                        if (password !== confirm_password) {
                            return false;
                        }
                    }
                }

                return true;
            };

            //watch function on confirm password
            $scope.$watch('edit_confirm_password', function (newval, oldval) {
                if ($scope.edit_new_password !== newval) {
                    $("#edit_confirm_password").addClass('has-error');
                } else {
                    $("#edit_confirm_password").removeClass('has-error');
                }

            });
            //watch function on password
            $scope.$watch('edit_new_password', function (newval, oldval) {
                if ($scope.edit_confirm_password === newval) {
                    $("#edit_confirm_password").removeClass('has-error');
                }

            });

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

            $("#generate").click(function () {
                $scope.password = $rootScope.setGenerateCode(10);
                $scope.$apply();
            });

            $rootScope.setGenerateCode = function (length) {
                var result = '';
                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                var charactersLength = characters.length;
                for (var i = 0; i < length; i++) {
                    result += characters.charAt(Math.floor(Math.random() * charactersLength));
                }
                return result;
            };

            //Password Icon
            $("#eye").click(function () {
                $scope.show_password = false;
                $scope.$apply();
                $("#password").prop("type", "text");
            });
            $("#eye-slash").click(function () {
                $scope.show_password = true;
                $scope.$apply();
                $("#password").prop("type", "password");
            });

        });
    }]);


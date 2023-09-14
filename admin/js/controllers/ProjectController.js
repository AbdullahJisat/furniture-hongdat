TitanApp = angular.module('MetronicApp', ['uiSwitch']);
/* Setup blank page controller */
TitanApp.controller('ProjectController', ['$rootScope', '$scope', 'settings', '$http', function ($rootScope, $scope, settings, $http) {
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



            $rootScope.getAllProjects = function () {
                $http({
                    url: 'get_all_project',
                    method: 'get',
                    dataType: 'jsonp'
                }).then(function (response) {
                    if (response.data) {
                        $scope.projects = response.data;

                    }

                });
            };
            $rootScope.getAllProjects();

            //Edit Image Slider Function
            $scope.editProject = function (project_id) {
                $rootScope.edit_project = project_id;
                window.location.href = 'admin_dashboard#/edit_project';
            };



        });
    }]);

TitanApp.controller('AddProjectController', ['$rootScope', '$scope', 'settings', '$http', function ($rootScope, $scope, settings, $http) {
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
                    var gen_set_form = document.getElementById('add_slider');
                    var fData = new FormData(gen_set_form);
                    $http({
                        url: 'save_project',
                        method: 'POST',
                        data: fData,
                        transformRequest: angular.identity,
                        headers: {'Content-Type': undefined}
                    }).then(function (response) {
                        $('#submit').attr('disabled', false);
                        $(".pageloader").hide();
                        var msg = "";
                        if (response.data == 1) {
                            setTimeout(function () {
                                msg = "Project saved successfully";
                                swal("Success!", msg, "success");
                            }, 10);
                            setTimeout(function () {
                                window.location.href = 'admin_dashboard#/project';
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
                    var error = $scope.add_slider.$error;
                    angular.forEach(error.required, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;
                            var msg = fieldName + " required";
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

TitanApp.controller('EditProjectController', ['$rootScope', '$scope', 'settings', '$http', function ($rootScope, $scope, settings, $http) {
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


            if ($rootScope.edit_project_id) {
                $scope.edit_id = $rootScope.edit_project_id;
                localStorage.setItem('edit_id', $scope.edit_id);
            } else {
                $scope.edit_id = localStorage.getItem('edit_id');
            }



            // Get particular Holiday
            $rootScope.getSlider = function () {
                if ($scope.edit_id) {
                    $http({
                        url: 'get_project',
                        method: 'get',
                        params: {id: $scope.edit_id}
                    }).then(function (response) {
                        if (response.data) {
                            $scope.edit_title = response.data.title;
                            $scope.edit_description = response.data.description;
                            $scope.edit_button_text = response.data.button_text;
                            $scope.edit_button_url = response.data.url;
                            $scope.edit_active = response.data.active;
                            $scope.edit_image = response.data.image_path;
                        }

                    });
                }
            };
            $rootScope.getSlider();

            //form submit function - Edit Slider
            $scope.edit = function (isValid) {

                // remove the tooltip 
                $rootScope.removeToolTip();
                if (isValid) {
                    var gen_set_form = document.getElementById('edit_slider');
                    var fData = new FormData(gen_set_form);
                    fData.append('id', $scope.edit_id);
                    fData.append('active', $rootScope.switchValues($scope.edit_active));
                    $('#submit').attr('disabled', 'disabled');
                    $(".pageloader").show();
                    $http({
                        url: 'edit_slider',
                        method: 'POST',
                        data: fData,
                        transformRequest: angular.identity,
                        headers: {'Content-Type': undefined}
                    }).then(function (response) {

                        $('#submit').attr('disabled', false);
                        $(".pageloader").hide();
                        var msg = "";
                        if (response.data == 1) {
                            setTimeout(function () {
                                msg = "Image Slider updated successfully";
                                swal("Success!", msg, "success");
                            }, 10);
                            setTimeout(function () {
                                window.location.href = 'admin_dashboard#/image_slider';
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

                    var error = $scope.edit_slider.$error;
                    angular.forEach(error.required, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;
                            var msg = fieldName + " required";
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

            $scope.show_edit_image = false;
            $scope.showImageEdit = function () {
                if (!$scope.show_edit_image) {
                    $scope.show_edit_image = true;
                } else {
                    $scope.show_edit_image = false;
                }
            };

        });
    }])
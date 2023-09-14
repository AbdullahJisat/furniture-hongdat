hdnzApp = angular.module('MetronicApp', ['uiSwitch']);
/* Setup blank page controller */
hdnzApp.controller('TestimonialController', ['$rootScope', '$scope', 'settings', '$http', function ($rootScope, $scope, settings, $http) {
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



            $rootScope.getAllTestimonials = function () {
                $http({
                    url: 'get_all_testimonial',
                    method: 'get',
                    dataType: 'jsonp'
                }).then(function (response) {
                    if (response.data) {
                        $scope.testimonials = response.data;

                    }

                });
            };
            $rootScope.getAllTestimonials();

            //Edit Image Slider Function
            $scope.editTestimonial = function (testimonial_id) {
                $rootScope.edit_testimonial_id = testimonial_id;
                window.location.href = 'admin_dashboard#/edit_testimonial';
            };



        });
    }]);

hdnzApp.controller('AddTestimonialController', ['$rootScope', '$scope', 'settings', '$http', function ($rootScope, $scope, settings, $http) {
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

            $('#date').datepicker({

                format: 'yyyy-mm-dd',
                todayHighlight: true
            });


            $('.summernote').summernote({
                callbacks: {
                    onImageUpload: function (files, editor, welEditable) {

                        sendFile(files[0], editor, welEditable);

                    }
                }

            });

            //form submit function - Add Faq
            $scope.submit = function (isValid) {

                // remove the tooltip 
                $rootScope.removeToolTip();
                if (isValid) {

                    var content_description = $('.summernote').summernote('code');

                    $('#submit').attr('disabled', 'disabled');
                    $(".pageloader").show();

                    var gen_set_form = document.getElementById('add_testimonial');
                    var fData = new FormData(gen_set_form);
                    fData.append('content_description', content_description);
                    $http({
                        url: 'save_testimonial',
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
                                msg = "Testimonial saved successfully";
                                swal("Success!", msg, "success");
                            }, 10);
                            setTimeout(function () {
                                window.location.href = 'admin_dashboard#/testimonials';
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
                    var error = $scope.add_testimonial.$error;
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

hdnzApp.controller('EditTestimonialController', ['$rootScope', '$scope', 'settings', '$http', function ($rootScope, $scope, settings, $http) {
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


            if ($rootScope.edit_testimonial_id) {
                $scope.edit_id = $rootScope.edit_testimonial_id;
                localStorage.setItem('edit_id', $scope.edit_id);
            } else {
                $scope.edit_id = localStorage.getItem('edit_id');
            }

            $('#date').datepicker({

                format: 'yyyy-mm-dd',
                todayHighlight: true
            });


            $('.summernote').summernote({
                callbacks: {
                    onImageUpload: function (files, editor, welEditable) {

                        sendFile(files[0], editor, welEditable);

                    }
                }

            });

            // Get particular Testimonial
            $rootScope.getTestimonial = function () {
                if ($scope.edit_id) {
                    $http({
                        url: 'get_testimonial',
                        method: 'get',
                        params: {id: $scope.edit_id}
                    }).then(function (response) {
                        if (response.data) {
                            $scope.title = response.data.title;
                            $scope.date = response.data.date;
                            $scope.platform = response.data.platform;
                            $scope.edit_image = response.data.image_path;
                            $('.summernote').summernote('code', response.data.description);

                            $scope.edit_active = response.data.active;
                            $scope.slug = response.data.slug;
                            $scope.old_slug = response.data.slug;
                        }

                    });
                }
            };
            $rootScope.getTestimonial();

            //form submit function - Edit Slider
            $scope.edit = function (isValid) {

                // remove the tooltip 
                $rootScope.removeToolTip();
                if (isValid) {

                    var slug_change = 0;
                    if ($scope.old_slug != $scope.slug) {
                        slug_change = 1;
                    }


                    var content_description = $('.summernote').summernote('code');
                    var gen_set_form = document.getElementById('edit_testimonial');
                    var fData = new FormData(gen_set_form);
                    fData.append('id', $scope.edit_id);
                    fData.append('active', $rootScope.switchValues($scope.edit_active));
                    fData.append('content_description', content_description);
                    fData.append('slug_change', slug_change);
                    fData.append('old_slug', $.trim($scope.old_slug));
                    $('#submit').attr('disabled', 'disabled');
                    $(".pageloader").show();
                    $http({
                        url: 'edit_testimonial',
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
                                msg = "testimonial updated successfully";
                                swal("Success!", msg, "success");
                            }, 10);
                            setTimeout(function () {
                                window.location.href = 'admin_dashboard#/testimonials';
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

                    var error = $scope.edit_testimonial.$error;
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



        });
    }]);
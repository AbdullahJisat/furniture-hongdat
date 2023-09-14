hdApp = angular.module('MetronicApp', ['uiSwitch']);
/* Setup blank page controller */
hdApp.controller('CareerController', ['$rootScope', '$scope', 'settings', '$http', function ($rootScope, $scope, settings, $http) {
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



            $rootScope.getAllCareer = function () {
                $http({
                    url: 'get_all_career',
                    method: 'get',
                    dataType: 'jsonp'
                }).then(function (response) {
                    if (response.data) {
                        $scope.careers = response.data;

                    }

                });
            };
            $rootScope.getAllCareer();

            //Edit Blog Function
            $scope.editCareer = function (career_id) {
                $rootScope.edit_career_id = career_id;
                window.location.href = 'admin_dashboard#/edit_career';
            };

            $scope.printExcel = function () {
                var table = document.getElementById("print_table");
                var csvString = '';
                for (var i = 0; i < table.rows.length; i++) {
                    var rowData = table.rows[i].cells;
                    for (var j = 0; j < rowData.length; j++) {
                        var str = rowData[j].innerText;
                        str = str.replace(/,/g, " ");
                        str = str.replace(/\n/g, " ");
                        str = str.replace(/\r/g, " ");
                        csvString = csvString + str + ",";
                    }
                    csvString = csvString.substring(0, csvString.length - 1);
                    csvString = csvString + "\n";
                }
                csvString = csvString.substring(0, csvString.length - 1);
                var a = $('<a/>', {
                    style: 'display:none',
                    href: 'data:application/octet-stream;base64,' + btoa(csvString),
                    download: 'Blogs.csv'
                }).appendTo('body');
                a[0].click();
                a.remove();
            };

        });
    }]);

hdApp.controller('AddCareerController', ['$rootScope', '$scope', 'settings', '$http', function ($rootScope, $scope, settings, $http) {
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

            $('.summernote').summernote({
                callbacks: {
                    onImageUpload: function (files, editor, welEditable) {

                        sendFile(files[0], editor, welEditable);

                    }
                }

            });

            $('#expiry_date').datepicker({
                startDate: new Date(),
                format: 'yyyy-mm-dd',
                todayHighlight: true
            });

            //form submit function - Add Faq
            $scope.submit = function (isValid) {

                // remove the tooltip 
                $rootScope.removeToolTip();
                if (isValid) {

                    var blog_description = $('.summernote').summernote('code');
                    if (blog_description == "") {
                        $("#description").addClass('has-error');
                        $("#description").focus();
                        return false;
                    }



                    $('#submit').attr('disabled', 'disabled');
                    $(".pageloader").show();
                    var gen_set_form = document.getElementById('add_career');
                    var fData = new FormData(gen_set_form);
                    fData.append('description', blog_description);
                    $http({
                        url: 'save_career',
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
                                msg = "Career saved successfully";
                                swal("Success!", msg, "success");
                            }, 10);
                            setTimeout(function () {
                                window.location.href = 'admin_dashboard#/career';
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
                    var error = $scope.add_career.$error;
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
//            $('#blog_image').change(function () {
//                var file = $(this)[0].files[0];
//                img = new Image();
//                var imgwidth = 0;
//                var imgheight = 0;
//                var minwidth = 1000;
//                img.src = URL.createObjectURL(file);
//                img.onload = function () {
//                    imgwidth = this.width;
//                    imgheight = this.height;
//
//                    if (imgwidth < minwidth) {
//                        alert("Incorrect Image Size, please select a image with the size of (1155*680)");
//                        setTimeout(function () {
//                            $("#blog_image").val("");
//                        }, 500);
//                    } else {
//                        var ratio = (imgwidth / imgheight);
//                        if (ratio < 1.6 || ratio > 1.8) {
//                            alert("Incorrect Image Size, please select a image with the size of (1155*680)");
//                            setTimeout(function () {
//                                $("#blog_image").val("");
//                            }, 500);
//                        }
//                    }
//
//                };
//            });



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
        }
        );
    }
]);

hdApp.controller('EditCareerController', ['$rootScope', '$scope', 'settings', '$http', function ($rootScope, $scope, settings, $http) {
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


            if ($rootScope.edit_career_id) {
                $scope.edit_id = $rootScope.edit_career_id;
                localStorage.setItem('edit_id', $scope.edit_id);
            } else {
                $scope.edit_id = localStorage.getItem('edit_id');
            }


            $('.summernote').summernote({
                height: 200


            });

            $('#edit_expiry_date').datepicker({
                startDate: new Date(),
                format: 'yyyy-mm-dd',
                todayHighlight: true
            });


            // Get particular Holiday
            $rootScope.getCareer = function () {
                if ($scope.edit_id) {
                    $http({
                        url: 'get_career',
                        method: 'get',
                        params: {id: $scope.edit_id}
                    }).then(function (response) {
                        if (response.data) {
                            $scope.edit_position = response.data.position;
                            $('.summernote').summernote('code', response.data.description);
                            $scope.edit_email = response.data.application_email;
                            $scope.edit_expiry_date = response.data.expiry_date;

                            $scope.edit_active = response.data.active;

                        }

                    });
                }
            };
            $rootScope.getCareer();

            //form submit function - Edit Slider
            $scope.edit = function (isValid) {

                // remove the tooltip 
                $rootScope.removeToolTip();
                if (isValid) {
                    var blog_description = $('.summernote').summernote('code');
                    if (blog_description == "") {
                        $("#description").addClass('has-error');
                        $("#description").focus();
                        return false;
                    }



                    var gen_set_form = document.getElementById('edit_career');
                    var fData = new FormData(gen_set_form);
                    fData.append('id', $scope.edit_id);
                    fData.append('edit_description', blog_description);
                    fData.append('active', $rootScope.switchValues($scope.edit_active));
                    $('#submit').attr('disabled', 'disabled');
                    $(".pageloader").show();
                    $http({
                        url: 'edit_career',
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
                                msg = "Career updated successfully";
                                swal("Success!", msg, "success");
                            }, 10);
                            setTimeout(function () {
                                window.location.href = 'admin_dashboard#/career';
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

                    var error = $scope.edit_career.$error;
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
                    $("#edit_blog_image").val("");
                }
            };

//            $('#edit_blog_image').change(function () {
//                var file = $(this)[0].files[0];
//                img = new Image();
//                var imgwidth = 0;
//                var imgheight = 0;
//                var minwidth = 1000;
//                img.src = URL.createObjectURL(file);
//                img.onload = function () {
//                    imgwidth = this.width;
//                    imgheight = this.height;
//
//                    if (imgwidth < minwidth) {
//                        alert("Incorrect Image Size, please select a image with the size of (1155*680)");
//                        setTimeout(function () {
//                            $("#edit_blog_image").val("");
//                        }, 500);
//                    } else {
//                        var ratio = (imgwidth / imgheight);
//                        if (ratio < 1.6 || ratio > 1.8) {
//                            alert("Incorrect Image Size, please select a image with the size of (1155*680)");
//                            setTimeout(function () {
//                                $("#edit_blog_image").val("");
//                            }, 500);
//                        }
//                    }
//
//
//                };
//            });

        });
    }])
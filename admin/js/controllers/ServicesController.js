hdApp = angular.module('MetronicApp', ['uiSwitch']);
/* Setup blank page controller */
hdApp.controller('ServicesController', ['$rootScope', '$scope', 'settings', '$http', function ($rootScope, $scope, settings, $http) {
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
            //Access Level Check 
            $scope.show_add_edit_access = false;
            $http({
                url: 'user_access',
                method: 'get'
            }).then(function (response) {
                if (response.data) {
                    angular.forEach(response.data, function (value, key) {
                        if (value.menu_id == 6) {
                            if (value.add_edit_access == 1) {
                                $scope.show_add_edit_access = true;
                            }

                        }
                    });

                }
            });

            $rootScope.getActiveServicesCategory = function () {
                $http({
                    url: 'get_all_services_category',
                    method: 'get',
                    dataType: 'jsonp'
                }).then(function (response) {
                    if (response.data) {
                        $scope.categories = response.data;
                    }

                });
            };
            $rootScope.getActiveServicesCategory();


            $rootScope.getAllServices = function () {
                $http({
                    url: 'get_all_services',
                    method: 'get',
                    dataType: 'jsonp'
                }).then(function (response) {
                    if (response.data) {
                        $scope.services = response.data;

                    }

                });
            };
            $rootScope.getAllServices();

            //Edit  function
            $scope.editService = function (service_id) {
                $rootScope.edit_service_id = service_id;
                window.location.href = 'admin_dashboard#/edit_services';
            };

            //Delete Services
            $scope.deleteService = function ($event, service_id) {
                $http({
                    url: 'delete_service',
                    method: 'post',
                    params: {id: service_id},
                    dataType: 'jsonp'
                }).then(function (response) {
                    var msg = "";
                    if (response.data == 1) {
                        setTimeout(function () {
                            msg = "Service deleted successfully";
                            swal("Success!", msg, "success");
                        }, 10);
                        setTimeout(function () {
                            window.location.reload();
                            //   $route.reload();
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
                $event.stopPropagation();
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
                    download: 'Services.csv'
                }).appendTo('body');
                a[0].click();
                a.remove();
            };

        });
    }]);

hdApp.controller('AddServicesController', ['$rootScope', '$scope', 'settings', '$http', function ($rootScope, $scope, settings, $http) {
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

            //get Active Service
            $rootScope.getActiveServicesCategory = function () {
                $http({
                    url: 'get_active_services_category',
                    method: 'get',
                    dataType: 'jsonp'
                }).then(function (response) {
                    if (response.data) {
                        $scope.categories = response.data;
                    }

                });
            };
            $rootScope.getActiveServicesCategory();


            //form submit function - Add services 
            $scope.submit = function (isValid) {
                // remove the tooltip 
                $rootScope.removeToolTip();
                if (isValid) {

                    if ($("#price").val() != "") {
                        if (!$("#price").val().match(/^(\d+(?:[\.\,]\d{2})?)$/)) {
                            $("#price").addClass('has-error');
                            return false;
                        }
                    }
                    if ($("#service_image").val() == "") {
                        var msg = "Incorrect Image size";
                        $("#service_image").addClass('has-error');
                        $rootScope.setToolTip("service_image", msg);
                        return false;
                    }

                    var file_size = $('#service_image')[0].files[0].size;
                    if (file_size > 1048576) {
                        var msg = "Image should be less than 1MB";
                        $("#service_image").addClass('has-error');
                        $rootScope.setToolTip("service_image", msg);
                        return false;
                    }

                    var gen_set_form = document.getElementById('add_service');
                    var fData = new FormData(gen_set_form);
                    fData.append('active', 1);
                    $('#submit').attr('disabled', 'disabled');
                    $(".pageloader").show();
                    $http({
                        url: 'save_services',
                        method: 'POST',
                        data: fData,
                        transformRequest: angular.identity,
                        headers: {'Content-Type': undefined}
                        // params: {name: $scope.services_name, services_category_id: $scope.services_category.id, duration: $scope.services_duration, active: "1"}
                    }).then(function (response) {
                        $('#submit').attr('disabled', false);
                        $(".pageloader").hide();
                        var msg = "";
                        if (response.data == 1) {
                            setTimeout(function () {
                                msg = "Service saved successfully";
                                swal("Success!", msg, "success");
                            }, 10);
                            setTimeout(function () {
                                window.location.href = 'admin_dashboard#/services';
                            }, 1000);
                        } else if (response.data == 2) {
                            msg = "Session expired, please login";
                            swal("Error!", msg, "error");
                            window.location.href = 'admin';
                        } else if (response.data == 3) {
                            msg = "Service already exists";
                            swal("Error!", msg, "error");
                            $scope.services_name = "";
                            $("#services_name").addClass('has-error');
                            var fieldName = "services_name";
                            $rootScope.setToolTip(fieldName, msg);
                        } else if (response.data == 4) {
                            msg = "Sorry, cannot add the service because same service exists for 10 times";
                            swal("Error!", msg, "error");
                            $scope.services_name = "";
                            $("#services_name").addClass('has-error');
                            var fieldName = "services_name";
                            $rootScope.setToolTip(fieldName, msg);
                        } else {
                            msg = "Something went wrong, please try again later";
                            swal("Error!", msg, "error");
                        }

                    });
                } else {
                    var error = $scope.add_service.$error;
                    angular.forEach(error.required, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;
                            var msg = fieldName + " required";
                            $("#" + fieldName).addClass('has-error');
                            $rootScope.setToolTip(fieldName, msg);
                        }
                    });
                }
            };

            // Active Switch Call back function
            $scope.changeCallback = function () {
                if (!$scope.edit_services_active) {
                    $scope.reactive_date_time = "";
                    $scope.show_reactive_time = true;
                } else {
                    $scope.show_reactive_time = false;
                }
            };

            $('#service_image').change(function () {
                var file = $(this)[0].files[0];
                img = new Image();
                var imgwidth = 0;
                var imgheight = 0;
                var minwidth = 360;
                img.src = URL.createObjectURL(file);
                img.onload = function () {
                    imgwidth = this.width;
                    imgheight = this.height;

                    if (imgwidth < minwidth) {
                        alert("Incorrect Image Size, please select a image with the size of (370*370)");
                        setTimeout(function () {
                            $("#service_image").val("");
                        }, 500);
                    } else {
                        var ratio = (imgwidth / imgheight);
                        if (ratio < 0.95 || ratio > 1.05) {
                            alert("Incorrect Image Size, please select a image with the size of (370*370)");
                            setTimeout(function () {
                                $("#service_image").val("");
                            }, 500);
                        }
                    }
                };
            });



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

            $('#price').keyup(function () {
                this.value = this.value.replace(/[^0-9\.]/g, '');
            });
            $('#services_duration').keyup(function () {
                this.value = this.value.replace(/[^0-9\.]/g, '');
            });
        });
    }]);

hdApp.controller('EditServicesController', ['$rootScope', '$scope', 'settings', '$http', function ($rootScope, $scope, settings, $http) {
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


            if ($rootScope.edit_service_id) {
                $scope.edit_id = $rootScope.edit_service_id;
                localStorage.setItem('edit_id', $scope.edit_id);
            } else {
                $scope.edit_id = localStorage.getItem('edit_id');
            }

            $rootScope.getActiveServicesCategory = function () {
                $http({
                    url: 'get_all_services_category',
                    method: 'get',
                    dataType: 'jsonp'
                }).then(function (response) {
                    if (response.data) {
                        $scope.categories = response.data;
                    }

                });
            };
            $rootScope.getActiveServicesCategory();

            $scope.show_reactive_time = false;
            if ($('#reactive_div').length) {
                $('#reactive_date_time').datetimepicker({
                    startDate: new Date()
                });
            }


            // Get particular Services 
            $rootScope.getServices = function () {
                if ($scope.edit_id) {
                    $http({
                        url: 'get_services',
                        method: 'get',
                        params: {id: $scope.edit_id}
                    }).then(function (response) {
                        if (response.data) {
                            $scope.edit_services_name = response.data.name;
                            $scope.edit_services_id = response.data.id;
                            //  $scope.edit_services_category = response.data.service_category;
                            setTimeout(function () {
                                $("#edit_services_category").val(response.data.category_id);

                            }, 500);
                            $scope.edit_services_category_val = response.data.category_id;
                            $scope.edit_services_duration = response.data.duration;
                            $scope.edit_services_active = response.data.active;
                            $scope.reactive_date_time = response.data.active_date_time;
                            if (!$scope.edit_services_active) {
                                $scope.show_reactive_time = true;
                            }
                            $scope.edit_services_description = response.data.description;
                            $scope.edit_services_price = response.data.price;
                            $scope.edit_services_image = response.data.image_path;
                            $scope.slug = response.data.slug;
                            $scope.old_slug = response.data.slug;
                            // $scope.edit_services_buy_now = response.data.buy_now;
                        }

                    });
                }
            };
            $rootScope.getServices();

            //form submit function - Edit Services 
            $scope.edit = function (isValid) {
                // remove the tooltip 
                $rootScope.removeToolTip();
                if (isValid) {
                    //Price check for buynow

                    if ($("#edit_services_price").val() != "") {
                        if (!$("#edit_services_price").val().match(/^(\d+(?:[\.\,]\d{2})?)$/)) {
                            $("#edit_services_price").addClass('has-error');
                            return false;
                        }
                    }

                    //Check for reactive time empty
                    var active_time = "";
                    if ($scope.show_reactive_time) {
                        if ($scope.service_reactive_status) {
                            if (!$scope.reactive_date_time) {
                                $("#reactive_date_time").addClass('has-error');
                                return false;
                            } else {
                                active_time = $scope.reactive_date_time;
                            }
                        } else {
                            if ($scope.reactive_date_time) {
                                active_time = $scope.reactive_date_time;
                            }
                        }
                    }

                    if ($scope.show_edit_image) {
                        if ($("#edit_services_image_path").val() == "") {
                            var msg = "Incorrect Image size";
                            $("#edit_services_image_path").addClass('has-error');
                            $rootScope.setToolTip("edit_services_image_path", msg);
                            return false;
                        }
                        var file_size = $('#edit_services_image_path')[0].files[0].size;
                        if (file_size > 1048576) {
                            var msg = "Image should be less than 1MB";
                            $("#edit_services_image_path").addClass('has-error');
                            $rootScope.setToolTip("edit_services_image_path", msg);
                            return false;
                        }
                    }

                    var slug_change = 0;
                    if ($scope.old_slug != $scope.slug) {
                        slug_change = 1;
                    }

                    var gen_set_form = document.getElementById('edit_service');
                    var fData = new FormData(gen_set_form);
                    fData.append('id', $scope.edit_id);
                    fData.append('name', $scope.edit_services_name);
                    fData.append('services_category_id', $("#edit_services_category").val());
                    fData.append('duration', $scope.edit_services_duration);
                    fData.append('active', $rootScope.switchValues($scope.edit_services_active));
                    fData.append('active_time', active_time);
                    fData.append('slug_change', slug_change);
                    fData.append('old_slug', $.trim($scope.old_slug));
                    $('#submit').attr('disabled', 'disabled');
                    $(".pageloader").show();
                    $http({
                        url: 'edit_services',
                        method: 'POST',
                        data: fData,
                        transformRequest: angular.identity,
                        headers: {'Content-Type': undefined}
                        // params: {id: $scope.edit_services_id, name: $scope.edit_services_name, services_category_id: $("#edit_services_category").val(), duration: $scope.edit_services_duration, active: $rootScope.switchValues($scope.edit_services_active), active_time: active_time}
                    }).then(function (response) {
                        $('#submit').attr('disabled', false);
                        $(".pageloader").hide();
                        var msg = "";
                        if (response.data == 1) {
                            setTimeout(function () {
                                msg = "Service updated successfully";
                                swal("Success!", msg, "success");
                            }, 10);
                            setTimeout(function () {
                                window.location.href = 'admin_dashboard#/services';
                            }, 1000);
                        } else if (response.data == 2) {
                            msg = "Session expired, please login";
                            swal("Error!", msg, "error");
                            window.location.href = 'admin';
                        } else if (response.data == 3) {
                            msg = "Service already exists";
                            swal("Error!", msg, "error");
                            $("#edit_services_name").addClass('has-error');
                            var fieldName = "edit_services_name";
                            $rootScope.setToolTip(fieldName, msg);
                        } else if (response.data == 4) {
                            msg = "Failed to deativate the service due to some orders have assaigned to this service.";
                            swal("Error!", msg, "error");
                        } else if (response.data == 5) {
                            msg = "Slug already available, please change it.";
                            swal("Error!", msg, "error");
                        } else if (response.data == 6) {
                            msg = "Sorry, cannot add the service because same service exists for 10 times";
                            swal("Error!", msg, "error");
                            window.location.href = 'admin';
                        } else {
                            msg = "Something went wrong, please try again later";
                            swal("Error!", msg, "error");
                        }

                    });
                } else {
                    var error = $scope.edit_service.$error;
                    angular.forEach(error.required, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;
                            var msg = fieldName + " required";
                            $("#" + fieldName).addClass('has-error');
                            $rootScope.setToolTip(fieldName, msg);
                        }
                    });
                }
            };


            // Active Switch Call back function
            $scope.changeCallback = function () {
                if (!$scope.edit_services_active) {
                    $scope.reactive_date_time = "";
                    $scope.show_reactive_time = true;
                } else {
                    $scope.show_reactive_time = false;
                }
            };

            $('#edit_services_image_path').change(function () {
                var file = $(this)[0].files[0];
                img = new Image();
                var imgwidth = 0;
                var imgheight = 0;
                var maxwidth = 360;
                img.src = URL.createObjectURL(file);
                img.onload = function () {
                    imgwidth = this.width;
                    imgheight = this.height;
                    if (imgwidth < maxwidth) {
                        alert("Incorrect Image Size, please select a image with the size of (370*370)");
                        setTimeout(function () {
                            $("#edit_services_image_path").val("");
                        }, 500);
                    } else {
                        var ratio = (imgwidth / imgheight);
                        if (ratio < 0.95 || ratio > 1.05) {
                            alert("Incorrect Image Size, please select a image with the size of (370*370)");
                            setTimeout(function () {
                                $("#edit_services_image_path").val("");
                            }, 500);
                        }
                    }

                };
            });

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


            //Delete Services
            $scope.deleteService = function ($event) {
                if ($scope.edit_id) {
                    $http({
                        url: 'delete_service',
                        method: 'post',
                        params: {id: $scope.edit_id},
                        dataType: 'jsonp'
                    }).then(function (response) {
                        var msg = "";
                        if (response.data == 1) {
                            setTimeout(function () {
                                msg = "Service deleted successfully";
                                swal("Success!", msg, "success");
                            }, 10);
                            setTimeout(function () {
                                window.location.href = 'admin_dashboard#/services';
                                //   $route.reload();
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
                    $event.stopPropagation();
                }
            };

            //Set tooltip for error message
            $rootScope.setToolTip = function (fieldName, msg) {
                $("#" + fieldName).attr("data-placement", "bottom");
                $("#" + fieldName).attr("data-toggle", "tooltip");
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

            $('#edit_services_price').keyup(function () {
                this.value = this.value.replace(/[^0-9\.]/g, '');
            });

            $('#edit_services_duration').keyup(function () {
                this.value = this.value.replace(/[^0-9\.]/g, '');
            });

            $scope.show_edit_image = false;
            $scope.showImageEdit = function () {
                if (!$scope.show_edit_image) {
                    $scope.show_edit_image = true;
                } else {
                    $scope.show_edit_image = false;
                    $("#edit_services_image_path").val("");
                }
            };
        });
    }]);

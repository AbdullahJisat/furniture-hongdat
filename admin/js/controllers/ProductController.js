adapp = angular.module("MetronicApp", ["uiSwitch"]);
/* Setup blank page controller */
adapp.controller("Category", [
    "$rootScope",
    "$scope",
    "settings",
    "$http",
    function ($rootScope, $scope, settings, $http) {
        $scope.$on("$viewContentLoaded", function () {
            // initialize core components
            App.initAjax();
            // set default layout mode
            $rootScope.settings.layout.pageContentWhite = true;
            $rootScope.settings.layout.pageBodySolid = false;
            $rootScope.settings.layout.pageSidebarClosed = false;
            //Login Check
            $rootScope.checkLogin = function () {
                $http({
                    url: "admin_login_check",
                    method: "get",
                }).then(function (response) {
                    if (response.data == 0) {
                        window.location.href = "admin";
                    }
                });
            };
            $rootScope.checkLogin();

            $rootScope.getAllCategory = function () {
                $http({
                    url: "get_all_category",
                    method: "get",
                    dataType: "jsonp",
                }).then(function (response) {
                    if (response.data) {
                        $scope.categories = response.data;
                        console.log($scope.categories);
                    }
                });
            };
            $rootScope.getAllCategory();
            //Edit Category function
            $scope.editCategory = function (category_id) {
                $rootScope.edit_category_id = category_id;
                window.location.href = "admin_dashboard#/edit_category";
            };
        });
    },
]);

adapp.controller("AddCategory", [
    "$rootScope",
    "$scope",
    "settings",
    "$http",
    function ($rootScope, $scope, settings, $http) {
        $scope.$on("$viewContentLoaded", function () {
            // initialize core components
            App.initAjax();
            // set default layout mode
            $rootScope.settings.layout.pageContentWhite = true;
            $rootScope.settings.layout.pageBodySolid = false;
            $rootScope.settings.layout.pageSidebarClosed = false;
            //Login Check
            $rootScope.checkLogin = function () {
                $http({
                    url: "admin_login_check",
                    method: "get",
                }).then(function (response) {
                    if (response.data == 0) {
                        window.location.href = "admin";
                    }
                });
            };

            //form submit function - Add services Category
            $scope.submit = function (isValid) {
                // remove the tooltip
                $rootScope.removeToolTip();
                if (isValid) {
                    var gen_set_form = document.getElementById("add_category");
                    var fData = new FormData(gen_set_form);
                    fData.append("active", 1);
                    $("#submit").attr("disabled", "disabled");
                    $(".pageloader").show();
                    $http({
                        url: "save_category",
                        method: "POST",
                        data: fData,
                        transformRequest: angular.identity,
                        headers: { "Content-Type": undefined },
                        //  params: {name: $scope.services_category_name, image: new FormData($("#services_category_image")[0].files[0]), active: "1"}
                    }).then(function (response) {
                        $("#submit").attr("disabled", false);
                        $(".pageloader").hide();
                        var msg = "";
                        if (response.data == 1) {
                            setTimeout(function () {
                                msg = "Category saved successfully";
                                swal("Success!", msg, "success");
                            }, 10);
                            setTimeout(function () {
                                window.location.href =
                                    "admin_dashboard#/category";
                            }, 1000);
                        } else if (response.data == 2) {
                            msg = "Session expired, please login";
                            swal("Error!", msg, "error");
                            window.location.href = "admin";
                        } else if (response.data == 3) {
                            msg = "Category already exists";
                            swal("Error!", msg, "error");
                            $scope.name = "";
                            $("#title").addClass("has-error");
                            var fieldName = "title";
                            $rootScope.setToolTip(fieldName, msg);
                        } else {
                            msg =
                                "Something went wrong, please try again later";
                            swal("Error!", msg, "error");
                        }
                    });
                } else {
                    var error = $scope.add_category.$error;
                    angular.forEach(error.required, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;
                            var msg = fieldName + " required";
                            $("#" + fieldName).addClass("has-error");
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
                $(this).removeClass("has-error");
            });
            $(":input").click(function () {
                $(this).removeClass("has-error");
            });
        });
    },
]);

adapp.controller("EditCategory", [
    "$rootScope",
    "$scope",
    "settings",
    "$http",
    function ($rootScope, $scope, settings, $http) {
        $scope.$on("$viewContentLoaded", function () {
            App.initAjax();
            // set default layout mode
            $rootScope.settings.layout.pageContentWhite = true;
            $rootScope.settings.layout.pageBodySolid = false;
            $rootScope.settings.layout.pageSidebarClosed = false;
            //Login Check
            $rootScope.checkLogin = function () {
                $http({
                    url: "admin_login_check",
                    method: "get",
                }).then(function (response) {
                    if (response.data == 0) {
                        window.location.href = "admin";
                    }
                });
            };
            $rootScope.checkLogin();

            if ($rootScope.edit_category_id) {
                $scope.edit_id = $rootScope.edit_category_id;
                localStorage.setItem("edit_id", $scope.edit_id);
            } else {
                $scope.edit_id = localStorage.getItem("edit_id");
            }

            // Get particular Services Category
            $rootScope.getCategory = function () {
                if ($scope.edit_id) {
                    $http({
                        url: "get_category",
                        method: "get",
                        params: { id: $scope.edit_id },
                    }).then(function (response) {
                        if (response.data) {
                            $scope.title = response.data.title;
                            $scope.type = response.data.type;
                            $scope.description = response.data.description;
                            $scope.meta_title = response.data.meta_title;
                            $scope.edit_meta_title = response.data.meta_title;
                            $scope.meta_description =
                                response.data.meta_description;
                            $scope.meta_keyword = response.data.meta_keyword;
                            $scope.image_title = response.data.image_title;
                            $scope.edit_image = response.data.image_path;
                            $scope.alt_tag = response.data.image_alt;
                            $scope.active = response.data.active;
                            $scope.old_slug = response.data.slug;
                            $scope.slug = response.data.slug;
                        }
                    });
                }
            };
            $rootScope.getCategory();

            //form submit function - Edit Services Category
            $scope.edit = function (isValid) {
                // remove the tooltip
                $rootScope.removeToolTip();
                if (isValid) {
                    //Check for reactive time empty

                    var slug_change = 0;
                    if ($scope.old_slug != $scope.slug) {
                        slug_change = 1;
                    }

                    var gen_set_form = document.getElementById("edit_category");
                    var fData = new FormData(gen_set_form);
                    fData.append("id", $scope.edit_id);
                    fData.append(
                        "active",
                        $rootScope.switchValues($scope.active)
                    );
                    fData.append("slug_change", slug_change);
                    fData.append("old_slug", $.trim($scope.old_slug));
                    $("#submit").attr("disabled", "disabled");
                    $(".pageloader").show();
                    $http({
                        url: "edit_category",
                        method: "POST",
                        data: fData,
                        transformRequest: angular.identity,
                        headers: { "Content-Type": undefined },
                        // params: {id: $scope.edit_services_category_id, name: $scope.edit_services_category_name, active: $rootScope.switchValues($scope.edit_services_category_active), active_time: active_time}
                    }).then(function (response) {
                        $("#submit").attr("disabled", false);
                        $(".pageloader").hide();
                        var msg = "";
                        if (response.data == 1) {
                            setTimeout(function () {
                                msg = "Category updated successfully";
                                swal("Success!", msg, "success");
                            }, 10);
                            setTimeout(function () {
                                window.location.href =
                                    "admin_dashboard#/category";
                            }, 1000);
                        } else if (response.data == 2) {
                            msg = "Session expired, please login";
                            swal("Error!", msg, "error");
                            window.location.href = "admin";
                        } else if (response.data == 3) {
                            msg = "Category already exists";
                            swal("Error!", msg, "error");
                            $("#title").addClass("has-error");
                            var fieldName = "title";
                            $rootScope.setToolTip(fieldName, msg);
                        } else if (response.data == 5) {
                            msg = "Slug already available, please change it.";
                            swal("Error!", msg, "error");
                        } else {
                            msg =
                                "Something went wrong, please try again later";
                            swal("Error!", msg, "error");
                        }
                    });
                } else {
                    var error = $scope.edit_category.$error;
                    angular.forEach(error.required, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;
                            var msg = fieldName + " required";
                            $("#" + fieldName).addClass("has-error");
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
                $(this).removeClass("has-error");
            });
            $(":input").click(function () {
                $(this).removeClass("has-error");
            });
        });
    },
]);

// Third Layer

adapp.controller("ProductController", [
    "$rootScope",
    "$scope",
    "settings",
    "$http",
    function ($rootScope, $scope, settings, $http) {
        $scope.$on("$viewContentLoaded", function () {
            // initialize core components
            App.initAjax();
            // set default layout mode
            $rootScope.settings.layout.pageContentWhite = true;
            $rootScope.settings.layout.pageBodySolid = false;
            $rootScope.settings.layout.pageSidebarClosed = false;
            //Login Check
            $rootScope.checkLogin = function () {
                $http({
                    url: "admin_login_check",
                    method: "get",
                }).then(function (response) {
                    if (response.data == 0) {
                        window.location.href = "admin";
                    }
                });
            };
            $rootScope.checkLogin();

            $rootScope.getAllProductController = function () {
                $http({
                    url: "get_all_product",
                    method: "get",
                    dataType: "jsonp",
                }).then(function (response) {
                    if (response.data) {
                        $scope.products = response.data;
                    }
                });
            };
            $rootScope.getAllProductController();
            //Edit Category function
            $scope.editProduct = function (product_id) {
                $rootScope.edit_product_id = product_id;
                window.location.href = "admin_dashboard#/edit_product";
            };
        });
    },
]);

adapp.controller("AddProductController", [
    "$rootScope",
    "$scope",
    "settings",
    "$http",
    function ($rootScope, $scope, settings, $http) {
        $scope.$on("$viewContentLoaded", function () {
            // initialize core components
            App.initAjax();
            // set default layout mode
            $rootScope.settings.layout.pageContentWhite = true;
            $rootScope.settings.layout.pageBodySolid = false;
            $rootScope.settings.layout.pageSidebarClosed = false;
            //Login Check
            $rootScope.checkLogin = function () {
                $http({
                    url: "admin_login_check",
                    method: "get",
                }).then(function (response) {
                    if (response.data == 0) {
                        window.location.href = "admin";
                    }
                });
            };

            //get Active Service
            $rootScope.getActiveCategory = function () {
                $http({
                    url: "get_active_category",
                    method: "get",
                    dataType: "jsonp",
                }).then(function (response) {
                    if (response.data) {
                        $scope.categories = response.data;
                    }
                });
            };
            $rootScope.getActiveCategory();

            $(".summernote").summernote({
                fontNames: [
                    "Arial",
                    "Arial Black",
                    "Comic Sans MS",
                    "Courier New",
                    "Helvetica",
                    "Impact",
                    "Tahoma",
                    "Times New Roman",
                    "Verdana",
                    "Roboto",
                    "Roboto Light",
                    "Roboto Regular",
                    "Roboto Bold",
                    "Thai Sans Neue Light",
                    "Thai Sans Neue Regular",
                    "Thai Sans Neue Bold",
                ],
                fontNamesIgnoreCheck: [
                    "Roboto",
                    "Roboto Light",
                    "Roboto Regular",
                    "Roboto Bold",
                    "Thai Sans Neue Light",
                    "Thai Sans Neue Regular",
                    "Thai Sans Neue Bold",
                ],
                callbacks: {
                    onImageUpload: function (files, editor, welEditable) {
                        sendFile(files[0], editor, welEditable);
                    },
                },
            });

            //form submit function - Add services Category
            $scope.submit = function (isValid) {
                // remove the tooltip
                $rootScope.removeToolTip();
                if (isValid) {
                    var images = JSON.stringify($scope.images);
                    var downloads = JSON.stringify($scope.downloads);

                    var gen_set_form = document.getElementById("add_product");
                    var fData = new FormData(gen_set_form);
                    fData.append("more_images", images);
                    fData.append("downloads", downloads);
                    fData.append("active", 1);

                    $("#submit").attr("disabled", "disabled");
                    $(".pageloader").show();
                    $http({
                        url: "save_product",
                        method: "POST",
                        data: fData,
                        transformRequest: angular.identity,
                        headers: { "Content-Type": undefined },
                        //  params: {name: $scope.services_category_name, image: new FormData($("#services_category_image")[0].files[0]), active: "1"}
                    }).then(function (response) {
                        $("#submit").attr("disabled", false);
                        $(".pageloader").hide();
                        var msg = "";
                        if (response.data == 1) {
                            setTimeout(function () {
                                msg = "Product saved successfully";
                                swal("Success!", msg, "success");
                            }, 10);
                            setTimeout(function () {
                                window.location.href =
                                    "admin_dashboard#/product";
                            }, 1000);
                        } else if (response.data == 2) {
                            msg = "Session expired, please login";
                            swal("Error!", msg, "error");
                            window.location.href = "admin";
                        } else if (response.data == 3) {
                            msg = "Product already exists";
                            swal("Error!", msg, "error");
                            $scope.name = "";
                            $("#name").addClass("has-error");
                            var fieldName = "name";
                            $rootScope.setToolTip(fieldName, msg);
                        } else {
                            msg =
                                "Something went wrong, please try again later";
                            swal("Error!", msg, "error");
                        }
                    });
                } else {
                    var error = $scope.add_product.$error;
                    angular.forEach(error.required, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;
                            var msg = fieldName + " required";
                            $("#" + fieldName).addClass("has-error");
                            $rootScope.setToolTip(fieldName, msg);
                        }
                    });
                }
            };

            $scope.showImageUpload = function () {
                $("#m_image").modal("show");
            };

            $scope.images = [];
            $scope.addtoImage = function () {
                if (!$scope.doc_image) {
                    if (!$scope.doc_image) {
                        $("#doc_image").addClass("has-error");
                    }

                    return false;
                }

                var file_size = $("#doc_image")[0].files[0].size;
                if (file_size > 2097152) {
                    var msg = "Attachment should be less than 2MB";
                    $("#doc_image").addClass("has-error");
                    $("#doc_image").focus();
                    $rootScope.setToolTip("doc_image", msg);
                    return false;
                }

                var gen_set_form = document.getElementById("images_upload");
                var fData = new FormData(gen_set_form);
                fData.append("type", 5);

                $http({
                    url: "save_imgs",
                    method: "POST",
                    data: fData,
                    transformRequest: angular.identity,
                    headers: { "Content-Type": undefined },
                }).then(function (response) {
                    $scope.imgs = response.data;

                    $scope.doc_image = "";
                    $("#doc_image").val(null);

                    var Item = {
                        image_url: $scope.imgs.path,
                    };
                    $scope.images.push(Item);
                });
            };

            $scope.removeImage = function (index) {
                $scope.images.splice(index, 1);
            };

            $scope.showDownloads = function () {
                $("#m_download").modal("show");
            };

            $scope.downloads = [];
            $scope.addtoDownload = function () {
                if (!$scope.doc_name || !$scope.doc_file) {
                    if (!$scope.doc_name) {
                        $("#doc_name").addClass("has-error");
                    }
                    if (!$scope.doc_file) {
                        $("#doc_file").addClass("has-error");
                    }
                    return false;
                }

                var file_size = $("#doc_file")[0].files[0].size;
                if (file_size > 2097152) {
                    var msg = "Attachment should be less than 2MB";
                    $("#doc_file").addClass("has-error");
                    $("#doc_file").focus();
                    $rootScope.setToolTip("doc_file", msg);
                    return false;
                }

                var gen_set_form = document.getElementById("downloads");
                var fData = new FormData(gen_set_form);

                $http({
                    url: "save_docs",
                    method: "POST",
                    data: fData,
                    transformRequest: angular.identity,
                    headers: { "Content-Type": undefined },
                }).then(function (response) {
                    $scope.docs = response.data;

                    $scope.doc_name = "";
                    $scope.doc_file = "";
                    $("#doc_file").val(null);
                    var Item = {
                        name: $scope.docs.name,
                        download_url: $scope.docs.path,
                    };
                    $scope.downloads.push(Item);
                });
            };

            $scope.removeDownload = function (index) {
                $scope.downloads.splice(index, 1);
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
                $(this).removeClass("has-error");
            });
            $(":input").click(function () {
                $(this).removeClass("has-error");
            });
        });
    },
]);

adapp.controller("EditProductController", [
    "$rootScope",
    "$scope",
    "settings",
    "$http",
    function ($rootScope, $scope, settings, $http) {
        $scope.$on("$viewContentLoaded", function () {
            App.initAjax();
            // set default layout mode
            $rootScope.settings.layout.pageContentWhite = true;
            $rootScope.settings.layout.pageBodySolid = false;
            $rootScope.settings.layout.pageSidebarClosed = false;
            //Login Check
            $rootScope.checkLogin = function () {
                $http({
                    url: "admin_login_check",
                    method: "get",
                }).then(function (response) {
                    if (response.data == 0) {
                        window.location.href = "admin";
                    }
                });
            };
            $rootScope.checkLogin();

            if ($rootScope.edit_product_id) {
                $scope.edit_id = $rootScope.edit_product_id;
                localStorage.setItem("edit_id", $scope.edit_id);
            } else {
                $scope.edit_id = localStorage.getItem("edit_id");
            }

            $rootScope.getActiveCategory = function () {
                $http({
                    url: "get_all_category",
                    method: "get",
                    dataType: "jsonp",
                }).then(function (response) {
                    if (response.data) {
                        $scope.categories = response.data;
                    }
                });
            };
            $rootScope.getActiveCategory();

            $(".summernote").summernote({
                fontNames: [
                    "Arial",
                    "Arial Black",
                    "Comic Sans MS",
                    "Courier New",
                    "Helvetica",
                    "Impact",
                    "Tahoma",
                    "Times New Roman",
                    "Verdana",
                    "Roboto",
                    "Roboto Light",
                    "Roboto Regular",
                    "Roboto Bold",
                    "Thai Sans Neue Light",
                    "Thai Sans Neue Regular",
                    "Thai Sans Neue Bold",
                ],
                fontNamesIgnoreCheck: [
                    "Roboto",
                    "Roboto Light",
                    "Roboto Regular",
                    "Roboto Bold",
                    "Thai Sans Neue Light",
                    "Thai Sans Neue Regular",
                    "Thai Sans Neue Bold",
                ],
                callbacks: {
                    onImageUpload: function (files, editor, welEditable) {
                        sendFile(files[0], editor, welEditable);
                    },
                },
            });

            // Get particular Services Category
            $rootScope.getFourthLayer = function () {
                if ($scope.edit_id) {
                    $http({
                        url: "get_product",
                        method: "get",
                        params: { id: $scope.edit_id },
                    }).then(function (response) {
                        if (response.data) {
                            $scope.category = response.data.category_id;
                            $scope.title = response.data.title;
                            $scope.description = response.data.description;
                            $scope.meta_title = response.data.meta_title;
                            $scope.edit_meta_title = response.data.meta_title;
                            $scope.meta_description =
                                response.data.meta_description;
                            $scope.meta_keyword = response.data.meta_keyword;
                            $scope.image_title = response.data.image_title;
                            $scope.edit_image = response.data.image_path;
                            $scope.alt_tag = response.data.image_alt;
                            $scope.active = response.data.active;
                            $scope.old_slug = response.data.slug;
                            $scope.slug = response.data.slug;
                            $scope.images = response.data.image;
                            $scope.downloads = response.data.downloads;

                            $("#feature").summernote(
                                "code",
                                response.data.features
                            );
                            $("#specs").summernote("code", response.data.specs);
                            $("#content").summernote(
                                "code",
                                response.data.content
                            );
                        }
                    });
                }
            };
            $rootScope.getFourthLayer();

            //form submit function - Edit Services Category
            $scope.edit = function (isValid) {
                // remove the tooltip
                $rootScope.removeToolTip();
                if (isValid) {
                    //Check for reactive time empty

                    var images = JSON.stringify($scope.images);
                    var s_category = JSON.stringify($scope.category);
                    var downloads = JSON.stringify($scope.downloads);

                    var slug_change = 0;
                    if ($scope.old_slug != $scope.slug) {
                        slug_change = 1;
                    }

                    var gen_set_form = document.getElementById("edit_product");
                    var fData = new FormData(gen_set_form);
                    fData.append("id", $scope.edit_id);

                    fData.append(
                        "active",
                        $rootScope.switchValues($scope.active)
                    );
                    fData.append("slug_change", slug_change);
                    fData.append("old_slug", $.trim($scope.old_slug));
                    fData.append("s_category", s_category);
                    fData.append("more_images", images);
                    fData.append("downloads", downloads);
                    $("#submit").attr("disabled", "disabled");
                    $(".pageloader").show();
                    $http({
                        url: "edit_product",
                        method: "POST",
                        data: fData,
                        transformRequest: angular.identity,
                        headers: { "Content-Type": undefined },
                        // params: {id: $scope.edit_services_category_id, name: $scope.edit_services_category_name, active: $rootScope.switchValues($scope.edit_services_category_active), active_time: active_time}
                    }).then(function (response) {
                        $("#submit").attr("disabled", false);
                        $(".pageloader").hide();
                        var msg = "";
                        if (response.data == 1) {
                            setTimeout(function () {
                                msg = "Product updated successfully";
                                swal("Success!", msg, "success");
                            }, 10);
                            setTimeout(function () {
                                window.location.href =
                                    "admin_dashboard#/product";
                            }, 1000);
                        } else if (response.data == 2) {
                            msg = "Session expired, please login";
                            swal("Error!", msg, "error");
                            window.location.href = "admin";
                        } else if (response.data == 3) {
                            msg = "Product already exists";
                            swal("Error!", msg, "error");
                            $("#title").addClass("has-error");
                            var fieldName = "product name";
                            $rootScope.setToolTip(fieldName, msg);
                        } else if (response.data == 5) {
                            msg = "Slug already available, please change it.";
                            swal("Error!", msg, "error");
                        } else {
                            msg =
                                "Something went wrong, please try again later";
                            swal("Error!", msg, "error");
                        }
                    });
                } else {
                    var error = $scope.edit_product.$error;
                    angular.forEach(error.required, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;
                            var msg = fieldName + " required";
                            $("#" + fieldName).addClass("has-error");
                            $rootScope.setToolTip(fieldName, msg);
                        }
                    });
                }
            };

            $scope.show_edit_image = false;
            $scope.showImageEdit = function () {
                if (!$scope.show_edit_image) {
                    $scope.show_edit_image = true;
                } else {
                    $scope.show_edit_image = false;
                    $("#edit_blog_image").val("");
                }
            };
            $scope.show_edit_download = false;
            $scope.showDownloadEdit = function () {
                if (!$scope.show_edit_image) {
                    $scope.show_edit_download = true;
                } else {
                    $scope.show_edit_download = false;
                    $("#edit_download_image").val("");
                }
            };

            $scope.showImageUpload = function () {
                $("#m_image").modal("show");
            };

            $scope.addtoImage = function () {
                if (!$scope.doc_image) {
                    if (!$scope.doc_image) {
                        $("#doc_image").addClass("has-error");
                    }

                    return false;
                }

                var file_size = $("#doc_image")[0].files[0].size;
                if (file_size > 2097152) {
                    var msg = "Attachment should be less than 2MB";
                    $("#doc_image").addClass("has-error");
                    $("#doc_image").focus();
                    $rootScope.setToolTip("doc_image", msg);
                    return false;
                }

                var gen_set_form = document.getElementById("images_upload");
                var fData = new FormData(gen_set_form);
                fData.append("type", 5);

                $http({
                    url: "save_imgs",
                    method: "POST",
                    data: fData,
                    transformRequest: angular.identity,
                    headers: { "Content-Type": undefined },
                }).then(function (response) {
                    $scope.imgs = response.data;

                    $scope.doc_image = "";
                    $("#doc_image").val(null);

                    var Item = {
                        image_url: $scope.imgs.path,
                    };
                    $scope.images.push(Item);
                });
            };

            $scope.removeImage = function (index) {
                $scope.images.splice(index, 1);
            };

            $scope.showDownloads = function () {
                $("#m_download").modal("show");
            };

            $scope.addtoDownload = function () {
                if (!$scope.doc_name || !$scope.doc_file) {
                    if (!$scope.doc_name) {
                        $("#doc_name").addClass("has-error");
                    }
                    if (!$scope.doc_file) {
                        $("#doc_file").addClass("has-error");
                    }
                    return false;
                }

                var file_size = $("#doc_file")[0].files[0].size;
                if (file_size > 2097152) {
                    var msg = "Attachment should be less than 2MB";
                    $("#doc_file").addClass("has-error");
                    $("#doc_file").focus();
                    $rootScope.setToolTip("doc_file", msg);
                    return false;
                }

                var gen_set_form = document.getElementById("downloads");
                var fData = new FormData(gen_set_form);

                $http({
                    url: "save_docs",
                    method: "POST",
                    data: fData,
                    transformRequest: angular.identity,
                    headers: { "Content-Type": undefined },
                }).then(function (response) {
                    $scope.docs = response.data;

                    $scope.doc_name = "";
                    $scope.doc_file = "";
                    $("#doc_file").val(null);
                    var Item = {
                        name: $scope.docs.name,
                        download_url: $scope.docs.path,
                    };
                    $scope.downloads.push(Item);
                });
            };

            $scope.removeDownload = function (index) {
                $scope.downloads.splice(index, 1);
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
                $(this).removeClass("has-error");
            });
            $(":input").click(function () {
                $(this).removeClass("has-error");
            });
        });
    },
]);

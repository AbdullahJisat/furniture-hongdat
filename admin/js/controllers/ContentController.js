adapp = angular.module("MetronicApp", ["uiSwitch"]);
/* Setup blank page controller */
adapp.controller("ContentController", [
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

            $rootScope.getAllContent = function () {
                $http({
                    url: "get_all_content",
                    method: "get",
                    dataType: "jsonp",
                }).then(function (response) {
                    if (response.data) {
                        $scope.contents = response.data;
                    }
                });
            };
            $rootScope.getAllContent();

            //Edit Content Function
            $scope.editContent = function (content_id) {
                $rootScope.edit_content_id = content_id;
                window.location.href = "admin_dashboard#/edit_content";
            };
        });
    },
]);

adapp.controller("AddContentController", [
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

            $rootScope.getContentMenu = function () {
                $http({
                    url: "content_menu",
                    method: "get",
                }).then(function (response) {
                    $scope.content_menu = response.data;
                });
            };
            $rootScope.getContentMenu();

            $rootScope.getAllCategory = function () {
                $http({
                    url: "get_blog_category",
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

            $(".summernote").summernote({
                callbacks: {
                    onImageUpload: function (files, editor, welEditable) {
                        sendFile(files[0], editor, welEditable);
                    },
                },
            });

            function sendFile(file, editor, welEditable) {
                data = new FormData();

                data.append("file", file);

                $.ajax({
                    data: data,

                    type: "POST",

                    url: "save_content_image",

                    cache: false,

                    contentType: false,

                    processData: false,

                    success: function (url) {
                        $(".summernote").summernote(
                            "editor.insertImage",
                            url,
                            "filename"
                        );
                    },
                });
            }

            //form submit function - Add Faq
            $scope.submit = function (isValid) {
                // remove the tooltip
                $rootScope.removeToolTip();
                if (isValid) {
                    var content_description =
                        $(".summernote").summernote("code");
                    var images = JSON.stringify($scope.images);

                    $("#submit").attr("disabled", "disabled");
                    $(".pageloader").show();
                    var gen_set_form = document.getElementById("add_content");
                    var fData = new FormData(gen_set_form);
                    fData.append("content_description", content_description);
                    fData.append("more_images", images);
                    $http({
                        url: "save_content",
                        method: "POST",
                        data: fData,
                        transformRequest: angular.identity,
                        headers: { "Content-Type": undefined },
                    }).then(function (response) {
                        $("#submit").attr("disabled", false);
                        $(".pageloader").hide();
                        var msg = "";
                        if (response.data == 1) {
                            setTimeout(function () {
                                msg = "Content saved successfully";
                                swal("Success!", msg, "success");
                            }, 10);
                            setTimeout(function () {
                                window.location.href =
                                    "admin_dashboard#/content";
                            }, 1000);
                        } else if (response.data == 2) {
                            msg = "Session expired, please login";
                            swal("Error!", msg, "error");
                            window.location.href = "admin";
                        } else {
                            msg =
                                "Something went wrong, please try again later";
                            swal("Error!", msg, "error");
                        }
                    });
                } else {
                    var error = $scope.add_content.$error;
                    angular.forEach(error.required, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;

                            var msg = fieldName + " required";
                            $("#" + fieldName).addClass("has-error");
                            $("#" + fieldName).focus();
                            $rootScope.setToolTip(fieldName, msg);
                        }
                    });
                }
            };
            $scope.goback = function () {
                window.history.back();
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
                fData.append("type", $scope.menu);

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
                    if (!$scope.img_title) {
                        $scope.img_title = "";
                    }
                    var Item = {
                        image_path: $scope.imgs.path,
                        image_title: $scope.img_title,
                    };
                    $scope.images.push(Item);
                    $scope.img_title = "";
                });
            };

            $scope.removeImage = function (index) {
                $scope.images.splice(index, 1);
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

adapp.controller("EditContentController", [
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

            if ($rootScope.edit_content_id) {
                $scope.edit_id = $rootScope.edit_content_id;
                localStorage.setItem("edit_id", $scope.edit_id);
            } else {
                $scope.edit_id = localStorage.getItem("edit_id");
            }

            $(".summernote").summernote({
                height: 200,
                onImageUpload: function (files, editor, welEditable) {
                    sendFile(files[0], editor, welEditable);
                },
            });

            $rootScope.getContentMenu = function () {
                $http({
                    url: "content_menu",
                    method: "get",
                }).then(function (response) {
                    $scope.content_menu = response.data;
                });
            };
            $rootScope.getContentMenu();
            // Get particular Holiday
            $rootScope.getContent = function () {
                if ($scope.edit_id) {
                    $http({
                        url: "get_content",
                        method: "get",
                        params: { id: $scope.edit_id },
                    }).then(function (response) {
                        if (response.data) {
                            $scope.menu = parseInt(response.data.menu);
                            $scope.title = response.data.title;
                            $scope.description = response.data.description;
                            // $scope.edit_description = response.data.description;
                            $(".summernote").summernote(
                                "code",
                                response.data.content
                            );
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
                        }
                    });
                }
            };
            $rootScope.getContent();

            //form submit function - Edit Slider
            $scope.edit = function (isValid) {
                // remove the tooltip
                $rootScope.removeToolTip();
                if (isValid) {
                    var content_description =
                        $(".summernote").summernote("code");
                    var images = JSON.stringify($scope.images);
                    var s_menu = JSON.stringify($scope.menu);

                    var slug_change = 0;
                    if ($scope.old_slug != $scope.slug) {
                        slug_change = 1;
                    }

                    var gen_set_form = document.getElementById("edit_content");
                    var fData = new FormData(gen_set_form);
                    fData.append("id", $scope.edit_id);
                    fData.append(
                        "active",
                        $rootScope.switchValues($scope.active)
                    );
                    fData.append("slug_change", slug_change);
                    fData.append("old_slug", $.trim($scope.old_slug));
                    fData.append("content_description", content_description);
                    fData.append("s_menu", s_menu);
                    fData.append("more_images", images);
                    $("#submit").attr("disabled", "disabled");
                    $(".pageloader").show();
                    $http({
                        url: "edit_content",
                        method: "POST",
                        data: fData,
                        transformRequest: angular.identity,
                        headers: { "Content-Type": undefined },
                    }).then(function (response) {
                        $("#submit").attr("disabled", false);
                        $(".pageloader").hide();
                        var msg = "";
                        if (response.data == 1) {
                            setTimeout(function () {
                                msg = "Content updated successfully";
                                swal("Success!", msg, "success");
                            }, 10);
                            setTimeout(function () {
                                window.location.href =
                                    "admin_dashboard#/content";
                            }, 1000);
                        } else if (response.data == 2) {
                            msg = "Session expired, please login";
                            swal("Error!", msg, "error");
                            window.location.href = "admin";
                        } else if (response.data == 3) {
                            msg = "Slug already available, please change it.";
                            swal("Error!", msg, "error");
                        } else {
                            msg =
                                "Something went wrong, please try again later";
                            swal("Error!", msg, "error");
                        }
                    });
                } else {
                    var error = $scope.edit_content.$error;
                    angular.forEach(error.required, function (field) {
                        if (field.$invalid) {
                            var fieldName = field.$name;
                            var msg = fieldName + " required";
                            $("#" + fieldName).addClass("has-error");
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
                $(this).removeClass("has-error");
            });
            $(":input").click(function () {
                $(this).removeClass("has-error");
            });

            $scope.show_edit_image = false;
            $scope.showImageEdit = function () {
                if (!$scope.show_edit_image) {
                    $scope.show_edit_image = true;
                } else {
                    $scope.show_edit_image = false;
                    $("#edit_content_image").val("");
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
                fData.append("type", 2);

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
                    if (!$scope.img_title) {
                        $scope.img_title = "";
                    }
                    var Item = {
                        image_path: $scope.imgs.path,
                        image_title: $scope.img_title,
                    };
                    $scope.images.push(Item);
                    $scope.img_title = "";
                });
            };

            $scope.removeImage = function (index) {
                $scope.images.splice(index, 1);
            };
        });
    },
]);

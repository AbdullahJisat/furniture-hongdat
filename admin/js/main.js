/***
 Metronic AngularJS App Main Script
 ***/

/* Metronic App */
var MetronicApp = angular.module("MetronicApp", [
    "ui.router",
    "ui.bootstrap",
    "oc.lazyLoad",
    "ngSanitize",
]);



/* Configure ocLazyLoader(refer: https://github.com/ocombe/ocLazyLoad) */
MetronicApp.config(['$ocLazyLoadProvider', function ($ocLazyLoadProvider) {
        $ocLazyLoadProvider.config({
// global configs go here
        });
    }
]);

//AngularJS v1.3.x workaround for old style controller declarition in HTML
MetronicApp.config(['$controllerProvider', function ($controllerProvider) {
        // this option might be handy for migrating old apps, but please don't use it
        // in new ones!
        $controllerProvider.allowGlobals();
    }]);

/********************************************
 END: BREAKING CHANGE in AngularJS v1.3.x:
 *********************************************/

/* Setup global settings */
MetronicApp.factory('settings', ['$rootScope', function ($rootScope) {
        // supported languages
        var settings = {
            layout: {
                pageSidebarClosed: false, // sidebar menu state
                pageContentWhite: true, // set page content layout
                pageBodySolid: false, // solid body color state
                pageAutoScrollOnLoad: 1000 // auto scroll to top on page load
            },
            assetsPath: 'assets',
            globalPath: 'assets/global',
            layoutPath: 'assets/layouts/layout',
        };

        $rootScope.settings = settings;

        return settings;
    }]);




/* Setup App Main Controller */
MetronicApp.controller('AppController', ['$scope', '$rootScope', function ($scope, $rootScope) {
        $scope.$on('$viewContentLoaded', function () {
            //App.initComponents(); // init core components
            //Layout.init(); //  Init entire layout(header, footer, sidebar, etc) on page load if the partials included in server side instead of loading with ng-include directive 
        });
    }]);

/***
 Layout Partials.
 By default the partials are loaded through AngularJS ng-include directive. In case they loaded in server side(e.g: PHP include function) then below partial 
 initialization can be disabled and Layout.init() should be called on page load complete as explained above.
 ***/

/* Setup Layout Part - Header */
MetronicApp.controller('HeaderController', ['$scope', '$http', function ($scope, $http) {
        $scope.$on('$includeContentLoaded', function () {
            Layout.initHeader(); // init header
            $scope.admin = "";
            $http({
                url: 'user_details',
                method: 'get'
            }).then(function (response) {
                if (response.data) {
                    $scope.admin = response.data;
                }
            });
        });
    }]);

/* Setup Layout Part - Sidebar */
MetronicApp.controller('SidebarController', ['$state', '$scope', '$http', function ($state, $scope, $http) {
        $scope.$on('$includeContentLoaded', function () {
            Layout.initSidebar($state); // init sidebar

        });
    }]);


/* Setup Layout Part - Quick Sidebar */
MetronicApp.controller('QuickSidebarController', ['$scope', function ($scope) {
        $scope.$on('$includeContentLoaded', function () {
            setTimeout(function () {
                QuickSidebar.init(); // init quick sidebar        
            }, 2000)
        });
    }]);

/* Setup Layout Part - Theme Panel */
MetronicApp.controller('ThemePanelController', ['$scope', function ($scope) {
        $scope.$on('$includeContentLoaded', function () {
            Demo.init(); // init theme panel
        });
    }]);

/* Setup Layout Part - Footer */
MetronicApp.controller('FooterController', ['$scope', function ($scope) {
        $scope.$on('$includeContentLoaded', function () {
            Layout.initFooter(); // init footer
        });
    }]);

//Angular Switch Directive
angular.module('uiSwitch', [])

        .directive('switch', function () {
            return {
                restrict: 'AE'
                , replace: true
                , transclude: true
                , template: function (element, attrs) {
                    var html = '';
                    html += '<span';
                    html += ' class="switch' + (attrs.class ? ' ' + attrs.class : '') + '"';
                    html += attrs.ngModel ? ' ng-click="' + attrs.disabled + ' ? ' + attrs.ngModel + ' : ' + attrs.ngModel + '=!' + attrs.ngModel + (attrs.ngChange ? '; ' + attrs.ngChange + '()"' : '"') : '';
                    html += ' ng-class="{ checked:' + attrs.ngModel + ', disabled:' + attrs.disabled + ' }"';
                    html += '>';
                    html += '<small></small>';
                    html += '<input type="checkbox"';
                    html += attrs.id ? ' id="' + attrs.id + '"' : '';
                    html += attrs.name ? ' name="' + attrs.name + '"' : '';
                    html += attrs.ngModel ? ' ng-model="' + attrs.ngModel + '"' : '';
                    html += ' style="display:none" />';
                    html += '<span class="switch-text">'; /*adding new container for switch text*/
                    html += attrs.on ? '<span class="on">' + attrs.on + '</span>' : ''; /*switch text on value set by user in directive html markup*/
                    html += attrs.off ? '<span class="off">' + attrs.off + '</span>' : ' ';  /*switch text off value set by user in directive html markup*/
                    html += '</span>';
                    return html;
                }
            }
        });

MetronicApp.directive('fileModel', ['$parse', function ($parse) {
        return {
            restrict: 'A',
            link: function (scope, element, attrs) {
                var model = $parse(attrs.fileModel);
                var modelSetter = model.assign;

                element.bind('change', function () {
                    scope.$apply(function () {
                        modelSetter(scope, element[0].files[0]);
                    });
                });
            }
        };
    }]);


/* Setup Rounting For All Pages */
MetronicApp.config(['$stateProvider', '$urlRouterProvider', '$locationProvider', function ($stateProvider, $urlRouterProvider, $locationProvider) {
        // Redirect any unmatched url
        //  $locationProvider.html5Mode(true);
        $urlRouterProvider.otherwise("/dashboard");
        $stateProvider

                // Dashboard
                .state('dashboard', {
                    url: "/dashboard",
                    templateUrl: "views/dashboard.html",
                    data: {pageTitle: 'Admin Dashboard Template'},
                    controller: "DashboardController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [
                                        'assets/global/plugins/morris/morris.css',
                                        'assets/global/plugins/morris/morris.min.js',
                                        'assets/global/plugins/morris/raphael-min.js',
                                        'js/Chart.min.js',
                                        'assets/global/plugins/jquery.sparkline.min.js',
                                        'assets/pages/scripts/dashboard.min.js',
                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'js/controllers/DashboardController.js'
                                    ]
                                });
                            }]
                    }
                })








                // Blog Page
                .state('content', {
                    url: "/content",
                    templateUrl: "views/content.html",
                    data: {pageTitle: 'Content View Template'},
                    controller: "ContentController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [

                                        'assets/global/plugins/angular-datatables/angular-datatables.min.css',
                                        'assets/global/plugins/datatables/datatables.min.css',
                                        'assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',

                                        'assets/global/plugins/angular-datatables/angular-datatables.min.js',
                                        'assets/global/plugins/datatables/datatables.all.min.js',
                                        'assets/pages/scripts/table-datatables-managed.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'js/controllers/ContentController.js'


                                    ]
                                });
                            }]
                    }
                })

                // Image Slider Add Page
                .state('add_content', {
                    url: "/add_content",
                    templateUrl: "views/add_content.html",
                    data: {pageTitle: 'Add Content Page Template'},
                    controller: "AddContentController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [

                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',
                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',

                                        'js/controllers/ContentController.js'
                                    ]
                                });
                            }]
                    }
                })

                // Image Slider Edit Page
                .state('edit_content', {
                    url: "/edit_content",
                    templateUrl: "views/edit_content.html",
                    data: {pageTitle: 'Edit Content Page Template'},
                    controller: "EditContentController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [

                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',
                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'js/controllers/ContentController.js'


                                    ]
                                });
                            }]
                    }
                })



                // Users view Page
                .state('users', {
                    url: "/users",
                    templateUrl: "views/users.html",
                    data: {pageTitle: 'Users Page Template'},
                    controller: "UsersController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [

                                        'assets/global/plugins/angular-datatables/angular-datatables.min.css',
                                        'assets/global/plugins/datatables/datatables.min.css',
                                        'assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',
                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'assets/global/plugins/angular-datatables/angular-datatables.min.js',
                                        'assets/global/plugins/datatables/datatables.all.min.js',
                                        'assets/pages/scripts/table-datatables-managed.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'assets/global/plugins/js-pdf/jspdf.min.js',
                                        'js/controllers/UsersController.js'


                                    ]
                                });
                            }]
                    }
                })

                // Users Add Page
                .state('add_user', {
                    url: "/add_user",
                    templateUrl: "views/add_user.html",
                    data: {pageTitle: 'Add User Page Template'},
                    controller: "AddUserController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [
                                        'assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css',
                                        'assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
                                        'assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css',
                                        'assets/global/plugins/typeahead/typeahead.css',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',
                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js',
                                        'assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js',
                                        'assets/global/plugins/jquery.input-ip-address-control-1.0.min.js',
                                        'assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js',
                                        'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                                        'assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js',
                                        'assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js',
                                        'assets/global/plugins/typeahead/handlebars.min.js',
                                        'assets/global/plugins/typeahead/typeahead.bundle.min.js',
                                        'assets/pages/scripts/components-form-tools-2.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'js/controllers/UsersController.js'


                                    ]
                                });
                            }]
                    }
                })

                // Users Edit Page
                .state('edit_user', {
                    url: "/edit_user",
                    templateUrl: "views/edit_user.html",
                    data: {pageTitle: 'Edit User Page Template'},
                    controller: "EditUserController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [
                                        'assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css',
                                        'assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
                                        'assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css',
                                        'assets/global/plugins/typeahead/typeahead.css',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',
                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js',
                                        'assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js',
                                        'assets/global/plugins/jquery.input-ip-address-control-1.0.min.js',
                                        'assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js',
                                        'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                                        'assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js',
                                        'assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js',
                                        'assets/global/plugins/typeahead/handlebars.min.js',
                                        'assets/global/plugins/typeahead/typeahead.bundle.min.js',
                                        'assets/pages/scripts/components-form-tools-2.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'js/controllers/UsersController.js'


                                    ]
                                });
                            }]
                    }
                })




                // Contact Us Page
                .state('contact_us', {
                    url: "/contact_us",
                    templateUrl: "views/contact_us.html",
                    data: {pageTitle: 'Contact Us View Template'},
                    controller: "ContactUsController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [

                                        'assets/global/plugins/angular-datatables/angular-datatables.min.css',
                                        'assets/global/plugins/datatables/datatables.min.css',
                                        'assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',

                                        'assets/global/plugins/angular-datatables/angular-datatables.min.js',
                                        'assets/global/plugins/datatables/datatables.all.min.js',
                                        'assets/pages/scripts/table-datatables-managed.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'js/controllers/ContactUsController.js'


                                    ]
                                });
                            }]
                    }
                })

                // Contact Us Add Page
                .state('add_contact_us', {
                    url: "/add_contact_us",
                    templateUrl: "views/add_contact_us.html",
                    data: {pageTitle: 'Add Contact Us Page Template'},
                    controller: "AddContactUsController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [

                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',
                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'js/controllers/ContactUsController.js'


                                    ]
                                });
                            }]
                    }
                })

                // Contact Us Edit Page
                .state('edit_contact_us', {
                    url: "/edit_contact_us",
                    templateUrl: "views/edit_contact_us.html",
                    data: {pageTitle: 'Edit Contact Us Page Template'},
                    controller: "EditContactUsController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [

                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',
                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'js/controllers/ContactUsController.js'


                                    ]
                                });
                            }]
                    }
                })

                // Image Slider Page
                .state('career', {
                    url: "/career",
                    templateUrl: "views/career.html",
                    data: {pageTitle: 'Career View Template'},
                    controller: "CareerController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [

                                        'assets/global/plugins/angular-datatables/angular-datatables.min.css',
                                        'assets/global/plugins/datatables/datatables.min.css',
                                        'assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',
                                        'assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css',

                                        'assets/global/plugins/angular-datatables/angular-datatables.min.js',
                                        'assets/global/plugins/datatables/datatables.all.min.js',
                                        'assets/pages/scripts/table-datatables-managed.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
                                        'js/controllers/CareerController.js'


                                    ]
                                });
                            }]
                    }
                })

                // Image Slider Add Page
                .state('add_career', {
                    url: "/add_career",
                    templateUrl: "views/add_career.html",
                    data: {pageTitle: 'Add Career Page Template'},
                    controller: "AddCareerController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [

                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',
                                        'assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css',
                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'js/tinymce.min.js',
                                        'js/ckeditor.js',
                                        'assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
                                        'js/controllers/CareerController.js'
                                    ]
                                });
                            }]
                    }
                })

                // Image Slider Edit Page
                .state('edit_career', {
                    url: "/edit_career",
                    templateUrl: "views/edit_career.html",
                    data: {pageTitle: 'Edit Career Page Template'},
                    controller: "EditCareerController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [

                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',
                                        'assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css',
                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
                                        'js/controllers/CareerController.js'


                                    ]
                                });
                            }]
                    }
                })


                // Image Slider Page
                .state('testimonials', {
                    url: "/testimonials",
                    templateUrl: "views/testimonial.html",
                    data: {pageTitle: 'Testimonial Template'},
                    controller: "TestimonialController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [

                                        'assets/global/plugins/angular-datatables/angular-datatables.min.css',
                                        'assets/global/plugins/datatables/datatables.min.css',
                                        'assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',

                                        'assets/global/plugins/angular-datatables/angular-datatables.min.js',
                                        'assets/global/plugins/datatables/datatables.all.min.js',
                                        'assets/pages/scripts/table-datatables-managed.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'js/controllers/TestimonialController.js'


                                    ]
                                });
                            }]
                    }
                })

                // Image Slider Add Page
                .state('add_testimonial', {
                    url: "/add_testimonial",
                    templateUrl: "views/add_testimonial.html",
                    data: {pageTitle: 'Add Testimonial Page Template'},
                    controller: "AddTestimonialController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [

                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css',
                                        'css/custom.css',
                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
                                        'js/controllers/TestimonialController.js'


                                    ]
                                });
                            }]
                    }
                })

                // Image Slider Edit Page
                .state('edit_testimonial', {
                    url: "/edit_testimonial",
                    templateUrl: "views/edit_testimonial.html",
                    data: {pageTitle: 'Edit Testimonial Page Template'},
                    controller: "EditTestimonialController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [

                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css',
                                        'css/custom.css',
                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
                                        'js/controllers/TestimonialController.js'


                                    ]
                                });
                            }]
                    }
                })


                // Services Category view Page
                .state('category', {
                    url: "/category",
                    templateUrl: "views/category.html",
                    data: {pageTitle: 'Category Page Template'},
                    controller: "Category",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [

                                        'assets/global/plugins/angular-datatables/angular-datatables.min.css',
                                        'assets/global/plugins/datatables/datatables.min.css',
                                        'assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',
                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'assets/global/plugins/angular-datatables/angular-datatables.min.js',
                                        'assets/global/plugins/datatables/datatables.all.min.js',
                                        'assets/pages/scripts/table-datatables-managed.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'js/controllers/ProductController.js'


                                    ]
                                });
                            }]
                    }
                })

                // Services Category Add Page
                .state('add_category', {
                    url: "/add_category",
                    templateUrl: "views/add_category.html",
                    data: {pageTitle: 'Add Category Page Template'},
                    controller: "AddCategory",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [
                                        'assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css',
                                        'assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
                                        'assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css',
                                        'assets/global/plugins/typeahead/typeahead.css',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',
                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js',
                                        'assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js',
                                        'assets/global/plugins/jquery.input-ip-address-control-1.0.min.js',
                                        'assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js',
                                        'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                                        'assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js',
                                        'assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js',
                                        'assets/global/plugins/typeahead/handlebars.min.js',
                                        'assets/global/plugins/typeahead/typeahead.bundle.min.js',
                                        'assets/pages/scripts/components-form-tools-2.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'js/controllers/ProductController.js'


                                    ]
                                });
                            }]
                    }
                })

                // Services Category Edit Page
                .state('edit_category', {
                    url: "/edit_category",
                    templateUrl: "views/edit_category.html",
                    data: {pageTitle: 'Edit Category Page Template'},
                    controller: "EditCategory",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [
                                        'assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css',
                                        'assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
                                        'assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css',
                                        'assets/global/plugins/typeahead/typeahead.css',
                                        'css/custom.css',
                                        'assets/global/plugins/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        // 'assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css',

                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js',
                                        'assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js',
                                        'assets/global/plugins/jquery.input-ip-address-control-1.0.min.js',
                                        'assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js',
                                        'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                                        'assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js',
                                        'assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js',
                                        'assets/global/plugins/typeahead/handlebars.min.js',
                                        'assets/global/plugins/typeahead/typeahead.bundle.min.js',
                                        'assets/pages/scripts/components-form-tools-2.min.js',
                                        'assets/global/plugins/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        // 'assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',

                                        'js/controllers/ProductController.js'


                                    ]
                                });
                            }]
                    }
                })

                // Fourth layer
                .state('product', {
                    url: "/product",
                    templateUrl: "views/product.html",
                    data: {pageTitle: 'Product Page Template'},
                    controller: "ProductController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [

                                        'assets/global/plugins/angular-datatables/angular-datatables.min.css',
                                        'assets/global/plugins/datatables/datatables.min.css',
                                        'assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',
                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'assets/global/plugins/angular-datatables/angular-datatables.min.js',
                                        'assets/global/plugins/datatables/datatables.all.min.js',
                                        'assets/pages/scripts/table-datatables-managed.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'js/controllers/ProductController.js'


                                    ]
                                });
                            }]
                    }
                })

                // Services Category Add Page
                .state('add_product', {
                    url: "/add_product",
                    templateUrl: "views/add_product.html",
                    data: {pageTitle: 'Add Product Page Template'},
                    controller: "AddProductController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',
                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'js/tinymce.min.js',
                                        'js/ckeditor.js',

                                        'js/controllers/ProductController.js'


                                    ]
                                });
                            }]
                    }
                })

                // Services Category Edit Page
                .state('edit_product', {
                    url: "/edit_product",
                    templateUrl: "views/edit_product.html",
                    data: {pageTitle: 'Edit Product Page Template'},
                    controller: "EditProductController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [
                                        'assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css',
                                        'assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
                                        'assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css',
                                        'assets/global/plugins/typeahead/typeahead.css',
                                        'css/custom.css',
                                        'assets/global/plugins/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        // 'assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css',

                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js',
                                        'assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js',
                                        'assets/global/plugins/jquery.input-ip-address-control-1.0.min.js',
                                        'assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js',
                                        'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                                        'assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js',
                                        'assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js',
                                        'assets/global/plugins/typeahead/handlebars.min.js',
                                        'assets/global/plugins/typeahead/typeahead.bundle.min.js',
                                        'assets/pages/scripts/components-form-tools-2.min.js',
                                        'assets/global/plugins/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        // 'assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',

                                        'js/controllers/ProductController.js'


                                    ]
                                });
                            }]
                    }
                })


                // Image Slider Page
                .state('projects', {
                    url: "/projects",
                    templateUrl: "views/project.html",
                    data: {pageTitle: 'Project View Template'},
                    controller: "ProjectController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [

                                        'assets/global/plugins/angular-datatables/angular-datatables.min.css',
                                        'assets/global/plugins/datatables/datatables.min.css',
                                        'assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',

                                        'assets/global/plugins/angular-datatables/angular-datatables.min.js',
                                        'assets/global/plugins/datatables/datatables.all.min.js',
                                        'assets/pages/scripts/table-datatables-managed.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'js/controllers/ProjectController.js'


                                    ]
                                });
                            }]
                    }
                })

                // Image Slider Add Page
                .state('add_project', {
                    url: "/add_project",
                    templateUrl: "views/add_project.html",
                    data: {pageTitle: 'Add Project Page Template'},
                    controller: "AddProjectController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [

                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',
                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'js/controllers/ProjectController.js'


                                    ]
                                });
                            }]
                    }
                })

                // Image Slider Edit Page
                .state('edit_project', {
                    url: "/edit_project",
                    templateUrl: "views/edit_project.html",
                    data: {pageTitle: 'Edit Project Page Template'},
                    controller: "EditProjectController",
                    resolve: {
                        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                                return $ocLazyLoad.load({
                                    name: 'MetronicApp',
                                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                                    files: [

                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.css',
                                        'css/custom.css',
                                        'assets/global/plugins/fuelux/js/spinner.min.js',
                                        'assets/global/plugins/bootstrap-sweet-alert-master/sweetalert.min.js',
                                        'js/controllers/ProjectController.js'


                                    ]
                                });
                            }]
                    }
                });




    }]);
/* Init global settings and run the app */
MetronicApp.run(["$rootScope", "settings", "$state", function ($rootScope, settings, $state) {
        $rootScope.$state = $state; // state to be accessed from view
        $rootScope.$settings = settings; // state to be accessed from view
    }]);
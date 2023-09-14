angular.module('MetronicApp').controller('DashboardController', function ($rootScope, $scope, $http, $timeout) {
    $scope.$on('$viewContentLoaded', function () {
        // initialize core components
        App.initAjax();
    });

    // set sidebar closed and body solid layout mode
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

});
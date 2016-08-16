var app = angular.module('moddingtrials');

app.controller('AdminController', function ($scope, $http, $window, $interval) {
   $scope.newCategory = [];
    $scope.saveCategory = [];
    $scope.alerts = [];
    $scope.createCategory = function(){
        $http({
            method: 'POST',
            url: '/admin/category/new',
            data: {
                'name': $scope.newCategory.name,
                'description': $scope.newCategory.description,
            }
        }).then(function callback(response){
            var response = response.data;
            if(response.success === true){
                $scope.alerts.push({
                    type: 'success',
                    msg: 'Succesfully added!'
                });
                $interval(function() {
                    $window.location.href = '/admin';
                }, 2000);

            }else {
                $scope.alerts.push({
                    type: 'danger',
                    msg: response.error
                });
            }
        });
    };
    $scope.saveCategorySubmit = function(){
        $http({
            method: 'POST',
            url: '/admin/category/save',
            data: {
                'id': $scope.saveCategory.id,
                'name': $scope.saveCategory.name,
                'description': $scope.saveCategory.description,
            }
        }).then(function callback(response){
            var response = response.data;
            if(response.success === true){
                $scope.alerts.push({
                    type: 'success',
                    msg: 'Succesfully saved!'
                });
                $interval(function() {
                    $window.location.href = '/admin';
                }, 2000);

            }else {
                $scope.alerts.push({
                    type: 'danger',
                    msg: response.error
                });
            }
        });
    };
});
var app = angular.module('moddingtrials');

app.controller('VoteController', function ($scope, $http, $timeout, $interval, SweetAlert, $window) {
    $scope.hasStarted = false;
    $scope.showInstructions = true;
    $scope.voteClass = [];
    $scope.voteText = [];
    $scope.currentCategory = 0;
    $scope.finished = false;
    $http({
        method: 'GET',
        url: '/vote/categorys',
    }).then(function callback(response){
        var response = response.data;
        if(response.success === true){
            var categorys = response.categories;
            $scope.categorys = categorys;
        }
    });
    $scope.startVoting = function(){
        $scope.categoryID = $scope.categorys[0].id;
        $scope.categoryName = $scope.categorys[0].name;
        $scope.categoryDesc = $scope.categorys[0].description;
        $scope.showInstructions = false;
        $timeout(function(){
            $scope.hasStarted = true;
        }, 600);
        
    };


    $scope.vote = function(uuid){
        SweetAlert.swal({
                title: "Are you sure?",
                text: "You will only be able to vote for this category once!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, vote!",
                closeOnConfirm: false},
            function(isConfirmed){
                if(!isConfirmed) {
                    return;
                }
                $http({
                    method: 'POST',
                    url: '/vote/vote',
                    data: {
                        '_token': $scope.csrf,
                        'mod': uuid,
                        'category': $scope.categoryID,
                    }
                }).then(function callback(response){
                    var response = response.data;
                    if(response.success === true){
                        SweetAlert.swal("Done", "Voted!", "success");
                        $scope.hasStarted = false;
                        $scope.currentCategory++;
                        console.log( $scope.currentCategory);
                        console.log($scope.categorys.length);
                        if($scope.currentCategory >= $scope.categorys.length){
                            $window.scroll(0, 0);
                            $scope.finished = true;
                        }else {
                            $scope.categoryID = $scope.categorys[$scope.currentCategory].id;
                            $scope.categoryName = $scope.categorys[$scope.currentCategory].name;
                            $scope.categoryDesc = $scope.categorys[$scope.currentCategory].description;
                            $window.scroll(0, 0);
                            $timeout(function () {
                                $scope.hasStarted = true;
                            }, 600);
                        }
                    }else{
                        SweetAlert.swal({
                            title: "Uh oh!",
                            text: response.error,
                            type: "error",
                            showCancelButton: true,
                            cancelButtonText: "Skip",
                            closeOnCancel: true}, function(isConfirm){
                                if(isConfirm){
                                    $window.location.href = '/';
                                }else{
                                    $scope.hasStarted = false;
                                    $scope.currentCategory++;
                                    console.log( $scope.currentCategory);
                                    console.log($scope.categorys.length);
                                    if($scope.currentCategory >= $scope.categorys.length){
                                        $window.scroll(0, 0);
                                        $scope.finished = true;
                                    }else {
                                        $scope.categoryID = $scope.categorys[$scope.currentCategory].id;
                                        $scope.categoryName = $scope.categorys[$scope.currentCategory].name;
                                        $scope.categoryDesc = $scope.categorys[$scope.currentCategory].description;
                                        $window.scroll(0, 0);
                                        $timeout(function () {
                                            $scope.hasStarted = true;
                                        }, 600);
                                    }
                                }
                        });
                    }
                });
            });
    };
});
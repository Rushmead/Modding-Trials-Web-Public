var app = angular.module('moddingtrials');

app.controller('EntryController', function ($scope, $http) {
    $scope.formData = [];
    $scope.globalAlerts = [];
    $scope.alerts = [];
    $scope.validData = [];
    $scope.isIndividual = false;
    $scope.isTeam = false;
    $scope.individual = function () {
        $scope.isIndividual = true;
        $scope.isTeam = false;
    };
    $scope.team = function () {
        $scope.isIndividual = false;
        $scope.isTeam = true;
    };

    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $scope.indSubmit = function () {
        $scope.alerts =[];
        var shouldContinue = true;
        console.log($scope.formData.username);
        if (!$scope.formData.email || $scope.formData.email.indexOf('@') == -1 || $scope.formData.email.indexOf('.') == -1) {
            $scope.alerts.push({
                type: 'danger',
                msg: 'Please enter a valid email'
            });
            $scope.validData.email = "has-error";
            shouldContinue = false;
        } else {
            if ($scope.validData.email) {
                $scope.validData.email = "";
                shouldContinue = true;
            }
        }
        if($scope.isIndividual){
            if (!$scope.formData.username) {
                $scope.alerts.push({
                    type: 'danger',
                    msg: 'Please enter a valid username'
                });
                $scope.validData.username = "has-error";
                shouldContinue = false;
            } else {
                if ($scope.validData.username) {
                    $scope.validData.username = "";
                    shouldContinue = true;
                }
            }
        }
        if (!$scope.formData.source) {
            $scope.alerts.push({
                type: 'danger',
                msg: 'Please enter a valid source url'
            });
            $scope.validData.source = "has-error";
            shouldContinue = false;
        } else {
            if ($scope.validData.source) {
                $scope.validData.source = "";
                shouldContinue = true;
            }
        }
        if (!$scope.formData.use) {
            $scope.alerts.push({
                type: 'danger',
                msg: 'You must agree to allowing The Modding Trials to distribute the mod you create'
            });
            $scope.validData.useYes = "has-error";
            shouldContinue = false;
        }
        else {
            if (!$scope.formData.use.yes) {
                $scope.alerts.push({
                    type: 'danger',
                    msg: 'You must agree to allowing The Modding Trials to distribute the mod you create'
                });
                $scope.validData.useYes = "has-error";
                shouldContinue = false;
            }
            if ($scope.validData.useYes) {
                $scope.validData.useYes = "";
                shouldContinue = true;
            }
        }
        if (!$scope.formData.rules) {
            $scope.alerts.push({
                type: 'danger',
                msg: 'You must agree to the rules!'
            });
            $scope.validData.rulesYes = "has-error";
            shouldContinue = false;
        }
        else {
            if (!$scope.formData.rules.yes) {
                $scope.alerts.push({
                    type: 'danger',
                    msg: 'You must agree to the rules!'
                });
                $scope.validData.rulesYes = "has-error";
                shouldContinue = false;
            }
            if ($scope.validData.rulesYes) {
                $scope.validData.rulesYes = "";
                shouldContinue = true;
            }
        }

        if($scope.isTeam){
            if (!$scope.formData.members) {
                $scope.alerts.push({
                    type: 'danger',
                    msg: 'You must add some members'
                });
                $scope.validData.members = "has-error";
                shouldContinue = false;
            }
            else {
                if ($scope.validData.members) {
                    $scope.validData.members = "";
                    shouldContinue = true;
                }
            }
            if (!$scope.formData.teamName) {
                $scope.alerts.push({
                    type: 'danger',
                    msg: 'You must enter a team name'
                });
                $scope.validData.teamName = "has-error";
                shouldContinue = false;
            }
            else {
                if ($scope.validData.teamName) {
                    $scope.validData.teamName = "";
                    shouldContinue = true;
                }
            }
            if (shouldContinue) {
                $scope.isTeam = false;
                $http({
                    method: 'POST',
                    url: '/enter/entry',
                    data: {
                        'type': 'team',
                        'members': $scope.formData.members,
                        'email': $scope.formData.email,
                        'source': $scope.formData.source,
                        'stream': $scope.formData.stream,
                        'name': $scope.formData.teamName,
                    }
                }).then(function callback(response){
                    var response = response.data;
                    if(response.success === true){
                        $scope.alerts.push({
                            type: 'success',
                            msg: 'Succesfully entered!'
                        });
                    }else {
                        $scope.alerts.push({
                            type: 'danger',
                            msg: response.error
                        });
                    }
                });
            }
        }else {
            if (shouldContinue) {
                $scope.isIndividual = false;
                $http({
                    method: 'POST',
                    url: '/enter/entry',
                    data: {
                        'type': 'ind',
                        'username': $scope.formData.username,
                        'email': $scope.formData.email,
                        'source': $scope.formData.source,
                        'stream': $scope.formData.stream,
                    }
                }).then(function callback(response){
                    var response = response.data;
                    if(response.success === true){
                    $scope.alerts.push({
                        type: 'success',
                        msg: 'Succesfully entered!'
                    });
                    }else {
                        $scope.alerts.push({
                            type: 'danger',
                            msg: response.error
                        });
                    }
                });
            }
        }
    };
});
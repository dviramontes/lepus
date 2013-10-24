'use strict';

angular.module('lepusApp').controller('ViewCtrl', function ($scope, FormService, $routeParams, $http) {
    $scope.form = {};
    // read form with given id
    
    FormService.form($routeParams.form)
        .then(function(form) {
            $scope.form = form;
            // console.log(form);
            if($routeParams.id){
                $http({
                    method: 'GET',
                    url:     './service/submissions/' + $routeParams.id
                }).
                success(function(data, status, headers, config) {
                    _.each($scope.form.fields, function(field){
                        var element = _.first(_.where(data.submission.data, {key: field.name}));
                        if(!_.isUndefined(element)){
                            field.value = element.value;
                        }
                    });
                });
            }
        });

});
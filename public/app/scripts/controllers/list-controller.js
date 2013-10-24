'use strict';

angular.module('lepusApp').controller('ListCtrl', function ($scope, FormService, $routeParams, $http, IceService, $location) {
    
    $scope.columns = 'submitter,slug,version'.split(',');

    $scope.loadForm = function (form, id){
        // console.log(form);
        $location.path( "/forms/" + form + "/" + id );
    };
    
    $http.get('/service/forms/' + $routeParams.name).
      success(function(data, status, headers, config) {
        $scope.form = data.form;
      }).
      error(function(data, status, headers, config){
        console.log(data);
      });

    $http.get('/service/submissions/?form=' + $routeParams.name + '&action=submit').
        success(function(data, status, headers, config){
            console.log(data.submissions);
            $scope.submissions = data.submissions;
        }).
        error(function(data, status, headers, config){

        });    
});
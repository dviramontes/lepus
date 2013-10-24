'use strict';

angular.module('lepusApp').directive('formDirective', function (IceService, FlashService, AuthenticationService, $http) {
    return {
        controller: function($scope, IceService){
            $scope.compileSlug = function( callback ){
                var fields = {};
                _.each($scope.form.fields, function(field){
                    fields[field.name] = IceService.thaw(field.field_value).trim().replace(' ','-');
                });
                var slug = _.template($scope.form.slug_template, fields).toUpperCase();
                callback(slug);
                return $scope.getSubmissionCount(slug, callback);
            };

            $scope.getSubmissionCount = function( slug, callback ) {
                $http({
                    method: 'GET',
                    url:     '/service/submissions/?slug=' + slug
                }).
                success(function(data, status, headers, config) {
                    console.log(data)
                    callback(slug + '-'+ (data.submissions.length + 1));
                });
            };

            $scope.submit = function(){
                $scope.form.action = 'submit';

                // increment the major version, reset minor version to 0
                if(_.isUndefined($scope.form.submission_version)){
                    $scope.form.submission_version = 0;
                } 
                $scope.form.submission_version = '' + Math.floor( parseFloat( $scope.form.submission_version ) + 1);
                $scope.compileSlug($scope.saveToServer);
            };

            $scope.save = function(){
                $scope.form.action = 'save';

                // increment the minor version, leave the major version 
                if(_.isUndefined($scope.form.submission_version)){
                    $scope.form.submission_version = '0.0';
                } 
                var num = String.prototype.match.call($scope.form.submission_version, /(\d+)(?:\.?)(\d*)?/);
                $scope.form.submission_version = num[1] + '.' + ( 1 + ( parseInt( num[2] ) || 0 ) );
                $scope.compileSlug($scope.saveToServer);

            };

            $scope.saveToServer = function(slug){
                if(_.isUndefined($scope.form.slug) || $scope.form.slug === 'slug'){
                    $scope.form.slug = slug;
                }

                if(_.isUndefined($scope.form.submitter)){
                    $scope.form.submitter = 'Default User';//AuthenticationService.user.username;
                }

                console.dir($scope.form);
                var url = '/service/submissions',
                // var url = '/forms/public/index.php/service/submissions',
                    method = 'post';
                $http({
                    method: method,
                    url:     url,
                    data:    $scope.form
                }).
                    success(function(data, status, headers, config) {
                        FlashService.show(_.template("Your form (<%= label %>) has been saved. It will be sent to the appropriate people for approval.", $scope.form));
                        console.log(data);
                    }).
                    error(function(data, status, headers, config){
                        console.log(JSON.stringify($scope.form));
                        FlashService.show("There was an error processing your form.");
                    });
            };

            // $http.post('/forms/public/index.php/service/submissions/');

            $scope.cancel = function(){
                alert('Form canceled..');

            };
        },
        templateUrl: 'app/views/directives/form.html',
        restrict: 'E',
        scope: {
            form:'='
        },
        link: function(scope, element, attrs){
            setTimeout(function(){
                IceService.init();                        
            }, 1000);
        }
    };
  });
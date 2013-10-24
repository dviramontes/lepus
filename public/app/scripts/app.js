'use strict';

angular.module('lepusApp', [
  'ngCookies',
  'ngResource',
  'ngSanitize',
  'contenteditable'
])
  .config(function ($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'app/views/main.html',
        controller: 'MainCtrl'
      })
      .when('/forms/:name', {
        templateUrl: 'app/views/listForm.html',
        controller: 'ListCtrl'
      })
      .when('/forms/:form/new', {
        templateUrl: 'app/views/viewForm.html',
        controller: 'ViewCtrl'
      })
      .when('/forms/:form/:id', {
        templateUrl: 'app/views/viewForm.html',
        controller: 'ViewCtrl'
      })
      .otherwise({
        redirectTo: '/'
      });
  });

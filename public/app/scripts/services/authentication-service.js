'use strict';
angular.module('lepusApp').factory("AuthenticationService", function($http, $sanitize, SessionService, FlashService, $location, CSRF_TOKEN) {

  var cacheSession = function(user) {
    SessionService.set('authenticated', true);
    SessionService.set('user', JSON.stringify(user));
  };

  var uncacheSession = function() {
    SessionService.unset('authenticated');
  };

  var loginError = function(response) {
    FlashService.show(response.flash);
  };

  var sanitizeCredentials = function(credentials) {
    return {
      username: $sanitize(credentials.username),
      password: $sanitize(credentials.password),
      csrf_token: CSRF_TOKEN
    };
  };

  return {
    login: function(credentials) {
      // var login = $http.post("/forms/public/index.php/service/auth", sanitizeCredentials(credentials));
      var login = $http.post("/auth/login", sanitizeCredentials(credentials));
      login.success(cacheSession);
      login.success(FlashService.clear);
      login.error(loginError);
      return login;
    },
    logout: function() {
      var logout = $http.get("/auth/logout");
      // var logout = $http.get("/forms/public/index.php/service/auth/logout");
      logout.success(uncacheSession);
      $location.path('/login');
      return logout;
    },
    isLoggedIn: function() {
      return SessionService.get('authenticated');
    }, 
    user: JSON.parse(SessionService.get('user'))
  };
});
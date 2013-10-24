'use strict';

angular.module('lepusApp').directive('fieldDirective', function ($http, $compile) {

        var getTemplateUrl = function(field) {
            var type = field.type;
            var templateUrl = '';

            switch(type) {
                case 'contenteditable':
                    templateUrl = 'app/views/directives/fields/contenteditable.html';
                    break;
                case 'checkbox':
                    templateUrl = 'app/views/directives/fields/checkbox.html';
                    break;
                case 'hidden':
                    templateUrl = 'app/views/directives/fields/hidden.html';
                    break;
                case 'radio':
                    templateUrl = 'app/views/directives/fields/radio.html';
                    break;
                case 'select':
                    templateUrl = 'app/views/directives/fields/select.html';
                    break;
                case 'paragraph':
                    templateUrl = 'app/views/directives/fields/paragraph.html';
                    break;
                case 'text':
                    templateUrl = 'app/views/directives/fields/text.html';
                    break;
            }
            return templateUrl;
        }

        var linker = function(scope, element) {
            // GET template content from path
            var templateUrl = getTemplateUrl(scope.field);
            $http.get(templateUrl).success(function(data) {
                element.html(data);
                $compile(element.contents())(scope);
            });
        }

        return {
            template: '<div>{{field}}</div>',
            restrict: 'E',
            scope: {
                field:'='
            },
            link: linker
        };
  });
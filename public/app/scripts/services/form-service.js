'use strict';
angular.module('lepusApp').service('FormService', function FormService($http) {
    return {
        fields: [{
            name: 'contenteditable',
            value: 'Text Area w/ Tracking'
        }, {
            name: 'radio',
            value: 'Radio Buttons'
        }, {
            name: 'checkbox',
            value: 'Checkbox'
        }],
        form: function(id) {
            return $http.get('./service/forms/' + id).then(function(response) {
                return response.data.form;
            });
        },
        forms: function() {
            return $http.get('./service/forms/').then(function(response) {
                return response.data;
            });
        }
    };
}); 
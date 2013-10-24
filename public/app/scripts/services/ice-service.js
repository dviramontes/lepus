'use strict';
angular.module('lepusApp').factory("IceService", function() {
  return {
    thaw: function(iceString){
      var bucket = document.createElement('div');
      bucket.innerHTML = iceString;
      var element = bucket.firstChild;
      _.each(bucket.getElementsByClassName('del'), function(cell){
        element.removeChild(cell);
      })
      return element.textContent;
    },
    frost: function(thawedString){
      return '<p>' + thawedString + '</p>';
    },
    init: function() {
      console.log('brrrrrr...');
      var trackElements = document.getElementsByClassName('track');
      _.each(trackElements, function(trackElement){
          window.tracker = new ice.InlineChangeEditor({
              element: trackElement,
              handleEvents: true,
              currentUser: {
                  id: 11,
                  name: 'Aaron T. Maturen'
              }
          }).startTracking(); 
      });
    }
  }
});
'use strict';

/* Controllers */

var bananaApp = angular.module('bananaApp', []);
bananaApp.config(function($interpolateProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});
bananaApp.controller('SweetyListCtrl', function($scope, $http) {
  $http.get('/sweeties').success(function(data) {
    $scope.sweeties = data;
  });
});

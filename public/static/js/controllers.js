'use strict';

/* Controllers */

var bananaApp = angular.module('bananaApp', ['ngRoute']);

bananaApp.config(function($interpolateProvider, $routeProvider, $locationProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');

  $routeProvider
   .when('/', {
    templateUrl: '/templates/sweeties.html',
    controller: 'SweetyListCtrl'
  })

  $locationProvider.html5Mode(true);
});

bananaApp.service('basketService', function() {

  var self = this;
  self.selectedServices = [];
  self.total = 0;
  self.formattedTotal = function() {
    return '£' + self.total.toFixed(2);
  };

  this.getItems = function() {
    return self.selectedServices;
  }
  this.addItem = function(item) {
    if (_.contains(self.selectedServices, item)) {
      var existing = _.where(self.selectedServices, { 'id' : item.id })[0];
      existing.quantity++;
    } else {
      item.quantity = 1;
      self.selectedServices.push(item);
    }
  }
  this.removeItem = function(item) {
    self.selectedServices = _.reject(self.selectedServices, function(service) {
      return service.id === service.id;
    });
  }
  this.updateTotal = function() {
    var total = 0.0;
    self.selectedServices.forEach(function(service) {
      total += (parseFloat(service.price) * parseInt(service.quantity));
    });
    self.total = total;
  }
});

bananaApp.controller('SweetyListCtrl', function($scope, $http, $routeParams, $location, basketService) {
  $scope.filters = ['all', 'fruit', 'dinner', 'snack', 'daytime'];
  $scope.selectedFilter = $routeParams.type || 'all';

  $http.get('/sweeties?type='+$scope.selectedFilter).success(function(data) {
    $scope.sweeties = data;
  });

  $scope.addToBasket = function(item) {
    basketService.addItem(item);
    basketService.updateTotal();
  }
  $scope.changeFilter = function(filter) {
    $scope.selectedFilter = filter;
    $location.search('type', filter);
  }
});

bananaApp.controller('BasketCtrl', function($scope, $http, basketService) {
  $scope.items = basketService.getItems();
  $scope.basketService = basketService;
});

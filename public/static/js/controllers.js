'use strict';

/* Controllers */

var bananaApp = angular.module('bananaApp', []);

bananaApp.config(function($interpolateProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});

bananaApp.service('basketService', function() {

  var self = this;
  self.selectedServices = [];
  self.total = 0;

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
  this.getTotal = function() {
    return self.total;
  }
});

bananaApp.controller('SweetyListCtrl', function($scope, $http, basketService) {
  $http.get('/sweeties').success(function(data) {
    $scope.sweeties = data;
  });
  $scope.addToBasket = function(item) {
    basketService.addItem(item);
    basketService.updateTotal();
  }
});

bananaApp.controller('BasketCtrl', function($scope, $http, basketService) {
  $scope.items = basketService.getItems();
  $scope.total = basketService.getTotal();
  $scope.basketService = basketService;
});

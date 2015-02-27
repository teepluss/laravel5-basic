// Custom angular  tag
var myApp = angular.module('myApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

myApp.controller('MyController', ['$scope', '$http', function($scope, $http) {
    $scope.qty = 1;
    $scope.cost = 1;

    $scope.customer = {
        name: 'Tee',
        address: '770/50'
    };

    $scope.users = [];

    $http.get('/api/v1/users').
        success(function(data) {
            $scope.users = data.users;
        });

    $scope.say = function(v) {
        alert(v.name + ' ' + v.lastname);
    }
}])
.directive('myCustomer', function() {
    return {
        templateUrl: '/jsviews/my-customer.html'
    };
});
// blogs
// Products Script
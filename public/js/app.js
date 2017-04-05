(function(){
	var restaurantApp = angular.module('restaurantApp', ['ngRoute','ui.bootstrap', 'angularFileUpload', 'ngAnimate', 'toaster']);
		restaurantApp.config(function($routeProvider, $locationProvider){
			$routeProvider.
				when('/', {
					controller : 'indexController',
					templateUrl : 'templates/index.html'  
				}).
				otherwise({
					redirectTo: '/'
				});

				// $locationProvider.html5Mode(true);
		});
})();
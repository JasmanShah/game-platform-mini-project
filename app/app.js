'use strict';

// Declare app level module which depends on views, and core components
const app = angular.module('myApp', ['ngRoute','myApp.version', 'ui.router'])
.run(function ($transitions) {

  $transitions.onFinish({}, (transition) => {
    transition.router.stateService.target('view1');
  });
})
.config(($locationProvider, $routeProvider, $stateProvider, $urlRouterProvider) => {
  
  $routeProvider.when('/view1', {
    templateUrl: 'view1/view1.html',
    controller: 'View1Ctrl'
  });

  $routeProvider.when('/view2', {
    templateUrl: 'view2/view2.html',
    controller: 'View2Ctrl'
  });

  $routeProvider.when('/home', {
    templateUrl: 'view/homepage.html',
    controller: ''
  });

  $locationProvider.hashPrefix('!');
  $routeProvider.otherwise({redirectTo: '/home'});

  // $stateProvider
  //     .state('app.view1', {
  //       abstract: true,
  //       templateUrl: 'views/view1.html',
  //       controller: 'View1Ctrl',
  //       access: {
  //         restricted: false,
  //       },
  //     })
  //     .state('app.view2', {
  //       abstract: true,
  //       templateUrl: 'views/view2.html',
  //       controller: 'View2Ctrl',
  //       access: {
  //         restricted: false,
  //       },
  //     })

  // $urlRouterProvider.otherwise('/view1');
  // $locationProvider.html5Mode(true);
  // $locationProvider.hashPrefix('!');
});

'use strict';

// Declare app level module which depends on views, and core components
const app = angular.module('myApp', ['ngRoute','myApp.version', 'ui.router'])
.run(function ($transitions) {

  $transitions.onFinish({}, (transition) => {
    transition.router.stateService.target('home');
  });
})
.config(($locationProvider, $routeProvider, $stateProvider, $urlRouterProvider) => {
  
  $routeProvider.when('/view1', {
    templateUrl: 'webapp/view/view1.html',
    controller: 'View1Ctrl'
  });

  $routeProvider.when('/view2', {
    templateUrl: 'webapp/view/view2.html',
    controller: 'View2Ctrl'
  });

  $routeProvider.when('/home', {
    templateUrl: 'webapp/view/homepage.html',
    controller: ''
  });

  $routeProvider.when('/login', {
    templateUrl: 'webapp/view/login.html',
    controller: ''
  });

  $routeProvider.when('/register', {
    templateUrl: 'webapp/view/register.html',
    controller: ''
  });

  $routeProvider.when('/author', {
    templateUrl: 'webapp/view/author.html',
    controller: ''
  });

  $routeProvider.when('/create', {
    templateUrl: 'webapp/view/create.html',
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

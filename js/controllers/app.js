var contactApp = new angular.module('contactApp', []);

contactApp.controller('MyController', function($scope, $http){
    $http.get("http://yodas.brain/contact-form/js/model/data.json")
         .success( function(magic){ $scope.contactForm = magic.fields; });
});

contactApp.controller('Errors', function($scope, $http){
    $http.get("http://yodas.brain/contact-form/js/model/data.json")
         .success( function(magic){ $scope.messages = magic.messages; });
});


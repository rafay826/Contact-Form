var contactApp = new angular.module('contactApp', []);

contactApp.controller('MyController', function MyController($scope){
    
    $scope.fieldNames = 
    {
        'field1' : 'Full Name',
        'field2' : 'Email',
        'field3' : 'subject',
        'field4' : 'message'
    }

});
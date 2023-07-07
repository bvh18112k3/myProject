<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Nhúng thư viện angualarjs -->
    <script src="../app/views/angular.min.js"></script>
    <script src="https://kit.fontawesome.com/6ba3b6b4f0.js" crossorigin="anonymous"></script>
</head>

<div ng-app="myApp" ng-controller="myCtrl">
    {{welcome}}
    First Name: <input type="text" ng-model="firstName"><br>
    Last Name: <input type="text" ng-model="lastName"><br>
    <br>
    Full Name: {{firstName + " " + lastName}}

</div>

<script>
    var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope) {
        $scope.welcome = "Huy"
        $scope.firstName = "John";
        $scope.lastName = "Doe";
    });
</script>

</html>
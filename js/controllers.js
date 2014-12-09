var awesomeApp = angular.module('awesomeApp', ['angularUtils.directives.dirPagination']);

awesomeApp.controller('ArtistListCtrl', function ($scope,$http) {
    var site = "";
    var page = "includes/artists_json.php";
    $scope.currentPage = 1;
    $scope.pageSize = 3;
    $http.get(site + page)
        .success(function(response) {$scope.artists = response;});
} );



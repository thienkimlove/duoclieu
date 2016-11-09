var app = angular.module("myApp", []);
app.controller("SearchController", function ($scope, $http) {

    $scope.medicineList = ["Chọn cây thuốc..."];
    $scope.diseaseList = ["Chọn loại bệnh..."];

    $http.defaults.headers.common['Content-Type'] = 'application/json; charset=utf-8';
    $http.get('/api/posts').
    success(function(data, status, headers, config) {

        for (var i = 0; i < data.length; i ++) {
            if (data[i].type == 'disease') {
                $scope.diseaseList.push(data[i].title);
            }
            if (data[i].type == 'medicine') {
                $scope.medicineList.push(data[i].title);
            }
        }
    }).
    error(function(data, status, headers, config) {
        // log error
    });
});
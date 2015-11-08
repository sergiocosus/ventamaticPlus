Ventamatic.factory('Category', function($http) {
    Category = {};
    var PATH =API_PATH+ 'category';
    Category.get = function () {
        return $http.get(PATH).then(function (response) {
            return  response.data;
        });
    };
    return Category;
});
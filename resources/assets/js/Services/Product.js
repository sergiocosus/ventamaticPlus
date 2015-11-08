Ventamatic.factory('Product', function($http) {
    User = {};
    var PATH = API_PATH+'product';
    User.get = function (category_id,search) {
        var request = {
            url: PATH,
            method: "GET",
            params: {
                category_id:category_id,
                search: search
            }
        };
        return $http(request).then(function (response) {
            return  response.data;
        });
    };

    User.decrease=function(id){
        return $http.get('product/decrease/'+id).then(function (response) {
            return response.data;
        });
    };;

    return User;
});
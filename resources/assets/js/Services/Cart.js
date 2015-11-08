Ventamatic.factory('Cart', function($http) {
    Cart = {};
    var PATH = API_PATH+'cart';
    Cart.get = function () {
        var request = {
            url: PATH,
            method: "GET"
        };
        return $http(request).then(function (response) {
            return  response.data;
        });
    };

    Cart.add=function(product_id, quantity){
        var request = {
            url: PATH+'/'+product_id+'/'+quantity+'',
            method: "POST"
        };
        return $http(request).then(function (response) {
            console.log(response);
            return response.data;
        });
    };

    Cart.destroy = function(){
        var request = {
            url: PATH+'/destroy',
            method: "DELETE"
        };
        console.log(request);
        return $http(request).then(function (response) {
            console.trace(response);
            return response.data;
        });
    }



    return Cart;
});
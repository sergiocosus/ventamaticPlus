Ventamatic.factory('Sell', function($http) {
    User = {};
    var PATH = API_PATH+'sell';
    User.make = function () {
        var request = {
            url: PATH,
            method: "GET"
        };
        return $http(request).then(function (response) {
            console.log(response);
            return  response.data;
        });
    };

    User.sales = function(){
        var request = {
            url: PATH+'/sales',
            method: "GET"
        };
        return $http(request).then(function (response) {
            console.log(response);
            return  response.data;
        });
    };



    return User;
});
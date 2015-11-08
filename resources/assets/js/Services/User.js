Ventamatic.factory('UserService', function($http) {
    UserService = {};
    var PATH = API_PATH+'user/current';
    UserService.current = function () {
        var request = {
            url: PATH,
            method: "GET"
        };
        return $http(request).then(function (response) {
            return  response.data;
        });
    };

    return UserService;
});
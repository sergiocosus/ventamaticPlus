Ventamatic.factory('UserSession', function($http) {
    UserSession = {};
    var PATH = API_PATH+'user-session';
    UserSession.get = function () {
        var request = {
            url: PATH,
            method: "GET"
        };
        return $http(request).then(function (response) {
            return  response.data;
        });
    };
    return UserSession;
});
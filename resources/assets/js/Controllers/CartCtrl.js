Ventamatic.controller('cart', function($scope, Cart) {
    Cart.updateController= function(){
        Cart.get().then(function(products){
            console.log(products);
            $scope.products =products;
            $scope.total = total();
        })
    };

    function total(){
        var total=0;
        for(var index in $scope.products){
            var product = $scope.products[index];
            total += product.price*product.quantity;
        }
        return total;
    }

    $scope.destroy = function () {
        console.log("Destroing cart");
        Cart.destroy().then(function(){
            Cart.updateController();
        });
    };

    Cart.updateController();
});
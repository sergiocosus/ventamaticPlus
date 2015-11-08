var scopes=null;

Ventamatic.controller('Sell', function($scope, $http, Product, Sell, Cart, UserService) {
    scopes = $scope;
    $scope.user ={name:'nooo',lastname:'No de nuez'};
    Cart.updateController= function(){
        console.log("Obteniendo productos");
        Cart.get().then(function(products){
            console.log("Productos obtenidos");
            console.log(products);
            $scope.products = products;
            $scope.total = total();

        });

    };

    UserService.current().then(function(data){
        $scope.user = data;
    });

    Sell.sales().then(function(data){
        $scope.sales=data;
    });

    function total(){
        var total=0;
        for(var index in $scope.products){
            var product = $scope.products[index];
            total += product.price*product.quantity;
        }
        return total;
    }
    $scope.sell = function(){
        console.log("Comprando");


        Sell.make().then(function(data){
            if(data.success) {
                if(window.confirm("Compra realizada, ¿Desea imprimir su comprobante chido?")){
                    window.print();
                }

            }else{
                alert("Su carrito está vacío");
            }
            Cart.destroy().then(function(){
                Cart.updateController();
                setTimeout(function() {
                    console.log("updating");
                    location.reload();
                }, 500);
            });

        });
    };
    $scope.date = (new Date()).toLocaleString();
    Cart.updateController();
});
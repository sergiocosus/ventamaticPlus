
Ventamatic.controller('product', function($scope, $http, Product, Category, Cart) {
    $scope.selected_category = input.category_id || null;
    $scope.search = input.search || null;

    $scope.buy = function(product){
        console.log(product);
        Cart.add(product.id,product.quantity).then(function(data){
            if(data.success){
               // product.branches[0].pivot.stock-=product.quantity;
                Cart.updateController();
                notyInfo("Producto agregado al carrito");
            } else{
                notyError("Ha sucedido un error");
            }
        });
    };

    $scope.initCategory = function(category_id){
        $scope.current = $scope.categories.filter(function (element) {
            return element.id == this;
        }, category_id)[0];
    };

    $scope.onSearch = function(){
        $scope.initCategory($scope.selected_category);
        Product.get($scope.selected_category, $scope.search).then(function(products){
            products.forEach(function(element){
                element.quantity=1;
            });
            $scope.products = products;
        })
    };

    Category.get().then(function(categories){
        $scope.categories = categories;
        $scope.onSearch();
    });
});
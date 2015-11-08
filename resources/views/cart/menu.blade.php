
<section id="cart-menu" class=" hover-menu hide " ng-controller="cart">
    <figure></figure>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="product in products">
                <td ng-bind="product.name"></td>
                <td ng-bind="product.price | currency"></td>
                <td ng-bind="product.quantity"></td>
                <td ng-bind="product.quantity * product.price | currency"></td>
            </tr>
        </tbody>
        <tfoot>
            <td colspan="2"></td>
            <td>Total</td>
            <td ng-bind="total | currency"></td>
        </tfoot>
    </table>
    <a  href="/sell" class="button">
        <img style="height: 30px" src="/img/icon/money146.png"/>
        Pagar ahora
    </a>

    <span ng-click="destroy()" href="/api/v1/cart/destroy" class="button">
        <img style="height: 30px" src="/img/icon/delete84.png"/>
        Vaciar Carrito
    </span>
</section>
<style>

    #cart-menu{
        max-width: 600px;
    }
    #cart-menu>table, .cart-table{
        width: 100%;
        border: white thin solid;
        background-color: rgba(0,0,0,.5);
    }

    #cart-menu>table thead,.cart-table thead{
        background-color: rgba(0,0,0,.5);
        font-weight: bold;
    }

    #cart-menu>table tr,.cart-table tr {
        border: white thin solid;
        background-color: rgba(255,255,255,.3);
    }

    #cart-menu>table tr:nth-child(odd),.cart-table tr:nth-child(odd){
        background-color: rgba(255,255,255,.2);
    }

    #cart-menu>table td, #cart-menu>table th, .cart-table th,  .cart-table td{
        border: white thin solid;
    }
</style>

<script>
    var $userButton = $('#cart-button');
    var $loginMenu = $('#cart-menu');

    $userButton.hover(function(){
        $loginMenu.removeClass('hide');
    },function(){
        $loginMenu.addClass('hide');
    });
</script>
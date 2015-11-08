@extends('index')

@section('content')
<div ng-controller="Sell" class="pay">

<table ng-repeat="sale in sales" class="cart-table">
    <p>@{{sale.created_at}}</p>
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

<span ng-click="sell()"  class="button">
    <img style="height: 30px" src="/img/icon/money146.png"/>
    <span style="vertical-align: middle">¡Pagar ahora!</span>
</span>

</div>

<style>
    .pay{
        background-color: mediumseagreen;
        padding: 20px;
        color: white;
    }
</style>

@endsection
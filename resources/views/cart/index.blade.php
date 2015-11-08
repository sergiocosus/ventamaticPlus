@extends('index')

@section('content')
<div ng-controller="Sell" class="pay">

<table class="cart-table">
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

@section('footer')
    <div class="print" ng-controller="Sell">
        <h1>Ventamatic</h1>
        <h2>Comprobante de venta</h2>
        <table>
            <tr>
                <td>Id:</td>
                <td>@{{user.id}}</td>
            </tr>
            <tr>
                <td>Nombre:</td>
                <td>@{{user.name + " " + user.lastname}}</td>
            </tr>
            <tr>
                <td>Fecha:</td>
                <td>@{{ date}}</td>

            </tr>
        </table>
        <br/>
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
    </div>

@endsection
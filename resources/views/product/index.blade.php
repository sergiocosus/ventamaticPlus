@extends('index')


@section('content')
<div ng-controller="product" >
    <div>
        <h2>
            <b>Categoría:</b>
            <span ng-bind="current.name"></span>
        </h2>
        <div class="select-style">

            <select ng-model="selected_category" ng-change="onSearch()">
                <option value="">Todos</option>
                <option ng-repeat="category in categories"
                        ng-bind="category.name"
                        value="@{{category.id}}"></option>
            </select>
        </div>
    </div>

    @if(Auth::check())
        <a class="button" style="background-color: sandybrown; font-weight: bolder;"
           href="product/create">Alta de productos</a>
        <br/>
    @endif



    <div class="button busquedaOpcion">
        <span ng-show="search">
            <!--<img src="img/icon/search.svg" /> -->
            Resultados de: <span ng-bind="search"> Productos</span>
        </span>
        <span ng-hide="search">
            Escriba su búsqueda
        </span>
        <div class="hide">
            <img  src="img/icon/search.svg" />
            <input type="text"  ng-model="search" ng-change="onSearch()"
                    placeholder="¡Teclea tus deseos!" />
        </div>
    </div>

    <script>
        $busquedaOpcion = $('.busquedaOpcion');
        $spanBusquedaOpcion = $busquedaOpcion.find('span');
        $formBusquedaOpcion = $busquedaOpcion.find('div');
        $busquedaOpcion.hover(function(){
            $spanBusquedaOpcion.addClass('hide');
            $formBusquedaOpcion.removeClass('hide');
            setTimeout(function(){
                $formBusquedaOpcion.find('[ng-model="search"]').focus();
            },500);
        }, function(){
            $spanBusquedaOpcion.removeClass('hide');
            $formBusquedaOpcion.addClass('hide');
        })
    </script>

    <section class="product-list" >
        <div ng-repeat="product in products" ng-if="product.id != 12 && product.id != 14 && product.id != 15 && product.id != 25">
            <img ng-src="/resources/products/@{{product.id}}" />
            <h3 ng-bind="product.name"></h3>
            <span>
                <b>Categoría:</b>
                <span ng-bind="product.category.name"></span>
            </span>
            <br/>
            <span>
                <b>Precio:</b>
                <span ng-bind="product.branches[0].pivot.price | currency"></span>
            </span>
            <br/>
            <span>
                <b>Existencias:</b>
                <span ng-bind="product.branches[0].pivot.stock"></span></span><br/>
            <span ng-bind="product.description"></span> </br>
            </br>
            <a class="button" style="background-color: deepskyblue"
               ng-if="product.can_buy" ng-click="buy(product)">
                Añadir al carrito
            </a>
            <input  ng-if="product.can_buy"
                    ng-model="product.quantity"
                    type="number" step="1" min="@{{ (product.branches[0].pivot.stock>0)?0:1 }}"
                    max="@{{product.branches[0].pivot.stock}}"
                    style="width:50px"/>


            <div class="likeBox"
                ng-mouseover="product.showLike=true"
                ng-mouseleave="product.showLike=false">
                <span>
                    Califica <br/>el producto
                </span>
                <figure
                        ng-class="{
                        curLike1:product.like==1,
                            curLike2:product.like==2,
                            curLike3:product.like==3,
                            curLike4:product.like==4,
                            curLike5:product.like==5
                            }"
                        class="hand fontawesome-thumbs-up "></figure>
                <div ng-class="{hide:!product.showLike}"
                        class="likeSelector hover-menu">
                    <figure class="indicator"></figure>
                    <span ng-click="changeColor(product,1)" class="like1">Me encanta</span>
                    <span ng-click="changeColor(product,2)" class="like2">Me gusta</span>
                    <span ng-click="changeColor(product,3)" class="like3">Está bien</span>
                    <span ng-click="changeColor(product,4)" class="like4">Me desagrada</span>
                    <span ng-click="changeColor(product,5)" class="like5">Es horrible</span>
                    <figure class="hand fontawesome-thumbs-up"></figure>
                </div>
            </div>

        </div>
    </section>
</div>

<script>
    var input = {!! json_encode($input) !!};
</script>
    <style>
        section.product-list{
            -webkit-column-width: 300px;
            -moz-column-width: 300px;
            column-width: 300px;
        }

        section.product-list>div{
            display: inline-block;
            background-color: rgba(255,255,255,.5);
            border: darkseagreen 10px solid;
            margin: 5px;
            padding: 5px;
            border-radius: 5px;
        }

        section.product-list>div img{
            display: inline-block;
            width: 100%;
            max-height: 500px;
        }

        h2{
            font-size: 2em;
        }


    </style>

<style>
    .likeBox{
        position: relative;
        width: 100%;
        height: 70px;
        float: right;
        vertical-align: middle;
        padding: 10px;
        box-sizing: border-box;
        border-radius: 10px;
        border: 2px dimgray solid;
        background-color: rgba(200,200,200,.25);
        font-weight: bold;
    }
    .likeBox > .hand{
        width: 50px;
        color:gray;
        right: 0;
        vertical-align: middle;
        margin-top: 10px;

    }

    .likeBox > span{
        float:left;
        box-sizing: border-box;
        vertical-align: middle;
        font-size: 22px;
        width: 217px;
        color: dimgray;
    }

    .likeSelector > .indicator{
        margin-right: 25px;
    }

    .like1:hover ~ .hand, .curLike1 {
        color: rgb(0,200,0) !important;
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    .like2:hover ~ .hand, .curLike2{
        color: rgb(60,112,0) !important;
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        transform: rotate(45deg);
    }
    .like3:hover ~ .hand, .curLike3{
        color: rgb(160,160,0) !important;
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
    }
    .like4:hover ~ .hand, .curLike4{
        color: rgb(112,60,0) !important;
        -webkit-transform: rotate(135deg);
        -moz-transform: rotate(135deg);
        -ms-transform: rotate(135deg);
        -o-transform: rotate(135deg);
        transform: rotate(135deg);
    }
    .like5:hover ~ .hand, .curLike5{
        color: rgb(200,0,0) !important;
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        transform: rotate(180deg);
    }


    .likeSelector span[class^="like"]{
        text-align: center;
        width: 80%;
        right: 0;
        background-color: rgba(255,255,255,.1);
        color:dimgray;
    }

    .likeSelector span[class^="like"]:hover{
        background-color: rgba(111,111,111,.5);
    }

    .likeSelector {
        position:relative;
        display:inline-block;
        font-size: 16px;
        font-weight: bold;
        width: 300px;
        left: 0px;
        top: -20px;
        background-color: lightgray;
    }
    .likeSelector span{
        vertical-align: top;
        display: block;
    }
    .likeSelector .hand, .likeBox>.hand{
        display: inline-block;
        position:absolute;;
        float:right;
        font-size: 50px;
        height: 50px;
        width: 50px;

        border:none;
        bottom: 0;
        top: 0;
        margin-right: 10px;

        -webkit-transition: all .25s;
        -moz-transition: all .25s;
        -ms-transition: all .25s;
        -o-transition: all .25s;
        transition: all .25s;
        transform-origin: center center;
        font-weight: normal;;

/*
        text-shadow: -2px 0 white, 0 2px white, 2px 0 white, 0 -2px white;
*/
    }


</style>
@endsection
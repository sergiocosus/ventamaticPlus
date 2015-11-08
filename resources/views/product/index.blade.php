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

    <section class="product-list">
        <div ng-repeat="product in products">
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

            Cantidad: <input ng-model="product.quantity"
                             type="number" step="1" min="1" value="1" />
            </br>
            <a class="button" style="background-color: deepskyblue"
               ng-if="product.can_buy" ng-click="buy(product)">
                Añadir al producto
            </a>

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
@endsection
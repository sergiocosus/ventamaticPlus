@extends('index')

@section('content')
    <?php
        $data = json_decode(' [
                {
                    "img": "001.jpg",
                    "title" : "Computadoras",
                    "description" : "Gran variedad en laptos para todos los usos y necesidades"
                },
                {
                    "img": "002.jpg",
                    "title" : "Electrodomésticos",
                    "description" : "Todo en electrónica para el hogar,
                        la mejor calidad en la linea blanca!"
                },
                {
                    "img": "003.png",
                    "title" : "Tecnología",
                    "description" : "Al borde de la teconología con las computadora/tablet"
                },
                {
                    "img": "004.png",
                    "title" : "Entretenimiento",
                    "description" : "Todo la tecnología para  mejor para el entretenimiento del hogar"
                }
            ]
        ');

    ?>
    <div class="gallery-container">
        @include('components.slider.index',['data' => $data])
    </div>
    <div class="main-content-left">
        <div>
            <img src="/img/test/001.png" />
            <span>Calzado</span>
        </div><div>
            <img src="/img/test/002.png" />
            <span>Computadoras</span>
        </div><div>
            <img src="/img/test/003.png" />
            <span>Electrónica</span>
        </div><div>
            <img src="/img/test/004.png" />
            <span>Electrodomésticos</span>
        </div>
    </div><div class="main-content-right">
        <div class="button registro">
            <img src="/img/icon/singin.svg">
            ¡Regístrate!
        </div>
        <a href="/us">
            <div class="button nosotros">
                <img src="/img/icon/singin.svg">
                Conoce acerca de nosotros
            </div>
        </a>
        <a href="/branch">
            <div class="button branch">
                <img src="/img/icon/branch.svg">
                Sucursales
            </div>
        </a>
        <div class="button busquedaOpcion">
            <span><img src="/img/icon/singin.svg">Productos</span>
            <form action="/product" class="hide">
                <img src="img/icon/search.svg" />
                <input type="text" name="search" placeholder="¡Teclea tus deseos!" />
            </form>
        </div>
    </div>

    <script>
        $busquedaOpcion = $('.busquedaOpcion');
        $spanBusquedaOpcion = $busquedaOpcion.find('span');
        $formBusquedaOpcion = $busquedaOpcion.find('form');
        $busquedaOpcion.hover(function(){
            $spanBusquedaOpcion.addClass('hide');
            $formBusquedaOpcion.removeClass('hide');
            setTimeout(function(){
                $formBusquedaOpcion.find('[name="search"]').focus();
            },500);
        }, function(){
            $spanBusquedaOpcion.removeClass('hide');
            $formBusquedaOpcion.addClass('hide');
        })
    </script>

    <style>

        #mainContainer{
            padding-top: 1.5em;
            padding-left: 0;
            padding-right: 0;
        }
    </style>
@endsection
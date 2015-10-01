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
    <style>

        .main-content-left, .main-content-right{
            display: inline-block;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;

            vertical-align: top;
            padding: 1em;

            width: 50%;
        }

        .main-content-left>div{
            display: inline-block;
            box-sizing: border-box;
            padding: .5em;
            max-width: 45%;
            margin: 2.5%;
            background-color: palevioletred;
            border: .5em solid white;
            border-radius: 2em;
            -webkit-transition: all .5s;
            -moz-transition: all .5s;
            -ms-transition: all .5s;
            -o-transition: all .5s;
            transition: all .5s;
            color:white;
            font-weight: bold;
            font-size: 1.5em;
            cursor: pointer;
        }
        .main-content-left>div:nth-child(0){
            background-color: palevioletred
        }

        .main-content-left>div:nth-child(1){
            background-color: deepskyblue;
        }
        .main-content-left>div:nth-child(2){
            background-color: darkseagreen;
        }
        .main-content-left>div:nth-child(3){
            background-color: indianred;
        }

        .main-content-left>div:hover{
            -webkit-transform: scale(1.2, 1.2);
            -moz-transform: scale(1.2, 1.2);
            -ms-transform: scale(1.2, 1.2);
            -o-transform: scale(1.2, 1.2);
            transform: scale(1.2, 1.2);
        }

        .main-content-left>div>img{
            max-width: 100%;
        }

        @media  (max-width: 640px){
            .main-content-left, .main-content-right{
                width: 100%;
            }
            .main-content-left>div{
                border-width: .3em;
                font-size: 1em;
            }
        }

        .gallery-container{
            border-radius: 30px;
            overflow: hidden;
            border: white 0.5em solid;
        }
    </style>
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
        <button class="registro">
            <img src="/img/icon/singin.svg">
            ¡Regístrate!
        </button>
        <a href="/us">
            <button class="nosotros">
                <img src="/img/icon/singin.svg">
                Conoce acerca de nosotros
            </button>
        </a>
        <div class="button busquedaOpcion">
            <span><img src="/img/icon/singin.svg">Productos</span>
            <form action="/product" class="hide">
                <img src="img/icon/search.svg" />
                <input type="text" name="search" placeholder="¡Teclee sus deseos!" />
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
        button.registro {
            box-sizing: border-box;
            width: 80%;
            font-size: 1.5em;
            background-color: deepskyblue;
            cursor: pointer;
        }

        button.registro *{
            vertical-align: top;;
        }

        button.registro img{
            height: 1.2em;
        }

        button.registro:hover{
            color:deepskyblue;
            background-color: rgba(255,255,255,.5);
            border-color: deepskyblue;
        }


        button.nosotros {
            box-sizing: border-box;
            width: 80%;
            font-size: 1.5em;
            background-color: rgb(219, 112, 147);
            cursor: pointer;
        }

        button.nosotros *{
            vertical-align: top;;
        }

        button.nosotros img{
            height: 1.2em;
        }

        button.nosotros:hover{
            color:rgb(219, 112, 147);
            background-color: rgba(255,255,255,.5);
            border-color: rgb(219, 112, 147);
        }





        .button.busquedaOpcion{
            height: 52px;
        }

        .button.busquedaOpcion input{
            box-sizing: border-box;
            width: 100%;

            font-size: 1em;
            border-radius: 5px;
            border: none;
            padding: 5px;
        }

        .button.busquedaOpcion form img{
            position: absolute;
            box-sizing: border-box;
            top: 0;
            right: 0;
            margin-left: 5px;
            height: 100%;
            border: transparent solid 5px;
            background-color: rgb(143, 188, 143);;
            cursor: pointer;
        }

        .button.busquedaOpcion {
            position:relative;
            box-sizing: border-box;
            width: 80%;
            font-size: 1.5em;
            background-color: rgb(143, 188, 143);
            cursor: pointer;
        }
        .button.busquedaOpcion:hover{
            color: rgb(143, 188, 143);
            background-color: rgba(255,255,255, .5);
            border-color: rgb(143, 188, 143);
        }
        .button.busquedaOpcion:hover span{
            display:none;
        }


        .button.busquedaOpcion *{
            vertical-align: top;
        }

        .button.busquedaOpcion img{
            height: 1.2em;

        }



        .button.busquedaOpcion input{
            width: 100%;
            height: 40px;
            border-radius: 10px;
        }
        .button.busquedaOpcion:hover{
            color:deepskyblue;
            background-color: rgba(255,255,255,.5);
            border-color: rgb(143, 188, 143);;
        }
    </style>
@endsection
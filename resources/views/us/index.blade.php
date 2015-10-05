@extends('index')

@section('content')

<div id="us-images">
    <div>
        <img src="img/us/001.png">
    </div><div>
        <img src="img/us/002.png">
    </div><div>
        <img src="img/us/003.png">
    </div>
</div>

<div class="mision">
    <p style="margin-top:1em">
        <b>Ventamatic+</b> es una empresa dedicada a ofrecer variedad y calidad en sus
        productos a precios convenientes para el cliente. Contamos con una tienda online
        y varias sucursales físicas en el estado de Aguascalientes
    </p>
    <h3>
        <img src="img/icon/mision.svg">
        Misión
    </h3>
    <p>
        Proveer la mayor variedad y calidad de productos a nuestros clientes
        con una experiencia satisfactoria.
        Todo con base en nuestra política de ética que implica Franqueza,
        Honestidad, Veracidad y Espíritu de Servicio.
    </p>

    <h3>
        <img src="img/icon/vision.svg">
        Visión
    </h3>
    <p>
        Llevar la cobertura de todos nuestros servicios y
        productos al nivel nacional.<br/>
        Innovar en la manera de interactuar con el cliente.
    </p>

    <h3>
        <img src="img/icon/objetivo.svg">
        Objetivo
    </h3>
    <p>
        Crecer la participación en el mercado para que sea el líder en venta de
        de los productos que el cliente necesite cuando los necesite.
    </p>

    <style>
        .mision h3{
            font-size: 2.5em;
            color:#101010;
        }
        .mision p{
            color:#101010;
            margin-bottom: 2em;
            font-size: 1.5em;
        }
        .mision img{
            height: .75em;
        }
        #us-images {
            width: 100%;
            box-sizing: border-box;
            border: 1em solid white;
            border-radius: 1em;
        }
        #us-images div{
            display: inline-block;
            width: 33.333%;
        }

        #us-images div img{
            width:100%;
        }
        #mainContainer{
            max-width: 1300px;
        }
    </style>
</div>
@endsection
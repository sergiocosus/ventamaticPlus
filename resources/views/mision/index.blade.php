@extends('index')

@section('content')
<div class="mision">

    <h3>
        <img src="img/icon/mision.svg">
        Misión
    </h3>
    <p>
        Proveer la mayor vareidad y calidad de productos a nuestros clientes
        con una experiencia satisfactoria.
        Todo con base en nuestra política de ética que implica Franqueza,
        Honestidad, Veracidad y Espíritu de Servicio.
    </p>

    <h3>
        <img src="img/icon/vision.svg">
        Visión
    </h3>
    <p>
        Llevar la cobertura de todos nuestros productos al nivel nacional.
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
    </style>

</div>
@endsection
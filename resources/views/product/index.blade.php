@extends('index')


@section('content')

    @if(Auth::check())
        <a href="product/create">Alta de productos</a>

    @endif
    <?php $search = Input::get('search'); ?>
    @if(isset($search))
        Resultados de <b>"{{$search}}"</b> </br>
        Lo sentimos esto aún no jala...
    @else
        Lo sentimos u.u ... actualmente no hay productos registrados
    @endif

@endsection
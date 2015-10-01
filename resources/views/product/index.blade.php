@extends('index')


@section('content')
    <?php $search = Input::get('search'); ?>
    @if(isset($search))
        Resultados de <b>"{{$search}}"</b> </br>
        Lo sentimos esto aún no jala...
    @else
        Lo sentimos u.u ... actualmente no hay productos registrados
    @endif

@endsection
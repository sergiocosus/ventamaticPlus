@extends('index')


@section('content')

    @if(Auth::check())
        <a href="product/create">Alta de productos</a>

    @endif
    <?php $search = Input::get('search'); ?>
    @if(isset($search))
        Resultados de <b>"{{$search}}"</b> </br>
    @else
        Lo sentimos u.u ... actualmente no hay productos registrados
    @endif

    @foreach($products as $product)
        <?php
            $branch =$product->branches()->find(1);
            $pivot = $branch->pivot;
        ?>
        <div>
            <span>{{$product->name}}</span>
            <span>Categoría: {{$product->category->name}}</span>
            <span>Precio: ${{number_format($pivot->price,2)}}</span>
            <span>Existencias: {{number_format($pivot->stock,0)}}</span>


        </div>
    @endforeach
@endsection
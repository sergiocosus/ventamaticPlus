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
    <section class="product-list">
    @foreach($products as $product)
        <?php
            $branch =$product->branches()->find(1);
            $pivot = $branch->pivot;
        ?>

        <div>
            <img src="/resources/products/{{$product->id}}" />
            <h3>{{$product->name}}</h3>
            <span><b>Categoría:</b> {{$product->category->name}}</span>
            <span><b>Precio:</b> ${{number_format($pivot->price,2)}}</span>
            <span><b>Existencias:</b> {{number_format($pivot->stock,0)}}</span>
            <span>{{$product->description}}</span>
        </div>

    @endforeach
    </section>
    <style>
        section.product-list{
            display: inline-block;
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
        }
    </style>
@endsection
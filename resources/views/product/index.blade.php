@extends('index')


@section('content')
    @if($category != '')
        <h2><b>Categoría:</b> {{$category}}</h2>
    @endif
    @if(Auth::check())
        <a class="button" style="background-color: sandybrown; font-weight: bolder;"
           href="product/create">Alta de productos</a>
        <br/>
    @endif
    <?php $search = Input::get('search'); ?>
    @if(isset($search))
        Resultados de <b>"{{$search}}"</b> </br>
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
            <span><b>Categoría:</b> {{$product->category->name}}</span><br/>
            <span><b>Precio:</b> ${{number_format($pivot->price,2)}}</span><br/>
            <span><b>Existencias:</b> {{number_format($pivot->stock,0)}}</span><br/>
            <span>{{$product->description}}</span> </br>
            @if(Auth::check())
                <a href="/product/decrease/{{$product->id}}">
                    Simular Compra (Disminuir inventario)
                </a>
            @endif
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
            max-height: 500px;
        }

        h2{
            font-size: 2em;
        }


    </style>
@endsection
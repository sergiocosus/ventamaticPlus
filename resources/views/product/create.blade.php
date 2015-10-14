@extends('index')

@section('content')


@section('content')
    <form id="register" class="custom-form" method="POST" action="/product/create">
        {!! csrf_field() !!}
        <h3>Registrate :)</h3>

        <input type="text" name="name" required maxlength="200"
               value="{{ old('name') }}" placeholder="Nombre del producto">

        <div class="select-style">
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <input type="number" name="price" step="0.01" min="0" required
               placeholder="Precio"/>

        <input type="number" name="stock" step="0.005" min="0" required
               placeholder="Cantidad en inventario"/>

        <input type="number" name="minimum" step="0.005" min="0" required
               placeholder="Cantidad mínima en inventario"/>

        <div class="select-style">
            <select name="unit" required>
                <option value="U">Unidad</option>
                <option value="KG">Kilogramo</option>
                <option value="L">Litro</option>
            </select>
        </div>

        <input type="text" name="bar_code"  required maxlength="50"
               value="{{ old('bar_code') }}" placeholder="Código de barras">



        <input type="submit" value="Registar"/>

    </form>

    <style>
        #mainContainer{
            max-width: 600px;
        }

    </style>


@endsection
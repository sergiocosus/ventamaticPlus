@extends('index')

@section('content')
<form id="register" method="POST" action="/auth/register">
    {!! csrf_field() !!}
    <h3>Registrate :)</h3>
    <div>
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Nombre">
    </div>
    <div>
        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Apellido(s)">
    </div>
    <div>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
    </div>
    <div>
        <input type="text" name="username" value="{{ old('username') }}" placeholder="Nombre de usuario">
    </div>
    <div>
        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Teléfono">
    </div>
    <div>
        <input type="text" name="cell_phone" value="{{ old('cell_phone') }}" placeholder="Celular">
    </div>
    <div>
        <input type="text" name="address" value="{{ old('address') }}" placeholder="Dirección">
    </div>
    <div>
        <input type="text" name="rfc" value="{{ old('rfc') }}" placeholder="RFC">
    </div>
    <div>
        <input type="password" name="password" placeholder="Contraseña">
    </div>
    <div>
        <input type="password" name="password_confirmation" placeholder="Confirme su contraseña">
    </div>
    <div>
        <input type="submit" value="Registar"/>
    </div>
</form>

    <style>
        #mainContainer{
            max-width: 600px;
        }
        #register input{
            box-shadow: 2px 2px 5px #888888;
            max-width: 300px;
        }
        #register {

            text-align: center;
        }
        #register h3{
            font-size: 2em;
            color:darkslategrey;
        }
        
        #register input[type="submit"]{
            background-color: dodgerblue;
        }
    </style>

@endsection
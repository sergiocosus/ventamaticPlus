@extends('index')

@section('content')
<form id="register" class="custom-form" method="POST" action="/auth/register">
    {!! csrf_field() !!}
    <h3>Registrate :)</h3>
    <div>
        <input type="text" name="name" required maxlength="200"
               value="{{ old('name') }}" placeholder="Nombre">
    </div>
    <div>
        <input type="text" name="last_name" required maxlength="200"
               value="{{ old('last_name') }}" placeholder="Apellido(s)">
    </div>
    <div>
        <input type="email" name="email" required maxlength="200"
               value="{{ old('email') }}" placeholder="Email">
    </div>
    <div>
        <input type="text" name="username"  required maxlength="25"
               value="{{ old('username') }}" placeholder="Nombre de usuario">
    </div>
    <div>
        <input type="text" name="phone" maxlength="50"
               value="{{ old('phone') }}" placeholder="Teléfono">
    </div>
    <div>
        <input type="text" name="cell_phone" maxlength="50"
               value="{{ old('cell_phone') }}" placeholder="Celular">
    </div>
    <div>
        <input type="text" name="address" maxlength="100" required
               value="{{ old('address') }}" placeholder="Dirección">
    </div>
    <div>
        <input type="text" name="rfc" maxlength="13"
               value="{{ old('rfc') }}" placeholder="RFC">
    </div>
    <div>
        <input type="password" name="password" required maxlength="25"
               placeholder="Contraseña">
    </div>
    <div>
        <input type="password" name="password_confirmation" required maxlength="25"
               placeholder="Confirme su contraseña">
    </div>
    <div>
        <input type="submit" value="Registar"/>
    </div>
</form>

    <style>
        #mainContainer{
            max-width: 600px;
        }

    </style>

@endsection
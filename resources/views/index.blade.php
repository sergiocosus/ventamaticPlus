<!DOCTYPE html>
<html lang="en" ng-app="ventamatic">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,  user-scalable=no">
    <title></title>
    <link href="/css/fonts/varela_round.css" rel="stylesheet" type="text/css">
    <link href="{{ elixir('css/mix-vendor.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ elixir('css/mix-app.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ elixir('js/mix-vendor.js') }}"></script>
    <script src="{{ elixir('js/mix-app.js') }}"></script>
    <script src="{{ elixir('js/mix-services.js') }}"></script>
    <script src="{{ elixir('js/mix-controllers.js') }}"></script>
    <link href="css/icon-moon.css" rel="stylesheet" type="text/css" />
    @if(isset($input))
    <script>
        var input = {!! json_encode($input) !!};
    </script>
    @endif
    @yield('header')
</head>
<body>
    @include('topMenu.index',['numberOption' => 0])
    <section id="mainContainer">
        @yield('content','There are no content!')
    </section>
    <script src="/js/libraryDevelop/svg.js"></script>
</body>
<script>

@if($errors->has())
    var errors={!! json_encode($errors->all()) !!};
    errors.forEach(function(text){
       notyError(text);
    });
@endif

@if(session('success'))
    var success={!! json_encode(session('success')) !!};
    success.forEach(function(text){
        notySuccess(text);
    });
@endif

</script>
@yield('footer')

</html>
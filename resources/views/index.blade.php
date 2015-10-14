<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,  user-scalable=no">
    <title></title>
    <link href="{{ elixir('css/all.css') }}" rel="stylesheet" type="text/css">
    <link href="/css/fonts/varela_round.css" rel="stylesheet" type="text/css">
    <script src="{{ elixir('js/libraries.js') }}"></script>
    <script src="{{ asset('js/noty.js')}}"></script>
    <script src="{{ elixir('js/app.js') }}"></script>
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

</script>
@yield('footer')

</html>
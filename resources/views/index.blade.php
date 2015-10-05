<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,  user-scalable=no">
    <title></title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/library/jssor.css" rel="stylesheet" type="text/css">
    <script src="js/libraryDevelop/jquery-1.11.3.js"></script>
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

</script>
@yield('footer')

</html>
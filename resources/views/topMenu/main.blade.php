@extends('main')

@section('content')
<header>
    <h1>Mi Título</h1>

    <ul id="topMenuList">
    </ul>

    <script src="js/topMenu.js" ></script>
    <link href="css/headerTopMenu.css" rel="stylesheet" type="text/css">
</header>

<script>
    var options=[
        {
            title:'Tacos',
            color:'deepskyblue',
        },
        {
            title:'Gorditas',
            color:'palevioletred'
        },
        {
            title:'Enchiladas',
            color:'indianred'
        },
        {
            title:'Vegetales U.u',
            color:'darkseagreen'
        },
        {
            title:'Carbones',
            color:'yellowgreen'
        }
    ];
    var topMenu = new TopMenu(options,0);
</script>

@endsection

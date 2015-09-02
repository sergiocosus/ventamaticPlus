
<header>
    <h1></h1>
    <ul id="topMenuList"></ul>

    <script src="js/topMenu.js" ></script>
    <link href="css/headerTopMenu.css" rel="stylesheet" type="text/css">
</header>

<script>
    var options=[
        {
            title:'Inicio',
            color:'deepskyblue',
        },
        {
            title:'Servicios',
            color:'palevioletred'
        },
        {
            title:'Sucursales',
            color:'indianred'
        },
        {
            title:'Tienda en línea',
            color:'darkseagreen'
        },
        {
            title:'Otros gatos',
            color:'yellowgreen'
        }
    ];
    var topMenu = new TopMenu(options,{{$numberOption}});
</script>

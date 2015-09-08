
<header>
    <h2>Ventamatic+</h2>
    <h1></h1>
    <div id="loginButton">
        <span>Iniciar</br>Sesión</span><img class="svg fillWhite" src="img/icon/user.svg" />
    </div>
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
    var topMenu;
    $(function(){
        topMenu= new TopMenu(options,{{$numberOption}});
    });
</script>

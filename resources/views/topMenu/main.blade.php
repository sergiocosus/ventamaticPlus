
<header>
    <div id="search">
        <img class="svg fillWhite" src="img/icon/search.svg" />
    </div>

    <h2>Ventamatic+</h2>
    <div id="title">
        <div>
            <img src="/img/icon/arrow-down.svg" />
            <h1></h1>
        </div>
        <ul id="topMenuList"></ul>
    </div>
    <div id="loginButton">

        <span>Iniciar<br/>Sesión</span>
        <img class="svg fillWhite" src="img/icon/user.svg" />
    </div>


    <script src="js/topMenu.js" ></script>
    <link href="css/headerTopMenu.css" rel="stylesheet" type="text/css" />
</header>

<script>
    var options=[
        {
            title:'Inicio',
            color:'deepskyblue'
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
            title:'Productos',
            color:'darkseagreen'
        },
        {
            title:'Administración',
            color:'yellowgreen'
        }
    ];
    var topMenu;
    $(function(){
        var numberOption = {{$numberOption}};
        topMenu= new TopMenu(options,numberOption);
    });
</script>

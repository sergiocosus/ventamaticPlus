
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
        @include('components.login')
    </div>

    <script src="js/topMenu.js" ></script>
    <link href="css/headerTopMenu.css" rel="stylesheet" type="text/css" />
</header>

<script>
    var options = <?php echo json_encode($navLinks) ?>;
    var viewName = "{{$viewName}}";
    var numberOption;
    for(var i=0; i<options.length; i++){
        if(options[i].view == viewName){
            numberOption=i;
        }
    }
    var topMenu;
    $(function(){
        topMenu= new TopMenu(options,numberOption);
    });
</script>

<?php
        $current = null;
        foreach($navLinks as &$navLink){
            if($navLink->view == $viewName){
                $current = $navLink;
                break;
            }
        }
    ?>
<style>
    header{
        background-color: {{$navLink->color}};
    }
    #mainContainer {
        border-color: {{$navLink->color}};
    }

</style>

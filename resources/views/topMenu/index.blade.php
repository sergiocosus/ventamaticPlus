
<header>
    <div id="searchButton">
        <img class="svg fillWhite" src="/img/icon/search.svg" />
        @include('topMenu.search')
    </div>
    <h2>Ventamatic+</h2>
    <div id="title">
        <div>
            <img src="/img/icon/arrow-down.svg" />
            <h1></h1>
        </div>
        <ul id="topMenuList"></ul>
    </div>
    <div id="user-button">
        @if(Auth::check())
            <span>
                {{Auth::user()->name}}
                <br/>
                {{Auth::user()->last_name}}
            </span>

            <img class="svg fillWhite" src="/img/icon/user.svg" />
            @include('auth.logged-menu')
        @else
            <span>Iniciar<br/>Sesión</span>
            <img class="svg fillWhite" src="/img/icon/user.svg" />
            @include('auth.login')
        @endif
    </div>
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
    header, #login-menu {
        background-color: {{$navLink->color}};
    }
    #mainContainer {
        border-color: {{$navLink->color}};
    }

</style>

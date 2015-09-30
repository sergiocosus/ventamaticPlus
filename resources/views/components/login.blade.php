<style>
    #login{
        position: fixed;
        box-sizing: border-box;
        top: 60px;
        right: 0;
        max-width:250px;
        width: 100%;

        margin:10px;
        padding: 15px;

        border: solid 5px white;
        border-radius: 10px;
        background-color: deepskyblue ;
        color:white;

        text-align: center;
        box-shadow: 0 0 10px gray;

        -webkit-transition: all .5s;
        -moz-transition: all .5s;
        -ms-transition: all .5s;
        -o-transition: all .5s;
        transition: all .5s;


    }

    #login h3{
        text-align: center;
    }

    #login input{
        width:100%;
        box-sizing: border-box;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        margin: 2px;
        text-decoration: none;
        padding:5px;
        border: none;
        font-family: 'Varela Round', sans-serif;
        color: #222222;
    }

    #login figure{
        position:absolute;
        width: 5px;
        height: 5px;
        top: -20px;
        left: 0;
        right: 0;
        margin: auto;
        border-left: transparent solid 10px;
        border-right: transparent solid 10px;
        border-bottom: white solid 10px;
    }

    #login>a{
        display: inline-block;
        text-decoration: none;
        border: white 1px solid;
        border-radius: 5px;

        padding: 5px;
        margin: 5px;
        font-size: 1.5em;

        -webkit-transition: all .5s;
        -moz-transition: all .5s;
        -ms-transition: all .5s;
        -o-transition: all .5s;
        transition: all .5s;
    }

    #login>a:hover{
        background-color: rgba(255,255,255,.5);
    }

    #login>a>p{
    }


    .hide{
        visibility: hidden ;
        opacity: 0;
        -webkit-transform: translateY(-20px);
        -moz-transform: translateY(-20px);
        -ms-transform: translateY(-20px);
        -o-transform: translateY(-20px);
        transform: translateY(-20px);
    }
    extraarea{
        position:absolute;
        height: 30px;
        top:-30px;
        width: 100%;
    }



</style>

<section id="login">
    <figure></figure>
    <extraarea></extraarea>
    <h3>
        Iniciar Sesión
    </h3>
    <form>
        <input type="text" name="username" placeholder="Usuario" />
        <input type="password" name="password" placeholder="Contraseña" />
        <input type="submit" />
    </form>
    <p>¿No tienes una cuenta? Andále...</p>
    <a>
        ¡Regístrate!
    </a>
</section>


<script>
    var $loginButton = $('#loginButton');
    var $login = $('#login');

    $loginButton.hover(function(){
        $login.removeClass('hide');
        setTimeout(function(){
            $loginButton.find('[name="username"]').focus();
        },500);

    },function(){
        $login.addClass('hide');
    });

</script>
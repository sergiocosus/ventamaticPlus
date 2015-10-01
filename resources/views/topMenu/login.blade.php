<link rel="stylesheet" type="text/css" href="/css/login.css" />

<section id="login" class="hide">
    <figure></figure>
    <div class="extra-area"></div>
    <h3>
        Bienvenido
    </h3>
    <form>
        <input type="text" name="username" placeholder="Usuario" required />
        <input type="password" name="password" placeholder="Contraseña" required />
        <input type="submit" value="Iniciar Sesión"/>
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
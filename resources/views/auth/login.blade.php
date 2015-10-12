
<section id="login-menu" class=" hover-menu hide">
    <figure></figure>
    <div class="extra-area"></div>
    <h3>
        Bienvenido
    </h3>
    <form method="POST" action="/auth/login" >
        {!! csrf_field() !!}
        <input type="text" name="email" placeholder="Usuario" required />
        <input type="password" name="password" placeholder="Contraseña" required />
        <div>
            <input type="checkbox" name="remember"> ¡Recuerdame!
        </div>
        <input type="submit" value="Iniciar Sesión"/>

    </form>
    <p>¿No tienes una cuenta?</p>
    <a>
        ¡Regístrate!
    </a>
</section>


<script>
    var $userButton = $('#user-button');
    var $loginMenu = $('#login-menu');

    $userButton.hover(function(){
        $loginMenu.removeClass('hide');
        setTimeout(function(){
            $userButton.find('[name="username"]').focus();
        },500);

    },function(){
        $loginMenu.addClass('hide');
    });
</script>
<section id="logged-menu" class="hover-menu hide">
    <figure></figure>

    <a href="/auth/logout">
        Cerrar Sesión
    </a>

</section>

<style>
    #logged-menu a{
        display:block;
    }
</style>

<script>
    var $userButton = $('#user-button');
    var menu = $('#logged-menu');

    $userButton.hover(function(){
        menu.removeClass('hide');


    },function(){
        menu.addClass('hide');
    });

</script>
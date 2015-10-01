
<section id="search"  class="hide" >
    <figure></figure>
    <div class="extra-area"></div>
    <form action="/product">
        <img src="img/icon/search.svg" />
        <input type="text" name="search" placeholder="¡Teclee sus deseos!" />
    </form>
    <div></div>
</section>


<script>
    var $searchButton = $('#searchButton');
    var $search = $('#search');
    var $searchForm = $search.find('form');
    var $searchImg = $search.find('img');

    $searchImg.click(function(){
        $searchForm.submit();
    });

    $searchButton.hover(function(){
        $search.removeClass('hide');
        setTimeout(function(){
            $searchButton.find('[name="search"]').focus();
        },500);

    },function(){
        $search.addClass('hide');
    });


</script>
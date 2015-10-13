
<!--
    Given a demo 'demos-jquery\full-width-slider.source.html'
    Go through following steps to transform jssor slider compatible with w3c standards and pass html validation.

    #1. Move styles inside 'head' tag
    #2. Add alt="" for all 'img' tag
    #3. Add 'data-' prefix for all custom attributes. e.g. u="image" -> data-u="image"
-->

<!-- it works the same with all jquery version from 1.x to 2.x -->
<!-- use jssor.slider.mini.js (40KB) instead for release -->
<!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->

<script type="text/javascript" src="/js/libraryDevelop/jssor.slider.mini.js"></script>
<script>
    initGalery();
</script>
<!-- Jssor Slider Begin -->
<!-- To move inline styles to css file/block, please specify a class name for each element. -->
<div id="slider1_container" style="position: relative; margin: 0 auto;
        top: 0px; left: 0px; width: 1300px; height: 400px; overflow: hidden;">
    <!-- Loading Screen -->
    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                top: 0px; left: 0px; width: 100%; height: 100%;">
        </div>
        <div style="position: absolute; display: block; background: url(/img/jssor/loading.gif) no-repeat center center;
                top: 0px; left: 0px; width: 100%; height: 100%;">
        </div>
    </div>
    <!-- Slides Container -->
    <div data-u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1300px;
            height: 500px; overflow: hidden;">
        @foreach($data as $element)
            @include('components.slider.element',['element' => $element])
        @endforeach

    </div>

    <!--#region Bullet Navigator Skin Begin -->
    <!-- bullet navigator container -->
    <div data-u="navigator" class="jssorb21">
        <!-- bullet navigator item prototype -->
        <div data-u="prototype"></div>
    </div>
    <!--#endregion Bullet Navigator Skin End -->

    <!--#region Arrow Navigator Skin Begin -->
    <!-- Arrow Left -->
        <span data-u="arrowleft" class="jssora21l">
        </span>
    <!-- Arrow Right -->
        <span data-u="arrowright" class="jssora21r">
        </span>
    <!--#endregion Arrow Navigator Skin End -->
    <a style="display: none" href="http://www.jssor.com">Bootstrap Slider</a>
</div>
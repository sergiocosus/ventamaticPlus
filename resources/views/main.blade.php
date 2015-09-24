<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <script src="js/libraryDevelop/jquery-1.11.3.js"></script>
    @yield('header')
</head>
<body>
@include('topMenu.main',['numberOption' => 0])

<section id="mainContainer">
    <img id="cartBackground" class="svg iconCart" src=""/>
    @yield('content','There are no content!')
        <section/>
        <style>
            #mainContainer {
                display: inline-block;
                overflow: hidden;
                height: auto;
                width: 90%;
                max-width: 1280px;
                background-image: url('/img/icon/market1.svg');

                background-color: #eeeeee;
                background-position: center center;
                background-repeat: no-repeat;
                border: 10px solid deepskyblue ;

                color: #333333;

                font-family: 'Varela Round', sans-serif;;

                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;

                border-radius: 1em;

                margin:1em;
                padding: 1em;
                padding-top: 3em;
                background-size: 30% auto;


                -webkit-transition: all .15s;
                -moz-transition: all .15s;
                -ms-transition: all .15s;
                -o-transition: all .15s;
                transition: all .15s;
            }

            .iconCart{
                display: inline-block;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                fill:white;
                max-height: 100%;
                max-width: 100%;
                border: solid transparent 25px;
            }

            .fillWhite{
                fill:white;
            }

            #cartBackground{
                position: absolute;
                top:0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
            }
        </style>



</body>
    @yield('footer')
<script>
    jQuery('img.svg').each(function(){
        var $img = jQuery(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');

        jQuery.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var $svg = jQuery(data).find('svg');

            // Add replaced image's ID to the new SVG
            if(typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if(typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass+' replaced-svg');
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');

            // Replace image with new SVG
            $img.replaceWith($svg);

        }, 'xml');

    });
</script>
</html>
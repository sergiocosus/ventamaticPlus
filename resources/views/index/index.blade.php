@extends('index')

@section('content')
    <?php
        $data = json_decode(' [
                {
                    "img": "001.jpg",
                    "title" : "Computadoras",
                    "description" : "Gran variedad en laptos para todos los usos y necesidades"
                },
                {
                    "img": "002.jpg",
                    "title" : "Electrodomésticos",
                    "description" : "Todo en electrónica para el hogar,
                        la mejor calidad en la linea blanca!"
                },
                {
                    "img": "003.png",
                    "title" : "Tecnología",
                    "description" : "Al borde de la teconología con las computadora/tablet"
                },
                {
                    "img": "004.png",
                    "title" : "Entretenimiento",
                    "description" : "Todo la tecnología para  mejor para el entretenimiento del hogar"
                }
            ]
        ');

    ?>

    <div class="gallery-container">
        @include('components.slider.index',['data' => $data])
    </div>
    <style>

        .main-content-left, .main-content-right{
            display: inline-block;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;

            vertical-align: top;
            padding: 1em;

            width: 50%;
        }

        .main-content-left>div{
            display: inline-block;
            box-sizing: border-box;
            padding: .5em;
            max-width: 45%;
            margin: 2.5%;
            background-color: palevioletred;
            border: .5em solid white;
            border-radius: 2em;
            -webkit-transition: all .5s;
            -moz-transition: all .5s;
            -ms-transition: all .5s;
            -o-transition: all .5s;
            transition: all .5s;
            color:white;
            font-weight: bold;
            font-size: 1.5em;
            cursor: pointer;
        }
        .main-content-left>div:nth-child(0){
            background-color: palevioletred
        }

        .main-content-left>div:nth-child(1){
            background-color: deepskyblue;
        }
        .main-content-left>div:nth-child(2){
            background-color: darkseagreen;
        }
        .main-content-left>div:nth-child(3){
            background-color: indianred;
        }

        .main-content-left>div:hover{
            -webkit-transform: scale(1.2, 1.2);
            -moz-transform: scale(1.2, 1.2);
            -ms-transform: scale(1.2, 1.2);
            -o-transform: scale(1.2, 1.2);
            transform: scale(1.2, 1.2);
        }

        .main-content-left>div>img{
            max-width: 100%;
        }

        @media  (max-width: 640px){
            .main-content-left, .main-content-right{
                width: 100%;
            }
            .main-content-left>div{
                border-width: .3em;
                font-size: 1em;
            }
        }

        .gallery-container{
            border-radius: 30px;
            overflow: hidden;
            border: white 0.5em solid;
        }
    </style>
    <div class="main-content-left">
        <div>
            <img src="/img/test/001.png" />
            <span>Calzado</span>
        </div><div>
            <img src="/img/test/002.png" />
            <span>Computadoras</span>
        </div><div>
            <img src="/img/test/003.png" />
            <span>Electrónica</span>
        </div><div>
            <img src="/img/test/004.png" />
            <span>Electrodomésticos</span>
        </div>
    </div><div class="main-content-right">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam bibendum eu neque sed venenatis. Curabitur ultrices enim et euismod dapibus. Morbi tempor ut turpis a porttitor. Aenean et tincidunt tellus. Vivamus vitae risus eu eros aliquam luctus. Ut ipsum leo, tincidunt vel ipsum vitae, efficitur hendrerit diam. Donec nec commodo tortor, sed suscipit nibh. Duis viverra tristique mi, a lobortis libero pellentesque in. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer congue vel eros in sagittis. Nunc tristique dui lectus, in dignissim dui placerat nec. Donec ac nunc pharetra, semper purus a, lacinia lectus. Etiam egestas commodo elit, sit amet aliquet orci volutpat sed. Proin rhoncus metus in lectus maximus, nec elementum orci varius. Etiam ut justo ac risus elementum commodo ac hendrerit tortor. Donec molestie arcu leo, varius laoreet justo fermentum at.

        Sed lacinia, nisl ac viverra tristique, metus odio molestie erat, ut molestie urna tortor eget est. Ut ac luctus orci, venenatis pulvinar diam. Nulla nec libero feugiat, iaculis orci id, rhoncus nisi. Nam pretium libero eu nisi gravida, in vehicula nulla dictum. Vivamus dapibus sem et lectus mollis vestibulum non at quam. Vestibulum a cursus lectus, volutpat cursus nunc. Vestibulum at hendrerit eros, id varius turpis. Fusce ac dictum nisl, ac aliquet dolor. Fusce maximus vel tortor ut euismod. Praesent eu pellentesque erat, a euismod massa. Nullam malesuada tellus aliquet scelerisque molestie. Etiam feugiat sit amet est eget mollis. Integer vel lectus vel est ornare gravida. Mauris sed porttitor libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
    </div>

@endsection
@extends('main')

@section('content')

    @include('components.slider.index')

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
            max-width: 50%;
        }

        .main-content-left>div>img{
            max-width: 100%;
        }

        @media screen and (max-width: 480px){
            .main-content-left, .main-content-right{
                width: 100%;
            }
        }
    </style>
    <div class="main-content-left">
        <div>
            <img src="/img/test/001.jpg" />
            <span>Tacos</span>
        </div><div>
            <img src="/img/test/002.png" />
            <span>pollos</span>
        </div><div>
            <img src="/img/test/003.png" />
            <span>Gallinas</span>
        </div><div>
            <img src="/img/test/004.png" />
            <span>Tocos</span>
        </div>
    </div><div class="main-content-right">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam bibendum eu neque sed venenatis. Curabitur ultrices enim et euismod dapibus. Morbi tempor ut turpis a porttitor. Aenean et tincidunt tellus. Vivamus vitae risus eu eros aliquam luctus. Ut ipsum leo, tincidunt vel ipsum vitae, efficitur hendrerit diam. Donec nec commodo tortor, sed suscipit nibh. Duis viverra tristique mi, a lobortis libero pellentesque in. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer congue vel eros in sagittis. Nunc tristique dui lectus, in dignissim dui placerat nec. Donec ac nunc pharetra, semper purus a, lacinia lectus. Etiam egestas commodo elit, sit amet aliquet orci volutpat sed. Proin rhoncus metus in lectus maximus, nec elementum orci varius. Etiam ut justo ac risus elementum commodo ac hendrerit tortor. Donec molestie arcu leo, varius laoreet justo fermentum at.

        Sed lacinia, nisl ac viverra tristique, metus odio molestie erat, ut molestie urna tortor eget est. Ut ac luctus orci, venenatis pulvinar diam. Nulla nec libero feugiat, iaculis orci id, rhoncus nisi. Nam pretium libero eu nisi gravida, in vehicula nulla dictum. Vivamus dapibus sem et lectus mollis vestibulum non at quam. Vestibulum a cursus lectus, volutpat cursus nunc. Vestibulum at hendrerit eros, id varius turpis. Fusce ac dictum nisl, ac aliquet dolor. Fusce maximus vel tortor ut euismod. Praesent eu pellentesque erat, a euismod massa. Nullam malesuada tellus aliquet scelerisque molestie. Etiam feugiat sit amet est eget mollis. Integer vel lectus vel est ornare gravida. Mauris sed porttitor libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
    </div>

@endsection
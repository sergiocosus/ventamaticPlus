@extends('main')

@section('content')
    @include('topMenu.main',['numberOption' => 0])

    <script>

    </script>

    <section id="body">
        <img class="svg iconCart" src="img/icon/market1.svg"/>


    <section/>
    <style>
        #body{
            display: inline-block;
            height: auto;
            width: 90%;
            max-width: 1280px;
            background-color: whitesmoke;
            border: 10px solid deepskyblue ;



            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;

            border-radius: 1em;

            margin:1em;
            padding-top: 3em;
        }

        .iconCart{
            display: inline-block;
            fill:white;
            max-height: 100%;
            max-width: 100%;
        }

        .fillWhite{
            fill:white;
        }
    </style>


@endsection
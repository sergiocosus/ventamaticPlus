@extends('index')

@section('content')
<style>
    .branch>div{
        display:inline-block;
        position: relative;
        width: 48%;
        margin: 1%;
        box-sizing: border-box;
        border: white 10px solid;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
        text-align: left;
        color: darkblue;
        font-weight: bold;
    }

    .branch>div>a{
        text-decoration: none;
    }

    .branch>div>a>h3{
        font-size: 1.5em;
        text-align: center;
        color: white;
        background-color: rgba(150,0,0,1);
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        padding: 5px;
    }

    .branch>div img{
        display: inline-block;
        box-sizing: border-box;
        width: 100%;

    }

    .branch>div>a>ul{
        position: absolute;
        bottom: 0;
        left: 0;
        background-color: rgba(255,255,255,.5);
        border-top-left-radius: 10px;
        padding: 10px;
    }

    @media  (max-width: 640px){
        .branch>div{
            width: 98%;
        }
    }

   .contact.button{
       background-color: dimgray;
       font-size: 2em;
       cursor: pointer;

    }

    .contact.button:hover {
        color:darkslategray;
        background-color: rgba(255,255,255,.5);
        border-color:darkslategray;
    }

    .contact.button img{
        height: 1em;
    }


</style>

<section class="">
    <a class="contact button" href="mailto:contacto@ventamatic.plus">
        <img src="img/icon/mail.svg" /> Contacto
    </a>
</section>
<section class="branch">
    <div>
        <a href="https://www.google.com.mx/maps/dir//21.8769145,-102.3116163/@21.8764526,-102.3110609,17z/data=!4m2!4m1!3e2?hl=es" >
            <h3>
                Sucursal "San Marcos"
            </h3>
            <ul>
                <li>
                    22 de Octubre 104, San Marcos, Aguascalientes, Ags.
                </li>
                <li>
                    Tel. (449) 9-23-34-63
                </li>
                <li>
                    Horario de atención: 9:00am - 10:00pm
                </li>
            </ul>
            <img src="img/maps/map1.png" />
        </a>
    </div><div>
        <a href="https://www.google.com.mx/maps/dir//21.8659125,-102.2991279/@21.8657042,-102.2988229,17z/data=!4m2!4m1!3e2?hl=es" >
            <h3>
                Sucursal "Las Américas"
            </h3>
            <ul>
                <li>
                    Av de la Convención de 1914 Sur, Las Américas, Aguascalientes, Ags.
                </li>
                <li>
                    Tel. (449) 9-66-34-63
                </li>
                <li>
                    Horario de atención: 9:00am - 10:00pm
                </li>
            </ul>
            <img src="img/maps/map2.png" />
        </a>
    </div><div>
        <a href="https://www.google.com.mx/maps/dir//21.8575683,-102.2943643/@21.8562859,-102.2951166,17z/data=!4m2!4m1!3e2?hl=es" >
            <h3>
                Sucursal "Villa Asunción"
            </h3>
            <ul>
                <li>
                    Av Aguascalientes Sur, Desarrollo Especial Villa Asunción, Aguascalientes, Ags.
                </li>
                <li>
                    Tel. (449) 1-23-34-53
                </li>
                <li>
                    Horario de atención: 9:00am - 10:00pm
                </li>

            </ul>
            <img src="img/maps/map3.png" />
        </a>
    </div><div>
        <a href="https://www.google.com.mx/maps/dir//21.8776812,-102.2710505/@21.8756602,-102.27552,17z/data=!4m2!4m1!3e2?hl=es" >
            <h3>
                Sucursal "Convención Oriente"
            </h3>
            <ul>
                <li>
                    Av Convención 1914 Oriente 104, Aguascalientes, Ags.
                </li>
                <li>
                    Tel. (449) 7-23-34-63
                </li>
                <li>
                    Horario de atención: 10:00am - 11:00pm
                </li>

            </ul>
            <img src="img/maps/map4.png" />
        </a>
    </div>
</section>


@endsection
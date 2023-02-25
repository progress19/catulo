<? use App\Fun ?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <title>Cátulo Tango</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/front_css/styles.css') }}"> 

    <link href="{{ asset('css/front_css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front_css/brands.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front_css/solid.min.css') }}" rel="stylesheet">

</head>

<body>

    <div class="f">

       <div class="container">
           <div class="row">
               <div class="col text-center">
                   <img src="{{ asset('/images/CatuloTango.svg') }}" class="img-fluid" style="padding:80px" alt="">

                   <div class="clearfix"></div>

                   <a class="btn btn-menu-menu" target="_new" href="{{ Fun::getUrlMenu('es') }}">@lang('trans.Español')</a><br>
                   <a class="btn btn-menu-menu" target="_new" href="{{ Fun::getUrlMenu('en') }}">@lang('trans.Inglés')</a><br>
                   <a class="btn btn-menu-menu" target="_new" href="{{ Fun::getUrlMenu('pr') }}">@lang('trans.Portugués')</a>

               </div>
           </div>

           <div class="clearfix"></div>
           <br><br>

        <div class="row text-center text-white">
            <p><i class="fa-solid fa-phone"></i> <a href="tel:541163991032"> (+5411) 6399-1032</a></p>
            <p><i class="fa-brands fa-whatsapp"></i> <a href="https://api.whatsapp.com/send?phone=5491163991032"> (+549) 11-6399-1032</a></p>
            <p><i class="fa-solid fa-envelope"></i> <a href="mailto:info@catulotango.com">info@catulotango.com</a></p>
        </div>

       </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>

<style>
    
    .f {
        background-color: #212529 !important;
        {{-- background-image: url("{{ asset('images/menu.jpg') }}"); --}}
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    @media only screen and (max-width: 480px) {
        /*.f {height: auto;}*/
    }

    body, html { height: 100%; }
    .minh-100 { height: 100vh; }

</style>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf_token" content="{{ csrf_token() }}" />

  <title>Cátulo Tango Show - El Mejor Espectáculo de Tango en Buenos Aires</title>
  <meta name="description" content="Reserva tu lugar en Cátulo Tango Show y disfruta de una noche mágica de tango y cena en Buenos Aires. Conoce a los mejores bailarines y músicos del auténtico tango argentino.">
  <meta name="keywords" content="catulo tango, catulo tango show, espectáculo de tango, cena show de tango, buenos aires, tango argentino, catulo tango, catulo tango show, tango show, dinner tango show, tango show ba, cena show de tango, buenos aires, tango">
  <meta name="author" content="Cátulo Tango Show">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="canonical" href="https://catulotango.com/es">
  <meta property="og:title" content="Cátulo Tango Show - El Mejor Espectáculo de Tango en Buenos Aires">
  <meta property="og:description" content="Reserva tu lugar en Cátulo Tango Show y disfruta de una noche mágica de tango y cena en Buenos Aires. Conoce a los mejores bailarines y músicos del auténtico tango argentino.">
  <meta property="og:image" content="https://catulotango.com/images/img-video.jpg">
  <meta property="og:url" content="https://catulotango.com/es">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="es_AR">
  <meta name="twitter:title" content="Cátulo Tango Show - El Mejor Espectáculo de Tango en Buenos Aires">
  <meta name="twitter:description" content="Reserva tu lugar en Cátulo Tango Show y disfruta de una noche mágica de tango y cena en Buenos Aires. Conoce a los mejores bailarines y músicos del auténtico tango argentino.">
  <meta name="twitter:image" content="https://catulotango.com/images/img-video.jpg">
  <meta name="twitter:card" content="summary_large_image">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">
    
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link rel="stylesheet" href="{{ asset('css/front_css/galeria.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/front_css/aos.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/front_css/lightcase.css') }}"> 
  <link rel="stylesheet" href="{{ asset('css/front_css/styles.css') }}"> 

  <link href="{{ asset('css/front_css/fontawesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/front_css/brands.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/front_css/solid.min.css') }}" rel="stylesheet">

    <script type="text/javascript" src="{{ asset('vendors/soundmanager/script/soundmanager2.js') }}"></script>
    <script src="{{ asset('vendors/soundmanager/script/bar-ui.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('vendors/soundmanager/css/bar-ui.css') }}"/>

    <script src="{{ asset('vendors/soundmanager/script/demo.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('vendors/soundmanager/css/demo.css') }}" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZB1SNCGBVT"></script>
    <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-ZB1SNCGBVT'); </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11132556556"></script>; <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-11132556556'); </script>

</head>

<body>

    @yield('content')

    @include('_contacto')  
    @include('_suscripcion')  
    @include('_footer') 

  <!-- soundcloud modal -->
  <div class="modal fade" id="modalSoundCloud" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-regular fa-circle-xmark"></i></button> --}}
                <a data-bs-dismiss="modal" class="close-modal" href=""><i class="fa-solid fa-circle-xmark"></i></a>
                <img src="{{ asset('images/CatuloOrquestaMP3.jpg') }}" class="img-fluid" />

                <div class="sm2-bar-ui compact full-width flat" >

                    <div class="bd sm2-main-controls">

                        <div class="sm2-inline-texture"></div>
                        <div class="sm2-inline-gradient"></div>

                        <div class="sm2-inline-element sm2-button-element">
                            <div class="sm2-button-bd">
                                <a href="#play" id="SM2BarPlayer" class="sm2-inline-button sm2-icon-play-pause">Play / pause</a>
                            </div>
                        </div>

                        <div class="sm2-inline-element sm2-inline-status">

                            <div class="sm2-playlist">
                                <div class="sm2-playlist-target">
                                    <!-- playlist <ul> + <li> markup will be injected here -->
                                        <!-- if you want default / non-JS content, you can put that here. -->
                                        <noscript><p>JavaScript is required.</p></noscript>
                                    </div>
                                </div>

                                <div class="sm2-progress">
                                    <div class="sm2-row">
                                        <div class="sm2-inline-time">0:00</div>
                                        <div class="sm2-progress-bd">
                                            <div class="sm2-progress-track">
                                                <div class="sm2-progress-bar"></div>
                                                <div class="sm2-progress-ball"><div class="icon-overlay"></div></div>
                                            </div>
                                        </div>
                                        <div class="sm2-inline-duration">0:00</div>
                                    </div>
                                </div>

                            </div>

                            <div class="sm2-inline-element sm2-button-element sm2-volume">
                                <div class="sm2-button-bd">
                                    <span class="sm2-inline-button sm2-volume-control volume-shade"></span>
                                    <a href="#volume" class="sm2-inline-button sm2-volume-control">volume</a>
                                </div>
                            </div>

                        </div>

                        <div class="bd sm2-playlist-drawer sm2-element">

                            <div class="sm2-inline-texture">
                                <div class="sm2-box-shadow"></div>
                            </div>

                            <!-- playlist content is mirrored here -->

                            <div class="sm2-playlist-wrapper">
                                <ul class="sm2-playlist-bd">
                                   <li><a href="{{ asset('Libertango-By-EstebanMorgando.mp3') }}">Libertango by Esteban Morgado</a></li>
                                </ul>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
  
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<script type="text/javascript" src=" {{ asset('js/front_js/aos.js') }}"></script>
<script type="text/javascript" src=" {{ asset('js/front_js//lightcase.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-touch-events/1.0.5/jquery.mobile-events.js"></script>

<script src="{{ asset('js/front_js/scripts.js') }}"></script>

{{--<script src="{{ asset('js/app.js') }}"></script>--}}

<script src="{{ asset('js/front_js/jquery.validate.min.js') }}"></script>

<script>
    
    //menu nav

    $('a[href^="#"]').on('click', function(event) {
    var target = $(this.getAttribute('href'));
    if (target.length) {
      event.preventDefault();
        $('html, body').stop().animate({ scrollTop: target.offset().top - 113 }, 1000); }
      });

    //map    

    function initialize() {

    var locations = [ 
       ['Cátulo Tango',  -34.601705669366524, -58.409403001998136, 1, ''],
    ];

    window.map2 = new google.maps.Map(document.getElementById('google-map2'), {
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false,
        navigationControl: false,
        center: {lat: -34.601705669366524, lng:  -58.409403001998136}, 
        zoom: 12

    });

    var infowindow = new google.maps.InfoWindow();
    var bounds = new google.maps.LatLngBounds();

    for (i = 0; i < locations.length; i++) {

        marker = new google.maps.Marker({
            position: new google.maps.LatLng( locations[i][1], locations[i][2] ),
            map: map2,
            icon: '<?php echo asset('/images/map.png') ?>'
        });


        bounds.extend(marker.position);
        google.maps.event.addListener(marker, 'click', (function (marker, i, info) {
            return function () {

                var info = '<div style="color:#000" >'+
                  '<p class="mb-0"><b>' + locations[i][0] + '</b></p>'+
                  '<p class="mb-0">Dr. Tomás Manuel de Anchorena 647</p>'
                  '</div>';

                infowindow.setContent( info );
                infowindow.open(map2, marker);
            
            }
        })(marker, i));

    }

}

function loadScript() {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBBhh9bdv02x8XPknaSceyUsPFrz6ap4SE&sensor=false&' + 'callback=initialize';
    document.body.appendChild(script);
}

window.onload = loadScript;
    
</script>
  
</body>

@yield('page-js-script')

</html>
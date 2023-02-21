@extends('layouts.frontLayout.front')
@section('title', 'Home')    

@section('content')
@include('_nav-int')  

<section class="conte-int-eventos">

  <div class="container">

      <div class="row">

          <div class="col-md-3 col-12 text-center">
            <img src="{{ asset('images/C-Eventos.svg') }}" class="img-fluid mb-4" alt=""> 
          </div>

          <div class="col-md-9 col-sm-12">
           
            <p>@lang('trans.Cátulo Tango cuenta con un servicio especializado para eventos corporativos, jornadas de trabajo, presentación de productos, disertaciones, workshop, capacitaciones, fiestas de fin de año para su empresa.')</p>

            <p>@lang('trans.Contamos con un salón completamente equipado con sonido, 2 escenarios, pantallas, aire acondicionado, calefacción, iluminación, catering propio y todo el equipamiento para que su evento sea único. A su vez nuestro staff de profesionales lo asesoran y acompañan desde el primer momento hasta la finalización de cada actividad.')</p>

            <p>@lang('trans.Más información') <a href="mailto:eventos@catulotango.com">eventos@catulotango.com</a></p>

          </div>

      </div>

  </div>

  <br>

    <div id="transcroller-body" class="aos-all">

        <? $delay = 100; $i=0; ?>

            @foreach ($arrays as $imagen)

                <div class="aos-item-2" data-aos="fade" data-aos-delay="<?php echo $delay; ?>">
                  <div class="aos-item__inner pswp__item">

                    <a href="{{ asset('images/eventos/'.$imagen.'.jpg') }}" class="overlay" data-rel="lightcase-2:myCollection:slideshowa">
                        <img src="{{ asset('images/eventos/'.$imagen.'.jpg') }}" class="img-fluid" style="display: block;" >
                    </a>
              
                  </div>
                </div>

                <?php $delay = $delay + 100; $i++; ?>     

            @endforeach

    </div>

    <div class="clearfix"></div>   

</section>
    
@endsection

@section('page-js-script')

<script type="text/javascript">

    AOS.init({
      easing: 'ease-in-cubic',
      once: true,
      delay: 2600,
    });
  
    jQuery(document).ready(function($) {

      $('a[data-rel^=lightcase]').lightcase({
        swipe: true,
        transition: 'scrollHorizontal',
        speedIn: 1000,
        speedOut: 1000,
        showSequenceInfo: false,
        fullScreenModeForMobile: true,
        timeout: 6000,
        closeOnOverlayClick: true,
      });
      
    });

</script>

@stop


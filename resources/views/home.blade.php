@extends('layouts.frontLayout.front')
@section('title', 'Home')    
@include('_nav')  

@section('content')

<div id="home" style="background-color: black;">
     <div class="vimeo-wrapper">
       <iframe src="https://player.vimeo.com/video/799153714?background=1&autoplay=1&loop=1&byline=0&title=0&muted=1" muted="muted" allow="autoplay; fullscreen" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>
        </iframe>
    </div>
</div>
    
@include('_catulo') 
@include('_galeria')
@include('_menu') 
@include('_shows')    

@endsection

@section('page-js-script')

<script type="text/javascript">

    $('.moreless-button').click(function() {

      $('.moretext').slideToggle();

      if ( $('.moreless-button').text() == "<?= __('trans.Leer más') ?>" ) {

        $(this).text("<?= __('trans.Leer menos') ?>")

      } else {

        $(this).text("<?= __('trans.Leer más') ?>")

      }
    });


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

<script src="https://player.vimeo.com/api/player.js"></script>

@stop

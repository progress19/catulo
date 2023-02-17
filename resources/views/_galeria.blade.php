<?php
    use App\Fun;
?>
<section id="galeria">

    <div class="title-galeria">
        @lang('trans.VIVÍ UN SHOW DE TANGO ÚNICO EN EL BARRIO DE CARLOS GARDEL')
    </div>

    <div id="transcroller-body" class="aos-all">

        <? $delay = 100; $i=0; ?>

            @foreach ($imgsHome as $imagen)

                <div class="aos-item-2" data-aos="fade" data-aos-delay="<?php echo $delay; ?>">
                  <div class="aos-item__inner pswp__item">

                    <a href="{{ asset(Fun::getPathImage('large','imgsHome',$imagen->imagen)) }}" class="overlay" data-rel="lightcase-2:myCollection:slideshowa">
                        <img src="{{ asset(Fun::getPathImage('large','imgsHome',$imagen->imagen)) }}" class="img-fluid" style="display: block;" >
                    </a>
              
                  </div>
                </div>

                <?php $delay = $delay + 100; $i++; ?>     

            @endforeach
 
    </div>
    
</section>

<div class="clearfix"></div>
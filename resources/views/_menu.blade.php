<? use App\Fun ?>

<section id="menu">
    
    <div class="title-menu">
        @lang('trans.MENÚ GOURMET DE 3 PASOS')
    </div>

        <a target="new" href="{{ route('menu', app()->getLocale()) }}">
            <div class="row g-0">
                <div class="col-md-4"> <img src="{{ Fun::getUrlImageMenuHome(1) }}.jpg" class="img-fluid" alt=""> </div>
                <div class="col-md-4"> <img src="{{ Fun::getUrlImageMenuHome(2) }}.jpg" class="img-fluid" alt=""> </div>
                <div class="col-md-4"> <img src="{{ Fun::getUrlImageMenuHome(3) }}.jpg" class="img-fluid" alt=""> </div>
            </div>
        </a>
        <br><br>
        <div class="text-center">
            <a class="btn btn-menu" target="new" href="{{ route('menu', app()->getLocale()) }}">@lang('trans.VER MENÚ')</a>
        </div><br>

</section>
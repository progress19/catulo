@php
    use App\Fun;
@endphp 

<section id="menu">
    
    <div class="title-menu">
        @lang('trans.MENÚ GOURMET DE 3 PASOS')
    </div>
    
    <a class="overlay" href="{{ asset('images/entradas/1.jpg') }}" data-rel="lightcase-2:myCollection:slideMenu">
        <div class="row g-0">
            <div class="col-md-4"> <img src="{{ Fun::getUrlImageMenuHome(1) }}.jpg" data-rel="lightcase-2:myCollection:menu" class="img-fluid" alt=""> </div>
            <div class="col-md-4"> <img src="{{ Fun::getUrlImageMenuHome(2) }}.jpg" data-rel="lightcase-2:myCollection:menu" class="img-fluid" alt=""> </div>
            <div class="col-md-4"> <img src="{{ Fun::getUrlImageMenuHome(3) }}.jpg" class="img-fluid" alt=""> </div>
        </div>
    </a>

    <br><br>

    <div class="text-center">
        <a class="btn btn-menu" target="new" href="{{ route('menu', app()->getLocale()) }}">@lang('trans.VER MENÚ')</a>
    </div><br>

    @for ($i = 2; $i < 4; $i++)
        <a href="{{ asset('images/entradas/'.$i.'.jpg') }}" class="overlay" data-rel="lightcase-2:myCollection:slideMenu"></a>    
    @endfor

    @for ($i = 1; $i < 5; $i++)
        <a href="{{ asset('images/principal/'.$i.'.jpg') }}" class="overlay" data-rel="lightcase-2:myCollection:slideMenu"></a>    
    @endfor

    @for ($i = 1; $i < 4; $i++)
        <a href="{{ asset('images/postres/'.$i.'.jpg') }}" class="overlay" data-rel="lightcase-2:myCollection:slideMenu"></a>    
    @endfor

</section>
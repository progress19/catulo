@php
    use App\Fun;
    use App\Menu;
@endphp 

<section id="menu">
    
    <div class="title-menu">
        @lang('trans.MENÚ GOURMET DE 3 PASOS')
    </div>
    
        <div class="row g-0">
            <div class="col-md-4">
                <a class="overlay" href="{{ asset('images/entradas/1.jpg') }}" title="{{-- Menu::getTitleImgMenu(1, 1) --}}" data-rel="lightcase-1:myCollection:slideMenu">
                    <img src="{{ Fun::getUrlImageMenuHome(1) }}.jpg" class="img-fluid" alt="">
                    {{-- <img src="{{ asset('images/entradas/1.jpg') }}" class="img-fluid" alt=""> --}}
                </a>
            </div>
            <div class="col-md-4">
                <a class="overlay" href="{{ asset('images/principal/1.jpg') }}" title="{{-- Menu::getTitleImgMenu(2, 1) --}}" data-rel="lightcase-2:myCollection:slideMenu">
                    <img src="{{ Fun::getUrlImageMenuHome(2) }}.jpg" class="img-fluid" alt="">
                    {{-- <img src="{{ asset('images/principal/1.jpg') }}" class="img-fluid" alt=""> --}}
                </a>
            </div>
            <div class="col-md-4">
                <a class="overlay" href="{{ asset('images/postres/1.jpg') }}" title="{{-- Menu::getTitleImgMenu(3, 1) --}}" data-rel="lightcase-3:myCollection:slideMenu">
                    <img src="{{ Fun::getUrlImageMenuHome(3) }}.jpg" class="img-fluid" alt="">
                    {{--<img src="{{ asset('images/postres/1.jpg') }}" class="img-fluid" alt="">--}}
                </a>
            </div>
        </div>
    
    
    <br><br>

    <div class="text-center">
        <a class="btn btn-menu" target="new" href="{{ route('menu', app()->getLocale()) }}">@lang('trans.VER MENÚ')</a>
    </div><br>

    @for ($i = 2; $i < 5; $i++)
        <a href="{{ asset('images/entradas/'.$i.'.jpg') }}" title="{{-- Menu::getTitleImgMenu(1, $i) --}}" class="overlay" data-rel="lightcase-1:myCollection:slideMenu"></a> 
    @endfor

    @for ($i = 2; $i < 8; $i++)
        <a href="{{ asset('images/principal/'.$i.'.jpg') }}" title="{{-- Menu::getTitleImgMenu(2, $i) --}}" class="overlay" data-rel="lightcase-2:myCollection:slideMenu"></a>    
    @endfor

    @for ($i = 2; $i < 7; $i++)
        <a href="{{ asset('images/postres/'.$i.'.jpg') }}" title="{{-- Menu::getTitleImgMenu(3, $i) --}}" class="overlay" data-rel="lightcase-3:myCollection:slideMenu"></a>    
    @endfor

</section>
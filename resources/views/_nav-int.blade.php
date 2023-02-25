<? use App\Fun ?>

<div class="pre-header text-end">
  <span class="no-movil"><a href="mailto:reservas@catulotango.com">reservas@catulotango.com</a> | </span><span><a href="tel:5491163991032"><i class="fa-brands fa-whatsapp"></i> (+549) 11-6399-1032</a> | </span> 

  <a type="button" class=" dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ Fun::getFlagLanguage() }}</a>
    
    <ul class="dropdown-menu dropdown-menu-end">
  
        <? 
          $arr = Route::current()->parameters();
          $first = array_shift($arr);
          $parameters = collect( $arr )->implode('/');
        ?>

        <li>
          <a href="{{ url('').'/es/'.Route::currentRouteName().'/'.$parameters }}" class="dropdown-item" >{{ HTML::image(asset('images/argentina-flag.png'), null, array('style' => 'height:24px')) }}  @lang('trans.Español')
          </a>
        </li>
  
        <li>
          <a href="{{ url('').'/en/'.Route::currentRouteName().'/'.$parameters }}" class="dropdown-item" >{{ HTML::image(asset('images/united-kingdom-flag.png'), null, array('style' => 'height:24px')) }} @lang('trans.Inglés')
          </a>
        </li>
        
        <li>
          <a href="{{ url('').'/pr/'.Route::currentRouteName().'/'.$parameters }}" class="dropdown-item" >{{ HTML::image(asset('images/brasil-flag.png'), null, array('style' => 'height:24px')) }} @lang('trans.Portugués')
          </a>
        </li>
 
    </ul>

</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" aria-label="Offcanvas navbar large">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home', App::getLocale()) }}">
        <img src="{{ asset('/images/CatuloTango.svg') }}" class="img-fluid" style="width:150px">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbar2Label">
            <img src="{{ asset('/images/CatuloTango.svg') }}" style="width:150px" class="img-fluid">
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home', app()->getLocale()) }}#galeria">@lang('trans.EL SHOW')</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home', app()->getLocale()) }}#menu">@lang('trans.MENÚ')</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="" href="https://player.vimeo.com/video/799159709?autoplay=1&amp;loop=1&amp;autopause=0" data-rel="lightcaseSalon:myCollection:slideshow">@lang('trans.SALÓN')</a>
            </li>
            <li class="nav-item">
              <a  href="#" class="nav-link SoundCloud" data-bs-toggle="modal" data-bs-target="#modalSoundCloud" >@lang('trans.MÚSICA')</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('eventos', app()->getLocale()) }}">@lang('trans.EVENTOS')</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home', app()->getLocale()) }}#contacto">@lang('trans.CONTACTO')</a>
            </li> 
            <li class="nav-item" >
              <a class="nav-link" style="background-color: #b60017;" href="{{ route('home', app()->getLocale()) }}#shows">@lang('trans.RESERVAS')</a>
            </li>
            <li class="nav-item no-desk">
              <a class="nav-link" href="https://api.whatsapp.com/send?phone=5491163991032"><i class="fa-brands fa-whatsapp"></i> (+549) 11-6399-1032</a>              
            </li>
          </ul>
        </div>
      </div>
    </div>
 </nav>
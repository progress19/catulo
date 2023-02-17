

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else

  <a type="button" class=" dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">ESP</a>
  <ul class="dropdown-menu dropdown-menu-end">

    <li><a href="{{ route('welcome' ,'es') }}" class="dropdown-item" >ESP</a></li>
    <li><a href="{{ route('welcome' ,'en') }}" class="dropdown-item" >ENG</a></li>
   

  </ul>


                        <a href="{{ route('login', app()->getLocale()) }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register', app()->getLocale()) }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{ __('Laravel') }}

  FOTO {{ __('name') }}

                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>

                    <div id='app'>
    
                                <language-switcher
                                    locale="{{ app()->getLocale() }}"
                                    link-en="{{ route('welcome', 'es') }}"
                                    link-fr="{{ route('welcome', 'en') }}"
                                ></language-switcher> 
</div>
                </div>
            </div>
        </div>




  
<script src="{{ asset('js/app.js') }}" defer></script>

    </body>
</html>




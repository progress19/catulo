<section id="contacto" class="app"><!-- Sigma Software -->
  
    <div class="container">

        <div class="col-md-12 text-center titulo">
            <h1>@lang('trans.CONSULTAS')</h1>
        </div>

        <div class="row">

            <div class="col-md-4 col-sm-12 left-contacto">

                <div id="responseContacto"></div>

                <form method="POST" id="frmContacto">

                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id="nombre_f" name="nombre" placeholder="@lang('trans.NOMBRE')">
                    </div>

                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id="apellido_f" name="apellido" placeholder="@lang('trans.APELLIDO')">
                    </div>

                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id="whatsapp_f" name="whatsapp" placeholder="WHATSAPP">
                    </div>

                    <div class="mb-3 mt-3">
                        <input type="email" class="form-control" id="email_f" name="email" placeholder="EMAIL">
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control" id="comentario_f" name="comentario" rows="3" placeholder="@lang('trans.COMENTARIO')"></textarea>
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3 float-end">@lang('trans.ENVIAR')</button>
                    </div>

                    <input type="hidden" id="campoObligatorio" value="@lang('trans.Por favor complete el campo')." >
                    <input type="hidden" id="baseUrl" value="{{ url('/') }}" >
                    <input type="hidden" name="locale" value="{{ app()->getLocale() }}" >
                
                </form>    

            </div>

            <!-- center -->

            <div class="col-md-4 col-sm-12">
                <div id="google-map2" style="position: relative; overflow: hidden;width: 100%;min-height: 386px"></div>
            </div>


            <!-- right -->

            <div class="col-md-4 col-sm-12 info-contacto">
                
                <h5>@lang('trans.UBICACIÓN')</h5>
{{-- 
                <h5><skeleton-text :ref-text = {{ json_encode( Str::random(10) ) }} :text = "{{ json_encode( __('trans.UBICACIÓN') ) }}"
                :width-text="200" :height-text="20"></skeleton-text></h5>
--}}                
                <p>Dr. Tomás Manuel de Anchorena 647</p>
                <p>Abasto - Buenos Aires - Argentina</p>

                <h5 class="mt-4">@lang('trans.HORARIOS DE ATENCIÓN')</h5>
                <p>@lang('trans.Lunes a sábados')</p>
                <p>09:00hs @lang('trans.a') 20:00hs</p>

                <h5 class="mt-4">@lang('trans.CENA SHOW')</h5>
                <p>@lang('trans.Viernes y sábados')</p>
                <p>@lang('trans.Cena'): 20:00hs</p>
                <p>Show: 22:00hs</p>

                <h5 class="mt-4">@lang('trans.RESERVAS')</h5>
                <p><a href="https://api.whatsapp.com/send?phone=5491163991032"><i class="fa-brands fa-whatsapp"></i> (+549) 11-6399-1032</a></p> 
                <p><a href="mailto:reservas@catulotango.com">reservas@catulotango.com</a></p>
             </div>

        </div>
    
    </div>

</section>

@section('page-js-script')

<script src="{{ asset('js/app.js') }}"></script>

@stop


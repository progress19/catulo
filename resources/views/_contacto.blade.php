<section id="contacto">
  
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
                <p>Dr. Tomás Manuel de Anchorena 647</p>
                <p>Abasto - Buenos Aires - Argentina</p>

                <h5 class="mt-4">@lang('trans.HORARIOS DE ATENCIÓN')</h5>
                <p>09:00hs @lang('trans.a') 20:00hs</p>

                <h5 class="mt-4">@lang('trans.CENA SHOW')</h5>
                <p>@lang('trans.Lunes a Domingo')</p>
                <p>@lang('trans.Cena'): 20:30hs</p>
                <p>Show: 22:00hs</p>

                <h5 class="mt-4">@lang('trans.RESERVAS')</h5>
                <p><a href="tel:541163991032"></a>@lang('trans.TEL')(+5411) 6399-1032</p>
                <p><a href="https://api.whatsapp.com/send?phone=541134885054">Whatsapp (+54911) 3488-5054</a></p> 
                <p><a href="mailto:info@catulotango.com">info@catulotango.com</a></p>
             </div>

        </div>
    
    </div>

</section>


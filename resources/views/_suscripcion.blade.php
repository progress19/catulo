<!-- #suscripcion -->
<section id="suscripcion">
    
    <div class="container">

        <div id="responseSuscribir"></div>

            {{ Form::open(array('id' => 'frmSuscribir', 'role' => 'form', 'class' => 'form-inline justify-content-center')) }}

            <div class="row justify-content-center">
                
                    <div class="col-md-3 col-sm-12">
                        <input type="text" class="form-control text-black" id="email_sus" name="email_sus" placeholder="EMAIL">
                    </div>

                    <div class="col-md-3 col-sm-12 text-center">
                        <button type="submit" class="btn btn-suscripcion mb-3">@lang('trans.SUSCRIBIRME')</button>
                    </div>

                    <input type="hidden" id="baseUrl" value="{{ url('/') }}">

                    {{ Form::hidden('emailSusTra', __('trans.Ingrese un e-mail válido'), array('id' => 'emailSusTra')) }}

            </div>

            {!! Form::close() !!}
  
    </div>

</section>


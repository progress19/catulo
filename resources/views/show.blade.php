<? use App\Show;?>

@extends('layouts.frontLayout.front')
@section('title', 'Show')    
@include('_nav-int')  
@section('content')

<!-- bootstrap-datepicker -->
<link href="{{ asset('vendors/bootstrap-datepicker-1.9/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/bootstrap-datepicker-1.9/css/bootstrap-datepicker.standalone.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<section class="conte-int">

	<div class="title-show">
		{{ Show::getNombreShow($show->id) }}
	</div>

	<div class="container">

		<div class="row">

			<div class="col-md-6">
				<div class="box-show-int">
						<img src="{{ asset('pics/shows/large/'.$show->imagen) }}" class="img-fluid" alt="">	
					<div class="show-incluye">@lang('trans.EL SERVICIO INCLUYE')</div>
					<hr>
					<div class="detalle-show">
						<div class="row">
							<div class="col-md-7">
								{!! Show::getDescripcionShow($show->id) !!}	
							</div>	
							<div class="col-md-5">
								<div class="box-precio mx-2">
									<div class="show-importe">

										<span><b>USD {{ $show->precio }}</b></span><br>
										@lang('trans.Por persona')<br>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- box-show -->
			</div>

			<div class="col-md-6" id="completeForm">
				<div class="box-show-int">
					<div class="show-incluye" id="titulo-resumen">@lang('trans.COMPLETE EL FORMULARIO')</div>
					<hr>

					<div id="responseReserva"></div>

                	<form method="POST" id="frmReserva">

					<div class="container">

						<div class="row">
						
							<div class="col-md-6 col-12 mb-3 ">
								<label for="basic-url" class="form-label">@lang('trans.Nombre')</label>
								<input type="text" class="form-control" name="nombre">
							</div>

							<div class="col-md-6 col-12 mb-3 ">
								<label for="basic-url" class="form-label">@lang('trans.Apellido')</label>
								<input type="text" class="form-control" name="apellido">
							</div>

							<div class="clearfix"></div>

							<div class="col-md-6 col-12 mb-3 ">
								<label for="basic-url" class="form-label">Whatsapp</label>
								<input type="text" class="form-control" name="whatsapp">
							</div>

							<div class="col-md-6 col-12 mb-3 ">
								<label for="basic-url" class="form-label">Email</label>
								<input type="text" class="form-control" name="email">
							</div>

							
							<div class="col-md-6 col-12 mb-3 ">
								<label for="basic-url" class="form-label">@lang('trans.Fecha de su visita')</label>
								<input type="text" class="form-control datespicker" name="fecha">
							</div>

							<div class="col-md-6 col-12 mb-3 ">
								<label for="basic-url" class="form-label">Hotel</label>
								<input type="text" class="form-control" name="hotel">
							</div>

							<div class="col-md-6 col-12">
								<label for="basic-url" class="form-label">@lang('trans.Cantidad de adultos')</label>
								<div class="input-group mt-0">
									<input type="button" name="adultos-minus" value="-" class="button-minus" data-field="adultos">
									<input type="" step="1" Xmax="12" value="1" name="adultos" class="adultos-field" onchange="calculateTotal()">
									<input type="button" name="adultos-plus" value="+" class="button-plus" data-field="adultos">
								</div><br>
							</div>

							<div class="col-md-6 col-12">
								<label for="basic-url" class="form-label">@lang('trans.Cantidad de menores')</label>
								<div class="input-group mt-0">
									<input type="button" name="menores-minus" value="-" class="button-minus" data-field="menores">
									<input type="" step="1" Xmax="12" value="0" name="menores" class="menores-field" onchange="calculateTotal()">
									<input type="button" name="menores-plus" value="+" class="button-plus" data-field="menores">
								</div><br>
							</div>

							<div class="clearfix"></div>

							<div class="box-precio">
								<div class="row">
									<div class="col-md-6 col-12 text-center">
										<b>@lang('trans.TOTAL A PAGAR')</b>
										<div>
											<span>USD </span><span class="total_reserva">{{ $show->precio }}</span>.-
										</div>
									</div>
									<div class="col-md-6 col-12 text-center">
				                    	<button type="submit" class="btn btn-reservar">@lang('trans.RESERVAR')</button>	
				                    </div>	
			                    </div>
							</div>

		                    <input type="hidden" id="campoObligatorio" value="@lang('trans.Por favor complete el campo')." >
		                    <input type="hidden" id="baseUrl" value="{{ url('/') }}" >
		                    <input type="hidden" name="locale" value="{{ app()->getLocale() }}" >
		                    <input type="hidden" name="id" value="{{ $show->id }}" >
		                    <input type="hidden" id="paymentReference" value="{{ $show->identity }}">
							<input type="hidden" id="description" value="{{ Show::getNombreShow($show->id) }}">
							<input type="hidden" name="total_total" id="total_total">
            
						</div>
					</div>

					</form>  
				</div> <!-- box-show -->
			</div> <!--  col -->

			<div class="col-md-6 d-none" id="resumenReservaPago">
				<div class="box-show-int">
					<div class="show-incluye">@lang('trans.DETALLE DE SU RESERVA')</div>
				<hr>

					<div class="row">

						<div class="col-md-7 col-12">
							
							<p>@lang('trans.Nombre'): <span id="nombre_resumen"></span>.</p>
							<p>@lang('trans.Apellido'): <span id="apellido_resumen"></span>.</p>
							<p>Whatsapp: <span id="whatsapp_resumen"></span>.</p>  
							<p>Email: <span id="email_resumen"></span>.</p>
							<p>@lang('trans.Fecha'): <span id="fecha_resumen"></span>.</p>
							<p>Hotel: <span id="hotel_resumen"></span>.</p>					
							<p>@lang('trans.Adultos'): <span id="adultos_resumen"></span>.</p>
							<p>@lang('trans.Menores'): <span id="menores_resumen"></span>.</p>
								
						</div>

						<div class="col-5">
		                	<button onclick="editar()" class="btn btn-reservar float-end">@lang('trans.EDITAR')</button>	
		                </div>

		            </div>   

		            <hr> 

                <div class="col-12 text-center">
					<b>@lang('trans.TOTAL A PAGAR')</b>
					<div>
						<span>USD </span><span class="total_reserva">{{ $show->precio }}</span>.-
					</div>
				</div>	

                <br>

				<div id="paypal-button-container" class="text-center"></div>
			</div>

		</div> <!-- FIN COL-6 -->

		<!-- mensaje final -->

        <div class="col-md-6 offset-md-3 text-center box-show-int d-none" id="pay-response">
        	<p></p>
        </div>

	</div>
	

</section>    	

@endsection

@section('page-js-script')

	@include('pay_scripts')  

    <!-- bootstrap-datepicker -->
    <script src="{{ asset('vendors/bootstrap-datepicker-1.9/js/bootstrap-datepicker.min.js') }}"></script>

    <script src="{{ asset('vendors/bootstrap-datepicker-1.9/locales/bootstrap-datepicker.en-GB.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap-datepicker-1.9/locales/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap-datepicker-1.9/locales/bootstrap-datepicker.pr.min.js') }}"></script>

    <script src="https://www.paypal.com/sdk/js?client-id=Ac3PPcvSIeTdNRYFaBkPh4b21UD0c89OQUzUyyWKrXoc4yRmYk20pKzKdJ3trnFAMLY-na_KxEK2ecMg"></script>

	<script>

		calculateTotal();

		function calculateTotal() {
		
		    var baseUrl = document.getElementById('baseUrl').value;
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                }
            })
            
            $.ajax({

                url: baseUrl+"/calculateTotal",
                method: "post",
                data: $('#frmReserva').serialize(),
                success: function(total){

	                $('.total_reserva').html(total);
	                $('#total_total').val(total);
              
                }
            });
        
		}

		function editar() {

			$('#paypal-button-container').html('');

			const element = document.querySelector('#resumenReservaPago');
            element.classList.add('animate__animated', 'animate__fadeOutLeft');

                element.addEventListener('animationend', () => {
                
                    $('#resumenReservaPago').addClass('d-none');
                    $('#completeForm').removeClass('d-none');
                    const element_a = document.querySelector('#completeForm');
                    element_a.classList.add('animate__animated', 'animate__fadeInRight');
                    element.classList.remove('animate__animated', 'animate__fadeOutLeft');
                    element_a.classList.remove('animate__animated', 'animate__fadeInRight');
                
                });

                $('html, body').stop().animate({ scrollTop: $("#completeForm").offset().top - 113 }, 1000);

		}

		$('.datespicker').datepicker({
	        todayBtn: "linked",
	        language: "{{ app()->getLocale() }}",
	        autoclose: true,
	        todayHighlight: true,
	        orientation: "bottom right",
	        startDate: '1d',
	    });


		function incrementValue(e) {

			e.preventDefault();
			var fieldName = $(e.target).data('field');
			var parent = $(e.target).closest('div');
			var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

			if (!isNaN(currentVal)) {

				parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
	
			} else {

				parent.find('input[name=' + fieldName + ']').val(1);

			}
			calculateTotal();
		}

		function decrementValue(e) {
			e.preventDefault();
			var fieldName = $(e.target).data('field');
			var parent = $(e.target).closest('div');
			var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

			if (!isNaN(currentVal) && currentVal > 1) {

				parent.find('input[name=' + fieldName + ']').val(currentVal - 1);

			} else {

				if (fieldName='menores') {
					parent.find('input[name=' + fieldName + ']').val(0);
				} else {
					parent.find('input[name=' + fieldName + ']').val(1);
				}
		
			}

			calculateTotal();
		}

		$('.input-group').on('click', '.button-plus', function(e) { incrementValue(e); });
		$('.input-group').on('click', '.button-minus', function(e) { decrementValue(e); });

	</script>

@stop

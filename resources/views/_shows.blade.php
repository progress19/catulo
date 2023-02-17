<? use App\Show; ?>

<section id="shows">
    
    <div class="title-shows">
        @lang('trans.RESERVÁ TU SHOW ON LINE Y OBTÉN TU ENTRADA HOY')
    </div>
  
    <div class="container">
    	  
    	<div class="row">

	    	@foreach ($shows as $show)
	    		
		    	<div class="col-md-6">
			    	<div class="box-show">
				       	<div class="title">{{ Show::getNombreShow($show->id) }}</div>
			    	   	<div class="show-incluye mt-3">@lang('trans.EL SERVICIO INCLUYE')</div>
				    	<hr>
				    	<div class="detalle-show">
						<div class="container">
							<div class="row">
					    		<div class="col-md-7">
									{!! Show::getDescripcionShow($show->id) !!}	
					    		</div>	
					    		<div class="col-md-5">
					    			<div class="box-precio">
					    				<div class="show-importe">
					    					
					    					<span><b>USD {{ $show->precio }}</b></span><br>
					    					@lang('trans.Por persona')<br>

	<a href="{{ route('show', [ 'language' => app()->getLocale(), 'id' => $show->identity, 'slug' => $show->slug ] ) }}" class="btn btn-menu">@lang('trans.RESERVAR')</a>

					    				</div>
					    			</div>
					    		</div>
					   		</div>
				    	</div>
				    	</div>

			    	</div> <!-- box-show -->
		    	</div>

	    	@endforeach

	   	</div>

    </div>	
    
</section>
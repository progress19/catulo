<?php 
use App\Fun; 
use App\Reserva;
?>

@extends('layouts.adminLayout.admin_design')
@section('content')

      <div class="col-md-6">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-shopping-cart"></i> Reservas<small>/ Editar</small></h2>
            <ul class="nav navbar-right panel_toolbox"></ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">

            {{ Form::open([
              'id' => 'edit_reserva',
              'name' => 'edit_reserva',
              'url' => '/admin/edit-reserva/'.$reserva->id,
              'role' => 'form',
              'method' => 'post',
              'files' => true]) }}

              <div class="col-md-5">
                <div class="form-group">
                  {!! Form::label('nombre', 'Fecha de registro') !!}
                  {!! Form::text('nombre', Carbon::parse($reserva->fechaReg)->format('d-m-Y H:i'), ['id' => 'nombre', 'class' => 'form-control', 'readonly']) !!}
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('nombre', 'Nombre') !!}
                  {!! Form::text('nombre', $reserva->nombre, ['id' => 'nombre', 'class' => 'form-control', 'readonly']) !!}
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('apellido', 'Apellido') !!}
                  {!! Form::text('apellido', $reserva->apellido, ['id' => 'apellido', 'class' => 'form-control', 'readonly']) !!}
                </div>
              </div>

              <div class="clearfix"></div> 

              <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('email', 'Email') !!}
                  {!! Form::text('email', $reserva->email, ['id' => 'email', 'class' => 'form-control', 'readonly']) !!}
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('telefono', 'N° teléfono') !!}
                  {!! Form::text('telefono', $reserva->telefono, ['id' => 'telefono', 'class' => 'form-control', 'readonly']) !!}
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('hotel', 'Hotel') !!}
                  {!! Form::text('hotel', $reserva->hotel, ['id' => 'hotel', 'class' => 'form-control', 'readonly']) !!}
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="col-md-12">
                <div class="form-group">
                  {!! Form::label('comentarios', 'Comentarios') !!}
                  {!! Form::textarea('comentarios', $reserva->comentarios, ['id' => 'comentarios', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="clearfix"></div>
              
              {{--<div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('estado', 'Estado') !!}
                  {!! Form::select('estado', array('1' => 'Pagado', '0' => 'Pendiente'), $reserva->estado, ['id' => 'estado', 'class' => 'form-control']); !!}
                </div>
              </div>--}}

                <div class="col-md-12"><div class="ln_solid"></div>
                <button id="send" type="submit" class="btn btn-success pull-right">Guardar</button>
              </div>

            {!! Form::close() !!}

          </div>
        </div>
      </div>

      <!-- panel paquetes  -->

      <div class="col-md-6">
        <div class="x_panel">
          
          <div class="x_title">
            <h2><i class="fa fa-ticket"></i> Show</h2>
            <ul class="nav navbar-right panel_toolbox"></ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
              
              <div class="col-md-4">
                <div class="form-group">
                  {!! Form::label('fecha', 'Fecha de reserva') !!}
                  {!! Form::text('fecha',  Carbon::parse($reserva->fecha)->format('d-m-Y H:i'), array('class' => 'form-control datespicker','id' => 'fecha','readonly')) !!}
                </div>
              </div>

              <div class="col-md-8">
                <div class="form-group">
                  {!! Form::label('Show', 'Show') !!}
                  {!! Form::text('show', $reserva->show->titulo_es, ['id' => 'show', 'class' => 'form-control', 'readonly']) !!}
                </div>
              </div>              

              <div class="clearfix"></div>

              <div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('adultos', 'Adultos') !!}
                  {!! Form::text('adultos', $reserva->adultos, ['id' => 'adultos', 'class' => 'form-control', 'readonly']) !!}
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('menores', 'Menores') !!}
                  {!! Form::text('menores', $reserva->menores, ['id' => 'menores', 'class' => 'form-control', 'readonly']) !!}
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('precio', 'Precio x pax USD') !!}
                  {!! Form::text('precio', $reserva->precio_show, ['id' => 'precio', 'class' => 'form-control', 'readonly']) !!}
                </div>
              </div>              
              
              <div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('total', 'Total USD') !!}
                  {!! Form::text('total', $reserva->total, ['id' => 'total', 'class' => 'form-control', 'readonly']) !!}
                </div>
              </div>   

          </div>
        </div>

        <div class="x_panel"> <!-- pago -->
          
          <div class="x_title">
            <h2><i class="fa fa-dollar"></i> Datos del pago</h2>
            <ul class="nav navbar-right panel_toolbox"></ul>

            <div class="clearfix"></div>
          </div>

          <div class="x_content">

            <div class="col-md-9">

              <div class="col-md-12">
                <div class="form-group">
                  {!! Form::label('orderId', 'Order Id') !!}
                  {!! Form::text('orderId', $reserva->orderId, ['id' => 'orderId', 'class' => 'form-control', 'readonly']) !!}
                </div>
              </div>  

              <div class="col-md-12">
                <div class="form-group">
                  {!! Form::label('orderStatus', 'Order Status') !!}
                  {!! Form::text('orderStatus', $reserva->orderStatus, ['id' => 'orderStatus', 'class' => 'form-control', 'readonly']) !!}
                </div>
              </div>  

              <div class="col-md-12">
                <div class="form-group">
                  {!! Form::label('paymentAmount', 'Payment Amount') !!}
                  {!! Form::text('paymentAmount', $reserva->paymentAmount, ['id' => 'paymentAmount', 'class' => 'form-control', 'readonly']) !!}
                </div>
              </div>  

              <div class="col-md-12">
                <div class="form-group">
                  {!! Form::label('payerName', 'Payer Name') !!}
                  {!! Form::text('payerName', $reserva->payerName, ['id' => 'payerName', 'class' => 'form-control', 'readonly']) !!}
                </div>
              </div>  

              <div class="col-md-12">
                <div class="form-group">
                  {!! Form::label('payerEmail', 'Payer Email') !!}
                  {!! Form::text('payerEmail', $reserva->payerEmail, ['id' => 'payerEmail', 'class' => 'form-control', 'readonly']) !!}
                </div>
              </div>  

              <div class="col-md-12">
                <div class="form-group">
                  {!! Form::label('payerCountry', 'PayerCountry') !!}
                  {!! Form::text('payerCountry', $reserva->payerCountry, ['id' => 'payerCountry', 'class' => 'form-control', 'readonly']) !!}
                </div>
              </div>  

            </div>

          </div>
        </div>

      </div>

@endsection

@section('page-js-script')

@stop


@php
  use App\Fun;
@endphp

@extends('layouts.adminLayout.admin_design')
@section('content')

<!-- page content -->
        <!-- page content -->
        <div class="" role="main">
          <div class="">

            <div class="row">
              <div class="col-md-12 col-sm-9 col-xs-9">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-language"></i> Traducción<small> / Nueva</small></h2>
                    <ul class="nav navbar-right panel_toolbox"></ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
  {{ Form::open([
  	'id' => 'add_traduccion',
  	'name' => 'add_traduccion',
  	'url' => '/admin/add-traduccion',
  	'role' => 'form',
  	'method' => 'post',
    'files' => true]) }}

    <div class="row">

      <div class="col-md-4">
        <div class="form-group">
          {!! Form::label('es', 'Español') !!}
          {!! Form::textarea('es', null, ['id' => 'es', 'class' => 'form-control']) !!}
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          {!! Form::label('en', 'Inglés') !!}
          {!! Form::textarea('en', null, ['id' => 'en', 'class' => 'form-control']) !!}
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          {!! Form::label('pr', 'Portugues') !!}
          {!! Form::textarea('pr', null, ['id' => 'pr', 'class' => 'form-control']) !!}
        </div>
      </div>

     
      <div class="col-md-12"><div class="ln_solid"></div>
          <button id="send" type="submit" class="btn btn-success pull-right">Guardar</button>
      </div>

    </div>

    {!! Form::close() !!}

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<!-- /page content -->

@endsection

@section('page-js-script')

@stop
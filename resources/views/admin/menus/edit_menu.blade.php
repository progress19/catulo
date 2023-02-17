@php
use App\Fun;
@endphp

@extends('layouts.adminLayout.admin_design')
@section('content')

<div class="col-md-8">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-book"></i> Menú<small>/ {{ $menu->nombre }}</small></h2>
            <ul class="nav navbar-right panel_toolbox"></ul>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">

            {{ Form::open([
                'id' => 'edit_menu',
                'name' => 'edit_menu',
                'url' => '/admin/edit-menu/'.$menu->id,
                'role' => 'form',
                'method' => 'post',
                'files' => true])
            }}

                <div class="clearfix"></div>

                <!-- ES file pdf -->
                <div class="col-md-3" >
                    <div class="form-group">
                        {!! Form::label('es', 'Pdf Español') !!}
                        {!! Form::file('es', null, ['id' => 'es', 'class' => 'form-control']) !!}
                    </div>
                </div>
                {{ Form::hidden('current_file_es', $menu->es) }}

                <div class="clearfix"></div>  <br>              

                <!-- EN file pdf -->
                <div class="col-md-3" >
                    <div class="form-group">
                        {!! Form::label('en', 'Pdf Inglés') !!}
                        {!! Form::file('en', null, ['id' => 'en', 'class' => 'form-control']) !!}
                    </div>
                </div>
                {{ Form::hidden('current_file_en', $menu->en) }}

                <div class="clearfix"></div><br>

                <!-- PR file pdf -->
                <div class="col-md-3" >
                    <div class="form-group">
                        {!! Form::label('pr', 'Pdf Portugues') !!}
                        {!! Form::file('pr', null, ['id' => 'pr', 'class' => 'form-control']) !!}
                    </div>
                </div>
                {{ Form::hidden('current_file_pr', $menu->pr) }}

                <div class="clearfix"></div>

                <div class="col-md-12"><div class="ln_solid"></div>
                <button id="send" type="submit" class="btn btn-success pull-right">Guardar</button>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>


@endsection

@section('page-js-script')

@stop


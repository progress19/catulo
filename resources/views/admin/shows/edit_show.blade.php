@php
  use App\Fun;
@endphp

@extends('layouts.adminLayout.admin_design')
@section('content')

      <div class="col-md-8">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-star"></i> Show<small>/ Editar</small></h2>
            <ul class="nav navbar-right panel_toolbox"></ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">

            {{ Form::open([
              'id' => 'edit_show',
              'name' => 'edit_show',
              'url' => '/admin/edit-show/'.$show->id,
              'role' => 'form',
              'method' => 'post',
              'files' => true]) }}

    <div class="tab-idiomas" role="tabpanel" data-example-id="togglable-tabs">
      
      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
        <li role="presentation" class="active">
          <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> {{ HTML::image(asset('images/argentina-flag.png'), null, array('class' => 'img-fluid', 'style' => 'height:20px')) }} Español</a>
        </li>
        <li role="presentation" class="">
          <a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">{{ HTML::image(asset('images/united-kingdom-flag.png'), null, array('class' => 'img-fluid', 'style' => 'height:20px')) }} Inglés</a>
        </li>
        <li role="presentation" class="">
          <a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">{{ HTML::image(asset('images/brasil-flag.png'), null, array('class' => 'img-fluid', 'style' => 'height:20px')) }} Portugues</a>
        </li>
      </ul>

      <div id="myTabContent" class="tab-content">
       
        <div role="tabpanel" class="tab-pane fade show active in" id="tab_content1" aria-labelledby="home-tab">

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('titulo_es', 'Título Español') !!}
              {!! Form::text('titulo_es', $show->titulo_es, ['id' => 'titulo_es', 'class' => 'form-control']) !!}
            </div>
          </div>

          <div class="clearfix"></div>

            <div class="col-md-12">
             <div class="form-group">
               {!! Form::label('des_es', 'Descripción Español') !!}
               {!! Form::textarea('des_es', $show->des_es, ['id' => 'des_es', 'class' => 'form-control']) !!}
             </div>
            </div>

            <div class="clearfix"></div>

        </div>

        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('titulo_en', 'Título Inglés') !!}
              {!! Form::text('titulo_en', $show->titulo_en, ['id' => 'titulo_en', 'class' => 'form-control']) !!}
            </div>
          </div>

          <div class="clearfix"></div>

            <div class="col-md-12">
             <div class="form-group">
               {!! Form::label('des_en', 'Descripción Inglés') !!}
               {!! Form::textarea('des_en', $show->des_en, ['id' => 'des_en', 'class' => 'form-control']) !!}
             </div>
            </div>

            <div class="clearfix"></div>

        </div>

        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('titulo_pr', 'Título Portugues') !!}
              {!! Form::text('titulo_pr', $show->titulo_pr, ['id' => 'titulo_pr', 'class' => 'form-control']) !!}
            </div>
          </div>

          <div class="clearfix"></div>

            <div class="col-md-12">
             <div class="form-group">
               {!! Form::label('des_pr', 'Descripción Portugues') !!}
               {!! Form::textarea('des_pr', $show->des_pr, ['id' => 'des_pr', 'class' => 'form-control']) !!}
             </div>
            </div>

            <div class="clearfix"></div>

        </div>

      </div>
    </div>

              <div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('precio', 'Precio') !!}
                  {!! Form::number('precio', $show->precio, ['id' => 'precio', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="clearfix"></div>


       <!-- imgagen -->


        <div class="col-md-3" >
          <div class="form-group">
            {!! Form::label('imagen', 'Imágen') !!}
            {!! Form::file('imagen', null, ['id' => 'imagen', 'class' => 'form-control']) !!}
          </div>
        </div>
        {{ Form::hidden('current_imagen', $show->imagen ) }}
        
        <div class="clearfix"></div>

              <div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('estado', 'Estado') !!}
                  {!! Form::select('estado', array('1' => 'Activado', '0' => 'Desactivado'), $show->estado, ['id' => 'estado', 'class' => 'form-control']); !!}
                </div>
              </div>   

                <div class="col-md-12"><div class="ln_solid"></div>
                <button id="send" type="submit" class="btn btn-success pull-right">Guardar</button>
              </div>

            {!! Form::close() !!}

          </div>
        </div>
      </div>

      <div class="col-md-4">
        
        @if ($show->imagen)
          {{ HTML::image(asset(Fun::getPathImage('large','shows',$show->imagen)), 'no-imágen', array('class' => 'img-fluid img_destacada_back', 'style' => '', 'data-toggle' => 'modal', 'data-target' => '#modal_image')) }}
        @endif    
 
      </div>

@endsection

@section('page-js-script')

<script>

  ClassicEditor
    .create(document.querySelector('#des_es'))
    .catch(error=> {console.error(error);})

  ClassicEditor
    .create(document.querySelector('#des_en'))
    .catch(error=> {console.error(error);})

  ClassicEditor
    .create(document.querySelector('#des_pr'))
    .catch(error=> {console.error(error);})

</script>

@stop


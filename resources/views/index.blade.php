@extends('layouts.principal')

@section('content')
	<header class="masthead bg-primary">
		<div class="row">
			<div class="col-lg-8 mx-auto">
				<h2 class="text-uppercase mb-0 text-center">Ingreso de usuarios.</h2>
				{!!Form::open(['action' => 'user@store', 'novalidate'=>'novalidate'])!!}
					<div class="control-group">
		                <div class="form-group floating-label-form-group controls mb-0 pb-2">
		                  {!!Form::label('Cargo')!!}
		                  {!!Form::text('Cargo',null,['class'=>'form-control', 'id'=>'cargo', 'placeholder'=>'Ingrese su cargo, por ejemplo: cocina.', 'required'=>'required', 'data-validation-required-message'=>'Por favor ingrese su cargo.'])!!}
		                  <p class="help-block text-danger"></p>
		                </div>
		            </div>
					<div class="control-group">
		                <div class="form-group floating-label-form-group controls mb-0 pb-2">
							{!!Form::label('Contraseña')!!}
							{!!Form::password('Contraseña',['class'=>'form-control', 'id'=>'Contraseña', 'placeholder'=>'Ingrese su contraseña', 'required'=>'required', 'data-validation-required-message'=>'Por favor ingrese su contraseña.'])!!}
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<div id="success"></div>
		              <div class="form-group">
		              	{!!Form::submit('Ingresar',['class'=>'btn btn-primary btn-xl'])!!}
		              </div>
				{!!Form::close()!!}
			</div>
		</div>
	</header>

@stop
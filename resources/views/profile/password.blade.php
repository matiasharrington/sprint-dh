@extends('layouts.masterPage')

@section('titulo')
    Edita tu Contraseña
@endsection

@section('contenido')

@if (Session::has('message'))
 <div class="text-danger">
 {{Session::get('message')}}
 </div>
@endif

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Edita tu contraseña</h2>
				</div>

				<div class="panel-body">
					<form class="form-horizontal" method="post" action="{{url('updatepassword')}}">
						{{csrf_field()}}

						<div class="form-group">
					  		<label for="mypassword" class="col-md-4 control-label">Introduce tu actual contraseña:</label>

					  		<div class="col-md-6">
					  			<input type="password" name="mypassword" class="form-control">
						  		<div class="text-danger">{{$errors->first('mypassword')}}</div>
					  		</div>
						</div>

					 	<div class="form-group">
					  		<label for="password" class="col-md-4 control-label">Introduce tu nueva contraseña:</label>

					  		<div class="col-md-6">
					  			<input type="password" name="password" class="form-control">
						  		<div class="text-danger">{{$errors->first('password')}}</div>
					  		</div>
					 	</div>

					 	<div class="form-group">
					  		<label for="mypassword" class="col-md-4 control-label">Confirma tu nueva contraseña:</label>

					  		<div class="col-md-6">
					  			<input type="password" name="password_confirmation" class="form-control">
					  		</div>
					 	</div>

					 	<div class="form-group">
					 		<div class="col-md-6 col-md-offset-4">
					 			<button type="submit" class="btn btn-primary">Cambiar mi contraseña</button>
					 		</div>
					 	</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>				
@stop
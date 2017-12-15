@extends('layouts.masterPage')

@section('titulo')
    Edita tu Informacion
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
					<h2>Edita tu informacion</h2>
				</div>

				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="{{url('updateinfoprofile')}}">
						{{csrf_field()}}

					 	<div class="form-group">
							<label for="first_name" class="col-md-4 control-label">Nombre:</label>
							<div class="col-md-6">
								<input type="text" name="first_name" class="form-control">
								<div class="text-danger">{{$errors->first('first_name')}}</div>
							</div>
						</div>

						<div class="form-group">
							<label for="last_name" class="col-md-4 control-label">Apellido:</label>
							<div class="col-md-6">
								<input type="text" name="last_name" class="form-control">
								<div class="text-danger">{{$errors->first('last_name')}}</div>
							</div>
						</div>

						<div class="form-group">
							<label for="nickname" class="col-md-4 control-label">Nombre de usuario:</label>
							<div class="col-md-6">
								<input type="text" name="nickname" class="form-control">
								<div class="text-danger">{{$errors->first('nickname')}}</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="col-md-4 control-label">Correo:</label>
							<div class="col-md-6">
								<input type="text" name="email" class="form-control">
								<div class="text-danger">{{$errors->first('email')}}</div>
							</div>
						</div>

						<div class="form-group">
							<label for="age" class="col-md-4 control-label">Edad:</label>
							<div class="col-md-6">
								<input type="text" name="age" class="form-control">
								<div class="text-danger">{{$errors->first('age')}}</div>
							</div>
						</div>

						<div class="form-group">
					        <label for="country" class="col-md-4 control-label">Pais</label>
					        <div class="col-md-6">
					            <select name="country" class="form-control">
					                <option value="NULL">
					                    Seleccione un Pais
					                </option>
					                <option value="Ar">
					                    Argentina
					                </option>
					                <option value="Br">
					                    Brasil
					                </option>
					                <option value="Co">
					                    Colombia
					                </option>
					            </select>
					        </div><br><br>
					        <div class="col-md-6 col-md-offset-4 text-danger">{{$errors->first('country')}}</div>
					    </div>

					    <div class="form-group">
					    	<div class="col-md-6 col-md-offset-4">
					    		<button type="submit" class="btn btn-sm btn-info">Enviar</button>
					    	</div>
					    </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>				
@stop
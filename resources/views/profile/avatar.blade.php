@extends('layouts.masterPage')

@section('titulo')
    Edita tu Avatar
@endsection

@section('contenido')

@if (Session::has('message'))
 <div class="text-danger">
 {{Session::get('message')}}
 </div>
@endif

<div class="container" id="cont-avatar">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Edita tu Avatar</h2>
				</div>

				<div class="panel-body">
					<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('updateavatar')}}">
						{{csrf_field()}}
					 	<div class="form-group">
					 		<label for="avatar" class="col-md-4 control-label">Avatar:</label>
					        <div class="col-md-6">
					        	<input type="file" name="avatar">
					        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
					        </div>
					 	</div>

					 	<div class="form-group">
					 		<div class="col-md-6 col-md-offset-4">
					 			<button type="submit" class="btn btn-default">Cambiar mi avatar</button>
					 		</div>
					 	</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>			
@stop
@extends('layouts.masterPage')

@section('titulo')
  Editar producto | Planet Express
@endsection

@section('contenido')
  
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
	        @foreach ($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
    	</ul>
	</div>
@endif
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1>Editar Producto: {{$product->product_name}}</h1>
				</div>

				<div class="panel-body">
					<form class="form-horizontal" enctype="multipart/form-data" action="/editarProducto" method="post">
					    {{ csrf_field() }}
					    <input type="hidden" name="_method" value="PATCH">

						<div class="form-group">
					      	<label for="product_name" class="col-md-4 control-label">Producto:</label>
					      	<div class="col-md-6">
					      		<input class="form-control" type="text" name="product_name" value="{{$product->product_name}}">
					      	</div>
					    </div>

					    <div class="form-group">
					      	<label for="product_description" class="col-md-4 control-label">Descripcion:</label>
					      	<div class="col-md-6">
					      		<textarea class="form-control" id="concepto" name="product_description">{{$product->product_description}}</textarea>
					      	</div>
					    </div>

						<div class="form-group">
					 		<label class="col-md-4 control-label">Imagen Actual:</label>
					 		<div class="col-md-6">
					 			<img src="/image/products/{{$product->product_image}}" alt="IMG-Prod" id="ProdIMG" class="w3-left w3-margin-right imgs-prod">
					 		</div>
					 	</div>
						
					    <div class="form-group">
					 		<label for="product_image" class="col-md-4 control-label">Imagen:</label>
					        <div class="col-md-6">
					        	<input type="file" name="product_image">
					        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
					        </div>
					 	</div>

					    <input type="hidden" name="id" value="{{$product->id}}">
					    <div class="form-group">
					      	<label for="product_department" class="col-md-4 control-label">Departamento:</label>
					      	<div class="col-md-6">
					      		<select class="form-control" name="product_department">
						        	@foreach($department as $key)
						          		@if ($key->id_departments == $product->product_department)
						            		<option value="{{$key->id_departments}}" selected>
						              			{{$key->name}}
						            		</option>
						          		@else
						            		<option value="{{$key->id_departments}}">
						              			{{$key->name}}
						            		</option>
						          		@endif
						        	@endforeach
						      	</select>
					      	</div>
					    </div>

						<div class="form-group">
					      	<label for="product_price" class="col-md-4 control-label">Precio:</label>
					      	<div class="col-md-6">
					      		<input class="form-control" type="text" name="product_price" value="{{$product->product_price}}">
					      	</div>
					    </div>

					    <div class="form-group">
					      	<label for="product_stock" class="col-md-4 control-label">Stock:</label>
					      	<div class="col-md-6">
					      		<input class="form-control" type="text" name="product_stock" value="{{$product->product_stock}}">
					      	</div>
					    </div>

					    <div class="form-group">
					    	<div class="col-md-6 col-md-offset-4">
					    		<input type="submit" value="Editar producto" class="btn btn-primary">
					    	</div>
					    </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>					
@endsection

@extends('layouts.masterPage')

@section('titulo')
  Agregar Producto | Planet Express
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
                    <h1>Agregar Producto</h1>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" action="/agregarProducto" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="product_name" class="col-md-4 control-label">Producto:</label>
                            <div class="col-md-6">
                              <input class="form-control" type="text" name="product_name" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="product_description" class="col-md-4 control-label">Descripcion:</label>
                            <div class="col-md-6">
                              <textarea class="form-control" id="concepto" name="product_description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="product_image" class="col-md-4 control-label">Imagen:</label>
                            <div class="col-md-6">
                              <input type="file" name="product_image">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="product_department" class="col-md-4 control-label">Departamento:</label>
                            <div class="col-md-6">
                                <select class="form-control" name="product_department">
                                    @foreach($department as $key)
                                        <option value="{{$key->id_departments}}" selected>
                                            {{$key->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="product_price" class="col-md-4 control-label">Precio:</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="product_price" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="product_stock" class="col-md-4 control-label">Stock:</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="product_stock" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" value="Agregar producto" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

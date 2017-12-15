@extends('layouts.masterPage')

@section('titulo')
	Contacto | Planet Express
@endsection

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Envianos tus consultas en este formulario</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre:</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                            <label for="age" class="col-md-4 control-label">Edad:</label>

                            <div class="col-md-6">
                                <input id="age" type="text" class="form-control" name="age" value="{{ old('age') }}" required autofocus>

                                @if ($errors->has('age'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="consulta" class="col-md-4 control-label">Consulta:</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="concepto" name="consulta" placeholder="Escribinos tu consulta..."></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="w3-button w3-blue">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <section class="sucursales">
	        	<article class="sucursal">
	            	<h2>Sucursales:</h2>
	            	<h3>Sucursal Monroe</h3>
	            	<p>Sucursal Principal de Planet express, aqui es donde empezamos y nuestra casa madre.</p>
	            	<img src="../IMAGE/tienda2.jpg" id="imagen-sucursal"><br>
	            </article>
	        </section>
        </div>
    </div>
</div>
@endsection
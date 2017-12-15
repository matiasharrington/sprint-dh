@extends('layouts.masterPage')

@section('titulo')
    Perfil de {{Auth::user()->nickname}}
@endsection

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Perfil de {{$user->nickname}}</h2></div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="/avatars/{{$user->avatar}}" alt="Avatar" id="avatar">
                    <ul>
                        <li>
                            Nombre: {{$user->first_name}}
                        </li>
                        <li>
                            Apellido: {{$user->last_name}}
                        </li>
                        <li>
                            Nombre de Usuario: {{$user->nickname}}
                        </li>
                        <li>
                            Mail: {{$user->email}}
                        </li>
                        <li>
                            Edad: {{$user->age}}
                        </li>
                        <li>
                            Pais: {{$user->country}}
                        </li>
                    </ul>
                    <a href="{{url('password')}}" class="btn btn-primary" role="button">Cambiar Contraseña</a>
                    <a href="{{url('avatar')}}" class="btn btn-default" role="button">Cambiar Avatar</a>
                    <a href="{{url('infoprofile')}}" class="btn btn-info" role="button">Editar Informacion</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

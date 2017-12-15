@extends('layouts.masterPage')

@section('titulo')
  Carrito | Planet Express
@endsection

@section('contenido')
  <h1>Mi Carrito</h1>
  <ul>
    @forelse($cart as $item)
      <li>
        {{$item->product_name}}
      </li>
    @empty
      <li>
        No hay items
      </li>
    @endforelse
  </ul>
@endsection

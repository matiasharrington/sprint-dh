@extends('layouts.masterPage')


@section('titulo')
  
@endsection

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Detalles {{$product->product_name}}</h3></div>
                <div class="panel-body">
                    <img src="/image/products/{{$product->product_image}}" alt="ProdIMG" class="w3-margin-right imgs-prod">
                    <ul id="info-product">
                      <li>{{$product->product_description}}</li>
                      <li>Stock: {{$product->product_stock}}</li>
                      <li>{{$product->product_price}} $</li>
                    </ul>
                    @guest
                    <form>
                       <input type="button" value="Comprar" onclick="redirect();" class="btn btn-success" />
                    </form>
                    @else
                      @if (Auth::user()->type == 1)
                        <a href="/borrarProducto/{{$product->id}}" role="button" class="btn btn-danger">Borrar</a>
                        <a href="/editarProducto/{{$product->id}}" role="button" class="btn btn-warning">Editar</a>
                      @endif
                      @if ($inCart)
                        <form class="" action="/quitarCarrito" method="post">
                          {{csrf_field()}}
                          <input type="hidden" name="id" value="{{$product->id}}">
                          <input type="submit" name="" value="Quitar del carrito" class="btn btn-warning">
                        </form>
                      @else
                        <form class="" action="/agregarACarrito" method="post">
                          {{csrf_field()}}
                          <input type="hidden" name="id" value="{{$product->id}}">
                          <input type="submit" name="" value="Agregar a carrito" class="btn btn-success">
                        </form>
                      @endif
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  function redirect() {
    if (window.confirm('Para comprar productos debe estar registrado, desea registrarse?')) {
        // They clicked Yes
        window.location="/register";
    }
    else
    {
        // They clicked no
    }
  }
</script>
@endsection

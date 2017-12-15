@extends('layouts.masterPage')

@section('titulo')
	Productos | Planet Express
@endsection

@section('contenido')
<div class="w3-container">
	@forelse ($products as $key => $product)
		    <div class="w3-card-4 tarjetas">
		        <header class="w3-container w3-light-grey">
		            <h3>{{$product->product_name}}</h3>
		        </header>
		        <div class="w3-container">
		        	<img src="/image/products/{{$product->product_image}}" alt="ProdIMG" class="w3-margin-right imgs-prod"><hr>
		            <p>{{$product->product_price}} $</p><br>
		        </div>
		        <a href="/producto/{{$product->id}}" class="w3-button w3-block w3-blue" role="button">Ver detalles Producto</a>
		    </div>
	@empty
		<div class="jumbotron">
			<div class="alert alert-danger" role="alert">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  	<span class="sr-only">Error:</span>
			  		No hay Productos.
			</div>
		</div>
	@endforelse

	<div style="text-align: center;">
		{{ $products->links() }}
	</div>
</div>
@endsection
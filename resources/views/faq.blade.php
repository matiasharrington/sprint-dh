@extends('layouts.masterPage')

@section('titulo')
	FAQ | Planet Express
@endsection

@section('contenido')
<div class="container margenes-contenedores-15">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Preguntas Frecuentes</div>

                <div class="panel-body">
                    <article class="pregunta">
						<h2>A que nos dedicamos?</h2>
						<p>Nos dedicamos la compra/venta de productos de cualquier categoria, especializados en envios a domicilio.</p>
					</article>
					<article class="pregunta">
						<h2>Hasta donde llegan sus envios?</h2>
						<p>Nuestros envios llegan a todo Buenos Aires y todo Cordoba.</p>
					</article>
					<article class="pregunta">
						<h2>Porque es tan reducido su alcance?</h2>
						<p>Nos gusta proporcionar un buen servicio a nuestro cliente, y para ello nuestra filosofia es que sie el envio no es rapido y seguro no estamos cumpliendo con el cliente.</p>
					</article>
					<article class="pregunta">
						<h2>Tienen planeado extenderlo?</h2>
						<p>Si, tenemos planeado extender nuestro rango hasta SantaFe y La Pampa para el proximo año, abriendo 4 nuevas tiendas!</p>
					</article>
					<article class="pregunta">
						<h2>Hay exepciones en el envio?</h2>
						<p>Si, pero para poder lograr cumplir con nuestro compromiso con el cliente el envio se triplica lamentablemente.</p>
					</article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
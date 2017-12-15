@extends('layouts.masterPage')

@section('titulo')
    Home | Planet Express
@endsection

@section('contenido')
        <div class="container-fluid" id="cuerpo-carrousel">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li>
                    <li data-target="#myCarousel" data-slide-to="5"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="/image/carousel/im50.jpg" alt="planchitas">
                    </div>
                    <div class="item">
                        <img src="/image/carousel/im30.jpg" alt="celulares">
                    </div>
                    <div class="item">
                        <img src="/image/carousel/im16.jpg" alt="gamer">
                    </div>
                    <div class="item">
                        <img src="/image/carousel/im17.jpg" alt="music">
                    </div>
                    <div class="item">
                        <img src="/image/carousel/banner-5.jpg" alt="tv">
                    </div>
                    <div class="item">
                        <img src="/image/carousel/m15.jpg" alt="ac">
                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="w3-container">
            <div class="w3-card-4 tarjetas">
                <header class="w3-container w3-light-grey">
                    <h3>Descuento del 25%</h3>
                </header>
                <div class="w3-container">
                    <h4>Mes de las Madres</h4><hr>
                    <p>Con la compra de cualquier laptop Lenovo, obtiene el 25% de Descuento en el precio final. Consultar la seccion de <strong>productos</strong> para saber el precio y disponibilidad. Promocion valida hasta el  19-11-2017  o hasta agotar stock.</p><br>
                </div>
                <button class="w3-button w3-block w3-blue" onclick="window.open('/productos#4')">Productos</button>
            </div>
            <div class="w3-card-4 tarjetas">
                <header class="w3-container w3-light-grey">
                    <h3>Descuento del 25%</h3>
                </header>
                <div class="w3-container">
                    <h4>Celulares Samsung</h4><hr>
                    <p>Con la compra de cualquier celular Samsung, obtiene el 25% de Descuento en el precio final. Consultar la seccion de <strong>productos</strong> para saber el precio y disponibilidad. Promocion valida hasta el  26-10-2017  o hasta agotar stock.</p><br>
                </div>
                <button class="w3-button w3-block w3-blue" onclick="window.open('/productos#4')">Productos</button>
            </div>
            <div class="w3-card-4 tarjetas">
                <header class="w3-container w3-light-grey">
                  <h3>Descuento del 10%</h3>
                </header>
                <div class="w3-container">
                    <h4>Semana Gamer</h4><hr>
                    <p>Con la compra de cualquier juego XBOX, obtiene el 10% de descuento en el precio final. Consultar la seccion de <strong>productos</strong> para saber el precio y disponibilidad. Promocion valida hasta el 30-10-2017 o hasta agotar stock.</p><br>
                </div>
                <button class="w3-button w3-block w3-blue" onclick="window.open('/productos#9')">Productos</button>
            </div>
            <div class="w3-card-4 tarjetas">
                <header class="w3-container w3-light-grey">
                  <h3>Descuento del 20%</h3>
                </header>
                <div class="w3-container">
                    <h4>Semana Music Lovers</h4><hr>
                    <p>Con la compra de cualquier auricular Sony, obtiene 20% de descuento en el precio final. Consultar la seccion de <strong>productos</strong> para saber el precio y disponibilidad. Promocion valida hasta el 30-10-2017 o hasta agotar stock.</p><br>
                </div>
                <button class="w3-button w3-block w3-blue" onclick="window.open('/productos#12')">Productos</button>
            </div>
            <div class="w3-card-4 tarjetas">
                <header class="w3-container w3-light-grey">
                  <h3>Descuento del 15%</h3>
                </header>
                <div class="w3-container">
                    <h4>Semana Informatico</h4><hr>
                    <p>Con la compra de cualquier procesador, obtiene 15% de descuento en el precio final. Consultar la seccion de <strong>productos</strong> para saber el precio y disponibilidad. Promocion valida hasta el 30-10-2017 o hasta agotar stock.</p><br>
                </div>
                <button class="w3-button w3-block w3-blue" onclick="window.open('/productos#1')">Productos</button>
            </div>
            <div class="w3-card-4 tarjetas">
                <header class="w3-container w3-light-grey">
                  <h3>Descuento del 25%</h3>
                </header>
                <div class="w3-container">
                    <h4>Mes de las Madres</h4><hr>
                    <p>Con la compra de cualquier laptop, obtiene el 25% de Descuento en el precio final. Consultar la seccion de <strong>productos</strong> para saber el precio y disponibilidad. Promocion valida hasta el  19-11-2017  o hasta agotar stock.</p><br>
                </div>
                <button class="w3-button w3-block w3-blue" onclick="window.open('/productos')">Productos</button>
            </div>
        </div>
@endsection

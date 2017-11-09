<?php include("INCLUDES/funciones.php"); ?>
<?php include("INCLUDES/header.php"); ?>

        <div class="container">
              <div class="row">
                <div class="col-xs-12  col-sm-8 col-sm-offset-2  col-md-6 col-md-offset-3">
                  <h1 class="title-contact">Envianos tus consultas en este formulario</h1>
                  <form action="/action_page.php">
                    <div class="form-group">
                      <label for="nombre">Nombre Completo</label>
                      <input class="form-control" type="text" id="nombre" name="name" placeholder="Tu nombre y Apellido" maxlength="30">
                    </div><br>
                    <div class="form-group">
                      <label for="telefono">Telefono</label>
                      <input class="form-control" type="text" id="telefono" name="phone" placeholder="Telefono de Contacto" maxlength="14">
                    </div><br>
                    <div class="form-group">
                      <label for="consulta">Consulta</label>
                        <textarea class="form-control" id="subject" name="consulta" placeholder="Escribinos tu consulta..." style="height:200px"></textarea>
                    </div><br>
                      <input class="w3-button w3-blue" type="submit" value="Enviar">
                  </form><br>
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
        <?php include("INCLUDES/footer.php"); ?>
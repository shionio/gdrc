<?php 
  //prp($listarReclamos);
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
  	<?= cargar_headers() ?>
  	<?= mostrar_nav_bar() ?>
  	<meta charset="UTF-8">
  	<title>Listando Reclamos</title>
  </head>
  <body>
  	<h3 align="center">Seguimiento de Reclamo, según el criterio de búsqueda</h3>
  	<br>
  <div class="container">
    
    <div class="row">
      <h5>Criterio de búsqueda</h5>
      <div class="col l4" id="nacionalidad">
          Nacionalidad       
            <p>
              <label>
                <input class="nacionalidad" name="nacionalidad" type="radio" value="N" />
                <span><b>Cedula id Nacionalidad -></b></span>
              </label>
            </p>
            <p>
              <label>
                <input class="nacionalidad" name="nacionalidad" type="radio" value="NR" />
                <span><b>Número Reclamo</b></span>
              </label>
            </p>
            <p>
              <label>
                <input class="nacionalidad" name="nacionalidad" type="radio" value="NC" />
                <span><b>Numero Cuenta</b></span>
              </label>
            </p>       
        </div>
    </div>
  </div>



	<div class="hide">
    
    <table class="striped">
        <thead>
          <tr>
              <th>N° Reclamo</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Estatus</th>
              <th>Acciones</th>

          </tr>
        </thead>
        <tbody>

      <?php foreach ($listarReclamos as $i => $reclamo) { ?>
          <tr>
            <td> <?= $reclamo['num_reclamo']?> </td>
            <td> <?= strtoupper($reclamo['nombre']) ?> </td>
            <td> <?= strtoupper($reclamo['apellido']) ?></td>
            <td>  </td>
            <td> <a class="light-blue darken-3"><i class="material-icons left">edit</i></a></td>
          </tr>
      <?php } ?>
        </tbody>
      </table>
  </div>
  <div align="center">
      <!--<a class=" light-blue darken-3 btn" href="registro">Nuevo</a>-->
      <a class=" light-blue darken-3 btn" href='<?= base_url() ?>Inicio_controller'>Volver</a>
    </div>

</body>
</html>   
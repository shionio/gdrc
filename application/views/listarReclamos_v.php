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
	<h1 align="center">Listado de Reclamos</h1>
	<br><br>
	<div align="center">
		<!--<a class=" light-blue darken-3 btn" href="registro">Nuevo</a>-->
		<a class=" light-blue darken-3 btn" href='<?= base_url() ?>Inicio_controller'>Volver</a>
	</div>
<br>
<br>

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
            <td></td>
            <td></td>
          </tr>
      <?php } ?>
        </tbody>
      </table>

</body>
</html>
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
		<a class=" light-blue darken-3 btn" href="registro">Nuevo</a>
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
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>$3.76</td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td>$7.00</td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>

</body>
</html>
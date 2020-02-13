<!DOCTYPE html>	
<html>
<head>
	<?=cargar_headers()?>
	<?=mostrar_nav_bar()?>
	<meta charset="utf-8" />
	<style type="text/css">
		body{
			margin-left: 304px; 
		}
		.waves-effect{
			margin-left: 10px;
		}
		.input-field{
			margin-top: 1px;
		}
	</style>
</head>

<body>
	<?php //prp($persona,1); ?>
	<div class="row">		
		<h4 align="center"><?=$titulo?></h4>
		<form method="POST" id="formRegistro" name="formRegistro" action="<?= site_url()?>/administracion_controller/guardarUsuario/"/>
		<div class="col s6 m6 l6">			
			<a class="waves-effect waves-orange btn" href="<?= site_url()?>/administracion_controller/listarUsuarios"><i class="material-icons left">reply</i>Volver</a>		
		</div>
		<div class="col s6 m6 l6 right-align">
			<a class="waves-effect waves-light btn" onclick="guardar()"><i class="material-icons left">save</i>Guardar</a>	
		</div>

		<div class="row">			
			<div class="col s4 m4 l4">
			Cédula
			<input type="text" class="requerido" name="cedula" value="<?= $persona['cedula']; ?>"/>

			</div>
			<div class="col s4 m4 l4">
			Nombre
			<input type="text" class="requerido" name="nombre" value="<?= $persona['nombre']; ?>"/>
			</div>

			<div class="col s4 m4 l4">
			Apellido
			<input type="text" class="requerido" name="apellido" value="<?= $persona['apellido']; ?>"/>
			</div>

			<div class="col s4 m4 l4">
			Teléfono
			<input type="tel" class="requerido" name="telefono" value="<?= $persona['telefono']; ?>"/>
			</div>

			<div class="col s4 m4 l4">
			Correo
			<input type="email" class="requerido" name="correo" value="<?= $persona['correo']; ?>"/>
			</div>

			<div class="col s4 m4 l4">
			Usuario
			<input type="text" class="requerido" name="usuario" value="<?= $persona['usuario']; ?>"/>
			</div>

			<div class="col s6 m6 l6">
			Clave
			<input type="password" class="requerido" name="contrasena" value="<?= $persona['contrasena']; ?>"/>
			</div>

			<div class="col s6 m6 l6">
			Roles
			<select name="rol" class="input-field" value="<?= $persona['codigo_oficina'];?>">
				<option value="">Seleccione</option>
				<?php 
					foreach ($rol as $codigo_rol => $roles) { ?>
					<option value="<?=$roles['codigo_rol'];?>"><?=$roles['nombre_rol'];?></option>
					<?php } ?>
			</select>
				</div>
				
			<div class="col s6 m6 l6">
				Oficinas
				<select name="oficina" class="input-field" value="<?= $persona['codigo_rol'];?>">
					<option value="">Seleccione</option>
					<?php foreach ($oficina as $codigo_oficina => $oficina) { ?>
						<option value="<?= $oficina['codigo_oficina'] ?>"><?= $oficina['nombre_oficina']; ?></option>
				 <?php	} ?>
				</select>
			</div>

			<div class="col m4 m4 l4 hide">
			codigo_persona
			<input type="text" class="requerido" name="codigoPersona" value="<?= $persona['codigo_persona'];?>" />
			</div>
		</div>
		</form>
	</div>

	<script>
	  $(document).ready(function() {
	    $('select').material_select();
	     Materialize.updateTextFields();
	  });
            
	
	function guardar(){
		$('#formRegistro').submit();
	}
</script>
</body>

</html>
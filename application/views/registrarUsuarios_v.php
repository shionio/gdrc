<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<script type="text/javascript" src="<?= base_url()?>plantilla/js/jquery.js"></script>
	<!--link rel="stylesheet" type="text/css" href="<?= base_url() ?>plantilla/css/autenticar.css"-->
	<title>Registar Usuario</title>	
</head>
<body>

	<form method="POST" id="formRegistro" name="formRegsitro" action="<?=base_url().'administracion_controller/verificarRegistro'?>">	
		<div align="center">
			<h1>Registrar Usuario</h1><br><br>

			<?php if(isset($mensaje)): ?>
			<h2><?= $mensaje ?> </h2>
			<?php endif; ?>

			<label>Cédula</label>
			<input type="text" name="cedula"/><br><br>

			<label>Nombre</label>
			<input type="text" name="nombre"/><br><br>

			<label>Apellido</label>
			<input type="text" name="apellido"/><br><br>

			<label>Teléfono</label>
			<input type="text" name="telefono"/><br><br>

			<label>Correo</label>
			<input type="text" name="correo"/><br><br>

			<label>Usuario</label>
			<input type="text" name="usuario"/><br><br>

			<label>Clave</label>
			<input type="password" name="clave"/><br><br>

			<label>Repetir Clave</label>
			<input type="password" name="clave2"/><br><br>

			<label>Oficina</label>
				<select name="oficina">
					<option value="">Seleccione</option>
					<option value="OF001"> Informática</option>
					<option value="OF002">Compras</option>
					<option value="OF003">Desarrollo</option>
					<option value="OF004">Recursos Humanos</option>
					<option value="OF005">Seguridad</option>
				</select><br><br>

			<label>Rol</label>
				<select name="rol">
					<option value="">Seleccione</option>
					<option value="ROL001"> Administrador</option>
					<option value="ROL002">Analista</option>
					<option value="ROL003">Usuario</option>
					<option value="ROL004">Solo Lectura</option>
					<option value="ROL005">Auditor</option>
				</select><br><br>

			<input type="submit" name="submit_reg" value="Registrar" id="registrar"><br><br>

			<a href="<?=base_url().'autenticar_controller/index'?>">Iniciar Sesión</a>				
		</div>
		<hr>
	</form>
	<?=validation_errors();?>
	<script>
	
	function validarDatos(){
		if($('#usuario').val().trim()==''){
			alert('usuario invalido');
		}else if($('#clave').val().trim()==''){
			alert('contraseña Invalida');
		}else{
			acceder();
		}
	}

	function acceder(){
		$('#formRegistro').submit();
	}
</script>
</body>

</html>
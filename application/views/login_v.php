<?php 
	//var_dump(base_url()); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Ingreso al Sistema</title>	
	<?=cargar_headers()?>
</head>
	<body>
		<div class="container center-align">
			<form method="POST" name="formInicio" action="<?=base_url()?>autenticar_controller/autenticarUsuario/">		
				<div class="center-align">
					<h1>Iniciar Sesión</h1><br><br>

					<?php if(isset($mensaje)): ?>
					<h2><?= $mensaje ?> </h2>
					<?php endif; ?>
					
					<label>Usuario</label>
					<input type="text" name="usuario" value="<?=@set_value('usuario')?>">
					<label>Contraseña</label>
					<input type="password" name="clave" value="<?=@set_value('clave')?>">
					
					<input type="submit" name="submit" value="Ingresar"><br><br>

					<a href ="" title="Olvido su Contraseña">Olvido Su Contraseña</a>
				</div>
			</form>
		</div>
	</body>
<script>	
	function validarDatos(){
		if($('#usuario').val().trim()=='' || ('#clave').val().trim()==''){
			alert('usuario y/o clave invalido');
		}else{
			acceder();
		}
	}

	function acceder(){
		$('#formInicio').submit();
	}
</script>
</html>
<?php 
	/*
	var_dump(base_url());	
	var_dump(site_url());
	*/	
?>


<!DOCTYPE html>
<html>
<head>
	<title>Gestion de Reclamos</title>
	<?=cargar_headers()?>
	<!--<?=mostrar_nav_bar()?>-->
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


	<!--<?=mostrar_footer()?>-->
</body>
</html>
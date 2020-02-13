<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<script type="text/javascript" src="<?= base_url()?>plantilla/js/jquery.js"></script>
	<!--link rel="stylesheet" type="text/css" href="<?= base_url() ?>plantilla/css/autenticar.css"-->
	<title> Administracion</title>	
</head>
<body>
	<div align="center">
			<h1> <?=$this->session->userdata('usuario')?> </h1><br><br>			
		</div>

		<div align="center">
			<a href="<?=base_url().'administracion_controller/listarUsuarios'?>">Usuario</a>

			<a href="">Oficinas</a>
		</div>
		<hr>
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
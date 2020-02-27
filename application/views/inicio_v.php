<!DOCTYPE html>
<html>
	<head>
		<?=cargar_headers()?>
		<?=mostrar_nav_bar()?>	
		<meta charset='utf-8'>
		<style type="text/css"></style>
	</head>
<body>
	<div class="container">
		
			<div class="row center-align" >
				<h3>Bienvenido <?=$this->session->userdata('usuario')?> </h3><br><br>			
			
			
				<img src="<?= base_url().'imgs/fondo.png' ?>" width="900px" height="400px">
			</div>
	</div>
</body>
	<script>
		//$(".button-collapse").sideNav();
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
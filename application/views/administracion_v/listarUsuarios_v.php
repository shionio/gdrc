<!DOCTYPE html>
<html>
<head>
		<?=cargar_headers()?>
		<?=mostrar_nav_bar()?>	
		<meta charset='utf-8'>
		<style type="text/css">
			body{
				margin-left: 304px; 
			}
			.waves-effect{
				margin-left: 10px;
			}
		</style>
	</head>
<body>

			<h4 align="center">Listado De Usuario</h4>			

		<hr>
		<a class="waves-effect waves-green btn" href='registro/n/'><i class="material-icons left">add</i>Nuevo</a>
		<a class="waves-effect waves-light btn"><i class="material-icons left">find_in_page</i>Filtrar</a>
		<hr>

		<table border='1' class="centered striped">
			<tr>
				<td>
					Cedula
				</td>
				<td>
					Usuario
				</td>
				<td>
					Nombre
				</td>
				<td>
					Apellido
				</td>
				<td>
					Accion
				</td>
			</tr>
			<?php 
				foreach ( $usuario->result()  as $persona) { 
					echo "<tr>";
					echo "<td>".$persona->cedula."</td>";
					echo "<td>".$persona->usuario."</td>";
					echo "<td>".$persona->nombre."</td>";
					echo "<td>".$persona->apellido."</td>";
					echo "<td align='center'>
								<a href='registro/e/".$persona->cedula."'><i class='material-icons left'>mode_edit</i></a> 
								<a onclick='confirmar_eliminar(".$persona->cedula.");' href='#'><i class='material-icons left'>delete</i></a></td>";
					echo "</tr>";
				}
			?>
		</table>

	</form>
	<?=validation_errors();?>
</body>

	<script>
		$(document).ready(function(){
			$('select').material_select();
		});
	

		function confirmar_eliminar(cedula){
			swal({
				html:true,
				title: "Alerta",
				text: "<div>¿Esta seguro de eliminar este registro?<br> Cedula: "+cedula+"</div>",
				type: "warning",
				showCancelButton: true,
				closeOnConfirm: false,
				confirmButtonText: "Confirmar",
				cancelButtonText: "Cancelar",
				confirmButtonColor: "#20b1a9",
				showLoaderOnConfirm: true,
			}, function(){
			$.ajax({
				type: "get",
				dataType: "json",
				url: "<?=site_url()?>/administracion_controller/eliminarPersona/",
				data:  {
					cedula: cedula,
				},
				success: function(data){
					if (data.respuesta ==1){						
						swal({
							title: data.titulo,
							text: data.texto,
							type: data.tipo,
							timer: 2000,
							showConfirmButton: false,
							confirmButtonColor: "#20b1a9"
						},actualizar()); 
						
					}else{
						swal({
							title: data.titulo,
							text: data.texto,
							type: data.tipo,
							showConfirmButton: false,
							confirmButtonColor: "#20b1a9"
						});
					}
				},
				fail : function(data){
					swal("Error", "No se pudo conectar al servidor!", "error");
				}
				
			});
				
		});
	}
	</script>

</html>
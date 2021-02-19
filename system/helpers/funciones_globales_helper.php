	<?php 
		if ( ! function_exists('cargar_headers')){
			function cargar_headers(){
				$headers = "
					<head>
						<meta charset='utf-8'>
						<title>GDRC</title>
						<style type='text/css'></style>
						<link type='text/css' rel='stylesheet' href='css/estilos_general.css'/>

						<link type='text/css' rel='stylesheet' href='".base_url()."css/material-icons/css/materialicons.css'/>
						<link type='text/css' rel='stylesheet' href='".base_url()."libs/materialize/css/materialize.min.css'/>
						<script type='text/javascript' src='".base_url()."libs/jquery/jquery-3.2.1.min.js'></script>
					    <script type='text/javascript' src='".base_url()."libs/materialize/js/materialize.min.js'></script>
						


					    <link type='text/css' rel='stylesheet' href='".base_url()."libs/sweetalert.css'/>
						<script src='".base_url()."libs/sweetalert.min.js'</script>
					  
						<script src='".base_url()."libs/jq-datatable/js/dataTables.semanticui.min.js'></script>
						<img class='center-align' src='".base_url()."imgs/banner.png' width='100%' height='70px' >
						<script type='text/javascript'>
							$(document).ready(function(){								
								$('.dropdown-trigger').dropdown();
								$('.datepicker').datepicker();
								$('select').formSelect();
							})
						</script>
						<style>
							.nav {
								background-color: #01579b !important;
								color: black;
							}
						</style>
					</head>";
				return $headers;
			}
    	}
		if ( ! function_exists('mostrar_nav_bar')){
			function mostrar_nav_bar(){
				$html_navBar = "
					<div>
						<ul id='dropdown1' class='dropdown-content'>
							<li><a href='".base_url()."reclamos_controller/registro'>Reclamos</a></li>
							<li><a href='".base_url()."reclamos_controller/index'>Seguimiento Reclamos</a></li>
							<li class='divider'></li>
						</ul>
						<nav class='nav'>
							<div class='nav-wrapper'>								
								<ul class='left hide-on-med-and-down'>
								<li><a href='".base_url()."Inicio_controller'><i class='material-icons left'>home</i>Inicio</a></li>
									<!-- Dropdown Trigger -->
									<li><a class='dropdown-trigger' href='#!' data-target='dropdown1'><i class='material-icons left'>location_city</i>Oficina-Reclamo<i class='material-icons right'>arrow_drop_down</i></a></li>
								</ul>
							</div>
						</nav>
					</div>";
			    return $html_navBar;
			}
    	}
    	if ( ! function_exists('mostrar_footer')){
			function mostrar_footer(){
		    	$footer = "
		    		<div  style='padding-top:2.0em;'>
				    	<footer class='page-footer'>
							<div class='footer-copyright'>
								<div class='container'>
									© 2020 Copyright Information
									<a class='grey-text text-lighten-4 right' href='#!'>Links</a>
								</div>
				          	</div>         
				       	</footer>
			       	</div>
		       	";
		       	return $footer;
   			}
		}
		if( ! function_exists( 'autocodigo' ) ) {
			function autocodigo( $tabla, $id, $parametros=array() ){
			  	$prefijo_tabla="";
			  	$ceros=4;
				extract($parametros);		
				$salida = "";

				//se separa el esquema
				$parte1 = explode( '.', $tabla );
				$tabla_sola = isset( $parte1[1] )? $parte1[1] : $tabla;

				$parte2 = explode( '_', $tabla_sola );
				array_shift( $parte2 );
				if($prefijo_tabla==""){
					$prefijo_tabla = substr( $parte2[0], 0, 2);
					if ( count( $parte2 ) > 1 ){
						$prefijo_tabla  = substr( $parte2[0], 0, 1);
						$prefijo_tabla .= substr( $parte2[1], 0, 1);
					}
				}
				$autocodigo = strtoupper( $prefijo_tabla ) . sprintf("%0".$ceros."s", $id);
				$salida = $autocodigo;

				return $salida;
			}
		}

		if( ! function_exists('prp')){
			function prp($arg=array())
			{
				echo "\n<pre>\n";
				if( ! is_array($arg)) {
					if( ! is_object($arg)) {
						echo $arg;
					} else {
						print_r((array) $arg);
					}
				} else {
					print_r($arg);
				}
				echo "</pre>\n";
			}
		}
    ?>
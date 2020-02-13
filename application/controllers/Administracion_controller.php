<?php

class Administracion_controller extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->validarSesion();
		$this->load->library('session');
	}

	public function index(){
		$this->load->view('listarUsuarios_v');
	}	



	function validarSesion(){
		if(!$this->session->userdata('usuario')){
			redirect(base_url().'Autenticar_controller');
		}
	}
//*****************personas usuarios*****************************//
	public function listarUsuarios(){
		$usuarios = array(
				'usuario' => $this->Administracion_model->listarUsuarios(),
			);
		$this->load->view('administracion_v/listarUsuarios_v',$usuarios);
	}

	function validUsuario($usuario){
		$consulta = $this->Autenticar_model->validarUsuario($usuario);
		if($consulta == true){
			return false;
		}else{
			return true;
		}
	}

	public function ValidCedula($cedula){
		$consulta = $this->Autenticar_model->validarCedula($cedula);
		if($consulta == true){
			return false;
		}else{
			return true;
		}
	}
	
	
	public function registro($accion=null,$cedula=null){
		$roles 		= $this->Administracion_model->listarRoles();
		$oficinas 	= $this->Administracion_model->listarOficinas();
		$datos = array();
		switch ($accion) {
			case 'n':
				$editable = TRUE;				
				$datos = array(
					'titulo'			=> 'Nuevo Usuario',
					'oficina'			=>	$oficinas,
					'rol'				=>	$roles,
					'persona'	=> array(
									'cedula'			=>	'',
									'nombre'			=>	'',
									'apellido'			=>	'',
									'telefono'			=>	'',
									'correo'			=>	'',
									'usuario'			=>	'',
									'contrasena'		=>	'',
									'eliminado'			=>	'',
									'codigo_persona'	=>	'',
								),
				);
				//prp($datos,1);
				break;
			case 'e': //editar
				$persona 	= $this->Administracion_model->mostrarPersona($cedula);
				$datos = array(
					'titulo'	=> 'Editando Usuario',
					'persona' 	=> $persona,
					'rol'		=> $roles,
					'oficina'	=> $oficinas
				);
				//prp($datos,1);
				break;

		}
		$this->load->view('administracion_v/registrarUsuarios_v',$datos);
	}

	public function guardarUsuario(){
			$formulario = $this->input->post();
			$codigo_persona = 'CP'.rand(9,99999);
			$datos = array(
				'cedula'				=>	$formulario['cedula'],
				'nombre'				=>	strtoupper($formulario['nombre']),
				'apellido'				=>	strtoupper($formulario['apellido']),
				'correo'				=>	strtoupper($formulario['correo']),
				'telefono'				=>	$formulario['telefono'],
				'usuario'				=>	$formulario['usuario'],
				'contrasena'			=>	$formulario['contrasena'],
				'codigo_oficina'		=>	$formulario['oficina'],
				'codigo_rol'			=>	$formulario['rol'],
				'codigo_persona'		=>	$codigo_persona,
				);
			//prp($datos,1);
			if($formulario['codigoPersona'] == ""){
				
			$parametros = array(
				'tabla'	=>	't_persona',
				'datos'	=>	$datos
			);
			$this->Administracion_model->guardarUsuario($parametros);
		}else{
			$parametros = array(
				'tabla'	=>	't_persona',
				'datos'	=>	$datos,
			);
			//prp($parametros,1);
			$this->Administracion_model->actualizarPersona($parametros);
		}
		$this->listarUsuarios();
	}

	public function eliminarPersona(){
		echo ('llega');
		/*$lenguaje = 'json';
		$formulario = $this->input->post();
		$cedula = (isset($formulario['cedula'])) ? $formulario['cedula'] : "";

		$mensaje = "";

		$parametros = array(
			'tabla'		=> 't_persona',
			'condicion' => array('cedula'=>$cedula),
			'eliminado'	=> 't',
		);
		$respuesta = $this->Administracion_model->eliminarPersona($parametros);*/
	}

	//****************BIENES TECNOLOGICOS************************//

	public function listarBienesTecnologicos(){
		$bienesTecnologicos = array(
			'bienes'	=>	$this->Administracion_model->listarBienesTecnologicos()
		);

		//prp($bienesTecnologicos,1);
		$this->load->view('bienes_tecnologicos/listarBienesTecnologicos_v',$bienesTecnologicos);
	}

	public function registroBT($accion=null,$serial=null){
		switch ($accion) {
			case 'n':
				$editable = TRUE;
				$datos = array(
					'titulo' 			=> 'Nuevo Bien Tecnologico',
					'bienTecnologico'	=> array(
						'codigo_bien_tecnologico'	=>	'',
						'tipo_bien_tecnologico'		=>	'',
						'serial'					=>	'',
						'placa_de_bienes'			=>	'',
						'marca'						=>	'',
						'modelo'					=>	'',
						'cantidad'					=>	'',
						'descripcion'				=>	'',
						'disponibilidad'			=>	'',
					),
				);
				break;
			case 'e': //editar
			$bienTecnologico = $this->Administracion_model->mostrarBienT($serial);
			prp($bienTecnologico);
				$datos = array(
				'titulo'	=> 'Editando Bien Tecnologico',
				//'datos' =>  $this->Administracion_model->listarUsuarios($cedula),
			);
				break;
		}
		$this->load->view('bienes_tecnologicos/bientecnologico_v',$datos);
	}

	public function guardarBienTecnologico(){
		$formulario = $this->input->post();
		$codigoBienTecnologico = 'CBT'.rand(9,999999);
		$datos  = array(
			'serial'						=>	strtoupper($formulario['serial']),
			'descripcion_bien_tecnologico'	=>	strtoupper($formulario['descripcion']),
			'cantidad'						=>	$formulario['cantidad'],
			'codigo_disponibilidad_bt'		=>	$formulario['codigo_disponibilidad_bt'],
			'marca'							=>	strtoupper($formulario['marca']),
			'modelo'						=>	strtoupper($formulario['modelo']),
			'codigo_estatus_bt'  			=>	$formulario['codigo_estatus_bt'],
			'placa_bien_tecnologico'		=>	strtoupper($formulario['placa_bienes']),
			'codigo_bien_tecnologico'		=>	$codigoBienTecnologico,
			'codigo_tipo_bien_tecnologico'  =>	$formulario['tipo_bien_tecnologico'],
		);
		//prp($datos,1);die;
		if($formulario['codigo_bien_tecnologico'] == ""){
			$parametros = array(
				'tabla'	=>	't_bien_tecnologico',
				'datos'	=>	$datos
			);
			$this->Administracion_model->guardarBienTecnologico($parametros);
		}else{
			$parametros = array(
				'tabla'	=>	't_bien_tecnologico',
				'datos'	=>	$datos
			);
			$this->Administracion_model->modificarBienTecnologico($parametros);
		}
		$this->listarBienesTecnologicos();
	}



	//*************************CONSUMIBLES***************************//

	
	public function listarConsumibles(){

		$this->load->view('consumibles/listarConsumibles_v');
	}	

	public function registroCon($accion=null,$cedula=null){
		switch ($accion) {
			case 'n':
				$editable = TRUE;
				$datos = array(
					'titulo' => 'Nuevo Consumible',
				);
				break;
			case 'e': //editar
				$datos = array(
				'titulo'	=> 'Editando Consumible',
				//'datos' =>  $this->Administracion_model->listarUsuarios($cedula),
			);
				break;


		}
		$this->load->view('consumibles/consumible_v',$datos);
	}

//*******************reportes************************//
	public function reportes(){
		$this->load->view('reporte/reportes_v');
	}
}
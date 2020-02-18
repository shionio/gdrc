<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Reclamos_controller extends CI_Controller{

	public function __construct(){
		parent::__construct();
		//$this->validarSesion();
		$this->load->library('session');
	}

	public function index(){
		$this->load->view('listarReclamos_v');
	}

	/*public function listarReclamos(){
		$this->load->view('listarReclamos_v');
	}*/

	function registro(){
		$datos = array();
		$listarBancos = $this->Reclamos_model->listarBancos();
		

		$datos  = array(
			'listarBancos' => $listarBancos,
		);

		$this->load->view('nuevoReclamo_v',$datos);
	}

	public function buscarPersona(){
		
		//header('Content-Type: application/json');
		//include(APPPATH.'libraries/ToolkitApi/ToolkitService.php');
		//$extension ='ib,_db2';
		$lenguaje = 'json';
		$formulario = $this->input->post();

		$cedula = (isset($formulario['cedula'])) ? $formulario['cedula'] : "";

		//$ToolkitServiceObj = ToolkitService::getInstance('S65F316D','WEBPROD','WEBPROD1', $extension);

		$parametros = array(
			'tabla' => 't_persona',
			'condicion' => array('cedula' => $cedula),
		);

		$respuesta = $this->Reclamos_model->buscarPersona($parametros);
		echo json_encode($respuesta);
		
	}



	
}
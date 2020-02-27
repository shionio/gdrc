<?php

class Inicio_controller extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->validarSesion();
		$this->load->library('session');
	}

	public function index(){
		$this->load->view('inicio_v');
	}

	public function reclamos(){
		$this->load->view('listarReclamos_v');
	}	

	function validarSesion(){
		if(!$this->session->userdata('usuario')){
			redirect(base_url().'Autenticar_controller');
		}
	}

	/*public function administracion(){
		$this->load->view('administrar_v');
	}*/

	/*public function inventario(){
		$this->load->view('inventario_v');
	}

	public function asignaciones(){
		$this->load->view('asignaciones_v');
	}

	public function reportes(){
		$this->load->view('reportes_v');
	}

	public function estadisticas(){
		$this->load->view('estadistica_v');
	}*/
}
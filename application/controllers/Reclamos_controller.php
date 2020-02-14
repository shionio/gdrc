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



	
}
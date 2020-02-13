<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autenticar_controller extends CI_Controller {
	function __construct(){
      	parent::__construct();
      	$this->load->model('Autenticar_model');
      	$this->load->library('form_validation');
        
      }

	public function index()	{
		$this->load->view('login_v');		
	}

	public function registro(){
		$this->load->view('registrarUsuarios_v');
	}

	public function autenticarUsuario(){
		if($this->input->post('submit')){
			$login = $this->Autenticar_model->login();

			if($login == true){
				$datosUsuario = array(
					'usuario' 	=> $this->input->post('usuario'),
					'contrasena'=> $this->input->post('clave'),
				);

				//print_r($datosUsuario);die;

				$this->session->set_userdata($datosUsuario);
				redirect(base_url().'Inicio_controller');
			}else{
				$data = array('mensaje' => 'Usuario y/o Clave Incorrecto');
				$this->load->view('login_v', $data);
			}
		}else{
			redirect('base_url().inicio_controller');
		}
	}

}

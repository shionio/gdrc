<?php

class Administracion_controller extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->validarSesion();
		$this->load->library('session');
	}

	public function index(){
		$this->load->view('bienes_tecnologicos/listarBienesTecnologicos_v');
	}

	public function listarBienesTecnologicos(){
		/*$usuarios = array(
				'usuario' => $this->Administracion_model->listarUsuarios(),
			);*/
		$this->load->view('bienes_tecnologicos/listarBienesTecnologicos_v');
	}

	function validarSesion(){
		if(!$this->session->userdata('usuario')){
			redirect(base_url().'Autenticar_controller');
		}
	}

	public function registro($accion=null,$cedula=null){
		switch ($accion) {
			case 'n':
				$editable = TRUE;
				$datos = array(
					'titulo'		=> 'Nuevo Usuario',
					'cedula'		=> '',
					'nombre'		=> '',
					'apellidos'		=> '',
					'telefono'		=> '',
					'correo'		=> '',
					'usuario'		=> '',
					'clave'			=> '',
					'oficina'		=> '',
					'rol'			=> '',
				);
				break;
			case 'e': //editar
				$datos = array(
				'titulo'	=> 'Editando Usuario',
				'datos' =>  $this->Administracion_model->listarUsuarios($cedula),
			);
				break;
			case 'g':
				echo ('guardar');
				break;

		}
		$this->load->view('administracion_v/registrarUsuarios_v',$datos);
	}


	public function verificarRegistro(){
		
		if($this->input->post('submit_reg')){
			$this->form_validation->set_rules('cedula','Cedula','required|callback_validCedula');
			$this->form_validation->set_rules('nombre','Nombre','required');
			$this->form_validation->set_rules('apellido','Apellido','required');
			$this->form_validation->set_rules('telefono','Telefono','required');
			$this->form_validation->set_rules('correo','Correo','required|valid_email');
			$this->form_validation->set_rules('usuario','Usuario','required|trim|callback_validUsuario');
			$this->form_validation->set_rules('clave','Clave','required|trim|min_length[6]');
			$this->form_validation->set_rules('clave2','Repetir Clave','required|trim|matches[clave]');
			$this->form_validation->set_rules('oficina','Oficina','required');
			$this->form_validation->set_rules('rol','Rol','required');

			$this->form_validation->set_message('required','El Campo %s Es OBLIGATORIO...');
			$this->form_validation->set_message('validUsuario','El Usuario %s ya EXISTE...');
			$this->form_validation->set_message('validCedula','La Cedula %s Ya Fue Registrada...');
			$this->form_validation->set_message('min_length','El Campo %s debe tener al menos 6 Caracteres...');
			$this->form_validation->set_message('valid_email','Ingrese Un Correo VALIDO');
			$this->form_validation->set_message('matches','Las Claves No Coinciden'); 

			if($this->form_validation->run() != FALSE){
				$this->Autenticar_model->guardarUsuario();
				$data = array('mensaje' => 'El usuario Fue Registrado Satisfactoriamente...');
				//$this->listarUsuarios();
				}else{
					$this->load->view('administracion_v/registrarUsuarios_v', $data);
				}
			}
		}


}
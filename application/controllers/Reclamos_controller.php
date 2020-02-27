<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reclamos_controller extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->validarSesion();
		$this->load->library('session');
	}

	public function index(){
		$this->load->view('listarReclamos_v');
	}

	public function registro(){
		$datos = array();
		$listarBancos = $this->Reclamos_model->listarBancos();
		

		$datos  = array(
			'listarBancos' => $listarBancos,
		);

		$this->load->view('nuevoReclamo_v',$datos);
	}

	public function guardar() {
		
		$formulario = $this->input->post();
		$datos = array(
			'num_reclamo'		=> $formulario['num_reclamo'],
			'fecha_reclamo'		=> $formulario['fechaReclamo'],
			'nacionalidad'		=> $formulario['nacionalidad'],
			'cedula'			=> $formulario['cedula'],
			'codigoCuenta'		=> $formulario['cuentas'],
			'tarjeta'			=> $formulario['tarjeta'],
			'codBanco'			=> $formulario['banco'],
			'dispositivo'		=> $formulario['dispositivo'],
			'ubicacion'			=> $formulario['ubicacion'],
			'motivoReclamo'		=> $formulario['motivoReclamo'],
			'fechaTransaccion'	=> $formulario['fechaTrans'],
			'montoSolicitado'	=> $formulario['montoSolicitado'],
			'montoDispensado'	=> $formulario['montoDispensado'],
			'observacion'		=> $formulario['observaciones'],
		);

		prp($datos);
	}

	public function buscarPersona(){
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

	public function buscarCuentas($cedula){
		$cedula = $cedula;
		$lenguaje = "json";

		$parametros = array(
			'tabla' => 't_cuenta',
			'condicion' => array('cedula' => $cedula)
		);
		$cuentas = $this->Reclamos_model->buscarCuenta($parametros);
		
		echo json_encode($cuentas);
	}

	public function buscarTarjeta($id_cuenta){
		//prp($id_cuenta);
		$id_cuenta = $id_cuenta;
		$lenguaje = "json";

		$parametros = array(
			'tabla' => 't_tarjeta',
			'condicion' => array( 'ID_CUENTA' => $id_cuenta)
		);

		$tarjeta = $this->Reclamos_model->buscarTarjeta($parametros);

		echo json_encode($tarjeta);
	}

	function validarSesion(){
		if(!$this->session->userdata('usuario')){
			redirect(base_url().'Autenticar_controller');
		}
	}



	
}
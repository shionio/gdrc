<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reclamos_controller extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->validarSesion();
		$this->load->library('session');
	}

	public function index(){
		$listarReclamos = $this->Reclamos_model->listarReclamos();
		$parametros = array(
			'mensaje' => '',
			'listarReclamos' => $listarReclamos,
		);
		//prp($listarReclamos);die;
		$this->load->view('listarReclamos_v', $parametros);
	}

	public function registro(){
		$datos = array();
		$numReclamo = $this->Reclamos_model->contadorReclamo();
		$numReclamo = $numReclamo['num_reclamo'];
		$nuevoReclamo = $numReclamo + 1;
		
		$listarBancos = $this->Reclamos_model->listarBancos();		

		$datos  = array(
			'listarBancos' => $listarBancos,
			'numeroReclamo' => $nuevoReclamo,
		);

		$this->load->view('nuevoReclamo_v',$datos);
	}

	public function guardar() {		
		$tabla = 'datos_reclamo';
		$formulario = $this->input->post();
		$montoSol = str_replace('.', '', $formulario['montoSolicitado']);
		$montoDisp = str_replace('.', '', $formulario['montoDispensado']);
		$montoSolicitado = str_replace(',', '.', $montoSol);
		$montoDispensado = str_replace(',', '.', $montoDisp);
		$datos = array(
			'num_reclamo'		=> $formulario['num_reclamo'],
			'fecha_reclamo'		=> $formulario['fechaReclamo'],
			'nacionalidad'		=> $formulario['nacionalidad'],
			'cedula'			=> $formulario['cedula'],
			'codigo_cuenta'		=> $formulario['cuentas'],
			'tarjeta'			=> $formulario['tarjeta'],
			'codBanco'			=> $formulario['banco'],
			'dispositivo'		=> $formulario['dispositivo'],
			'ubicacion'			=> $formulario['ubicacion'],
			'motivoReclamo'		=> $formulario['motivoReclamo'],
			'fechaTransaccion'	=> $formulario['fechaTrans'],
			'montoSolicitado'	=> $montoSolicitado,
			'montoDispensado'	=> $montoDispensado,
			'observacion'		=> $formulario['observaciones'],
		);

		$parametros = array(
			'tabla' => $tabla,
			'datos' => $datos
		);

		$guardado = $this->Reclamos_model->guardarReclamo($parametros);

		if ($guardado > 0) {
			$mensaje = 'Guardado con Exito';
			//$this->registro();
			redirect(base_url().'Inicio_controller');
		}else{
			$msnsaje = 'No se a podido Guardar el Reclamo';
		}
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


	public function seguimientoReclamos() {
		$listarReclamos = $this->Reclamos_model->listarReclamos();
		$parametros = array(
			'mensaje' => '',
			'listarReclamos' => $listarReclamos,
		);
		//prp($listarReclamos);die;
		$this->load->view('listarReclamos_v', $parametros);
	}



	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reclamos_controller extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->validarSesion();
		$this->load->library('session');
		$this->load->model('Reclamos_model');
		//$this->load->database('as400',TRUE);
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

	public function registro($accion='', $codigoReclamo=""){
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
		prp($formulario['observaciones'],1);

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
			'observaciones'		=> $formulario['observaciones'],
		);
		//prp($datos,1);

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

		$respuesta = $this->Reclamos_model->buscarPersona($cedula);
		
		echo json_encode($respuesta);
	}

	public function buscarCuentas($cedula){
		$cedula = $cedula;
		$lenguaje = "json";

		$cuentas = $this->Reclamos_model->buscarCuenta($cedula);
		
		echo json_encode($cuentas);
	}

	public function buscarTarjeta($numero_cuenta){

		$numero_cuenta = $numero_cuenta;
		$lenguaje = "json";

		$tarjeta = $this->Reclamos_model->buscarTarjeta($numero_cuenta);

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
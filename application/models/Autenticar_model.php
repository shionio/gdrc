<?php 

class Autenticar_model extends CI_Model{

	function __construct(){
      parent::__construct();
      $this->load->database();
   }
   
	
	public function validarUsuario($usuario){
		$consulta = $this->db->get_where('t_persona', array('usuario'=> $usuario));
		if($consulta->num_rows() == 1){
			return true;
		}else{
			return false;
		}
	}

	public function validarCedula($cedula){
		$consulta = $this->db->get_where('t_persona', array('cedula' => $cedula));
		if($consulta->num_rows() == 1){
			return true;
		}else{
			return false;
		}
	}

	public function guardarUsuario(){
		$formulario = $this->input->post();
		$this->db->insert('t_persona', array(
							'cedula' => $formulario['cedula'],
							'nombre' => strtoupper($formulario['nombre']),
							'apellido' => strtoupper($formulario['apellido']),
							'telefono' => $formulario['telefono'],
							'correo' => strtoupper($formulario['correo']),
							'usuario' => strtoupper($formulario['usuario']),
							'contrasena' => $formulario['clave'],
							'codigo_oficina' => $formulario['oficina'],
							'codigo_rol' => $formulario['rol'])
		);
	}

	public function login(){

		$consulta = $this->db->get_where('t_persona', array(
												'usuario' => $this->input->post('usuario', TRUE),
												'contrasena' => $this->input->post('clave', TRUE)));
		//print_r($consulta);
		if($consulta->num_rows() == 1){
			return true;
		}else{
			return false;
		}
	}

	public function listarUsuarios(){
		$rs = $this->db->get('t_persona');
		if($rs->num_rows() > 0){
		return $rs;			
		}else{
			return FALSE;
		}
	}


}

?>
<?php 

class Administracion_model extends CI_Model{

	function __construct(){
      parent::__construct();
      $this->load->database();
   }
//************************  INICIO personas usuarios***********************
	public function validarCedula($cedula){
		$consulta = $this->db->get_where('t_persona', array('cedula' => $cedula));
		if($consulta->num_rows() == 1){
			return true;
		}else{
			return false;
		}
	}

	public function guardarUsuario($parametros){
		extract($parametros);
		$this->db->insert($tabla,$datos);
	}

	function actualizarPersona($parametros=array()){	
		extract($parametros);
		$this->db->where('cedula',$datos['cedula']);
		$this->db->update($tabla,$datos);
	}

	public function listarUsuarios($cedula=null){
		$rs = $this->db->get('t_persona');
		if($rs->num_rows() > 0){
		return $rs;			
		}else{
			return FALSE;
		}
	}
	public function mostrarPersona($cedula){
		$this->db->select('*');
		$this->db->from('t_persona');
		$this->db->where('cedula',$cedula);
		$this->db->join('t_rol','t_rol.codigo_rol = t_persona.codigo_rol','left');
		$this->db->join('t_oficina','t_oficina.codigo_oficina = t_persona.codigo_oficina','left');

		$resultado = $this->db->get();
		$resultado = $resultado->row_array();
//prp($resultado);
		return $resultado;
	}
	function listarRoles(){
		$this->db->select('*');
		$this->db->from('t_rol');
		$this->db->order_by('codigo_rol');

		$rs = $this->db->get();
		$resultado = $rs->result_array();
		//prp($resultado,1);

		return $resultado;
	}

	function listarOficinas(){
		$this->db->select('*');
		$this->db->from('t_oficina');
		$this->db->order_by('nombre_oficina', 'ASC');

		$rs = $this->db->get();
		$resultado = $rs->result_array();
	
		return $resultado;
	}
//*************** FIN PERSONAS*****************************//

//*****************Comienzo Bienes Tecnologicos*************//
	public function guardarBienTecnologico($parametros){
		extract($parametros);
		$this->db->insert($tabla,$datos);
	}

		public function listarBienesTecnologicos(){
		$this->db->select('*');
		$this->db->from('t_bien_tecnologico');
		$this->db->join('t_estatus_bien_tecnologico','t_estatus_bien_tecnologico.codigo_estatus_bt = t_bien_tecnologico.codigo_estatus_bt' );
		$this->db->join('t_tipo_bien_tecnologico','t_tipo_bien_tecnologico.codigo_tipo_bien_tecnologico = t_bien_tecnologico.codigo_tipo_bien_tecnologico' );

		$rs = $this->db->get();
		$resultado = $rs->result_array();

		return $resultado;
	}

	public function mostrarBienT($serial){
		$this->db->select('*');
		$this->db->from('t_bien_tecnologico');
		$this->db->where('serial', $serial);

		$rs = $this->db->get();
		$resultado = $rs->row_array();

		return $resultado; 
	}
}

?>
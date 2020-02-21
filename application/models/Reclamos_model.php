<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reclamos_model extends CI_Model{

	function __construct(){
      parent::__construct();
      $this->load->database();
   }

   public function listarBancos(){
   	$this->db->select('*');
   	$this->db->from('banco');
   	$this->db->order_by('ID_BANCO');

   	$rs = $this->db->get();
   	$resultado = $rs->result_array();

   	return $resultado;
   }

   function buscarPersona($parametros){      
      extract($parametros);

      $this->db->select('nombre, apellido');
      $this->db->from($tabla);
      $this->db->where($condicion);

      $rs = $this->db->get();

      $result = $rs->row_array();

      return $result;
   }

   function buscarCuenta($parametros){

      //prp($parametros);
      extract($parametros);
      
      $this->db->select('ID_CUENTA, numero_cuenta');
      $this->db->from($tabla);
      $this->db->where($condicion);

      $result = $this->db->get();

      $rs = $result->result_array();

      return $rs;
   }

   function buscarTarjeta($parametros){
      
      extract($parametros);
      
      $this->db->select('numero_tarjeta');
      $this->db->from($tabla);
      $this->db->where($condicion);

      $result = $this->db->get();

      $rs = $result->result_array();

      return $rs;
   }


}
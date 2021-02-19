<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reclamos_model extends CI_Model{

   private $bdpostgres, $bdas400;

	function __construct(){
      parent::__construct();
      $this->load->database();
      //$this->$bdpostgres = $this->load->databse('default', true);
      $this->bdas400 = $this->load->database('as400',true);
   }

   function buscarPersona($parametros){      
      extract($parametros);

      /*$this->bdas400->select('CUSNA1');
      $this->bdas400->from($tabla);
      $this->bdas400->where($condicion);*/

        $q = $this->bdas400->query('SELECT CUSIDN FROM bavcyfiles.CLIE fetch first 2 rows only');
      foreach ($q->result_array() as $row) {
         $cedula = trim(substr($row['CUSIDN'],1));
         $cedula = intval($cedula);
         prp($cedula,1);
      }



      //$rs = $this->bdas400->get();

      //$result = $rs->row_array();

     // return $result;
   }

   public function listarBancos(){
   	$this->db->select('*');
   	$this->db->from('banco');
   	$this->db->order_by('ID_BANCO');

   	$rs = $this->db->get();
   	$resultado = $rs->result_array();

   	return $resultado;
   }


   function buscarCuenta($parametros){
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

   function guardarReclamo($parametros) {
      extract($parametros);

      $sql = $this->db->insert($tabla,$datos);
      //prp($this->db->last_query());

      $rs = $this->db->affected_rows($sql);

      //prp($this->db->last_query());

      if ($rs > 0) {
         return true;
      }else{
         return false;
      }

   }

   function contadorReclamo() {
      $this->db->select_max('num_reclamo');
      $this->db->from('datos_reclamo');
      $this->db->limit(1);

      $id = $this->db->get();
      $id = $id->row_array();
     
      return $id;
   }

   function listarReclamos() {
      $this->db->select('num_reclamo,
                         nombre, 
                         apellido,
      ');
      $this->db->from('datos_reclamo AS r');
      $this->db->join('t_persona AS p','p.cedula = r.cedula');

      $result = $this->db->get();

      $rs = $result->result_array();

      return $rs;
   }


}
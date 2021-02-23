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

   function buscarPersona($cedula){      
      
      $persona = $this->bdas400->query("SELECT CUSIDN, CUSNA1 FROM bavcyfiles.CLIE WHERE CUSIDN LIKE '%$cedula%'");
      
      /*foreach ($persona->result_array() as $row) {
         $cedula = trim(substr($row['CUSIDN'],1));
         $cedula = intval($cedula);
      }
         $datos = array(
            'cedula'    => $cedula,
            'nombres'   => $row['CUSNA1']
         );*/

      return $persona->row_array();
   }



   function buscarCuenta($cedula){

      $cuenta = $this->bdas400->query("SELECT CCRCRA FROM bavcyfiles.CCREF WHERE CCRCID LIKE '%$cedula%'");

      return $cuenta->result_array();

      /*foreach ($cuenta->result_array() as $row) {
            $cuenta = $row['CCRCRA'];
      }

      $cuentas = array(
         'cuenta'    => $cuenta
      );*/

   }

   function buscarTarjeta($numero_cuenta){
      
      $tarjetas = $this->bdas400->query("SELECT CCRNUM FROM bavcyfiles.CCREF WHERE CCRCRA LIKE '%$numero_cuenta%'");
      
      return $tarjetas->result_array();
   }


   public function listarBancos(){
   	$this->db->select('*');
   	$this->db->from('banco');
   	$this->db->order_by('ID_BANCO');

   	$rs = $this->db->get();
   	$resultado = $rs->result_array();

   	return $resultado;
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
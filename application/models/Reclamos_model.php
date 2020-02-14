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
}
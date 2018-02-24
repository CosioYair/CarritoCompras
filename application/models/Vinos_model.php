<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vinos_model extends CI_Model  {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
		
	/*Get user by id*/
	public function getUser($id_user) {
		$query = $this->db->get_where('users_ac', array('id' => $id_user));
		$row   = $query->row(0);
		if(isset($row->id)) {
			return $row;
		} else {
			return false;
		}
	}
	
	/*Check if user exists*/
	public function isUser($email = "", $password = "") {
		$query = $this->db->get_where('users_ac', array('correo' => $email, 'password' => $password));
		$row   = $query->row(0);	
		if(isset($row)) {
			return $row;
		} else {
			return false;
		}
	}

	public function getLimite($id){
		$this->db->select('count(*) as total');
		$this->db->from('registro_ac');
		$this->db->where("dependencia",$id);
		$query = $this->db->get();
		$row = $query->row();
		return $row;
	}

	
}

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

	public function getPedidos(){
		$this->db->select('pedido2cliente.*,pedido.*,productos.nombre,productos.codigo,productos.nombre,usuarios.nombre_completo, u.nombre_completo as empleado_vendio');
		$this->db->from('pedido2cliente');
		$this->db->join('pedido', 'pedido.id_pedido = pedido2cliente.id_pedido');
		$this->db->join('productos', 'productos.id_producto = pedido2cliente.id_producto');
		$this->db->join('usuarios', 'usuarios.id_usuario = pedido.id_usuario_compra');
		$this->db->join('usuarios as u', 'u.id_usuario = pedido.id_usuario_venta');
		//$this->db->group_by("pedido2cliente.id_pedido");
		$this->db->order_by('pedido2cliente.creacion', 'ASC');
		$query = $this->db->get();
		$row = $query->result_array();

		return $row;
	}
	
}

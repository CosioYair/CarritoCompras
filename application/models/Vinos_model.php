<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vinos_model extends CI_Model  {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	/*Get user by id*/
	public function getUserById($id_user) {
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

	function getPedidos(){
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

  public function getUser($email,$pwd) {
    $query = $this->db->get_where('usuarios', array('correo' => $email,'password'=>md5($pwd)));
    $row   = $query->row();
    return $row;
  }
	function getProductos(){
			$user = $this->session->userdata('user');
		if ($user->id_nivel == 1) {
		$this->db->select('productos.*,sucursal.nombre as sucursal, categoria.nombre as categoria,productos.precio1 as precio');	
		}elseif ($user->id_nivel == 2) {
			$this->db->select('productos.*,sucursal.nombre as sucursal, categoria.nombre as categoria,productos.precio2 as precio');
		}elseif ($user->id_nivel == 3) {
			$this->db->select('productos.*,sucursal.nombre as sucursal, categoria.nombre as categoria,productos.precio3 as precio');
		}else{
			$this->db->select('productos.*,sucursal.nombre as sucursal, categoria.nombre as categoria,productos.precio1 as precio');
		}
		$this->db->from('productos');
		$this->db->join('sucursal','sucursal.id_sucursal = productos.id_sucursal');
		$this->db->join('categoria','categoria.id_categoria = productos.id_categoria');
		$this->db->join('provedores','provedores.id_provedor = productos.id_provedor');
		if ($user->empleado == 0) {
			$this->db->where('productos.id_sucursal', $user->id_sucursal);
		}
		$this->db->distinct('productos.codigo');
		$query = $this->db->get();
		return $query->result_array();
	}
	function getSucursales(){
		$this->db->select('*');	
		$this->db->from('sucursal');
		$query = $this->db->get();
		return $query->result_array();
	}

	function updateProductosSucursal($update){
		$this->db->select('*');	
		$this->db->from('productos');
		$this->db->where('nombre', $update['productos']);
		$this->db->where('id_sucursal', $update['suc_env']);
		$query2 = $this->db->get();
		$query2 = $query2->row();

		$this->db->select('cantidad,nombre');	
		$this->db->from('productos');
		$this->db->where('nombre', $update['productos']);
		$this->db->where('id_sucursal', $update['suc_rec']);
		$query3 = $this->db->get();
		$query3 = $query3->row();
		if ($query2->cantidad >= $update['cantidad']) {			
			if ($query3 != NULL) {
				$cantidad = $query2->cantidad - $update['cantidad'];	
				$cantidad2 = $query3->cantidad + $update['cantidad'];	
				$data = array(
		    	   'cantidad' => $cantidad
		    	);
				$this->db->where('nombre', $update['productos']);
				$this->db->where('id_sucursal', $update['suc_env']);
				$this->db->update('productos', $data); 
				$data2 = array(
		    	   'cantidad' => $cantidad2
		    	);
				$this->db->where('nombre', $update['productos']);
				$this->db->where('id_sucursal', $update['suc_rec']);
				$this->db->update('productos', $data2); 
				return true;
			}else{ 
				$prod = array(
   					'nombre' => $query2->nombre,
					'descripcion' => $query2->descripcion,
					'codigo' => $query2->codigo,
					'cantidad' => $update['cantidad'],
					'id_sucursal' => $update['suc_rec'],
					'id_categoria' => $query2->id_categoria,
					'precio1' => $query2->precio1,
					'precio2' => $query2->precio2,
					'precio3' => $query2->precio3,
					'precio_provedor' => $query2->precio_provedor,
					'id_provedor' => $query2->id_provedor,
					'imagen_producto' => $query2->imagen_producto
				);
				$this->db->insert('productos', $prod); 
				$cantidad = $query2->cantidad - $update['cantidad'];
				$data = array(
		    	   'cantidad' => $cantidad
		    	);
				$this->db->where('nombre', $update['productos']);
				$this->db->where('id_sucursal', $update['suc_env']);
				$this->db->update('productos', $data);
				return true;
			}
		}
		return false;
	}

	function insertPedido(){
		$usuario = $this->session->userdata('user');
		$descuento = $this->session->userdata('descuento');
		if ($usuario->empleado == 0) {
		$pedido = array(
			'id_sucursal' => 0000,
			'id_usuario_compra' => $usuario->id_usuario,
			'id_usuario_venta' => 0000,
			'descuento' => 0,
			'estatus' => "En proceso de creacion",
			'descripcion' => $descripcion,
			'fecha_entrega' =>$fecha_entrega 
		);
		}else{
		$pedido = array(
			'id_sucursal' => 0000,
			'id_usuario_compra' => 0000,
			'id_usuario_venta' => $usuario->id_usuario,
			'descuento' => $descuento,
			'estatus' => "En proceso de creacion",
			'descripcion' => $descripcion,
			'fecha_entrega' => $fecha_entrega
		);
		}
		$this->db->insert('pedido', $pedido);
		$insert_id = $this->db->insert_id();
		$this->regPedido($insert_id,$descuento); 
		return true;
	}

	function regPedido($id,$descuento){
		$productsCart = $this->session->userdata('productsCart');
		foreach ($productsCart as $key => $value) {
			$pedido = array(
				'id_pedido' => $id,
				'id_producto' => $value['id_producto'],
				'descuento' => $descuento,
				'precio_elegido_venta' => $value['cantidadPrecioCarrito'],
				'cantidad' => $value['cantidadCarrito']
			);
			$this->db->insert('pedido2cliente', $pedido);
		}
		return true;
	}
	
}

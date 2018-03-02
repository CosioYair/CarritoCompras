<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Middleware.php';

class Cart_admin extends Middleware {

	public function __construct() {
    parent::__construct();
    $this->load->model('Vinos_model');
    if(isset($_SESSION['user'])){
      if($_SESSION['user']->empleado != 2)
        redirect("/home", "refresh");
    }
  }

	public function index(){
    $this->outputDashboard('dashboard',false);
	}

	public function catCategorias(){
			//$this->isUser();
			$crud = new grocery_CRUD();
			$crud->set_theme('flexigrid');
			$crud->set_table("categoria");
			$crud->set_subject('Catalogo de categorias');
			$crud->field_type('creacion','invisible');
			$crud->set_primary_key('categoria','id_categoria');
			$crud->columns('nombre','creacion');
			$output = $crud->render();
			$output->titulo = "Home > Categorias";
			$this->outputDashboard('content',$output);
	}
	public function catNivel(){
			//$this->isUser();
			$crud = new grocery_CRUD();
			$crud->set_theme('flexigrid');
			$crud->set_table("nivel");
			$crud->set_subject('Catalogo de niveles');
			$crud->field_type('creacion','invisible');
			$crud->set_primary_key('nivel','id_nivel');
			$crud->columns('tipo','creacion');
			$output = $crud->render();
			$output->titulo = "Home > Nivel";
			$this->outputDashboard('content',$output);
	}
	public function catProductos(){
			//$this->isUser();
			$crud = new grocery_CRUD();
			$crud->set_theme('flexigrid');
			$crud->set_table("productos");
			$crud->set_subject('Catalogo de productos');
			$crud->field_type('creacion','invisible');
			$crud->set_primary_key('productos','id_producto');
			$crud->columns('nombre','descripcion','codigo','cantidad','id_sucursal','precio1','creacion');
			$crud->set_field_upload('imagen_producto','assets/uploads/files');
			$crud->set_relation('id_sucursal','sucursal','nombre');
			$crud->set_relation('id_categoria','categoria','nombre');
			$crud->set_relation('id_provedor','provedores','nombre');
			$output = $crud->render();
			$output->titulo = "Home > Nivel";
			$this->outputDashboard('content',$output);
	}
	public function catSucursal(){
			//$this->isUser();
			$crud = new grocery_CRUD();
			$crud->set_theme('flexigrid');
			$crud->set_table("sucursal");
			$crud->set_subject('Catalogo de sucursales');
			$crud->field_type('creacion','invisible');
			$crud->set_primary_key('sucursal','id_sucursal');
			$crud->columns('nombre','direccion','telefono','creacion');
			$output = $crud->render();
			$output->titulo = "Home > Sucursal";
			$this->outputDashboard('content',$output);
	}
	public function catProvedores(){
			//$this->isUser();
			$crud = new grocery_CRUD();
			$crud->set_theme('flexigrid');
			$crud->set_table("provedores");
			$crud->set_subject('Catalogo de provedores');
			$crud->field_type('creacion','invisible');
			$crud->set_primary_key('provedores','id_provedor');
			$crud->columns('nombre','direccion','correo','telefono','creacion');
			$output = $crud->render();
			$output->titulo = "Home > Provedores";
			$this->outputDashboard('content',$output);
	}
	public function catUsuarios(){
			//$this->isUser();
			$crud = new grocery_CRUD();
			$crud->set_theme('flexigrid');
			$crud->set_table("usuarios");
			$crud->set_subject('Catalogo de usuarios');
			$crud->field_type('creacion','invisible');
			$crud->set_primary_key('usuarios','id_usuario');
			$crud->set_relation('id_nivel','nivel','tipo');
			$crud->set_relation('id_sucursal','sucursal','nombre');
			$crud->columns('nombre_completo','correo','id_nivel','empleado','creacion');
			$crud->callback_before_insert(array($this,'md5_encrypt'));
			$crud->callback_before_update(array($this,'md5_encrypt'));
			$output = $crud->render();
			$output->titulo = "Home > Uusarios";
			$this->outputDashboard('content',$output);
	}
	public function md5_encrypt($post_array){
		$str = strlen($post_array['password']);
		if (empty($post_array['password']) || $str<30) {
			$post_array['password'] =  md5($post_array['password']);
		}
		return $post_array;
	}
	public function getPedido(){
		$data['pedidos'] = $this->Vinos_model->getPedidos();
		die(var_dump(json_encode($data)));
		$this->outputDashboard('pedidos',$data);
	}
	public function outputDashboard($view, $data = false) {
		//$user = $this->isUser();
		$this->load->view('admin/header');
		$this->load->view('admin/' . $view, $data);
		$this->load->view('admin/footer');
	}
	public function moverProductos(){
		$data['productos'] = $this->Vinos_model->getProductos();
		$data['sucursal'] =$this->Vinos_model->getSucursales();
		$this->outputDashboard('moverProductos',$data);
	}
	public function updateProductosDeSucursal(){
		$data =$this->Vinos_model->updateProductosSucursal($_POST);
		echo json_encode($data);
	}
	public function test(){
		$u = $this->session->userdata('user');
		die(var_dump($u));
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Middleware.php';

class Cart extends Middleware {

	public function __construct() {
    parent::__construct();
    $this->load->model('Vinos_model');
    if(isset($_SESSION['user'])){
      if($_SESSION['user']->empleado == 2)
        redirect("/dashboard", "refresh");
    }
  }

	public function index(){
    $this->load->view('home');
	}

	public function output($view,$data=""){
		$this->load->view('header');
		$this->load->view($view,$data);
		$this->load->view('footer');
	}

	public function home_view(){
    $this->output('home',false);
	}

	public function categories_view(){
		$id = $this->input->get('id');
    $this->setProdsByCategory($id);
    $this->output('categories',false);
	}

	public function cart_view(){
		if(!isset($_SESSION['productsCart']) || count($_SESSION['productsCart']) == 0)
      redirect("/", "refresh");
    $this->output('cart',false);
	}

	public function checkout_view(){
		if(!isset($_SESSION['productsCart']) || count($_SESSION['productsCart']) == 0)
      redirect("/", "refresh");
    $this->output('checkout',false);
	}

	public function getProductos(){
		$data = $this->Vinos_model->getProductos();
		if(!$data) {
			$resp =  array("code"=>404,"message"=>"No se encontraron productos","response"=>false);
		}else{
			$resp =  array("code"=>200,"message"=>"Productos encontrados con exito","response"=>$data);
		}
    header('Content-Type: application/json');
		echo json_encode($resp);
	}

	public function saveProductsSession(){
    $productsCart = $this->input->post('productsCart');
    if($productsCart != null)
      $this->session->set_userdata('productsCart', $productsCart );
    else
      $this->session->set_userdata('productsCart', array());
    echo json_encode($productsCart );
	}

	public function saveDiscount(){
    $discount = intval($this->input->post('discount'));
    $this->session->set_userdata('discount', $discount);
	}

	public function getDiscount(){
    header('Content-Type: application/json');
    if(isset($_SESSION['discount']))
      echo $_SESSION['discount'];
    else
      echo 0;
	}

	public function getProductsSession(){
    header('Content-Type: application/json');
    echo json_encode($_SESSION["productsCart"]);
	}

	public function registerOrder(){
    $data = $this->Vinos_model->insertPedido();
    if(!$data) {
      $resp =  array("code"=>404,"message"=>"Ocurrio un error durante el registro del pedido","response"=>false);
    }else{
      $resp =  array("code"=>200,"message"=>"Pedido registrado con exito","response"=>$data);
      $this->session->unset_userdata('productsCart');
      $this->session->unset_userdata('discount');
      $this->session->unset_userdata('descripcion');
      $this->session->unset_userdata('fecha_entrega');
    }
    header('Content-Type: application/json');
    echo json_encode($resp);
	}

	public function saveDetails(){
	    $description = $this->input->post('description');
	    $date = $this->input->post('date');
	    $this->session->set_userdata('descripcion', $description);
	    $this->session->set_userdata('fecha_entrega', $date);
	}

	public function getCategories(){
		$data = $this->Vinos_model->getCategorias();
		if(!$data) {
			$resp =  array("code"=>404,"message"=>"Ocurrio un error durante la busqueda de categorias","response"=>false);
		}else{
			$resp =  array("code"=>200,"message"=>"Categorias encontradas con exito","response"=>$data);
		}
    header('Content-Type: application/json');
    echo json_encode($resp);
	}

	public function setProdsByCategory($id){
		$data = $this->Vinos_model->getProductos($id);
    $this->session->set_userdata('productsCategory', $data);
	}

	public function getProductsByCategory(){
    header('Content-Type: application/json');
    if(isset($_SESSION['productsCategory']))
      echo json_encode($_SESSION["productsCategory"]);
    else
      echo array();
	}
}

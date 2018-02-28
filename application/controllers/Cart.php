<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Middleware.php';

class Cart extends Middleware {

	public function __construct() {
    parent::__construct();
    $this->load->model('Vinos_model');
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

	public function getProductos(){
		$data = $this->Vinos_model->getProductos();
		if (!$data) {

			$resp =  array("code"=>404,"message"=>"No se encontraron productos","response"=>false);	
		}else{
			$resp =  array("code"=>200,"message"=>"Productos encontrados con exito","response"=>$data);	
		}
		echo json_encode($resp);
	}
}

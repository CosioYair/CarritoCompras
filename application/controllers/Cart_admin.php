<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_admin extends CI_Controller {

	public function __construct() {
    parent::__construct();

    $this->load->database();
    $this->load->library('session');

    $this->load->helper('url');
    $this->load->library('grocery_CRUD');
    $this->load->model('Vinos_model');
    $this->load->library('session');
  }

	public function index(){	
		$this->load->view('login');
	}

	public function catCategorias(){
			//$this->isUser();
			$crud = new grocery_CRUD();
			$crud->set_theme('flexigrid');
			$crud->set_table("categoria");
			$crud->set_subject('Catalogo de categorias');
			$crud->set_primary_key('categoria','id');
			$crud->columns('nombre','creacion');
			$output = $crud->render();
			$output->titulo = "Home > Categorias";
			$this->outputDashboard('content',$output);
	}
	public function outputDashboard($view, $data = false) {
		//$user = $this->isUser();
		$this->load->view('admin/header');
		$this->load->view('admin/' . $view, $data);
		$this->load->view('admin/footer');	
	}
	/*Users metodo para verificar si es usuario*/
	private function isUser($redirect = true, $admin = false) {
		//die(var_dump($_SESSION));
		if(isset($_SESSION['id'])) {
			$id_admin = $_SESSION['id'];
			$this->load->model('Vinos_model');
			$user = $this->Vinos_model->getUser($_SESSION['id']);
			//die(var_dump($user));
			if ($user->tipo =='admin') {
				if($user) {
					return $user;
					
					if($redirect) {
						$this->outputDashboard('dashboard');
					}
					
					return $user;
				} else {
					if($redirect) {
						$this->load->view('login.php');
					}
					return false;
				}
			} elseif (isset($_SESSION['id']) || $_SESSION['tipo'] =="captu" || $_SESSION['tipo'] =="captu_servicio") {
			
			redirect('dashboard-del','refresh');
			}
		}else {
			if($redirect) {
				header('Location: ' . site_url(''));
			}
			
			return false;
		}
	}
	public function test(){
		die('sasasasas');
	}

}
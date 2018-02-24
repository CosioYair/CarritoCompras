<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

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

	/*Users metodo para verificar si es usuario*/
	private function isUser($redirect = true, $admin = false) {
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

	public function output($view,$data=""){
		$this->load->view('header');
		$this->load->view($view,$data);
		$this->load->view('footer');
	}

	public function home_view(){	
		$this->output('home',false);
	}
}
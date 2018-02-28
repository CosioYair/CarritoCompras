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
}

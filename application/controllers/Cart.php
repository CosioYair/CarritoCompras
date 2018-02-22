<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct() {
    parent::__construct();

    $this->load->database();
    $this->load->library('session');

    $this->load->helper('url');
    //$this->load->model('Dif_model');
  }

	public function index(){	
		$this->load->view('login');
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
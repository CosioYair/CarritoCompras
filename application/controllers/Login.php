<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->model('Vinos_model');
  }

	public function index(){
		$this->load->view('login');
	}

  public function loginUser(){
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $user = $this->Vinos_model->getUser($email,$password);
    echo json_encode($_POST);
  }
}

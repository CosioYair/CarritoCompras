<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->library('session');
    $this->load->model('Vinos_model');
  }

	public function index(){
		$this->load->view('login');
	}

  public function loginUser(){
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $user = $this->Vinos_model->getUser($email,$password);
    if($user != null){
      $user->password = "";
      $this->session->set_userdata('user', $user);
    }
    echo json_encode($user);
  }
}

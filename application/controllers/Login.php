<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->library('session');
    $this->load->model('Vinos_model');
  }

	public function index(){
    if(isset($_SESSION['user'])){
      if($_SESSION['user']->id_nivel == 2)
        redirect("/dashboard", "refresh");
      else
        redirect("/home", "refresh");
    }
    else
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

  public function setUserData($user){
    $newUser = array(
      "id_user" => $user->id_usuario,
      "name" => $user->nombre_completo,
      "id_level" => $user->id_nivel,
      "employee" => $user->empleado
    );
    return $newUser;
  }
}

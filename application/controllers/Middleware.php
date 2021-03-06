<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Middleware extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->helper('form');
    $this->load->library('session');
    $this->load->helper('url');
    $this->load->library('grocery_CRUD');

		if(!isset($_SESSION['user']))
      redirect("/", "refresh");

  }

  public function getAllSessionVariables(){
    echo json_encode($this->session->all_userdata());
  }

  public function deleteSessionVariables(){
    $this->session->sess_destroy();
  }
}

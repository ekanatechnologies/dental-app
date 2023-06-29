<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mrket_place extends CI_Controller {

	public function __construct(){
      parent::__construct();
      $this->load->model('Admin_model');        
      if(!is_logged_in()){
          redirect("admin/login");
      }
      if(!is_admin()){
          redirect("admin/login");
      }
      
      $this->load->view('admin/header');
    $this->load->view('front/marketplace.php');
    $this->load->view('admin/footer');
    }
}
?>
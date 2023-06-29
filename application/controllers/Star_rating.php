<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Star_rating extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  $this->load->model('star_rating_model');
 }

 function index()
 {
  $this->load->view('front/star_rating');
 }

 function fetch()
 {
  echo $this->star_rating_model->html_output();
 }

 function insert()
 {
  if($this->input->post('business_id'))
  {
   $data = array(
    'business_id'  => $this->input->post('business_id'),
    'rating'   => $this->input->post('index')
   );
   $this->star_rating_model->insert_rating($data);
  }
 }

}
?>
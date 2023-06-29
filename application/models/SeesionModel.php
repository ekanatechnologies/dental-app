<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SeesionModel extends CI_Model {

  	public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
 
	
 	public function is_logged_in()
	{  
 		if(isset($this->session->userdata['user_data']) == 'TRUE' ){
			redirect(base_url('dashboard'));
		} 
  	}
 	public function not_logged_in()
	{  
 		if($this->session->userdata['user_data'] != 'TRUE' ){
			redirect(base_url());
		} 
  	}
 	public function is_logged_Admin()
	{  
 		if($this->session->userdata['user_data']['role'] != '1' ){
			redirect('v3/dashboard');
		} 
  	}
 	public function is_logged_in_Json()
	{  
 		if($this->session->userdata['user_data'] != 'TRUE' ){
			echo json_encode([ 'status' =>0 ,'logged' => 'false', 'message' => 'Session expired ! Please Login Your Account !' ]);
			die;
		} 
  	}
 	public function is_logged_Seatseller_Json()
	{  
 		if($this->session->userdata['user_data'] != 'Seatseller' ){
			echo json_encode([ 'status' =>0 , 'message' => 'Permission Not Allowed !' ]);
			die;
		} 
  	}
	
	
	
 }
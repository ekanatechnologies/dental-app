<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
			parent::__construct();
			if(is_logged_in()){
				redirect('dashboard');
			}
	}

	public function index(){
		$input = $this->input->post();
		// print_r($input); die();
		$query = $this->db->where('email',$input['email'])->get('users');
		if($query->num_rows() > 0){
			$enpassword = md5($input['password']);
			$query      = $this->db->where('email',$input['email'])
								   ->where('password', $enpassword)
								   ->where('status', 1)
								   ->get('users');
			if($query->num_rows() > 0){
				$user = $query->row();
				$this->session->set_userdata('user_data',$user);				
				$this->session->set_flashdata('success','Logged in Successfully','Success');
				if($user->role == '1'){
					redirect('admin');
				}else{
					redirect($_SERVER['HTTP_REFERER']);
				}
			}else{
				$this->session->set_flashdata('error','Password Incorrect','Error');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			$this->session->set_flashdata('error','Email Not registered yet.');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('success','Logged Out Successfully');
		redirect('welcome');
	}
      
	
}

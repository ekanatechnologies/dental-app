<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function _construct()
	{

	}

	public function index()
	{
		$input = $this->input->post();

		$query = $this->db->where('email',$input['email'])->get('users');
		if($query->num_rows() > 0)
		{
			$enpassword = md5($input['password']);
			$query = $this->db->where('email',$input['email'])
			->where('password', $enpassword)
			->get('users');

			if($query->num_rows() > 0)
			{
				$user = $query->row();

				$this->session->set_userdata($user);

				$this->session->set_flashdata('success','Logged in Successfully');
				redirect('dashboard/index');


			}
			else
			{
				$this->session->set_flashdata('error','Password Incorrect');

				redirect('welcome');
			}
		}
		else
		{
			$this->session->set_flashdata('error','Email Not registed yet.');
			redirect('welcome');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('success','Logged Out Successfully');
		redirect('welcome');


	}
}

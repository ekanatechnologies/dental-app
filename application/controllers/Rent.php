<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rent extends CI_Controller {

	public function approverentads()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/approve-rent-ads');
		$this->load->view('admin/footer');
	}
	public function viewrentads()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/view-rent-ads');
		$this->load->view('admin/footer');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buy extends CI_Controller {

	public function approvebuyads()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/approve-buy-ads');
		$this->load->view('admin/footer');
	}
	public function viewbuyads()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/view-buy-ads');
		$this->load->view('admin/footer');
	}
}

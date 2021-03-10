<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sell extends CI_Controller {

	public function approvesellads()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/approve-sell-ads');
		$this->load->view('admin/footer');
	}
	public function viewsellads()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/view-sell-ads');
		$this->load->view('admin/footer');
	}
}

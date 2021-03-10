<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dealer extends CI_Controller {

	public function approvedealerads()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/approve-dealer-ads');
		$this->load->view('admin/footer');
	}
	public function viewdealerads()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/view-dealer-ads');
		$this->load->view('admin/footer');
	}
}

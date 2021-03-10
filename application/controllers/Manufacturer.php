<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manufacturer extends CI_Controller {

	public function approvemanufacturerads()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/approve-manufacturer-ads');
		$this->load->view('admin/footer');
	}
	public function viewmanufacturerads()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/view-manufacturer-ads');
		$this->load->view('admin/footer');
	}
}

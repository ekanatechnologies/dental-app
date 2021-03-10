<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auction extends CI_Controller {

	public function approveauctionads()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/approve-auction-ads');
		$this->load->view('admin/footer');
	}
	public function viewauctionads()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/view-auction-ads');
		$this->load->view('admin/footer');
	}
}

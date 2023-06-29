<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('Admin_model');
        if(!is_logged_in()){
            redirect("admin/login");
        }
        if(!is_admin()){
            redirect("admin/login");
        }
    }

	public function approvedCustomers(){ 
		$data['user_list']=$this->Admin_model->show_list_approved_customers();
		$this->load->view('admin/header');
		$this->load->view('admin/approved-customers',$data);
		$this->load->view('admin/footer');
	}

	public function pendingCustomers(){ 
		$data['user_list']=$this->Admin_model->show_list_pending_customers();
		$this->load->view('admin/header');
		$this->load->view('admin/pending-customers',$data);
		$this->load->view('admin/footer');
	}

	public function delete(){
	    $id = $this->uri->segment('3');
	    $this->Admin_model->delete('tbl_customer','id',$id);
	    redirect($_SERVER['HTTP_REFERER']);
	    
	}

   public function update_customer_status(){
	    if(isset($_REQUEST['svalue'])){
	        $set_status=$this->Admin_model->update_customer_status();
    	}
    	return redirect($_SERVER['HTTP_REFERER']);
	}
}
?>

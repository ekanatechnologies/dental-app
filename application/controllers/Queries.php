<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Queries extends CI_Controller {
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

	public function repliedQueries(){ 
		$data['user_list'] = $this->Admin_model->show_list_replied_queries();
		$this->load->view('admin/header');
		$this->load->view('admin/replied-queries',$data);
		$this->load->view('admin/footer');
	}

	public function pendingQueries(){ 
		$data['user_list'] = $this->Admin_model->show_list_pending_queries();
		$this->load->view('admin/header');
		$this->load->view('admin/pending-queries',$data);
		$this->load->view('admin/footer');
	}

	public function delete(){
	    $id = $this->uri->segment('3');
	    $this->Admin_model->delete('tbl_contact_us','id',$id);
	    redirect($_SERVER['HTTP_REFERER']);
	    
	}

   public function update_query_status(){
	    if(isset($_REQUEST['svalue'])){
	        $set_status = $this->Admin_model->update_query_status();
    	}
    	redirect($_SERVER['HTTP_REFERER']);
	}
	
}
?>

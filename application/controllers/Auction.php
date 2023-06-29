<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auction extends CI_Controller {
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
   

    

	public function approveauctionads(){   
	    $data['user_list'] = $this->Admin_model->show_list_approve_auction();
		$this->load->view('admin/header');
 		$this->load->view('admin/approve-auction-ads',$data);
        $this->load->view('admin/footer');
	}

	public function pendingauctionads(){
	    $data['user_list'] = $this->Admin_model->show_list_pending_auction();
		$this->load->view('admin/header');
		$this->load->view('admin/pending-auction-ads',$data);
		$this->load->view('admin/footer');
	}

	public function viewauctionads(){
	    $data['user_list'] = $this->Admin_model->show_list2();
		$this->load->view('admin/header');
		$this->load->view('admin/view-auction-ads',$data);
		$this->load->view('admin/footer');
	}

	public function update($id=''){
	    if($this->input->post()){
	        $n=$this->input->post('name');
	        $d=$this->input->post('description');
	        $p=$this->input->post('price');
	        $this->Admin_model->update_list($n,$d,$p,$id);
	        redirect($_SERVER['HTTP_REFERER']);
	    }
	     $result['data']=$this->Admin_model->displayrecordsById($id);
	     $this->load->view('admin/aucution_edit',$result);
	}

	public function delete(){
	    // $id = $this->input->get('id');
	    $id = $this->uri->segment('3');
	    $query = $this->db->query("DELETE FROM `listing` WHERE `id` = '$id'");
	    redirect($_SERVER['HTTP_REFERER']);	    
	}

	public function acution_detail(){
	    $this->load->model('Admin_model');
	    $data['user_list'] = $this->Admin_model->show_list2();
		$this->load->view('admin/header');
		$this->load->view('admin/acution_detail',$data);
		$this->load->view('admin/footer');
	}

	public function update_status(){
	    if(isset($_REQUEST['svalue'])) {
        	$this->load->model('Admin_model');    
        	$set_status=$this->Admin_model->update_status();
    	}
    	return redirect($_SERVER['HTTP_REFERER']);
	}
	
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rent extends CI_Controller {
	public function __construct(){
        parent::__construct();

        if(!is_logged_in()){
            redirect("admin/login");
        }
        if(!is_admin()){
            redirect("admin/login");
        }
    }

	public function approverentads(){ 
		$this->load->model('Admin_model');
		$data['user_list']=$this->Admin_model->show_list_approve_rent();
		$this->load->view('admin/header');
		$this->load->view('admin/approve-rent-ads',$data);
		$this->load->view('admin/footer');
	}

	public function pendingrentads(){ 
		$this->load->model('Admin_model');
		$data['user_list']=$this->Admin_model->show_list_pending_rent();
		$this->load->view('admin/header');
		$this->load->view('admin/pending-rent-ads',$data);
		$this->load->view('admin/footer');
	}

	public function viewrentads()
	{
	    $this->load->model('Admin_model');
	    $data['user_list']=$this->Admin_model->show_list3();
		$this->load->view('admin/header');
		$this->load->view('admin/view-rent-ads',$data);
		$this->load->view('admin/footer');
	}

	public function update($id=''){
	    $this->load->model('Admin_model');
	    if($this->input->post()){
	        $n=$this->input->post('name');
	        $d=$this->input->post('description');
	        $p=$this->input->post('price');
	        $this->Admin_model->update_list($n,$d,$p,$id);
	        	redirect("rent/pendingrentads");
	    }
	     $result['data']=$this->Admin_model->displayrecordsById($id);
	     $this->load->view('admin/rent_edit',$result);
	}

	public function delete(){
	    $id=$this->input->get('id');
	    $this->load->model('Admin_model');
	    $this->Admin_model->delete_list($id);
	    redirect("rent/pendingrentads");
	    
	}

	public function rent_detail(){
	    $this->load->model('Admin_model');
	    $data['user_list'] = $this->Admin_model->show_list3();
		$this->load->view('admin/header');
		$this->load->view('admin/rent_detail',$data);
		$this->load->view('admin/footer');
	}

   public function update_status(){
	    if(isset($_REQUEST['svalue'])){
	        $this->load->model('Admin_model');    
	        $set_status=$this->Admin_model->update_status();
    	}
    	return redirect("Rent/pendingrentads");
	}
}
?>

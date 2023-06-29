<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dealer extends CI_Controller {
	public function __construct(){
        parent::__construct();
        if(!is_logged_in())  
        {
            redirect("admin/login");
        }
        if(!is_admin())  
        {
            redirect("admin/login");
        }
    }

	public function approvedealerads()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/approve-dealer-ads');
		$this->load->view('admin/footer');
	}
	public function viewdealerads()
	{
	    $this->load->model('Admin_model');
	   $data['user_list'] = $this->Admin_model->show_list5(); 
		$this->load->view('admin/header');
		$this->load->view('admin/view-dealer-ads',$data);
		$this->load->view('admin/footer');
	}
	public function update($id=''){
	    $this->load->model('Admin_model');
	    if($this->input->post()){
	        $n=$this->input->post('name');
	        $d=$this->input->post('description');
	        $p=$this->input->post('price');
	        $this->Admin_model->update_list($n,$d,$p,$id);
	        	redirect("dealer/viewdealerads");
	    }
	     $result['data']=$this->Admin_model->displayrecordsById($id);
	     $this->load->view('admin/dealer_edit',$result);
	}
	public function delete(){
	    $id=$this->input->get('id');
	    $this->load->model('Admin_model');
	    $this->Admin_model->delete_list($id);
      redirect("dealer/viewdealerads");	    
	}
}
?>
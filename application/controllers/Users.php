<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
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

	public function approvedUsers(){ 
		$data['user_list']=$this->Admin_model->show_list_approved_users();
		$this->load->view('admin/header');
		$this->load->view('admin/approved-users',$data);
		$this->load->view('admin/footer');
	}

	public function pendingUsers(){ 
		$data['user_list']=$this->Admin_model->show_list_pending_users();
		$this->load->view('admin/header');
		$this->load->view('admin/pending-users',$data);
		$this->load->view('admin/footer');
	}

	public function delete(){
	    $id = $this->uri->segment('3');
	    $this->Admin_model->delete('users','id',$id);
        redirect($_SERVER['HTTP_REFERER']);	    
	}

   public function update_user_status(){
	    if(isset($_REQUEST['svalue'])){
	        $set_status=$this->Admin_model->update_user_status();
    	}
    	return redirect($_SERVER['HTTP_REFERER']);
	}

	public function getUserActivity(){
		$id = $this->uri->segment(3);
		$data['user_list']=$this->Admin_model->getUserActivity($id);
		// print_r($data['user_list']); die();
		$this->load->view('admin/header');
		$this->load->view('admin/getUserActivity',$data);
		$this->load->view('admin/footer');
	}

	public function ads_delete($id){
		$id = $this->uri->segment('3');
	    $image_path 	   = 'assets/images/ads/'; 
	    $query_get_image   = $this->db->get_where('ad_images', array('ad_list_id' => $id));
	    // print_r($query_get_image); die();
	    foreach ($query_get_image->result() as $record){
		          $filename = $image_path . $record->image;
	        if (file_exists($filename)){
	            unlink($filename);
	            $this->db->delete("ad_images", "id = ".$record->id);
	        }
	        $this->Admin_model->delete_product($id);
	        $query 			 = $this->db->get("listing");
	        $data['records'] = $query->result();
            redirect($_SERVER['HTTP_REFERER']);	       	
	    }
	}

}
?>

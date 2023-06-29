<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buy extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        if(!is_logged_in()){
            redirect("admin/login");
        }
        if(!is_admin()){
            redirect("admin/login");
        }
	    $this->load->model('Admin_model');
    }

	public function approvebuyads(){
	    $data['user_list'] = $this->Admin_model->show_list_approve_buy();
		$this->load->view('admin/header');
		$this->load->view('admin/approve-buy-ads',$data);
		$this->load->view('admin/footer');
	}

	public function pendingbuyads(){
	    $data['user_list'] = $this->Admin_model->show_list_pending_buy();
		$this->load->view('admin/header');
		$this->load->view('admin/pending-buy-ads',$data);
		$this->load->view('admin/footer');
	}

	public function viewbuyads(){
	    $data['user_list'] = $this->Admin_model->show_list1();
		$this->load->view('admin/header');
		$this->load->view('admin/view-buy-ads',$data);
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
	     $this->load->view('admin/buy_edit',$result);
	}

	public function delete1($id = null){
	    $id = $this->uri->segment('3');
	    $this->Admin_model->ads_delete_list_test($id);
	    redirect($_SERVER['HTTP_REFERER']);	    
	}

	public function delete($id){
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

	public function buy_detail(){
	    $data['user_list'] = $this->Admin_model->show_list1();
		$this->load->view('admin/header');
		$this->load->view('admin/buy_detail',$data);
		$this->load->view('admin/footer');	    
	}

	public function update_status(){
	    if(isset($_REQUEST['svalue'])){
        $set_status=$this->Admin_model->update_status(); 
        }
    	return redirect($_SERVER['HTTP_REFERER']);
	}
	
}
?>
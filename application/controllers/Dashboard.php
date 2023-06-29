<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
        parent::__construct();
        if(!is_logged_in()){
            redirect("admin/login");
        }
        if(!is_admin()){
            redirect("admin/login");
        }
        $this->load->model('Admin_model');
		$this->load->model('MFlipbooks');        
    }	

	public function index(){	
		$data['recentads']= $this->Admin_model->getRecentAds();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/dashboard');
		$this->load->view('admin/footer');
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('success','Logged Out Successfully');
		redirect('welcome');
	}

	//Subscription Section Start

	public function subscriptions(){
		$data['subscriptions']=$this->db->get('tbl_subscriptions')->result();
		$this->load->view('admin/subscriptions',$data);
	}

	public function add_subscription(){	
		$data['subscription'] = $this->db->get_where('tbl_subscriptions',array('id'=> $this->uri->segment('3')))->row_array();
		$this->load->view('admin/add_subscription',$data);
	}

	public function addSubscription(){
		$edit_id = $this->input->post('edit_id');
		$data = array(
			'name' 		 => $this->input->post('name'),			 
			'amount' 	 => $this->input->post('amount'),			 
			'post' 		 => $this->input->post('post'),			 
			'description'=> $this->input->post('description'),			 
		);
		if(!empty($edit_id)){
			$data = $this->Admin_model->update('tbl_subscriptions', $data, 'id', $edit_id);
			if($data>0){
				$this->session->set_flashdata('success-message','Subscriptions updated. !!');	 
				redirect("admin/subscriptions");				
			}else{
				$this->session->set_flashdata('error-message','Something went wrong. !!');		
				redirect("admin/subscriptions");				 
			}
		}else{
			$data = $this->Admin_model->insert('tbl_subscriptions', $data);
			if($data>0){
				$this->session->set_flashdata('success-message','Product inserted. !!'); 
				redirect("admin/subscriptions");				
			}else{
				$this->session->set_flashdata('error-message','Something went wrong. !!');
				redirect("admin/subscriptions");
			}
		}
	}

	public function update_subscription_status(){
	    if(isset($_REQUEST['svalue'])){
	        $set_status=$this->Admin_model->update_subscription_status();
    	}
    	return redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_subscription($id){
		$res = $this->db->where('id',$id)->delete('tbl_subscriptions');
		if($res){
			$this->session->set_flashdata('success','Subscriptions Plan Deleted Successfully');
		}else{
			$this->session->set_flashdata('error','Subscription Linked in ads Cannot delete!');
		}		
		redirect($_SERVER['HTTP_REFERER']);
	}	

	//Subscription Section End

	//Categories Section Start
	public function add_category(){	
		$data['category'] = $this->db->get_where('services',array('id'=> $this->uri->segment('3')))->row_array();
		$this->load->view('admin/add_category',$data);
	}

	public function addCategory(){
		$edit_id = $this->input->post('edit_id');
		if(!empty($_FILES['userfile']['name'])) {
			$fileName  = $_FILES['userfile']['name'];
			$tempFile  = $_FILES['userfile']['tmp_name'];			 
			$targetPath= 'assets/images/ads/';			
			$uloadsdata= $this->Admin_model->image_uploads($tempFile, $fileName, $targetPath);	
		}else{
			$fileName = $this->input->post('old_img');			 
		}
		$data = array(
			'name' 		=> $this->input->post('name'),			 
			'image' 	=> $fileName	
		);
		if(!empty($edit_id)){
			$data = $this->Admin_model->update('services', $data, 'id', $edit_id);
			if($data>0){
				$this->session->set_flashdata('success-message','Category updated. !!');	 
				redirect("admin/categories");				
			}else{
				$this->session->set_flashdata('error-message','Something went wrong. !!');		
				redirect("admin/categories");				 
			}
		}else{
			$data = $this->Admin_model->insert('services', $data);
			if($data>0){
				$this->session->set_flashdata('success-message','Product inserted. !!'); 
				redirect("admin/categories");				
			}else{
				$this->session->set_flashdata('error-message','Something went wrong. !!');
				redirect("admin/categories");
			}
		}
	}

	public function categories(){
		$data['services'] = $this->db->get('services')->result();
		$this->load->view('admin/categories',$data);
	}

	public function update_category_status(){
	    if(isset($_REQUEST['svalue'])){
	        $set_status=$this->Admin_model->update_category_status();
    	}
    	return redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_category($id){
		$res = $this->db->where('id',$id)->delete('services');
		if($res){
			$this->session->set_flashdata('success','Category Deleted Successfully');
		}else{
			$this->session->set_flashdata('error','Category Linked in ads Cannot delete!');
		}		
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function add_sub_category(){	
		$data['sub_category'] = $this->db->get_where('sub_services',array('id'=> $this->uri->segment('3')))->row_array();
		$data['category']     = $this->db->get_where('services',array('status' =>1))->result();
		$this->load->view('admin/add_sub_category',$data);
	}

	function addSubcategory(){
		$edit_id = $this->input->post('edit_id');		 
		$data = array(
			'service_id' 		=> $this->input->post('service_id'),			 
			'name' 		        => $this->input->post('name')			 
		);
		if(!empty($edit_id)){
			$data = $this->Admin_model->update('sub_services', $data, 'id', $edit_id);
			if($data>0){
				$this->session->set_flashdata('success-message','Sub-Category updated. !!');	 
				redirect('admin/sub-categories');
			}else{
				$this->session->set_flashdata('error-message','Something went wrong. !!');		
				redirect('admin/sub-categories');
			}
		}else{
			$data = $this->Admin_model->insert('sub_services', $data);
			if($data>0){
				$this->session->set_flashdata('success-message','Sub-Categories inserted. !!'); 
				redirect('admin/sub-categories');
			}else{
				$this->session->set_flashdata('error-message','Something went wrong. !!');
				redirect("admin/sub-categories");
			}
		}
	}

	public function sub_categories(){
		$this->db->select('services.name as cat_name, services.image as image, sub_services.*');
		$this->db->join('services','services.id=sub_services.service_id');
		$data['services'] = $this->db->get('sub_services')->result();
		$this->load->view('admin/sub_categories',$data);
	}	 

	public function update_sub_category_status(){
	    if(isset($_REQUEST['svalue'])){
	        $set_status=$this->Admin_model->update_sub_category_status();
    	}
    	return redirect($_SERVER['HTTP_REFERER']);
	}				

	public function delete_sub_category($id){
		$res = $this->db->where('id',$id)->delete('sub_services');
		if($res){
			$this->session->set_flashdata('success','Sub Category Deleted Successfully');
		}else{
			$this->session->set_flashdata('error','Category Linked in ads Cannot delete!');
		}		
		redirect($_SERVER['HTTP_REFERER']);
	}

	private function set_upload_options(){   
	    //upload an image options
	    $config = array();
	    $config['upload_path']   = 'assets/images/ads/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['max_size']      = '0';
	    $config['overwrite']     = FALSE;
	    return $config;
	}		

	//Categories Section End

	public function sms_templates(){
		$data['sms_templates'] = $this->db->get('sms_templates')->result();
		$this->load->view('admin/sms_templates',$data);
	}

	public function add_sms_templates(){
		if($this->input->post()){
			$data = $this->input->post();
			$this->db->insert('sms_templates',$data);
			$this->session->set_flashdata('success','Template Added Successfully');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$this->load->view('admin/add_sms_templates');
	}

	public function send_sms(){
		$sms    = $this->db->where('type','activation')->get('sms_templates')->row();
		$tempData['content'] = $sms->content;
		//replace template var with value
		$userName  = 'Ekana';
		$userEmail = 'info@ekana.com';
		$otp       = rand('000000','999999');
		$token     = array(
		    'SITE_URL'   => 'http://www.codexworld.com',
		    'SITE_NAME'  => 'CodexWorld',
		    'USER_NAME'  => $userName,
		    'USER_EMAIL' => $userEmail,
		    'OTP'        => $otp
		);
		$pattern  = '[%s]';
		foreach($token as $key=>$val){
		    $varMap[sprintf($pattern,$key)] = $val;
		}
		echo $emailContent = strtr($tempData['content'],$varMap);
	}
	
	//Purchase History Section Start

	public function today_purchase_list(){
		$data['datas'] = $this->Admin_model->getTodayOrders();
		$this->load->view('admin/today-purchase-list',$data);
	}

	public function view_today_purchase_list(){
		$id = $this->uri->segment('3');
		$data['datas'] = $this->Admin_model->getTodayOrderByUser($id);
		$this->load->view('admin/view-today-purchase-list',$data);
	}

	public function purchase_list(){
		$data['datas'] = $this->Admin_model->getOrders();
		$this->load->view('admin/purchase-list',$data);
	}

	public function view_purchase_list(){
		$id = $this->uri->segment('3');
		$data['datas'] = $this->Admin_model->getOrderByUser($id);
		$this->load->view('admin/view-purchase-list',$data);
	}

	//Purchase History Section End

	//Bids Section Start
	public function bids(){
		$data['datas'] = $this->Admin_model->getBids();
		$this->load->view('admin/bids',$data);
	}

	public function view_bid_list(){
		$id = $this->uri->segment('3');
		$data['datas'] = $this->Admin_model->getBidByUser($id);
		$this->load->view('admin/view-bid-list',$data);
	}

	//Bids Section End	

	public function update_order_status(){
	    if(isset($_REQUEST['svalue'])){
	        $set_status = $this->Admin_model->update_order_status();
    	}
    	return redirect($_SERVER['HTTP_REFERER']);
	}

	//Reviews Section Start	

	public function reviews(){
		$data['reviews'] = $this->Admin_model->getReviews();
		$this->load->view('admin/reviews',$data);
	}

	public function update_review_status(){
	    if(isset($_REQUEST['svalue'])){
	        $set_status = $this->Admin_model->update_review_status();
    	}
    	return redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_review($id){
		$res = $this->db->where('id',$id)->delete('reviews');
		if($res){
			$this->session->set_flashdata('success','Review Deleted Successfully');
		}else{
			$this->session->set_flashdata('error','Cannot delete!');
		}		
		redirect($_SERVER['HTTP_REFERER']);
	}

	//Reviews Section End	

	//Flipbooks Section Start

	public function flipbooks()
	{
		$data['flipbooks'] = $this->MFlipbooks->get_all_pdf();
		$this->load->view('admin/flipbooks',$data);
	}

	//Flipbooks Section End

	//Ads type Section Start

	public function ads_type(){
		$data['ads_types'] = $this->db->get_where('ad_type')->result();
		$this->load->view('admin/ads_type',$data);
	}

	public function add_ads_type(){	
		$data['ads_type'] = $this->db->get_where('ad_type',array('id'=> $this->uri->segment('3')))->row_array();
		$this->load->view('admin/add_ads_type',$data);
	}

	public function addAdsType(){
		$edit_id = $this->input->post('edit_id');		
		$data = array(
			'name' 		 => $this->input->post('name'),			 
			'commission' => $this->input->post('commission')	
		);
		if(!empty($edit_id)){
			$data = $this->Admin_model->update('ad_type', $data, 'id', $edit_id);
			if($data>0){
				$this->session->set_flashdata('success-message','Ads Type & Commission updated. !!');	 
				redirect("admin/ads-type");				
			}else{
				$this->session->set_flashdata('error-message','Something went wrong. !!');		
				redirect("admin/ads-type");				 
			}
		}else{
			$data = $this->Admin_model->insert('ad_type', $data);
			if($data>0){
				$this->session->set_flashdata('success-message','Ads Type & Commission inserted. !!'); 
				redirect("admin/ads-type");				
			}else{
				$this->session->set_flashdata('error-message','Something went wrong. !!');
				redirect("admin/adads-types_type");
			}
		}
	}

	public function update_ads_type_status(){
	    if(isset($_REQUEST['svalue'])){
	        $set_status=$this->Admin_model->update_ads_type_status();
    	}
    	return redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_ads_type($id){
		$res = $this->db->where('id',$id)->delete('ad_type');
		if($res){
			$this->session->set_flashdata('success','Ads Type & Commission Deleted Successfully');
		}else{
			$this->session->set_flashdata('error','Ads Type & Commission Linked in ads Cannot delete!');
		}		
		redirect($_SERVER['HTTP_REFERER']);
	}

	//Flipbooks Section End	

	//Front ads Section start	

	 public function add_front_ads(){	
		$data['category'] = $this->db->get_where('tbl_front_ads',array('id'=> $this->uri->segment('3')))->row_array();
		$this->load->view('admin/add-front-ads',$data);
	}

	public function addFrontAds(){
		$edit_id = $this->input->post('edit_id');
		if(!empty($_FILES['userfile']['name'])) {
			$fileName  = $_FILES['userfile']['name'];
			$tempFile  = $_FILES['userfile']['tmp_name'];			 
			$targetPath= 'assets/images/front-ads/';			
			$uloadsdata= $this->Admin_model->image_uploads($tempFile, $fileName, $targetPath);	
		}else{
			$fileName = $this->input->post('old_img');			 
		}
		$data = array(
			'name' 		=> $this->input->post('name'),			 
			'position' 	=> $this->input->post('position'),			 
			'image' 	=> $fileName	
		);
		if(!empty($edit_id)){
			$data = $this->Admin_model->update('tbl_front_ads', $data, 'id', $edit_id);
			if($data>0){
				$this->session->set_flashdata('success-message','Front ads updated. !!');	 
				redirect("admin/front-ads");				
			}else{
				$this->session->set_flashdata('error-message','Something went wrong. !!');		
				redirect("admin/front-ads");				 
			}
		}else{
			$data = $this->Admin_model->insert('tbl_front_ads', $data);
			if($data > 0){
				$this->session->set_flashdata('success-message','Front ads inserted. !!'); 
				redirect("admin/front-ads");				
			}else{
				$this->session->set_flashdata('error-message','Something went wrong. !!');
				redirect("admin/front-ads");
			}
		}
	}

	public function front_ads(){
		// $data['services'] = $this->db->get('tbl_front_ads')->result();
		$data['services'] = $this->db->order_by('position','Asc')->get_where('tbl_front_ads')->result();

		$this->load->view('admin/front-ads',$data);
	}

	public function update_front_ads_status(){
	    if(isset($_REQUEST['svalue'])){
	        $set_status = $this->Admin_model->update_front_ads_status();
    	}
    	return redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_front_ads($id){
		$res = $this->db->where('id',$id)->delete('tbl_front_ads');
		if($res){
			$this->session->set_flashdata('success','Front ad Deleted Successfully');
		}else{
			$this->session->set_flashdata('error','Front ad Linked in ads Cannot delete!');
		}		
		redirect($_SERVER['HTTP_REFERER']);
	}

	//Front ads Section End	


	
	
}

<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require APPPATH . '/third_party/hybridauth/autoload.php';
	// require APPPATH . 'third_party/PHPMailer/src/PHPMailer.php';
	//Import Hybridauth's namespace
	use Hybridauth\Hybridauth;

	class Welcome extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('Front_model','front_model');
			$this->load->model('Admin_model','admin_model'); 
			$this->load->model('Home_model','home_model');
	        $this->load->model('product');	
        	// $this->load->library('PHPMailer_Lib');
        	// $this->load->library('braintree_lib');
		}		

		public function index($param ='', $param1 =''){
			$data['buy_ads']	    = $this->db->where('ad_type_id','1')->limit('8')->get('listing')->result();
			$data['sell_ads']	    = $this->db->where('ad_type_id','2')->limit('8')->get('listing')->result();
			$data['auction_ads']    = $this->db->where('ad_type_id','3')->limit('8')->get('listing')->result();
			$data['latest_ads']     = $this->db->order_by('created_on','desc')->limit('3')->get('listing')->result();
			
			$data['featured_ads']   = $this->front_model->featured_ads();
			$data['listing_one']    = $this->front_model->featured_ads1();
			$data['listing_two']    = $this->front_model->featured_ads2();
			$data['listing_third']  = $this->front_model->featured_ads3();
			
			$data['services']       = $this->db->get_where('services',array('status'=>1))->result();
			
			$data['act_buy_ads']    = $this->front_model->act_buy_ads();
			$data['act_sell_ads']   = $this->front_model->act_sell_ads();
			$data['act_auction_ads']= $this->front_model->act_auction_ads();
			$data['act_marketplace_ads']= $this->front_model->act_marketplace_ads();
			
			$data['qualities']      = $this->home_model->getQualities();
			$data['cities']   		= $this->home_model->getCities();
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
			// die();
			/*
			$data['cats']     		= $this->home_model->getCats();
			
			$data['subcats']  		= $this->home_model->getSubcats();
			
			$data['ads']      		= $this->home_model->getAds();
			
			if($param1 == 'subcat'){
				$data['products'] = $this->db->order_by('sub_service_id','Asc')->get_where('listing', array('sub_service_id' =>$param))->result_array();
			}elseif ($param1 == 'cat') {
				$data['products'] = $this->db->order_by('service_id','Asc')->get_where('listing', array('service_id' =>$param))->result_array();
			} 
			
			$data['front_ads1'] = $this->db->get_where('tbl_front_ads', array('position' => 1 ,'status' => 1))->result_array();
			
			$data['front_ads2'] = $this->db->get_where('tbl_front_ads', array('position' => 2 ,'status' => 1))->result_array();
			$data['front_ads3'] = $this->db->get_where('tbl_front_ads', array('position' => 3 ,'status' => 1))->result_array();
			$data['front_ads4'] = $this->db->get_where('tbl_front_ads', array('position' => 4 ,'status' => 1))->result_array();
		*/
			$this->load->view('front/index',$data);
		}

		public function searchlocation() {
			$query = $this->input->get('query');
			$this->db->select('city');
			$this->db->like("city", $query);
			$data  = $this->db->get("cities")->result();        
			echo json_encode($data);
		}

		public function register(){
			if($this->input->post()){
				$data = $this->input->post();
				unset($data['confirm_password']);
				$usercheck = $this->db->where('email',$data['email'])
									  ->get('users')->num_rows();
				if($usercheck > 0){
					$this->session->set_flashdata('error','User Already Registered!');
					redirect($_SERVER['HTTP_REFERER']);
				}else{
					$data['role']     = '3';
					$data['status']   = '0';
					$data['image']    = 'user.png';
					$data['password'] = md5($data['password']);
					$this->db->insert('users',$data);
					$enpassword       = $data['password'];
					$query = $this->db->where('email',$data['email'])
									  ->where('password', $enpassword)
									  ->get('users');
					$user  = $query->row();
					$this->session->set_userdata('user_data',$user);
					$this->session->set_flashdata('success','User Registred Successfully');
					redirect($_SERVER['HTTP_REFERER']);
				}			
			}
		}

		public function get_city(){
			$state = $this->input->post('state_id');
			$city  = $this->db->where('state',$state)->get('cities')->result();
			foreach ($city as $ct) {
				echo "<option value='$ct->id'>".$ct->city."</option>";
			}
		}

		public function get_sub_cat(){
			$service_id = $this->input->post('service_id');
			$city = $this->db->where('service_id ',$service_id )->get('sub_services')->result();
			foreach ($city as $ct) {
				echo "<option value='$ct->id'>".$ct->name."</option>";
			}
		}

		public function get_subs(){
			$service_id = $this->input->post('service_id');
			$city = $this->db->where('id ',$service_id )->get('tbl_subscriptions')->result();
			foreach ($city as $ct) {
				echo "<option value='$ct->id'>".$ct->post."</option>";
			}
		}

		public function postads(){
			if(!is_logged_in()){
				return redirect("userlogin");
			}
			$ads = $this->home_model->getUserPost(user_details()->id);
			if (user_details()->subscription_id == 0) {
				if ($ads['count'] > 5) {
					$this->session->set_flashdata('error','Already Posted Your free Ads, Please Buy Our Subscription Plan.');			
					redirect("package");
				}
			}else{
				$subs_id = user_details()->subscription_id;
				$post = $this->db->get_where('tbl_subscriptions',array('id'=>$subs_id))->row_array();
				// echo $post['post'];
				if ($ads['count'] > $post['post']) {
					$this->session->set_flashdata('error','Your subscription plan has been expired.');			
					redirect("package");
				}
			}
			$data['services']=$this->db->get_where('services',array('status'=>1))->result();
			$data['sub_services']=$this->db->get_where('sub_services',array('status'=>1))->result();
			$data['ad_type']=$this->db->get_where('ad_type',array('status'=>1))->result();
			$data['offer_type']=$this->db->get_where('offer_type',array('status'=>1))->result();
			$data['states']=$this->db->group_by('state')->get('cities')->result();
			$this->load->view('front/post-ads',$data);
		}

		public function submit_ad(){
			if(!is_logged_in()){
				redirect("userlogin");
			}
			$list            = $this->input->post();
			// unset($list['userfile']['name']);
			if(!empty($_FILES['userfile']['name'])) {
				$fileName   = $_FILES['userfile']['name'];
				$tempFile   = $_FILES['userfile']['tmp_name'];			 
				$targetPath = 'assets/images/ads/';			
				$uloadsdata = $this->front_model->image_uploads($tempFile, $fileName, $targetPath);
				$list['image']   = $fileName;
				$list['user_id'] = $this->session->userdata('user_data')->id;
				$list['email']   = $this->session->userdata('user_data')->email;
				$list['phone']   = $this->session->userdata('user_data')->phone;
				$this->db->insert('listing',$list);
				$listid   = $this->db->insert_id();
			}

			$this->load->library('upload');
			$dataInfo = array();
			$files    = $_FILES;
			$cpt      = count($_FILES['images']['name']);
			for( $i = 0; $i<$cpt; $i++){           
				$_FILES['userfile']['name'] = $files['images']['name'][$i];
				$_FILES['userfile']['type'] = $files['images']['type'][$i];
			$_FILES['userfile']['tmp_name']=$files['images']['tmp_name'][$i];
				$_FILES['userfile']['error']= $files['images']['error'][$i];
				$_FILES['userfile']['size'] = $files['images']['size'][$i];
				$this->upload->initialize($this->set_upload_options());
				$this->upload->do_upload('userfile');
				$dataInfo[] = $this->upload->data();
			}
			foreach ($dataInfo as $value){
				$img_arr = array('ad_list_id'=>$listid,'image' => $value['file_name']);
				$this->db->insert('ad_images',$img_arr);
			}
			$this->session->set_flashdata('success','Ad listed Successfully');
			redirect($_SERVER['HTTP_REFERER']);   
			exit;    
		}

		private function set_upload_options(){   
		    //upload an image options
			$config 				 = array();
			$config['upload_path'] 	 = 'assets/images/ads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']      = '0';
			$config['overwrite']     = FALSE;
			return $config;
		}

		public function singlepost($cat,$name,$id){
			$recentlyViewed = $this->session->userdata('recentlyViewed');
		    if(!is_array($recentlyViewed)){
		        $recentlyViewed = array();  
		    }
		    //change this to 10
		    if(sizeof($recentlyViewed)>10){
		        array_shift($recentlyViewed);
		    }
		    //here set your id or page or whatever
		    if(!in_array($id,$recentlyViewed)){
		        array_push($recentlyViewed,$id);
		    }
		    $this->session->set_userdata('recentlyViewed', $recentlyViewed);    
		    // $recentlyViewed = array_reverse($recentlyViewed);
		    //var_dump($recentlyViewed);
			$data['list'] = $this->db
			->select('services.name as service_name,sub_services.name as sub_service_name, listing.*')
			->join('services','services.id=listing.service_id')
			->join('sub_services','sub_services.id=listing.sub_service_id')
			->where('listing.id',$id)
			->get('listing')->row();	    
			$this->load->view('front/single-post',$data);
		}

		public function single_product(){	 
			$data['title'] = 'Single Product Page';    	    
			$this->load->view('front/single-product',$data);
		}

		public function viewall_buy_sell(){	    
			$this->load->model('Front_model');
			$this->load->library("pagination");
			$config 			= array();
			$config["base_url"] = base_url() . "Welcome/viewall_buy_sell";
			if($this->input->post()){	        
				$ad_type 		= $this->input->post('ad_type');
				if($ad_type != '0'){
					$this->db->where('listing.ad_type_id',$ad_type);
				}
				if($this->input->post('search') !=''){
					$search  = $this->input->post('search');
					$this->db->where("listing.name LIKE '%$search%'");
				}
				if($this->input->post('city') !=''){
					$city    = $this->input->post('city');
					$this->db->where('listing.city',$city);
				}	        
			}
			$config["total_rows"]  	  = $this->db->get('listing')->num_rows();
			$config["per_page"]    	  = 6;
			$config["uri_segment"] 	  = 3;
			$config['data_page_attr'] = 'class="page-link"';       
			$config['cur_tag_open']   = ' <li class="page-item active"><a class="page-link" href="#">';
			$config['cur_tag_close']  = '</a></li>';
			$this->pagination->initialize($config);
			$page  = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["links"] = $this->pagination->create_links();        
			if($this->input->post()){	        
				$ad_type   = $this->input->post('ad_type');
				if($ad_type!= '0'){
					$this->db->where('listing.ad_type_id',$ad_type);
				}
				if($this->input->post('search') !=''){
					$search = $this->input->post('search');
					$this->db->where("listing.name LIKE '%$search%'");
				}
				if($this->input->post('city') !=''){
					$city = $this->input->post('city');
					$this->db->where('listing.city',$city);
				}
				$data['title']      = "Search Result";
				$data['total']      = $config["total_rows"];
				$data['searchname'] = $this->input->post('search');
				$data['city']       = $this->input->post('city'); 
			}
			$this->db->select('services.name as service_name, listing.*')
			->join('services','services.id=listing.service_id')
			->limit($config["per_page"], $page)
			->order_by('date(listing.created_on)','desc');
			$query   = $this->db->get('listing');
			$data['listing'] = $query->result();
			if($this->input->post()){
				if($ad_type!= '0'){
					$data['ad_type'] = $this->db->where('id',$ad_type)->get('ad_type')->row()->name;
				}else{
					$data['ad_type'] = "All Category";
				} 
			} 
			$this->load->view('front/view-all',$data);
		}

		public function viewall(){	    
			$this->load->model('Front_model');
			$this->load->library("pagination");
			$config 			= array();
			$config["base_url"] = base_url() . "Welcome/viewall";
			if($this->input->post()){	        
				$ad_type 		= $this->input->post('ad_type');
				if($ad_type != '0'){
					$this->db->where('listing.ad_type_id',$ad_type);
				}
				if($this->input->post('search') !=''){
					$search  = $this->input->post('search');
					$this->db->where("listing.name LIKE '%$search%'");
				}
				if($this->input->post('city') !=''){
					$city    = $this->input->post('city');
					$this->db->where('listing.city',$city);
				}	        
			}
			$config["total_rows"]  	  = $this->db->get('listing')->num_rows();
			$config["per_page"]    	  = 6;
			$config["uri_segment"] 	  = 3;
			$config['data_page_attr'] = 'class="page-link"';       
			$config['cur_tag_open']   = '<li class="page-item active"><a class="page-link" href="#">';
			$config['cur_tag_close']  = '</a></li>';
			$this->pagination->initialize($config);
			$page  = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["links"] = $this->pagination->create_links();        
			if($this->input->post()){	        
				$ad_type   = $this->input->post('ad_type');
				if($ad_type!= '0'){
					$this->db->where('listing.ad_type_id',$ad_type);
				}
				if($this->input->post('search') !=''){
					$search = $this->input->post('search');
					$this->db->where("listing.name LIKE '%$search%'");
				}
				if($this->input->post('city') !=''){
					$city = $this->input->post('city');
					$this->db->where('listing.city',$city);
				}
				$data['title']      = "Search Result";
				$data['total']      = $config["total_rows"];
				$data['searchname'] = $this->input->post('search');
				$data['city']       = $this->input->post('city'); 
			} 
			$this->db->select('services.name as service_name, listing.*')
			->join('services','services.id=listing.service_id')
			->where('listing.status','1')
			->limit($config["per_page"], $page)
			->order_by('date(listing.created_on)','desc');
			$query   = $this->db->get('listing');
			$data['listing'] = $query->result();
			if($this->input->post()){
				if($ad_type!= '0'){
					$data['ad_type'] = $this->db->where('id',$ad_type)->get('ad_type')->row()->name;
				}else{
					$data['ad_type'] = "All Category";
				} 
			} 
			$this->load->view('front/view-all',$data);
		}

		public function dashboard(){
			if(!is_logged_in()){
				redirect("userlogin");
			}
			$this->load->view('front/dashboard');
		}

		public function user_dashboard(){
			if(!is_logged_in()){
				redirect("userlogin");
			}
			$id = user_details()->id;
			$data['title'] = 'User Dashboard';
			$this->load->view('front/user-dashboard',$data);
		}

		public function personal_information(){
			if(!is_logged_in()){
				redirect("userlogin");
			}
			$id = user_details()->id;
			$data['title'] = 'Personal-Information';
			$this->load->view('front/personal-information',$data);
		}

		public function editprofile(){
			if(!is_logged_in()){
				redirect("userlogin");
			}
			if($this->input->post()){
				$data = $this->input->post();
				unset($data['userfile']);
				if(!empty($_FILES['userfile']['name'])) {
					$fileName   = $_FILES['userfile']['name'];
					$tempFile   = $_FILES['userfile']['tmp_name'];		 
					$targetPath = 'assets/frontend/images/user/';	
					$uloadsdata = $this->front_model->image_uploads($tempFile, $fileName, $targetPath);
					$data['image']  = $fileName;	
				}else{
					$data['image']  = $this->input->post('image');	   		
				}      
				$userid = $data['id'];
				unset($data['id']);
				$this->db->where('id',$userid);
				$this->db->update('users',$data);	        
				$this->session->set_flashdata('success','Profile Updated Successfully');
				redirect($_SERVER['HTTP_REFERER']);
			}
			$this->load->view('front/edit-profile');		
		}

		public function change_password(){
			if(!is_logged_in()){
				redirect("userlogin");
			}
			$id = user_details()->id;
			$data['title'] = 'Change-Password';
			$this->load->view('front/change-password',$data);
		}

		function changePassword(){
			if(!is_logged_in()){
				redirect("userlogin");
			}
			if($this->input->post()){
				$oldPassword     = $this->input->post('old-password');
				$currentPassword = md5($this->input->post('current-password'));
				$newPassword     = md5($this->input->post('new-password'));
				$confirmPassword = md5($this->input->post('confirm-password'));

				if ($oldPassword == $currentPassword) {
					if ($newPassword == $confirmPassword) {
						$userid      = $this->input->post('id');
						$data['password'] = $confirmPassword;
						$this->db->where('id',$userid);
						$this->db->update('users',$data);	        
						$this->session->set_flashdata('success','Change Password Successfully');
						redirect($_SERVER['HTTP_REFERER']);		        		 	 
					}else{
						$this->session->set_flashdata('error','New Password and Confirm Password are not same !');
						redirect($_SERVER['HTTP_REFERER']);	 
					}
				}else{
					$this->session->set_flashdata('error','Current Password is wrong!');
					redirect($_SERVER['HTTP_REFERER']);	
				} 	        
			}		    
			$this->load->view('front/edit-profile');	
		}

		function changePlan(){
			if(!is_logged_in()){
				redirect("userlogin");
			}
			if($this->input->post()){
				$plan     = $this->input->post('service_id');
				$userid   = $this->input->post('id');
				$data['subscription_id'] = $plan;
				$this->db->where('id',$userid);
				$this->db->update('users',$data);	        
				$this->session->set_flashdata('success','Change Plan Successfully');
				redirect($_SERVER['HTTP_REFERER']);		        		 	 
			}else{
				$this->session->set_flashdata('error','New Password and Confirm Password are not same !');
				redirect($_SERVER['HTTP_REFERER']);	 
			}		    
			$this->load->view('front/edit-profile');	
		}
		
		public function profile(){
			if(!is_logged_in()){
				redirect("userlogin");
			}
			$this->load->view('front/profile');
		}
		
		public function category(){	    
			$data['services'] = $this->db->get('services')->result();
			$this->load->view('front/category',$data);
		}

		public function adminlogin(){
			$this->load->view('admin/login');
		}

		public function logout(){
			$this->session->sess_destroy();
			$this->session->set_flashdata('success','Logged Out Successfully','Success');
			redirect('welcome');
		}
		
		public function user_detail($id){
			$this->db->select('ad_type.name as ad_type,cities.city as cityname,cities.state as statename,services.name as service_name, listing.*')
			->where('listing.user_id',$id)
			->join('ad_type','ad_type.id=listing.ad_type_id')
			->join('cities','cities.city=listing.city')
			->join('services','services.id=listing.service_id')
			->order_by('date(listing.created_on)','desc');
			$data['user_ads'] = $this->db->get('listing')->result();
			$data['user']     = $id;
			$this->load->view('front/dashboard',$data);
		}
		
		public function shop_by_category($slug){	    
			$ad_type = $this->db->where('name',$slug)->get('ad_type')->row()->id; 
			$this->load->library("pagination");
			$config  = array();
			$config["base_url"]       = base_url() . "category/$slug";
			$this->db->where('listing.ad_type_id',$ad_type);
			$config["total_rows"]     = $this->db->get('listing')->num_rows();
			$config["per_page"]       = 6;
			$config["uri_segment"]    = 3;
			$config['data_page_attr'] = 'class="page-link"';       
			$config['cur_tag_open']   = ' <li class="page-item active"><a class="page-link" href="#">';
			$config['cur_tag_close']  = '</a></li>';
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["links"] = $this->pagination->create_links();
			$this->db->where('listing.ad_type_id',$ad_type);        
			$this->db
			->select('services.name as service_name, listing.*')
			->join('services','services.id=listing.service_id')
			->limit($config["per_page"], $page)
			->order_by('date(listing.created_on)','desc');
			$query = $this->db->get('listing');
			$data['listing'] = $query->result();
			$data['ad_type'] = $this->db->where('id',$ad_type)->get('ad_type')->row()->name;
			$adty            = $data['ad_type'];
			$data['title']   = "Ads For $adty";
			$data['total']   = $config["total_rows"];
			$data['searchname'] = $adty;
			$data['city']    = $this->input->post('city');
            //$data['listing'] = $this->Front_model->get_lists($config["per_page"], $page);	    
			$this->load->view('front/view-all',$data);	
		}
		
		public function shop_by_sub_category($cat,$subcat,$subcatid){ 
			$this->load->library("pagination");
			$config = array();
			$config["base_url"]     = base_url() . "category/$cat/$subcat/$subcatid";
			$this->db->where('listing.sub_service_id',$subcatid);
			$config["total_rows"]   = $this->db->get('listing')->num_rows();
			$config["per_page"]     = 6;
			$config["uri_segment"]  = 3;
			$config['data_page_attr'] = 'class="page-link"';       
			$config['cur_tag_open'] = ' <li class="page-item active"><a class="page-link" href="#">';
			$config['cur_tag_close']= '</a></li>';
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(5) : 0;
			$data["links"] = $this->pagination->create_links();
			$this->db->where('listing.sub_service_id',$subcatid);        
			$this->db
			->select('services.name as service_name, listing.*')
			->join('services','services.id=listing.service_id')
			->limit($config["per_page"], $page)
			->order_by('date(listing.created_on)','desc');
			$query = $this->db->get('listing');        
			$data['listing'] = $query->result();
			$ad_type = $this->db->where('sub_service_id',$subcatid)->get('listing')->row()->ad_type_id;
			$data['ad_type'] = $this->db->where('id',$ad_type)->get('ad_type')->row()->name;
			$adty = $data['ad_type'];
			$data['title'] = "Ads For $subcat";
			$data['total'] = $config["total_rows"];
			$data['searchname'] = $subcat;
			$data['city']  = $this->input->post('city'); 
           //$data['listing'] = $this->Front_model->get_lists($config["per_page"], $page);	    
			$this->load->view('front/view-all',$data);	
		}

		public function userregister(){
			if(is_logged_in()){
				redirect("myprofile");
			}
			$this->load->view('front/register');
		}

		public function userlogin(){
			if(is_logged_in()){
				redirect("myprofile");
			}
			$hybrid = new Hybridauth($this->getHybridConfig());
        	//Get enabled providers array
			$data['providers'] = $hybrid->getProviders();
			$this->load->view('front/login',$data);
		}

		public function forgotpassword(){
			$this->load->view('front/forgot-password');
		}

		public function resetpassword(){
			$this->load->view('front/reset-password');
		}

		public function forgot_pass()
	{
		if($this->input->post('forgot_pass'))
		{
			$email=$this->input->post('email');
			$que=$this->db->query("select password,email from users where email='$email'");
			$row=$que->row();
			$user_email=$row->email;
			if((!strcmp($email, $user_email))){
			$pass=$row->password;
				/*Mail Code*/
				$to = $user_email;
				$subject = "Password";
				$txt = "Your password is $pass .";
				$headers = "From: password@example.com" . "\r\n" .
				"CC: ifany@example.com";
				mail($to,$subject,$txt,$headers);
				}
			else{
			$data['error']="invalid Email ID !";
			}
		
	}
	   $this->load->view('front/forgot_pass',@$data);	
   }

		public function ForgotPassword1(){
         	$email = $this->input->post('email');     
         	$findemail = $this->front_model->ForgotPassword($email);  
         	 
         	if($findemail){
          		$this->front_model->sendpassword($findemail); 
        		$this->session->set_flashdata("success","Password send on your registered email.");   
          		redirect('userlogin');        		   		      
            }else{
          		$this->session->set_flashdata('error',' Email not found!');
          		redirect($_SERVER['HTTP_REFERER']);
      		}
   		}   		 

		public function package(){
			$data['title']   = 'Package';
			$data['packages']=$this->db->get_where('tbl_subscriptions',array('status'=>1))->result_array();
			$this->load->view('front/package',$data);
		}

		public function flipbooks(){
			$data['title']     = 'Flipbooks';
			$data['flipbooks'] = $this->db->get_where('book',array('status' => 1))->result_array();
			$this->load->view('front/flipbooks',$data);
		}

		public function contact(){
			$this->load->view('front/contact');
		}

		public function addContact(){
	    	if($this->input->post()){
	    		$name  	 = trim($this->input->post('name'));
		        $email 	 = trim($this->input->post('email'));
		        $phone 	 = trim($this->input->post('phone'));
		        $subject = trim($this->input->post('subject'));
		        $message = trim($this->input->post('message'));
		       	$data    = array(
			                    'name'    => $name,
			                    'email'   => $email,
			                    'phone'   => $phone,
			                    'subject' => $subject,
			                    'message' => $message
		                    );
	        // $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
	        // $userIp=$this->input->ip_address();
	        // $secret='****************************';
	        // $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response;=".$recaptchaResponse."&remoteip;=".$userIp;
	        // $response = $this->curl->simple_get($url);
	        // $status= json_decode($response, true);

	        if($data)
	        {  
	          //insert data when get success in google recaptcha
	          $this->db->insert('tbl_contact_us',$data);   
	          $res['msg'] = "Success";
	          //no need to set flash session in CI for ajax
	          //$this->session->set_flashdata('flashSuccess', 'successfull');
	        }
	        else
	        {
	        //$this->session->set_flashdata('flashSuccess', 'Sorry Google Recaptcha Unsuccessful!!');
	        $res['msg'] ="Error";
	        }
	        //set page header as json format
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode($res));
	    	}
		}

		public function home(){
			$this->load->view('front/index');
		}		

	   //Processes social login
		function auth($provider = NULL) {
			$service = NULL;
			try{
            //Instantiate Hybridauth's classes
				$hybrid = new Hybridauth($this->getHybridConfig());
            //Check if given provider is enabled
				if ((isset($provider)) && in_array($provider, $hybrid->getProviders())){
					$this->session->set_userdata('provider', $provider);
				}
            //Update variable with the valid provider
				$provider = $this->session->userdata('provider');
				if ($provider){
					$service = $hybrid->authenticate($provider);
					if ($service->isConnected()){
                    //Get user profile
						$profile = $service->getUserProfile();
                    //Get user contacts
						$contacts = $service->getUserContacts();
                    /*
                    Disconnect the service else HA would reuse stored session data
                    rather making a fresh request in case the user has denied permissions
                    in the previous authorization request
                    */
                    $service->disconnect();
                    $this->session->unset_userdata('provider');
                    //Display the profile data
                    $data['name']     = $profile->displayName;
                    $data['email']    = $profile->email;
                    $data['phone']    = $profile->phone;
                    $data['photoURL'] = $profile->photoURL;
                    $data['password'] = $profile->displayName;

                    unset($data['photoURL']);
                    $usercheck        = $this->db->where('phone',$data['phone'])
                    ->or_where('email',$data['email'])
                    ->get('users')->num_rows();

                    if($usercheck > '0'){
                    	$query = $this->db->where('email',$data['email'])
                    	->get('users');
                    	$user  = $query->row();
                    	$this->session->set_userdata('user_data',$user);
                    	$this->session->set_flashdata('success','User Logged In Successfully');
                    	redirect($_SERVER['HTTP_REFERER']);
                    }else{
                    	$url 	  = $data['photoURL'];
                    	/* Extract the filename */
                    	$filename = substr($url, strrpos($url, '/') + 1);
                    	/* Save file wherever you want */
                    	file_put_contents('uploads/'.$filename, file_get_contents($url));
                    	$data['role']     = '3';
                    	$data['status']   = '1';
                    	$data['image']    = $filename;
                    	$data['password'] = md5($data['password']);
                    	$this->db->insert('users',$data);
                    	$enpassword       = $data['password'];
                    	$query = $this->db->where('email',$data['email'])
                    	->where('password', $enpassword)
                    	->get('users');
                    	$user = $query->row();
                    	$this->session->set_userdata('user_data',$user);
                    	$this->session->set_flashdata('success','User Logged In  Successfully');
                    	redirect($_SERVER['HTTP_REFERER']);
                    }
                }else{
                	$this->session->set_flashdata('showmsg', array('msg' => 'Sorry! We couldn\'t authenticate your identity.'));
                }
            }
        }
        catch(Exception $e){
        	if (isset($service) && $service->isConnected()) 
        		$service->disconnect();
        	$error = 'Sorry! We couldn\'t authenticate you.';
        	$this->session->set_flashdata('showmsg', array('msg' => $error));
        	$error .= '\nError Code: ' . $e->getCode();
        	$error .= '\nError Message: ' . $e->getMessage();
        	log_message('error', $error);
        }
    }

    //Hybridauth configuration
    private function getHybridConfig(){
    	$config = array(
    		'callback'  => site_url('social/auth/') ,
    		'providers' => array(
    			'Google'=> array(
    				'enabled' => true,
    				'keys'    => array(
    					'id'  => '831264828590-77jv6mpolk68nobr3h4bn5372kjou76v.apps.googleusercontent.com',
    					'secret' => 'xj-ZDWMIbYrELoZb9XktIRk9'
    				) ,
    				'scope' => 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
    			) ,

    			'Facebook' => array(
    				'enabled' => true,
    				'keys' => array(
    					'id' => (ENVIRONMENT == 'development') ? 'DEVELOPMENT_APP_ID' : 'PRODUCTION_APP_ID',
    					'secret' => (ENVIRONMENT == 'development') ? 'DEVELOPMENT_APP_SECRET' : 'PRODUCTION_APP_SECRET'
    				) ,
    				'scope' => 'email, public_profile'
    			) ,

    			'Twitter' => array(
    				'enabled' => true,
    				'keys' => array(
    					'key' => 'APP_KEY',
    					'secret' => 'APP_SECRET'
    				)
    			)
    		) ,

    		'hybrid_debug' => array(
    			'debug_mode' => 'info', /* none, debug, info, error */
    			'debug_file' => APPPATH . '/logs/log-' . date('Y-m-d') . '.php'
    		)
    	);
    	return $config;
    }

    public function test_api(){
    	$this->load->view('test');
    }

    public function map_view(){
    	$d= GetDrivingDistance('26.537655','26.267655','80.577655', '80.227655');
    	print_r($d); 
    	$data['ads']     = $this->db->select('user_id,latitude,longitude')->get('listing')->result();
    	$data['lat_min'] = $this->db->select_min('latitude')->get('listing')->row()->latitude;
    	$data['lng_min'] = $this->db->select_min('longitude')->get('listing')->row()->longitude;
    	$data['lat_max'] = $this->db->select_max('latitude')->get('listing')->row()->latitude;
    	$data['lng_max'] = $this->db->select_max('longitude')->get('listing')->row()->longitude;
    	$this->load->view('map_view',$data);
    }

    public function mapview(){
    	$this->load->view('front/browse-with-map');
    }

    public function get_nearest_ads(){
    	$tableName = "listing";
    	$origLat   = 43.7216541;
    	$origLon   = -79.4075609;
		$dist      = 5; // This is the maximum distance (in miles) away from $origLat, $origLon in which to search
		$query = "SELECT name, latitude, longitude, 3956 * 2 * 
		ASIN(SQRT( POWER(SIN(($origLat - latitude)*pi()/180/2),2)
		+COS($origLat*pi()/180 )*COS(latitude*pi()/180)
          *POWER(SIN(($origLon-longitude)*pi()/180/2),2))) 
		as distance FROM $tableName WHERE 
		longitude between ($origLon-$dist/cos(radians($origLat))*69) 
		and ($origLon+$dist/cos(radians($origLat))*69) 
		and latitude between ($origLat-($dist/69)) 
		and ($origLat+($dist/69)) 
		having distance < $dist ORDER BY distance limit 100"; 
		$res = $this->db->query($query)->num_rows();
		print_r($res);
		exit;
	}

    //category testing view
	public function category_test(){
		$data['title'] = 'Testing Category By Front';
		$this->load->view('front/category_test',$data);
	}

    ///testing pagination and product filter
	public function shop_left_sidebar($param='', $param1=''){
		if($param1 == 'subcat'){
			$data['products'] = $this->db->order_by('sub_service_id','Asc')->get_where('listing', array('sub_service_id' =>$param))->result_array();
		}elseif ($param1 == 'cat') {
			$data['products'] = $this->db->order_by('service_id','Asc')->get_where('listing', array('service_id' =>$param))->result_array();
		}  
		$data['cities']   = $this->home_model->getCitiesBuySell();
		$data['qualities']= $this->home_model->getQualitiesBuySell();
		//$data['cats']     = $this->home_model->getCatsBuySell();
		$data['subcats']  = $this->home_model->getSubcatsBuySell();
		$data['ads']      = $this->home_model->getAdsBuySell();         
		$data['title']    = "Ads List";    
		$this->load->view('front/header',$data);
		$this->load->view('front/shop-left-sidebar');
		$this->load->view('front/footer'); 
	}

	public function product_filter($page_id = null){
		$this->output->set_content_type('application/json');
		$ttl_rows         = $this->home_model->getProductFilterBuySell();
		$data['ttl_rows'] = count($ttl_rows);
		$data['per_page'] = $per_page = 12;
		$data['total_page'] = ceil(count($ttl_rows)/$per_page);
		if(empty($page_id)){
			$page_id      = 0;
		}
		$data['page_id']  = $page_id;
		$data['products'] = $this->home_model->getProductFilterBuySell($per_page, $page_id);
		$i = 0; 
		$content_wrapper  = $this->load->view('front/product_filter', $data, true);
		$content_wrapper_pagination = $this->load->view('front/product_filter_pagination', $data, true);
		$this->output->set_output(json_encode(['content_wrapper' => $content_wrapper, 'content_wrapper_pagination' => $content_wrapper_pagination]));
		return FALSE;
	}

  	// Auction List
	public function auction(){
		$data['title']     = "Auction Here !!";
		// $id = user_details()->id;
		if(is_logged_in()){
			$data['bids']	   = $this->home_model->getBidByUser(user_details()->id);				
			}  
		$data['qualities'] = $this->home_model->getQualitiesAuction();		
        $data['cities']    = $this->home_model->getCitiesAuction();
	//	$data['cats']      = $this->home_model->getCatsAuction();
		$data['subcats']   = $this->home_model->getSubcatsAuction();
		$data['ads']       = $this->home_model->getAdsAuction();
		$this->load->view('front/header',$data);
		$this->load->view('front/auction');
		$this->load->view('front/footer');
	}

	public function product_filter_auction($page_id = null){
		$this->output->set_content_type('application/json');
		$ttl_rows         = $this->home_model->getProductFilterAuction();
		$data['ttl_rows'] = count($ttl_rows);
		$data['per_page'] = $per_page = 9;
		$data['total_page'] = ceil(count($ttl_rows)/$per_page);
		if(empty($page_id)){
			$page_id     = 0;
		}
		$data['page_id'] = $page_id;
		$data['products']= $this->home_model->getProductFilterAuction($per_page, $page_id);
		$i = 0; 
		$content_wrapper = $this->load->view('front/product_filter_auction', $data, true);
		$content_wrapper_pagination = $this->load->view('front/product_filter_auction_pagination', $data, true);
		$this->output->set_output(json_encode(['content_wrapper' => $content_wrapper, 'content_wrapper_pagination' => $content_wrapper_pagination]));
		return FALSE;
	}

	public function auction_list(){
		$data['title']    = "Auction Here !!";
		$data['qualities']= $this->home_model->getQualitiesAuction();		
		$data['cities']   = $this->home_model->getCitiesAuction();
//$data['cats']     = $this->home_model->getCatsAuction();
		$data['subcats']  = $this->home_model->getSubcatsAuction();
		$data['ads']      = $this->home_model->getAdsAuction();
		$this->load->view('front/header',$data);
		$this->load->view('front/auction-list');
		$this->load->view('front/footer');
	}

	public function product_filter_auction_list($page_id = null){
		$this->output->set_content_type('application/json');
		$ttl_rows         = $this->home_model->getProductFilterAuction();
		$data['ttl_rows'] = count($ttl_rows);
		$data['per_page'] = $per_page = 9;
		$data['total_page'] = ceil(count($ttl_rows)/$per_page);
		if(empty($page_id)){
			$page_id     = 0;
		}
		$data['page_id'] = $page_id;
		$data['products']= $this->home_model->getProductFilterAuction($per_page, $page_id);
		$i = 0; 
		$content_wrapper = $this->load->view('front/product_filter_auction_list', $data, true);
		$content_wrapper_pagination = $this->load->view('front/product_filter_auction_list_pagination', $data, true);
		$this->output->set_output(json_encode(['content_wrapper' => $content_wrapper, 'content_wrapper_pagination' => $content_wrapper_pagination]));
		return FALSE;
	}

	public function shop_left_sidebar_list($param='', $param1=''){
		if($param1 == 'subcat'){
			$data['products'] = $this->db->order_by('sub_service_id','Asc')->get_where('listing', array('sub_service_id' =>$param))->result_array();
		}elseif ($param1 == 'cat') {
			$data['products'] = $this->db->order_by('service_id','Asc')->get_where('listing', array('service_id' =>$param))->result_array();
		}  
		$data['qualities']= $this->home_model->getQualitiesBuySell();		
		$data['cities']   = $this->home_model->getCitiesBuySell();
		//$data['cats']     = $this->home_model->getCatsBuySell();
		$data['subcats']  = $this->home_model->getSubcatsBuySell();
		$data['ads']      = $this->home_model->getAdsBuySell();       
		$data['title']    = "Ads List";    
		$this->load->view('front/header',$data);
		$this->load->view('front/shop-left-sidebar-list');
		$this->load->view('front/footer'); 
	}


	public function product_filter_buy_sell_list($page_id = null){
		$this->output->set_content_type('application/json');
		$ttl_rows         = $this->home_model->getProductFilterBuySell();
		$data['ttl_rows'] = count($ttl_rows);
		$data['per_page'] = $per_page = 8;
		$data['total_page'] = ceil(count($ttl_rows)/$per_page);
		if(empty($page_id)){
			$page_id     = 0;
		}
		$data['page_id'] = $page_id;
		$data['products']= $this->home_model->getProductFilterBuySell($per_page, $page_id);
		$i = 0; 
		$content_wrapper = $this->load->view('front/product_filter_buy_sell_list', $data, true);
		$content_wrapper_pagination = $this->load->view('front/product_filter_buy_sell_list_pagination', $data, true);
		$this->output->set_output(json_encode(['content_wrapper' => $content_wrapper, 'content_wrapper_pagination' => $content_wrapper_pagination]));
		return FALSE;
	} 

	public function product_filter_list($page_id = null){
		$this->output->set_content_type('application/json');
		$ttl_rows         = $this->home_model->getProductFilter();
		$data['ttl_rows'] = count($ttl_rows);
		$data['per_page'] = $per_page = 8;
		$data['total_page'] = ceil(count($ttl_rows)/$per_page);
		if(empty($page_id)){
			$page_id     = 0;
		}
		$data['page_id'] = $page_id;
		$data['products']= $this->home_model->getProductFilter($per_page, $page_id);
		$i = 0; 
		$content_wrapper = $this->load->view('front/product_filter_list', $data, true);
		$content_wrapper_pagination = $this->load->view('front/product_filter_pagination_list', $data, true);
		$this->output->set_output(json_encode(['content_wrapper' => $content_wrapper, 'content_wrapper_pagination' => $content_wrapper_pagination]));
		return FALSE;
	}     

	public function shop_4_column($param='', $param1=''){
		if($param1 == 'subcat'){
			$data['products'] = $this->db->get_where('listing', array('sub_service_id' =>$param))->result_array();
		}elseif ($param1 == 'cat') {
			$data['products']=$this->db->query("SELECT * FROM `listing` order by id Asc")->result_array();
		}elseif ($param1 == 'search') {
			$search_name=$this->input->post('search_name');        
			$data['products'] = $this->home_model->getSearchproduct_subcategory($search_name);
		}          
		$data['title'] = "Product List";
		$this->load->view('front/header',$data);
		$this->load->view('front/shop-4-column', $data);
		$this->load->view('front/footer');
	}

  //search_color
	public function search_color(){
		$postData = $this->input->post();
		$data     = $this->home_model->search_color($postData);
		$i        = 1;
		foreach($data as $row){       
			echo "<tr>";
			echo '<td colspan="2" style="border: 1px solid black;font-size:15px;width: 227px;"><span id="joun_date">'.$row->product_name.'</span></td>';
			echo '<td colspan="2" style="border: 1px solid black;font-size:16px;"><span id="joun_cr_ledger">'.$row->product_id.'</span><br><span id="joun_dr_remarks">'.$row->price.'</span><br></td>';
			echo '<td colspan="1" style="border: 1px solid black; text-align: center;font-size:17px;" ><input readonly="" type="text" name="dr_amount" id="joun_dr_amount"  value="'.$row->color.'" class="form-control addation_dr" style="border: 0px solid;font-size:17px;"></td>';
			echo '<td colspan="1" style="border: 1px solid black; text-align: center;font-size:17px;" ><input readonly="" type="text" name="cr_amount" id="joun_cr_amount" value="'.$row->type.'" class="form-control addation_cr" style="border: 0px solid;font-size:17px;"></td>';
			echo "</tr>";
			$i++;
		}
	}

	public function terms_condition(){
		$data['title']    = "Terms Condition";    
		$this->load->view('front/terms-condition',$data);
	}

	public function privacy_policy(){
		$data['title']    = "Privacy Policy";    
		$this->load->view('front/privacy-policy',$data);
	}

	public function about_us(){
		$data['title']    = "About us";    
		$this->load->view('front/about-us',$data);
	}

	public function my_ads(){
		if(!is_logged_in()){
			redirect("userlogin");
		}
		$data['title'] = 'My-Ads';
		$id = user_details()->id;
		$data['users'] = $this->db->select('l.*,s.name as service_name,ss.name as ss_name')
		->from('listing l')
		->join('services s', 's.id = l.service_id')
		->join('sub_services ss','ss.id = l.sub_service_id')
		->where(['l.user_id' => $id, 's.status' => '1','ss.status' => '1'])
		->get()->result_array();
		$this->load->view('front/dashboard-my-ads',$data);
	}

	public function table_filter($page_id = null){
		$this->output->set_content_type('application/json');
		$id = user_details()->id;  	
		$ttl_rows       = $this->db->select('l.*,s.name as service_name,ss.name as ss_name')
		->from('listing l')
		->join('services s', 's.id = l.service_id')
		->join('sub_services ss','ss.id = l.sub_service_id')
		->where(['l.user_id' => $id, 's.status' => '1','ss.status' => '1'])
		->get()->result_array();
		$data['ttl_rows'] 	= count($ttl_rows);
		$data['per_page'] 	= $per_page = 4;
		$data['total_page'] = ceil(count($ttl_rows)/$per_page);
		if(empty($page_id)){
			$page_id     	= 0;
		}
		$data['page_id'] 	= $page_id;
		$data['users']		= $this->home_model->getProductFilterTable($id,$per_page, $page_id);
		$i = 0; 
		$content_wrapper = $this->load->view('front/table_filter', $data, true);
		$content_wrapper_pagination = $this->load->view('front/table_filter_pagination', $data, true);
		$this->output->set_output(json_encode(['content_wrapper' => $content_wrapper, 'content_wrapper_pagination' => $content_wrapper_pagination]));
		return FALSE;
	}

	public function manage_address(){
		if (!is_logged_in()) {
			redirect('userlogin');
		}
		$this->load->view('front/manage-address');
	} 

	public function addAddress(){
		if(!is_logged_in()){
			redirect("userlogin");
		}
		$list               = $this->input->post();
		$list['created_at'] = date('Y-m-d h:i:s');
		$this->db->insert('tbl_address',$list);
		$listid   = $this->db->insert_id();	
		if ($listid > 0) { 				
			$this->session->set_flashdata('success','Add Address Successfully');
			redirect($_SERVER['HTTP_REFERER']); 
		}else{
			$this->session->set_flashdata('error','Something went wrong!!');
			redirect($_SERVER['HTTP_REFERER']);
		}  
	}

	public function addBid1(){
		if(!is_logged_in()){
			redirect("userlogin");
		}
		$list               = $this->input->post();
		// $list['created_at'] = date('Y-m-d h:i:s');
		$this->db->insert('tbl_bids',$list);
		$listid   = $this->db->insert_id();	
		if ($listid > 0) { 				
			$this->session->set_flashdata('success','Place Bid Successfully');
			redirect($_SERVER['HTTP_REFERER']); 
		}else{
			$this->session->set_flashdata('error','Something went wrong!!');
			redirect($_SERVER['HTTP_REFERER']);
		}  
	}

	public function addBid(){
		$edit_id = $this->input->post('edit_id');
		$data 	 = array(
			'user_id'   => $this->input->post('user_id'),	
			'product_id' => $this->input->post('product_id'),	
			'price' => $this->input->post('price'),	
		);
		if(!empty($edit_id)){
			$data = $this->home_model->update('tbl_bids', $data, 'id', $edit_id);
			if($data > 0){
				$this->session->set_flashdata('success','Bid Update Successfully.'); 
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('error','Something went wrong. !!');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			$data = $this->home_model->insert('tbl_bids', $data);
			if($data > 0){
				$this->session->set_flashdata('success','Bid inserted. !!');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('error','Something went wrong. !!'); 
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}

	public function recentaly_view_ads(){
		if(!is_logged_in()){
			redirect("userlogin");
		}
		$data['title']   = 'My-Ads';
		$recentlyViewed  = $this->session->userdata('recentlyViewed');
		if (!empty($recentlyViewed)) {
			 $ids             = array_reverse($recentlyViewed);
		}else{
			$ids             = null;			
		}
		$id              = user_details()->id;
		$data['users']   = $this->home_model->getRecentViewProducts($id,$ids); 
		$this->load->view('front/recentaly-view-ads',$data);
	}

	public function table_filter_recentaly_view($page_id = null){
		$this->output->set_content_type('application/json');
		$id = user_details()->id; 
		$recentlyViewed  = $this->session->userdata('recentlyViewed');
		$ids             = array_reverse($recentlyViewed);
		// $data['users']   = $this->home_model->getRecentViewProducts($id,$ids);                           
		$ttl_rows        = $this->home_model->getRecentViewProducts($id,$ids);
		$data['ttl_rows'] 	= count($ttl_rows);
		$data['per_page'] 	= $per_page = 3;
		$data['total_page'] = ceil(count($ttl_rows)/$per_page);
		if(empty($page_id)){
			$page_id     	= 0;
		}
		$data['page_id'] 	= $page_id;
		$data['users']		= $this->home_model->getRecentViewProducts($id,$ids,$per_page, $page_id);
		$i = 0; 
		$content_wrapper = $this->load->view('front/table_filter_recentaly_view', $data, true);
		$content_wrapper_pagination = $this->load->view('front/table_filter_recentaly_view_pagination', $data, true);
		$this->output->set_output(json_encode(['content_wrapper' => $content_wrapper, 'content_wrapper_pagination' => $content_wrapper_pagination]));
		return FALSE;
	}

	public function dashboard_favourite_ads(){
		if(!is_logged_in()){
			redirect("userlogin");
		}
		$data['title'] = 'Dashboard favourite ads';
		$this->load->view('front/dashboard-favourite-ads');
	}

	// public function payment_options($pid = Null){
	// 	if(!is_logged_in()){
	// 		redirect("userlogin");
	// 	}
	// 	$uid = user_details()->id;	
	// 	$data['title'] = 'Payment - Options';
	// 	$data['seller_details'] = $this->home_model->getSellerDetails($pid);
	// 	$this->load->view('front/payment-options',$data);
	// }

	public function my_favorite_ads(){
		if(!is_logged_in()){
			redirect("userlogin");
		}
		$data['title'] = 'My-Ads';
		$id = user_details()->id;
		$this->load->view('front/my-favorite-ads',$data);
	}	

	public function table_filter_favorite($page_id = null){
		$this->output->set_content_type('application/json');
		$id = user_details()->id;  	
		$ttl_rows         	= $this->db->select('*')
										->from('tbl_favorites f')
										->join('listing l','l.id  = f.product_id')		
										->where(['f.user_id' => $id])
										->get()->result_array();
		$data['ttl_rows'] 	= count($ttl_rows);
		$data['per_page'] 	= $per_page = 4;
		$data['total_page'] = ceil(count($ttl_rows)/$per_page);
		if(empty($page_id)){
			$page_id     	= 0;
		}
		$data['page_id'] 	= $page_id;
		$data['users']		= $this->home_model->getFavoriteAds($id,$per_page, $page_id);
		$i = 0; 
		$content_wrapper = $this->load->view('front/table_filter_favorite', $data, true);
		$content_wrapper_pagination = $this->load->view('front/table_filter_favorite_pagination', $data, true);
		$this->output->set_output(json_encode(['content_wrapper' => $content_wrapper, 'content_wrapper_pagination' => $content_wrapper_pagination]));
		return FALSE;
	}

	public function my_bids(){
		if(!is_logged_in()){
			redirect("userlogin");
		}
		$data['title'] = 'My-bids';
		$this->load->view('front/my-bids',$data);
	}	

	public function table_filter_bids($page_id = null){
		$this->output->set_content_type('application/json');
		$id = user_details()->id;  	
		$ttl_rows         	= $this->home_model->getBids($id);
		$data['ttl_rows'] 	= count($ttl_rows);
		$data['per_page'] 	= $per_page = 4;
		$data['total_page'] = ceil(count($ttl_rows)/$per_page);
		if(empty($page_id)){
			$page_id     	= 0;
		}
		$data['page_id'] 	= $page_id;
		$data['users']		= $this->home_model->getBids($id,$per_page, $page_id);
		$i = 0; 
		$content_wrapper = $this->load->view('front/table_filter_bids', $data, true);
		$content_wrapper_pagination = $this->load->view('front/table_filter_bids_pagination', $data, true);
		$this->output->set_output(json_encode(['content_wrapper' => $content_wrapper, 'content_wrapper_pagination' => $content_wrapper_pagination]));
		return FALSE;
	}

	public function purchase_history(){
		if(!is_logged_in()){
			redirect("userlogin");
		}
		$data['title'] = 'My-Ads';
		$id = user_details()->id;
		$this->load->view('front/purchase-history',$data);
	}	

	public function purchase_history1(){
		if(!is_logged_in()){
			redirect("userlogin");
		}
		$data['title'] = 'My-Ads';
		$id = user_details()->id;
		$data['products']		= $this->home_model->getPurchaseHistory($id);
		$this->load->view('front/purchase-history1',$data);
	}	

	public function table_filter_purchase_history($page_id = null){
		$this->output->set_content_type('application/json');
		$id = user_details()->id;  	
		$ttl_rows         	= $this->home_model->getPurchaseHistory($id);
		$data['ttl_rows'] 	= count($ttl_rows);
		$data['per_page'] 	= $per_page = 4;
		$data['total_page'] = ceil(count($ttl_rows)/$per_page);
		if(empty($page_id)){
			$page_id     	= 0;
		}
		$data['page_id'] 	= $page_id;
		$data['users']		= $this->home_model->getPurchaseHistory($id,$per_page, $page_id);
		// print_r($data['users']); die();
		$i = 0; 
		$content_wrapper = $this->load->view('front/table_filter_purchase_history', $data, true);
		$content_wrapper_pagination = $this->load->view('front/table_filter_purchase_history_pagination', $data, true);
		$this->output->set_output(json_encode(['content_wrapper' => $content_wrapper, 'content_wrapper_pagination' => $content_wrapper_pagination]));
		return FALSE;
	}

	public function delete_post($id){
		$image_path 	   = 'assets/images/ads/'; 
		$query_get_image   = $this->db->get_where('ad_images', array('ad_list_id' => $id));
		foreach ($query_get_image->result() as $record){
			$filename = $image_path . $record->image;
			if (file_exists($filename)){
				unlink($filename);	            
			}
			$data = $this->front_model->delete_post($id);
			if($data>0){
				$this->session->set_flashdata('success','Post Deleted Successfully. !!'); 
				redirect('my-ads');
			}else{
				$this->session->set_flashdata('error','Something went wrong. !!');
				redirect('my-ads');
			}
		}
	}

	public function create_account(){
		if(!is_logged_in()){
			redirect("userlogin");
		}
		$data['title'] = 'Create Account';
		$id = user_details()->id;
		$data['custData'] = $this->front_model->getBuyerDetails($id);
		$this->load->view('front/create-account',$data);
	}

	function createAccount(){
        error_reporting(0);
        include APPPATH.'third_party/Braintree/Braintree.php';
		$config = new Braintree\Configuration([
		    'environment' => 'sandbox',
		    'merchantId'  => 'bdkn8m9hwn48jmn2',
		    'publicKey'   => 'zv5hpv4yqwk5ffz3',
		    'privateKey'  => 'e75b02ebc390d21329a78d122e1f79e4'
		]);

		$gateway     = new Braintree\Gateway($config);

		 $merchantAccountParams = [
		  'individual' => [
		    'firstName' => 'Jane',
		    'lastName' => 'Doe',
		    'email' => 'jane@14ladders.com',
		    'phone' => '5553334444',
		    'dateOfBirth' => '1981-11-19',
		    'ssn' => '456-45-4567',
		    'address' => [
		      'streetAddress' => '111 Main St',
		      'locality' => 'Chicago',
		      'region' => 'IL',
		      'postalCode' => '60622'
		    ]
		  ],
		  'business' => [
		    'legalName' => 'Jane\'s Ladders',
		    'dbaName' => 'Jane\'s Ladders',
		    'taxId' => '98-7654321',
		    'address' => [
		      'streetAddress' => '111 Main St',
		      'locality' => 'Chicago',
		      'region' => 'IL',
		      'postalCode' => '60622'
		    ]
		  ],
		  // 'funding' => [
		  //   'descriptor' => 'Blue Ladders',
		  //   'destination' => Braintree\MerchantAccount::FUNDING_DESTINATION_BANK,
		  //   'email' => 'funding@blueladders.com',
		  //   'mobilePhone' => '5555555555',
		  //   'accountNumber' => '1123581321',
		  //   'routingNumber' => '071101307'
		  // ],
		  'tosAccepted' => true,
		  'masterMerchantAccountId' => "14ladders_marketplace",
		  'id' => "blue_ladders_store"
		];
		$data['result'] = $gateway->merchantAccount()->create($merchantAccountParams);
		print_r($data); die();

        $this->load->view('front/order-success', $data);
    }

	function addToCart($proID){        
        // Fetch specific product by ID
        $product = $this->product->getRows($proID);        
        // Add product to the cart
        $data = array(
            'id'    => $product['id'],
            'qty'   => 1,
            'price' => $product['price'],
            'name'  => $product['name'],
            'image' => $product['image']
        );
        $this->cart->insert($data);        
        // Redirect to the cart page
		$this->session->set_flashdata('success','Add to cart Successfully. !!');
		return redirect($_SERVER['HTTP_REFERER']);
    }

    function cart(){
		if(!is_logged_in()){
			redirect("userlogin");
		}
		$data['title']     = 'My-Cart';
        $data['cartItems'] = $this->cart->contents();		
		$this->load->view('front/cart',$data);
	}	 
    
    function checkout(){
        if(!is_logged_in()){
			redirect("userlogin");
		}
        $id = user_details()->id; 
        if($this->cart->total_items() <= 0){
            redirect($_SERVER['HTTP_REFERER']);
        }
        // If order request is submitted
        $data['custData'] = $this->front_model->getBuyerDetails($id);        
        $submit = $this->input->post('placeOrder');
        if(isset($submit)){
            // Form field validation rules
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            // $this->form_validation->set_rules('address','Address','required');            
            // Prepare customer data
            $custData = array(
                'name'     => strip_tags($this->input->post('name')),
                'email'    => strip_tags($this->input->post('email')),
                'phone'    => strip_tags($this->input->post('phone')),
                'address'  => strip_tags($this->input->post('address'))
            );            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Insert customer data
                // $insert = $this->product->insertCustomer($custData);
        		// $id     = user_details()->id; 

                // Check customer data insert status
                if($id){
                    // Insert order
                    $order = $this->placeOrder($id);                    
                    // If the order submission is successful
                    if($order){
                        $this->session->set_flashdata('success', 'Order placed successfully.');
                        redirect('welcome/orderSuccess/'.$order);
                    }else{
                        $data['error_msg'] = 'Order submission failed, please try again.';
                    }
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }        
        // Customer data        
        // Retrieve cart data from the session
        $data['cartItems'] = $this->cart->contents();        
        // Pass products data to the view
        $this->load->view('front/checkout', $data);
    }
    
    function placeOrder($custID){
        //Insert order data
        $ordData = array(
            'customer_id' => $custID,
            'grand_total' => $this->cart->total()
        );
        $insertOrder = $this->product->insertOrder($ordData);        
        if($insertOrder){
            // Retrieve cart data from the session
            $cartItems = $this->cart->contents();            
            // Cart items
            $ordItemData = array();
            $i = 0;
            foreach($cartItems as $item){
                $ordItemData[$i]['order_id']   = $insertOrder;
                $ordItemData[$i]['product_id'] = $item['id'];
                $ordItemData[$i]['quantity']   = $item['qty'];
                $ordItemData[$i]['sub_total']  = $item["subtotal"];
                $i++;
            }            
            if(!empty($ordItemData)){
                // Insert order items
            $insertOrderItems = $this->product->insertOrderItems($ordItemData);
                if($insertOrderItems){
                    // Remove items from the cart
                    $this->cart->destroy(); 
                    // Return order ID
                    return $insertOrder;
                }
            }
        }
        return false;
    }
    
    function orderSuccess($ordID){
        // Fetch order data from the database
        $data['order'] = $this->product->getOrder($ordID);        
        // Load order details view
        error_reporting(0);
        include APPPATH.'third_party/Braintree/Braintree.php';
		$config = new Braintree\Configuration([
		    'environment' => 'sandbox',
		    'merchantId'  => 'bdkn8m9hwn48jmn2',
		    'publicKey'   => 'zv5hpv4yqwk5ffz3',
		    'privateKey'  => 'e75b02ebc390d21329a78d122e1f79e4'
		]);
		$gateway     = new Braintree\Gateway($config);
		// $clientToken = $gateway->ClientToken()->generate();		 
		// $result = $gateway->paymentMethodNonce()->create('bxjy4jb');
		// $nonce  = $result->paymentMethodNonce->nonce;
		// Then, create a transaction:
		$result = $gateway->transaction()->sale([
		    'amount' => '99.00',
		    'paymentMethodNonce' =>$nonce,
		    'deviceData' => $clientToken,
		    'options' => [ 'submitForSettlement' => True,'holdInEscrow' => true ]
		]);

		// $result = $gateway->transaction()->sale([
		// 		'amount' => "100.00",
		// 		'merchantAccountId' => 'bdkn8m9hwn48jmn2',
		// 		'creditCard' =>[
		// 		'number' => "411111111111111",
		// 		'cvv' => "100",
		// 		'expirationDate' => "12/2022",
		// 		 ],
		// 		 'options' => [
		// 		 'submitForSettlement' => true,
		// 		  'holdInEscrow' => true
		// 		   ],
		// 		  'serviceFeeAmount' =>'1'
		// 		   ]);

		// 		$result = $gateway->transaction()->sale([
		//   'amount' => '10.00',
		//   'paymentMethodNonce' => 'fake-valid-nonce',
		//   'deviceData' => $deviceDataFromTheClient,
		//   'options' => [
		//     'submitForSettlement' => True
		//   ]
		// ]);
				   


		if ($result->success) {
		    // print_r("success!: " . $result->transaction->id);
            $this->session->set_flashdata('success', 'Payment proceed successfully.');
		    $data['result'] = $result->transaction->id;
			$result1 = $gateway->transaction()->holdInEscrow($result->transaction->id);
			print_r($result1); die();

		} else if ($result->transaction) {
		    print_r("Error processing transaction:");
		    print_r("\n  code: " . $result->transaction->processorResponseCode);
		    print_r("\n  text: " . $result->transaction->processorResponseText);
		} else {
		    foreach($result->errors->deepAll() AS $error) {
		      print_r($error->code . ": " . $error->message . "\n");
		    }
		}	
		
        $this->load->view('front/order-success', $data);
    }

    function updateItemQty(){
        $update = 0;        
        // Get cart item info
        $rowid = $this->input->get('rowid');
        $qty   = $this->input->get('qty');        
        // Update item in the cart
        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }        
        // Return response
        echo $update?'ok':'err';
    }
    
    function removeItem($rowid){
        // Remove item from cart
        $remove = $this->cart->remove($rowid);        
        // Redirect to the cart page
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Add Favorite start
	function add_favorite(){
		if (!empty($this->input->post())) {			
			$data  = array(
				'user_id'    => $this->input->post('favId'),
				'product_id' => $this->input->post('proId')
			);
			$dataInsert = $this->Admin_model->insert('tbl_favorites',$data);
			if($dataInsert > 0){
				$this->session->set_flashdata('success','Add to favorites Successfully. !!');
			}else{
				$this->session->set_flashdata('error','Something went wrong. !!');
			}
		}else{
				$this->session->set_flashdata('error','Something went wrong. !!');
		}		
	}

	function insert_favorite($id){
	    if (!is_numeric($id)) {
	        exit;
	    }
	    $uid = user_details()->id;
	    $this->db->where('product_id', $id);
	    $this->db->where('user_id', $uid);
	    $row = $this->db->get('tbl_favorites')->row();
	    //There is a previous value
	    if ($row) {
	        $this->db->where('product_id', $row->product_id);
	        $this->db->where('user_id', $uid);           
	        $this->db->delete('tbl_favorites');
	        echo json_encode(array('result' => 'exists'));
	    }
   		else {
        $favData = array(
            'product_id' => $id,
            'user_id'    => $uid,
            'created_at' => date('Y-m-d h:i:s')
         );
        $this->db->insert('tbl_favorites', $favData);
        echo json_encode(array('result' => 'new'));
    	}
	}
	// Add Favorite End

	function insert_seller($id){
	    if (!is_numeric($id)) {
	        exit;
	    }
	    $uid = user_details()->id;
	    $this->db->where('seller_id', $id);
	    $this->db->where('user_id', $uid);
	    $row = $this->db->get('tbl_saved_seller')->row();
	    //There is a previous value
	    if ($row) {
	        $this->db->where('seller_id', $row->seller_id);
	        $this->db->where('user_id', $uid);           
	        $this->db->delete('tbl_saved_seller');
	        echo json_encode(array('result' => 'exists'));
	    }
   		else {
        $favData = array(
            'seller_id'  => $id,
            'user_id'    => $uid,
            'created_at' => date('Y-m-d h:i:s')
         );
        $this->db->insert('tbl_saved_seller', $favData);
        echo json_encode(array('result' => 'new'));
    	}
	}

	public function my_saved_seller(){
		if(!is_logged_in()){
			redirect("userlogin");
		}
		$data['title'] = 'My-Saved-Seller';
		$id = user_details()->id;
		$this->load->view('front/saved-seller',$data);
	}	

	public function table_filter_saved_seller($page_id = null){
		$this->output->set_content_type('application/json');
		$id = user_details()->id;  	
		$ttl_rows         	= $this->db->select('u.*')
										->from('tbl_saved_seller s')
										->join('users u','u.id  = s.seller_id')		
										->where(['s.user_id' => $id])
										->get()->result_array();
		$data['ttl_rows'] 	= count($ttl_rows);
		$data['per_page'] 	= $per_page = 4;
		$data['total_page'] = ceil(count($ttl_rows)/$per_page);
		if(empty($page_id)){
			$page_id     	= 0;
		}
		$data['page_id'] 	= $page_id;
		$data['users']		= $this->home_model->getSavedSeller($id,$per_page, $page_id);
		$i = 0; 
		$content_wrapper = $this->load->view('front/table_filter_saved_seller', $data, true);
		$content_wrapper_pagination = $this->load->view('front/table_filter_saved_seller_pagination', $data, true);
		$this->output->set_output(json_encode(['content_wrapper' => $content_wrapper, 'content_wrapper_pagination' => $content_wrapper_pagination]));
		return FALSE;
	}

	function braintree_payment(){
    	$data['title'] = 'Braintree Payment';
    	$this->load->view('front/braintree-payment',$data);
    }

    public function remove_seller($id = null){
	    $id = $this->uri->segment('3');
	    $this->home_model->remove_seller($id);
	    redirect($_SERVER['HTTP_REFERER']);	    
	}

	// marketplace
	public function marketplace(){
		$data['title']    = "Marketplace Here !!";
		
		$data['qualities']= $this->home_model->getQualitiesMarketplace();
		$data['cities']   = $this->home_model->getCitiesMarketplace();
 		//$data['cats']     = $this->home_model->getCatsMarketplace();
    	//$data['subcats']  = $this->home_model->getSubcatsMarketplace();
    	$data['ads']      = $this->home_model->getAdsMarketplace();
     	//$data['cats'] = $this->db->get('services')->result();
     	
		$this->load->view('front/header');
		$this->load->view('front/marketplace',$data);
		$this->load->view('front/footer');
	}

	public function product_filter_marketplace($page_id = null){
		$this->output->set_content_type('application/json');
		$ttl_rows         = $this->home_model->getProductFilterMarketplace();
		$data['ttl_rows'] = count($ttl_rows);
		$data['per_page'] = $per_page = 9;
		$data['total_page'] = ceil(count($ttl_rows)/$per_page);
		if(empty($page_id)){
			$page_id     = 0;
		}
		$data['page_id'] = $page_id;
		$data['products']= $this->home_model->getProductFilterMarketplace($per_page, $page_id);
		$i = 0; 
		$content_wrapper = $this->load->view('front/product_filter_marketplace', $data, true);
		$content_wrapper_pagination = $this->load->view('front/product_filter_marketplace_pagination', $data, true);
		$this->output->set_output(json_encode(['content_wrapper' => $content_wrapper, 'content_wrapper_pagination' => $content_wrapper_pagination]));
		return FALSE;
	}
    
    // marketplace_list
	public function marketplace_list(){
		$data['title']    = "Marketplace Here !!";
		$data['qualities']= $this->home_model->getQualitiesMarketplace();
		$data['cities']   = $this->home_model->getCitiesMarketplace();
		//$data['cats']     = $this->home_model->getCatsMarketplace();
		$data['subcats']  = $this->home_model->getSubcatsMarketplace();
		$data['ads']      = $this->home_model->getAdsMarketplace();
		$this->load->view('front/header',$data);
		$this->load->view('front/marketplace-list');
		$this->load->view('front/footer');
	}

	public function product_filter_marketplace_list($page_id = null){
		$this->output->set_content_type('application/json');
		$ttl_rows         = $this->home_model->getProductFilterMarketplace();
		$data['ttl_rows'] = count($ttl_rows);
		$data['per_page'] = $per_page = 9;
		$data['total_page'] = ceil(count($ttl_rows)/$per_page);
		if(empty($page_id)){
			$page_id     = 0;
		}
		$data['page_id'] = $page_id;
		$data['products']= $this->home_model->getProductFilterMarketplace($per_page, $page_id);
		$i = 0; 
		$content_wrapper = $this->load->view('front/product_filter_marketplace_list', $data, true);
		$content_wrapper_pagination = $this->load->view('front/product_filter_marketplace_list_pagination', $data, true);
		$this->output->set_output(json_encode(['content_wrapper' => $content_wrapper, 'content_wrapper_pagination' => $content_wrapper_pagination]));
		return FALSE;
	}

	public function selling(){
		if(!is_logged_in()){
			redirect("userlogin");
		}
		$data['title'] = 'Selling';
		// $id = user_details()->id;
		// $data['users'] = $this->front_model->getSoldItems($id);
		$this->load->view('front/dashboard-my-selling',$data);
	}

	public function table_filter_selling($page_id = null){
		$this->output->set_content_type('application/json');
		$id = user_details()->id;  	
		$ttl_rows         	= $this->front_model->getSoldItems($id);
		$data['ttl_rows'] 	= count($ttl_rows);
		$data['per_page'] 	= $per_page = 4;
		$data['total_page'] = ceil(count($ttl_rows)/$per_page);
		if(empty($page_id)){
			$page_id     	= 0;
		}
		$data['page_id'] 	= $page_id;
		$data['users']		= $this->front_model->getSoldItems($id,$per_page, $page_id);
		$i = 0; 
		$content_wrapper = $this->load->view('front/table_filter_selling', $data, true);
		$content_wrapper_pagination = $this->load->view('front/table_filter_selling_pagination', $data, true);
		$this->output->set_output(json_encode(['content_wrapper' => $content_wrapper, 'content_wrapper_pagination' => $content_wrapper_pagination]));
		return FALSE;
	}
    
    public function my_subscription(){
		if(!is_logged_in()){
			redirect("userlogin");
		}
		$data['title']   = 'My-Subscription';
		$data['subs_id'] = user_details()->subscription_id;
		$data['subscriptions']=$this->db->get_where('tbl_subscriptions',array('status'=>1))->result();
		$this->load->view('front/my-subscription',$data);
	}	

	public function addReview(){
		// if(!is_logged_in()){
		// 	redirect("userlogin");
		// }
		$list     = $this->input->post();
		$this->db->insert('reviews',$list);
		$listid   = $this->db->insert_id();	
		if ($listid > 0) { 				
			$this->session->set_flashdata('success','Add Review Successfully');
			redirect($_SERVER['HTTP_REFERER']); 
		}else{
			$this->session->set_flashdata('error','Something went wrong!!');
			redirect($_SERVER['HTTP_REFERER']);
		}  
	}

	//User Feedback
	public function feedback(){
		$data['title'] = 'User Feedback';
		$this->load->view('front/feedback');
	}

	//payment-test page
	public function payment_test(){
		$this->load->view('front/payment-test');
	}

	//payment-test1 page
	public function payment_test1(){
		error_reporting(0);
        include APPPATH.'third_party/Braintree/Braintree.php';
		$config = new Braintree\Configuration([
		    'environment' => 'sandbox',
		    'merchantId'  => 'bdkn8m9hwn48jmn2',
		    'publicKey'   => 'zv5hpv4yqwk5ffz3',
		    'privateKey'  => 'e75b02ebc390d21329a78d122e1f79e4'
		]);
		$gateway     = new Braintree\Gateway($config);
		$data['clientToken'] = $gateway->ClientToken()->generate();
		// $data['result'] = $gateway->paymentMethodNonce()->create('post');
		// $nonce = $result->paymentMethodNonce->nonce;
		// print_r($clientToken);die;
		$result             = $gateway->customer()->create([
			    'firstName' => 'Mike',
			    'lastName'  => 'Jones',
			    'company'   => 'Jones Co.',
			    'email'     => 'mike.jones@example.com',
			    'phone'     => '281.330.8004',
			    'fax'       => '419.555.1235',
			    'website'   => 'http://example.com'
				]);
				$result->success;
				# true
				$data['test'] = $result->customer->id;
				# Generated customer id
		$this->load->view('front/payment-test1',$data);
	}

	public function checkout_test(){
		$this->load->view('front/checkout-test');
	}

	public function checkout_test_demo(){
		$this->load->view('front/checkout-test-demo');
	}

	public function payment_options(){
		$this->load->view('front/payment-options');
	}

	public function braintree_3D_secure_payment(){
		$this->load->view('front/braintree/braintree_3D_secure_demo');
	}

	public function braintree_custom_integration_payment(){
		if(!is_logged_in()){
			redirect("userlogin");
		}
        $id = user_details()->id; 
        if($this->cart->total_items() <= 0){
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        // If order request is submitted
        $data['user'] = $this->front_model->getBuyerDetails($id);        
        // $submit = $this->input->post('placeOrder');
		$this->load->view('front/braintree/braintree_custom_integration_demo',$data);
	}

	public function braintree_dropin_payment(){
		$this->load->view('front/braintree/braintree_dropin_demo');
	}

	public function braintree_dropin_with_3d_secure_payment(){
		$this->load->view('front/braintree/braintree_dropin_with_3d_secure_demo');
	}

	public function braintree_hosted_fields_payment(){
		$this->load->view('front/braintree/braintree_hosted_fields_demo');
	}

	public function braintree_hosted_fields_with_3d_secure_payment(){
		$this->load->view('front/braintree/braintree_hosted_fields_with_3d_secure_demo');
	}

	public function braintree_hosted_fields_with_style_payment(){
		$this->load->view('front/braintree/braintree_hosted_fields_with_style_demo');
	}





}


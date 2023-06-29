<?php
class Admin_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function featured_ads() {
        $query = $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->limit('3')
                        ->order_by('date(listing.created_on)','desc')
                        ->get('listing'); 
        return $query->result();
    }

    public function show_list (){
        $this->db->where("ad_type_id", '2');
        $query = $this->db->get('listing');
        return $query->result();  
    }

    public function show_list_approve_buy(){         
        return $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->where(['listing.status'=>'1','listing.ad_type_id'=>'1'])
                        ->order_by('date(listing.created_on)','desc')
                        ->get('listing')->result();
    }

    public function show_list_pending_buy(){         
        return $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->where(['listing.status'=>'0','listing.ad_type_id'=>'1'])
                        ->order_by('date(listing.created_on)','desc')
                        ->get('listing')->result();
    }

    public function show_list_approve_sell(){  
     return $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->where(['listing.status'=>'1','listing.ad_type_id'=>'2'])
                        ->order_by('date(listing.created_on)','desc')
                        ->get('listing')->result();        
    }   

    public function show_list_pending_sell(){         
        return $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->where(['listing.status'=>'0','listing.ad_type_id'=>'2'])
                        ->order_by('date(listing.created_on)','desc')
                        ->get('listing')->result();        
    }

    public function show_list_approve_marketplace(){  
     return $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->where(['listing.status'=>'1','listing.ad_type_id'=>'5'])
                        ->order_by('date(listing.created_on)','desc')
                        ->get('listing')->result();        
    }   

    public function show_list_pending_marketplace(){         
        return $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->where(['listing.status'=>'0','listing.ad_type_id'=>'5'])
                        ->order_by('date(listing.created_on)','desc')
                        ->get('listing')->result();        
    }    

    public function show_list_approve_auction(){         
        return $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->where(['listing.status'=>'1','listing.ad_type_id'=>'3'])
                        ->order_by('date(listing.created_on)','desc')
                        ->get('listing')->result();
    }

    public function show_list_pending_auction(){         
        return $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->where(['listing.status'=>'0','listing.ad_type_id'=>'3'])
                        ->order_by('date(listing.created_on)','desc')
                        ->get('listing')->result();
    }

    public function show_list_approve_rent(){         
        return $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->where(['listing.status'=>'1','listing.ad_type_id'=>'4'])
                        ->order_by('date(listing.created_on)','desc')
                        ->get('listing')->result();
    }

    public function show_list_pending_rent(){         
        return $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->where(['listing.status'=>'0','listing.ad_type_id'=>'4'])
                        ->order_by('date(listing.created_on)','desc')
                        ->get('listing')->result();
    }

    public function show_list_approved_users(){         
        return $this->db->get_where('users',array('status'=>1,'role'=>3))->result();
    }

    public function show_list_pending_users(){         
        return $this->db->get_where('users',array('status'=>0,'role'=>3))->result();       
    }

    public function show_list_approved_customers(){         
        return $this->db->get_where('tbl_customer',array('status'=>1,'role'=>2))->result();
    }

    public function show_list_pending_customers(){         
        return $this->db->get_where('tbl_customer',array('status'=>0,'role'=>2))->result();       
    }

    public function show_list_replied_queries(){         
        return $this->db->get_where('tbl_contact_us',array('status'=>1))->result();
    }

    public function show_list_pending_queries(){         
        return $this->db->get_where('tbl_contact_us',array('status'=>0))->result();       
    }

    public function displayrecordsById($id){
	     $query = $this->db->query("select * from `listing` where id='".$id."'");
	     return $query->result();
	}

    public function update_list($n,$d,$p,$id){
	     $query = $this->db->query("update `listing` SET name='$n',description='$d',price='$p' where id='".$id."'");
	}	
   
    function delete_list($id) {
      $this->db->where('id', $id);
      $del = $this->db->delete('listing');   
      return $del;
    }

    public function ads_delete_list($id) {
        $this->db->where('id', $id);
        $del=$this->db->delete('listing');   
        return $del;
    }
    public function delete($table,$table_id,$column_id){
        $this->db->where($table_id,$column_id);
        $del = $this->db->delete($table);
        return $del;
    }

    public function ads_delete_list_test($id) {
        // $this->db->from("listing");
        // $this->db->join("ad_images", "listing.id = ad_images.ad_list_id");
        $this->db->where("listing.id", $id);
        $query = $this->db->delete("listing");
        return $query;
    }

    public function delete_product($id){
        if ($this->db->delete("listing", "id = ".$id)) 
        {
        return true;
        }
    }

    public function show_list1(){
         $this->db->where("ad_type_id",'1');
        $query = $this->db->get('listing');
        return $query->result();
    }  

    public function show_list2(){
        $this->db->where("ad_type_id",'3');
        $query = $this->db->get('listing');
        return $query->result();
    }

    public function show_list3(){
        $this->db->where("ad_type_id",'4');
        $query = $this->db->get('listing');
        return $query->result();        
    }

  public function show_list4(){
      $query = $this->db->get('listing');
      return $query->result();      
  }

  public function show_list5(){
      $query = $this->db->get('listing');
      return $query->result();
  }
  
  function update_status(){
    $id=$_REQUEST['id'];
    $svalue=$_REQUEST['svalue'];
    if ($svalue == '1') {
        $status = '0';
    } else {
        $status = '1';
    }
    $data = array(
        'status' => $status
    );
    $this->db->where('id',$id);
    return $this->db->update('listing',$data);      
  }

  function update_user_status(){
    $id=$_REQUEST['id'];
    $svalue=$_REQUEST['svalue'];
    if ($svalue == '1') {
        $status = '0';
    } else {
        $status = '1';
    }
    $data = array(
        'status' => $status
    );
    $this->db->where('id',$id);
    return $this->db->update('users',$data);      
  }

  function update_customer_status(){
    $id=$_REQUEST['id'];
    $svalue=$_REQUEST['svalue'];
    if ($svalue == '1') {
        $status = '0';
    } else {
        $status = '1';
    }
    $data = array(
        'status' => $status
    );
    $this->db->where('id',$id);
    return $this->db->update('tbl_customer',$data);      
  }

  function update_subscription_status(){
    $id     = $_REQUEST['id'];
    $svalue = $_REQUEST['svalue'];
    if ($svalue == '1') {
        $status = '0';
    } else {
        $status = '1';
    }
    $data = array(
        'status' => $status
    );
    $this->db->where('id',$id);
    return $this->db->update('tbl_subscriptions',$data);      
  }

  function update_category_status(){
    $id     = $_REQUEST['id'];
    $svalue = $_REQUEST['svalue'];
    if ($svalue == '1') {
        $status = '0';
    } else {
        $status = '1';
    }
    $data = array(
        'status' => $status
    );
    $this->db->where('id',$id);
    return $this->db->update('services',$data);      
  }

  function update_sub_category_status(){
    $id     = $_REQUEST['id'];
    $svalue = $_REQUEST['svalue'];
    if ($svalue == '1') {
        $status = '0';
    } else {
        $status = '1';
    }
    $data = array(
        'status' => $status
    );
    $this->db->where('id',$id);
    return $this->db->update('sub_services',$data);      
  }

  function update_query_status(){
    $id     = $_REQUEST['id'];
    $svalue = $_REQUEST['svalue'];
    if ($svalue == '1') {
        $status = '0';
    } else {
        $status = '1';
    }
    $data = array(
        'status' => $status
    );
    $this->db->where('id',$id);
    return $this->db->update('tbl_contact_us',$data);      
  }

  public function add_category(){      
      $data     = array(
            'name'  => $_POST['name'],
            'image' => $file_data['upload_data']['file_name']);
      return $this->db->insert('services', $data); 
  }

  public function image_uploads($tempFile, $fileName, $targetPath){
        $targetFile = $targetPath . $fileName;
        $data = move_uploaded_file($tempFile, $targetFile);
        if($data){
            return true;
        }else{
            return false;
        }
    }

    public function update($table,$data,$table_id,$update_id){
        $this->db->where($table_id,$update_id);
        $this->db->update($table,$data);
        return true;
    }

    public function insert($table,$data){
        $this->db->insert($table,$data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function getUserActivity($id){
        $this->db->select('l.*,s.name as service_name,ss.name as ss_name,a.name as ad_type');
        $this->db->from('listing l');
        $this->db->join('ad_type a', 'a.id = l.ad_type_id');
        $this->db->join('services s', 's.id = l.service_id');
        $this->db->join('sub_services ss','ss.id = l.sub_service_id');
        $this->db->where(['l.user_id' => $id, 's.status' => '1','ss.status' => '1','a.status'=>'1']);
        $query = $this->db->get();
        return $query->result();
    }

    public function getOrders(){
        $this->db->select("u.name,o.*,count(i.order_id) as count");
        $this->db->from('orders o');
        $this->db->join('order_items i','i.order_id = o.id');
        $this->db->join('users u','u.id = o.customer_id');
        $this->db->order_by('o.id','desc');
        $this->db->group_by('o.customer_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getOrderByUser($id){
        $this->db->select("l.name,l.price,l.image,i.*,o.status");
        $this->db->from('orders o');
        $this->db->join('order_items i','i.order_id = o.id');
        $this->db->join('listing l','l.id = i.product_id');
        $this->db->order_by('i.id','desc');
        $this->db->where(['o.customer_id' => $id]);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBids(){
        $this->db->select("u.name,b.*,count(b.product_id) as count");
        $this->db->from('tbl_bids b');
        $this->db->join('users u','u.id = b.user_id');
        $this->db->order_by('b.id','desc');
        $this->db->group_by('b.user_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBidByUser($id){
        $this->db->select("l.name,l.price as value,l.image,b.*");
        $this->db->from('tbl_bids b');
        $this->db->join('listing l','l.id = b.product_id');
        $this->db->order_by('b.id','desc');
        $this->db->where(['b.user_id' => $id]);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTodayOrders(){
        $this->db->select("u.name,o.*,count(i.order_id) as count");
        $this->db->from('orders o');
        $this->db->join('order_items i','i.order_id = o.id');
        $this->db->join('users u','u.id = o.customer_id');
        $this->db->order_by('o.id','desc');
        $this->db->group_by('o.customer_id');
        $this->db->like(['o.created' => date('Y-m-d')]);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTodayOrderByUser($id){
        $this->db->select("l.name,l.price,l.image,i.*,o.status");
        $this->db->from('orders o');
        $this->db->join('order_items i','i.order_id = o.id');
        $this->db->join('listing l','l.id = i.product_id');
        $this->db->order_by('i.id','desc');
        $this->db->where(['i.order_id' => $id]);       
        $this->db->like(['o.created' => date('Y-m-d')]);
        $query = $this->db->get();
        return $query->result_array();
    }

    function update_order_status(){
        $id     = $_REQUEST['id'];
        $svalue = $_REQUEST['svalue'];
        if ($svalue == '0') {
            $status = '1';
        }elseif($svalue == '1') {
            $status = '2';
        } else {
            $status = '0';
        }
        $data = array(
            'status' => $status
        );
        $this->db->where('id',$id);
        return $this->db->update('orders',$data);      
    }

    function update_review_status(){
        $id     = $_REQUEST['id'];
        $svalue = $_REQUEST['svalue'];
        if ($svalue == '0') {
            $status = '1';
        }elseif($svalue == '1') {
            $status = '2';
        } else {
            $status = '0';
        }
        $data = array(
            'status' => $status
        );
        $this->db->where('id',$id);
        return $this->db->update('reviews',$data);      
    }

    public function getRecentAds(){
        $this->db->select("l.*,a.name as ad_type,s.name as service_name");
        $this->db->from('listing l');
        $this->db->join('ad_type a','a.id = l.ad_type_id');
        $this->db->join('services s','s.id = l.service_id');
        $this->db->order_by('l.id','desc');
        $this->db->limit('5');
        $query = $this->db->get();
        return $query->result();
    }

    public function getReviews(){
        $this->db->select("r.*,l.name as product_name,a.name as ad_type,s.name as service_name");
        $this->db->from('listing l');
        $this->db->join('ad_type a','a.id = l.ad_type_id');
        $this->db->join('services s','s.id = l.service_id');
        $this->db->join('reviews r','r.product_id = l.id');
        $this->db->order_by('r.id','desc');
        $query = $this->db->get();
        return $query->result();
    }

    function update_ads_type_status(){
        $id     = $_REQUEST['id'];
        $svalue = $_REQUEST['svalue'];
        if ($svalue == '1') {
            $status = '0';
        } else {
            $status = '1';
        }
        $data = array(
            'status' => $status
        );
        $this->db->where('id',$id);
        return $this->db->update('ad_type',$data);      
    }

    function update_front_ads_status(){
        $id     = $_REQUEST['id'];
        $svalue = $_REQUEST['svalue'];
        if ($svalue == '1') {
            $status = '0';
        } else {
            $status = '1';
        }
        $data = array(
            'status' => $status
        );
        $this->db->where('id',$id);
        return $this->db->update('tbl_front_ads',$data);      
    }


  
}
?>

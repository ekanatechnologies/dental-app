<?php
class Front_model extends CI_Model {

    protected $table = 'listing';

    public function __construct() {
        parent::__construct();
          // $this->load->helper('url');

    }

    public function get_count() {
        return $this->db->count_all($this->table);
    }

    public function get_lists_B($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function multiple_images($image = array()){
     return $this->db->insert('ad_images',$image);
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
    
    public function get_lists($limit, $start) {
        $this->db->select('services.name as service_name, listing.*')
	             ->join('services','services.id=listing.service_id')
	             ->limit($limit, $start);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function featured_ads() {
        return $query = $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->limit('5')
                        ->where(['listing.status'=>'1'])
                        ->order_by('date(listing.created_on)','desc')
                        ->get('listing')->result();        
    }

    public function featured_ads1() {
        return $query = $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->limit('3')
                        ->where(['listing.status'=>'1'])
                        ->order_by('date(listing.created_on)','desc')
                       ->get('listing')->result();        
    }

    public function featured_ads2() {
        return $query = $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->limit('3','6')
                        ->where(['listing.status'=>'1'])                        
                        ->order_by('date(listing.created_on)','desc')
                       ->get('listing')->result();        
    }

    public function featured_ads3() {
        return $query = $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->limit('6','9')
                        ->where(['listing.status'=>'1'])                        
                        ->order_by('date(listing.created_on)','desc')
                        ->get('listing')->result();        
    }

    public function act_buy_ads() {
        return $query = $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->order_by('date(listing.created_on)','desc')
                        ->where(['ad_type_id'=>'1','listing.status'=>'1'])->limit('8')
                        ->get('listing')->result();        
    }

    public function act_sell_ads() {
        return $query = $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->order_by('date(listing.created_on)','desc')
                        ->where(['ad_type_id'=>'2','listing.status'=>'1'])->limit('8')
                        ->get('listing')->result();        
    }

    public function act_auction_ads() {
        return $query = $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->order_by('date(listing.created_on)','desc')
                        ->where(['ad_type_id'=>'3','listing.status'=>'1'])->limit('8')
                        ->get('listing')->result();        
    }

    public function act_marketplace_ads() {
        return $query = $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->order_by('date(listing.created_on)','desc')
                        ->where(['ad_type_id'=>'5','listing.status'=>'1'])->limit('8')
                        ->get('listing')->result();        
    }

    public function act_rent_ads() {
        return $query = $this->db->select('services.name as service_name, listing.*')
                        ->join('services','services.id=listing.service_id')
                        ->order_by('date(listing.created_on)','desc')
                        ->where(['ad_type_id'=>'4','listing.status'=>'1'])
                        ->get('listing')->result();        
    }

    public function delete($table,$table_id,$column_id){
        $this->db->where($table_id,$column_id);
        $this->db->delete($table);
        return true;
    }

    public function delete_post($id){
        if ($this->db->delete("listing", "id = ".$id)) 
        {
        return true;
        }
    }

    function insert_favorite($id){
        $favData = array(
            'job_id' => $id,
            'uid'    => $this->session->userdata('user_id')
        );
        $this->db->insert('job_favorites', $favData);
    }

    public function getBuyerDetails($id){
        $this->db->select('u.*,a.city,a.country,a.street,a.locality,a.pincode');
        $this->db->from('users u');
        $this->db->join('tbl_address a', 'a.user_id = u.id');
        $this->db->where(['u.id' => $id, 'u.status' => '1','a.status' => '1']);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getSoldItems($id){
        return $this->db->select('l.*,s.name as service_name,ss.name as ss_name')
            ->from('listing l')
            ->join('services s', 's.id = l.service_id')
            ->join('sub_services ss','ss.id = l.sub_service_id')
            ->join('order_items i','i.product_id = l.id')
            ->where(['l.user_id' => $id, 's.status' => '1','ss.status' => '1'])
            ->get()->result_array();
    }

    //funtion to get email of user to send password
    public function ForgotPassword($email){
            $this->db->select('email');
            $this->db->from('users'); 
            $this->db->where('email', $email); 
            $query=$this->db->get();
            return $query->row_array();
    }

    public function sendpassword($data) {
        $email  = $data['email'];
        $query1 = $this->db->query("SELECT * from users where email = '".$email."' ");
        $row    = $query1->result_array();
            if ($query1->num_rows() > 0) {
                $passwordplain  = "";
                $passwordplain  = rand(99999999,999999999);
                $newpass['password'] = md5($passwordplain);
                $this->db->where('email', $email);
                $this->db->update('users', $newpass); 

                $mail_message ='Dear '.$row[0]['name'].','. "\r\n";
                $mail_message.='Thanks for contacting regarding to forgot password,'."\r\n".'Your Password is '.$passwordplain."\r\n";
                $mail_message.='Please Update your password.'."\r\n";
                $mail_message.='Thanks & Regards';
                // $mail_message.='Your company name'; 
                 
                $user_email = $row[0]['email'];
                if((!strcmp($email, $user_email))){                 
                    /*Mail Code*/
                    $to = $user_email;
                    $subject = "Password";
                    $txt = $mail_message;
                    $headers = "From: password@example.com" . "\r\n" ."CC: ifany@example.com";
                    mail($to,$subject,$txt,$headers);
                    }else{
                    $this->session->set_flashdata('error','Failed to send password, please try again!');
                    redirect(base_url(),'refresh');        
                    }
            }else{  
                $this->session->set_flashdata('error','Email not found try again!');
                redirect(base_url().'forgotpassword','refresh');
            }    
    }




}
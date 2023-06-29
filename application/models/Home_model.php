<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{
    
    public function login($email, $password){
        $this->db->where('admin_email', $email);
        $this->db->where('admin_password', md5($password));
        $this->db->where('status', 'Active');
        $query = $this->db->get('tbl_admin');
        if($query->num_rows() == 1) {
            return $query->row();
        }
        return false;
    }

    public function getUserAds1($id){        
        return $query = $this->db->where('user_id',$id)->get('listing')->result_array();         
    }

    public function getUserAds($id){
        $this->db->select('l.*,s.name as service_name,ss.name as ss_name');
        $this->db->from('listing l');
        $this->db->join('services s', 's.id = l.service_id');
        $this->db->join('sub_services ss','ss.id = l.sub_service_id');
        $this->db->where(['l.user_id' => $id, 's.status' => '1','ss.status' => '1']);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getUserFavoriteAds($id){
        $this->db->select('*');
        $this->db->from('tbl_favorites f');
        $this->db->join('listing l','l.id = f.product_id');        
        $this->db->where(['f.user_id' => $id]);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getColors(){
        $this->db->select('color, count(product_id) as count');
        $this->db->from('tbl_category c');
        $this->db->join('tbl_subcategory s', 's.cat_id = c.cat_id');
        $this->db->join('tbl_products p', 'p.subcat_id = s.subcat_id');
        $this->db->where(['p.status' => 'Active', 'c.status' => 'Active', 's.status' => 'Active']);
        $this->db->group_by(strtolower('color'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCities(){
        $this->db->select('p.city, count(p.id) as count');
        $this->db->from('services c');
        $this->db->join('sub_services s', 's.service_id = c.id');
        $this->db->join('listing p', 'p.sub_service_id = s.id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');
        $this->db->where(['p.status' => '1', 'c.status' => '1', 's.status' => '1','a.status' => '1']);
        $this->db->group_by(strtolower('city'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getQualities(){
        $this->db->select('p.quality, count(p.id) as count');
        $this->db->from('services c');
        $this->db->join('sub_services s', 's.service_id = c.id');
        $this->db->join('listing p', 'p.sub_service_id = s.id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');
        $this->db->where(['p.status' => '1', 'c.status' => '1', 's.status' => '1','a.status' => '1']);
        $this->db->group_by(strtolower('quality'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAdsBuySell(){
        $this->db->select('a.name as ad_name,p.ad_type_id,count(p.id) as count');
        $this->db->from('ad_type a');
        $this->db->join('listing p', 'p.ad_type_id = a.id');
        $this->db->where(['p.status' => '1', 'a.status' => '1']);
        $this->db->where_in('p.ad_type_id',array('1','2'));
        $this->db->group_by('p.ad_type_id');
        $this->db->group_by(strtolower('p.ad_type_id'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCitiesBuySell(){
        $this->db->select('p.city, count(p.id) as count');
        $this->db->from('services c');
        $this->db->join('sub_services s', 's.service_id = c.id');
        $this->db->join('listing p', 'p.sub_service_id = s.id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');
        $this->db->where(['p.status' => '1', 'c.status' => '1', 's.status' => '1','a.status' => '1']);
        $this->db->where_in('p.ad_type_id',array('1','2'));        
        $this->db->group_by(strtolower('city'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getQualitiesBuySell(){
        $this->db->select('p.quality, count(p.id) as count');
        $this->db->from('services c');
        $this->db->join('sub_services s', 's.service_id = c.id');
        $this->db->join('listing p', 'p.sub_service_id = s.id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');
        $this->db->where(['p.status' => '1', 'c.status' => '1', 's.status' => '1','a.status' => '1']);
        $this->db->where_in('p.ad_type_id',array('1','2'));        
        $this->db->group_by(strtolower('quality'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCatsBuySell(){
        $this->db->select('c.name as cat_name,c.id,p.service_id as cat_id, count(c.id) as count');
        $this->db->from('services c');
        $this->db->join('sub_services s', 's.service_id = c.id');
        $this->db->join('listing p', 'p.sub_service_id = s.id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');
        $this->db->where(['p.status' => '1', 'c.status' => '1','s.status' => '1','a.status' => '1']);
        $this->db->where_in('p.ad_type_id',array('1','2'));        
        $this->db->group_by('p.service_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSubcatsBuySell(){
        $this->db->select('s.name as subcat_name, p.sub_service_id as subcat_id, count(c.id) as count');
        $this->db->from('services c');
        $this->db->join('sub_services s', 's.service_id = c.id');
        $this->db->join('listing p', 'p.sub_service_id = s.id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');        
        $this->db->where(['p.status' => '1', 'c.status' => '1', 's.status' => '1','a.status' => '1']);
        $this->db->where_in('p.ad_type_id',array('1','2'));        
        $this->db->group_by('p.sub_service_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getProductFilterBuySell($limit = null, $page_id = null){
        $this->db->select('p.*,s.name as service_name');
        $this->db->from('listing p');
        $this->db->join('services s', 's.id = p.service_id');
        $this->db->join('sub_services ss', 'ss.id = p.sub_service_id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');        
        if(!empty($this->input->post('city'))){
            $this->db->where_in('p.city', explode(',', $this->input->post('city')));
        }
        if(!empty($this->input->post('quality'))){
            $this->db->where_in('p.quality', explode(',', $this->input->post('quality')));
        }
        if(!empty($this->input->post('cat'))) {
            $this->db->where_in('p.service_id', explode(',', $this->input->post('cat')));
        }
        if(!empty($this->input->post('subcat'))) {
            $this->db->where_in('p.sub_service_id', explode(',', $this->input->post('subcat')));
        }
        if(!empty($this->input->post('ad'))) {
            $this->db->where_in('p.ad_type_id', explode(',', $this->input->post('ad')));
        }         
        if(!empty($this->input->post('sort_by'))){
            if($this->input->post('sort_by') == '2'){
                $this->db->order_by('p.price', 'asc');    
            }if($this->input->post('sort_by') == '3'){
                $this->db->order_by('p.name', 'asc');    
            }
        }
        $this->db->where(['p.status' => '1', 'ss.status' => '1', 's.status' => '1','a.status'=>'1']);
        $this->db->where_in('p.ad_type_id',array('1','2'));        
        $this->db->get();
        $query = $this->db->last_query();
        if(!empty($limit)){
            if(!empty($page_id)){
                $page_id = $page_id-1;
            }
            $query .= " limit ".$page_id * $limit.",". $limit;
        }
        $query = $this->db->query($query);
        return $query->result_array();
    }

    public function getAds(){
        $this->db->select('a.name as ad_name,p.ad_type_id,count(p.id) as count');
        $this->db->from('ad_type a');
        $this->db->join('listing p', 'p.ad_type_id = a.id');
        $this->db->where(['p.status' => '1', 'a.status' => '1']);
        $this->db->group_by('p.ad_type_id');
        $this->db->group_by(strtolower('p.ad_type_id'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCats(){
        $this->db->select('c.name as cat_name,c.id,p.service_id as cat_id, count(c.id) as count');
        $this->db->from('services c');
        $this->db->join('sub_services s', 's.service_id = c.id');
        $this->db->join('listing p', 'p.sub_service_id = s.id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');
        $this->db->where(['p.status' => '1', 'c.status' => '1','s.status' => '1','a.status' => '1']);
        $this->db->group_by('c.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSubcats(){
        $this->db->select('s.name as subcat_name, p.sub_service_id as subcat_id, count(c.id) as count');
        $this->db->from('services c');
        $this->db->join('sub_services s', 's.service_id = c.id');
        $this->db->join('listing p', 'p.sub_service_id = s.id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');        
        $this->db->where(['p.status' => '1', 'c.status' => '1', 's.status' => '1','a.status' => '1']);
        $this->db->group_by('p.sub_service_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSizes(){
        $this->db->select('p.size, count(product_id) as count');
        $this->db->from('tbl_category c');
        $this->db->join('tbl_subcategory s', 's.cat_id = c.cat_id');
        $this->db->join('tbl_products p', 'p.subcat_id = s.subcat_id');
        $this->db->where(['p.status' => 'Active', 'c.status' => 'Active', 's.status' => 'Active']);
        $this->db->group_by('p.size');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPrices(){
        $this->db->select('min(p.price) as min_price, max(p.price) as max_price');
        $this->db->from('services c');
        $this->db->join('sub_services s', 's.service_id = c.id');
        $this->db->join('listing p', 'p.sub_service_id  = s.id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');        
        $this->db->where(['p.status' => '1', 'c.status' => '1', 's.status' => '1','a.status' =>'1']);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getProductFilter($limit = null, $page_id = null){
        $this->db->select('p.*,s.name as service_name');
        $this->db->from('listing p');
        $this->db->join('services s', 's.id = p.service_id');
        $this->db->join('sub_services ss', 'ss.id = p.sub_service_id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');
        if(!empty($this->input->post('city'))){
            $this->db->where_in('p.city', explode(',', $this->input->post('city')));
        }
        if(!empty($this->input->post('quality'))){
            $this->db->where_in('p.quality', explode(',', $this->input->post('quality')));
        }
        if(!empty($this->input->post('cat'))) {
            $this->db->where_in('p.service_id', explode(',', $this->input->post('cat')));
        }
        if(!empty($this->input->post('subcat'))) {
            $this->db->where_in('p.sub_service_id', explode(',', $this->input->post('subcat')));
        }
        if(!empty($this->input->post('ad'))) {
            $this->db->where_in('p.ad_type_id', explode(',', $this->input->post('ad')));
        }
        // if(!empty($this->input->post('size'))){
        //     $this->db->where_in('p.size', explode(',', $this->input->post('size')));
        // }
        if(!empty($this->input->post('sort_by'))){
            if($this->input->post('sort_by') == '2'){
                $this->db->order_by('p.price', 'asc');    
            }if($this->input->post('sort_by') == '3'){
                $this->db->order_by('p.name', 'asc');    
            }
        }
        // if(!empty($this->input->post('price'))){
        //     $price = explode('-', $this->input->post('price'));
        //     $this->db->where('p.price >=', trim($price['0']));
        //     $this->db->where('p.price <=', trim($price['1']));
        // }
        $this->db->where(['p.status' => '1', 's.status' => '1', 'ss.status' => '1','a.status' =>'1']);
        $this->db->get();
        $query = $this->db->last_query();
        if(!empty($limit)){
            if(!empty($page_id)){
                $page_id = $page_id-1;
            }
            $query .= " limit ".$page_id * $limit.",". $limit;
        }
        $query = $this->db->query($query);
        return $query->result_array();
    }

    public function getCitiesAuction(){
        $this->db->select('p.city, count(p.id) as count');
        $this->db->from('services c');
        $this->db->join('sub_services s', 's.service_id = c.id');
        $this->db->join('listing p', 'p.sub_service_id = s.id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');
        $this->db->where(['p.status' => '1', 'c.status' => '1', 's.status' => '1','a.status' => '1','p.ad_type_id' =>'3']);
        $this->db->group_by(strtolower('city'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getQualitiesAuction(){
        $this->db->select('p.quality, count(p.id) as count');
        $this->db->from('services c');
        $this->db->join('sub_services s', 's.service_id = c.id');
        $this->db->join('listing p', 'p.sub_service_id = s.id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');
        $this->db->where(['p.status' => '1', 'c.status' => '1', 's.status' => '1','a.status' => '1','p.ad_type_id' =>'3']);
        $this->db->group_by(strtolower('quality'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAdsAuction(){
        $this->db->select('a.name as ad_name,p.ad_type_id,count(p.id) as count');
        $this->db->from('ad_type a');
        $this->db->join('listing p', 'p.ad_type_id = a.id');
        $this->db->where(['p.status' => '1', 'a.status' => '1','p.ad_type_id'=>'3']);
        $this->db->group_by('p.ad_type_id');
        $this->db->group_by(strtolower('p.ad_type_id'));
        $query = $this->db->get();
        return $query->result_array();
    }    

    public function getCatsAuction(){
        $this->db->select('c.name as cat_name,c.id,p.service_id as cat_id, count(c.id) as count');
        $this->db->from('services c');
        $this->db->join('sub_services s', 's.service_id = c.id');
        $this->db->join('listing p', 'p.sub_service_id = s.id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');
        $this->db->where(['p.status' => '1', 'c.status' => '1','s.status' => '1','a.status' => '1','p.ad_type_id' =>'3']);
        $this->db->group_by('p.service_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSubcatsAuction(){
        $this->db->select('s.name as subcat_name, p.sub_service_id as subcat_id, count(c.id) as count');
        $this->db->from('services c');
        $this->db->join('sub_services s', 's.service_id = c.id');
        $this->db->join('listing p', 'p.sub_service_id = s.id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');        
        $this->db->where(['p.status' => '1', 'c.status' => '1', 's.status' => '1','a.status' => '1','p.ad_type_id' =>'3']);
        $this->db->group_by('p.sub_service_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getProductFilterAuction($limit = null, $page_id = null){
        $this->db->select('p.*,s.name as service_name');
        $this->db->from('listing p');
        $this->db->join('services s', 's.id = p.service_id');
        $this->db->join('sub_services ss', 'ss.id = p.sub_service_id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');        
        if(!empty($this->input->post('city'))){
            $this->db->where_in('p.city', explode(',', $this->input->post('city')));
        }
        if(!empty($this->input->post('quality'))){
            $this->db->where_in('p.quality', explode(',', $this->input->post('quality')));
        }
        if(!empty($this->input->post('cat'))) {
            $this->db->where_in('p.service_id', explode(',', $this->input->post('cat')));
        }
        if(!empty($this->input->post('subcat'))) {
            $this->db->where_in('p.sub_service_id', explode(',', $this->input->post('subcat')));
        }
        if(!empty($this->input->post('ad'))) {
            $this->db->where_in('p.ad_type_id', explode(',', $this->input->post('ad')));
        }         
        if(!empty($this->input->post('sort_by'))){
            if($this->input->post('sort_by') == '2'){
                $this->db->order_by('p.price', 'asc');    
            }if($this->input->post('sort_by') == '3'){
                $this->db->order_by('p.name', 'asc');    
            }
        }
        $this->db->where(['p.status' => '1', 'ss.status' => '1', 's.status' => '1','a.status'=>'1','p.ad_type_id' => '3']);
        $this->db->get();
        $query = $this->db->last_query();
        if(!empty($limit)){
            if(!empty($page_id)){
                $page_id = $page_id-1;
            }
            $query .= " limit ".$page_id * $limit.",". $limit;
        }
        $query = $this->db->query($query);
        return $query->result_array();
    }

    public function getAdsMarketplace(){
        $this->db->select('a.name as ad_name,p.ad_type_id,count(p.id) as count');
        $this->db->from('ad_type a');
        $this->db->join('listing p', 'p.ad_type_id = a.id');
        $this->db->where(['p.status' => '1', 'a.status' => '1','p.ad_type_id'=>'5']);
        $this->db->group_by('p.ad_type_id');
        $this->db->group_by(strtolower('p.ad_type_id'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCatsMarketplace(){
        $this->db->select('c.name as cat_name,c.id,p.service_id as cat_id, count(c.id) as count');
        $this->db->from('services c');
        $this->db->join('sub_services s', 's.service_id = c.id');
        $this->db->join('listing p', 'p.sub_service_id = s.id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');
        $this->db->where(['p.status' => '1', 'c.status' => '1','s.status' => '1','a.status' => '1','p.ad_type_id' =>'5']);
        $this->db->group_by('p.service_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSubcatsMarketplace(){
        $this->db->select('s.name as subcat_name, p.sub_service_id as subcat_id, count(c.id) as count');
        $this->db->from('services c');
        $this->db->join('sub_services s', 's.service_id = c.id');
        $this->db->join('listing p', 'p.sub_service_id = s.id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');        
        $this->db->where(['p.status' => '1', 'c.status' => '1', 's.status' => '1','a.status' => '1','p.ad_type_id' =>'5']);
        $this->db->group_by('p.sub_service_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCitiesMarketplace(){
        $this->db->select('p.city, count(p.id) as count');
        $this->db->from('services c');
        $this->db->join('sub_services s', 's.service_id = c.id');
        $this->db->join('listing p', 'p.sub_service_id = s.id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');
        $this->db->where(['p.status' => '1', 'c.status' => '1', 's.status' => '1','a.status' => '1','p.ad_type_id' =>'5']);
        $this->db->group_by(strtolower('city'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getQualitiesMarketplace(){
        $this->db->select('p.quality, count(p.id) as count');
        $this->db->from('services c');
        $this->db->join('sub_services s', 's.service_id = c.id');
        $this->db->join('listing p', 'p.sub_service_id = s.id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');
        $this->db->where(['p.status' => '1', 'c.status' => '1', 's.status' => '1','a.status' => '1','p.ad_type_id' =>'5']);
        $this->db->group_by(strtolower('quality'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getProductFilterMarketplace($limit = null, $page_id = null){
        $this->db->select('p.*,s.name as service_name');
        $this->db->from('listing p');
        $this->db->join('services s', 's.id = p.service_id');
        $this->db->join('sub_services ss', 'ss.id = p.sub_service_id');
        $this->db->join('ad_type a', 'a.id = p.ad_type_id');        
        if(!empty($this->input->post('city'))){
            $this->db->where_in('p.city', explode(',', $this->input->post('city')));
        }
        if(!empty($this->input->post('cat'))) {
            $this->db->where_in('p.service_id', explode(',', $this->input->post('cat')));
        }
        if(!empty($this->input->post('subcat'))) {
            $this->db->where_in('p.sub_service_id', explode(',', $this->input->post('subcat')));
        }
        if(!empty($this->input->post('ad'))) {
            $this->db->where_in('p.ad_type_id', explode(',', $this->input->post('ad')));
        }         
        if(!empty($this->input->post('sort_by'))){
            if($this->input->post('sort_by') == '2'){
                $this->db->order_by('p.price', 'asc');    
            }if($this->input->post('sort_by') == '3'){
                $this->db->order_by('p.name', 'asc');    
            }
        }
        $this->db->where(['p.status' => '1', 'ss.status' => '1', 's.status' => '1','a.status'=>'1','p.ad_type_id' => '5']);
        $this->db->get();
        $query = $this->db->last_query();
        if(!empty($limit)){
            if(!empty($page_id)){
                $page_id = $page_id-1;
            }
            $query .= " limit ".$page_id * $limit.",". $limit;
        }
        $query = $this->db->query($query);
        return $query->result_array();
    }    

    public function getProductFilterTable($id,$limit = null, $page_id = null){
        $this->db->select('l.*,s.name as service_name,ss.name as ss_name');
        $this->db->from('listing l');
        $this->db->join('services s', 's.id = l.service_id');
        $this->db->join('sub_services ss','ss.id = l.sub_service_id');
        $this->db->order_by('l.id','desc');            

        if(!empty($this->input->post('city'))){
            $this->db->where_in('p.city', explode(',', $this->input->post('city')));
        }
        if(!empty($this->input->post('cat'))) {
            $this->db->where_in('p.service_id', explode(',', $this->input->post('cat')));
        }
        if(!empty($this->input->post('subcat'))) {
            $this->db->where_in('p.sub_service_id', explode(',', $this->input->post('subcat')));
        }
        if(!empty($this->input->post('ad'))) {
            $this->db->where_in('p.ad_type_id', explode(',', $this->input->post('ad')));
        }
        // if(!empty($this->input->post('size'))){
        //     $this->db->where_in('p.size', explode(',', $this->input->post('size')));
        // }
        if(!empty($this->input->post('sort_by'))){
            if($this->input->post('sort_by') == '2'){
                $this->db->order_by('p.price', 'asc');    
            }if($this->input->post('sort_by') == '3'){
                $this->db->order_by('p.name', 'asc');    
            }
        }
        if(!empty($this->input->post('price'))){
            $price = explode('-', $this->input->post('price'));
            $this->db->where('p.price >=', trim($price['0']));
            $this->db->where('p.price <=', trim($price['1']));
        }
        // $this->db->where(['p.status' => '1', 'c.status' => '1', 's.status' => '1']);
        $this->db->where(['l.user_id' => $id, 's.status' => '1','ss.status' => '1']);        
        $this->db->get();
        $query = $this->db->last_query();
        if(!empty($limit)){
            if(!empty($page_id)){
                $page_id = $page_id-1;
            }
            $query .= " limit ".$page_id * $limit.",". $limit;
        }
        $query = $this->db->query($query);
        return $query->result_array();
    }

    public function getRecentViewProducts($id,$ids,$limit = null, $page_id = null){
        $this->db->select('l.*,s.name as service_name,ss.name as ss_name');
        $this->db->from('listing l');
        $this->db->join('services s', 's.id = l.service_id');
        $this->db->join('sub_services ss','ss.id = l.sub_service_id');
        if(!empty($ids)){
            $this->db->where_in('l.id', $ids);
            // $this->db->order_by('l.id', 'desc');
        }        
        $this->db->where(['l.user_id' => $id, 's.status' => '1','ss.status' => '1']);        
        $this->db->get();
        $query = $this->db->last_query();
        if(!empty($limit)){
            if(!empty($page_id)){
                $page_id = $page_id-1;
            }
            $query .= " limit ".$page_id * $limit.",". $limit;
        }
        $query = $this->db->query($query);
        return $query->result_array();
    }

    public function getFavoriteAds($id,$limit = null, $page_id = null){
        $this->db->select('l.*,s.name as service_name,ss.name as ss_name');
        $this->db->from('listing l');
        $this->db->join('services s', 's.id = l.service_id');
        $this->db->join('sub_services ss','ss.id = l.sub_service_id');
        $this->db->join('tbl_favorites f','f.product_id = l.id');                 
        $this->db->order_by('f.id','desc');                 
        $this->db->where(['f.user_id' => $id, 's.status' => '1','ss.status' => '1']);        
        $this->db->get();
        $query = $this->db->last_query();
        if(!empty($limit)){
            if(!empty($page_id)){
                $page_id = $page_id-1;
            }
            $query .= " limit ".$page_id * $limit.",". $limit;
        }
        $query = $this->db->query($query);
        return $query->result_array();
    }

    public function getBids($id,$limit = null, $page_id = null){
        $this->db->select('b.price as bid_price,l.*,s.name as service_name,ss.name as ss_name');
        $this->db->from('listing l');
        $this->db->join('services s', 's.id = l.service_id');
        $this->db->join('sub_services ss','ss.id = l.sub_service_id');
        $this->db->join('tbl_bids b','b.product_id = l.id');               
        $this->db->order_by('b.id','desc');                 
        $this->db->where(['b.user_id' => $id, 's.status' => '1','ss.status' => '1']);        
        $this->db->get();
        $query = $this->db->last_query();
        if(!empty($limit)){
            if(!empty($page_id)){
                $page_id = $page_id-1;
            }
            $query .= " limit ".$page_id * $limit.",". $limit;
        }
        $query = $this->db->query($query);
        return $query->result_array();
    }

    public function getBidByUser($id){
        $this->db->select("b.*, b.price as bid");
        $this->db->from('tbl_bids b');
        $this->db->join('listing l','l.id = b.product_id');
        $this->db->order_by('b.id','desc');
        $this->db->where(['b.user_id' => $id]);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPurchaseHistory($id,$limit = null, $page_id = null){
        $this->db->select('l.*,o.grand_total,i.quantity,i.sub_total');
        $this->db->from('order_items i');
        $this->db->join('orders o','o.id = i.order_id');
        $this->db->join('listing l','l.id = i.product_id');                 
        $this->db->order_by('i.id','desc');                 
        $this->db->where(['o.customer_id' => $id]);        
        $this->db->get();
        $query = $this->db->last_query();
        if(!empty($limit)){
            if(!empty($page_id)){
                $page_id = $page_id-1;
            }
            $query .= " limit ".$page_id * $limit.",". $limit;
        }
        $query = $this->db->query($query);
        return $query->result_array();
    }

    public function getSavedSeller($id,$limit = null, $page_id = null){
        $this->db->select('u.*,s.created_at,s.id as SID');
        $this->db->from('users u');
        $this->db->join('tbl_saved_seller s','s.seller_id = u.id');                 
        $this->db->order_by('s.id','desc');                 
        $this->db->where(['s.user_id' => $id]);        
        $this->db->get();
        $query = $this->db->last_query();
        if(!empty($limit)){
            if(!empty($page_id)){
                $page_id = $page_id-1;
            }
            $query .= " limit ".$page_id * $limit.",". $limit;
        }
        $query = $this->db->query($query);
        return $query->result_array();
    }

    public function getProducts(){
        $this->db->select('p.*');
        $this->db->from('tbl_products p');
        $this->db->join('tbl_vendor v', 'v.vendor_id = p.vendor_id');
        $this->db->order_by('p.product_id','desc');        
        $this->db->where(['p.status' => '1', 'v.status' => '1']);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSellerDetails($pid){
        $this->db->select('l.*,u.name as seller_name');
        $this->db->from('listing l');
        $this->db->join('services s', 's.id  = l.service_id');
        $this->db->join('sub_services ss', 'ss.id =l.sub_service_id');
        $this->db->join('users u', 'u.id = l.user_id');
        $query=$this->db->where(['l.status'=>'1','s.status' => '1', 'u.status' => '1' ,'ss.status' =>'1', 'l.id'=>$pid]);
        return $query->get()->row_array();
    }

    public function getSearchproduct_subcategory($search_name){
        $this->db->like('product_name', $search_name);
        $query = $this->db->get('tbl_products');
        return $query->result_array();
    }

    function search_color($postData = array()){     
      $response     = array();         
        if(isset($postData['color'])){                     
            $this->db->select('*');
            // $this->db->like('color', $postData['color']); 
            $records  = $this->db->get('listing');
            $response = $records->result();
        }         
      return $response;                            
    }
    
    function remove_seller($id) {
      $this->db->where('id', $id);
      $del = $this->db->delete('tbl_saved_seller');   
      return $del;
    }

    public function insert($table,$data){
        $this->db->insert($table,$data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function update($table,$data,$table_id,$update_id){
        $this->db->where($table_id,$update_id);
        $this->db->update($table,$data);
        return true;
    }    

    public function getUserSubscription(){
        $this->db->select('a.name as ad_name,p.ad_type_id,count(p.id) as count');
        $this->db->from('ad_type a');
        $this->db->join('listing p', 'p.ad_type_id = a.id');
        $this->db->where(['p.status' => '1', 'a.status' => '1','p.ad_type_id'=>'5']);
        $this->db->group_by('p.ad_type_id');
        $this->db->group_by(strtolower('p.ad_type_id'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getUserPost($id){
        $this->db->select('count(l.id) as count');
        $this->db->from('users u');
        $this->db->join('listing l', 'l.user_id = u.id');
        $this->db->where(['u.id' => $id,'u.status' => 1]);
        $this->db->group_by('l.user_id');
        $this->db->group_by(strtolower('l.user_id'));
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getUserPlan_Post($id){
        $this->db->select('s.post');
        $this->db->from('tbl_subscriptions s');
        $this->db->where(['s.id' => $id,'s.status' => 1]);
        $query = $this->db->get();
        return $query->row_array();
    }
    

    

}
?>

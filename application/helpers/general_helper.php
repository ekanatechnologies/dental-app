<?php

function company_details()
{
	 $CI =& get_instance();
	 $comp = $CI->db->get('company_setting')->row();
	 return $comp;
}

function get_latest_chat($id)
{
	 $CI =& get_instance();
	 $sendercount = $CI->db->where('sender_id',$id)->get('chat')->num_rows();
	 if($sendercount > 0)
	 {
	 	$sender_id = $CI->db->where('sender_id',$id)->get('chat')->row()->id;
	 }
	 else
	 {
	 	$sender_id = '0';
	 }
	 $receivercount = $CI->db->where('receiver_id',$id)->get('chat')->num_rows();
	 if($receivercount > 0)
	 {
	 	$receiver_id = $CI->db->where('receiver_id',$id)->get('chat')->row()->id;
	 }
	 else
	 {
	 	$receiver_id = '0';
	 }
	 if($sender_id > $receiver_id)
	 {
	 	$chatid = $sender_id;
	 }
	 else
	 {
	 	$chatid = $receiver_id;
	 }
	 $chatcontent = $CI->db->where('id',$chatid)->get('chat')->row();
	 return $chatcontent;
}

function servicename_by_id($id)
{
	 $CI =& get_instance();
	 $comp = $CI->db->get('services')->row()->name;
	 return $comp;
}

function ads_type_count($slug='',$location='')
{
	 $CI =& get_instance();
	 if($slug!='')
	 {
	     $ad_type = $CI->db->where('name',$slug)->get('ad_type')->row()->id;
	 }
	 if($slug!='')
	 {
	     $CI->db->where('ad_type_id',$ad_type);
	 }
	 if($location !='')
	 {
	     $CI->db->where('city',$location);
	 }
	 $comp = $CI->db->get('listing')->num_rows();
	 return $comp;
}

function subservice_ad_count($cat)
{
	 $CI =& get_instance();
	 
	 if($cat !='')
	 {
	     $CI->db->where('sub_service_id',$cat);
	 }
	 $comp = $CI->db->get('listing')->num_rows();
	 return $comp;
}

function total_ads_posted()
{
	 $CI =& get_instance();
	 $comp = $CI->db->get('listing')->num_rows();
	 return $comp;
}

function total_active_ads()
{
	 $CI =& get_instance();
	 $comp = $CI->db->where('is_closed !=', '1')->get('listing')->num_rows();
	 return $comp;
}

function total_pending_ads()
{
	 $CI =& get_instance();
	 $comp = $CI->db->where('status', '0')->get('listing')->num_rows();
	 return $comp;
}

function total_percentage_ads($adtype)
{
	 $CI =& get_instance();
	 $total = $CI->db->get('listing')->num_rows();
	 $comp = $CI->db->where('ad_type_id',$adtype)->get('listing')->num_rows();
	 $total_percentage = $comp*100/$total;
	 $total_percentage = number_format((float)$total_percentage, 2, '.', '');
	 return $total_percentage;
}


function recent_ads()
{
	 $CI =& get_instance();
	 $date = date('Y-m-d');
	 			
	 $comp = $CI->db
	 			->select('ad_type.name as ad_type,cities.city as cityname,cities.state as statename,services.name as service_name, listing.*')
	            ->join('services','services.id=listing.service_id')
	            ->join('ad_type','ad_type.id=listing.ad_type_id')
	            ->join('cities','cities.id=listing.city')
	            ->order_by('date(listing.created_on)','desc')
	            ->where('date(listing.created_on) <=',$date)
	            ->limit('4')
	            ->get('listing')
	            ->result();
	 return $comp;
}

function GetDrivingDistance($lat1, $lat2, $long1, $long2)
{
    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?key=AIzaSyAxVaqdZ9DJzCpdnGmvoi7nvV0bxEMEFKA&origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response, true);
    print_r($response_a);
    $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
    $time = $response_a['rows'][0]['elements'][0]['duration']['text'];

    return array('distance' => $dist, 'time' => $time);
}

function init_payment()
{
	 $CI =& get_instance();
	$CI->load->library("braintree_lib");
	$gateway = new Braintree\Gateway([
                'environment' => 'sandbox',
                'merchantId' => 'bdkn8m9hwn48jmn2',
                'publicKey' => 'zv5hpv4yqwk5ffz3',
                'privateKey' => 'e75b02ebc390d21329a78d122e1f79e4'
            ]);
	return $gateway;
}
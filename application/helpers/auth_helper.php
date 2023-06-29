<?php
function is_logged_in() {
    // Get current CodeIgniter instance
    $CI =& get_instance();
    // We need to use $CI->session instead of $this->session
    if (!isset($CI->session->userdata('user_data')->id)) { return false; } else { return true; }
}

function is_admin() {
    // Get current CodeIgniter instance
    $CI =& get_instance();
    // We need to use $CI->session instead of $this->session
    if ($CI->session->userdata('user_data')->role  == '1') { return true; } else { return false; }
}

function user_details() {
    // Get current CodeIgniter instance
    $CI =& get_instance();
    // We need to use $CI->session instead of $this->session
    if (!isset($CI->session->userdata('user_data')->id)) { return false; } else { 

    	$userid = $CI->session->userdata('user_data')->id;
    	$user = $CI->db->where('id',$userid)->get('users')->row();
    	return $user; }
}

function user_details_by_id($id) {
    // Get current CodeIgniter instance
    $CI =& get_instance();
    // We need to use $CI->session instead of $this->session
    if (!$id) { return false; } else { 

    	$userid = $id;
    	$user = $CI->db->where('id',$userid)->get('users')->row();
    	return $user; }
}

function check_if_chated($userid) {
    // Get current CodeIgniter instance
    $CI =& get_instance();
    // We need to use $CI->session instead of $this->session
    $logedid = $CI->session->userdata('user_data')->id;
    $count = $CI->db->where('sender_id',$logedid)->where('receiver_id',$userid)->get('chat')->num_rows();
    if ($count > '0') { return true; } else { return false; }
}
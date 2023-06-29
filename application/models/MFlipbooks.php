<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MFlipbooks extends CI_Model {

	function tambah_data($table,$data){
		$this->db->insert($table,$data);
	}
	public function get_pdf($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('book');
		return $query->row();

	}

	public function get_all_pdf()
	{

		$query = $this->db->get('book');
		return $query->result();

	}

	function update_book_status(){
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
	    return $this->db->update('book',$data);      
  	}

	function delete_pdf($id){
		$this->db->where('id',$id);
		$this->db->delete('book');
	}


}

/* End of file MFlipbooks.php */
/* Location: ./application/models/MFlipbooks.php */ 
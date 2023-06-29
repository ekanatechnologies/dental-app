<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marketplace extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model');
    if (!is_logged_in()) {
      redirect("admin/login");
    }
    if (!is_admin()) {
      redirect("admin/login");
    }
  }
  public function markets()
  {
    $this->load->view('admin/header');
    //$this->load->view('front/marketplace.php');
    $this->load->view('front/marketplace','$data');
    $this->load->view('admin/footer');
  }

 
  public function pendingmarketplaceads()
  {
    $data['user_list'] = $this->Admin_model->show_list_pending_marketplace();
    $this->load->view('admin/header');
    $this->load->view('admin/pending-marketplace-ads', $data);
    $this->load->view('admin/footer');
  }

  public function approvemarketplaceads1()
  {
    //$data['user_list'] = $this->Admin_model->show_list();
    $this->load->view('admin/header');
    $this->load->view('admin/approve-marketplace-ads1');
    $this->load->view('admin/footer');
  }

  // Datatables using ajax 
  public function get_items()
  {
    $draw   = intval($this->input->get("draw"));
    $start  = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $this->db->where("ad_type_id", '2');
    $query  = $this->db->get("listing");
    $data   = [];
    $i = 1;
    foreach ($query->result() as $r) {
      if ($r->status == '1') {
        $status = '<a href="update_status?id=' . $r->id . '&svalue=1" type="button" class="mb-2 mr-2 btn btn-danger active" >Reject</a><a href="ads_delete/' . $r->id . '" type="button" class="mb-2 mr-2 btn btn-danger active" >Delete</a>';
      } else {
        $status = '<a href="update_status?id=' . $r->id . '&svalue=0" type="button" class="mb-2 mr-2 btn btn-success active" >Approve</a>';
      }
      $data[] = array(
        $i,
        $r->name,
        $r->description,
        $r->price,
        $r->view = '<a href="add_detail/' . $r->id . '" type="button" class="mb-2 mr-2 btn btn-primary active" >View</a>',
        $r->status = $status,
      );
      $i++;
    }
    $result = array(
      "draw" => $draw,
      "recordsTotal" => $query->num_rows(),
      "recordsFiltered" => $query->num_rows(),
      "data" => $data
    );
    echo json_encode($result);
    exit();
  }

  public function viewmarketplaceads()
  {
    $data['user_list'] = $this->Admin_model->show_list();
    $this->load->view('admin/header');
    $this->load->view('admin/view-marketplace-ads', $data);
    $this->load->view('admin/footer');
  }

  public function viewmarketplaceads11()
  {
    $this->load->view('admin/header');
    $this->load->view('admin/view-marketplace-ads');
    $this->load->view('admin/footer');
  }

  // Datatables using ajax 
  public function view_items()
  {
    $draw   = intval($this->input->get("draw"));
    $start  = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $this->db->where("ad_type_id", '2');
    $query  = $this->db->get("listing");
    $data   = [];
    $i      = 1;
    foreach ($query->result() as $r) {
      if ($r->status == '1') {
        $status = '<a href="update_status?id=' . $r->id . '&svalue=1" type="button" class="mb-2 mr-2 btn btn-danger active" >Reject</a><a href="ads_delete/' . $r->id . '" type="button" class="mb-2 mr-2 btn btn-danger active" >Delete</a>';
      } else {
        $status = '<a href="update_status?id=' . $r->id . '&svalue=0" type="button" class="mb-2 mr-2 btn btn-success active" >Approve</a>';
      }
      $data[] = array(
        $i,
        $r->name,
        $r->description,
        $r->price,
        $r->view   = '<a href="add_detail/' . $r->id . '" type="button" class="mb-2 mr-2 btn btn-primary active" >View</a>',
        $r->status = $status,
      );
      $i++;
    }
    $result = array(
      "draw" => $draw,
      "recordsTotal" => $query->num_rows(),
      "recordsFiltered" => $query->num_rows(),
      "data" => $data
    );
    echo json_encode($result);
    exit();
  }

  public function update($id = '')
  {
    $this->load->model('Admin_model');
    if ($this->input->post()) {
      $n = $this->input->post('name');
      $d = $this->input->post('description');
      $p = $this->input->post('price');
      $this->Admin_model->update_list($n, $d, $p, $id);
      redirect($_SERVER['HTTP_REFERER']);
    }
    $result['data'] = $this->Admin_model->displayrecordsById($id);
    $this->load->view('admin/edit_view', $result);
  }

  public function delete($id)
  {
    $id = $this->uri->segment('3');
    // $id=$this->input->get('id');
    $this->load->model('Admin_model');
    $this->Admin_model->delete_list($id);
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function ads_delete($id)
  {
    $id = $this->uri->segment('3');
    $this->Admin_model->ads_delete_list($id);
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function add_detail($id)
  {
    $data['user_list'] = $this->Admin_model->show_list($id);
    $this->load->view('admin/header');
    $this->load->view('admin/add_detail', $data);
    $this->load->view('admin/footer');
  }

  public function update_status()
  {
    if (isset($_REQUEST['svalue'])) {
      $this->load->model('Admin_model');
      $set_status = $this->Admin_model->update_status();
    }
    return redirect($_SERVER['HTTP_REFERER']);
  }
}
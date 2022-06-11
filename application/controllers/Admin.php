<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller

{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    // $data['daftar'] = $this->db->get_where('nama', ['email' =>
    // $this->session->userdata('email')])->row_array();

    $data['tittle'] = 'Admin Page';
    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/admin_sidebar', $data);
    $this->load->view('templates/admin_topbar', $data);
    $this->load->view('admin_view', $data);
    $this->load->view('templates/admin_footer');
  }

  public function template()
  {
    $this->load->view('template');
  }

  public function user()
  {
    $kelontong = $this->Admin_model->dataUser();
    $data['allkelontong'] = $kelontong->result();
    $this->load->view('admin_view', $data);
    $this->load->view('templates/footer');
  }
}

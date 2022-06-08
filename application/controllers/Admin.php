<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
  public function index()
  {
    $this->load->view('admin_view');
    $this->load->view('templates/footer');
    // $data['Admin'] = $this->Admin_model->get_data();
  }
}

<?php

class C_Overview extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }
    public function kelontong()
    {
        // $data['allkelontong'] = $this->Admin_model->select_all_kelontong();
        $kelontong = $this->Admin_model->select_all_kelontong();
        $data['allkelontong'] = $kelontong->result();
        $this->load->view("admin_view", $data);
    }
}
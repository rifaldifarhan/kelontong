<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Menu extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }
    public function form()
    {
        $kelontong = $this->Admin_model->select_all_kelontong();
        $data['allkelontong'] = $kelontong->result();
        // $data['daftar'] = $this->db->get_where('nama', ['email' =>
        // $this->session->userdata('email')])->row_array();

        $data['tittle'] = 'Form Page';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('menu/form_view', $data);
        $this->load->view('templates/admin_footer');
    }

    public function kategori()
    {
        $kelontong = $this->Admin_model->dataKategori();
        $data['allkelontong'] = $kelontong->result();
        $data['tittle'] = 'Kategori Page';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('menu/kategori_view', $data);
        $this->load->view('templates/admin_footer');
    }

    public function user()
    {
        $kelontong = $this->Admin_model->dataUser();
        $data['allkelontong'] = $kelontong->result();
        $data['tittle'] = 'User Page';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('menu/user_view', $data);
        $this->load->view('templates/admin_footer');
    }
}

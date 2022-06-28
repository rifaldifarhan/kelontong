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

    //mengambil data input dan melemparkan ke file model
    //menampilkan file view untuk insert data
    public function tambah()
    {
        $data['tittle'] = 'Tambah User';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('crud/tambah_kategori');
        $this->load->view('templates/admin_footer');
    }

    public function input_tambah()
    {
        $id = $this->input->post('id');
        $kategori = $this->input->post('kategori');

        $data = array(
            'id' => $id,
            'kategori' => $kategori,
        );
        //melemparkan ke file model
        $this->Admin_model->input_data($data, 'kategori');
        redirect('index.php/menu/kategori');
    }

    public function edit($id)
    {

        $data = array(
            'id' => $id,
            'kategori' => $this->Admin_model->edit_data($id)->result()
        );


        $data['tittle'] = 'Edit Kategori';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('crud/edit_kategori');
        $this->load->view('templates/admin_footer');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $kategori = $this->input->post('kategori');

        $data = array(
            'Kategori' => $kategori
        );

        ($this->Admin_model->update_data($id, $data));
        redirect('index.php/menu/kategori');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->Admin_model->hapus_data($where, 'kategori');
        redirect('index.php/menu/kategori');
    }
}

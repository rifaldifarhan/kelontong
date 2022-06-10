<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller

{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model');
  }
  public function index()
  {
    $kelontong = $this->Admin_model->select_all_kelontong();
    $data['allkelontong'] = $kelontong->result();
    // $data['daftar'] = $this->db->get_where('nama', ['email' =>
    // $this->session->userdata('email')])->row_array();

    // $this->load->view('templates/admin_header', $data);
    // $this->load->view('templates/admin_topbar', $data);
    // $this->load->view('templates/admin_sidebar', $data);
    // $this->load->view('templates/admin_footer');
    $this->load->view('admin_view', $data);
    

    // $data['Admin'] = $this->Admin_model->get_data();
  }


  // public function kelontong()
  //   {
  //       // $data['allkelontong'] = $this->Admin_model->select_all_kelontong();
  //       $kelontong = $this->Admin_model->select_all_kelontong();
  //       $data['allkelontong'] = $kelontong->result();
  //       $this->load->view("admin_view", $data);
  //   }
  public function template()
  {
    $this->load->view('template');
  }
  // public function tambah()
  // {
  //   $this->template->views('crud/tambah');
  // }

  // public function input()
  // {
  //   $nama = $this->input->post('Nama');
  //   $email = $this->input->post('Email');
  //   $nomor_ponsel = $this->input->post('Nomor_ponsel');
  //   $alamat = $this->input->post('Alamat');
  //   $tanggal_pemesanan = $this->input->post('Tanggal_pemesanan');
  //   $jenis_pesanan = $this->input->post('Jenis_pesanan');
  //   $deskripsi = $this->input->post('Deskripsi');
  //   $kategori = $this->input->post('Kategori');
  //   $bukti_pembayaran = $this->input->post('Bukti_pembayaran');

  //   $data = array(
  //     'Nama' => $nama,
  //     'Email' => $email,
  //     'Nomor_ponsel' => $nomor_ponsel,
  //     'Alamat' => $alamat,
  //     'Tanggal_pemesanan' => $tanggal_pemesanan,
  //     'Jenis_pesanan' => $jenis_pesanan,
  //     'Deskripsi' => $deskripsi,
  //     'Kategori' => $kategori,
  //     'Bukti_pembayaran' => $bukti_pembayaran,

  //   );
  //   $this->Admin_model->input_data($data, 'form');
  //   redirect('Admin/index');
  // }

  public function user()
  {
    $kelontong = $this->Admin_model->dataUser();
    $data['allkelontong'] = $kelontong->result();
    $this->load->view('admin_view', $data);
    $this->load->view('templates/footer');
    $this->load->view('crud/home', $data);

    // $data['Admin'] = $this->Admin_model->get_data();
  }
  function hapus($id){
		$where = array('id' => $id);
		$this->m_data->hapus_data($where,'form');
		redirect('Admin/index');
	}
}

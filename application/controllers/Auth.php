<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['tittle'] = 'Login Page';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else {
            //jika validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password1');

        $daftar = $this->db->get_where('daftar', ['email' => $email])->row_array();

        if ($daftar) {
            //jika usernya ada, cek password
            if (password_verify($password, $daftar['Kata_sandi'])) {
                $data = [
                    'email' => $daftar['Email'],
                ];
                $this->session->set_userdata($data);
                redirect('index.php/admin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong password!</div>');
                redirect('index.php/auth/index');
            }
        } else {
            //jika usernya tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email is not registered!</div>');
            redirect('index.php/auth/index');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[daftar.Email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('nohp', 'NomorHP', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['tittle'] = 'Register Page';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'Nama' => htmlspecialchars($this->input->post('name')),
                'Email' => htmlspecialchars($this->input->post('email')),
                'Nomor_Ponsel' => htmlspecialchars($this->input->post('nohp')),
                'Kata_Sandi' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            ];
            $this->db->insert('daftar', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your account has been created. Please login</div>');
            redirect('index.php/auth/index');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            You have been logged out!</div>');
        redirect('index.php/auth/index');
    }
}

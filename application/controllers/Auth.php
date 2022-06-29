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
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        $daftar = $this->db->get_where('daftar', ['Email' => $email])->row_array();

        if ($daftar) {
            //jika usernya ada, cek password
            if (password_verify($password, $daftar['Kata_sandi'])) {
                $login = [
                    'email' => $daftar['Email']
                ];
                $this->session->set_userdata($login);
                redirect('index.php/Admin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password salah!</div>');
                redirect('index.php/Auth/index');
            }
        } else {
            //jika usernya tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email tidak terdaftar!</div>');
            redirect('index.php/Auth/index');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[daftar.Email]', [
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('nohp', 'NomorHP', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['tittle'] = 'Register Page';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'Nama' => htmlspecialchars($this->input->post('name', true)),
                'Email' => htmlspecialchars($this->input->post('email', true)),
                'Nomor_Ponsel' => htmlspecialchars($this->input->post('nohp', true)),
                'Kata_Sandi' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];
            $this->db->insert('daftar', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun telah dibuat. Silahkan login</div>');
            redirect('index.php/Auth/index');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Kamu telah log out!</div>');
        redirect('index.php/Auth/index');
    }

    public function forgotpassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {
            $data['tittle'] = 'Forgot Password';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email');
            $daftar = $this->db->get_where('daftar', ['Email' => $email])->row_array();

            if ($daftar) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                // $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Cek email untuk reset password!</div>');
                redirect('index.php/Auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email tidak terdaftar!</div>');
                redirect('index.php/Auth/forgotpassword');
            }
        }
    }
}

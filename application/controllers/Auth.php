<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('periode');
    }

    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");
        $data['title'] = 'Simawa | Login';
        $this->form_validation->set_rules('nim', 'NIM', 'trim|required|exact_length[15]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $periode = $this->periode->ambilPeriode();
        $waktu = $periode->row();
        if (isset($waktu)) {
            if ($waktu->waktu_mulai <= date("Y-m-d") and $waktu->waktu_selesai >= date("Y-m-d")) {
                if ($this->form_validation->run() == false) {
                    //$this->load->view('templates/header', $data);
                    $this->load->view('users/login_new');
                    //$this->load->view('templates/footer_login');
                } else {
                    $this->_login();
                }
            } else {
                $data['title'] = 'Coming Soon';
                $this->load->view('templates/header', $data);
                $this->load->view('users/comingsoon');
            }
        } else {
            $data['title'] = 'Coming Soon';
            $this->load->view('templates/header', $data);
            $this->load->view('users/comingsoon');
        }
    }

    public function admin()
    {
        $data['title'] = 'Login | Admin';
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            //$this->load->view('templates/header', $data);
            $this->load->view('admin/login_new');
            //$this->load->view('templates/footer_login');
        } else {
            $this->_login();
        }
    }

    public function _login()
    {
        $nim = $this->input->post('nim');
        $password = $this->input->post('password');
        $username = $this->input->post('username');
        $mahasiswa = $this->db->get_where('mahasiswa', ['nim' => $nim])->row_array();
        $admin = $this->db->get_where('admin', ['username' => $username])->row_array();

        if ($mahasiswa) {
            if ($mahasiswa['status'] == ('Belum Terdaftar' || 'Terdaftar')) {
                if (password_verify($password, $mahasiswa['password'])) {
                    $data = [
                        'nim' => $mahasiswa['nim'],
                        'id_mhs' => $mahasiswa['id_mhs']
                    ];
                    $this->session->set_userdata($data);
                    redirect('User');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">nim is not been activated!</div>');
                redirect('auth');
            }
        } else if ($admin) {
            if ($password == "password") {
                $data = [
                    'id_admin' => $admin['id_admin'],
                    'username' => $admin['username']
                ];
                $this->session->set_userdata($data);
                redirect('KontrolPeriode');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered!</div>');
            redirect('auth/admin');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}

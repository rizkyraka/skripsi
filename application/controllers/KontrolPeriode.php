<?php
defined('BASEPATH') or exit('No direct script access allowed');
class KontrolPeriode extends CI_Controller
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
        $data['title'] = 'Simawa Filkom UB';
        $data['title2'] = 'Atur Periode';
        $data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();
        $periode = $this->periode->ambilPeriode();
        $data['periode'] = $periode->row();
        if (!$data['admin']) {
            redirect('auth/admin');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/atur_periode', $data);
            $this->load->view('templates/footer');
        }
    }

    public function aturPeriode()
    {
        $id_admin = $this->session->userdata('id_admin');
        $waktu_mulai = $this->input->post('tanggalMulai');
        $waktu_selesai = $this->input->post('tanggalSelesai');
        if (!$id_admin) {
            redirect('auth/admin');
        } else {
            $this->periode->addPeriode($id_admin, $waktu_mulai, $waktu_selesai);
            redirect('KontrolPeriode');
        }
    }
}

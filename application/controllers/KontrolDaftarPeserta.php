<?php
defined('BASEPATH') or exit('No direct script access allowed');
class KontrolDaftarPeserta extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('peserta');
    }

    public function index()
    {
        $data['title'] = 'Simawa Filkom UB';
        $data['title2'] = 'Daftar Peserta';
        $data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();
        $data['daftarpeserta'] = $this->peserta->daftarPeserta();

        // $config['base_url'] = 'PKL/';
        // $config['total_rows'] = 6;
        // $config['per_page'] = 2;
        
        // $this->pagination->initialize($config);        

        if (!$data['admin']) {
            redirect('auth/admin');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/daftarPeserta', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function viewPeserta($id_mhs)
    {
        $data['title'] = 'Simawa Filkom UB';
        $data['title2'] = 'Lihat Peserta';
        $data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();
        $data['mahasiswa'] = $this->peserta->viewPeserta($id_mhs)->row_array();
        $data['listPrestasi'] = $this->peserta->selectPrestasi($id_mhs);
        if (!$data['admin']) {
            redirect('auth/admin');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/viewPeserta', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    public function viewBerkas($jenis_berkas, $id_mhs)
    {
        $data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();
        $data['title'] = 'Simawa Filkom UB';
        $data['berkas'] = $this->peserta->viewBerkas($jenis_berkas, $id_mhs)->row_array();
        if (!$data['admin']) {
            redirect('auth/admin');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/viewberkas_admin', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function viewBukti($bukti)
    {
        $data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();
        $data['title'] = 'Simawa Filkom UB';
        $data['bukti'] = $bukti;
        if (!$data['admin']) {
            redirect('auth/admin');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/viewbuktiprestasi_admin', $data);
            $this->load->view('templates/footer', $data);
        }
    }
}

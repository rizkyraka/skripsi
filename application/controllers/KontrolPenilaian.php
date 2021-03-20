<?php
defined('BASEPATH') or exit('No direct script access allowed');
class KontrolPenilaian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('penilaian');
    }

    public function index()
    {
        $data['title'] = 'Simawa Filkom UB';
        $data['title2'] = 'Penilaian';
        $data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();
        $data['berkas'] = $this->penilaian->berkas();
        if (!$data['admin']) {
            redirect('auth/admin');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/penilaian', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function hapusPrestasi()
    {
        $id_admin = $this->session->userdata('id_admin');
        $id_mhs = $this->input->get('id_mhs');
        $id_prestasi = $this->input->get('id_prestasi');
        if (!$id_admin) {
            redirect('auth/admin');
        } else {
            $this->penilaian->hapusPrestasi($id_prestasi);
            redirect("KontrolPenilaian/detailprestasi/$id_mhs");
        }
    }

    public function editPenilaian()
    {
        $id_admin = $this->session->userdata('id_admin');
        $id_mhs = $this->input->post('id_mhs');

        $nilai_kti = $this->input->post('nilai_kti');
        $nilai_bing = $this->input->post('nilai_bing');

        if (!$id_admin) {
            redirect('auth/admin');
        } else {
            $nilai = array('kti' => $nilai_kti, 'b_inggris' => $nilai_bing);
            $this->penilaian->updateNilai($id_mhs, $nilai);
            redirect('KontrolPenilaian');
        }
    }

    public function hapusPenilaian($id_mhs)
    {
        $id_admin = $this->session->userdata('id_admin');
        if (!$id_admin) {
            redirect('auth/admin');
        } else {
            $this->penilaian->hapusPenilaian($id_mhs);
            $this->penilaian->gugurkanPeserta($id_mhs);
            redirect('KontrolPenilaian');
        }
    }

    public function detailprestasi($id_mhs)
    {
        $data['title'] = 'Simawa Filkom UB';
        $data['title2'] = 'Penilaian';
        $data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();
        $data['detailprestasi'] = $this->penilaian->detailPrestasi($id_mhs);
        if (!$data['admin']) {
            redirect('auth/admin');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/detail-prestasi', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    // public function hitungNilai()
    // {
    //     $id_mhs = $this->input->post('id_mhs');
    //     $skor_ttt = $this->input->post('skor_ttt');
    //     $skor_ttp = $this->input->post('skor_ttp');
    //     $nilai_ku = $this->input->post('nilai_ku');
    //     $nilai_wawancara = $this->input->post('nilai_wawancara');
    //     $nilai_summary = $this->input->post('nilai_summary');
    //     $nilai_presentasi_diskusi = $this->input->post('nilai_presentasi_diskusi');
    //     $jumlah_juri = $this->input->post('jumlah_juri');

    //     // $nilai = $this->penilaian->getNilai($id_mhs)->result();
    //     $nilai_kti = (((0.4 * $skor_ttt) + (0.6 * $skor_ttp)) / $jumlah_juri) * 0.1 * 0.3;
    //     $nilai_prestasi = (((0.4 * $nilai_ku) + (0.6 * $nilai_wawancara)) / $jumlah_juri) * 0.25;
    //     $nilai_bahasa_inggris = (((0.3 * $nilai_summary) + (0.7 * $nilai_presentasi_diskusi)) / $jumlah_juri) * 0.25;
    // }
}

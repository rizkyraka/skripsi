<?php
defined('BASEPATH') or exit('No direct script access allowed');
class KontrolSkala extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('rekomendasi');
    }

    public function index()
    {
        $data['title'] = 'Simawa Filkom UB';
        $data['title2'] = 'Hasil Rekomendasi';
        $data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();
        $data['skala'] = $this->rekomendasi->skala()->result();
        if (!$data['admin']) {
            redirect('auth/admin');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/skala_saaty', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function editSkala()
    {
        $id_admin = $this->session->userdata('id_admin');
        $ipk_kti = $this->input->post('ipk_kti');
        $ipk_prestasi = $this->input->post('ipk_prestasi');
        $ipk_bing = $this->input->post('ipk_bing');
        $kti_ipk = $this->input->post('kti_ipk');
        $kti_prestasi = $this->input->post('kti_prestasi');
        $kti_bing = $this->input->post('kti_bing');
        $prestasi_ipk = $this->input->post('prestasi_ipk');
        $prestasi_kti = $this->input->post('prestasi_kti');
        $prestasi_bing = $this->input->post('prestasi_bing');
        $bing_ipk = $this->input->post('bing_ipk');
        $bing_kti = $this->input->post('bing_kti');
        $bing_prestasi = $this->input->post('bing_prestasi');

        //Skala Saaty
        $nilai_kriteria = array(
            array(1, $ipk_kti, $ipk_prestasi, $ipk_bing),
            array($kti_ipk, 1, $kti_prestasi, $kti_bing),
            array($prestasi_ipk, $prestasi_kti, 1, $prestasi_bing),
            array($bing_ipk, $bing_kti, $bing_prestasi, 1)
        );
        $sum_kriteria = array();
        for ($x = 0; $x < count($nilai_kriteria); $x++) {
            $sum = 0;
            for ($y = 0; $y < count($nilai_kriteria[$x]); $y++) {
                $sum += $nilai_kriteria[$y][$x];
            }
            array_push($sum_kriteria, $sum);
        }

        $matriks_M = array();
        for ($x = 0; $x < count($nilai_kriteria); $x++) {
            $norm = array();
            for ($y = 0; $y < count($nilai_kriteria[$x]); $y++) {
                $valuenorm = $nilai_kriteria[$x][$y] / $sum_kriteria[$y];
                array_push($norm, $valuenorm);
            }
            array_push($matriks_M, $norm);
        }

        $matriks_w = array();
        for ($x = 0; $x < count($matriks_M); $x++) {
            $temp = array_sum($matriks_M[$x]);
            array_push($matriks_w, ($temp / count($nilai_kriteria)));
        }

        $matriks_baru = array();
        for ($x = 0; $x < count($nilai_kriteria); $x++) {
            $product = 0;
            for ($y = 0; $y < count($nilai_kriteria[$x]); $y++) {
                $temp = ($nilai_kriteria[$x][$y] * $matriks_w[$y]);
                $product += $temp;
            }
            array_push($matriks_baru, $product);
        }

        $eigen_maks = array();
        for ($x = 0; $x < count($matriks_baru); $x++) {
            $temp = ($matriks_baru[$x] / $matriks_w[$x]) / count($nilai_kriteria);
            array_push($eigen_maks, $temp);
        }


        $lambda_maks_temp = 0;
        for ($i = 0; $i < count($eigen_maks); $i++) {
            $lambda_maks_temp += $eigen_maks[$i];
        }
        $lambda_maks = $lambda_maks_temp / count($nilai_kriteria);

        $ci = ($lambda_maks - count($nilai_kriteria)) / (count($nilai_kriteria)-1);

        $ir = 0.9;

        $cr = $ci / $ir;

        if($cr <= 0.01){
            if (!$id_admin) {
                redirect('auth/admin');
            } else {
                $cek = $this->rekomendasi->skala()->row_array();
                if($cek == null){
                    $data1 = array(
                        'id_admin' => $id_admin,
                        'kriteria1' => 'IPK',
                        'kriteria2' => 'KTI',
                        'nilai' => $ipk_kti
                     );
                    $this->rekomendasi->addskala($data1);
    
                    $data2 = array(
                        'id_admin' => $id_admin,
                        'kriteria1' => 'IPK',
                        'kriteria2' => 'Prestasi',
                        'nilai' => $ipk_prestasi
                     );
                    $this->rekomendasi->addskala($data2);
    
                    $data3 = array(
                        'id_admin' => $id_admin,
                        'kriteria1' => 'IPK',
                        'kriteria2' => 'Bing',
                        'nilai' => $ipk_bing
                     );
                    $this->rekomendasi->addskala($data3);
    
                    $data4 = array(
                        'id_admin' => $id_admin,
                        'kriteria1' => 'KTI',
                        'kriteria2' => 'IPK',
                        'nilai' => $kti_ipk
                     );
                    $this->rekomendasi->addskala($data4);
    
                    $data5 = array(
                        'id_admin' => $id_admin,
                        'kriteria1' => 'KTI',
                        'kriteria2' => 'Prestasi',
                        'nilai' => $kti_prestasi
                     );
                    $this->rekomendasi->addskala($data5);
    
                    $data6 = array(
                        'id_admin' => $id_admin,
                        'kriteria1' => 'KTI',
                        'kriteria2' => 'Bing',
                        'nilai' => $kti_bing
                     );
                    $this->rekomendasi->addskala($data6);

                    $data7 = array(
                        'id_admin' => $id_admin,
                        'kriteria1' => 'Prestasi',
                        'kriteria2' => 'IPK',
                        'nilai' => $prestasi_ipk
                     );
                    $this->rekomendasi->addskala($data7);

                    $data8 = array(
                        'id_admin' => $id_admin,
                        'kriteria1' => 'Prestasi',
                        'kriteria2' => 'KTI',
                        'nilai' => $prestasi_kti
                     );
                    $this->rekomendasi->addskala($data8);

                    $data9 = array(
                        'id_admin' => $id_admin,
                        'kriteria1' => 'Prestasi',
                        'kriteria2' => 'Bing',
                        'nilai' => $prestasi_bing
                     );
                    $this->rekomendasi->addskala($data9);
    
                    $data10 = array(
                        'id_admin' => $id_admin,
                        'kriteria1' => 'Bing',
                        'kriteria2' => 'IPK',
                        'nilai' => $bing_ipk
                     );
                    $this->rekomendasi->addskala($data10);

                    $data11 = array(
                        'id_admin' => $id_admin,
                        'kriteria1' => 'Bing',
                        'kriteria2' => 'KTI',
                        'nilai' => $bing_kti
                     );
                    $this->rekomendasi->addskala($data11);

                    $data12 = array(
                        'id_admin' => $id_admin,
                        'kriteria1' => 'Bing',
                        'kriteria2' => 'Prestasi',
                        'nilai' => $bing_prestasi
                     );
                    $this->rekomendasi->addskala($data12);
                } else{
                    $this->rekomendasi->editskala('IPK', 'KTI', $ipk_kti);
                    $this->rekomendasi->editskala('IPK', 'Prestasi', $ipk_prestasi);
                    $this->rekomendasi->editskala('IPK', 'Bing', $ipk_bing);
                    $this->rekomendasi->editskala('KTI', 'IPK', $kti_ipk);
                    $this->rekomendasi->editskala('KTI', 'Prestasi', $kti_prestasi);
                    $this->rekomendasi->editskala('KTI', 'Bing', $kti_bing);
                    $this->rekomendasi->editskala('Prestasi', 'IPK', $prestasi_ipk);
                    $this->rekomendasi->editskala('Prestasi', 'KTI', $prestasi_kti);
                    $this->rekomendasi->editskala('Prestasi', 'Bing', $prestasi_bing);
                    $this->rekomendasi->editskala('Bing', 'IPK', $bing_ipk);
                    $this->rekomendasi->editskala('Bing', 'KTI', $bing_kti);
                    $this->rekomendasi->editskala('Bing', 'Prestasi', $bing_prestasi);
                }
                redirect('KontrolSkala');
            }
        } else{
            $this->session->set_flashdata('error', "Bobot prioritas tidak konsisten, silahkan mengedit kembali!");
            redirect('KontrolSkala');
        }

    }
}

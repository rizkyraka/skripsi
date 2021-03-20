<?php
defined('BASEPATH') or exit('No direct script access allowed');
class KontrolRekomendasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('rekomendasi');
        $this->load->model('penilaian');
    }

    public function index()
    {
        $data['title'] = 'Simawa Filkom UB';
        $data['title2'] = 'Hasil Rekomendasi';
        $data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();
        $skala=$this->rekomendasi->skala()->result();
        $data['skala'] = $skala;
        if (!$data['admin']) {
            redirect('auth/admin');
        } else {
            $data_nilai = $this->rekomendasi->daftarPenilaian()->result();

            //susunan array (ipk, kti, prestasi, bing)
            $bobot = array();
            $prestasi = array();
            for ($x = 0; $x < count($data_nilai); $x++) {
                if ($data_nilai[$x]->kti and $data_nilai[$x]->b_inggris and $data_nilai[$x]->prestasi) {
                    array_push($bobot, array($data_nilai[$x]->ipk, $data_nilai[$x]->kti, $data_nilai[$x]->prestasi, $data_nilai[$x]->b_inggris));
                    array_push($prestasi, $data_nilai[$x]->prestasi);
                } else if($data_nilai[$x]->prestasi) {
                    array_push($bobot, array($data_nilai[$x]->ipk, 70, $data_nilai[$x]->prestasi, 70));
                    array_push($prestasi, $data_nilai[$x]->prestasi);
                }else{
                    array_push($bobot, array($data_nilai[$x]->ipk, 70, 1, 70));
                    array_push($prestasi, 1);
                }
            }

            $max_prestasi = max($prestasi);
            $min_prestasi = min($prestasi);

            $bobot_alt = array();
            for ($x = 0; $x < count($bobot); $x++) {
                $temp_array = array();
                for ($y = 0; $y < count($bobot[$x]); $y++) {
                    $temp = 0;
                    if($y==0){
                        $temp=$bobot[$x][$y]/4*100*20/100;
                    } elseif($y==1){
                        $temp=$bobot[$x][$y]*30/100;
                    } elseif($y==2){
                        $max = 25;
                        $min = 1;
                        $temp= ($max-$min)/($max_prestasi-$min_prestasi)*($bobot[$x][$y]-$min_prestasi)+$min;
                    } elseif($y==3){
                        $temp=$bobot[$x][$y]*25/100;
                    }
                    array_push($temp_array, $temp);
                }
                array_push($bobot_alt, $temp_array);
            }

            //PERHITUNGAN AHP

            //Skala Saaty
            $nilai_kriteria = array(
                array(1, $skala[0]->nilai, $skala[1]->nilai, $skala[2]->nilai),
                array($skala[3]->nilai, 1, $skala[4]->nilai, $skala[5]->nilai),
                array($skala[6]->nilai, $skala[7]->nilai, 1, $skala[8]->nilai),
                array($skala[9]->nilai, $skala[10]->nilai, $skala[11]->nilai, 1)
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

            $tabel_wj = array();
            for ($x = 0; $x < count($bobot_alt); $x++) {
                $temp_array = array();
                for ($y = 0; $y < count($bobot_alt[$x]); $y++) {
                    $temp = pow($bobot_alt[$x][$y],  $matriks_w[$y]);
                    array_push($temp_array, $temp);
                }
                array_push($tabel_wj, $temp_array);
            }

            $vektor_s = array();
            for ($x = 0; $x < count($bobot_alt); $x++) {
                $temp = array_product($tabel_wj[$x]);
                array_push($vektor_s, $temp);
            }

            $sum_vektor_s = array_sum($vektor_s);

            $vektor_v = array();
            for ($x = 0; $x < count($vektor_s); $x++) {
                $temp = $vektor_s[$x] / $sum_vektor_s;
                array_push($vektor_v, $temp);
            }

            for ($x = 0; $x < count($data_nilai); $x++) {
                $data_nilai[$x]->vektor_s = $vektor_s[$x];
                $data_nilai[$x]->nilai = $vektor_v[$x];
                $data_nilai[$x]->prestasi = $data_nilai[$x]->prestasi;
            }

            usort($data_nilai,function($first,$second){
                return strtolower($first->nilai) < strtolower($second->nilai);
            });

            $data['mahasiswa'] = $data_nilai;
            $this->load->view('templates/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/rekomendasi', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function ahp(){

    }

    public function wp(){
        
    }

}

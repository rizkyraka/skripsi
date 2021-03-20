<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('user_model');
        $this->load->model('prestasi');
        $this->load->model('penilaian');
    }

    public function index()
    {
        $id_mhs = $this->session->userdata('id_mhs');
        $data['title'] = 'Simawa Filkom UB';
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['id_mhs' => $id_mhs])->row_array();
        $data['listPrestasi'] = $this->prestasi->selectPrestasi();
        $penilaian = $this->db->get_where('penilaian', ['id_mhs' => $id_mhs])->row_array();
        $ipk = $data['mahasiswa']['ipk'];
        $prestasi = (object) $this->penilaian->nilaiPrestasi($id_mhs)->row_array();
        $nilai = array('id_admin' => 1, 'id_mhs' => $id_mhs, 'ipk' => $ipk, 'prestasi' => 0);
        $mahasiswa = (object) $data['mahasiswa'];
        if (!$data['mahasiswa']) {
            redirect('auth');
        } else {
            if ($mahasiswa->status == 'Terdaftar') {
                if ($penilaian == NULL) {
                    $this->penilaian->addNilai($nilai); //masukin nilai ipk sama prestasinya yg kumulatif
                }
                $this->load->view('templates/header', $data);
                $this->load->view('users/topbar', $data);
                $this->load->view('users/profil', $data);
                $this->load->view('templates/footer-mhs');
            } else {
                $this->load->view('templates/header', $data);
                $this->load->view('users/topbar', $data);
                $this->load->view('users/pendaftaran', $data);
            }
        }
    }

    public function daftar()
    {
        $nim = $this->session->userdata('nim');
        $status = 'Terdaftar';
        $this->user_model->daftar($nim, $status, 'mahasiswa');
        redirect('User');
    }

    public function editProfil()
    {
        $id_mhs = $this->session->userdata('id_mhs');
        $data['title'] = 'Simawa Filkom UB';
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['id_mhs' => $id_mhs])->row_array();
        $data['listPrestasi'] = $this->prestasi->selectPrestasi();
        $email = $this->input->post('email');
        if (!$data['mahasiswa']) {
            redirect('auth');
        } else{
        //uploadfoto
        if (isset($_FILES['foto_profil']['name'])) {
            $foto_profil = $_FILES['foto_profil']['name'];
            $tmp = $_FILES['foto_profil']['tmp_name'];
            $error = $_FILES['foto_profil']['error'];
            if (!empty($foto_profil)) {
                $location = 'assets/img/profile/';
                if (move_uploaded_file($tmp, $location . $foto_profil)) {
                    $update = array(
                        'email' => $email,
                        'foto_profil' => $foto_profil
                    );
                    $this->user_model->updateData($id_mhs, $update);
                    redirect('User');
                }
            } else {
                echo "Please choose a file.";
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('users/topbar', $data);
        $this->load->view('users/edit-profil', $data);
        $this->load->view('templates/footer-mhs');
    }
    }

    public function uploadfilemawapres()
    {
        $id_mhs = $this->session->userdata('id_mhs');
        $data['title'] = 'Simawa Filkom UB';
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['id_mhs' => $id_mhs])->row_array();
        $data['cekberkas'] = $this->user_model->cekberkas($id_mhs)->row_array();
        if (!$data['mahasiswa']) {
            redirect('auth');
        } else{
        //uploadberkas
        if (isset($_FILES['inputKTI']['name']) and isset($_FILES['inputKTIBing']['name'])) {
            $kti = $_FILES['inputKTI']['name'];
            $tmp_kti = $_FILES['inputKTI']['tmp_name'];
            $tipe_kti = $_FILES['inputKTI']['type'];
            $nama_baru_kti = 'KTI_' . $data['mahasiswa']['nim'] . '_' . $kti;
            if ($tipe_kti == 'application/pdf') {
                if (!empty($kti)) {
                    $location = 'assets/upload-berkas/';
                    if (move_uploaded_file($tmp_kti, $location . $nama_baru_kti)) {
                        $insert_kti = array(
                            'id_mhs' => $id_mhs,
                            'jenis_berkas' => 'kti',
                            'file_berkas' => $nama_baru_kti
                        );
                        $this->user_model->insertData($insert_kti);
                    }
                }
            } else {
                echo "Harus PDF!";
            }
            $kti_bing = $_FILES['inputKTIBing']['name'];
            $tmp_bing = $_FILES['inputKTIBing']['tmp_name'];
            $tipe_bing = $_FILES['inputKTIBing']['type'];
            $nama_baru_bing = 'KTI B.Ing_' . $data['mahasiswa']['nim'] . '_' . $kti_bing;
            if ($tipe_bing == 'application/pdf') {
                if (!empty($kti_bing)) {
                    $location = 'assets/upload-berkas/';
                    if (move_uploaded_file($tmp_bing, $location . $nama_baru_bing)) {
                        $insert_bing = array(
                            'id_mhs' => $id_mhs,
                            'jenis_berkas' => 'kti-b.ing',
                            'file_berkas' => $nama_baru_bing
                        );
                        $this->user_model->insertData($insert_bing);
                    }
                }
            } else {
                echo "Harus PDF!";
            }

            // $video = $_FILES['inputVideo']['name'];
            // $tmp_video = $_FILES['inputVideo']['tmp_name'];
            // $tipe_video = $_FILES['inputVideo']['type'];
            // $nama_baru_video = 'Video_' . $data['mahasiswa']['nim'] . '_' . $video;
            // //if ($tipe_video == 'video/*') {
            // if (!empty($video)) {
            //     $location = 'assets/upload-berkas/';
            //     if (move_uploaded_file($tmp_video, $location . $nama_baru_video)) {
            //         $insert_video = array(
            //             'id_mhs' => $id_mhs,
            //             'jenis_berkas' => 'presentasi',
            //             'file_berkas' => $nama_baru_video
            //         );
            //         $this->user_model->insertData($insert_video);
            //     }
            // }
            // //} else {
            // //  echo "Harus Video";
            // //}
            redirect('User');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('users/topbar', $data);
        $this->load->view('users/edit-berkas', $data);
        $this->load->view('templates/footer-mhs');
    }
    }

    public function updatefilemawapres()
    { //MASIH BELUM BISA KE UNLINK, UDAH BISA UPDATE
        $id_mhs = $this->session->userdata('id_mhs');
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['id_mhs' => $id_mhs])->row_array();
        if (!$data['mahasiswa']) {
            redirect('auth');
        } else{
        $id_kti = $this->input->post('id_kti');
        $id_bing = $this->input->post('id_bing');
        $id_video = $this->input->post('id_video');
        $old_file_kti = $this->user_model->berkas($id_kti)->row_array();
        $old_file_bing = $this->user_model->berkas($id_bing)->row_array();
        unlink('assets/upload-berkas/' . $old_file_kti['file_berkas']);
        unlink('assets/upload-berkas/' . $old_file_bing['file_berkas']);

        if (isset($_FILES['inputKTI']['name']) and isset($_FILES['inputKTIBing']['name'])) {
            $kti = $_FILES['inputKTI']['name'];
            $tmp_kti = $_FILES['inputKTI']['tmp_name'];
            $nama_baru_kti = 'KTI_' . $data['mahasiswa']['nim'] . '_' . $kti;
            if (!empty($kti)) {
                $location = 'assets/upload-berkas/';
                if (move_uploaded_file($tmp_kti, $location . $nama_baru_kti)) {
                    $update_kti = array(
                        'jenis_berkas' => 'kti',
                        'file_berkas' => $nama_baru_kti
                    );
                    $this->user_model->updateBerkas($id_kti, $update_kti);
                }
            }
            $kti_bing = $_FILES['inputKTIBing']['name'];
            $tmp_bing = $_FILES['inputKTIBing']['tmp_name'];
            $nama_baru_bing = 'KTI B.Ing_' . $data['mahasiswa']['nim'] . '_' . $kti_bing;
            if (!empty($kti_bing)) {
                $location = 'assets/upload-berkas/';
                if (move_uploaded_file($tmp_bing, $location . $nama_baru_bing)) {
                    $update_bing = array(
                        'jenis_berkas' => 'kti-b.ing',
                        'file_berkas' => $nama_baru_bing
                    );
                    $this->user_model->updateBerkas($id_bing, $update_bing);
                }
            }
            
            // $video = $_FILES['inputVideo']['name'];
            // $tmp_video = $_FILES['inputVideo']['tmp_name'];
            // $nama_baru_video = 'Video_' . $data['mahasiswa']['nim'] . '_' . $video;
            // if (!empty($video)) {
            //     $location = 'assets/upload-berkas/';
            //     if (move_uploaded_file($tmp_video, $location . $nama_baru_video)) {
            //         $update_video = array(
            //             'jenis_berkas' => 'presentasi',
            //             'file_berkas' => $nama_baru_video
            //         );
            //         $this->user_model->updateBerkas($id_video, $update_video);
            //     }
            // }
            redirect('User');
        }
    }
    }

    public function viewBerkas($jenis_berkas)
    {
        $id_mhs = $this->session->userdata('id_mhs');
        $data['title'] = 'Simawa Filkom UB';
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['id_mhs' => $id_mhs])->row_array();
        $data['berkas'] = $this->user_model->viewBerkas($jenis_berkas, $id_mhs)->row_array();
        if (!$data['mahasiswa']) {
            redirect('auth');
        } else{
            $this->load->view('templates/header', $data);
            $this->load->view('users/topbar', $data);
            $this->load->view('users/viewberkas', $data);
            $this->load->view('templates/footer-mhs');
        }
    }
    public function viewbuktiprestasi($bukti)
    {
        $id_mhs = $this->session->userdata('id_mhs');
        $data['title'] = 'Simawa Filkom UB';
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['id_mhs' => $id_mhs])->row_array();
        $data['bukti'] = $bukti;
        if (!$data['mahasiswa']) {
            redirect('auth');
        } else{
            $this->load->view('templates/header', $data);
            $this->load->view('users/topbar', $data);
            $this->load->view('users/viewbuktiprestasi', $data);
            $this->load->view('templates/footer-mhs');
        }
    }

    public function prestasi()
    {
        $data['title'] = 'Simawa Filkom UB';
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['id_mhs' => $this->session->userdata('id_mhs')])->row_array();
        $data['listkompetisi'] = $this->prestasi->selectDetailPrestasi('kompetisi');
        $data['listbukankompetisi'] = $this->prestasi->selectDetailPrestasi('Bukan Kompetisi');
        $data['listkepemimpinan'] = $this->prestasi->selectDetailPrestasi('Kepemimpinan');
        $data['jumlah_kompetisi'] = count($data['listkompetisi']->result()) + count($data['listbukankompetisi']->result())+count($data['listkepemimpinan']->result());

        if (!$data['mahasiswa']) {
            redirect('auth');
        } else{
        $this->load->view('templates/header', $data);
        $this->load->view('users/topbar', $data);
        $this->load->view('users/edit-prestasi', $data);
        $this->load->view('templates/footer-mhs');}
    }

    // METHOD ADD NYA SAMA UPDATE NYA KUDU DIGANTI YG NGISI NILAI. MODELNYA JUGA DISESUAIIN
    public function addkompetisi()
    {
        $id_mhs = $this->session->userdata('id_mhs');
        $bidang = $this->input->post('bidang');
        $capaian = $this->input->post('capaian');
        $keterangan = $this->input->post('keterangan');
        $judul_kegiatan = $this->input->post('judul_kegiatan');
        $tahun_perolehan = $this->input->post('tahun_perolehan');
        $penyelenggara = $this->input->post('penyelenggara');
        $tingkat = $this->input->post('tingkat');
        $keanggotaan = $this->input->post('keanggotaan');

        if (isset($_FILES['bukti']['name'])) {
            $bukti = $_FILES['bukti']['name'];
            $tmp = $_FILES['bukti']['tmp_name'];
            $nama_baru = 'Prestasi_' . $id_mhs . '_' . $bukti;
            if (!empty($bukti)) {
                $location = 'assets/upload-prestasi/';
                if (move_uploaded_file($tmp, $location . $nama_baru)) {
                    if ($tingkat == 'Internasional') {
                        if ($capaian == 'Juara 1') {
                            if ($keanggotaan == 'Individu') {
                                $nilai=13;
                            } else {
                                $nilai= 6.5;
                            }
                        } elseif ($capaian == 'Juara 2') {
                            if ($keanggotaan == 'Individu') {
                                $nilai= 10;
                            } else {
                                $nilai =  5;
                            }
                        } elseif ($capaian == 'Juara 3') {
                            if ($keanggotaan == 'Individu') {
                                $nilai = 11;
                            } else {
                                $nilai = 5.5;
                            }
                        }
                    } elseif ($tingkat == 'Regional') {
                        if ($capaian == 'Juara 1') {
                            if ($keanggotaan == 'Individu') {
                                $nilai = 10;
                            } else {
                                $nilai = 5;
                            }
                        } elseif ($capaian == 'Juara 2') {
                            if ($keanggotaan == 'Individu') {
                                $nilai = 9;
                            } else {
                                $nilai = 4.5;
                            }
                        } elseif ($capaian == 'Juara 3') {
                            if ($keanggotaan == 'Individu') {
                                $nilai = 8;
                            } else {
                                $nilai = 4;
                            }
                        }
                    } elseif ($tingkat == 'Nasional') {
                        if ($capaian == 'Juara 1') {
                            if ($keanggotaan == 'Individu') {
                                $nilai = 7;
                            } else {
                                $nilai = 3.5;
                            }
                        } elseif ($capaian == 'Juara 2') {
                            if ($keanggotaan == 'Individu') {
                                $nilai = 6;
                            } else {
                                $nilai= 3;
                            }
                        } elseif ($capaian == 'Juara 3') {
                            if ($keanggotaan == 'Individu') {
                                $nilai = 5;
                            } else {
                                $nilai = 2.5;
                            }
                        }
                    } elseif ($tingkat == 'Provinsi') {
                        if ($capaian == 'Juara 1') {
                            if ($keanggotaan == 'Individu') {
                                $nilai =  4;
                            } else {
                                $nilai = 2;
                            }
                        } elseif ($capaian == 'Juara 2') {
                            if ($keanggotaan == 'Individu') {
                                $nilai = 3;
                            } else {
                                $nilai =  1.5;
                            }
                        } elseif ($capaian == 'Juara 3') {
                            if ($keanggotaan == 'Individu') {
                                $nilai=2;
                            } else {
                                $nilai= 1;
                            }
                        }
                    }
                    $this->prestasi->updateNilai($id_mhs, $nilai);
                    $this->prestasi->insertprestasi($id_mhs, $bidang, $capaian, $keterangan, $judul_kegiatan, $tahun_perolehan, $penyelenggara, $tingkat, $keanggotaan, $nama_baru, $nilai);
                }
            }
        }
        redirect('User/prestasi');
    }

    public function updateKompetisi($id)
    {
        $id = $this->uri->segment(3);
        $id_mhs = $this->session->userdata('id_mhs');
        $bidang = $this->input->post('bidang');
        $capaian = $this->input->post('capaian');
        $keterangan = $this->input->post('keterangan');
        $judul_kegiatan = $this->input->post('judul_kegiatan');
        $tahun_perolehan = $this->input->post('tahun_perolehan');
        $penyelenggara = $this->input->post('penyelenggara');
        $tingkat = $this->input->post('tingkat');
        $keanggotaan = $this->input->post('keanggotaan');
        $old_bukti = $this->prestasi->bukti($id)->row_array();

        if (isset($_FILES['bukti']['name'])) {
            $bukti = $_FILES['bukti']['name'];
            $tmp = $_FILES['bukti']['tmp_name'];
            $nama_baru = 'Prestasi_' . $id_mhs . '_' . $bukti;
            if (!empty($bukti)) {
                $location = 'assets/upload-prestasi/';
                unlink('assets/upload-prestasi/' . $old_bukti['bukti']);
                if (move_uploaded_file($tmp, $location . $nama_baru)) {
                    if ($tingkat == 'Internasional') {
                        if ($capaian == 'Juara 1') {
                            if ($keanggotaan == 'Individu') {
                                $nilai=13;
                            } else {
                                $nilai= 6.5;
                            }
                        } elseif ($capaian == 'Juara 2') {
                            if ($keanggotaan == 'Individu') {
                                $nilai= 10;
                            } else {
                                $nilai =  5;
                            }
                        } elseif ($capaian == 'Juara 3') {
                            if ($keanggotaan == 'Individu') {
                                $nilai = 11;
                            } else {
                                $nilai = 5.5;
                            }
                        }
                    } elseif ($tingkat == 'Regional') {
                        if ($capaian == 'Juara 1') {
                            if ($keanggotaan == 'Individu') {
                                $nilai = 10;
                            } else {
                                $nilai = 5;
                            }
                        } elseif ($capaian == 'Juara 2') {
                            if ($keanggotaan == 'Individu') {
                                $nilai = 9;
                            } else {
                                $nilai = 4.5;
                            }
                        } elseif ($capaian == 'Juara 3') {
                            if ($keanggotaan == 'Individu') {
                                $nilai = 8;
                            } else {
                                $nilai = 4;
                            }
                        }
                    } elseif ($tingkat == 'Nasional') {
                        if ($capaian == 'Juara 1') {
                            if ($keanggotaan == 'Individu') {
                                $nilai = 7;
                            } else {
                                $nilai = 3.5;
                            }
                        } elseif ($capaian == 'Juara 2') {
                            if ($keanggotaan == 'Individu') {
                                $nilai = 6;
                            } else {
                                $nilai= 3;
                            }
                        } elseif ($capaian == 'Juara 3') {
                            if ($keanggotaan == 'Individu') {
                                $nilai = 5;
                            } else {
                                $nilai = 2.5;
                            }
                        }
                    } elseif ($tingkat == 'Provinsi') {
                        if ($capaian == 'Juara 1') {
                            if ($keanggotaan == 'Individu') {
                                $nilai =  4;
                            } else {
                                $nilai = 2;
                            }
                        } elseif ($capaian == 'Juara 2') {
                            if ($keanggotaan == 'Individu') {
                                $nilai = 3;
                            } else {
                                $nilai =  1.5;
                            }
                        } elseif ($capaian == 'Juara 3') {
                            if ($keanggotaan == 'Individu') {
                                $nilai=2;
                            } else {
                                $nilai= 1;
                            }
                        }
                    }

                    $data = array(
                        'bidang' => $bidang,
                        'capaian' => $capaian,
                        'keterangan' => $keterangan,
                        'judul_kegiatan' => $judul_kegiatan,
                        'tahun_perolehan' => $tahun_perolehan,
                        'penyelenggara' => $penyelenggara,
                        'tingkat' => $tingkat,
                        'keanggotaan' => $keanggotaan,
                        'bukti' => $nama_baru,
                        'nilai' => $nilai
                    );

                    $where = array(
                        'id_prestasi' => $id,
                        'id_mhs' => $id_mhs
                    );
                    $this->prestasi->updateMinNilai($id_mhs, $old_bukti['nilai']);
                    $this->prestasi->updateNilai($id_mhs, $nilai);
                    $this->prestasi->editPrestasi($where, $data);
                }
            }
        }
        redirect('User/prestasi');
    }

    public function addbukankompetisi()
    {
        $id_mhs = $this->session->userdata('id_mhs');
        $bidang = $this->input->post('bidang');
        $keterangan = $this->input->post('keterangan');
        $judul_kegiatan = $this->input->post('judul_kegiatan');
        $tahun_perolehan = $this->input->post('tahun_perolehan');
        $penyelenggara = $this->input->post('penyelenggara');
        $tingkat = $this->input->post('tingkat');
        $keanggotaan = $this->input->post('keanggotaan');
        $capaian = $this->input->post('capaian');

        if (isset($_FILES['bukti']['name'])) {
            $bukti = $_FILES['bukti']['name'];
            $tmp = $_FILES['bukti']['tmp_name'];
            $nama_baru = 'Prestasi_' . $id_mhs . '_' . $bukti;
            if (!empty($bukti)) {
                $location = 'assets/upload-prestasi/';
                if (move_uploaded_file($tmp, $location . $nama_baru)) {
                    if ($tingkat == 'Internasional') {
                        if ($keanggotaan == 'Individu') {
                            $nilai = 8;
                        } else {
                            $nilai =4;
                        }
                    } elseif ($tingkat == 'Regional') {
                        if ($keanggotaan == 'Individu') {
                            $nilai = 6;
                        } else {
                            $nilai = 3;
                        }
                    } elseif ($tingkat == 'Nasional') {
                        if ($keanggotaan == 'Individu') {
                            $nilai = 4;
                        } else {
                            $nilai = 2;
                        }
                    } elseif ($tingkat == 'Provinsi' or $tingkat == 'Universitas') {
                        if ($keanggotaan == 'Individu') {
                            $nilai =2;
                        } else {
                            $nilai = 1 ;
                        }
                    }
                    $this->prestasi->updateNilai($id_mhs, $nilai);
                    $this->prestasi->insertprestasi($id_mhs, $bidang, $capaian, $keterangan, $judul_kegiatan, $tahun_perolehan, $penyelenggara, $tingkat, $keanggotaan, $nama_baru, $nilai);
                }
            }
        }
        redirect('User/prestasi');
    }

    public function updatebukankompetisi($id)
    {
        $id = $this->uri->segment(3);
        $id_mhs = $this->session->userdata('id_mhs');
        $bidang = $this->input->post('bidang');
        $keterangan = $this->input->post('keterangan');
        $judul_kegiatan = $this->input->post('judul_kegiatan');
        $tahun_perolehan = $this->input->post('tahun_perolehan');
        $penyelenggara = $this->input->post('penyelenggara');
        $tingkat = $this->input->post('tingkat');
        $keanggotaan = $this->input->post('keanggotaan');
        $capaian = $this->input->post('capaian');
        $old_bukti = $this->prestasi->bukti($id)->row_array();

        if (isset($_FILES['bukti']['name'])) {
            $bukti = $_FILES['bukti']['name'];
            $tmp = $_FILES['bukti']['tmp_name'];
            $nama_baru = 'Prestasi_' . $id_mhs . '_' . $bukti;
            if (!empty($bukti)) {
                $location = 'assets/upload-prestasi/';
                unlink('assets/upload-prestasi/' . $old_bukti['bukti']);
                if (move_uploaded_file($tmp, $location . $nama_baru)) {
                    if ($tingkat == 'Internasional') {
                        if ($keanggotaan == 'Individu') {
                            $nilai = 8;
                        } else {
                            $nilai =4;
                        }
                    } elseif ($tingkat == 'Regional') {
                        if ($keanggotaan == 'Individu') {
                            $nilai = 6;
                        } else {
                            $nilai = 3;
                        }
                    } elseif ($tingkat == 'Nasional') {
                        if ($keanggotaan == 'Individu') {
                            $nilai = 4;
                        } else {
                            $nilai = 2;
                        }
                    } elseif ($tingkat == 'Provinsi' or $tingkat == 'Universitas') {
                        if ($keanggotaan == 'Individu') {
                            $nilai =2;
                        } else {
                            $nilai = 1 ;
                        }
                    }
                    $data = array(
                        'bidang' => $bidang,
                        'capaian' => $capaian,
                        'keterangan' => $keterangan,
                        'judul_kegiatan' => $judul_kegiatan,
                        'tahun_perolehan' => $tahun_perolehan,
                        'penyelenggara' => $penyelenggara,
                        'tingkat' => $tingkat,
                        'keanggotaan' => $keanggotaan,
                        'bukti' => $nama_baru,
                        'nilai' => $nilai
                    );

                    $where = array(
                        'id_prestasi' => $id,
                        'id_mhs' => $id_mhs
                    );
                    $this->prestasi->updateMinNilai($id_mhs, $old_bukti['nilai']);
                    $this->prestasi->updateNilai($id_mhs, $nilai);
                    $this->prestasi->editPrestasi($where, $data);
                }
            }
        }
        redirect('User/prestasi');
    }

    public function addkepemimpinan()
    {
        $id_mhs = $this->session->userdata('id_mhs');
        $bidang = $this->input->post('bidang');
        $keterangan = $this->input->post('keterangan');
        $judul_kegiatan = $this->input->post('judul_kegiatan');
        $tahun_perolehan = $this->input->post('tahun_perolehan');
        $tingkat = $this->input->post('tingkat');
        $capaian = $this->input->post('capaian');

        if (isset($_FILES['bukti']['name'])) {
            $bukti = $_FILES['bukti']['name'];
            $tmp = $_FILES['bukti']['tmp_name'];
            $nama_baru = 'Prestasi_' . $id_mhs . '_' . $bukti;
            if (!empty($bukti)) {
                $location = 'assets/upload-prestasi/';
                if (move_uploaded_file($tmp, $location . $nama_baru)) {                    
                    if ($bidang == 'Badan Semi Otonom') { //gol 2
                        if ($capaian == 'Ketua') {
                            if ($tingkat == 'Internasional') {
                                $nilai = 8;
                            } else if ($tingkat == 'Regional') {
                                $nilai = 7;
                            } else if ($tingkat == 'Nasional') {
                                $nilai = 6;
                            } else if ($tingkat == 'Provinsi') {
                                $nilai = 5;
                            } else if ($tingkat == 'Universitas') {
                                $nilai =  4;
                            } elseif ($tingkat == 'Fakultas' || $tingkat == 'Program Studi') {
                                $nilai = 3;
                            }
                        } else { //bph
                            if ($tingkat == 'Internasional') {
                                $nilai = 6;
                            } else if ($tingkat == 'Regional') {
                                $nilai = 5;
                            } else if ($tingkat == 'Nasional') {
                                $nilai = 4;
                            } else if ($tingkat == 'Provinsi') {
                                $nilai = 3;
                            } else if ($tingkat == 'Universitas') {
                                $nilai = 2;
                            } elseif ($tingkat == 'Fakultas' || $tingkat == 'Program Studi') {
                                $nilai = 1;
                            }
                        }
                    } else { //GOL 1
                        if ($capaian == 'Ketua') {
                            if ($tingkat == 'Internasional') {
                                $nilai = 12;
                            } else if ($tingkat == 'Regional') {
                                $nilai = 11;
                            } else if ($tingkat == 'Nasional') {
                                $nilai = 10;
                            } else if ($tingkat == 'Provinsi') {
                                $nilai = 9;
                            } else if ($tingkat == 'Universitas') {
                                $nilai = 8;
                            } elseif ($tingkat == 'Fakultas' || $tingkat == 'Program Studi') {
                                $nilai = 7;
                            }
                        } else { //bph
                            if ($tingkat == 'Internasional') {
                                $nilai =  10;
                            } else if ($tingkat == 'Regional') {
                                $nilai = 9;
                            } else if ($tingkat == 'Nasional') {
                                $nilai =8;
                            } else if ($tingkat == 'Provinsi') {
                                $nilai = 7;
                            } else if ($tingkat == 'Universitas') {
                                $nilai =6;
                            } elseif ($tingkat == 'Fakultas' || $tingkat == 'Program Studi') {
                                $nilai =5;
                            }
                        }
                    }
                    $this->prestasi->updateNilai($id_mhs, $nilai);
                    $this->prestasi->insertkepemimpinan($id_mhs, $bidang, $keterangan, $judul_kegiatan, $tahun_perolehan, $tingkat, $capaian, $nama_baru, $nilai);
                }
            }
        }

        redirect('User/prestasi');
    }

    public function updatekepemimpinan($id)
    {
        $id = $this->uri->segment(3);
        $id_mhs = $this->session->userdata('id_mhs');
        $bidang = $this->input->post('bidang');
        $keterangan = $this->input->post('keterangan');
        $judul_kegiatan = $this->input->post('judul_kegiatan');
        $tahun_perolehan = $this->input->post('tahun_perolehan');
        $tingkat = $this->input->post('tingkat');
        $capaian = $this->input->post('capaian');
        $old_bukti = $this->prestasi->bukti($id)->row_array();

        if (isset($_FILES['bukti']['name'])) {
            $bukti = $_FILES['bukti']['name'];
            $tmp = $_FILES['bukti']['tmp_name'];
            $nama_baru = 'Prestasi_' . $id_mhs . '_' . $bukti;
            if (!empty($bukti)) {
                $location = 'assets/upload-prestasi/';
                unlink('assets/upload-prestasi/' . $old_bukti['bukti']);
                if (move_uploaded_file($tmp, $location . $nama_baru)) {
                    if ($bidang == 'Badan Semi Otonom') { //gol 2
                        if ($capaian == 'Ketua') {
                            if ($tingkat == 'Internasional') {
                                $nilai = 8;
                            } else if ($tingkat == 'Regional') {
                                $nilai = 7;
                            } else if ($tingkat == 'Nasional') {
                                $nilai = 6;
                            } else if ($tingkat == 'Provinsi') {
                                $nilai = 5;
                            } else if ($tingkat == 'Universitas') {
                                $nilai =  4;
                            } elseif ($tingkat == 'Fakultas' || $tingkat == 'Program Studi') {
                                $nilai = 3;
                            }
                        } else { //bph
                            if ($tingkat == 'Internasional') {
                                $nilai = 6;
                            } else if ($tingkat == 'Regional') {
                                $nilai = 5;
                            } else if ($tingkat == 'Nasional') {
                                $nilai = 4;
                            } else if ($tingkat == 'Provinsi') {
                                $nilai = 3;
                            } else if ($tingkat == 'Universitas') {
                                $nilai = 2;
                            } elseif ($tingkat == 'Fakultas' || $tingkat == 'Program Studi') {
                                $nilai = 1;
                            }
                        }
                    } else { //GOL 1
                        if ($capaian == 'Ketua') {
                            if ($tingkat == 'Internasional') {
                                $nilai = 12;
                            } else if ($tingkat == 'Regional') {
                                $nilai = 11;
                            } else if ($tingkat == 'Nasional') {
                                $nilai = 10;
                            } else if ($tingkat == 'Provinsi') {
                                $nilai = 9;
                            } else if ($tingkat == 'Universitas') {
                                $nilai = 8;
                            } elseif ($tingkat == 'Fakultas' || $tingkat == 'Program Studi') {
                                $nilai = 7;
                            }
                        } else { //bph
                            if ($tingkat == 'Internasional') {
                                $nilai =  10;
                            } else if ($tingkat == 'Regional') {
                                $nilai = 9;
                            } else if ($tingkat == 'Nasional') {
                                $nilai =8;
                            } else if ($tingkat == 'Provinsi') {
                                $nilai = 7;
                            } else if ($tingkat == 'Universitas') {
                                $nilai =6;
                            } elseif ($tingkat == 'Fakultas' || $tingkat == 'Program Studi') {
                                $nilai =5;
                            }
                        }
                    }
                    $data = array(
                        'bidang' => $bidang,
                        'capaian' => $capaian,
                        'keterangan' => $keterangan,
                        'judul_kegiatan' => $judul_kegiatan,
                        'tahun_perolehan' => $tahun_perolehan,
                        'tingkat' => $tingkat,
                        'bukti' => $nama_baru,
                        'nilai' => $nilai
                    );

                    $where = array(
                        'id_prestasi' => $id,
                        'id_mhs' => $id_mhs
                    );
                    $this->prestasi->updateMinNilai($id_mhs, $old_bukti['nilai']);
                    $this->prestasi->updateNilai($id_mhs, $nilai);
                    $this->prestasi->editPrestasi($where, $data);
                }
            }
        }
        redirect('User/prestasi');
    }

    public function hapusPrestasi()
    {
        $id_prestasi = $this->uri->segment(3);
        $id_mhs = $this->session->userdata('id_mhs');
        $old_bukti = $this->prestasi->bukti($id_prestasi)->row_array();
        unlink('assets/upload-prestasi/' . $old_bukti['bukti']);
        $this->prestasi->updateMinNilai($id_mhs, $old_bukti['nilai'] );
        $this->prestasi->deletePrestasi($id_prestasi);
        redirect('User/prestasi');
    }
}

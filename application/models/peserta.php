<?php

class Peserta extends CI_Model
{
    public function daftarPeserta()
    {
        $query = $this->db->query("SELECT * FROM mahasiswa WHERE status='Terdaftar'");
        return $query;
    }

    public function viewPeserta($id_mhs)
    {
        $query = $this->db->get_where('mahasiswa', ['id_mhs' => $id_mhs]);
        return $query;
    }
    public function selectPrestasi($id_mhs)
    {
        $query = $this->db->get_where('prestasi', ['id_mhs' => $id_mhs]);
        return $query;
    }
    public function viewBerkas($jenis_berkas, $id_mhs)
    {
        $query = $this->db->query("SELECT file_berkas,jenis_berkas,id_mhs FROM berkas WHERE jenis_berkas='$jenis_berkas' and id_mhs='$id_mhs'");
        return $query;
    }
}

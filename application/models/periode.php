<?php

class periode extends CI_Model
{
    public function ambilPeriode()
    {
        $query = $this->db->query("SELECT id_waktu, waktu_mulai, waktu_selesai FROM periode ORDER BY id_waktu DESC LIMIT 1");
        return $query;
    }

    public function addPeriode($id_admin, $waktu_mulai, $waktu_selesai)
    {
        $query = $this->db->query("INSERT INTO periode (id_admin, waktu_mulai, waktu_selesai) VALUES ('$id_admin', '$waktu_mulai', '$waktu_selesai');");
        return $query;
    }
}

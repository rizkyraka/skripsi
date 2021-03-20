<?php
class user_model extends CI_Model
{
    public function daftar($where, $data, $table)
    {
        $this->db->set('status', $data);
        $this->db->where('nim', $where);
        $this->db->update($table);
    }
    public function updateData($id_mhs, $data)
    {
        $this->db->where('id_mhs', $id_mhs);
        $this->db->update('mahasiswa', $data);
    }
    public function insertData($data)
    {
        $this->db->insert('berkas', $data);
    }

    public function updateBerkas($id_berkas, $data)
    {
        $this->db->where('id_berkas', $id_berkas);
        $this->db->update('berkas', $data);
    }

    public function cekberkas($id_mhs)
    {
        $query = $this->db->query("SELECT id_mhs,
        max(case when berkas.jenis_berkas = 'kti' then berkas.id_berkas end) as kti,
        max(case when berkas.jenis_berkas = 'kti-b.ing' then berkas.id_berkas end) as bing
        FROM berkas WHERE id_mhs =$id_mhs");
        return $query;
    }

    public function berkas($id_berkas)
    {
        $query = $this->db->query("SELECT file_berkas FROM berkas WHERE id_berkas =$id_berkas");
        return $query;
    }
    public function viewBerkas($jenis_berkas, $id_mhs)
    {
        $query = $this->db->query("SELECT file_berkas,jenis_berkas FROM berkas WHERE jenis_berkas='$jenis_berkas' and id_mhs='$id_mhs'");
        return $query;
    }
}

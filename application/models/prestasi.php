<?php

class prestasi extends CI_Model
{
    public function selectPrestasi()
    {
        $id_mhs = $this->session->userdata('id_mhs');
        $query = $this->db->get_where('prestasi', ['id_mhs' => $id_mhs]);
        return $query;
    }

    public function selectDetailPrestasi($keterangan)
    {
        $id_mhs = $this->session->userdata('id_mhs');
        $query = $this->db->get_where('prestasi', ['id_mhs' => $id_mhs, 'keterangan' => $keterangan]);
        return $query;
    }

    public function insertprestasi($id_mhs, $bidang, $capaian, $keterangan, $judul_kegiatan, $tahun_perolehan, $penyelenggara, $tingkat, $keanggotaan, $bukti, $nilai)
    {
        $query = $this->db->query("INSERT INTO prestasi (id_mhs, bidang, keterangan, judul_kegiatan, tahun_perolehan, penyelenggara, tingkat, keanggotaan, capaian, bukti, nilai) VALUES ('$id_mhs', '$bidang', '$keterangan', '$judul_kegiatan', '$tahun_perolehan', '$penyelenggara', '$tingkat', '$keanggotaan', '$capaian','$bukti', '$nilai')");
        return $query;
    }

    public function updateNilai($id_mhs, $nilai)
    {
        $this->db->set('prestasi', 'prestasi + ' . $nilai, FALSE);
        $this->db->where('id_mhs', $id_mhs);
        $this->db->update('penilaian');
    }

    public function updateMinNilai($id_mhs, $nilai)
    {
        $this->db->set('prestasi', 'prestasi - ' . $nilai, FALSE);
        $this->db->where('id_mhs', $id_mhs);
        $this->db->update('penilaian');
    }

    public function insertkepemimpinan($id_mhs, $bidang, $keterangan, $judul_kegiatan, $tahun_perolehan, $tingkat, $capaian, $bukti)
    {
        $query = $this->db->query("INSERT INTO prestasi (id_mhs, bidang, keterangan, judul_kegiatan, tahun_perolehan , tingkat , capaian, bukti) VALUES ('$id_mhs', '$bidang', '$keterangan', '$judul_kegiatan', '$tahun_perolehan' , '$tingkat' , '$capaian', '$bukti')");
        return $query;
    }

    public function deletePrestasi($id_prestasi)
    {
        $this->db->where('id_prestasi', $id_prestasi);
        $this->db->delete('prestasi');
    }

    public function editPrestasi($where, $data)
    {
        $this->db->where($where);
        $this->db->update('prestasi', $data);
    }

    public function bukti($id)
    {
        return $this->db->query("SELECT nilai, bukti FROM prestasi WHERE id_prestasi='$id'");
    }

}

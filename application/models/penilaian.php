<?php

class penilaian extends CI_Model
{

    public function detailPrestasi($id_mhs)
    {
        $query = $this->db->query("SELECT prestasi.id_mhs, prestasi.id_prestasi, mahasiswa.nama, prestasi.judul_kegiatan, prestasi.bidang, prestasi.capaian, prestasi.tingkat, prestasi.keanggotaan, prestasi.bukti, prestasi.nilai
        FROM prestasi INNER JOIN mahasiswa ON prestasi.id_mhs = mahasiswa.id_mhs 
        WHERE mahasiswa.id_mhs='$id_mhs'");
        return $query;
    }

    public function hapusPrestasi($id_prestasi)
    {
        $query = $this->db->query("DELETE FROM prestasi WHERE id_prestasi='$id_prestasi'");
        return $query;
    }

    public function hapusPenilaian($id_mhs)
    {
        $query = $this->db->query("DELETE FROM penilaian WHERE id_mhs='$id_mhs'");
        return $query;
    }

    public function gugurkanPeserta($id_mhs)
    {
        $this->db->set('status', 'Gugur');
        $this->db->where('id_mhs', $id_mhs);
        $this->db->update('mahasiswa');
    }

    public function berkas()
    {
        $query1 = $this->db->query("SELECT mahasiswa.nama, mahasiswa.id_mhs, mahasiswa.ipk, penilaian.prestasi,
        max(case when berkas.jenis_berkas = 'kti' then penilaian.kti end) as kti,
        MAX(case when berkas.jenis_berkas = 'kti' then 1 else 0 end) as tabel_kti,
        
        max(case when berkas.jenis_berkas = 'kti-b.ing' then penilaian.b_inggris end) as bing,
        max(case when berkas.jenis_berkas = 'kti-b.ing' then 1 else 0 end) as tabel_bing

        from mahasiswa LEFT JOIN berkas ON mahasiswa.id_mhs = berkas.id_mhs
        LEFT JOIN penilaian ON penilaian.id_mhs=berkas.id_mhs
        WHERE mahasiswa.status = 'Terdaftar'
        GROUP BY mahasiswa.id_mhs");
        return $query1;
    }
    
    // public function daftarPrestasi()
    // {
    //     $query = $this->db->query("SELECT mahasiswa.id_mhs, mahasiswa.nama, SUM(nilai) AS akumulasi FROM mahasiswa LEFT JOIN prestasi ON prestasi.id_mhs = mahasiswa.id_mhs
    //     WHERE mahasiswa.status = 'Terdaftar'
    //     GROUP BY mahasiswa.id_mhs");
    //     return $query;
    // }

    // public function cekBerkas($cekBerkas)
    // {
    //     $query = $this->db->query("SELECT id_mhs FROM nilai_berkas WHERE id_mhs = '$cekBerkas'");
    //     return $query;
    // }

    // public function addNilai($id_mhs, $id_admin, $id_berkas, $nilai)
    // {
    //     $query = $this->db->query("INSERT INTO nilai_berkas (id_mhs, id_admin, id_berkas, nilai_berkas) VALUES ('$id_mhs', '$id_admin', '$id_berkas', '$nilai')");
    //     return $query;
    // }

    public function addNilai($data)
    {
        $this->db->insert('penilaian', $data);
        //buat di controller user,pas mahasiswa terdaftar login ntar langsung input nilai
    }

    public function updateNilai($id_mhs, $data)
    {
        $this->db->where('id_mhs', $id_mhs);
        $this->db->update('penilaian', $data);
    }

    public function getNilai($id_mhs)
    {
        return $this->db->get_where('nilai', ['id_mhs' => $id_mhs]);
    }

    public function nilaiPrestasi($id_mhs)
    {
        $query = $this->db->query("SELECT SUM(nilai) AS akumulasi FROM prestasi WHERE id_mhs='$id_mhs'");
        return $query;
    }

    // public function getNilai($id_mhs)
    // {
    //     return $this->db->get_where('nilai', ['id_mhs' => $id_mhs]);
    // }

    // public function getAllNilai()
    // {
    //     return $this->db->get();
    // }
}

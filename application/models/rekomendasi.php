<?php
class rekomendasi extends CI_Model
{

    public function namamahasiswa()
    {
        $query = $this->db->query("SELECT nama, nim FROM mahasiswa WHERE status='Terdaftar'");
        return $query;
    }

    public function daftarPenilaian()
    {
        $query = $this->db->query("SELECT mahasiswa.nama, mahasiswa.nim, mahasiswa.id_mhs, mahasiswa.ipk, penilaian.kti, penilaian.prestasi, penilaian.b_inggris
        FROM mahasiswa LEFT JOIN penilaian ON mahasiswa.id_mhs=penilaian.id_mhs
        WHERE mahasiswa.status='Terdaftar'
        GROUP BY mahasiswa.id_mhs");
        return $query;
    }

    public function penilaianBerkas()
    {
        $query = $this->db->query("SELECT mahasiswa.nama, mahasiswa.id_mhs,mahasiswa.ipk, mahasiswa.nim,
        max(case when berkas.jenis_berkas = 'kti' then nilai_berkas.nilai_berkas end) as kti,        
        max(case when berkas.jenis_berkas = 'kti-b.ing' then nilai_berkas.nilai_berkas end) as bing,        
        max(case when berkas.jenis_berkas = 'presentasi' then nilai_berkas.nilai_berkas end) as presentasi
        from mahasiswa LEFT JOIN berkas ON mahasiswa.id_mhs = berkas.id_mhs
        LEFT JOIN nilai_berkas ON nilai_berkas.id_berkas=berkas.id_berkas and nilai_berkas.id_mhs = berkas.id_mhs
        WHERE mahasiswa.status = 'Terdaftar'
        GROUP BY mahasiswa.id_mhs");
        return $query;
    }

    public function penilaianPrestasi($id_mhs)
    {
        $query = $this->db->get_where('nilai_prestasi', ['id_mhs' => $id_mhs]);
    }

    public function skala(){
        $query = $this->db->query("SELECT kriteria1, kriteria2, nilai FROM skala");
        return $query;
    }

    public function editskala($kriteria1, $kriteria2, $nilai)
    {
        $data = array(
            'nilai' => $nilai,
         );
        $this->db->where('kriteria1', $kriteria1);
        $this->db->where('kriteria2', $kriteria2);
        $this->db->update('skala', $data);
    }
    public function addskala($data)
    {
        $this->db->insert('skala', $data);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rapormid_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function ambilnilai($siswa_id)
    {
        $query = $this->db->select('a.id, a.nama, a.nis, a.nisn, b.nama_kelas, e.nama as wali_kelas, c.nama_pelajaran, d.nilai_pt, d.nilai_mt')
            ->from('siswa a')
            ->join('kelas b', 'a.kelas_id = b.id')
            ->join('nilaimid d', 'a.id = d.siswa_id')
            ->join('pelajaran c', 'c.id = d.pelajaran_id')
            ->join('users e', 'b.wali_kelas = e.id')
            ->where('a.id', $siswa_id);

        return $query->get()->result_array();
    }
}

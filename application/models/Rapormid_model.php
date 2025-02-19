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
        $this->db->select('*');
        $this->db->from('nilaimid');
        $this->db->where('siswa_id', $siswa_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function ratakelas($kelas_id, $pelajaran_id)
    {
        $this->db->select('kelas_id, AVG(nilai_pt) AS rata_nilai_pt, AVG(nilai_mt) AS rata_nilai_mt');
        $this->db->from('nilaimid');
        $this->db->where('kelas_id', $kelas_id);
        $this->db->where('pelajaran_id', $pelajaran_id);
        $query = $this->db->get();
        return $query->row_array();
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rapormid_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function ambilnilai($siswa_id)
    {
        $this->db->where('siswa_id', $siswa_id);
        return $this->db->get('nilaimid')->result_array();
    }

    public function ratakelas($kelas_id, $pelajaran_id)
    {
        $this->db->select_avg('nilai_pt');
        $this->db->select_avg('nilai_mt');
        $this->db->where('kelas_id', $kelas_id);
        $this->db->where('pelajaran_id', $pelajaran_id);
        $query = $this->db->get('nilaimid');
        return $query->row_array();
    }
}

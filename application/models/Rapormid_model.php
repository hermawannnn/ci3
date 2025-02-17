<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rapormid_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function get_all()
    {
        $this->db->select('a.*, b.nama_kelas, c.nama_siswa, d.nama_pelajaran');
        $this->db->from('rapormidsemester a');
        $this->db->join('kelas b', 'a.kelas_id = b.id', 'left');
        $this->db->join('siswa c', 'a.siswa_id = c.id', 'left');
        $this->db->join('pelajaran d', 'a.pelajaran_id = d.id', 'left');
        return $this->db->get()->result();
    }

    public function get_siswa_by_kelas($kelas_id)
    {
        $this->db->where('kelas_id', $kelas_id);
        $query = $this->db->get('siswa');
        return $query->result();
    }
}

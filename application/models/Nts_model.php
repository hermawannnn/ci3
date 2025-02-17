<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nts_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // Function to get all records from the 'nilai' table
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('rapormidsemester a');
        $this->db->join('kelas b', 'a.kelas_id = b.id');
        $this->db->join('siswa c', 'a.siswa_id = c.id');
        $this->db->join('pelajaran d', 'a.pelajaran_id = d.id');
        $query = $this->db->get();
        return $query->result();
    }

    // Function to get records by user ID
    public function get_by_id_mengajar()
    {
        $this->db->select('a.*, b.nama_pelajaran as nama_pelajaran, c.nama_kelas as nama_kelas, d.nama as nama_user, e.nama_unit as nama_unit');
        $this->db->from('pembelajaran a');
        $this->db->join('pelajaran b', 'b.id = a.pelajaran_id', 'inner');
        $this->db->join('kelas c', 'c.id = a.kelas_id', 'inner');
        $this->db->join('users d', 'd.id = a.user_id', 'inner');
        $this->db->join('units e', 'e.id = a.unit_id', 'inner');
        $this->db->where('a.user_id', $this->session->userdata('id'));
        return $this->db->get()->result();
    }
}

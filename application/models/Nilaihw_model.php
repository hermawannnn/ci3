<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilaihw_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_all_nilaihw()
    {
        return $this->db->get('nilaihw')->result_array();
    }

    // Add your methods here
    public function get_siswa_by_kelas()
    {
        $kelas_id = $this->input->post('kelas_id');
        $query = $this->db->query("SELECT * FROM siswa WHERE kelas_id = $kelas_id");
        return $query->result_array();
    }
}

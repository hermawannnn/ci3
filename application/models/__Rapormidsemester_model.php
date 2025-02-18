<?php
class Rapormidsemester_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_nilai($kelas_id, $siswa_id, $pelajaran_id)
    {
        $this->db->where('kelas_id', $kelas_id);
        $this->db->where('siswa_id', $siswa_id);
        $this->db->where('pelajaran_id', $pelajaran_id);
        $query = $this->db->get('rapormidsemester');
        return $query->row();
    }

    public function get_nilai_by_kelas_siswa($kelas_id, $siswa_id)
    {
        $this->db->where('kelas_id', $kelas_id);
        $this->db->where('siswa_id', $siswa_id);
        $query = $this->db->get('rapormidsemester');
        return $query->row();
    }

    public function insert_nilai($data)
    {
        return $this->db->insert('rapormidsemester', $data);
    }

    public function update_nilai($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('rapormidsemester', $data);
    }
}

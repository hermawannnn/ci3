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

    public function get_average_score($student_id, $kelas_id)
    {
        $this->db->select_avg('(nilai_pt + nilai_mt) / 2', 'average_score');
        $this->db->where('siswa_id', $student_id);
        $this->db->where('kelas_id', $kelas_id);
        $query = $this->db->get('rapormidsemester');
        return $query->row();
    }

    public function get_teacher_name($teacher_id)
    {
        $this->db->select('nama_guru');
        $this->db->where('id', $teacher_id);
        $query = $this->db->get('guru');
        return $query->row();
    }

    public function get_nilai($kelas_id, $siswa_id, $pelajaran_id)
    {
        $this->db->where('kelas_id', $kelas_id);
        $this->db->where('siswa_id', $siswa_id);
        $this->db->where('pelajaran_id', $pelajaran_id);
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

    public function get_subject_score($pelajaran_id, $siswa_id)
    {
        $this->db->select('(a.nilai_pt + a.nilai_mt) / 2 AS score');
        $this->db->from('rapormidsemester a');
        $this->db->join('kelas b', 'a.kelas_id = b.id');
        $this->db->join('siswa c', 'a.siswa_id = c.id');
        $this->db->join('pelajaran d', 'a.pelajaran_id = d.id');
        $this->db->where('a.pelajaran_id', $pelajaran_id);
        $this->db->where('a.siswa_id', $siswa_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->score;
        } else {
            return null;
        }
    }
}

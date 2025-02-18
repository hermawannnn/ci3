<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Raport_model extends CI_Model
{

    public function get_pembelajaran()
    {
        $this->db->select('pembelajaran.*, kelas.nama_kelas, pelajaran.nama_pelajaran');
        $this->db->from('pembelajaran');
        $this->db->join('kelas', 'kelas.id = pembelajaran.kelas_id');
        $this->db->join('pelajaran', 'pelajaran.id = pembelajaran.pelajaran_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_siswa_by_kelas($kelas_id, $pelajaran_id)
    {
        $this->db->select('siswa.*');
        $this->db->from('siswa');
        $this->db->join('kelas_siswa', 'kelas_siswa.siswa_id = siswa.id');
        $this->db->where('kelas_siswa.kelas_id', $kelas_id);
        $this->db->where('kelas_siswa.pelajaran_id', $pelajaran_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_existing_nilai($kelas_id, $pelajaran_id, $siswa_id)
    {
        $this->db->where('kelas_id', $kelas_id);
        $this->db->where('pelajaran_id', $pelajaran_id);
        $this->db->where('siswa_id', $siswa_id);
        $query = $this->db->get('nilai');
        return $query->row();
    }

    public function insert_nilai($data)
    {
        $this->db->insert('nilai', $data);
    }

    public function update_nilai($kelas_id, $pelajaran_id, $siswa_id, $data)
    {
        $this->db->where('kelas_id', $kelas_id);
        $this->db->where('pelajaran_id', $pelajaran_id);
        $this->db->where('siswa_id', $siswa_id);
        $this->db->update('nilai', $data);
    }
}

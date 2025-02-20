<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilaideskripsimid_model extends CI_Model
{
    private $table = 'nilaideskripsimid';

    public function getAll()
    {
        $this->db->select('nilaideskripsimid.*, siswa.nama as nama_siswa, kelas.nama_kelas');
        $this->db->from($this->table);
        $this->db->join('siswa', 'siswa.id = nilaideskripsimid.siswa_id');
        $this->db->join('kelas', 'kelas.id = siswa.kelas_id');
        return $this->db->get()->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($data, $id)
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    public function getAllSiswa()
    {
        return $this->db->get('siswa')->result_array();
    }
    public function getAllKelas()
    {
        return $this->db->get('kelas')->result_array();
    }
}

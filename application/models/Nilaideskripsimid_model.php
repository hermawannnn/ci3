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

    public function get_nilaidesk_by_kelas($kelas_id, $siswa_id = null)
    {
        $this->db->select('nilaideskripsimid.id, siswa.id as siswa_id, siswa.nama as nama_siswa, nilaideskripsimid.deskripsi');
        $this->db->from('siswa');
        $this->db->join('nilaideskripsimid', 'siswa.id = nilaideskripsimid.siswa_id', 'left');
        if ($kelas_id !== null) {
            $this->db->where('siswa.kelas_id', $kelas_id);
        }
        if ($siswa_id !== null) {
            $this->db->where('siswa.id', $siswa_id);
        }
        return $this->db->get()->result_array();
    }

    public function save_or_update($data)
    {
        // Check if record exists
        $existing = $this->db->get_where($this->table, ['siswa_id' => $data['siswa_id']])->row();

        if ($existing) {
            // Update existing record
            return $this->db->update($this->table, $data, ['siswa_id' => $data['siswa_id']]);
        } else {
            // Insert new record
            return $this->db->insert($this->table, $data);
        }
    }
}

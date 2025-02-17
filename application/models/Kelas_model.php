<?php
class Kelas_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $this->db->select('kelas.*, users.nama as nama_wali_kelas');
        $this->db->from('kelas');
        $this->db->join('users', 'users.id = kelas.wali_kelas', 'left');
        return $this->db->get()->result();
    }

    public function insert($data)
    {
        // Menyimpan data kelas ke database
        return $this->db->insert('kelas', $data);
    }

    public function get_by_id($id)
    {
        $this->db->select('kelas.*, users.nama as nama_wali_kelas');
        $this->db->from('kelas');
        $this->db->join('users', 'users.id = kelas.wali_kelas', 'left');
        $this->db->where('kelas.id', $id);
        return $this->db->get()->row();
    }

    public function update($id, $data)
    {
        // Mengupdate data kelas di database
        $this->db->where('id', $id);
        return $this->db->update('kelas', $data);
    }

    public function delete($id)
    {
        // Menghapus data kelas berdasarkan id
        $this->db->where('id', $id);
        return $this->db->delete('kelas');
    }
}

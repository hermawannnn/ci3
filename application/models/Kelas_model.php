<?php
class Kelas_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        // Mengambil semua data kelas
        $query = $this->db->query('SELECT * FROM kelas');
        return $query->result();
    }

    public function insert($data)
    {
        // Menyimpan data kelas ke database
        return $this->db->insert('kelas', $data);
    }

    public function get_by_id($id)
    {
        // Mengambil data kelas berdasarkan id
        $query = $this->db->get_where('kelas', array('id' => $id));
        return $query->row();
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

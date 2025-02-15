<?php
class Pembelajaran_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        // Mengambil semua data pembelajaran
        $query = $this->db->query('SELECT * FROM pembelajaran a JOIN pelajaran b ON a.pelajaran_id = b.id JOIN kelas c ON a.kelas_id = c.id JOIN users d ON a.user_id = d.id JOIN units e ON a.unit_id = e.id');
        return $query->result();
    }

    public function insert($data)
    {
        // Menyimpan data pembelajaran ke database
        return $this->db->insert('pembelajaran', $data);
    }

    public function get_by_id($id)
    {
        // Mengambil data pembelajaran berdasarkan id
        $query = $this->db->get_where('pembelajaran', array('id' => $id));
        return $query->row();
    }

    public function update($id, $data)
    {
        // Mengupdate data pembelajaran di database
        $this->db->where('id', $id);
        return $this->db->update('pembelajaran', $data);
    }

    public function delete($id)
    {
        // Menghapus data pembelajaran berdasarkan id
        $this->db->where('id', $id);
        return $this->db->delete('pembelajaran');
    }
}

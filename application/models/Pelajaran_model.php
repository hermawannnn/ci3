<?php
class Pelajaran_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        // Mengambil semua data pelajaran
        $query = $this->db->query('SELECT * FROM pelajaran');
        return $query->result_array(); // Changed from result()
    }

    public function insert($data)
    {
        // Menyimpan data pelajaran ke database
        // $data['unit'] = 'default_unit'; // Add the 'unit' field to the data array
        return $this->db->insert('pelajaran', $data);
    }

    public function get_by_id($id)
    {
        // Mengambil data pelajaran berdasarkan id
        $query = $this->db->get_where('pelajaran', array('id' => $id));
        return $query->row();
    }

    public function update($id, $data)
    {
        // Mengupdate data pelajaran di database
        $this->db->where('id', $id);
        return $this->db->update('pelajaran', $data);
    }

    public function delete($id)
    {
        // Menghapus data pelajaran berdasarkan id
        $this->db->where('id', $id);
        return $this->db->delete('pelajaran');
    }

    public function count_by_pelajaran($id)
    {
        // Menghitung jumlah siswa berdasarkan id pelajaran
        $this->db->where('pelajaran_id', $id);
        $this->db->from('siswa');
        return $this->db->count_all_results();
    }

    public function get_all_pelajaran()
    {
        $query = $this->db->get('pelajaran');
        return $query->result_array();
    }
}

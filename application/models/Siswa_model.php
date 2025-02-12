<?php
class Siswa_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        // Query manual
        $query = $this->db->query('SELECT siswa.*, kelas.nama_kelas FROM siswa JOIN kelas ON siswa.kelas_id = kelas.id');
        return $query->result();
    }

    public function insert($data)
    {
        // Menyimpan data siswa ke database
        return $this->db->insert('siswa', $data);
    }

    public function get_by_id($id)
    {
        // Mengambil data siswa berdasarkan id
        $query = $this->db->query('SELECT siswa.*, kelas.nama_kelas FROM siswa JOIN kelas ON siswa.kelas_id = kelas.id WHERE siswa.id = ?', array($id));
        return $query->row();
    }

    public function update($id, $data)
    {
        // Mengupdate data siswa di database
        $this->db->where('id', $id);
        return $this->db->update('siswa', $data);
    }

    public function delete($id)
    {
        // Menghapus data siswa berdasarkan id
        $this->db->where('id', $id);
        return $this->db->delete('siswa');
    }

    public function count_by_kelas($kelas_id) {
        $this->db->where('kelas_id', $kelas_id);
        return $this->db->count_all_results('siswa');
    }
}
?>

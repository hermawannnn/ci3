<?php
class Kelas_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
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
        $this->db->where('id', $id);
        $query = $this->db->get('kelas');
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

    public function get_kelas_by_wali_kelas($wali_kelas_id)
    {
        $this->db->select('kelas.*, users.nama as nama_wali_kelas');
        $this->db->from('kelas');
        $this->db->join('users', 'kelas.wali_kelas = users.id', 'left');
        $this->db->where('kelas.wali_kelas', $wali_kelas_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_kelas()
    {
        $query = $this->db->get('kelas');
        return $query->result_array();
    }

    public function get_wali_kelas_by_kelas_id($kelas_id)
    {
        $this->db->select('users.nama as nama_wali_kelas');
        $this->db->from('kelas');
        $this->db->join('users', 'kelas.wali_kelas = users.id', 'left');
        $this->db->where('kelas.id', $kelas_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function get_kelas_by_user($user_id, $role)
    {
        if ($role == 'admin') {
            return $this->db->get('kelas')->result_array();
        } else {
            return $this->db->where('wali_kelas', $user_id)
                           ->get('kelas')
                           ->result_array();
        }
    }
}

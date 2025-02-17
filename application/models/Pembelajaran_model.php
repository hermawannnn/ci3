<?php
class Pembelajaran_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $this->db->select('a.*, b.nama_pelajaran as nama_pelajaran, c.nama_kelas as nama_kelas, d.nama as nama_user, e.nama_unit as nama_unit');
        $this->db->from('pembelajaran a');
        $this->db->join('pelajaran b', 'b.id = a.pelajaran_id', 'inner');
        $this->db->join('kelas c', 'c.id = a.kelas_id', 'inner');
        $this->db->join('users d', 'd.id = a.user_id', 'inner');
        $this->db->join('units e', 'e.id = a.unit_id', 'inner');
        return $this->db->get()->result();
    }

    public function insert($data)
    {
        // Menyimpan data kelas ke database
        return $this->db->insert('pembelajaran', $data);
    }

    public function get_by_id($id)
    {
        $this->db->select('a.*, b.nama_pelajaran as nama_pelajaran, c.nama_kelas as nama_kelas, d.nama as nama_user, e.nama_unit as nama_unit');
        $this->db->from('pembelajaran a');
        $this->db->join('pelajaran b', 'b.id = a.pelajaran_id', 'inner');
        $this->db->join('kelas c', 'c.id = a.kelas_id', 'inner');
        $this->db->join('users d', 'd.id = a.user_id', 'inner');
        $this->db->join('units e', 'e.id = a.unit_id', 'inner');
        $this->db->where('a.id', $id);
        return $this->db->get()->row();
    }

    public function update($id, $data)
    {
        // Mengupdate data kelas di database
        $this->db->where('id', $id);
        return $this->db->update('pembelajaran', $data);
    }

    public function delete($id)
    {
        // Menghapus data kelas berdasarkan id
        $this->db->where('id', $id);
        return $this->db->delete('pembelajaran');
    }

    public function get_by_id_mengajar()
    {
        $this->db->select('a.*, b.nama_pelajaran as nama_pelajaran, c.nama_kelas as nama_kelas, d.nama as nama_user, e.nama_unit as nama_unit');
        $this->db->from('pembelajaran a');
        $this->db->join('pelajaran b', 'b.id = a.pelajaran_id', 'inner');
        $this->db->join('kelas c', 'c.id = a.kelas_id', 'inner');
        $this->db->join('users d', 'd.id = a.user_id', 'inner');
        $this->db->join('units e', 'e.id = a.unit_id', 'inner');
        $this->db->where('a.user_id', $this->session->userdata('id'));
        return $this->db->get()->result();
    }

    public function get_pelajaran_by_kelas($kelas_id)
    {
        $this->db->select('b.id, b.nama_pelajaran');
        $this->db->from('pembelajaran a');
        $this->db->join('pelajaran b', 'b.id = a.pelajaran_id', 'inner');
        $this->db->where('a.kelas_id', $kelas_id);
        $this->db->where('a.user_id', $this->session->userdata('id'));
        $this->db->group_by('b.id');
        return $this->db->get()->result();
    }
}

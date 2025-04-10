<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilaideskripsifinal_model extends CI_Model
{
    private $table = 'nilaideskripsifinal';

    public function get_by_kelas($kelas_id)
    {
        $this->db->select('s.id as siswa_id, s.nama as nama_siswa, ndf.deskripsi');
        $this->db->from('siswa s');
        $this->db->join('nilaideskripsifinal ndf', 's.id = ndf.siswa_id', 'left');
        $this->db->where('s.kelas_id', $kelas_id);
        $this->db->order_by('s.nama', 'ASC');
        return $this->db->get()->result_array();
    }

    public function save_batch($deskripsi)
    {
        $data = [];
        foreach ($deskripsi as $siswa_id => $desk) {
            // Check if record exists
            $existing = $this->db->get_where($this->table, ['siswa_id' => $siswa_id])->row();
            
            if ($existing) {
                // Update
                $this->db->where('siswa_id', $siswa_id);
                $this->db->update($this->table, ['deskripsi' => $desk]);
            } else {
                // Insert
                $data[] = [
                    'siswa_id' => $siswa_id,
                    'deskripsi' => $desk
                ];
            }
        }
        
        if (!empty($data)) {
            $this->db->insert_batch($this->table, $data);
        }
        
        return true;
    }
}

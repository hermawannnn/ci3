<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raporfinal_model extends CI_Model {
    
    public function get_siswa_detail($siswa_id) {
        $this->db->select('siswa.*, kelas.nama_kelas');
        $this->db->from('siswa');
        $this->db->join('kelas', 'kelas.id = siswa.kelas_id');
        $this->db->where('siswa.id', $siswa_id);
        return $this->db->get()->row_array();
    }

    public function get_nilai_final($siswa_id) {
        // Get mid scores (PT and MT)
        $this->db->select('id, siswa_id, pelajaran_id, CAST(nilai_pt AS DECIMAL(5,2)) as nilai_pt, CAST(nilai_mt AS DECIMAL(5,2)) as nilai_mt');
        $this->db->where('siswa_id', $siswa_id);
        $mid_scores = $this->db->get('nilaimid')->result_array();
        
        // Get final scores (HW, EX, FT)
        $this->db->where('siswa_id', $siswa_id);
        $final_scores = $this->db->get('nilaifinal')->result_array();
        
        return array(
            'mid' => $mid_scores,
            'final' => $final_scores
        );
    }

    public function get_all_pelajaran() {
        return $this->db->get('pelajaran')->result_array();
    }

    public function get_rata_kelas($kelas_id, $pelajaran_id) {
        $this->db->select_avg('nilai_pt');
        $this->db->where('kelas_id', $kelas_id);
        $this->db->where('pelajaran_id', $pelajaran_id);
        return $this->db->get('nilaimid')->row_array();
    }

    public function get_wali_kelas($kelas_id) {
        $this->db->select('users.*');
        $this->db->from('users');
        $this->db->join('kelas', 'kelas.wali_kelas = users.id');
        $this->db->where('kelas.id', $kelas_id);
        return $this->db->get()->row_array();
    }

    public function get_deskripsi_nilai($siswa_id) {
        $this->db->where('siswa_id', $siswa_id);
        return $this->db->get('nilaideskripsifinal')->row_array();
    }
}

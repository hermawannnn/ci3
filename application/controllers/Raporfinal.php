<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raporfinal extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('raporfinal_model');
        $this->load->model('kelas_model');
        
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['kelas'] = $this->kelas_model->get_all_kelas();
        $data['title'] = 'Rapor Final';
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('raporfinal_view', $data);
        $this->load->view('template/footer');
    }

    public function get_siswa_by_kelas($kelas_id) {
        $siswa = $this->raporfinal_model->get_siswa_by_kelas($kelas_id);
        echo json_encode($siswa);
    }

    public function print_rapor($siswa_id) {
        $data['siswa'] = $this->raporfinal_model->get_siswa_detail($siswa_id);
        $data['nilai_mid'] = $this->raporfinal_model->get_nilai_final($siswa_id);
        $data['pelajaran'] = $this->raporfinal_model->get_all_pelajaran();
        
        // Get average scores for each subject
        $kelas_id = $data['siswa']['kelas_id'];
        $data['ratakelas_math'] = $this->raporfinal_model->get_rata_kelas($kelas_id, 3);
        $data['ratakelas_english'] = $this->raporfinal_model->get_rata_kelas($kelas_id, 4);
        $data['ratakelas_science'] = $this->raporfinal_model->get_rata_kelas($kelas_id, 5);
        $data['ratakelas_ict'] = $this->raporfinal_model->get_rata_kelas($kelas_id, 6);
        $data['ratakelas_arabic'] = $this->raporfinal_model->get_rata_kelas($kelas_id, 8);
        $data['ratakelas_tahfidz'] = $this->raporfinal_model->get_rata_kelas($kelas_id, 10);
        
        $data['walikelas'] = $this->raporfinal_model->get_wali_kelas($kelas_id);
        $data['deskripsi_nilai'] = $this->raporfinal_model->get_deskripsi_nilai($siswa_id);
        $data['raporfinal_model'] = $this->raporfinal_model; // Add this line
        
        // Load view for printing
        $this->load->view('print_raporfinal_view', $data);
    }
}

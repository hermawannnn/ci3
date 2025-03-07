<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilaihw extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nilaihw_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->model('pembelajaran_model');
        $user_role = $this->session->userdata('role');

        if ($user_role == 'guru') {
            // Get teaching assignments for the logged-in teacher
            $pembelajaran = $this->Pembelajaran_model->get_by_id_mengajar();

            // Extract unique classes and subjects from pembelajaran
            $kelas_ids = array_unique(array_column($pembelajaran, 'kelas_id'));
            $pelajaran_ids = array_unique(array_column($pembelajaran, 'pelajaran_id'));

            $data['kelas'] = $this->Pembelajaran_model->get_kelas_by_ids($kelas_ids);
            $data['pelajaran'] = $this->Pembelajaran_model->get_pelajaran_by_ids($pelajaran_ids);
        } else {
            // For non-guru users, show all classes and subjects
            $this->load->model('Kelas_model');
            $this->load->model('Pelajaran_model');
            $data['kelas'] = $this->Kelas_model->get_all_kelas();
            $data['pelajaran'] = $this->Pelajaran_model->get_all_pelajaran();
        }

        $data['hw'] = $this->Nilaihw_model->get_all_nilaihw();

        echo '<pre>';
        print_r($data);
        echo '</pre>';

        // $this->load->view('template/header');
        // $this->load->view('template/sidebar');
        // $this->load->view('nilaihw_view', $data);
        // $this->load->view('template/footer');
    }

    public function get_siswa_by_kelas($kelas_id)
    {
        $this->load->model('Siswa_model');
        $siswa = $this->Siswa_model->get_siswa_by_kelas($kelas_id);
        echo json_encode($siswa);
    }
}

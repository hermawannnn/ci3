<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Raporfinal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Memuat model, library, dll yang diperlukan
        // $this->load->model('Rapormid_model');
        $this->load->model('Siswa_model');
        $this->load->model('Nilai_model');
        $this->load->model('Kelas_model');
        $this->load->model('Pelajaran_model');
        $this->load->model('rapormid_model');
    }

    public function index()
    {

        // echo '<pre>';
        // print_r($data['kelas']);
        // echo '</pre>';

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('raporfinal_view');
        $this->load->view('template/footer');
    }
}

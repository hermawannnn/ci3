<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rapormid extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Memuat model, library, dll yang diperlukan
        // $this->load->model('Rapormid_model');
        $this->load->model('Siswa_model');
        $this->load->model('Nilai_model');
        $this->load->model('Kelas_model');
    }

    public function index()
    {
        // Metode default
        // $data['rapormid'] = $this->Rapormid_model->get_all();
        $data['siswa'] = $this->Siswa_model->get_all();
        $data['nilai'] = $this->Nilai_model->get_all_nilai();
        $data['kelas'] = $this->Kelas_model->get_all_kelas();


        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('rapormid_view', $data);
        $this->load->view('template/footer');
    }
}

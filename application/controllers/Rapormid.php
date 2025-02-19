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
        $this->load->model('Pelajaran_model');
        $this->load->model('rapormid_model');
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

    // public function print_rapor($siswa_id)
    // {
    //     // Load necessary data
    //     $siswa = $this->Siswa_model->get_by_id($siswa_id);
    //     $nilai_mid = $this->Nilai_model->get_nilai_mid_by_siswa($siswa_id); // You might need to adjust this based on your Nilai_model
    //     $pelajaran = $this->Pelajaran_model->get_all(); // You might need to adjust this based on your Pelajaran_model

    //     // Prepare data for the view
    //     $data['siswa'] = $siswa;
    //     $data['nilai_mid'] = $nilai_mid;
    //     $data['pelajaran'] = $pelajaran; // Fixed typo here

    //     echo '<pre>';

    //     print_r($data['siswa']);
    //     print_r($data['pelajaran']);
    //     print_r($data['nilai_mid']);

    //     echo '</pre>';

    //     // Load the view
    //     // $this->load->view('template/header');
    //     // $this->load->view('template/sidebar');
    //     // $this->load->view('print_rapormid_view', $data);
    //     // $this->load->view('template/footer');
    // }

    public function print_rapor($siswa_id)
    {
        // Get student data
        $siswa = $this->Siswa_model->get_by_id($siswa_id);
        $nilai_mid = $this->rapormid_model->ambilnilai($siswa_id);
        $pelajaran = $this->Pelajaran_model->get_all();

        $data['siswa'] = $siswa;
        $data['nilai_mid'] = $nilai_mid;
        $data['pelajaran'] = $pelajaran;

        echo '<pre>';
        print_r($data['siswa']);
        // print_r($data['nilai_mid']);
        print_r($data['pelajaran']);
        echo '</pre>';

        $this->load->view('print_rapormid_view', $data);
    }

    public function submit_form()
    {
        $kelas_id = $this->input->post('kelas_id');
        $siswa_id = $this->input->post('siswa_id');

        // Example of how to call the method properly:
        $data['nilai'] = $this->rapormid_model->ambilnilai($siswa_id, $kelas_id, $pelajaran_id);

        // Process the data (e.g., save to the database)
        // For now, just print the values
        echo "Kelas ID: " . $kelas_id . "<br>";
        echo "Siswa ID: " . $siswa_id;
    }
}

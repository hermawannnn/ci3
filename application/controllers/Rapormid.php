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

    public function print_rapor($siswa_id)
    {
        // Get student data
        $siswa = $this->Siswa_model->get_by_id($siswa_id);
        $nilai_mid = $this->rapormid_model->ambilnilai($siswa_id);
        $pelajaran = $this->Pelajaran_model->get_all();
        $kelas_id = $siswa['kelas_id']; // Access kelas_id from $siswa array

        // Get class average for each subject
        $ratakelas_math = $this->rapormid_model->ratakelas($kelas_id, 3); // pelajaran_id 3 = Math
        $ratakelas_english = $this->rapormid_model->ratakelas($kelas_id, 4); // pelajaran_id 4 = English
        $ratakelas_science = $this->rapormid_model->ratakelas($kelas_id, 5); // pelajaran_id 5 = Science
        $ratakelas_ict = $this->rapormid_model->ratakelas($kelas_id, 6); // pelajaran_id 6 = ICT
        $ratakelas_tahfidz = $this->rapormid_model->ratakelas($kelas_id, 10); // pelajaran_id 10 = Tahfidz
        $ratakelas_arabic = $this->rapormid_model->ratakelas($kelas_id, 8); // pelajaran_id 8 = Arabic
        $deskripsi_nilai = $this->rapormid_model->ambilDeskripsi($siswa_id);
        $walikelas = $this->rapormid_model->getWaliKelas($kelas_id);

        $data['siswa'] = $siswa;
        $data['nilai_mid'] = $nilai_mid;
        $data['pelajaran'] = $pelajaran;
        $data['kelas_id'] = $kelas_id; // Pass kelas_id to the view
        $data['ratakelas_math'] = $ratakelas_math;
        $data['ratakelas_english'] = $ratakelas_english;
        $data['ratakelas_science'] = $ratakelas_science;
        $data['ratakelas_ict'] = $ratakelas_ict;
        $data['ratakelas_tahfidz'] = $ratakelas_tahfidz;
        $data['ratakelas_arabic'] = $ratakelas_arabic;
        $data['deskripsi_nilai'] = $deskripsi_nilai;
        $data['walikelas'] = $walikelas;

        // echo '<pre>';
        // print_r($data['nilai_mid']);
        // print_r($data['pelajaran']);
        // print_r($data['kelas_id']);
        // echo '</pre>';

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

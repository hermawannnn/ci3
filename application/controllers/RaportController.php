<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RaportController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->model('Rapormidsemester_model'); // Load the new model
    }

    public function index()
    {
        $this->load->model('Pembelajaran_model');
        $user_id = $this->session->userdata('id');
        $data['pembelajaran'] = $this->Pembelajaran_model->get_pembelajaran_by_user($user_id);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nts_view', $data);
        $this->load->view('template/footer');
    }

    public function get_siswa_by_kelas()
    {
        $kelas_id = $this->input->post('kelas_id');
        $siswa = $this->Siswa_model->get_siswa_by_kelas($kelas_id);
        echo json_encode($siswa);
    }

    public function save_nilai()
    {
        $kelas_id = $this->input->post('kelas');
        $nilai_pt = $this->input->post('nilai_pt');
        $nilai_mt = $this->input->post('nilai_mt');

        foreach ($nilai_pt as $siswa_id => $pt) {
            $mt = $nilai_mt[$siswa_id];

            // Prepare data for insertion or update
            $data = array(
                'kelas_id' => $kelas_id,
                'siswa_id' => $siswa_id,
                'pelajaran_id' => 8, // Assuming pelajaran_id is fixed for now
                'nilai_pt' => $pt,
                'nilai_mt' => $mt
            );

            // Check if the record already exists
            $existing_record = $this->Rapormidsemester_model->get_nilai($kelas_id, $siswa_id, 8);

            if ($existing_record) {
                // Update the existing record
                $this->Rapormidsemester_model->update_nilai($existing_record->id, $data);
            } else {
                // Insert a new record
                $this->Rapormidsemester_model->insert_nilai($data);
            }
        }

        // Redirect or show a success message
        redirect('raport');
    }

    public function get_existing_nilai()
    {
        $kelas_id = $this->input->post('kelas_id');
        $siswa_id = $this->input->post('siswa_id');
        $pelajaran_id = 8; // Assuming pelajaran_id is fixed

        $nilai = $this->Rapormidsemester_model->get_nilai($kelas_id, $siswa_id, $pelajaran_id);
        echo json_encode($nilai);
    }
}

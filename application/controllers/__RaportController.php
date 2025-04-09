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

    public function get_existing_nilai()
    {
        $kelas_id = $this->input->post('kelas_id');
        $siswa_id = $this->input->post('siswa_id');
        $pelajaran_id = 8; // Assuming pelajaran_id is fixed

        $nilaimid = $this->Rapormidsemester_model->get_nilai($kelas_id, $siswa_id, $pelajaran_id);
        echo json_encode($nilaimid);
    }

    public function save_nilai()
    {
        $kelas_id = $this->input->post('kelas');
        $nilai_pt = $this->input->post('nilai_pt');
        $nilai_mt = $this->input->post('nilai_mt');

        list($kelas_id, $pelajaran_id) = explode('-', $kelas_id); // Split the selected value to get class and subject IDs

        foreach ($nilai_pt as $siswa_id => $pt) {
            $mt = $nilai_mt[$siswa_id];

            // Check if the record already exists
            $existing_nilai = $this->Rapormidsemester_model->get_nilai_by_kelas_siswa($kelas_id, $siswa_id);

            if ($existing_nilai) {
                // Update existing record
                $data = array(
                    'nilai_pt' => $pt,
                    'nilai_mt' => $mt
                );
                $this->Rapormidsemester_model->update_nilai($existing_nilai->id, $data);
            } else {
                // Insert new record
                $data = array(
                    'kelas_id' => $kelas_id,
                    'siswa_id' => $siswa_id,
                    'pelajaran_id' => $pelajaran_id, // Use the correct pelajaran_id
                    'nilai_pt' => $pt,
                    'nilai_mt' => $mt
                );
                $this->Rapormidsemester_model->insert_nilai($data);
            }
        }

        redirect('raport');
    }
}

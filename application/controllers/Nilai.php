<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->model('Pembelajaran_model');
        $user_role = $this->session->userdata('role');
        $user_id = $this->session->userdata('id'); // Make sure to use the correct session key

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

        $data['nilai'] = $this->Nilai_model->get_all_nilai();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilaimid_view', $data);
        $this->load->view('template/footer');
    }

    public function view($id)
    {
        $data['nilai'] = $this->Nilai_model->get_nilai_by_id($id);
        if (empty($data['nilai'])) {
            show_404();
        }
        $this->load->view('nilaimid_view', $data);
    }

    public function create()
    {
        $this->load->model('Nilai_model');
        $kelas_id = $this->input->post('kelas_id');
        $pelajaran_id = $this->input->post('pelajaran_id');
        $nilai_pt = $this->input->post('nilai_pt');
        $nilai_mt = $this->input->post('nilai_mt');

        foreach ($nilai_pt as $siswa_id => $pt) {
            $pt = $pt !== '' ? $pt : 0;
            $mt = isset($nilai_mt[$siswa_id]) ? ($nilai_mt[$siswa_id] !== '' ? $nilai_mt[$siswa_id] : 0) : 0;
            $data = array(
                'kelas_id' => $kelas_id,
                'siswa_id' => $siswa_id,
                'pelajaran_id' => $pelajaran_id,
                'nilai_pt' => $pt,
                'nilai_mt' => $mt
            );

            // Check if the record already exists
            $existing_nilai = $this->Nilai_model->get_nilai_by_kelas_and_pelajaran($kelas_id, $pelajaran_id, $siswa_id);
            if ($existing_nilai && isset($existing_nilai['id'])) {
                // Update existing record
                $this->Nilai_model->update_nilai($existing_nilai['id'], $data);
            } else {
                // Insert new record
                $this->Nilai_model->insert_nilai($data);
            }
        }

        redirect('nilai');
    }

    public function update($id)
    {
        // ...existing code for form validation and data update...
    }

    public function delete($id)
    {
        $this->Nilai_model->delete_nilai($id);
        redirect('nilai');
    }

    public function get_siswa_by_kelas($kelas_id)
    {
        $this->load->model('Siswa_model');
        $siswa = $this->Siswa_model->get_siswa_by_kelas($kelas_id);
        echo json_encode($siswa);
    }

    public function get_nilai_by_kelas($kelas_id)
    {
        $this->load->model('Nilai_model');
        $nilai = $this->Nilai_model->get_nilai_by_kelas($kelas_id);
        echo json_encode($nilai);
    }

    public function get_nilai_by_kelas_and_pelajaran($kelas_id, $pelajaran_id)
    {
        $this->load->model('Nilai_model');
        $nilai = $this->Nilai_model->get_nilai_by_kelas_and_pelajaran($kelas_id, $pelajaran_id);
        echo json_encode($nilai);
    }
}

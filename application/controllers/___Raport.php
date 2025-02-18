<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Raport extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Raport_model');
    }

    public function index()
    {
        $data['pembelajaran'] = $this->Raport_model->get_pembelajaran();
        $this->load->view('nts_view', $data);
    }

    public function get_siswa_by_kelas()
    {
        $kelas_id = $this->input->post('kelas_id');
        $pelajaran_id = $this->input->post('pelajaran_id');

        $this->load->model('Siswa_model');
        $siswa = $this->Siswa_model->get_siswa_by_kelas($kelas_id, $pelajaran_id);

        echo json_encode($siswa);
    }

    public function save_nilai()
    {
        $kelas_id = $this->input->post('kelas');
        list($kelas_id, $pelajaran_id) = explode('-', $kelas_id);
        $nilai_pt = $this->input->post('nilai_pt');
        $nilai_mt = $this->input->post('nilai_mt');

        foreach ($nilai_pt as $siswa_id => $pt) {
            $mt = $nilai_mt[$siswa_id];

            // Check if nilai already exists
            $existing_nilai = $this->Raport_model->get_existing_nilai($kelas_id, $pelajaran_id, $siswa_id);

            if ($existing_nilai) {
                // Update existing nilai
                $data = array(
                    'nilai_pt' => $pt,
                    'nilai_mt' => $mt
                );
                $this->Raport_model->update_nilai($kelas_id, $pelajaran_id, $siswa_id, $data);
            } else {
                // Insert new nilai
                $data = array(
                    'kelas_id' => $kelas_id,
                    'pelajaran_id' => $pelajaran_id,
                    'siswa_id' => $siswa_id,
                    'nilai_pt' => $pt,
                    'nilai_mt' => $mt
                );
                $this->Raport_model->insert_nilai($data);
            }
        }

        redirect('raport');
    }

    public function get_existing_nilai()
    {
        $kelas_id = $this->input->post('kelas_id');
        $pelajaran_id = $this->input->post('pelajaran_id');
        $siswa_id = $this->input->post('siswa_id');

        $nilai = $this->Raport_model->get_existing_nilai($kelas_id, $pelajaran_id, $siswa_id);

        echo json_encode($nilai);
    }
}

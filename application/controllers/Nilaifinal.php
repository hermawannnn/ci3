<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilaifinal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
        $this->load->helper('url');
        $this->load->model('Nilaifinal_model');
    }

    public function index()
    {
        $data['kelas'] = $this->Nilaifinal_model->get_kelas();
        $data['pelajaran'] = $this->Nilaifinal_model->get_pelajaran();
        $data['is_admin'] = ($this->session->userdata('role') === 'admin');

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilaifinal_view', $data);
        $this->load->view('template/footer');
    }

    public function get_siswa_by_kelas($kelas_id)
    {
        $siswa = $this->Nilaifinal_model->get_siswa_by_kelas($kelas_id);
        echo json_encode($siswa);
    }

    public function get_nilai_by_kelas($kelas_id, $pelajaran_id)
    {
        $nilai = $this->Nilaifinal_model->get_nilai_by_kelas($kelas_id, $pelajaran_id);
        echo json_encode($nilai);
    }

    public function get_nilai_by_filters($kelas_id, $pelajaran_id, $jenisnilai)
    {
        $nilai = $this->Nilaifinal_model->get_nilai_by_filters($kelas_id, $pelajaran_id, $jenisnilai);
        echo json_encode($nilai);
    }

    public function create()
    {
        $result = $this->Nilaifinal_model->save_nilai();
        redirect('nilaifinal');
    }
}

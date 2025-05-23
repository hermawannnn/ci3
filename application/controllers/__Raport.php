<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Raport extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pembelajaran_model');
        $this->load->model('Siswa_model');
        $this->load->model('Rapormidsemester_model');
        $this->load->library('session');
    }

    public function index()
    {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth'); // Redirect to login page if not logged in
        }

        $user_id = $this->session->userdata('id');
        $user_role = $this->session->userdata('role');

        if ($user_role == 'admin') {
            // If admin, get all pembelajaran
            $pembelajaran = $this->Pembelajaran_model->get_all_pembelajaran();
        } else {
            // If not admin, get pembelajaran by user id
            $pembelajaran = $this->Pembelajaran_model->get_pembelajaran_by_user_id($user_id);
        }

        $data['pembelajaran'] = $pembelajaran;
        $this->load->view('nts_view', $data);
    }

    public function get_siswa_by_kelas()
    {
        $kelas_id = $this->input->post('kelas_id');
        $siswa = $this->Siswa_model->get_siswa_by_kelas_id($kelas_id);
        echo json_encode($siswa);
    }



    public function get_existing_nilai()
    {
        $kelas_id = $this->input->post('kelas_id');
        $siswa_id = $this->input->post('siswa_id');

        $nilaimid = $this->Rapormidsemester_model->get_nilai_by_kelas_siswa($kelas_id, $siswa_id);

        echo json_encode($nilaimid);
    }
}

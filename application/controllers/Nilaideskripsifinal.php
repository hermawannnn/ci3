<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilaideskripsifinal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nilaideskripsifinal_model');
        $this->load->model('Kelas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $user_id = $this->session->userdata('id');
        $user_role = $this->session->userdata('role');
        $data['kelas'] = $this->Kelas_model->get_kelas_by_user($user_id, $user_role);
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilaideskripsifinal_view', $data);
        $this->load->view('template/footer');
    }

    public function get_nilaidesk_by_kelas($kelas_id)
    {
        $nilaidesks = $this->Nilaideskripsifinal_model->get_by_kelas($kelas_id);
        echo json_encode($nilaidesks);
    }

    public function create()
    {
        $kelas_id = $this->input->post('kelas_id');
        $deskripsi = $this->input->post('deskripsi');
        
        $this->Nilaideskripsifinal_model->save_batch($deskripsi);
        redirect('nilaideskripsifinal');
    }
}

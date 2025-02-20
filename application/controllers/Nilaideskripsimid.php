<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilaideskripsimid extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nilaideskripsimid_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Nilai Deskripsi MID';
        $data['nilai_deskripsi'] = $this->Nilaideskripsimid_model->getAll();
        $data['kelas'] = $this->Nilaideskripsimid_model->getAllKelas();
        $data['siswa'] = $this->Nilaideskripsimid_model->getAllSiswa();

        echo '<pre>';
        print_r($data['kelas']);
        echo '</pre>';


        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilaideskripsimid_view', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $data['title'] = 'Tambah Nilai Deskripsi MID';

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('nilaideskripsimid/add', $data);
            $this->load->view('template/footer');
        } else {
            $this->Nilaideskripsimid_model->save($this->input->post());
            redirect('nilaideskripsimid');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Nilai Deskripsi MID';
        $data['nilai_deskripsi'] = $this->Nilaideskripsimid_model->getById($id);

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('nilaideskripsimid/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->Nilaideskripsimid_model->update($this->input->post(), $id);
            redirect('nilaideskripsimid');
        }
    }

    public function delete($id)
    {
        $this->Nilaideskripsimid_model->delete($id);
        redirect('nilaideskripsimid');
    }
}

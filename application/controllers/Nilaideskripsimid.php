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

        // echo '<pre>';
        // print_r($data['kelas']);
        // echo '</pre>';


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

    public function get_siswa_by_kelas($kelas_id)
    {
        $this->load->model('Siswa_model');
        $siswa = $this->Siswa_model->get_siswa_by_kelas($kelas_id);
        echo json_encode($siswa);
    }

    public function get_nilaidesk_by_kelas($kelas_id)
    {
        $nilaidesk = $this->Nilaideskripsimid_model->get_nilaidesk_by_kelas($kelas_id);
        echo json_encode($nilaidesk);
    }

    public function create()
    {
        $deskripsi = $this->input->post('deskripsi');

        // Debug received data
        // log_message('debug', 'Received POST data: ' . print_r($_POST, true));

        if (is_array($deskripsi)) {
            foreach ($deskripsi as $siswa_id => $desc) {
                // Skip empty descriptions
                if (empty($desc)) continue;

                $data = array(
                    'siswa_id' => $siswa_id,
                    'deskripsi' => $desc
                );

                // Debug data being saved
                log_message('debug', 'Saving data: ' . print_r($data, true));

                // Directly try to insert/update
                $this->Nilaideskripsimid_model->save_or_update($data);
            }
        }


        redirect('nilaideskripsimid');
    }
}

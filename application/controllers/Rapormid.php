<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rapormid extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Memuat model, library, dll yang diperlukan
        $this->load->model('Rapormid_model');
    }

    public function index()
    {
        // Metode default
        $data['rapormid'] = $this->Rapormid_model->get_all();
        $this->load->view('rapormid/index', $data);
    }

    public function view($id)
    {
        // Melihat catatan tertentu
        $data['rapormid'] = $this->Rapormid_model->get($id);
        if (empty($data['rapormid'])) {
            show_404();
        }
        $this->load->view('rapormid/view', $data);
    }

    public function create()
    {
        // Membuat catatan baru
        if ($this->input->post()) {
            $this->Rapormid_model->insert($this->input->post());
            redirect('rapormid');
        }
        $this->load->view('rapormid/create');
    }

    public function edit($id)
    {
        // Mengedit catatan yang ada
        if ($this->input->post()) {
            $this->Rapormid_model->update($id, $this->input->post());
            redirect('rapormid');
        }
        $data['rapormid'] = $this->Rapormid_model->get($id);
        if (empty($data['rapormid'])) {
            show_404();
        }
        $this->load->view('rapormid/edit', $data);
    }

    public function delete($id)
    {
        // Menghapus catatan
        $this->Rapormid_model->delete($id);
        redirect('rapormid');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load any required models, libraries, etc.
        $this->load->model(array('nts_model', 'siswa_model', 'unit_model', 'kelas_model', 'pelajaran_model'));  // Added 'pelajaran_model'
    }


    public function index()
    {
        // Default method for this controller
        // Load the required models
        // Changed from 'pelajaran' to 'subjects'
        $data['pembelajaran'] = $this->nts_model->get_by_id_mengajar(); // Added this line
        // $data['classes'] = $this->kelas_model->get_all(); // remove this line
        // $data['pelajaran'] = $this->pelajaran_model->get_all(); //remove this line
        $data['pelajaran'] = $this->pelajaran_model->get_all(); // Added this line

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nts_view', $data);
        $this->load->view('template/footer');
    }
}

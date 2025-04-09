<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilaideskripsifinal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nilaideskripsimid_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        // echo '<pre>';
        // print_r($data['kelas']);
        // echo '</pre>';


        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilaideskripsifinal_view');
        $this->load->view('template/footer');
    }
}

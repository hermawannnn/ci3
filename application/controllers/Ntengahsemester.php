<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ntengahsemester extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load any required models, libraries, etc.
    }

    public function index() {
        // Default method for this controller
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nts_view');
        $this->load->view('template/footer');
    }

    public function some_method() {
        // Add your method logic here
    }

    // Add more methods as needed
}
?>
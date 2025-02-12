<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary models, libraries, etc.
        $this->load->model('user_model');
        $this->load->library('session');
        $this->check_access();
    }

    private function check_access() {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        // Check if user is admin
        if ($this->session->userdata('role') !== 'admin') {
            show_error('You do not have permission to access this page.', 403);
        }
    }

    public function index() {
        // Load a view or perform some action
        $data['users'] = $this->user_model->get_all_users();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('user/user_view', $data);
        $this->load->view('template/footer');
    }

    public function tambah() {

        // Handle form submission and create a new user
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('user/tambah_user_view');
            $this->load->view('template/footer');
        } else {
            $this->user_model->create_user();
            redirect('user');
        }
    }

    public function simpan() {
        // Handle form submission and create a new user
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('user/tambah_user_view');
            $this->load->view('template/footer');
        } else {
            $this->user_model->create_user();
            redirect('user');
        }
    }

    public function edit($id) {
        // Handle form submission and update an existing user
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['user'] = $this->user_model->get_user($id);

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('user/edit_user_view', $data);
            $this->load->view('template/footer');
        } else {
            $this->user_model->update_user($id);
            redirect('user');
        }
    }

    public function delete($id) {
        // Delete a user
        $this->user_model->delete_user($id);
        redirect('user');
    }
}
?>
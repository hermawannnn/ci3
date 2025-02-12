<?php
class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Cek apakah user sudah login
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        // Check if user is admin or guru
        if (!in_array($this->session->userdata('role'), ['admin', 'guru'])) {
            show_error('You do not have permission to access this page.', 403);
        }
    }

    public function index()
    {
        // Menampilkan halaman dashboard
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dashboard_view');
        $this->load->view('template/footer');
    }
}
?>

<?php
class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Memuat model User_model
        $this->load->model('User_model');
    }

    // Halaman login
    public function index()
    {
        // Jika sudah login, redirect ke halaman dashboard (misalnya)
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }

        $this->load->view('login_view');
    }

    // Proses login
    public function authenticate()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->login($username, $password);

        if ($user) {
            // Set session data jika login berhasil
            $session_data = array(
                'id' => $user->id,
                'username' => $user->username,
                'nama' => $user->nama,
                'role' => $user->role,
                'logged_in' => true
            );
            $this->session->set_userdata($session_data);
            redirect('dashboard'); // Redirect ke halaman dashboard
        } else {
            // Jika login gagal
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('login');
        }
    }

    // Logout
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>

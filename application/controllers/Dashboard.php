<?php
class Dashboard extends CI_Controller
{

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
        $this->load->model('pembelajaran_model');

        // Get selected kelas_id from POST or default to all
        $kelas_id = $this->input->post('kelas_id');

        // Get all kelas for dropdown
        $data['kelas_list'] = $this->db->get('kelas')->result();

        // Base query
        $query = "SELECT b.nama_kelas, d.nama_pelajaran, c.nama 
                FROM pembelajaran a
                LEFT JOIN kelas b ON a.kelas_id = b.id
                LEFT join users c ON a.user_id = c.id
                LEFT JOIN pelajaran d ON d.id = a.pelajaran_id";

        // Add filter if kelas_id is selected
        if ($kelas_id) {
            $query .= " WHERE a.kelas_id = " . $this->db->escape($kelas_id);
        }

        $query .= " ORDER BY b.nama_kelas";

        $data['pembelajaran'] = $this->db->query($query)->result();
        $data['selected_kelas'] = $kelas_id;

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dashboard_view', $data);
        $this->load->view('template/footer');
    }
}

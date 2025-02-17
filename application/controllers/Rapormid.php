<?php
class Rapormid extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Cek apakah user sudah login
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        // Check if user is admin
        if ($this->session->userdata('role') == 'admin' && $this->session->userdata('role') == 'guru') {
            show_error('You do not have permission to access this page.', 403);
        }
        $this->load->model(array('rapormid_model', 'kelas_model', 'user_model'));
    }

    public function index()
    {
        $data['kelas'] = $this->kelas_model->get_all();
        $data['users'] = $this->user_model->get_all();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('rapormid_view', $data);
        $this->load->view('template/footer');
    }

    public function get_wali_kelas()
    {
        $class_id = $this->input->get('class_id');
        $kelas = $this->kelas_model->get_by_id($class_id);
        echo json_encode(['nama_wali_kelas' => $kelas->nama_wali_kelas]);
    }

    public function get_student_data()
    {
        $student_id = $this->input->post('student_id');
        $student = $this->db->get_where('students', ['id' => $student_id])->row();

        if ($student) {
            $response = [
                'success' => true,
                'data' => [
                    'name' => $student->name,
                    'nis' => $student->nis
                ]
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Student not found'
            ];
        }

        echo json_encode($response);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rapormid extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kelas_model');
        $this->load->model('Siswa_model');
        $this->load->library('session');
    }

    public function index()
    {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth'); // Redirect to login page if not logged in
        }

        $user_id = $this->session->userdata('id');
        $user_role = $this->session->userdata('role');

        if ($user_role == 'admin') {
            // If admin, get all classes
            $kelas = $this->Kelas_model->get_all_kelas();
        } else {
            // If not admin, get classes by wali_kelas id
            $kelas = $this->Kelas_model->get_kelas_by_wali_kelas($user_id);
        }

        $students = $this->Siswa_model->get_all_siswa();

        $data['kelas'] = $kelas;
        $data['students'] = $students;

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('rapormid_view', $data);
        $this->load->view('template/footer');
    }

    public function get_wali_kelas()
    {
        $class_id = $this->input->get('class_id');
        $wali_kelas = $this->Kelas_model->get_wali_kelas_by_kelas_id($class_id);

        echo json_encode($wali_kelas);
    }

    public function get_student_data()
    {
        $student_id = $this->input->post('student_id');
        $student_data = $this->Siswa_model->get_siswa_by_id($student_id);

        if ($student_data) {
            echo json_encode(['success' => true, 'data' => $student_data]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Student not found']);
        }
    }

    public function get_students_by_class()
    {
        $class_id = $this->input->post('class_id');
        $students = $this->Siswa_model->get_siswa_by_kelas($class_id);
        echo json_encode($students);
    }
}

<?php
class Siswa extends CI_Controller
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
        // $this->load->model(array('siswa_model', 'kelas_model'));
        $this->load->model('siswa_model');
        $this->load->model('kelas_model');
    }

    public function index()
    {
        // Mengambil data siswa dan kelas dari model
        $data['siswa'] = $this->siswa_model->get_all();
        $data['kelas'] = $this->kelas_model->get_all();

        // Menampilkan halaman siswa dengan data
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('siswa_view', $data);
        $this->load->view('template/footer');
    }

    public function simpan()
    {
        // Menyimpan data siswa ke database
        $data = array(
            'nama' => $this->input->post('nama'),
            'nis' => $this->input->post('nis'),
            'nisn' => $this->input->post('nisn'),
            'kelas_id' => $this->input->post('kelas')
        );
        $this->siswa_model->insert($data);
        redirect('siswa');
    }

    public function update()
    {
        // Mengupdate data siswa di database
        $id = $this->input->post('id');
        $data = array(
            'nama' => $this->input->post('nama'),
            'nis' => $this->input->post('nis'),
            'nisn' => $this->input->post('nisn'),
            'kelas_id' => $this->input->post('kelas')
        );
        $this->siswa_model->update($id, $data);
        redirect('siswa');
    }

    public function hapus($id)
    {
        // Menghapus data siswa berdasarkan id
        $this->siswa_model->delete($id);
        redirect('siswa');
    }
}

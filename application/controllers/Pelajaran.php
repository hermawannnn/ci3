<?php
class Pelajaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Cek apakah user sudah login
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        // Check if user is admin
        if ($this->session->userdata('role') !== 'admin') {
            show_error('You do not have permission to access this page.', 403);
        }
        $this->load->model('pelajaran_model');
    }

    public function index()
    {
        // Mengambil data pelajaran dari model
        $data['pelajaran'] = $this->pelajaran_model->get_all();

        // Menampilkan halaman pelajaran dengan data
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pelajaran_view', $data);
        $this->load->view('template/footer');
    }

    public function simpan()
    {
        // Menyimpan data pelajaran ke database
        $data = array(
            'nama_pelajaran' => $this->input->post('nama_pelajaran'),
            // 'unit' => $this->input->post('unit')
        );
        $this->pelajaran_model->insert($data);
        redirect('pelajaran');
    }

    public function update()
    {
        // Mengupdate data pelajaran di database
        $id = $this->input->post('id');
        $data = array(
            'nama_pelajaran' => $this->input->post('nama_pelajaran')
            // 'unit' => $this->input->post('unit'),
            // 'wali_pelajaran' => $this->input->post('wali_pelajaran')
        );
        $this->pelajaran_model->update($id, $data);
        redirect('pelajaran');
    }

    public function hapus($id)
    {
        $this->load->model('Siswa_model');

        // Proceed with deletion
        $this->pelajaran_model->delete($id);
        $this->session->set_flashdata('success', 'Pelajaran berhasil dihapus.');
        redirect('pelajaran');
    }
}

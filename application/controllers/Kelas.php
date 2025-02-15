<?php
class Kelas extends CI_Controller
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
        $this->load->model('kelas_model');
        $this->load->model('user_model');
        $this->load->model('unit_model');
    }

    public function index()
    {
        // Mengambil data kelas dari model
        $data['kelas'] = $this->kelas_model->get_all();
        $data['users'] = $this->user_model->get_all();
        $data['units'] = $this->unit_model->get_all();

        // Menampilkan halaman kelas dengan data
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kelas_view', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        // Menampilkan form tambah kelas
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kelas/tambah_kelas_view');
        $this->load->view('template/footer');
    }

    public function simpan()
    {
        // Menyimpan data kelas ke database
        $data = array(
            'unit' => $this->input->post('unit'),
            'nama_kelas' => $this->input->post('nama_kelas'),
            'wali_kelas' => $this->input->post('wali_kelas')
        );
        $this->kelas_model->insert($data);
        redirect('kelas');
    }

    public function edit($id)
    {
        // Mengambil data kelas berdasarkan id
        $data['kelas'] = $this->kelas_model->get_by_id($id);

        // Menampilkan form edit kelas
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kelas/edit_kelas_view', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        // Mengupdate data kelas di database
        $id = $this->input->post('id');
        $data = array(
            'nama_kelas' => $this->input->post('nama_kelas'),
            'unit' => $this->input->post('unit'),
            'wali_kelas' => $this->input->post('wali_kelas')
        );
        $this->kelas_model->update($id, $data);
        redirect('kelas');
    }

    public function hapus($id)
    {
        $this->load->model('Kelas_model');
        $this->load->model('Siswa_model');

        // Check if there are students in the class
        $jumlah_siswa = $this->Siswa_model->count_by_kelas($id);
        if ($jumlah_siswa > 0) {
            $this->session->set_flashdata('error', 'Tidak dapat menghapus kelas yang memiliki siswa.');
            redirect('kelas');
        }

        // Proceed with deletion
        $this->Kelas_model->delete($id);
        $this->session->set_flashdata('success', 'Kelas berhasil dihapus.');
        redirect('kelas');
    }
}

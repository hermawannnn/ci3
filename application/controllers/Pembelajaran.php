<?php
class Pembelajaran extends CI_Controller {

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
        // Mengambil data pembelajaran dari model
        $data['pelajaran'] = $this->pelajaran_model->get_all();

        // Menampilkan halaman pembelajaran dengan data
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pembelajaran/pembelajaran_view', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        // Menampilkan form tambah pembelajaran
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pembelajaran/tambah_pembelajaran_view');
        $this->load->view('template/footer');
    }

    public function simpan()
    {
        // Menyimpan data pembelajaran ke database
        $data = array(
            'nama_pembelajaran' => $this->input->post('nama_pembelajaran')
        );
        $this->pembelajaran_model->insert($data);
        redirect('pembelajaran');
    }

    public function edit($id)
    {
        // Mengambil data pembelajaran berdasarkan id
        $data['pembelajaran'] = $this->pembelajaran_model->get_by_id($id);

        // Menampilkan form edit pembelajaran
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pembelajaran/edit_pembelajaran_view', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        // Mengupdate data pembelajaran di database
        $id = $this->input->post('id');
        $data = array(
            'nama_pembelajaran' => $this->input->post('nama_pembelajaran')
        );
        $this->pembelajaran_model->update($id, $data);
        redirect('pembelajaran');
    }

    public function hapus($id)
    {
        $this->load->model('Siswa_model');

        // Proceed with deletion
        $this->pembelajaran_model->delete($id);
        $this->session->set_flashdata('success', 'Pelajaran berhasil dihapus.');
        redirect('pembelajaran');
    }
}
?>

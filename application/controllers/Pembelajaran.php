<?php
class Pembelajaran extends CI_Controller
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
        $this->load->model('pembelajaran_model');
        $this->load->model('kelas_model');
        $this->load->model('user_model');
        $this->load->model('unit_model');
        $this->load->model('Pelajaran_model');
    }

    public function index()
    {
        // Mengambil data kelas dari model
        $data['pembelajaran'] = $this->pembelajaran_model->get_all();
        $data['kelas'] = $this->kelas_model->get_all();
        $data['users'] = $this->user_model->get_all();
        $data['units'] = $this->unit_model->get_all();
        $data['pelajaran'] = $this->Pelajaran_model->get_all();

        // echo '<pre>';
        // print_r($data['pelajaran']);
        // echo '</pre>';

        // Menampilkan halaman kelas dengan data
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pembelajaran_view', $data);
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
        // Menyimpan data pembelajaran ke database
        $data = array(
            'pelajaran_id' => $this->input->post('pelajaran_id'),
            'kelas_id' => $this->input->post('kelas_id'),
            'unit_id' => $this->input->post('unit_id'),
            'user_id' => $this->input->post('user_id')
        );
        $this->pembelajaran_model->insert($data);
        redirect('pembelajaran');
    }

    public function edit($id)
    {
        // Mengambil data pembelajaran berdasarkan id
        $data['pembelajaran'] = $this->pembelajaran_model->get_by_id($id);
        $data['kelas'] = $this->kelas_model->get_all();
        $data['users'] = $this->user_model->get_all();
        $data['units'] = $this->unit_model->get_all();
        $data['pelajaran'] = $this->Pelajaran_model->get_all();

        // Menampilkan form edit pembelajaran
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pembelajaran_view', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        // Mengupdate data pembelajaran di database
        $id = $this->input->post('id');
        $data = array(
            'pelajaran_id' => $this->input->post('pelajaran_id'),
            'kelas_id' => $this->input->post('kelas_id'),
            'unit_id' => $this->input->post('unit_id'),
            'user_id' => $this->input->post('user_id')
        );
        $this->pembelajaran_model->update($id, $data);
        redirect('pembelajaran');
    }

    public function hapus($id)
    {
        // Menghapus data kelas dari database
        $this->pembelajaran_model->delete($id);
        redirect('pembelajaran');
    }
}

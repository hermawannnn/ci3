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
        $this->load->model(array('pelajaran_model', 'pembelajaran_model', 'kelas_model', 'user_model', 'unit_model'));
    }

    public function index()
    {
        // Mengambil data pembelajaran dari model
        $data['pembelajaran'] = $this->pembelajaran_model->get_all();
        $data['pelajaran'] = $this->pelajaran_model->get_all();
        $data['kelas'] = $this->kelas_model->get_all();
        $data['users'] = $this->user_model->get_all();
        $data['units'] = $this->unit_model->get_all();

        // Menampilkan halaman pembelajaran dengan data
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pembelajaran_view', $data);
        $this->load->view('template/footer');
    }

    public function simpan()
    {
        // Menyimpan data siswa ke database
        $data = array(
            // mengambil nilai dari form input berdasarkan nama 'pelajaran_id' dan disimpan dalam array $data
            'pelajaran_id' => $this->input->post('pelajaran_id'),
            'kelas_id' => $this->input->post('kelas_id'),
            'user_id' => $this->input->post('user_id'),
            'unit_id' => $this->input->post('unit_id')
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
            'nama_pelajaran' => $this->input->post('nama_pelajaran'),
            'nama_kelas' => $this->input->post('nama_kelas'),
            'guru_mapel' => $this->input->post('guru_mapel'),
            'unit' => $this->input->post('unit')
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

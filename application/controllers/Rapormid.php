<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rapormid extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Memuat model, library, dll yang diperlukan
        // $this->load->model('Rapormid_model');
        $this->load->model('Siswa_model');
        $this->load->model('Nilai_model');
        $this->load->model('Kelas_model');
        $this->load->model('Pelajaran_model');
        $this->load->model('rapormid_model');
    }

    public function index()
    {
        // Metode default
        // $data['rapormid'] = $this->Rapormid_model->get_all();
        $data['siswa'] = $this->Siswa_model->get_all();
        $data['nilai'] = $this->Nilai_model->get_all_nilai();
        $data['kelas'] = $this->Kelas_model->get_all_kelas();

        // echo '<pre>';
        // print_r($data['kelas']);
        // echo '</pre>';

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('rapormid_view', $data);
        $this->load->view('template/footer');
    }

    public function print_rapor($siswa_id)
    {
        // Get student data
        $siswa = $this->Siswa_model->get_by_id($siswa_id);
        $nilai_mid = $this->rapormid_model->ambilnilai($siswa_id);
        $pelajaran = $this->Pelajaran_model->get_all();
        $kelas_id = $siswa['kelas_id']; // Access kelas_id from $siswa array

        // Get class average for each subject
        $ratakelas_math = $this->rapormid_model->ratakelas($kelas_id, 3); // pelajaran_id 3 = Math
        $ratakelas_english = $this->rapormid_model->ratakelas($kelas_id, 4); // pelajaran_id 4 = English
        $ratakelas_science = $this->rapormid_model->ratakelas($kelas_id, 5); // pelajaran_id 5 = Science
        $ratakelas_ict = $this->rapormid_model->ratakelas($kelas_id, 6); // pelajaran_id 6 = ICT
        $ratakelas_tahfidz = $this->rapormid_model->ratakelas($kelas_id, 10); // pelajaran_id 10 = Tahfidz
        $ratakelas_arabic = $this->rapormid_model->ratakelas($kelas_id, 8); // pelajaran_id 8 = Arabic
        $deskripsi_nilai = $this->rapormid_model->ambilDeskripsi($siswa_id);
        $walikelas = $this->rapormid_model->getWaliKelas($kelas_id);

        $data['siswa'] = $siswa;
        $data['nilai_mid'] = $nilai_mid;
        $data['pelajaran'] = $pelajaran;
        $data['kelas_id'] = $kelas_id; // Pass kelas_id to the view
        $data['ratakelas_math'] = $ratakelas_math;
        $data['ratakelas_english'] = $ratakelas_english;
        $data['ratakelas_science'] = $ratakelas_science;
        $data['ratakelas_ict'] = $ratakelas_ict;
        $data['ratakelas_tahfidz'] = $ratakelas_tahfidz;
        $data['ratakelas_arabic'] = $ratakelas_arabic;
        $data['deskripsi_nilai'] = $deskripsi_nilai;
        $data['walikelas'] = $walikelas;

        // echo '<pre>';
        // print_r($data['nilai_mid']);
        // print_r($data['pelajaran']);
        // print_r($data['kelas_id']);
        // echo '</pre>';

        $this->load->view('print_rapormid_view', $data);
    }

    public function save_rapor_pdf($siswa_id)
    {
        // Get student data
        $siswa = $this->Siswa_model->get_by_id($siswa_id);
        $nilai_mid = $this->rapormid_model->ambilnilai($siswa_id);
        $pelajaran = $this->Pelajaran_model->get_all();
        $kelas_id = $siswa['kelas_id'];

        // Get class averages
        $ratakelas_math = $this->rapormid_model->ratakelas($kelas_id, 3);
        $ratakelas_english = $this->rapormid_model->ratakelas($kelas_id, 4);
        $ratakelas_science = $this->rapormid_model->ratakelas($kelas_id, 5);
        $ratakelas_ict = $this->rapormid_model->ratakelas($kelas_id, 6);
        $ratakelas_tahfidz = $this->rapormid_model->ratakelas($kelas_id, 10);
        $ratakelas_arabic = $this->rapormid_model->ratakelas($kelas_id, 8);
        $deskripsi_nilai = $this->rapormid_model->ambilDeskripsi($siswa_id);
        $walikelas = $this->rapormid_model->getWaliKelas($kelas_id);

        // Load PDF library
        $this->load->library('pdf');

        // Create new PDF document
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Ananda Islamic School');
        $pdf->SetTitle('Progress Report - ' . $siswa['nama']);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        // $pdf->SetFont('dauphin', '', 12);

        // Header with logo and school name
        $html =
            '<div style="text-align: center; margin-bottom: 20px;">
            <img src="' . base_url() . 'aset/dist/img/logo-ais.png" width="70px"><br>
            <span style="font-family:dauphin; font-size: 25px;"><strong>SDS Ananda Islamic School</strong></span><br>
            <span style="font-size: 10px;"><strong>PROGRESS REPORT & MID TEST RESULT<br>2024/2025</strong></span><br><br>
        </div>';

        // Student Information
        $html .= '<table style="width: 100%; margin-bottom: 20px;">
            <tr>
            <td style="width: 18%; padding: 8px;"><strong>Student Name</strong></td>
            <td style="width: 2%; padding: 8px;">:</td>
            <td style="width: 50%; padding: 8px;">' . $siswa['nama'] . '</td>
            <td style="width: 13%; padding: 8px;"><strong>Class</strong></td>
            <td style="width: 2%; padding: 8px;">:</td>
            <td style="width: 15%; padding: 8px;">Primary ' . $siswa['nama_kelas'] . '</td>
            </tr>
            <tr>
            <td style="padding: 8px;"><strong>NIS / NISN</strong></td>
            <td style="padding: 8px;">:</td>
            <td style="padding: 8px;">' . $siswa['nis'] . ' / ' . $siswa['nisn'] . '</td>
            <td style="padding: 8px;"><strong>Semester</strong></td>
            <td style="padding: 8px;">:</td>
            <td style="padding: 8px;">2</td>
            </tr>
        </table>
        <br><br>';

        // Scores Table
        $html .= '<table border="1" cellpadding="5" style="width: 100%;">
            <tr>
            <th style="width: 5%; background-color: #f2f2f2; text-align: center;"><strong>No</strong></th>
            <th style="width: 55%; background-color: #f2f2f2; text-align: center;"><strong>Subject</strong></th>
            <th style="width: 20%; background-color: #f2f2f2; text-align: center;"><strong>Score</strong></th>
            <th style="width: 20%; background-color: #f2f2f2; text-align: center;"><strong>Class Average</strong></th>
            </tr>';

        // International Studies Section
        $html .= '<tr style="background-color: #e2e3e5;">
            <td colspan="4" style="font-weight: bold;">International Studies</td>
        </tr>';

        // Add subject rows for International Studies
        $subjects = [
            ['id' => 3, 'name' => 'Mathematics', 'rataKelas' => $ratakelas_math],
            ['id' => 4, 'name' => 'English', 'rataKelas' => $ratakelas_english],
            ['id' => 5, 'name' => 'Science', 'rataKelas' => $ratakelas_science],
            ['id' => 6, 'name' => 'ICT', 'rataKelas' => $ratakelas_ict]
        ];

        $no = 1;
        foreach ($subjects as $subject) {
            $nilai = '-';
            foreach ($nilai_mid as $n) {
                if ($n['pelajaran_id'] == $subject['id']) {
                    $nilai = number_format(($n['nilai_pt'] + $n['nilai_mt']) / 2, 2);
                    break;
                }
            }
            $html .= '<tr>
                <td style="text-align: center;">' . $no++ . '</td>
                <td style="text-align: left;">' . $subject['name'] . '</td>
                <td style="text-align: center;">' . $nilai . '</td>
                <td style="text-align: center;">' . number_format($subject['rataKelas']['nilai_pt'], 2) . '</td>
            </tr>';
        }

        // Islamic Studies Section
        $html .= '<tr style="background-color: #e2e3e5;">
            <td colspan="4" style="font-weight: bold;">Islamic Studies</td>
        </tr>';

        $islamic_subjects = [
            ['id' => 10, 'name' => 'Tahfidz', 'rataKelas' => $ratakelas_tahfidz],
            ['id' => 8, 'name' => 'Arabic', 'rataKelas' => $ratakelas_arabic]
        ];

        $no = 1;
        foreach ($islamic_subjects as $subject) {
            $nilai = '-';
            foreach ($nilai_mid as $n) {
                if ($n['pelajaran_id'] == $subject['id']) {
                    $nilai = number_format(($n['nilai_pt'] + $n['nilai_mt']) / 2, 2);
                    break;
                }
            }
            $html .= '<tr>
                <td style="text-align: center;">' . $no++ . '</td>
                <td style="text-align: left;">' . $subject['name'] . '</td>
                <td style="text-align: center;">' . $nilai . '</td>
                <td style="text-align: center;">' . number_format($subject['rataKelas']['nilai_pt'], 2) . '</td>
            </tr>';
        }
        $html .= '</table>';

        // Description Table
        $html .= '<br><br><table border="1" cellpadding="5" style="margin-top: 20px;">
            <tr style="background-color: #e2e3e5;">
                <td style="font-weight: bold; text-align: center;">Description</td>
            </tr>
            <tr>
                <td style="text-align: center; padding: 8px; line-height: 1.5;">' .
            (isset($deskripsi_nilai['deskripsi']) ? nl2br($deskripsi_nilai['deskripsi']) : 'No description available') .
            '</td>
            </tr>
        </table>';

        // Signature Section
        $html .= '<p style="text-align: center; margin-top: 30px;">Jakarta, March 21<sup>st</sup>, 2023</p>';
        $html .= '<table style="width: 100%; margin-top: 20px;">
            <tr style="text-align: center;">
                <td style="width: 33.33%;">Parent Signature</td>
                <td style="width: 33.33%;">Principal Signature</td>
                <td style="width: 33.33%;">Teacher Signature</td>
            </tr>
            <tr>
                <td style="padding: 40px;">&nbsp;<br><br><br><br></td>
                <td style="padding: 40px;">&nbsp;</td>
                <td style="padding: 40px;">&nbsp;</td>
            </tr>
            <tr style="text-align: center;">
                <td style="font-weight: bold; text-decoration: underline;">___________________</td>
                <td style="font-weight: bold; text-decoration: underline;">Siti Nisrina, S.Pd</td>
                <td style="font-weight: bold; text-decoration: underline;">' .
            (isset($walikelas['nama']) ? $walikelas['nama'] : 'N/A') .
            '</td>
            </tr>
        </table>';

        // Output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('progress_report_' . $siswa['nama'] . '.pdf', 'I');
    }

    public function submit_form()
    {
        $kelas_id = $this->input->post('kelas_id');
        $siswa_id = $this->input->post('siswa_id');

        // Example of how to call the method properly:
        $data['nilai'] = $this->rapormid_model->ambilnilai($siswa_id, $kelas_id, $pelajaran_id);

        // Process the data (e.g., save to the database)
        // For now, just print the values
        echo "Kelas ID: " . $kelas_id . "<br>";
        echo "Siswa ID: " . $siswa_id;
    }
}

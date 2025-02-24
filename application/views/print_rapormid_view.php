<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Report</title>
    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>aset/print_rapormid.css"> -->

    <style>
        @font-face {
            font-family: dauphin;
            src: url(<?php echo base_url() ?>aset/dist/font/dauphin.ttf)
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .bp {
            font-family: 'dauphin';
            font-weight: bold;
            font-size: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .table-bordered {
            border: 1px solid #000;
        }

        .mt-3 {
            margin-top: 1.5em;
        }

        .mt-5 {
            margin-top: 3em;
        }

        .table-secondary {
            background-color: #e2e3e5;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div style="text-align: center; margin-bottom: 20px;">
        <img src="<?php echo base_url() ?>aset/dist/img/logo-ais.png" width="100px" alt="Logo Ananda Islamic School">
        <br>
        <span class="bp">SDS Ananda Islamic School</span>
        <br>
        <p style="font-size: 10px; margin-top: 5px;">PROGRESS REPORT & MID TEST RESULT<br>2024/2025</p>
    </div>

    <table style="width: 100%; margin-bottom: 20px; border: none;">
        <tr>
            <td style="width: 70%; text-align: left; padding: 8px; border: none; font-size: 14px;">
                <p style="margin: 5px 0;"><strong>Student Name:</strong> <?php echo isset($siswa['nama']) ? $siswa['nama'] : 'Data Kosong'; ?></p>
                <p style="margin: 5px 0;"><strong>NIS / NISN:</strong> <?php echo isset($siswa['nis']) ? $siswa['nis'] : 'Data Kosong'; ?> / <?php echo isset($siswa['nisn']) ? $siswa['nisn'] : 'Data Kosong'; ?></p>
            </td>
            <td style="width: 30%; text-align: left; padding: 8px; border: none; font-size: 14px;">
                <p style="margin: 5px 0;"><strong>Class:</strong> Primary <?php echo isset($siswa['nama_kelas']) ? $siswa['nama_kelas'] : 'Data Kosong'; ?></p>
                <p style="margin: 5px 0;"><strong>Semester:</strong> Semester 1</p>
            </td>
        </tr>
    </table>

    <table class="table table-bordered" style="margin-top: 20px;">
        <thead>
            <tr>
                <th style="width: 30px;">No</th>
                <th>Subject</th>
                <th style="width: 100px;">Score</th>
                <th style="width: 100px;">Class Average</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-secondary">
                <td colspan="4" style="font-weight: bold;">International Studies</td>
            </tr>
            <tr>
                <td>1</td>
                <td style="text-align: left;"><?php echo isset($pelajaran[0]['nama_pelajaran']) ? $pelajaran[0]['nama_pelajaran'] : 'N/A'; ?></td>
                <td><?php
                    foreach ($nilai_mid as $nilai) {
                        if ($nilai['pelajaran_id'] == 3) {
                            echo number_format(($nilai['nilai_pt'] + $nilai['nilai_mt']) / 2, 2);
                            break;
                        }
                    }
                    ?></td>
                <td><?php echo isset($ratakelas_math['nilai_pt']) ? number_format($ratakelas_math['nilai_pt'], 2) : 'N/A'; ?></td>
            </tr>
            <tr>
                <td>2</td>
                <td style="text-align: left;"><?php echo isset($pelajaran[1]['nama_pelajaran']) ? $pelajaran[1]['nama_pelajaran'] : 'N/A'; ?></td>
                <td><?php
                    foreach ($nilai_mid as $nilai) {
                        if ($nilai['pelajaran_id'] == 4) {
                            echo number_format(($nilai['nilai_pt'] + $nilai['nilai_mt']) / 2, 2);
                            break;
                        }
                    }
                    ?></td>
                <td><?php echo isset($ratakelas_english['nilai_pt']) ? number_format($ratakelas_english['nilai_pt'], 2) : 'N/A'; ?></td>
            </tr>
            <tr>
                <td>3</td>
                <td style="text-align: left;"><?php echo isset($pelajaran[2]['nama_pelajaran']) ? $pelajaran[2]['nama_pelajaran'] : 'N/A'; ?></td>
                <td><?php
                    foreach ($nilai_mid as $nilai) {
                        if ($nilai['pelajaran_id'] == 5) {
                            echo number_format(($nilai['nilai_pt'] + $nilai['nilai_mt']) / 2, 2);
                            break;
                        }
                    }
                    ?></td>
                <td><?php echo isset($ratakelas_science['nilai_pt']) ? number_format($ratakelas_science['nilai_pt'], 2) : 'N/A'; ?></td>
            </tr>
            <tr>
                <td>4</td>
                <td style="text-align: left;"><?php echo isset($pelajaran[3]['nama_pelajaran']) ? $pelajaran[3]['nama_pelajaran'] : 'N/A'; ?></td>
                <td><?php
                    foreach ($nilai_mid as $nilai) {
                        if ($nilai['pelajaran_id'] == 6) {
                            echo number_format(($nilai['nilai_pt'] + $nilai['nilai_mt']) / 2, 2);
                            break;
                        }
                    }
                    ?></td>
                <td><?php echo isset($ratakelas_ict['nilai_pt']) ? number_format($ratakelas_ict['nilai_pt'], 2) : 'N/A'; ?></td>
            </tr>
            <tr class="table-secondary">
                <td colspan="4" style="font-weight: bold;">Islamic Studies</td>
            </tr>
            <tr>
                <td>1</td>
                <td style="text-align: left;"><?php echo isset($pelajaran[5]['nama_pelajaran']) ? $pelajaran[5]['nama_pelajaran'] : 'N/A'; ?></td>
                <td><?php
                    foreach ($nilai_mid as $nilai) {
                        if ($nilai['pelajaran_id'] == 10) {
                            echo number_format(($nilai['nilai_pt'] + $nilai['nilai_mt']) / 2, 2);
                            break;
                        }
                    }
                    ?></td>
                <td><?php echo isset($ratakelas_tahfidz['nilai_pt']) ? number_format($ratakelas_tahfidz['nilai_pt'], 2) : 'N/A'; ?></td>
            </tr>
            <tr>
                <td>2</td>
                <td style="text-align: left;"><?php echo isset($pelajaran[4]['nama_pelajaran']) ? $pelajaran[4]['nama_pelajaran'] : 'N/A'; ?></td>
                <td><?php
                    foreach ($nilai_mid as $nilai) {
                        if ($nilai['pelajaran_id'] == 8) {
                            echo number_format(($nilai['nilai_pt'] + $nilai['nilai_mt']) / 2, 2);
                            break;
                        }
                    }
                    ?></td>
                <td><?php echo isset($ratakelas_arabic['nilai_pt']) ? number_format($ratakelas_arabic['nilai_pt'], 2) : 'N/A'; ?></td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered" style="margin-top: 20px;">
        <thead>
            <tr class="table-secondary">
                <td style="font-weight: bold; text-align: center;">Description</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center; padding: 10px;">
                    <?php echo isset($deskripsi_nilai['deskripsi']) ? $deskripsi_nilai['deskripsi'] : 'No description available'; ?>
                </td>
            </tr>
        </tbody>
    </table>

    <p style="text-align: center; margin-top: 30px;">Jakarta, September 13<sup>th</sup>, 2023</p>

    <table style="width: 100%; margin-top: 20px; border: none;">
        <tr style="text-align: center;">
            <td style="width: 33.33%; border: none;">Parent Signature</td>
            <td style="width: 33.33%; border: none;">Principal Signature</td>
            <td style="width: 33.33%; border: none;">Teacher Signature</td>
        </tr>
        <tr>
            <td style="padding: 40px; border: none;">&nbsp;</td>
            <td style="padding: 40px; border: none;">&nbsp;</td>
            <td style="padding: 40px; border: none;">&nbsp;</td>
        </tr>
        <tr style="text-align: center;">
            <td style="font-weight: bold; text-decoration: underline; border: none;">___________________</td>
            <td style="font-weight: bold; text-decoration: underline; border: none;">Siti Nisrina, S.Pd</td>
            <td style="font-weight: bold; text-decoration: underline; border: none;">
                <?php
                echo isset($walikelas['nama']) ? $walikelas['nama'] : 'N/A';
                ?>
            </td>
        </tr>
    </table>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Report</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: dauphin;
            src: url(<?php echo base_url() ?>aset/dist/font/dauphin.ttf)
        }

        .bp {
            font-family: 'dauphin';
            font-size: 40px;
            font-weight: bold;
        }

        .table th,
        .table td {
            text-align: center;
        }

        .isitabel {
            font-size: 18px;
        }

        @media print {
            body {
                margin: 1mm;
                /* Mengurangi margin saat print */
            }

            .table thead th {
                background-color: rgb(104, 104, 104) !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                color: white !important;
            }

            .table-secondary {
                background-color: rgb(0, 0, 0) !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .tdp {
                background-color: rgb(104, 104, 104) !important;
                print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>
    <div class="col-12 text-center">
        <br>
        <img src="<?php echo base_url() ?>aset/dist/img/logo-ais.png" width="150px" alt="Logo Ananda Islamic School">
        <br>
        <span class="bp">SDS Ananda Islamic School</span>
        <br>
        PROGRESS REPORT & MID TEST RESULT
        <br>
        2024/2025
    </div>
    <br>

    <table style="width: 100%;">
        <tr>
            <td class="isitabel" style="text-align: left;">
                <p><strong>Student Name:</strong> <?php echo isset($siswa['nama']) ? $siswa['nama'] : 'Data Kosong'; ?></p>
                <p><strong>NIS / NISN:</strong> <?php echo isset($siswa['nis']) ? $siswa['nis'] : 'Data Kosong'; ?></p>
            </td>
            <td class="isitabel" style="text-align: left;">
                <p><strong>Class:</strong> Primary <?php echo isset($siswa['nama_kelas']) ? $siswa['nama_kelas'] : 'Data Kosong'; ?></p>
                <p><strong>Semester:</strong> Semester 1</p>
            </td>
        </tr>
    </table>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th style="width: 30px; text-align: center; vertical-align: middle;">No</th>
                <th style="text-align: center; vertical-align: middle;">Subject</th>
                <th style="width: 150px; text-align: center; vertical-align: middle;">Score</th>
                <th style="width: 150px; text-align: center; vertical-align: middle;">Class Average</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-secondary">
                <td class="tdp" colspan="4"><strong>International Studies</strong></td>
            </tr>
            <tr>
                <td>1</td>
                <!-- Math -->
                <td style="text-align: left;"><?php echo isset($pelajaran[0]['nama_pelajaran']) ? $pelajaran[0]['nama_pelajaran'] : 'N/A'; ?></td>
                <td><?php
                    foreach ($nilai_mid as $nilai) {
                        if ($nilai['pelajaran_id'] == 3) {
                            echo number_format(($nilai['nilai_pt'] + $nilai['nilai_mt']) / 2, 2);
                            break; // Stop looping once you find the match
                        }
                    }
                    ?></td>
                <td>80</td>
            </tr>
            <tr>
                <td>2</td>
                <!-- English -->
                <td style="text-align: left;"><?php echo isset($pelajaran[1]['nama_pelajaran']) ? $pelajaran[1]['nama_pelajaran'] : 'N/A'; ?></td>
                <td><?php
                    foreach ($nilai_mid as $nilai) {
                        if ($nilai['pelajaran_id'] == 4) {
                            echo number_format(($nilai['nilai_pt'] + $nilai['nilai_mt']) / 2, 2);
                            break; // Stop looping once you find the match
                        }
                    }
                    ?></td>
                <td>80</td>
            </tr>
            <tr>
                <td>3</td>
                <!-- Science -->
                <td style="text-align: left;"> <?php echo isset($pelajaran[2]['nama_pelajaran']) ? $pelajaran[2]['nama_pelajaran'] : 'N/A'; ?></td>
                <td><?php
                    foreach ($nilai_mid as $nilai) {
                        if ($nilai['pelajaran_id'] == 5) {
                            echo number_format(($nilai['nilai_pt'] + $nilai['nilai_mt']) / 2, 2);
                            break; // Stop looping once you find the match
                        }
                    }
                    ?></td>
                <td>80</td>
            </tr>
            <tr>
                <td>4</td>
                <!-- ICT -->
                <td style="text-align: left;"><?php echo isset($pelajaran[3]['nama_pelajaran']) ? $pelajaran[3]['nama_pelajaran'] : 'N/A'; ?></td>
                <td><?php
                    foreach ($nilai_mid as $nilai) {
                        if ($nilai['pelajaran_id'] == 6) {
                            echo number_format(($nilai['nilai_pt'] + $nilai['nilai_mt']) / 2, 2);
                            break; // Stop looping once you find the match
                        }
                    }
                    ?></td>
                <td>80</td>
            </tr>
            <tr class="table-secondary">
                <td colspan="4"><strong>Islamic Studies</strong></td>
            </tr>
            <tr>
                <td>1</td>
                <!-- Tahfidz -->
                <td style="text-align: left;"><?php echo isset($pelajaran[5]['nama_pelajaran']) ? $pelajaran[5]['nama_pelajaran'] : 'N/A'; ?></td>
                <td><?php
                    foreach ($nilai_mid as $nilai) {
                        if ($nilai['pelajaran_id'] == 10) {
                            echo number_format(($nilai['nilai_pt'] + $nilai['nilai_mt']) / 2, 2);
                            break; // Stop looping once you find the match
                        }
                    }
                    ?></td>
                <td>80</td>
            </tr>
            <tr>
                <td>2</td>
                <!-- Arabic -->
                <td style="text-align: left;"><?php echo isset($pelajaran[4]['nama_pelajaran']) ? $pelajaran[4]['nama_pelajaran'] : 'N/A'; ?></td>
                <td><?php
                    foreach ($nilai_mid as $nilai) {
                        if ($nilai['pelajaran_id'] == 8) {
                            echo number_format(($nilai['nilai_pt'] + $nilai['nilai_mt']) / 2, 2);
                            break; // Stop looping once you find the match
                        }
                    }
                    ?></td>
                <td>80</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <td>
                    <strong>Description</strong>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Good Job, Keep it up!</td>
            </tr>
        </tbody>

    </table>

    <p class="text-center mt-5">Jakarta, September 13<sup>th</sup>, 2023</p>

    <table style="width: 100%;">
        <tr style="text-align: center;">
            <td>Parent Signature</td>
            <td>Principal Signature</td>
            <td>Teacher Signature</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>

        <tr style="text-align: center;">
            <td style="font-weight: bold; text-decoration: underline;">___________________</td>
            <td style="font-weight: bold; text-decoration: underline;">Siti Nisrina, S.Pd</td>
            <td style="font-weight: bold; text-decoration: underline;">Sue</td>
        </tr>

    </table>
</body>

</html>
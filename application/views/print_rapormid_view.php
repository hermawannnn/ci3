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
            src: url(<?php echo base_url() ?>aset/dist/dauphin.ttf)
        }

        @font-face {
            font-family: Monotype Corsiva;
            src: url(<?php echo base_url() ?>aset/dist/arial.ttf)
        }


        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .bp {
            font-family: 'dauphin';
            font-weight: bold;
            font-size: 25px;
        }

        .ds {
            font-family: 'Monotype Corsiva';
            font-size: 16px;
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

        body {
            background-image: url('<?php echo base_url() ?>aset/dist/img/raporback.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: 70%;
            background-blend-mode: lighten;
        }
    </style>
</head>

<body>
    <br>
    <br>
    <div style="text-align: center; margin-bottom: 20px;">
        <img src="<?php echo base_url() ?>aset/dist/img/logo-ais.png" width="100px" alt="Logo Ananda Islamic School">
        <br>
        <span class="bp">SDS Ananda Islamic School</span>
        <br>
        <p style="font-size: 10px; margin-top: 5px;"><strong>PROGRESS REPORT & MID TEST RESULT<br>2024/2025</strong></p>
    </div>
    <table style="width: 100%; margin-bottom: 20px; border: none;">
        <tr>
            <td style="width: 15%; text-align: left; border: none; padding: 2px;"><strong>Student Name</strong></td>
            <td style="width: 1%; text-align: left; border: none; padding: 2px;">: </td>
            <td style="width: 54%; text-align: left; border: none; padding: 2px;"><?php echo isset($siswa['nama']) ? $siswa['nama'] : 'Data Kosong'; ?></td>
            <td style="width: 10%; text-align: left; border: none; padding: 2px;"><strong>Class</strong></td>
            <td style="width: 1%; text-align: left; border: none; padding: 2px;">: </td>
            <td style="width: 19%; text-align: left; border: none; padding: 2px;">Primary <?php echo isset($siswa['nama_kelas']) ? $siswa['nama_kelas'] : 'Data Kosong'; ?></td>
        </tr>
        <tr>
            <td style="width: 15%; text-align: left; border: none; padding: 2px;"><strong>NIS / NISN</strong></td>
            <td style="width: 1%; text-align: left; border: none; padding: 2px;">: </td>
            <td style="width: 54%; text-align: left; border: none; padding: 2px;"><?php echo isset($siswa['nis']) ? $siswa['nis'] : 'Data Kosong'; ?> / <?php echo isset($siswa['nisn']) ? $siswa['nisn'] : 'Data Kosong'; ?></td>
            <td style="width: 10%; text-align: left; border: none; padding: 2px;"><strong>Semester</strong></td>
            <td style="width: 1%; text-align: left; border: none; padding: 2px;">: </td>
            <td style="width: 19%; text-align: left; border: none; padding: 2px;">2</td>
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
                <td class="ds" style="text-align: center; padding: 8px !important; line-height: 1.5; margin-bottom: 10px;">
                    <?php echo isset($deskripsi_nilai['deskripsi']) ? nl2br($deskripsi_nilai['deskripsi']) : 'No description available'; ?>
                </td>
            </tr>
        </tbody>
    </table>

    <p style=" text-align: center; margin-top: 30px;">Jakarta, March 20<sup>th</sup>, 2025</p>

    <table style="width: 100%; margin-top: 20px; border: none;">
        <tr style="text-align: center;">
            <td style="width: 33.33%; border: none;">Parent's Signature</td>
            <td style="width: 33.33%; border: none;">Principal's Signature</td>
            <td style="width: 33.33%; border: none;">Teacher's Signature</td>
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
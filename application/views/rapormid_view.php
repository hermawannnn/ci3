<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Rapor Mid Semester</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Rapor Mid Semester</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Rapor Mid Semester</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <select class="form-control" id="kelas_id">
                                            <option value="">Pilih Kelas</option>
                                            <?php foreach ($kelas as $kls): ?>
                                                <option value="<?php echo $kls->id; ?>"><?php echo $kls->nama_kelas; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Siswa</label>
                                        <select class="form-control" id="siswa_id">
                                            <option value="">Pilih Siswa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary" id="tampilkanRapor">Tampilkan Rapor</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Rapor Mid Semester</h3>
                        </div>
                        <div class="card-body">
                            <!-- Main content -->
                            <div class="rapormid p-3 mb-3" id="printableArea">
                                <!-- title row -->
                                <div class="row">
                                    <br>
                                    <div class="col-12 text-center">
                                        <img src="<?php echo base_url() ?>aset/dist/img/logo-ais.png" width="150px" alt="Logo Ananda Islamic School">
                                        <br>
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
                                        </style>
                                        <span class="bp">SDS Ananda Islamic School</span>
                                        <br>
                                        PROGRESS REPORT & MID TEST RESULT
                                        <br>
                                        2024/2025
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <br>
                                <!-- info row -->
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Student Name : <span id="student-name"></span></label>
                                        <br>
                                        <label for="">NIS / NISN : <span id="student-nis">-</span></label>

                                    </div>
                                    <div class="col-6">
                                        <label for="">Class : <span id="student-class">-</span></label>
                                        <br>
                                        <label for="">Semester : 2</label>
                                    </div>
                                </div>
                                <br>
                                <style>
                                    .c {
                                        text-align: center;
                                    }
                                </style>
                                <table class="table table-bordered">
                                    <tr style="text-align: center; background-color:rgb(155, 155, 155);">
                                        <th style="width: 50px; text-align: center;">No</th>
                                        <th>Subject</th>
                                        <th style="width: 100px;">Score</th>
                                        <th style="width: 100px;">Class Average</th>
                                    </tr>
                                    <tr style="text-align: center; background-color:rgb(155, 155, 155);">
                                        <td colspan="4">Internasional Studies</td>
                                    </tr>
                                    <tr>
                                        <td class="c">1</td>
                                        <td>Mathematics</td>
                                        <td class="c" id="math-score"></td>
                                        <td class="c">80</td>
                                    </tr>
                                    <tr>
                                        <td class="c">2</td>
                                        <td>English</td>
                                        <td class="c">90</td>
                                        <td class="c">80</td>
                                    </tr>
                                    <tr>
                                        <td class="c">3</td>
                                        <td>Science</td>
                                        <td class="c">90</td>
                                        <td class="c">80</td>
                                    </tr>
                                    <tr>
                                        <td class="c">4</td>
                                        <td>ICT</td>
                                        <td class="c">90</td>
                                        <td class="c">80</td>
                                    </tr>
                                    <tr style="text-align: center; background-color:rgb(155, 155, 155);">
                                        <td colspan="4">Islamic Studies</td>
                                    </tr>
                                    <tr>
                                        <td class="c">1</td>
                                        <td>Tahfidz</td>
                                        <td class="c">90</td>
                                        <td class="c">80</td>
                                    </tr>
                                    <tr>
                                        <td class="c">2</td>
                                        <td>Arabic</td>
                                        <td class="c">90</td>
                                        <td class="c">80</td>
                                    </tr>
                                </table>
                                <br>
                                <table class="table table-bordered">
                                    <tr style="text-align: center; background-color:rgb(155, 155, 155);">
                                        <td>Description</td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td>Good Job, Keep it up!</td>
                                    </tr>
                                </table>
                                <br>
                                <div class="row">
                                    <div class="col-12" style="text-align: center;">
                                        <p>Jakarta, September 13<sup>th</sup>, 2023</p>
                                    </div>
                                </div>
                                <br>
                                <div class="row text-center">
                                    <div class="col-4">
                                        <p>Parent's Signature</p>
                                        <br>
                                        <br>
                                        <br>
                                        <p>_______________________</p>
                                    </div>

                                    <div class="col-4">
                                        <p>Principal's Signature</p>
                                        <br>
                                        <br>
                                        <br>
                                        <p><u><b>Siti Nisrina, S.Pd</b></u></p>
                                    </div>

                                    <div class="col-4">
                                        <p>Teacher's Signature</p>
                                        <br>
                                        <br>
                                        <br>
                                        <p><u><b id="teacher-signature"></b></u></p>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button onclick="printDiv('printableArea')" class="btn btn-success">Print Table</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






</div>
<!-- /.content-wrapper -->








<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#kelas_id').change(function() {
            var kelas_id = $(this).val();
            if (kelas_id) {
                $.ajax({
                    url: '<?php echo base_url('rapormid/get_students_by_class'); ?>',
                    type: 'POST',
                    data: {
                        class_id: kelas_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        var siswa_options = '<option value="">Pilih Siswa</option>';
                        $.each(data, function(index, siswa) {
                            siswa_options += '<option value="' + siswa.id + '">' + siswa.nama + '</option>';
                        });
                        $('#siswa_id').html(siswa_options);
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                        $('#siswa_id').html('<option value="">Error loading students</option>');
                    }
                });
            } else {
                $('#siswa_id').html('<option value="">Pilih Siswa</option>');
            }
        });

        $('#tampilkanRapor').click(function() {
            var siswa_id = $('#siswa_id').val();
            var siswa_nama = $('#siswa_id option:selected').text();
            var kelas_id = $('#kelas_id').val();

            $('#student-name').text(siswa_nama);

            if (siswa_id) {
                $.ajax({
                    url: '<?php echo base_url('rapormid/get_student_data'); ?>',
                    type: 'POST',
                    data: {
                        student_id: siswa_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.success) {
                            $('#student-nis').text(data.data.nis + ' / ' + data.data.nisn);
                            $('#student-class').text(data.data.nama_kelas);
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                        alert('Error loading student data.');
                    }
                });

                $.ajax({
                    url: '<?php echo base_url('rapormid/get_average_score'); ?>',
                    type: 'POST',
                    data: {
                        student_id: siswa_id,
                        kelas_id: kelas_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#math-score').text(data.average_score);
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                        alert('Error loading average score.');
                    }
                });

                $.ajax({
                    url: '<?php echo base_url('rapormid/get_teacher_name'); ?>',
                    type: 'POST',
                    data: {
                        kelas_id: kelas_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#teacher-signature').text(data.nama_wali_kelas);
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                        alert('Error loading teacher name.');
                    }
                });
            }
        });
    });
</script>
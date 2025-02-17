<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
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
                                        <label for="subject">Pilih Kelas:</label>
                                        <select name="class" id="class" class="form-control">
                                            <?php foreach ($kelas as $a): ?>
                                                <option value="<?= $a->id; ?>"><?= $a->nama_kelas; ?> (<?= $a->nama_wali_kelas; ?>)</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="student">Pilih Siswa:</label>
                                        <select name="student" id="student" class="form-control">
                                            <?php foreach ($students as $student): ?>
                                                <option value="<?= $student->id; ?>" data-class-id="<?= $student->class_id; ?>"><?= $student->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <script>
                                    $(document).ready(function() {
                                        function filterStudentsByClass(classId) {
                                            $('#student option').each(function() {
                                                if ($(this).data('class-id') == classId) {
                                                    $(this).show();
                                                } else {
                                                    $(this).hide();
                                                }
                                            });
                                        }

                                        var initialClassId = $('#class').val();
                                        filterStudentsByClass(initialClassId);

                                        $('#class').on('change', function() {
                                            var selectedClassId = $(this).val();
                                            filterStudentsByClass(selectedClassId);
                                        });
                                    });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                                        <label for="">Student Name : <span id="student-name">-</span></label>
                                        <br>
                                        <label for="">NIS / NISN : <span id="student-nis">-</span></label>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Class : <span id="student-class">-</span></label>
                                        <br>
                                        <label for="">Semester : 1</label>
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
                                        <td class="c">90</td>
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
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}

$(document).ready(function() {
    // Set initial wali kelas
    var initialWaliKelas = $('#class option:first').text().split(' (')[1].replace(')', '');
    $('#teacher-signature').text(initialWaliKelas);
    
    // Update wali kelas when class changes
    $('#class').on('change', function() {
        var selectedClassId = $(this).val();
        $.ajax({
            url: '<?= base_url('rapormid/get_wali_kelas') ?>',
            type: 'GET',
            data: { class_id: selectedClassId },
            dataType: 'json',
            success: function(response) {
                $('#teacher-signature').text(response.nama_wali_kelas);
            }
        });
    });

    // Load student data when student is selected
    $('#student').on('change', function() {
        var studentId = $(this).val();
        $.ajax({
            url: '<?= base_url('rapormid/get_student_data') ?>',
            type: 'POST',
            data: { student_id: studentId },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#student-name').text(response.data.name);
                    $('#student-nis').text(response.data.nis);
                    $('#student-class').text($('#class option:selected').text().split(' (')[0]);
                }
            },
            error: function() {
                alert('Error fetching student data');
            }
        });
    });
});
</script>
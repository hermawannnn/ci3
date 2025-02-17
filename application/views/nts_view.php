<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Input PT & MT</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Input PT & MT</li>
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
                            <h3 class="card-title">Input PT & MT</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="your_action_url" method="post">
                                        <div class="form-group">
                                            <label for="kelas">Kelas Mengajar:</label>
                                            <select class="form-control" id="kelas" name="kelas">
                                                <?php if (empty($pembelajaran)): ?>
                                                    <option value="">Belum ada data mengajar</option>
                                                <?php else: ?>
                                                    <?php foreach ($pembelajaran as $p): ?>
                                                        <option value="<?= $p->kelas_id ?>"><?= $p->nama_kelas ?> - <?= $p->nama_pelajaran ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Input PT & MT</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="siswaTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Data will be populated by JavaScript -->
                                        </tbody>
                                    </table>
                                    <p id="noDataMessage" style="display: none;">Belum ada data siswa untuk kelas yang dipilih.</p>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

</div>
<!-- /.content-wrapper -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#kelas').change(function() {
            var kelas_id = $(this).val();
            $.ajax({
                url: '<?= base_url('nts/get_siswa_by_kelas') ?>', // Replace 'nts' with your controller name
                type: 'post',
                data: {
                    kelas_id: kelas_id
                },
                dataType: 'json',
                success: function(response) {
                    var len = response.length;
                    var tableBody = $('#siswaTable tbody');
                    tableBody.empty();
                    if (len > 0) {
                        $('#noDataMessage').hide();
                        for (var i = 0; i < len; i++) {
                            var no = i + 1;
                            var nama_siswa = response[i]['nama_siswa']; // Adjust 'nama_siswa' to your actual column name
                            var nama_kelas = response[i]['nama_kelas']; // Adjust 'nama_kelas' to your actual column name
                            var row = '<tr>' +
                                '<td>' + no + '</td>' +
                                '<td>' + nama_siswa + '</td>' +
                                '<td>' + nama_kelas + '</td>' +
                                '</tr>';
                            tableBody.append(row);
                        }
                    } else {
                        $('#noDataMessage').show();
                    }
                }
            });
        });
    });
</script>
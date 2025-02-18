<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nilai Mid</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Nilai Mid</li>
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
                            <h3 class="card-title">Data Nilai Mid</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="filter_kelas_id">Filter by Kelas</label>
                                <select class="form-control" id="filter_kelas_id">
                                    <option value="">Pilih Kelas</option>
                                    <?php foreach ($kelas as $k): ?>
                                        <option value="<?php echo $k['id']; ?>"><?php echo $k['nama_kelas']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="filter_pelajaran_id">Filter by Pelajaran</label>
                                <select class="form-control" id="filter_pelajaran_id" disabled>
                                    <option value="">Pilih Pelajaran</option>
                                    <?php foreach ($pelajaran as $p): ?>
                                        <option value="<?php echo $p['id']; ?>"><?php echo $p['nama_pelajaran']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <form action="<?php echo site_url('nilai/create'); ?>" method="post" id="nilai_form" style="display: none;">
                                <input type="hidden" name="kelas_id" id="kelas_id_hidden">
                                <input type="hidden" name="pelajaran_id" id="pelajaran_id_hidden">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Nilai PT</th>
                                            <th>Nilai MT</th>
                                            <th>Nilai Akhir</th>
                                        </tr>
                                    </thead>
                                    <tbody id="nilai_table_body">
                                        <!-- Rows will be populated by JavaScript -->
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Nilai PT</th>
                                            <th>Nilai MT</th>
                                            <th>Nilai Akhir</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
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
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    document.getElementById('filter_kelas_id').addEventListener('change', function() {
        var kelas_id = this.value;
        document.getElementById('kelas_id_hidden').value = kelas_id;
        var pelajaranSelect = document.getElementById('filter_pelajaran_id');
        if (kelas_id) {
            pelajaranSelect.disabled = false;
            fetch('<?php echo site_url('nilai/get_siswa_by_kelas/'); ?>' + kelas_id)
                .then(response => response.json())
                .then(data => {
                    var tableBody = document.getElementById('nilai_table_body');
                    tableBody.innerHTML = '';
                    data.forEach(function(siswa, index) {
                        var row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${index + 1}</td>
                            <td>${siswa.nama}</td>
                            <td><input type="number" class="form-control" name="nilai_pt[${siswa.id}]" max="100" required></td>
                            <td><input type="number" class="form-control" name="nilai_mt[${siswa.id}]" max="100" required></td>
                            <td><span id="nilai_akhir_${siswa.id}"></span></td>
                        `;
                        tableBody.appendChild(row);
                    });
                });
        } else {
            pelajaranSelect.disabled = true;
            document.getElementById('nilai_form').style.display = 'none';
            // Clear the table if no class is selected
            document.getElementById('nilai_table_body').innerHTML = '';
        }
    });

    document.getElementById('filter_pelajaran_id').addEventListener('change', function() {
        var kelas_id = document.getElementById('filter_kelas_id').value;
        var pelajaran_id = this.value;
        document.getElementById('pelajaran_id_hidden').value = pelajaran_id;
        if (kelas_id && pelajaran_id) {
            fetch('<?php echo site_url('nilai/get_nilai_by_kelas_and_pelajaran/'); ?>' + kelas_id + '/' + pelajaran_id)
                .then(response => response.json())
                .then(data => {
                    var tableBody = document.getElementById('nilai_table_body');
                    tableBody.innerHTML = '';
                    data.forEach(function(n, index) {

                        var a = parseFloat(n.nilai_pt) || 0;
                        var b = parseFloat(n.nilai_mt) || 0;
                        var nilai_akhir = (a + b) / 2;

                        var row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${index + 1}</td>
                            <td>${n.nama_siswa}</td>
                            <td><input type="number" class="form-control" name="nilai_pt[${n.siswa_id}]" value="${n.nilai_pt || 0}" max="100" required></td>
                            <td><input type="number" class="form-control" name="nilai_mt[${n.siswa_id}]" value="${n.nilai_mt || 0}" max="100" required></td>
                            <td class="text-center font-weight-bold">${nilai_akhir.toFixed(2)}</td>
                        `;
                        tableBody.appendChild(row);
                    });
                    document.getElementById('nilai_form').style.display = 'block';
                });
        } else {
            document.getElementById('nilai_form').style.display = 'none';
        }
    });
</script>
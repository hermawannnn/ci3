<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nilai Deskripsi MID</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Nilai Deskripsi MID</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Nilai Deskripsi MID</h3>
                            <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-tambah">Tambah Data</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <select class="form-control" id="filter_kelas_id">
                                <option value="">Pilih Kelas</option>
                                <?php foreach ($kelas as $k): ?>
                                    <option value="<?= $k['id']; ?>"><?= $k['nama_kelas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <br>
                            <form action="">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="nilaideskripsimid">
                                        <!-- Nanati tampil semua data siswa di sini -->
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
    document.getElementById('filter_kelas_id').addEventListener('change', function) {
        var kelas_id = this.value;
        var tbody = document.getElementById('nilaideskripsimid');
        tbody.innerHTML = '';
        fetch(`<?= site_url('nilaideskripsimid/getByKelasId/') ?>${kelas_id}`)
            .then(response => response.json())
            .then(data => {
                data.forEach((item, index) => {
                    var tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${item.nama_siswa}</td>
                        <td>${item.deskripsi}</td>
                    `;
                    tbody.appendChild(tr);
                });
            });
    }
</script>
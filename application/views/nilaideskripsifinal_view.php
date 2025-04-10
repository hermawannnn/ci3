<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nilai Deskripsi Final</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Nilai Deskripsi Final</li>
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
                            <h3 class="card-title">Data Nilai Deskripsi Final</h3>
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
                            <form action="<?php echo site_url('nilaideskripsifinal/create') ?>" method="post" id="nilaideskripsi_form">
                                <input type="hidden" name="kelas_id" id="kelas_id_hidden">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="nilai_table_body">
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.getElementById('filter_kelas_id').addEventListener('change', function() {
        var kelas_id = this.value;
        document.getElementById('kelas_id_hidden').value = kelas_id;
        if (kelas_id) {
            fetch('<?php echo site_url('nilaideskripsifinal/get_nilaidesk_by_kelas/'); ?>' + kelas_id)
                .then(response => response.json())
                .then(data => {
                    var tableBody = document.getElementById('nilai_table_body');
                    tableBody.innerHTML = '';
                    data.forEach(function(siswa, index) {
                        var row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${index + 1}</td>
                            <td>${siswa.nama_siswa}</td>
                            <td><textarea class="form-control" name="deskripsi[${siswa.siswa_id}]">${siswa.deskripsi !== null ? siswa.deskripsi : ''}</textarea></td>
                        `;
                        tableBody.appendChild(row);
                    });
                });
        } else {
            document.getElementById('nilaideskripsi_form').style.display = 'none';
            document.getElementById('nilai_table_body').innerHTML = '';
        }
    });

    document.getElementById('nilaideskripsi_form').addEventListener('submit', function(event) {
        var textareas = document.querySelectorAll('textarea[name^="deskripsi"]');
        textareas.forEach(function(textarea) {
            if (textarea.value.trim() === '') {
                textarea.value = null;
            }
        });
    });
</script>

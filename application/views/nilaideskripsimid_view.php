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
                            <!-- <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-tambah">Tambah Data</a> -->
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
                            <form action="<?php echo site_url('nilaideskripsimid/create') ?>" method="post" id="nilaideskripsi_form">
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
    // Menambahkan event listener untuk perubahan pada elemen dengan id 'filter_kelas_id'
    document.getElementById('filter_kelas_id').addEventListener('change', function() {
        var kelas_id = this.value; // Mendapatkan nilai dari elemen yang berubah
        document.getElementById('kelas_id_hidden').value = kelas_id; // Menyimpan nilai kelas_id ke elemen tersembunyi
        if (kelas_id) { // Jika kelas_id memiliki nilai
            // Melakukan fetch data siswa berdasarkan kelas_id
            fetch('<?php echo site_url('nilaideskripsimid/get_nilaidesk_by_kelas/'); ?>' + kelas_id)
                .then(response => response.json()) // Mengubah response menjadi JSON
                .then(data => {
                    var tableBody = document.getElementById('nilai_table_body'); // Mendapatkan elemen tbody dari tabel nilai
                    tableBody.innerHTML = ''; // Mengosongkan isi tabel
                    data.forEach(function(siswa, index) { // Iterasi melalui data siswa
                        var row = document.createElement('tr'); // Membuat elemen baris tabel
                        // Menambahkan isi baris tabel dengan data siswa
                        row.innerHTML = `
                            <td>${index + 1}</td>
                            <td>${siswa.nama_siswa}</td>
                            <td><textarea class="form-control" name="deskripsi[${siswa.siswa_id}]">${siswa.deskripsi !== null ? siswa.deskripsi : ''}</textarea></td>
                        `;
                        tableBody.appendChild(row); // Menambahkan baris ke tabel
                    });
                });
        } else { // Jika kelas_id tidak memiliki nilai
            document.getElementById('nilaideskripsi_form').style.display = 'none'; // Menyembunyikan form nilai
            // Mengosongkan isi tabel jika tidak ada kelas yang dipilih
            document.getElementById('nilai_table_body').innerHTML = '';
        }
    });

    // Menambahkan event listener untuk submit form
    document.getElementById('nilaideskripsi_form').addEventListener('submit', function(event) {
        var textareas = document.querySelectorAll('textarea[name^="deskripsi"]');
        textareas.forEach(function(textarea) {
            if (textarea.value.trim() === '') {
                textarea.value = null; // Mengisi dengan null jika textarea kosong
            }
        });
    });
</script>
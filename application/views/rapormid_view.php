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
                        <li class="breadcrumb-item active">Cetak Rapor Mid Semester</li>
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
                            <h3 class="card-title">Data Rapor Mid Semester</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="filter_kelas_id">Filter by Kelas</label>
                                <select class="form-control" id="filter_kelas_id">
                                    <option value="">Pilih Kelas</option>
                                    <?php foreach ($kelas as $k): ?>
                                        <?php if ($this->session->userdata('role') == 'admin' || $k['wali_kelas'] == $this->session->userdata('id')): ?>
                                            <option value="<?php echo $k['id']; ?>"><?php echo $k['nama_kelas']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <form action="" method="post" id="">
                                <input type="hidden" name="kelas_id" id="kelas_id_hidden">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="nilai_table_body">
                                        <!-- Rows will be populated by JavaScript -->
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Aksi</th>
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
        // Simpan kelas_id ke localStorage
        localStorage.setItem('selected_kelas_id', kelas_id);
        document.getElementById('kelas_id_hidden').value = kelas_id;
        loadSiswa(kelas_id);
    });

    // Fungsi untuk load siswa
    function loadSiswa(kelas_id) {
        if (kelas_id) {
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
                                <td>
                                    <button class="btn btn-secondary" onclick="printRapor(${siswa.id})">Print</button>
                                    <button class="btn btn-primary" onclick="saveRaporToPdf(${siswa.id})">Save to PDF</button>
                                </td>
                            `;
                        tableBody.appendChild(row);
                    });
                });
        }
    }

    // Tambahkan script untuk mengecek localStorage saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        var savedKelasId = localStorage.getItem('selected_kelas_id');
        if (savedKelasId) {
            var selectElement = document.getElementById('filter_kelas_id');
            selectElement.value = savedKelasId;
            loadSiswa(savedKelasId);
        }
    });

    function printRapor(siswaId) {
        window.open('<?php echo site_url('rapormid/print_rapor/'); ?>' + siswaId, '_blank');
    }

    function saveRaporToPdf(siswaId) {
        window.open('<?php echo site_url('rapormid/save_rapor_pdf/'); ?>' + siswaId, '_blank');
    }
</script>
</body>

</html>
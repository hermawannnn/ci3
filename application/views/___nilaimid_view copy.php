<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Input/Edit PT & MT</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Input/Edit PT & MT</li>
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
                            <h3 class="card-title">Input/Edit PT & MT</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form id="nilaiForm" action="<?= base_url('raport/save_nilai') ?>" method="post">
                                        <div class="form-group">
                                            <label for="kelas">Kelas Mengajar:</label>
                                            <select class="form-control" id="kelas" name="kelas">
                                                <?php if (empty($pembelajaran)): ?>
                                                    <option value="">Belum ada data mengajar</option>
                                                <?php else: ?>
                                                    <option>Pilih Kelas dan Mata Pelajaran</option>
                                                    <?php usort($pembelajaran, function ($a, $b) {
                                                        return strcmp($a->nama_kelas, $b->nama_kelas);
                                                    }); ?>
                                                    <?php foreach ($pembelajaran as $p): ?>
                                                        <option value="<?= $p->kelas_id ?>-<?= $p->pelajaran_id ?>"><?= $p->nama_kelas ?> - <?= $p->nama_pelajaran ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Daftar Siswa:</label>
                                            <table id="siswaTable" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Nilai PT</th>
                                                        <th>Nilai MT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Data siswa akan ditampilkan di sini -->

                                                </tbody>
                                            </table>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan Nilai</button>
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

</div>
<!-- /.content-wrapper -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to load existing data
        function loadExistingData() {
            var selectedValue = $('#kelas').val();
            if (selectedValue) {
                var [kelasId, pelajaranId] = selectedValue.split('-');
                $.ajax({
                    url: '<?= base_url('raport/get_siswa_by_kelas') ?>',
                    type: 'post',
                    data: {
                        kelas_id: kelasId,
                        pelajaran_id: pelajaranId
                    },
                    dataType: 'json',
                    success: function(response) {
                        var tableBody = $('#siswaTable tbody');
                        tableBody.empty();

                        if (response.length > 0) {
                            response.sort(function(a, b) {
                                return a.nama.localeCompare(b.nama);
                            });

                            var rowNumber = 1;
                            $.each(response, function(i, siswa) {
                                var nilaiPt = (siswa.nilai_pt === null || siswa.nilai_pt === undefined) ? '' : siswa.nilai_pt;
                                var nilaiMt = (siswa.nilai_mt === null || siswa.nilai_mt === undefined) ? '' : siswa.nilai_mt;

                                var row = '<tr>' +
                                    '<td>' + rowNumber + '</td>' +
                                    '<td>' + siswa.nama + '</td>' +
                                    '<td><input type="number" class="form-control nilaimid-pt" name="nilai_pt[' + siswa.id + ']" value="' + nilaiPt + '" min="0" max="100"></td>' +
                                    '<td><input type="number" class="form-control nilaimid-mt" name="nilai_mt[' + siswa.id + ']" value="' + nilaiMt + '" min="0" max="100"></td>' +
                                    '</tr>';
                                tableBody.append(row);
                                rowNumber++;
                            });
                        } else {
                            tableBody.append('<tr><td colspan="4">Tidak ada siswa di kelas ini</td></tr>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
            }
        }

        // Load existing data on page load
        loadExistingData();

        $('#kelas').change(function() {
            loadExistingData();
        });

        // Validate input on form submit
        $('#nilaiForm').submit(function(event) {
            $('.nilaimid-pt, .nilaimid-mt').each(function() {
                var value = $(this).val();
                if (value < 0 || value > 100) {
                    alert('Nilai harus berada di antara 0 dan 100.');
                    event.preventDefault();
                    return false;
                }
            });
        });
    });
</script>
</script>
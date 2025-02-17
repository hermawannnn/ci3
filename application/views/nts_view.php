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
                                    <form id="nilaiForm" action="<?= base_url('raport/save_nilai') ?>" method="post">
                                        <div class="form-group">
                                            <label for="kelas">Kelas Mengajar:</label>
                                            <select class="form-control" id="kelas" name="kelas">
                                                <?php if (empty($pembelajaran)): ?>
                                                    <option value="">Belum ada data mengajar</option>
                                                <?php else: ?>
                                                    <option>Pilih Kelas dan Mata Pelajaran</option>
                                                    <?php foreach ($pembelajaran as $p): ?>

                                                        <option value="<?= $p->kelas_id ?>"><?= $p->nama_kelas ?> - <?= $p->nama_pelajaran ?></option>
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
        $('#kelas').change(function() {
            var kelasId = $(this).val();
            $.ajax({
                url: '<?= base_url('raport/get_siswa_by_kelas') ?>',
                type: 'post',
                data: {
                    kelas_id: kelasId
                },
                dataType: 'json',
                success: function(response) {
                    var tableBody = $('#siswaTable tbody');
                    tableBody.empty(); // Clear existing data

                    if (response.length > 0) {
                        var rowNumber = 1; // Initialize row number
                        $.each(response, function(i, siswa) {
                            // Fetch existing nilai PT and MT from the database
                            $.ajax({
                                url: '<?= base_url('raport/get_existing_nilai') ?>',
                                type: 'post',
                                data: {
                                    kelas_id: kelasId,
                                    siswa_id: siswa.id
                                },
                                dataType: 'json',
                                success: function(nilaiResponse) {
                                    var nilai_pt = nilaiResponse ? nilaiResponse.nilai_pt : '';
                                    var nilai_mt = nilaiResponse ? nilaiResponse.nilai_mt : '';

                                    var row = '<tr>' +
                                        '<td>' + rowNumber + '</td>' +
                                        '<td>' + siswa.nama + '</td>' +
                                        '<td><input type="number" class="form-control nilai-pt" name="nilai_pt[' + siswa.id + ']" value="' + nilai_pt + '" min="0" max="100"></td>' +
                                        '<td><input type="number" class="form-control nilai-mt" name="nilai_mt[' + siswa.id + ']" value="' + nilai_mt + '" min="0" max="100"></td>' +
                                        '</tr>';
                                    tableBody.append(row);
                                    rowNumber++; // Increment row number
                                },
                                error: function(xhr, status, error) {
                                    console.error(xhr);
                                }
                            });
                        });
                    } else {
                        tableBody.append('<tr><td colspan="4">Tidak ada siswa di kelas ini</td></tr>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        });

        // Validate input on form submit
        $('#nilaiForm').submit(function(event) {
            $('.nilai-pt, .nilai-mt').each(function() {
                var value = $(this).val();
                if (value < 0 || value > 100) {
                    alert('Nilai harus berada di antara 0 dan 100.');
                    event.preventDefault(); // Prevent form submission
                    return false; // Stop the loop
                }
            });
        });
    });
</script>
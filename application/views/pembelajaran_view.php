<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pembelajaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Pembelajaran</li>
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
                            <h3 class="card-title">Data Pembelajaran</h3>
                            <button class="btn btn-success float-right" data-toggle="modal" data-target="#modal-tambah">Tambah Pembelajaran</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                            <?php endif; ?>
                            <form id="filterForm">
                                <div class="form-group">
                                    <label for="subject">Pilih Mata Pelajaran:</label>
                                    <select id="subject" name="subject" class="form-control" onchange="filterTable()">
                                        <?php foreach ($pelajaran as $row): ?>
                                            <?php if (isset($row->nama_pelajaran)): ?>
                                                <option value="<?php echo $row->nama_pelajaran; ?>"><?php echo $row->nama_pelajaran; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="unit">Pilih Unit:</label>
                                    <select id="unit" name="unit" class="form-control" onchange="filterTable()">
                                        <?php foreach ($units as $unit): ?>
                                            <option value="<?php echo $unit->nama_unit; ?>"><?php echo $unit->nama_unit; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="guru_mapel">Pilih Guru Mapel:</label>
                                    <select id="guru_mapel" name="guru_mapel" class="form-control" onchange="filterTable()">
                                        <option value="">Semua Guru</option>
                                        <?php foreach ($guru_mapel as $guru): ?>
                                            <option value="<?php echo $guru->nama_guru; ?>"><?php echo $guru->nama_guru; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </form>
                            <br>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nama Mata Pelajaran</th>
                                    <th>Nama Kelas</th>
                                    <th>Guru Mapel</th>
                                    <th>Unit</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pembelajaran as $row): ?>
                                    <tr>
                                        <?php if (isset($row->nama_pelajaran)): ?>
                                            <td><?php echo $row->nama_pelajaran; ?></td>
                                        <?php endif; ?>
                                        <?php if (isset($row->nama_kelas)): ?>
                                            <td><?php echo $row->nama_kelas; ?></td>
                                        <?php endif; ?>
                                        <?php if (isset($row->nama)): ?>
                                            <td><?php echo $row->nama; ?></td>
                                        <?php endif; ?>
                                        <?php if (isset($row->nama_unit)): ?>
                                            <td><?php echo $row->nama_unit; ?></td>
                                        <?php endif; ?>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit-<?php echo $row->id; ?>">Edit</button>
                                            <a href="<?php echo site_url('pembelajaran/hapus/'.$row->id); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pembelajaran ini?');">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Nama Mata Pelajaran</th>
                                    <th>Nama Kelas</th>
                                    <th>Guru Mapel</th>
                                    <th>Unit</th>
                                    <th>Aksi</th>
                                </tr>
                                </tfoot>
                            </table>
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



<?php foreach ($pembelajaran as $row): ?>
<div class="modal fade" id="modal-edit-<?php echo $row->id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Pembelajaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="<?php echo site_url('pembelajaran/update'); ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                        <div class="form-group">
                            <label for="nama_pelajaran">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control" id="nama_pelajaran" name="nama_pelajaran" value="<?php echo $row->nama_pelajaran; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?php echo $row->nama_kelas; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="guru_mapel">Guru Mapel</label>
                            <input type="text" class="form-control" id="guru_mapel" name="guru_mapel" value="<?php echo $row->guru_mapel; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="unit">Unit</label>
                            <input type="text" class="form-control" id="unit" name="unit" value="<?php echo $row->unit; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php endforeach; ?>

<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-tambah-label">Tambah Pembelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url('pembelajaran/simpan'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_pelajaran">Nama Mata Pelajaran</label>
                        <input type="text" class="form-control" id="nama_pelajaran" name="nama_pelajaran" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_kelas">Nama Kelas</label>
                        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
                    </div>
                    <div class="form-group">
                        <label for="guru_mapel">Guru Mapel</label>
                        <input type="text" class="form-control" id="guru_mapel" name="guru_mapel" required>
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <input type="text" class="form-control" id="unit" name="unit" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function filterTable() {
    var subjectInput, unitInput, guruInput, table, tr, td, i, txtValue;
    subjectInput = document.getElementById("subject").value.toUpperCase();
    unitInput = document.getElementById("unit").value.toUpperCase();
    guruInput = document.getElementById("guru_mapel").value.toUpperCase();
    table = document.getElementById("example1");
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {
        var showRow = true;
        var subjectTd = tr[i].getElementsByTagName("td")[0];
        var unitTd = tr[i].getElementsByTagName("td")[3];
        var guruTd = tr[i].getElementsByTagName("td")[2];

        if (subjectTd) {
            var subjectTxt = subjectTd.textContent || subjectTd.innerText;
            if (subjectTxt.toUpperCase().indexOf(subjectInput) === -1) {
                showRow = false;
            }
        }

        if (unitTd) {
            var unitTxt = unitTd.textContent || unitTd.innerText;
            if (unitTxt.toUpperCase().indexOf(unitInput) === -1) {
                showRow = false;
            }
        }

        if (guruTd) {
            var guruTxt = guruTd.textContent || guruTd.innerText;
            if (guruTxt.toUpperCase().indexOf(guruInput) === -1) {
                showRow = false;
            }
        }

        tr[i].style.display = showRow ? "" : "none";
    }
}
</script>

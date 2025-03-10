<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Kelas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Mengajar</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Filter Section -->
    <!-- <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Filter Data Mengajar</h3>
                        </div>
                        <div class="card-body">
                            <form id="filterForm">
                                <div class="form-group">
                                    <label>Pelajaran</label>
                                    <select class="form-control" name="pelajaran_id" id="pelajaran_id">
                                        <option value="">Semua Pelajaran</option>
                                        <?php foreach ($pelajaran as $pel): ?>
                                            <option value="<?php echo $pel['id']; ?>"><?php echo $pel['nama_pelajaran']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Unit</label>
                                    <select class="form-control" name="unit_id" id="unit_id">
                                        <option value="">Semua Unit</option>
                                        <?php foreach ($units as $unit): ?>
                                            <option value="<?php echo $unit->id; ?>"><?php echo $unit->nama_unit; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select class="form-control" name="kelas_id" id="kelas_id">
                                        <option value="">Semua Kelas</option>
                                        <?php foreach ($kelas as $k): ?>
                                            <option value="<?php echo $k->id; ?>"><?php echo $k->nama_kelas; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pengajar</label>
                                    <select class="form-control" name="user_id" id="user_id">
                                        <option value="">Semua Pengajar</option>
                                        <?php foreach ($users as $user): ?>
                                            <option value="<?php echo $user->id; ?>"><?php echo $user->nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Mengajar</h3>
                            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-default">
                                Tambah Data Mengajar
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if ($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger">
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Pelajaran</th>
                                        <th>Unit</th>
                                        <th>Kelas</th>
                                        <th>User</th>
                                        <th>Username</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="dataMengajar">
                                    <?php foreach ($pembelajaran as $row): ?>
                                        <tr data-pelajaran="<?php echo $row['pelajaran_id']; ?>"
                                            data-unit="<?php echo $row['unit_id']; ?>"
                                            data-kelas="<?php echo $row['kelas_id']; ?>"
                                            data-user="<?php echo $row['user_id']; ?>">
                                            <td>
                                                <?php
                                                foreach ($pelajaran as $pel) {
                                                    if ($pel['id'] == $row['pelajaran_id']) {
                                                        echo $pel['nama_pelajaran'];
                                                        break;
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                foreach ($units as $unit) {
                                                    if ($unit->id == $row['unit_id']) {
                                                        echo $unit->nama_unit;
                                                        break;
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $row['nama_kelas']; ?></td>
                                            <td>
                                                <?php
                                                foreach ($users as $user) {
                                                    if ($user->id == $row['user_id']) {
                                                        echo $user->nama;
                                                        break;
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                foreach ($users as $user) {
                                                    if ($user->id == $row['user_id']) {
                                                        echo $user->username;
                                                        break;
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit-<?php echo $row['id']; ?>">Edit</a>
                                                <a href="<?php echo site_url('pembelajaran/hapus/' . $row['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?');">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Pelajaran</th>
                                        <th>Kelas</th>
                                        <th>Unit</th>
                                        <th>User</th>
                                        <th>Username</th>
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
<!-- Modal Tambah -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Mengajar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url('pembelajaran/simpan'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Pelajaran</label>
                        <select class="form-control" name="pelajaran_id" required>
                            <?php foreach ($pelajaran as $pel): ?>
                                <option value="<?php echo $pel['id']; ?>"><?php echo $pel['nama_pelajaran']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Unit</label>
                        <select class="form-control" name="unit_id" required>
                            <?php foreach ($units as $unit): ?>
                                <option value="<?php echo $unit->id; ?>"><?php echo $unit->nama_unit; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Kelas</label>
                        <select class="form-control" name="kelas_id" required>
                            <?php foreach ($kelas as $k): ?>
                                <option value="<?php echo $k->id; ?>"><?php echo $k->nama_kelas; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pengajar</label>
                        <select class="form-control" name="user_id" required>
                            <?php foreach ($users as $user): ?>
                                <?php if ($user->role == 'guru'): ?>
                                    <option value="<?php echo $user->id; ?>"><?php echo $user->nama; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit -->
<?php foreach ($pembelajaran as $row): ?>
    <div class="modal fade" id="modal-edit-<?php echo $row['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Mengajar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo site_url('pembelajaran/update'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <div class="form-group">
                            <label>Pelajaran</label>
                            <select class="form-control" name="pelajaran_id" required>
                                <?php foreach ($pelajaran as $pel): ?>
                                    <option value="<?php echo $pel['id']; ?>" <?php echo ($pel['id'] == $row['pelajaran_id']) ? 'selected' : ''; ?>><?php echo $pel['nama_pelajaran']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Unit</label>
                            <select class="form-control" name="unit_id" required>
                                <?php foreach ($units as $unit): ?>
                                    <option value="<?php echo $unit->id; ?>" <?php echo ($unit->id == $row['unit_id']) ? 'selected' : ''; ?>><?php echo $unit->nama_unit; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control" name="kelas_id" required>
                                <?php foreach ($kelas as $k): ?>
                                    <option value="<?php echo $k->id; ?>" <?php echo ($k->id == $row['kelas_id']) ? 'selected' : ''; ?>><?php echo $k->nama_kelas; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pengajar</label>
                            <select class="form-control" name="user_id" required>
                                <?php foreach ($users as $user): ?>
                                    <?php if ($user->role == 'guru'): ?>
                                        <option value="<?php echo $user->id; ?>" <?php echo ($user->id == $row['user_id']) ? 'selected' : ''; ?>><?php echo $user->nama; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- /.modal -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterForm = document.getElementById('filterForm');
        const dataMengajar = document.getElementById('dataMengajar').children;

        filterForm.addEventListener('change', function() {
            const pelajaranId = document.getElementById('pelajaran_id').value;
            const unitId = document.getElementById('unit_id').value;
            const kelasId = document.getElementById('kelas_id').value;
            const userId = document.getElementById('user_id').value;

            Array.from(dataMengajar).forEach(row => {
                const matchPelajaran = !pelajaranId || row.getAttribute('data-pelajaran') === pelajaranId;
                const matchUnit = !unitId || row.getAttribute('data-unit') === unitId;
                const matchKelas = !kelasId || row.getAttribute('data-kelas') === kelasId;
                const matchUser = !userId || row.getAttribute('data-user') === userId;

                if (matchPelajaran && matchUnit && matchKelas && matchUser) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
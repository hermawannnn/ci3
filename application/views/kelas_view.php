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
                        <li class="breadcrumb-item active">Data Kelas</li>
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
                            <h3 class="card-title">Data Kelas</h3>
                            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-default">
                                Tambah Kelas
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
                                        <th>Unit</th>
                                        <th>Nama Kelas</th>
                                        <th>Wali Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($kelas as $row): ?>
                                        <tr>
                                            <td>
                                                <?php
                                                foreach ($units as $unit) {
                                                    if ($unit->id == $row->unit) {
                                                        echo $unit->nama_unit;
                                                        break;
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $row->nama_kelas; ?></td>
                                            <td>
                                                <?php
                                                foreach ($users as $user) {
                                                    if ($user->id == $row->wali_kelas) {
                                                        echo $user->nama;
                                                        break;
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit-<?php echo $row->id; ?>">Edit</a>
                                                <a href="<?php echo site_url('kelas/hapus/' . $row->id); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?');">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Unit</th>
                                        <th>Nama Kelas</th>
                                        <th>Wali Kelas</th>
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
<!-- Edit Modal -->
<?php foreach ($kelas as $row): ?>
    <div class="modal fade" id="modal-edit-<?php echo $row->id; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo site_url('kelas/update'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                        <div class="form-group">
                            <label for="nama">Unit</label>
                            <select class="form-control" id="nama" name="unit" required>
                                <?php foreach ($units as $unit): ?>
                                    <option value="<?php echo $unit->id; ?>" <?php echo $row->unit == $unit->id ? 'selected' : ''; ?>>
                                        <?php echo $unit->nama_unit; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nis">Nama Kelas</label>
                            <input type="text" class="form-control" id="nis" name="nama_kelas" value="<?php echo $row->nama_kelas; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nisn">Wali Kelas</label>
                            <select class="form-control" id="nisn" name="wali_kelas" required>
                                <?php foreach ($users as $user): ?>
                                    <?php if ($user->role == 'guru'): ?>
                                        <option value="<?php echo $user->id; ?>" <?php echo $row->wali_kelas == $user->id ? 'selected' : ''; ?>>
                                            <?php echo $user->nama; ?>
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kelas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url('kelas/simpan'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Unit</label>
                        <select class="form-control" name="unit" required>
                            <?php foreach ($units as $unit): ?>
                                <option value="<?php echo $unit->id; ?>"><?php echo $unit->nama_unit; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" class="form-control" name="nama_kelas" required>
                    </div>
                    <div class="form-group">
                        <label>Wali Kelas</label>
                        <select class="form-control" name="wali_kelas" required>
                            <?php foreach ($users as $user): ?>
                                <option value="<?php echo $user->id; ?>"><?php echo $user->nama; ?></option>
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
<!-- /.modal -->
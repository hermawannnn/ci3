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
                            <button class="btn btn-success float-right" data-toggle="modal" data-target="#modal-tambah-pembelajaran">Tambah Pembelajaran</button>
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
                                            <td><?php echo $row->nama_pelajaran; ?></td>
                                            <td><?php echo $row->nama_kelas; ?></td>
                                            <td><?php echo $row->nama; ?></td>
                                            <td><?php echo $row->nama_unit; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit-<?php echo $row->id; ?>">Edit</button>

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

<div class="modal fade" id="modal-tambah-pembelajaran" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-pembelajaran-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-tambah-pembelajaran-label">Tambah Pembelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('pembelajaran/simpan'); ?>" method="post">
                    <div class="form-group">
                        <label for="pelajaran_id">Pelajaran:</label>
                        <select class="form-control" name="pelajaran_id">
                            <?php foreach ($pelajaran as $p): ?>
                                <option value="<?php echo $p->id; ?>"><?php echo $p->nama_pelajaran; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas_id">Kelas:</label>
                        <select class="form-control" name="kelas_id">
                            <?php foreach ($kelas as $k): ?>
                                <option value="<?php echo $k->id; ?>"><?php echo $k->nama_kelas; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user_id">Guru Mapel:</label>
                        <select class="form-control" name="user_id">
                            <?php foreach ($users as $u): ?>
                                <option value="<?php echo $u->id; ?>"><?php echo $u->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_unit">Unit:</label>
                        <select class="form-control" name="unit_id">
                            <?php foreach ($units as $unit): ?>
                                <option value="<?php echo $unit->id; ?>"><?php echo $unit->nama_unit; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

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
                <form action="<?php echo site_url('pembelajaran/edit/' . $row->id); ?>" method="post">
                    <div class="form-group">
                        <label for="nama_pelajaran">Pelajaran:</label>
                        <select class="form-control" name="pelajaran_id">
                            <?php foreach ($pelajaran as $p): ?>
                                <option value="<?php echo $p->id; ?>" <?php echo $p->id == $row->pelajaran_id ? 'selected' : ''; ?>><?php echo $p->nama_pelajaran; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas_id">Kelas:</label>
                        <select class="form-control" name="kelas_id">
                            <?php foreach ($kelas as $k): ?>
                                <option value="<?php echo $k->id; ?>" <?php echo $k->id == $row->kelas_id ? 'selected' : ''; ?>><?php echo $k->nama_kelas; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user_id">Guru Mapel:</label>
                        <select class="form-control" name="user_id">
                            <?php foreach ($users as $u): ?>
                                <option value="<?php echo $u->id; ?>" <?php echo $u->id == $row->user_id ? 'selected' : ''; ?>><?php echo $u->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_unit">Unit:</label>
                        <select class="form-control" name="unit_id">
                            <?php foreach ($units as $unit): ?>
                                <option value="<?php echo $unit->id; ?>" <?php echo $unit->id == $row->unit_id ? 'selected' : ''; ?>><?php echo $unit->nama_unit; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
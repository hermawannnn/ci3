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
                                    <td><?php echo $row->unit; ?></td>
                                    <td><?php echo $row->nama_kelas; ?></td>
                                    <td><?php echo $row->wali_kelas; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('kelas/edit/'.$row->id); ?>" class="btn btn-primary">Edit</a>
                                        
                                        <a href="<?php echo site_url('kelas/hapus/'.$row->id); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?');">Hapus</a>
                                        
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


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Kelas</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form action="<?php echo site_url('kelas/simpan'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama">Unit</label>
                        <select class="form-control" id="nama" name="unit" required>
                            <option value="Primary">Primary</option>
                            <option value="Secondary">Secondary</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nis">Nama Kelas</label>
                        <input type="text" class="form-control" id="nis" name="nama_kelas" required>
                    </div>
                    <div class="form-group">
                        <label for="nisn">Wali Kelas</label>
                        <input type="text" class="form-control" id="nisn" name="wali_kelas" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
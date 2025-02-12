<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Kelas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Kelas</li>
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
                            <h3 class="card-title">Form Tambah Kelas</h3>
                        </div>
                        <!-- /.card-header -->
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

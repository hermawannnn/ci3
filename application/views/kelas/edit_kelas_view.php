<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Kelas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Kelas</li>
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
                            <h3 class="card-title">Form Edit Kelas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?php echo site_url('kelas/update'); ?>" method="post">
                                <input type="hidden" name="id" value="<?php echo $kelas->id; ?>">
                                <div class="form-group">
                                    <label for="nama">Nama Kelas</label>
                                    <input type="text" class="form-control" id="nama" name="nama_kelas" value="<?php echo $kelas->nama_kelas; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="nis">Unit</label>
                                    <input type="text" class="form-control" id="nis" name="unit" value="<?php echo $kelas->unit; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="nisn">Wali Kelas</label>
                                    <input type="text" class="form-control" id="nisn" name="wali_kelas" value="<?php echo $kelas->wali_kelas; ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
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

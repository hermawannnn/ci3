<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Pelajaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Pelajaran</li>
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
                            <h3 class="card-title">Edit Pelajaran</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?php echo site_url('pelajaran/update'); ?>" method="post">
                                <input type="hidden" name="id" value="<?php echo $pelajaran->id; ?>">
                                <div class="form-group">
                                    <label for="nama_pelajaran">Nama Pelajaran</label>
                                    <input type="text" name="nama_pelajaran" class="form-control" value="<?php echo $pelajaran->nama_pelajaran; ?>" required>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="unit">Unit</label>
                                    <input type="text" name="unit" class="form-control" value="<?php echo $pelajaran->unit; ?>" required>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label for="wali_pelajaran">Wali Pelajaran</label>
                                    <input type="text" name="wali_pelajaran" class="form-control" value="<?php echo $pelajaran->wali_pelajaran; ?>" required>
                                </div> -->
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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
                        <!-- /.card-header -->
                        <div class="card-header">
                            <h3 class="card-title"><strong></strong></h3>
                            <img src="https://media.tenor.com/yCFHzEvKa9MAAAAi/hello.gif" alt="Hello" width="100" height="100">
                            <span style="font-size: 25px;"><?php echo $this->session->userdata('nama'); ?></span>
                        </div>
                    </div>

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <h3 class="card-title"><strong>Informasi Data Mengajar</strong></h3>
                        </div>

                        <div class="card-body">
                            <form method="post" class="mb-4">
                                <div class="form-group row">
                                    <label for="kelas_id" class="col-sm-2 col-form-label">Pilih Kelas:</label>
                                    <div class="col-sm-4">
                                        <select name="kelas_id" id="kelas_id" class="form-control" onchange="this.form.submit()">
                                            <option value="">Pilih Kelas</option>
                                            <?php foreach ($kelas_list as $kelas): ?>
                                                <option value="<?= $kelas->id ?>" <?= ($selected_kelas == $kelas->id ? 'selected' : '') ?>>
                                                    <?= $kelas->nama_kelas ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                            </form>

                            <?php if ($selected_kelas): ?>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Guru</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($pembelajaran as $row):
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nama_kelas ?></td>
                                                <td><?= $row->nama_pelajaran ?></td>
                                                <td><?= $row->nama ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                *Jika data terdapat kesalahan, silakan hubungi admin
                            <?php else: ?>
                                <div class="text-center">
                                    <p>Silakan pilih kelas terlebih dahulu untuk menampilkan data</p>
                                </div>
                            <?php endif; ?>

                        </div>

                        <!-- /.card-body -->


                    </div>
                    <!-- /.card -->
                    <marquee behavior="scroll" direction="right">CEPETAAANNN
                        <img src="https://media.tenor.com/h5b-nbmzlT8AAAAi/pepeeee.gif" alt="Wadaws" width="50" height="50">
                    </marquee>
                    <marquee behavior="scroll" direction="left">IYAAAAAAA TAUUUU
                        <img src="https://media.tenor.com/mo6Te6bSxEcAAAAi/quby-run.gif" alt="Wadaws" width="50" height="50">
                    </marquee>
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
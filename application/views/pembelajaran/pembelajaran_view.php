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
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Pembelajaran</h3>
                            <a href="<?php echo site_url('kelas/tambah'); ?>" class="btn btn-success float-right">Tambah Pembelajaran</a>
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
                                        <!-- Data Pembelajaran dari data base -->
                                        <?php foreach ($pelajaran as $row): ?>
                                        <option value="<?php echo $row->nama_pelajaran; ?>"><?php echo $row->nama_pelajaran; ?></option>
                                        <?php endforeach; ?>
                                        <!-- Add more options as needed -->
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
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Matematika</td>
                                        <td>1A</td>
                                        <td>Hermawan, Oji</td>
                                    </tr>
                                    <!-- Add more rows as needed -->
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Nama Mata Pelajaran</th>
                                    <th>Nama Kelas</th>
                                    <th>Guru Mapel</th>
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

<script>
function filterTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("subject");
    filter = input.value.toUpperCase();
    table = document.getElementById("example1");
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }
}
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nilai Final</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Nilai Final</li>
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
                            <h3 class="card-title">Data Nilai Final</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="filter_kelas_id">Filter by Kelas</label>
                                        <select class="form-control" id="filter_kelas_id">
                                            <option value="">Pilih Kelas</option>
                                            <?php foreach ($kelas as $k): ?>
                                                <option value="<?php echo $k['id']; ?>"><?php echo $k['nama_kelas']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="filter_pelajaran_id">Filter by Pelajaran</label>
                                        <select class="form-control" id="filter_pelajaran_id" disabled>
                                            <option value="">Pilih Pelajaran</option>
                                            <?php foreach ($pelajaran as $p): ?>
                                                <option value="<?php echo $p['id']; ?>"><?php echo $p['nama_pelajaran']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenisnilai">Jenis Nilai</label>
                                        <select class="form-control" id="jenisnilai" name="jenisnilai" disabled>
                                            <option value="">Pilih Jenis Nilai</option>
                                            <option value="ex">Exercise</option>
                                            <option value="hw">Homework</option>
                                            <option value="ft">Final Test</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-calculator"></i> Jumlah Nilai</label>
                                        <div class="input-group">
                                            <select class="form-control col-md-4" id="jumlah_nilai_select" style="display: none;" disabled>
                                                <option value="">Pilih</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            <div class="form-control col-md-4 text-center" id="jumlah_nilai_display">0</div>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-info btn-flat" id="edit_jumlah_nilai" style="display: none;">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="<?php echo site_url('nilaifinal/create'); ?>" method="post" id="nilaifinal_form" style="display: none;">
                                <input type="hidden" name="kelas_id" id="kelas_id_hidden">
                                <input type="hidden" name="pelajaran_id" id="pelajaran_id_hidden">
                                <input type="hidden" name="jenisnilai" id="jenisnilai_hidden">
                                <div class="form-header mb-3" id="form_header" style="display: none;">
                                    <h4 class="text-center">
                                        <span id="header_kelas"></span> -
                                        <span id="header_pelajaran"></span> -
                                        <span id="header_jenisnilai"></span>
                                    </h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead id="nilai_header">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Siswa</th>
                                            </tr>
                                        </thead>
                                        <tbody id="nilaifinal_table_body">
                                        </tbody>
                                    </table>
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

<script>
    // Event listener for kelas selection
    document.getElementById('filter_kelas_id').addEventListener('change', function() {
        var kelas_id = this.value;
        document.getElementById('kelas_id_hidden').value = kelas_id;
        var pelajaranSelect = document.getElementById('filter_pelajaran_id');
        var jenisnilaiSelect = document.getElementById('jenisnilai');

        if (kelas_id) {
            pelajaranSelect.disabled = false;
        } else {
            pelajaranSelect.disabled = true;
            jenisnilaiSelect.disabled = true;
            document.getElementById('nilaifinal_form').style.display = 'none';
            pelajaranSelect.value = '';
            jenisnilaiSelect.value = '';
        }
    });

    // Event listener for pelajaran selection
    document.getElementById('filter_pelajaran_id').addEventListener('change', function() {
        var pelajaran_id = this.value;
        document.getElementById('pelajaran_id_hidden').value = pelajaran_id;
        var jenisnilaiSelect = document.getElementById('jenisnilai');

        if (pelajaran_id) {
            jenisnilaiSelect.disabled = false;
        } else {
            jenisnilaiSelect.disabled = true;
            document.getElementById('nilaifinal_form').style.display = 'none';
            jenisnilaiSelect.value = '';
        }
    });

    // Replace the jenisnilai event listener
    document.getElementById('jenisnilai').addEventListener('change', function() {
        const jenisnilai = this.value;
        const kelas_id = document.getElementById('filter_kelas_id').value;
        const pelajaran_id = document.getElementById('filter_pelajaran_id').value;
        const jumlahNilaiSelect = document.getElementById('jumlah_nilai_select');
        const jumlahNilaiDisplay = document.getElementById('jumlah_nilai_display');
        const editJumlahNilaiBtn = document.getElementById('edit_jumlah_nilai');

        if (kelas_id && pelajaran_id && jenisnilai) {
            fetch(`<?php echo site_url('nilaifinal/get_nilai_by_filters/'); ?>${kelas_id}/${pelajaran_id}/${jenisnilai}`)
                .then(response => response.json())
                .then(data => {
                    window.existingNilai = data;
                    const hasExistingValues = data.some(item => item.nilai_list);
                    const existingCount = data[0]?.nilai_list?.split(',').length || 0;

                    if (hasExistingValues) {
                        // If values exist, hide selector and show count with edit button
                        jumlahNilaiSelect.style.display = 'none';
                        jumlahNilaiDisplay.style.display = 'block';
                        jumlahNilaiDisplay.textContent = existingCount;

                        // For Final Test, show existing values but disable editing
                        if (jenisnilai === 'ft') {
                            editJumlahNilaiBtn.style.display = 'none';
                            updateTableHeader(existingCount);
                            loadSiswaData(existingCount, true); // Pass true to indicate read-only mode
                        } else {
                            editJumlahNilaiBtn.style.display = 'block';
                            updateTableHeader(existingCount);
                            loadSiswaData(existingCount);
                        }
                    } else {
                        // If no values exist, show selector for new input
                        jumlahNilaiSelect.style.display = 'block';
                        jumlahNilaiDisplay.style.display = 'none';
                        editJumlahNilaiBtn.style.display = 'none';
                        jumlahNilaiSelect.disabled = false;

                        if (jenisnilai === 'ft') {
                            jumlahNilaiSelect.value = '1';
                            jumlahNilaiSelect.disabled = true;
                            updateTableHeader(1);
                            loadSiswaData(1);
                        } else {
                            jumlahNilaiSelect.value = '';
                        }
                        return;
                    }

                    updateTableHeader(existingCount);
                    loadSiswaData(existingCount);
                });
        }
    });

    // Add edit jumlah nilai button handler
    document.getElementById('edit_jumlah_nilai').addEventListener('click', function() {
        const currentCount = parseInt(document.getElementById('jumlah_nilai_display').textContent);
        const jumlahNilaiSelect = document.getElementById('jumlah_nilai_select');
        const jenisnilai = document.getElementById('jenisnilai').value;

        // Show selector with current value
        jumlahNilaiSelect.value = currentCount;
        jumlahNilaiSelect.style.display = 'block';
        jumlahNilaiSelect.disabled = false;
        document.getElementById('jumlah_nilai_display').style.display = 'none';
        this.style.display = 'none';

        if (jenisnilai === 'ft') {
            jumlahNilaiSelect.value = '1';
            jumlahNilaiSelect.disabled = true;
        }
    });

    // Add event listener for jumlah_nilai_select
    document.getElementById('jumlah_nilai_select').addEventListener('change', function() {
        const jumlahNilai = parseInt(this.value);
        if (jumlahNilai) {
            updateTableHeader(jumlahNilai);
            loadSiswaData(jumlahNilai);
        }
    });

    function updateTableHeader(jumlahNilai) {
        const headerRow = document.querySelector('#nilai_header tr');
        const jenisnilai = document.getElementById('jenisnilai');
        const jenisnilaiText = jenisnilai.options[jenisnilai.selectedIndex].text;
        const kelasText = document.getElementById('filter_kelas_id').options[document.getElementById('filter_kelas_id').selectedIndex].text;
        const pelajaranText = document.getElementById('filter_pelajaran_id').options[document.getElementById('filter_pelajaran_id').selectedIndex].text;

        // Update form header
        document.getElementById('header_kelas').textContent = kelasText;
        document.getElementById('header_pelajaran').textContent = pelajaranText;
        document.getElementById('header_jenisnilai').textContent = jenisnilaiText;
        document.getElementById('form_header').style.display = 'block';
        document.getElementById('jenisnilai_hidden').value = jenisnilai.value;

        // Reset header
        headerRow.innerHTML = '<th>No</th><th>Nama Siswa</th>';

        // Add dynamic columns
        for (let i = 1; i <= jumlahNilai; i++) {
            headerRow.innerHTML += `<th>${jenisnilaiText} ${i}</th>`;
        }
        headerRow.innerHTML += '<th>Nilai Akhir</th>';
    }

    // Update loadSiswaData function to handle read-only mode
    function loadSiswaData(jumlahNilai, readOnly = false) {
        const kelas_id = document.getElementById('filter_kelas_id').value;
        if (!kelas_id || !jumlahNilai) return;

        fetch(`<?php echo site_url('nilaifinal/get_siswa_by_kelas/'); ?>${kelas_id}`)
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('nilaifinal_table_body');
                tableBody.innerHTML = '';

                data.forEach((siswa, index) => {
                    let row = document.createElement('tr');
                    let nilaiInputs = '';

                    // Find existing nilai for this student
                    const existingData = window.existingNilai?.find(item => item.siswa_id === siswa.id);
                    const existingNilai = existingData?.nilai_list ? existingData.nilai_list.split(',') : [];

                    // Create input fields based on jumlah_nilai
                    for (let i = 0; i < jumlahNilai; i++) {
                        const nilaiValue = existingNilai[i] || 0;
                        if (readOnly) {
                            nilaiInputs += `<td><input type="number" class="form-control nilai-input" 
                                name="nilai[${siswa.id}][]" value="${parseFloat(nilaiValue).toFixed(2)}" 
                                min="0" max="100" step="0.01" readonly></td>`;
                        } else {
                            nilaiInputs += `<td><input type="number" class="form-control nilai-input" 
                                name="nilai[${siswa.id}][]" value="${parseFloat(nilaiValue).toFixed(2)}" 
                                min="0" max="100" step="0.01" required></td>`;
                        }
                    }

                    row.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${siswa.nama}<input type="hidden" name="siswa_id[]" value="${siswa.id}"></td>
                        ${nilaiInputs}
                        <td><span class="nilai-akhir">0</span></td>
                    `;
                    tableBody.appendChild(row);

                    // Calculate initial average if there are existing values
                    if (existingNilai.length > 0) {
                        const avgSpan = row.querySelector('.nilai-akhir');
                        const avg = existingNilai.reduce((sum, val) => sum + parseFloat(val), 0) / existingNilai.length;
                        avgSpan.textContent = avg.toFixed(2);
                    }
                });

                // Show the form after populating data
                document.getElementById('nilaifinal_form').style.display = 'block';

                // Add event listeners to calculate average
                document.querySelectorAll('.nilai-input').forEach(input => {
                    input.addEventListener('change', calculateAverage);
                });
            });
    }

    function calculateAverage(event) {
        const row = event.target.closest('tr');
        const inputs = row.querySelectorAll('.nilai-input');
        let sum = 0;
        inputs.forEach(input => {
            sum += parseFloat(input.value) || 0;
        });
        const average = sum / inputs.length;
        const formattedAverage = parseFloat(average).toFixed(2);
        row.querySelector('.nilai-akhir').textContent = formattedAverage;
        event.target.value = parseFloat(event.target.value).toFixed(2); // Format input value
    }
</script>
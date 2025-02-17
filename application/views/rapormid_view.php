<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Invoice</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active">Rapor Mid Semester</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h3 class="card-title">Rapor Mid Semester</h3>
                              <!-- <div class="card-tools">
                                  <a href="<?php echo base_url() ?>rapormid/print" class="btn btn-primary">Print</a>
                              </div> -->
                          </div>
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="subject">Pilih Kelas:</label>
                                          <select id="subject" name="subject" class="form-control">
                                              <option value="">Siswa 1</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="subject">Pilih Siswa:</label>
                                          <select id="subject" name="subject" class="form-control">
                                              <option value="">Siswa 1</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-12">
                                      <hr>
                                  </div>
                              </div>

                              <!-- Main content -->
                              <div class="rapormid p-3 mb-3" id="printableArea">
                                  <!-- title row -->
                                  <div class="row">
                                      <div class="col-12 text-center">
                                          <img src="<?php echo base_url() ?>aset/dist/img/logo-ais.png" width="150px" alt="Logo Ananda Islamic School">
                                          <br>
                                          <style>
                                              @font-face {
                                                  font-family: dauphin;
                                                  src: url(<?php echo base_url() ?>aset/dist/font/dauphin.ttf)
                                              }

                                              .bp {
                                                  font-family: 'dauphin';
                                                  font-size: 40px;
                                                  font-weight: bold;
                                              }
                                          </style>
                                          <span class="bp">SDS Ananda Islamic School</span>
                                          <br>
                                          PROGRESS REPORT & MID TEST RESULT
                                          <br>
                                          2024/2025
                                      </div>
                                      <!-- /.col -->
                                  </div>
                                  <br>
                                  <!-- info row -->
                                  <div class="row">
                                      <div class="col-6">
                                          <label for="">Studen Name : </label>
                                          <br>
                                          <label for="">NIS / NISN : </label>
                                      </div>
                                      <div class="col-6">
                                          <label for="">Class : </label>
                                          <br>
                                          <label for="">Semester : </label>
                                      </div>
                                  </div>
                                  <br>
                                  <style>
                                    .c{
                                        text-align: center;
                                    }
                                  </style>
                                  <table class="table table-bordered">
                                      <tr style="text-align: center; background-color:rgb(155, 155, 155);">
                                          <th style="width: 50px; text-align: center;">No</th>
                                          <th>Subject</th>
                                          <th style="width: 100px;">Score</th>
                                          <th style="width: 100px;">Class Average</th>
                                      </tr>
                                      <tr style="text-align: center; background-color:rgb(155, 155, 155);">
                                          <td colspan="4">Internasional Studies</td>
                                      </tr>
                                      <tr>
                                          <td class="c">1</td>
                                          <td>Mathematics</td>
                                          <td  class="c">90</td>
                                          <td class="c">80</td>
                                      </tr>
                                      <tr>
                                          <td class="c">2</td>
                                          <td>English</td>
                                          <td class="c">90</td>
                                          <td class="c">80</td>
                                      </tr>
                                      <tr>
                                          <td class="c">3</td>
                                          <td>Science</td>
                                          <td class="c">90</td>
                                          <td class="c">80</td>
                                      </tr>
                                      <tr>
                                          <td class="c">4</td>
                                          <td>ICT</td>
                                          <td class="c">90</td>
                                          <td class="c">80</td>
                                      </tr>
                                      <tr style="text-align: center; background-color:rgb(155, 155, 155);">
                                          <td colspan="4">Islamic Studies</td>
                                      </tr>
                                      <tr>
                                          <td>1</td>
                                          <td>Tahfidz</td>
                                          <td class="c">90</td>
                                          <td class="c">80</td>
                                      </tr>
                                      <tr>
                                          <td class="c">2</td>
                                          <td>Arabic</td>
                                          <td class="c">90</td>
                                          <td class="c">80</td>
                                      </tr>
                                  </table>
                                  <br>
                                  <table class="table table-bordered">
                                      <tr style="text-align: center; background-color:rgb(155, 155, 155);">
                                          <td>Description</td>
                                      </tr>
                                      <tr style="text-align: center;">
                                          <td>Good Job, Keep it up!</td>
                                      </tr>
                                  </table>
                                  <br>
                              </div>
                              <br>
                              <button onclick="printDiv('printableArea')" class="btn btn-success">Print Table</button>
                          </div>
                      </div>
                  </div>
              </div>
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
  function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
  }
  </script>
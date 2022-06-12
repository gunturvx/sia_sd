
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="mb-5 text-gray-800">Absensi</h1>
          <div class="row">
            <!-- Collapsable Card Example -->
            <div class="col-md-4 animated--fade-in">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#absen" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="absen">
                  <h6 class="m-0 font-weight-bold text-primary">Menu Pengisian Absensi</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse hide" id="absen">
                  <div class="card-body">
                  <form role="form" action="detailabsensi.php" method="get" name="postform" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select id="kelas" class="form-control" name="kelas">
                  
                         <?php
                        $sql_kelas=mysqli_query($con, "SELECT * FROM tb_mengajar where id_guru='$id_login'");
                        while($data=mysqli_fetch_array($sql_kelas)){
                          echo "<option value='$data[0]' > $data[1] </option>";
                        }     

                      ?>   
                    </select>
                  </div>
                  
                  <div class="form-group">
                        <label for="jadwal">Jadwal</label>
                        <select id="jadwal" class="form-control" name="jadwal">
                            <option selected>Minggu 1</option>
                            <option>Minggu 2</option>
                            <option>Minggu 3</option>
                            <option>Minggu 4</option>
                            <option>Minggu 5</option>
                            <option>Minggu 6</option>
                            <option>Minggu 7</option>
                            <option>Minggu 8</option>
                            <option>Minggu 9</option>
                            <option>Minggu 10</option>
                            <option>Minggu 11</option>
                            <option>Minggu 12</option>
                            <option>Minggu 13</option>
                            <option>Minggu 14</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Lihat</button>
                  </form>
                  </div>
                </div>
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#rekap" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="rekap">
                  <h6 class="m-0 font-weight-bold text-primary">Menu Rekap Absensi</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse hide" id="rekap">
                  <div class="card-body">
                  <form role="form" action="rekapabsensi.php" method="get" name="postform" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select id="kelas" class="form-control" name="kelas">
    
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Pilih Kelas</button>
                  </form>
                </div>
            </div>
                  </div>
            </div>
         </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

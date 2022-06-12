

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Absensi <?php if($_GET["kelas"] == "001"){echo 'R6A';}elseif($_GET["kelas"] == "002"){echo'R6X';}?>  <?=$_GET["jadwal"].' ('.$tgl.')'?> </h1>

            <!-- DataTales -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa </h6>
            </div>
            <div class="card-body">             
                <form role="form" action="simpanabsensi.php?id=<?php echo $_GET['kelas'];?>" method="post" name="postform" enctype="multipart/form-data">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Profil</th>
                      <th>NPM</th>
                      <th>Nama</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php
                    $id_kelas=$_GET['kelas'];
                    $sql="SELECT * FROM mahasiswa WHERE id_kelas='$id_kelas'";
                    $query=mysqli_query($koneksi,$sql);
                    $i = 1;
                    while ($data=mysqli_fetch_array($query)){
                        $npm=$data["npm"];
                        $nama=$data["nama"];
                    ?>
                    <tr>
                      <td><?=$i++;?></td>
                      <td><img class="img-profile rounded-circle" style="width:50px;height:50px;" src="img/<?= $data["foto"];?>"></td>
                      <td><?= $npm;?></td>
                      <td><?= $nama;?></td>
                      <td> 
                      <label class="radio-inline"><input type="radio" name="<?= 'ket'.$data["npm"];?>" id="<?php echo 'opsi1'.$npm;?>" value="Hadir">Hadir</label>
                      <label class="radio-inline"><input type="radio" name="<?= 'ket'.$data["npm"];?>" id="<?php echo 'opsi1'.$npm;?>" value="Absen">Absen</label>
                      <label class="radio-inline"><input type="radio" name="<?= 'ket'.$data["npm"];?>" id="<?php echo 'opsi1'.$npm;?>" value="Sakit">Sakit</label>
                      <label class="radio-inline"><input type="radio" name="<?= 'ket'.$data["npm"];?>" id="<?php echo 'opsi1'.$npm;?>" value="Izin">Izin</label>

                      </td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary mt-4 col-md-2 offset-10">Simpan Data</button>
            </form>
            
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

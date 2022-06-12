
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?php
		  $id_kelas=$_GET['kelas'];
          $sql="SELECT DISTINCT(jadwal) FROM absensi WHERE id_kelas='$id_kelas'";
		  $query=mysqli_query($con,$sql);               		  
	  ?>
          <!-- Page Heading -->
          <h1 class="mb-3 text-gray-800">Rekap Absensi</h1>
            <a href="cetakabsensi.php?kelas=<?=$id_kelas;?>" class="btn btn-danger mb-4 btn-icon-split">
            <span class="icon text-gray-100">
                <i class="fas fa-file"></i>
            </span>
            <span class="text">Download PDF</span>
            </a>
            <!-- DataTales -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa </h6>
            </div>
            <div class="card-body">             
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Profil</th>
                      <th>NPM</th>
                      <th>Nama</th>
                      <th>Aksi</th>
                      <?php	
						while ($data=mysqli_fetch_array($query)){?>
						     <th><?=$data[0].' '?><br><a href="hapusabsensi.php?id=<?=$id_kelas?>&jadwal=<?=$data[0]?>">(Hapus)</a></th>  
						<?php }?>
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
                      <td> <a href="detaileditabsensi.php?kelas=<?=$id_kelas;?>&npm=<?=$npm;?>" class="btn btn-warning btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Ubah</span>
                            </a></td>
                            <?php
                            $sqla="SELECT * FROM absensi WHERE npm='$npm'";
                            $querya=mysqli_query($koneksi,$sqla);
                            while($data2=mysqli_fetch_array($querya)){
                            ?>			           
                                <td><?php echo $data2["keterangan"]; ?></td>
                            <?php } ?>
                            </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>    
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
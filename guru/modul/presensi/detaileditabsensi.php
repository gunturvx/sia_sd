
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Ubah Absensi </h1>
            <form role="form" action="editabsensi.php?kelas=<?php echo $id_kelas;?>&npm=<?php echo $npm;?>" method="post" name="postform" enctype="multipart/form-data">
			<?php
            $sql="SELECT *,k.nama_kelas FROM mahasiswa s join kelas k on s.id_kelas=k.id_kelas WHERE npm='$npm'";
            $query=mysqli_query($koneksi,$sql);
                        while ($data=mysqli_fetch_array($query)){
                            $nama=$data["nama"];
                            $nama_kelas=$data["nama_kelas"];
                        }
            ?>

        <div class="col-md-6">                
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Detail Mahasiswa</h6>
            </div>
            <div class="card-body">             
                <form role="form" action=".php?id=<?php echo $_GET['kelas'];?>" method="post" name="postform" enctype="multipart/form-data">
              <div class="table-responsive">
                  <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        <th><?=$npm;?></th>
                        <th><?=$nama;?></th>
                        <th><?=$nama_kelas;?></th>
                    </tbody>
                </table>
            </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">                
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Detail Absensi</h6>
            </div>
            <div class="card-body">             
              <div class="table-responsive">
                  <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        <?php
                        $sql="SELECT * FROM `absensi` WHERE id_kelas='$id_kelas' AND npm='$npm'";
                        $query=mysqli_query($koneksi,$sql);
                        
                        while ($data=mysqli_fetch_array($query)){
                            $id_absen=$data[0];
                            $tanggal=$data["jadwal"];
                            $keterangan=$data["keterangan"];
                        ?>
                        <tr>
                            <td><?=$tanggal;?></td>
                            <td>
                            <label class="radio-inline"><input type="radio" name="<?= 'ket'.$id_absen;?>" id="<?= 'opsi1'.$id_absen;?>" <?php if ($keterangan=="Hadir"){echo "checked";} ?> value="Hadir">Hadir</label>
                      <label class="radio-inline"><input type="radio" name="<?= 'ket'.$id_absen;?>" id="<?= 'opsi1'.$id_absen;?>" <?php if ($keterangan=="Absen"){echo "checked";} ?> value="Absen">Absen</label>
                      <label class="radio-inline"><input type="radio" name="<?= 'ket'.$id_absen;?>" id="<?= 'opsi1'.$id_absen;?>" <?php if ($keterangan=="Sakit"){echo "checked";} ?> value="Sakit">Sakit</label>
                      <label class="radio-inline"><input type="radio" name="<?= 'ket'.$id_absen;?>" id="<?= 'opsi1'.$id_absen;?>" <?php if ($keterangan=="Izin"){echo "checked";} ?> value="Izin">Izin</label>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Simpan</button> 
                </form>
            </div>           
            </div>
          </div>
        </div>
        </div>
        <!-- /.container-fluid -->
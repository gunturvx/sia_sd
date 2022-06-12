<div class="container-fluid">
          <div class="page-header">
          <center>
            <h4 class="page-title">Data Siswa</h4>
          </center>
          </div>
          <div class="card shadow mb-4">
    <div class="card-header py-3">
    <a href="?page=siswa&act=add" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i> Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS/NISN</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Tahun Masuk</th>
                            <th>Status</th>
                            <th>Foto</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        $no=1;
			$siswa = mysqli_query($con,"SELECT * FROM tb_siswa
                 INNER JOIN tb_mkelas ON tb_siswa.id_mkelas=tb_mkelas.id_mkelas
                 ORDER BY id_siswa ASC
                ");
                        foreach ($siswa as $g) {?>
                        <tr>
                            <td><?=$no++;?>.</td>                          
                            <td><?=$g['nis'];?></td>
                            <td><?=$g['nama_siswa'];?></td>
                            <td><?=$g['nama_kelas'];?></td>
                            <td><?=$g['th_angkatan'];?></td>
                            <td><?php if ($g['status']==1) {
                                echo "<span class='badge badge-success'>Aktif</span>";
                                
                            }else {
                                echo "<span class='badge badge-danger'>Off</span>";
                            } ?></td>
                            <td><img src="../img/user/<?=$g['foto'] ?>" width="45" height="45"></td>
                              <td>
                              <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=siswa&act=del&id=<?=$g['id_siswa'] ?>"><i class="fas fa-trash"></i></a>
                            <a class="btn btn-info btn-sm" href="?page=siswa&act=edit&id=<?=$g['id_siswa'] ?>"><i class="far fa-edit"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>                        
                </table>
</div>
</div>
</div>
</div>
</div>

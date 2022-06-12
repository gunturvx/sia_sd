<div class="container-fluid">
          <div class="page-header">
          <center>
            <h4 class="page-title">Data Guru</h4>
          </center>
          </div>
          <div class="card shadow mb-4">
    <div class="card-header py-3">
    <a href="?page=guru&act=add" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i> Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nip</th>
                            <th>Nama Guru</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Foto</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        $no=1;
      $guru = mysqli_query($con,"SELECT * FROM tb_guru");
                        foreach ($guru as $g) {?>
                        <tr>
                            <td><?=$no++;?>.</td>
                          
                            <td><?=$g['nip'];?></td>
                            <td><?=$g['nama_guru'];?></td>
                            <td><?=$g['email'];?></td>
                            <td><?php if ($g['status']=='Y') {
                                echo "<span class='badge badge-success'>Aktif</span>";
                                
                            }else {
                                echo "<span class='badge badge-danger'>Off</span>";
                            } ?></td>
                            <td><img src="../img/user/<?=$g['foto'] ?>" width="45" height="45"></td>
                              <td>
              <a class="btn btn-info btn-sm" href="?page=guru&act=edit&id=<?=$g['id_guru'] ?>"><i class="far fa-edit"></i></a>
              <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=guru&act=del&id=<?=$g['id_guru'] ?>"><i class="fas fa-trash"></i>
              </a>

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
</div>







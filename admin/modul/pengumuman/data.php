<div class="page-inner">
          <div class="page-header">
          <center>
            <h4 class="page-title">Pengumuman</h4>
          </center>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">
                     <a href="?page=pengumuman&act=add" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i> Tambah Pengumuman</a>
                  </div>
                </div>
                <div class="card-body">
                  
                      <div class="table-responsive">
                   <table id="basic-datatables" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Isi Pengumuman</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        $no=1;
      $pengumuman = mysqli_query($con,"SELECT * FROM tb_pengumuman");
                        foreach ($pengumuman as $p) {?>
                        <tr>
                            <td><?=$no++;?>.</td>
                          
                            <td><?=$p['judul'];?></td>
                            <td><?=$p['isi_pengumuman'];?></td>
                            <td><?=$p['date'];?></td>
                              <td>
              <a class="btn btn-info btn-sm" href="?page=pengumuman&act=edit&id=<?=$p['id_pengumuman'] ?>"><i class="far fa-edit"></i></a>
              <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=pengumuman&act=del&id=<?=$p['id_pengumuman'] ?>"><i class="fas fa-trash"></i>
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







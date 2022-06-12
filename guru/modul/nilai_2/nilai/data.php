<div class="container-fluid">
          <div class="page-header">
          <center>
            <h4 class="page-title">Nilai Siswa</h4>
          </center>
          </div>
          <div class="card shadow mb-4">
    <div class="card-header py-3">
    <a href="?page=nilai&act=add" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i> Input Nilai</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
            <th scope="col" rowspan="2" class="align-middle">No</th>
            <th scope="col" rowspan="2" class="align-middle">Nama Siswa</th>
            <th scope="col" rowspan="2" class="align-middle text-center"  style="width:15%">Kode Mata Pelajaran</th>
            <th scope="col" colspan="5" class="text-center">Nilai Harian</th>
            <th scope="col" rowspan="2" class="align-middle">RNH</th>
            <th scope="col" rowspan="2" class="align-middle">PTS</th>
            <th scope="col" rowspan="2" class="align-middle">PAS</th>
            <th scope="col" rowspan="2" class="align-middle">Total</th>
            <th scope="col" rowspan="2" class="align-middle">Predikat</th>
            <th scope="col" rowspan="2" class="align-middle">Action</th>
          </tr>
          <tr>
            <th scope="col">1</th>
            <th scope="col">2</th>
            <th scope="col">3</th>
            <th scope="col">4</th>
            <th scope="col">5</th>
          </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        include '../../../app/database/db.php';
                        $no=1;
      $nilai = mysqli_query($con,"SELECT * FROM tb_nilai 
      INNER JOIN tb_siswa ON tb_nilai.id_siswa=tb_siswa.id_siswa
      INNER JOIN tb_master_mapel ON tb_nilai.id_mapel=tb_master_mapel.id_mapel
      
      ");
                        foreach ($nilai as $n) {?>
                        <tr>
                            <td><?=$no++;?>.</td>
                            <td><?=$n['nama_siswa'];?></td>
                            <td><?=$n['mapel'];?></td>
                            <td><?=$n['nilai_harian1'];?></td>
                            <td><?=$n['nilai_harian2'];?></td>
                            <td><?=$n['nilai_harian3'];?></td>
                            <td><?=$n['nilai_harian4'];?></td>
                            <td><?=$n['nilai_harian5'];?></td>
                            <td><?=$n['rph'];?></td>
                            <td><?=$n['nilai_pts'];?></td>
                            <td><?=$n['nilai_pas'];?></td>
                            <td><?=$n['nilai_akhir'];?></td>
                            <td><?=$n['predikat'];?></td>
                            <td>
              <a class="btn btn-info btn-sm" href="?page=nilai&act=edit&id=<?=$n['id_nilai'] ?>"><i class="far fa-edit"></i></a>
              <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=nilai&act=del&id=<?=$n['id_nilai'] ?>"><i class="fas fa-trash"></i>
              </a>

                            </td>
                             <?php } ?>
                        </tr>
               
                    </tbody>                        
                </table>
                  
                      </div>
                    </div>
                  </div>
                </div>

  
</div>
</div>








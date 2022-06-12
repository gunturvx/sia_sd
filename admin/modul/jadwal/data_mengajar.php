<div class="container-fluid">
          <div class="page-header">
          <center>
            <h4 class="page-title">Data Jadwal</h4>
          </center>
          </div>
          <div class="card shadow mb-4">
    <div class="card-header py-3">
    <a href="?page=jadwal&act=add" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i> Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Nama Guru</th>
                              <th>Mata Pelajaran</th>
                              <th>Kelas</th>
                              <th>TP/Semester</th>
                              <th>Opsi </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $no=1;
                              $mapel = mysqli_query($con,"SELECT * FROM tb_mengajar 
                            INNER JOIN tb_guru ON tb_mengajar.id_guru=tb_guru.id_guru
                            INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
                            INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

                            INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
                            INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran 
                               ");
                              foreach ($mapel as $d) {
                             ?>

                            <tr>
                              <th scope="row"><b><?=$no++; ?>.</b></th>
                              <td><?=$d['nama_guru'] ?></td>
                              <td><?=$d['mapel'] ?></td>
                              <td><?=$d['nama_kelas'] ?></td>
                              <td><?=$d['tahun_ajaran'] ?>/<?=$d['semester'] ?></td>
                              <td>
                                <a href="?page=jadwal&act=cancel&id=<?=$d['id_mengajar'];?>" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Batal</a>

                                <!-- <a  href="?page=nilai&mapel=<?=$d['id_pelajaran'];?>" class="btn btn-success btn-sm"><i class="fas fa-file-contract"></i> Lihat Absen</a> -->
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

 
	<?php 

$edit = mysqli_query($con,"SELECT * FROM tb_pengumuman WHERE id_pengumuman='$_GET[id]' ");
foreach ($edit as $d)?>
<div class="page-inner">
          <div class="page-header">
		  <center>
            <h4 class="page-title">Pengumuman</h4>
		  </center>
          </div>
          <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h5>Edit Pengumuman</h5>
                    </div>
                    <div class="card-body">
						<form action="?page=pengumuman&act=proses" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Judul</label>
								<input type="hidden" name="id_pengumuman" value="<?=$d['id_pengumuman'] ?>">
								<input name="judul" type="text" class="form-control" value="<?=$d['judul'] ?>" readonly>								
							</div>

							<div class="form-group">
								<label>Isi Pengumuman</label>
								<textarea class="form-control" name="isi_pengumuman" placeholder="Isi Pengumuman" id="floatingTextarea2" style="height: 100px" value="<?=$d['isi_pengumuman'] ?>"></textarea>							
							</div>

							<div class="form-group">
								<label>Tanggal</label>
								<input type="date" name="date" class="form-control w-25" value="<?=$d['date'] ?>">							
							</div>


							<div class="form-group">
								<button name="editPengumuman" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
								<a href="javascript:history.back()" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Batal</a>
							</div>


						</form>
			
					
</div>
</div>
</div>
</div>
</div>

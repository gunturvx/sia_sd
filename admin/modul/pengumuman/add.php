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
                      <h5>Tambah Pengumuman</h5>
                    </div>
                    <div class="card-body">
						<form action="?page=pengumuman&act=proses" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Judul</label>
								<input name="judul" type="text" class="form-control" placeholder="Judul">								
							</div>
							<div class="form-group">
								<label>Isi Pengumuman</label>
								<textarea class="form-control" name="isi_pengumuman" placeholder="Isi Pengumuman" id="floatingTextarea2" style="height: 100px"></textarea>						
							</div>

							<div class="form-group">
								<label>Tanggal</label>
								<input type="date" name="date" class="form-control w-25">						
							</div>

							<div class="form-group">
								<button name="savePengumuman" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
								<a href="javascript:history.back()" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Batal</a>
							</div>


						</form>
</div>
</div>
</div>
</div>
</div>

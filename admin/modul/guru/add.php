<div class="container-fluid">
          <div class="page-header">
          <center>
            <h4 class="page-title">Data Guru</h4>
          </center>
          </div>
          <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h5>Tambah Guru</h5>
                    </div>
                    <div class="card-body">
						<form action="?page=guru&act=proses" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>NIP/NUPTK</label>
								<input name="nip" type="text" class="form-control" placeholder="NIP/NUPTK">								
							</div>

							<div class="form-group">
								<label>Nama Guru</label>
								<input name="nama" type="text" class="form-control" placeholder="Nama dan Gelar">								
							</div>

							<div class="form-group">
								<label>Email</label>
								<input name="email" type="text" class="form-control" placeholder="Email">
							</div>

							<div class="form-group">
								<label>Foto</label>
								<input type="file" name="foto">
							</div>

							<div class="form-group">
								<button name="saveGuru" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
								<a href="javascript:history.back()" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Batal</a>
							</div>


						</form>
</div>
</div>
</div>
</div>
</div>

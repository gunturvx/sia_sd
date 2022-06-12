<div class="container-fluid">
          <div class="page-header">
          <center>
            <h4 class="page-title">Input Nilai Siswa</h4>
          </center>
          </div>
          <div class="row">

                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h5> Input Nilai Siswa</h5>
                    </div>
                    <div class="card-body">
						<form action="?page=nilai&act=proses" method="POST">
						<div class="container" style="margin-left: 2%;">						
						
							<div class="mb-2 row">
								<label for="id_siswa" class="col-sm-2 col-form-label">Nama Siswa</label>
								<div class="col-sm-4">
									<select class="form-control" name="id_siswa" required aria-label="Default select example">
										<option selected value="">-- Pilih Salah Satu --</option>
										<?php

										// DAH BISA INI
										$result = mysqli_query($con, "SELECT * FROM tb_siswa 
											INNER JOIN tb_mkelas ON tb_siswa.id_mkelas=tb_mkelas.id_mkelas  
               
											")or die(mysqli_error());
										while($data=mysqli_fetch_array($result)){
											echo '<option value="'.$data['id_siswa'].'">'.$data['nis'].' - '.$data['nama_siswa'].' - '.$data['nama_kelas'].' </option>';
										}
										?>
									</select>
								</div>
							</div>
								<div class="mb-2 row">
									<label for="id_mapel" class="col-sm-2 col-form-label">Mapel</label>
									<div class="col-sm-4">
										<select name="id_mapel" class="form-control">
											<option value="">- Pilih -</option>
											<?php
												// DAH BISA INI
											$result = mysqli_query($con, "SELECT * FROM tb_mengajar 
												INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel WHERE id_guru = '$id_login'
				
												")or die(mysqli_error());
											while($data=mysqli_fetch_array($result)){
												echo '<option value="'.$data['id_mengajar'].'">'.$data['mapel'].'</option>';
											}
										?>
										</select>
									</div>
								</div>
							<div class="mb-2 row">
								<label for="nilai_harian1" class="col-sm-2 col-form-label">Nilai Tugas 1</label>
								<div class="col-sm-4">
									<input type="text" name="nilai_harian1" class="form-control" id="nilai_harian1" required autocomplete="off">
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nilai_harian2" class="col-sm-2 col-form-label">Nilai Tugas 2</label>
								<div class="col-sm-4">
									<input type="text" name="nilai_harian2" class="form-control" id="nilai_harian2" required autocomplete="off">
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nilai_harian3" class="col-sm-2 col-form-label">Nilai Tugas 3</label>
								<div class="col-sm-4">
									<input type="text" name="nilai_harian3" class="form-control" id="nilai_harian3" required autocomplete="off">
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nilai_harian4" class="col-sm-2 col-form-label">Nilai Tugas 4</label>
								<div class="col-sm-4">
									<input type="text" name="nilai_harian4" class="form-control" id="nilai_harian4" required autocomplete="off">
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nilai_harian5" class="col-sm-2 col-form-label">Nilai Tugas 5</label>
								<div class="col-sm-4">
									<input type="text" name="nilai_harian5" class="form-control" id="nilai_harian5" required autocomplete="off">
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nilai_pts" class="col-sm-2 col-form-label">Nilai PTS</label>
								<div class="col-sm-4">
									<input type="text" name="nilai_pts" class="form-control" id="nilai_pts" required autocomplete="off">
								</div>
							</div>
							<div class="mb-2 row">
								<label for="nilai_pas" class="col-sm-2 col-form-label">Nilai PAS</label>
								<div class="col-sm-4">
									<input type="text" name="nilai_pas" class="form-control" id="nilai_pas" required autocomplete="off">
								</div>
							</div>

							<br>
							<button type="reset" class="btn btn-danger">Reset</button>
							<button name="saveNilai" class="btn btn-primary">Submit</button>
						</div>
					</form>
</div>
</div>
</div>
</div>
</div>

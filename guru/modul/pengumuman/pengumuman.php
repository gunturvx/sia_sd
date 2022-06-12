 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Pengumuman Sekolah</h1>
</div>

<!-- Content Row -->
							
<?php

$sql = mysqli_query($con, "SELECT * FROM tb_pengumuman ORDER BY tanggal");

while ($data = mysqli_fetch_assoc($sql)) {

?>
<div class="row">

	<!-- Kotak Identitas Sekolah -->
	<div class="col-xl-12 col-lg-7">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"><?=$data['judul'];?></h6>
			</div>

			<div class="card-body">
				<p class="card-text"><?=$data['isi_pengumuman'];?></p>
				<p><small class="text-muted"><?php
                                                        $date = date('l, d F Y', strtotime(str_replace('-', '/', $data['tanggal'])));


                                                        echo $date;
                                                        ?></small></p>					
			</div>
		</div>
		<?php } ?>
	</div>
</div>
</div>
<!-- /.container-fluid -->
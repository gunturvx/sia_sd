 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

	<!-- Card Siswa -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
						   Akses Cepat</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><a href="?page=jadwal">Jadwal Mengajar</a></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-user fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Content Row -->

<div class="row">

	<!-- Kotak Identitas Sekolah -->
	<div class="col-xl-12 col-lg-7">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Pengumuman Sekolah</h6>
			</div>
							
            <?php

            $sql = mysqli_query($con, "SELECT * FROM tb_pengumuman ORDER BY date DESC LIMIT 1");

            while ($data = mysqli_fetch_assoc($sql)) {

            ?>
			<div class="card-body">
			<h5 class="card-title"><?=$data['judul'];?></h5>
				<p class="card-text"><?=$data['isi_pengumuman'];?></p>
				<p><small class="text-muted"><?php
                                                        $date = date('l, d F Y', strtotime(str_replace('-', '/', $data['date'])));


                                                        echo $date;
                                                        ?></small></p>
				<a href="#" class="btn btn-primary">Lihat seluruh pengumuman</a>					
			</div>
		</div>
		<?php } ?>
	</div>
</div>
</div>
<!-- /.container-fluid -->
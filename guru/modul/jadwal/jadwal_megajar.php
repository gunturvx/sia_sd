 <!-- Begin Page Content -->
<?php 
		foreach ($mengajar as $jd) {
		?>
 <div class="container-fluid">

	<!-- Kotak Identitas Sekolah -->
	<div class="col-xl-12 col-lg-7">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"><?=$jd['mapel']; ?></h6>
			</div>
			<div class="card-body">
		<ul>
			<li>
				Hari : <?=$jd['hari']; ?>
			</li>
			<li>
				Jam Ke : <?=$jd['jamke']; ?>
			</li>
			<li>
				Waktu : <?=$jd['jam_mengajar']; ?>
			</li>
			<li>
				Kelas : <?=$jd['nama_kelas']; ?>
			</li>
		</ul>
		<a href="?page=absen&pelajaran=<?=$jd['id_mengajar'] ?> " class="btn btn-primary btn-block text-left">
			<i class="fas fa-clipboard-check"></i>
			Isi Absen
		</a>
		<a href="?page=rekap&pelajaran=<?=$jd['id_mengajar'] ?> " class="btn btn-success btn-block text-left">
			<i class="fas fa-list-alt"></i>
			Rekap Absen
		</a>			
			</div>
		</div>

	</div>
</div>
</div>
		<?php } ?>
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
						   Jumlah Data Siswa</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahSiswa; ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-user fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Card Mata Pelajaran -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
						   Jumlah Mata Pelajaran</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahMapel; ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-book fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Card Guru -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Data Guru
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahGuru; ?></div>
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Card Kelas -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
							Jumlah Data Kelas</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahKelas; ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-chart-line fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Content Row -->

<div class="row">

	<!-- Kotak Identitas Sekolah -->
	<div class="col-xl-8 col-lg-7">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Identitas Sekolah</h6>
			</div>
			<div class="card-body">
			<center>
			<img src="../img/logo.png" width="80">
			<br>
			<b>SD Negeri Cipari 02</b>
			</center>
			<div class="card-category">
			<center>
			Jl. Banyupanas No. 07, Cipari, Kec. Cipari, Kab. Cilacap, Jawa Tengah, dengan kode pos 53262. 
				<br>Email : sdnegeri02cipari@gmail.com
			</center>
				</div>
			</div>
		</div>
	</div>

	<!-- Pie Chart Data Dashboard-->
	<div class="col-xl-4 col-lg-5">
		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Grafik Data</h6>
			</div>
			<!-- Card Body -->
			<div class="card-body">
				<div class="chart-pie pt-4 pb-2">
					<canvas id="myPieChart"></canvas>
				</div>
				<div class="mt-4 text-center small">
					<span class="mr-2">
						<i class="fas fa-circle text-primary"></i> Siswa
					</span>
					<span class="mr-2">
						<i class="fas fa-circle text-success"></i> Mata Pelajaran
					</span>
					<span class="mr-2">
						<i class="fas fa-circle text-info"></i> Guru
					</span>
					<span class="mr-2">
						<i class="fas fa-circle text-warning"></i> Kelas
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /.container-fluid -->
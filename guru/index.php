
<?php include("../path.php"); ?>
<?php
@session_start();
 include '../app/database/db.php';

if (!isset($_SESSION['guru'])) {
?> <script>
    alert('Maaf ! Anda Belum Login !!');
    window.location='../index.php';
 </script>
<?php
}
 ?>


   <?php
$id_login = @$_SESSION['guru'];
$sql = mysqli_query($con,"SELECT * FROM tb_guru
 WHERE id_guru = '$id_login'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);

// tampilkan data mengajar
$mengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 

INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
WHERE tb_mengajar.id_guru='$data[id_guru]' AND tb_thajaran.status=1 ");

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Guru SD Negeri Cipari 02</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/style.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- Header Dipanggil dari folder app/includes/header.php ( agar header sama dengan page yg lain) -->
        <?php include(ROOT_PATH . "../guru/app/includes/sidebar.php"); ?> 
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <!-- Header Dipanggil dari folder app/includes/header.php ( agar header sama dengan page yg lain) -->
                <?php include(ROOT_PATH . "../guru/app/includes/header.php"); ?>  
                <!-- End of Topbar -->


                <div class="main-panel">
			<div class="content">

				<!-- Halaman dinamis -->
				<?php 
				error_reporting();
				$page= @$_GET['page'];
				$act = @$_GET['act'];

				if ($page=='absen') {
					if ($act=='') {
						include 'modul/absen/absen_kelas.php';
					}elseif ($act=='surat_view') {
						include 'modul/absen/view_surat_izin.php';
					}elseif ($act=='konfirmasi') {
						include 'modul/absen/konfirmasi_izin.php';
					}elseif ($act=='update') {
						include 'modul/absen/absen_kelas_update.php';
					}

				}elseif ($page=='rekap') {
					if ($act=='') {
						include 'modul/rekap/rekap_absen.php';

					}	

				}elseif ($page=='jadwal') {
					if ($act=='') {
						include 'modul/jadwal/jadwal_megajar.php';

					}	

				}elseif ($page=='akun') {
					include 'modul/akun/akun.php';
					
				}elseif ($page=='pengumuman') {
					include 'modul/pengumuman/pengumuman.php';

				}elseif ($page=='nilai') {
					if ($act=='') {
						include 'modul/nilai/data.php'; 
					}elseif ($act=='add') {
						 include 'modul/nilai/add.php'; 
					}elseif ($act=='proses') {
						 include 'modul/nilai/proses.php'; 
					}
				}elseif ($page=='presensi') {
					if ($act=='') {
						include 'modul/presensi/absensi.php'; 
					}elseif ($act=='detailabsensi') {
						include 'modul/presensi/detailabsensi.php'; 
					}elseif ($act=='editpresensi') {
						include 'modul/presensi/detaileditabsensi.php'; 
					}elseif ($act=='delpresensi') {
							include 'modul/presensi/hapusabsensi.php'; 
					}elseif ($act=='simpanpresensi') {
							include 'modul/presensi/simpanabsensi.php'; 
					}elseif ($act=='rekapabsensi') {
							include 'modul/presensi/rekapabsensi.php'; 
					}elseif ($act=='detailabsensi') {
					include 'modul/presensi/detailabsensi.php';
					}
				}elseif ($page=='') {
							include 'modul/home.php';
					}else{
							echo "<center><b>Tidak ada Halaman</b><center>";
					}
				 ?>


				<!-- end -->


				
			</div>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    
<!-- modal ganti password -->
		<div class="modal fade bs-example-modal-sm" id="gantiPassword" tabindex="-1" role="dialog" aria-labelledby="gantiPass">
							<div class="modal-dialog modal-sm" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="gantiPass">Ganti Password</h4>
									</div>
									<form action="" method="post">
									<div class="modal-body">
											<div class="form-group">
												<label class="control-label">Password Lama</label>
												<input name="pass" type="text" class="form-control" placeholder="Password Lama">
											</div>
											<div class="form-group">
												<label class="control-label">Password Baru</label>
												<input name="pass1" type="text" class="form-control" placeholder="Password Baru">
											</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button name="changePassword" type="submit" class="btn btn-primary">Ganti Password</button>
									</div>
									</form>
									<?php 
									if (isset($_POST['changePassword'])) {
										$passLama = $data['password'];
										$pass = sha1($_POST['pass']);
										$newPass = sha1($_POST['pass1']);

										if ($passLama == $pass) {
											$set = mysqli_query($con,"UPDATE tb_admin SET password='$newPass' WHERE id_admin='$data[id_admin]' ");
												echo "<script type='text/javascript'>
				alert('Password Telah berubah')
				window.location.replace('dashboard.php'); 
				</script>";
												
										}else{
											echo "<script type='text/javascript'>
				alert('Password Lama Tidak cocok')
				window.location.replace('dashboard.php'); 
				</script>";
										}
									}
									 ?>


								</div>
							</div>
						</div>

						<!--end modal ganti password -->


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda yakin ingin logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    
						<!-- Modal pengaturan akun-->
<div class="modal fade" id="pengaturanAkun" tabindex="-1" role="dialog" aria-labelledby="akunAtur">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="akunAtur"><i class="fas fa-user-cog"></i> Pengaturan Akun</h3>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
      <div class="modal-body">
      	<div class="form-group">
      		<label>Nama Lengkap</label>
      		<input type="text" name="nama" class="form-control" value="<?=$data['nama_guru'] ?>">       		
      	</div>   
      	<div class="form-group">
      		<label>Email</label>
      		<input type="text" name="username" class="form-control" value="<?=$data['username'] ?>">      		
      	</div> 
      	<div class="form-group">
      		<label>Foto Profile</label>
      		<p>
      			<img src="../img/user/<?=$data['foto'] ?>" class="img-thumbnail" style="height: 50px;width: 50px;">
      		</p>
      		<input type="file" name="foto">      		
      	</div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button name="updateProfile" type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
      	<?php 
					if (isset($_POST['updateProfile'])) {

					$gambar = @$_FILES['foto']['name'];
					if (!empty($gambar)) {
					move_uploaded_file($_FILES['foto']['tmp_name'],"../assets/img/user/$gambar");
					$ganti = mysqli_query($con,"UPDATE tb_admin SET foto='$gambar' WHERE id_admin='$_POST[id]' ");
					}  	

					      $sqlEdit = mysqli_query($con,"UPDATE tb_admin SET nama_lengkap='$_POST[nama]',username='$_POST[username]' WHERE id_admin='$_POST[id]' ") or die(mysqli_error($konek));

                        if ($sqlEdit) {
                             echo "<script>
                        alert('Sukses ! Data berhasil diperbarui');
                        window.location='index.php';
                        </script>";  
                        }
					}
					?>
    </div>
  </div>
</div>
<!-- end modal pengaturan akun -->


    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>

</body>

</html>

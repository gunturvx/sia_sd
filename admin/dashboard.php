<!-- Koneksi -->
<?php include("../path.php"); ?>
<?php
session_start();
 include '../app/database/db.php';

if (!isset($_SESSION['admin'])) {
?> <script>
    alert('Maaf ! Anda Belum Login !!');
    window.location='index.php';
 </script>
<?php
}
 ?>
 <?php

// jumlah siswa
$jumlahSiswa = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tb_siswa WHERE status=1 "));
// jumlah guru
$jumlahGuru = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tb_guru WHERE status='Y' "));
// jumlah mata pelajaran
$jumlahMapel = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tb_master_mapel"));
// jumlah mata pelajaran
$jumlahKelas = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tb_mkelas"));

$id_login = @$_SESSION['admin'];


$sql = mysqli_query($con,"SELECT * FROM tb_admin
WHERE id_admin = '$id_login'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Admin SD Negeri Cipari 02</title>

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
        <?php include(ROOT_PATH . "../admin/app/includes/sidebar.php"); ?> 
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <!-- Header Dipanggil dari folder app/includes/header.php ( agar header sama dengan page yg lain) -->
                <?php include(ROOT_PATH . "../app/includes/header.php"); ?>  
                <!-- End of Topbar -->


                <div class="main-panel">
			<div class="content">

				<!-- Halaman dinamis -->
				<?php 
				error_reporting();
				$page= @$_GET['page'];
				$act = @$_GET['act'];

				if ($page=='master') {
					// kelas
					if ($act=='kelas') {
					include 'modul/master/kelas/data_kelas.php';
					}elseif ($act=='delkelas') {
					include 'modul/master/kelas/del.php';
					// semster
					}elseif ($act=='semester') {
					include 'modul/master/semester/data.php'; 
					}elseif ($act=='delsemester') {
					include 'modul/master/semester/del.php';
					}elseif ($act=='set_semester') {
						include 'modul/master/semester/set.php';
					}
					// tahun ajaran
					elseif ($act=='ta') {
					include 'modul/master/ta/data.php'; 
					}elseif ($act=='delta') {
					include 'modul/master/ta/del.php';
					}elseif($act=='set_ta'){
						include 'modul/master/ta/set.php';
						// mapel
				}elseif ($act=='mapel') {
					include 'modul/master/mapel/data.php'; 
					}elseif ($act=='delmapel') {
					include 'modul/master/mapel/del.php';
					}					
				}elseif ($page=='walas') {
					if ($act=='') {
					 include 'modul/wakel/data.php';  	
					}
               
               }elseif ($page=='kepsek') {
           if ($act=='') {
               include 'modul/kepsek/data.php'; 
           }elseif ($act=='add') {
                include 'modul/kepsek/add.php'; 
           }elseif ($act=='edit') {
               include 'modul/kepsek/edit.php'; 
           }elseif ($act=='del') {
                include 'modul/kepsek/del.php'; 
           }elseif ($act=='proses') {
                include 'modul/kepsek/proses.php'; 
           }
            }elseif ($page=='guru') {
           if ($act=='') {
               include 'modul/guru/data.php'; 
           }elseif ($act=='add') {
                include 'modul/guru/add.php'; 
           }elseif ($act=='edit') {
               include 'modul/guru/edit.php'; 
           }elseif ($act=='del') {
                include 'modul/guru/del.php'; 
           }elseif ($act=='proses') {
                include 'modul/guru/proses.php'; 
           }
        }elseif ($page=='siswa') {
          if ($act=='') {
               include 'modul/siswa/data.php'; 
           }elseif ($act=='add') {
                include 'modul/siswa/add.php'; 
           }elseif ($act=='edit') {
               include 'modul/siswa/edit.php'; 
           }elseif ($act=='del') {
                include 'modul/siswa/del.php'; 
           }elseif ($act=='proses') {
                include 'modul/siswa/proses.php'; 
           }   
        }
            elseif ($page=='rekap') {
					if ($act=='') {
						include 'modul/rekap/rekap_absen.php';
					}elseif ($act='rekap-perbulan') {
						include 'modul/rekap/rekap_perbulan.php';
					}					
		}elseif ($page=='jadwal') {
			if ($act=='') {
				include 'modul/jadwal/data_mengajar.php';
			}elseif ($act=='add') {
				include 'modul/jadwal/tambah.php';
			}elseif ($act=='cancel') {
				include 'modul/jadwal/cancel.php';
			}					
		}elseif ($page=='') {
			include 'modul/home.php';
		}else{
			echo "<b>Tidak ada Halaman</b>";
		}


				 ?>


				<!-- end -->
				
			</div>


               

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- Header Dipanggil dari folder app/includes/header.php ( agar header sama dengan page yg lain) -->
            <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>   
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    
    



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
      		<input type="text" name="nama" class="form-control" value="<?=$data['nama_lengkap'] ?>">  
      		<input type="hidden" name="id" value="<?=$data['id_admin'] ?>">       		
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
                        window.location='dashboard.php';
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

<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Jumlah Data Siswa", "Jumlah Mata Pelajaran", "Jumlah Data Guru", "Jumlah Data Kelas"],
    datasets: [{
      data: [<?= $jumlahSiswa; ?>, <?= $jumlahMapel; ?>, <?= $jumlahGuru; ?>,  <?= $jumlahKelas; ?>],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#FFCC00'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#FFCC00'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
</script>
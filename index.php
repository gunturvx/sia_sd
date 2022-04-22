<?php
session_start();
include 'app/database/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Dashboard SD Negeri 02 Cipari</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/style.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-9 col-lg-9 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Dashboard</h1>
                                    </div>
                                    <form method="post" action="" class="login100-form validate-form"> 
                                        <div class="form-group wrap-input100 validate-input">
                                            <input type="text" class="form-control form-control-user input100"  name="username" placeholder="Masukan NIP">
                                        </div>
                                        <div class="form-group wrap-input100 validate-input">
                                        <span class="btn-show-pass">
                                            <i class="zmdi zmdi-eye"></i>
                                        </span>
                                            <input type="password" class="form-control form-control-user input100" name="password" placeholder="Masukkan Password">
                                        </div>
                                        <div class="form-group mb-3">
                                            <!-- <input class="input100" type="text" name="username">
                                            <span class="focus-input100" data-placeholder="Username"></span> -->
                                            <select class="form-control" name="level">
                                                <option>Level</option>
                                                <option value="1">Guru</option>
                                                <option value="2">Siswa</option>
                                                <option value="3">Wali Kelas</option>
                                            </select>
                                        </div>
                                        <div class="login100-form-bgbtn"></div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block login100-form-btn">
                                            Login
                                         </button>
                                    </form>
                                    <?php 
				if ($_SERVER['REQUEST_METHOD']=='POST') {
					$level = $_POST['level'];
					$pass= sha1($_POST['password']);
					if ($level==1) {
						// Guru
						$sqlCek = mysqli_query($con,"SELECT * FROM tb_guru WHERE nip='$_POST[username]' AND password='$pass' AND status='Y'");
						$jml = mysqli_num_rows($sqlCek);
						$d = mysqli_fetch_array($sqlCek);
						
						if ($jml > 0) {
						$_SESSION['guru']= $d['id_guru'];
						echo "
						<script type='text/javascript'>
						setTimeout(function () { 
						
						swal('($d[nama_guru]) ', 'Login berhasil', {
						icon : 'success',
						buttons: {        			
						confirm: {
						className : 'btn btn-success'
						}
						},
						});    
						},10);  
						window.setTimeout(function(){ 
						window.location.replace('./guru/');
						} ,3000);   
						</script>";					
						
						}else{
						echo "
						<script type='text/javascript'>
						setTimeout(function () { 
						
						swal('Sorry!', 'Username / Password Salah', {
						icon : 'error',
						buttons: {        			
						confirm: {
						className : 'btn btn-danger'
						}
						},
						});    
						},10);  
						window.setTimeout(function(){ 
						window.location.replace('./');
						} ,3000);   
						</script>";
						}
						
					}elseif ($level==2) {
						// Siswa
								$sqlCek = mysqli_query($con,"SELECT * FROM tb_siswa WHERE nis='$_POST[username]' AND password='$pass' AND status='1'");
								$jml = mysqli_num_rows($sqlCek);
								$d = mysqli_fetch_array($sqlCek);
								
								if ($jml > 0) {
								$_SESSION['siswa']= $d['id_siswa'];
								
								
								echo "
								<script type='text/javascript'>
								setTimeout(function () { 
								
								swal('($d[nama_siswa]) ', 'Login berhasil', {
								icon : 'success',
								buttons: {        			
								confirm: {
								className : 'btn btn-success'
								}
								},
								});    
								},10);  
								window.setTimeout(function(){ 
								window.location.replace('./siswa/');
								} ,3000);   
								</script>";
								
								}else{
								echo "
								<script type='text/javascript'>
								setTimeout(function () { 
								
								swal('Sorry!', 'Username / Password Salah', {
								icon : 'error',
								buttons: {        			
								confirm: {
								className : 'btn btn-danger'
								}
								},
								});    
								},10);  
								window.setTimeout(function(){ 
								window.location.replace('./');
								} ,3000);   
								</script>";
								}

								
								

					}else{
						echo "Tidak ada level yg dipilih";
					}

				}
				?>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
 
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Sweet Alert -->
	<script src="js/plugin/sweetalert/sweetalert.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
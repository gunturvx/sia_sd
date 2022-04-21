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
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="username" aria-describedby="emailHelp"
                                                placeholder="Masukan NIP">
                                        </div>
                                        <div class="form-group">
                                        <span class="btn-show-pass">
                                            <i class="zmdi zmdi-eye"></i>
                                        </span>
                                            <input type="password" class="form-control form-control-user"
                                                id="password" placeholder="Masukkan Password">
                                        </div>
                                        <div class="form-group mb-3">
                                            <!-- <input class="input100" type="text" name="username">
                                            <span class="focus-input100" data-placeholder="Username"></span> -->
                                            <select class="form-control" name="level">
                                                <option>Level</option>
                                                <option value="1">Guru</option>
                                                <option value="2">Siswa</option>
                                                <option value="3">Kepala Sekolah</option>
                                                <option value="4">Wali Kelas</option>
                                            </select>
                                        </div>
                                        <a href="index.html" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a>
                                    </form>
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

</body>

</html>
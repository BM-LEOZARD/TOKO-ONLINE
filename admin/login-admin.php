<?php
session_start();
include "../koneksi/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
<br></br>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                        
                        <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form method="post" class="user">
                                        <div class="form-grup">
                                            <label class="small mb-1" for="InputUsername">username</label>
                                            <input class="form-control py-4" id="InputUsername" name="username" type="text" placeholder="Enter Username" required/>
                                        </div>
                                        <div class="form-grup">
                                            <label for="small mb-1" for="InputPassword">Password</label>
                                            <input class="form-control py-4" id="InputPassword" name="password" type="password" placeholder="Enter Password" required/>
                                        </div>
                                        <div class="form-group">
                                            <div class="creat_account">
                                                <input type="checkbox" id="f-option2" name="selector">
                                                <label for="f-option2">Keep me logged in</label>
                                            </div>
                                        </div>
                                        <div class="form grup d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button name="login" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>

<?php

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $ambil = $koneksi->query("SELECT * FROM admin
     WHERE username='$username' AND password='$password'");

    $akun = $ambil->num_rows;

    if($akun==1)
    {
        $_SESSION['admin'] = $ambil->fetch_assoc();
        echo "<script>location='index.php';</script>";
    }
    else
    {
        echo "<script>alert('Login Gagal');</script>";
        echo "<script>location='login-admin.php';</script>";
    }
}

?>
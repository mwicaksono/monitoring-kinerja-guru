<?php
error_reporting(0);     /* sembunyikan error untuk menampilkan pesan */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login | Sistem Monitoring Kinerja Guru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="asdasds" />
    <meta name="author" content="asdasa" />

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <!-- panggil semua file css yang dibutuhkan untuk tampilan halaman login -->

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-reset.css">

    <!--external css-->
    <link rel="stylesheet" type="text/css" href="assets/js/font-awesome/css/font-awesome.css" />

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-responsive.css" />
</head>

<body class="login-body">
    <div class="container">
        <!--header start-->
        <header class="header info-bg">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!--logo start-->
                <a style="font-size:20px;margin-top:15px" href="?module=home" class="logo">
                    <img class="logo-image" src="assets/img/favicon.png">
                    Monitoring Kinerja Guru
                </a>
                <!--logo end-->
            </div>
        </header>
        <!--header end-->
        <br><br><br>
        <!-- fungsi untuk menampilkan pesan -->
        <div class="col-md-4 col-md-offset-4">
            <?php
            /* jika code pesan = 1
            *  tampilkan pesan "username atau password salah, cek kembali username dan password Anda"
            */
            if ($_GET['code'] == 1) {
            ?>
                <div class="row">
                    <div class="panel-body">
                        <div class="alert alert-danger alert-block fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="icon-remove"></i>
                            </button>
                            <h4>
                                <i class="icon-ok-sign"></i>
                                Gagal Login!
                            </h4>
                            <p>username atau password salah, cek kembali username dan password Anda.</p>
                        </div>
                    </div>
                </div>
            <?php
            }
            /* jika code pesan = 2
            *  tampilkan pesan "Anda telah berhasil keluar"
            */
            if ($_GET['code'] == 2) {
            ?>
                <div class="row">
                    <div class="panel-body">
                        <div class="alert alert-success alert-block fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="icon-remove"></i>
                            </button>
                            <h4>
                                <i class="icon-ok-sign"></i>
                                Sukses!
                            </h4>
                            <p>Anda telah berhasil keluar.</p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <!-- tampilan form login -->
        <form class="form-signin" method="POST" action="login-check.php">
            <h2 class="form-signin-heading"><i style="margin-right:10px" class="icon-user"></i> silahkan login</h2>
            <div class="login-wrap">
                <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
                <input type="password" class="form-control" name="password" placeholder="Password">

                <button class="btn btn-lg btn-login btn-block" type="submit">login</button>
            </div>
        </form>

        <div class="powered">
            <p>Copyright &copy; <?= date('Y') ?> <br>YP Eben Haezer GKI Salatiga</p>
        </div>
    </div>

    <!-- panggil semua file js yang dibutuhkan untuk tampilan halaman login -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/back.png", {
            speed: 500
        });
    </script>
</body>

</html>
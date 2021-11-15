<?php
error_reporting(0);   /* sembunyikan error untuk menampilkan pesan */
session_start();      /* memulai session */

/* panggil file untuk konfigurasi dan koneksi ke database */
include "includes/class_database.php";
include "includes/serverconfig.php";
include "includes/debug.php";
include "includes/fungsi_tanggal.php";
/* ------------------------------------------------------ */

$periode      = $_POST['periode'];
$periode_min  = $_POST['periode'] - 1;

$sqlp = " SELECT id_periode FROM tbl_periode
          WHERE status='on'";

$queryp = mysql_query($sqlp) or die(mysql_error());
$datap  = mysql_fetch_array($queryp);

$id_periode   = $datap['id_periode'] - 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sistem Monitoring Kinerja Guru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="asdasdasd" />
    <meta name="author" content="loremipsum" />

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <!-- panggil semua file css yang dibutuhkan untuk tampilan halaman login -->

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-reset.css">

    <!--external css-->
    <link rel="stylesheet" type="text/css" href="assets/js/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/advanced-datatable/media/css/demo_page.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/advanced-datatable/media/css/demo_table.css" />

    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />

    <link rel="stylesheet" type="text/css" href="assets/css/tasks.css" />

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-responsive.css" />

    <link rel="stylesheet" type="text/css" href="assets/js/select2-3.5.4/select2.css" />

    <!-- Fungsi untuk membatasi karakter yang diinputkan -->
    <script language="javascript">
        function getkey(e) {
            if (window.event)
                return window.event.keyCode;
            else if (e)
                return e.which;
            else
                return null;
        }

        function goodchars(e, goods, field) {
            var key, keychar;
            key = getkey(e);
            if (key == null) return true;

            keychar = String.fromCharCode(key);
            keychar = keychar.toLowerCase();
            goods = goods.toLowerCase();

            // check goodkeys
            if (goods.indexOf(keychar) != -1)
                return true;
            // control keys
            if (key == null || key == 0 || key == 8 || key == 9 || key == 27)
                return true;

            if (key == 13) {
                var i;
                for (i = 0; i < field.form.elements.length; i++)
                    if (field == field.form.elements[i])
                        break;
                i = (i + 1) % field.form.elements.length;
                field.form.elements[i].focus();
                return false;
            };
            // else return false
            return false;
        }
    </script>

    <script src="assets/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="assets/js/highcharts.js" type="text/javascript"></script>

    <script type="text/javascript">
        var chart1; // globally available
        $(document).ready(function() {
            chart1 = new Highcharts.Chart({
                chart: {
                    renderTo: 'nilai_pkg',
                    type: 'column'
                },
                title: {
                    text: 'Grafik Kinerja Guru'
                },
                xAxis: {
                    categories: ['Kinerja']
                },
                yAxis: {
                    title: {
                        text: 'Nilai PKG'
                    }
                },
                series: [
                    <?php

                    if ($periode == '') {

                        $sql = "SELECT a.periode_nilai,a.guru_dinilai,
                        b.nip,b.nama_guru,
                        c.id_periode,c.periode,c.status
                        FROM tbl_penilaian as a
                        JOIN tbl_guru as b
                        JOIN tbl_periode as c
                        ON a.periode_nilai=c.id_periode
                        AND a.guru_dinilai=b.nip
                        WHERE c.status='on'";
                    } else {

                        $sql = "SELECT a.periode_nilai,a.guru_dinilai,
                        b.nip,b.nama_guru,
                        c.id_periode,c.periode,c.status
                        FROM tbl_penilaian as a
                        JOIN tbl_guru as b
                        JOIN tbl_periode as c
                        ON a.periode_nilai=c.id_periode
                        AND a.guru_dinilai=b.nip
                        WHERE c.periode='$periode'";
                    }

                    $query = mysql_query($sql) or die(mysql_error());

                    while ($set = mysql_fetch_array($query)) {
                        $nip        = $set['guru_dinilai'];
                        $nama_guru  = $set['nama_guru'];

                        $sql_nilai    = " SELECT nilai_pkg
                                      FROM tbl_penilaian
                                      WHERE guru_dinilai='$nip'";
                        $query_nilai  = mysql_query($sql_nilai) or die(mysql_error());

                        while ($data = mysql_fetch_array($query_nilai)) {

                            $nilai_pkg = $data['nilai_pkg'];
                        }
                    ?> {
                            name: '<?php echo $nama_guru; ?>',
                            //data yang akan ditampilkan 
                            data: [<?php echo $nilai_pkg; ?>]
                        },
                    <?php } ?>
                ]
            });
        });
    </script>

    <script type="text/javascript">
        var chart2; // globally available
        $(document).ready(function() {
            chart2 = new Highcharts.Chart({
                chart: {
                    renderTo: 'nilai_pkg2',
                    type: 'column'
                },
                title: {
                    text: 'Grafik Kinerja Guru'
                },
                xAxis: {
                    categories: ['Kinerja']
                },
                yAxis: {
                    title: {
                        text: 'Nilai PKG'
                    }
                },
                series: [
                    <?php

                    $sql = "SELECT a.periode_nilai,a.guru_dinilai,
                        b.nip,b.nama_guru,
                        c.id_periode,c.periode,c.status
                        FROM tbl_penilaian as a
                        JOIN tbl_guru as b
                        JOIN tbl_periode as c
                        ON a.periode_nilai=c.id_periode
                        AND a.guru_dinilai=b.nip
                        WHERE c.id_periode='$id_periode'";

                    $query = mysql_query($sql) or die(mysql_error());

                    while ($set = mysql_fetch_array($query)) {
                        $nip        = $set['guru_dinilai'];
                        $nama_guru  = $set['nama_guru'];

                        $sql_nilai    = " SELECT nilai_pkg
                                      FROM tbl_penilaian
                                      WHERE guru_dinilai='$nip'";
                        $query_nilai  = mysql_query($sql_nilai) or die(mysql_error());

                        while ($data = mysql_fetch_array($query_nilai)) {

                            $nilai_pkg = $data['nilai_pkg'];
                        }
                    ?> {
                            name: '<?php echo $nama_guru; ?>',
                            //data yang akan ditampilkan 
                            data: [<?php echo $nilai_pkg; ?>]
                        },
                    <?php } ?>
                ]
            });
        });
    </script>
</head>

<body class="full-width">

    <section id="container" class="">
        <!--header start-->
        <header class="header info-bg">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!--logo start-->
                <?php if ($_SESSION['level'] == 'Siswa' or $_SESSION['level'] == 'Orang Tua' or $_SESSION['level'] == 'Teman Sejawat') { ?>
                    <a href="#" class="logo">
                        <img class="logo-image" src="assets/img/favicon.png">
                        Monitoring Kinerja Guru
                    </a>
                <?php } else { ?>
                    <a href="?module=home" class="logo">
                        <img class="logo-image" src="assets/img/favicon.png">
                        Monitoring Kinerja Guru
                    </a>
                <?php } ?>
                <!--logo end-->
                <div class="horizontal-menu navbar-collapse collapse ">

                    <!-- panggil file "top-menu.php" untuk menampilkan top menu -->
                    <?php include "top-menu.php" ?>


                </div>

                <div class="horizontal-menu pull-right">
                    <ul class="nav navbar-nav">
                        <?php

                        if ($_GET["module"] == "password") {
                            echo '  <li style="background:#1a9fd0" class="dropdown">
                                  <a data-toggle="dropdown" data-hover="dropdown" class=" pull-right dropdown-toggle" href="javascript:;">
                                      <i style="margin-right:3px" class="icon-user"></i>';
                        ?>
                            <?php echo $_SESSION['username'] . ' (' . $_SESSION['level'] . ')'; ?>
                        <?php
                            echo '
                                      <b class=" icon-angle-down"></b>
                                  </a>
                                  <ul class="dropdown-menu pull-right">
                                      <li style="border-bottom:1px solid #eaeaea" class="active"><a href="?module=password"><i style="margin-right:3px" class="icon-lock"></i> Ubah Password</a></li>
                                      <li style="border-bottom:1px solid #eaeaea"><a data-toggle="modal" href="#logout"><i style="margin-right:3px" class="icon-signout"></i> Keluar</a></li>
                                  </ul>
                              </li>';
                        } else {
                            echo '  <li class="dropdown">
                                  <a data-toggle="dropdown" data-hover="dropdown" class=" pull-right dropdown-toggle" href="javascript:;">
                                      <i style="margin-right:3px" class="icon-user"></i>';
                        ?>
                            <?php echo $_SESSION['username'] . ' (' . $_SESSION['level'] . ')'; ?>
                        <?php
                            echo '
                                      <b class=" icon-angle-down"></b>
                                  </a>
                                  <ul class="dropdown-menu pull-right">
                                      <li style="border-bottom:1px solid #eaeaea"><a href="?module=password"><i style="margin-right:3px" class="icon-lock"></i> Ubah Password</a></li>
                                      <li style="border-bottom:1px solid #eaeaea"><a data-toggle="modal" href="#logout"><i style="margin-right:3px" class="icon-signout"></i> Keluar</a></li>
                                  </ul>
                              </li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </header>
        <!--header end-->

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">

                <!-- panggil file "content.php" untuk menampilkan halaman konten -->
                <?php include "content.php"; ?>

                <!-- Modal Logout -->
                <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><i class="icon-signout"></i> Keluar</h4>
                            </div>
                            <div class="modal-body">

                                Apakah Anda yakin ingin keluar?

                            </div>
                            <div class="modal-footer">
                                <a style="width:90px" href="logout.php" class="btn btn-danger" type="button">Ya, Keluar</a>
                                <button style="margin-left:10px;width:90px" data-dismiss="modal" class="btn btn-white" type="button"> Kembali</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal Logout end -->

            </section>
        </section>
        <!--main content end-->

        <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
                Copyright &copy; <?= date('Y') ?> YP Eben Haezer GKI Salatiga
                <a href="#" class="go-top">
                    <i class="icon-angle-up"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->
    </section>

    <!-- js -->

    <!--script for this page-->
    <script type="text/javascript" src="assets/js/form-component.js"></script>

    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.nicescroll.js"></script>

    <script type="text/javascript" src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>

    <script type="text/javascript" src="assets/js/hover-dropdown.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" language="javascript" src="assets/js/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/js/respond.min.js"></script>
    <!--common script for all pages-->
    <script type="text/javascript" src="assets/js/common-scripts.js"></script>

    <!--this page  script only-->
    <script type="text/javascript" src="assets/js/advanced-form-components.js"></script>

    <!--script for datatables -->
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#example').dataTable({
                "aaSorting": [
                    [0, "asc"]
                ],
            });
        });
    </script>

    <script type="text/javascript" src="assets/js/select2-3.5.4/select2.js"></script>
    <script>
        $(document).ready(function() {
            $("#status_pns").select2({
                placeholder: "-- Pilih Status PNS --"
            });

            $("#pangkat_golongan").select2({
                placeholder: "-- Pilih Pangkat/Golongan --"
            });

            $("#matapelajaran").select2({
                placeholder: "-- Pilih Mata Pelajaran --"
            });

            $("#jabatan_fungsional").select2({
                placeholder: "-- Pilih Jabatan Fungsional --"
            });

            $("#guru").select2({
                placeholder: "-- Pilih Guru --"
            });

            $("#guru_dinilai").select2({
                placeholder: "-- Pilih Guru --"
            });

            $("#guru_penilai").select2({
                placeholder: "-- Pilih Guru --"
            });

            $("#level").select2({
                placeholder: "-- Pilih Level --"
            });

            $("#sekolah").select2({
                placeholder: "-- Pilih Sekolah --"
            });

            $("#tahun_ajaran").select2({
                placeholder: "-- Pilih Tahun Ajaran --"
            });

            $("#periode").select2({
                placeholder: "-- Pilih Periode --"
            });

            $("#jenis_kelamin").select2({
                placeholder: "-- Pilih Jenis Kelamin --"
            });
        });
    </script>
</body>

</html>
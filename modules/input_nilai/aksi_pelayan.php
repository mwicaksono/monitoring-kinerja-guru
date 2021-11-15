<?php
error_reporting(0);     /* sembunyikan error untuk menampilkan pesan */
session_start();        /* memulai session */

/* panggil file untuk konfigurasi dan koneksi ke database */
include "../../includes/class_database.php";
include "../../includes/serverconfig.php";
include "../../includes/debug.php";
/* ------------------------------------------------------ */

/* fungsi untuk pengecekan status login user 
*  jika user belum login, alihkan ke halaman login dan tampilkan pesan = 2
*/
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    header("Location: ../../index.php?code=2");
}

/* jika user sudah login, maka jalankan perintah untuk update */ else {
    if ($_GET['mod'] == 'pelayan' && $_GET['act'] == 'nilai') {

        $date = gmdate("Y-m-d H:i:s", time() + 60 * 60 * 7);

        $total_skor = $_POST['ny1'] + $_POST['ny2'] + $_POST['ny3'] + $_POST['ny4'] + $_POST['ny5'] + $_POST['ny6'] + $_POST['ny7'] +
            $_POST['ny8'] + $_POST['ny9'] + $_POST['ny10'] + $_POST['ny11'] + $_POST['ny12'] + $_POST['ny13'] + $_POST['ny14'] + $_POST['ny15'] +
            $_POST['ny16'] + $_POST['ny17'] + $_POST['ny18'] + $_POST['ny19'] + $_POST['ny20'] + $_POST['ny21'] + $_POST['ny22'] + $_POST['ny23'] +
            $_POST['ny24'] + $_POST['ny25'] + $_POST['ny26'] + $_POST['ny27'] + $_POST['ny28'] + $_POST['ny29'] + $_POST['ny30'] + $_POST['ny31'];

        $persentase = ($total_skor / 155) * 100;

        $db->database_prepare("UPDATE pelayan SET 
        ny_indikator1 = ?,
        ny_indikator2 = ?,
        ny_indikator3 = ?,
        ny_indikator4 = ?,
        ny_indikator5 = ?,
        ny_indikator6 = ?,
        ny_indikator7 = ?,
        ny_indikator8 = ?,
        ny_indikator9 = ?,
        ny_indikator10 = ?,
        ny_indikator11 = ?,
        ny_indikator12 = ?,
        ny_indikator13 = ?,
        ny_indikator14 = ?,
        ny_indikator15 = ?,
        ny_indikator16 = ?,
        ny_indikator17 = ?,
        ny_indikator18 = ?,
        ny_indikator19 = ?,
        ny_indikator20 = ?,
        ny_indikator21 = ?,
        ny_indikator22 = ?,
        ny_indikator23 = ?,
        ny_indikator24 = ?,
        ny_indikator25 = ?,
        ny_indikator26 = ?,
        ny_indikator27 = ?,
        ny_indikator28 = ?,
        ny_indikator29 = ?,
        ny_indikator30 = ?,
        ny_indikator31 = ?,
        ny_total_skor = ?,
        ny_persentase = ?
        WHERE id_penilaian_pelayan = ?")
            ->execute(
                $_POST["ny1"],
                $_POST["ny2"],
                $_POST["ny3"],
                $_POST["ny4"],
                $_POST["ny5"],
                $_POST["ny6"],
                $_POST["ny7"],
                $_POST["ny8"],
                $_POST["ny9"],
                $_POST["ny10"],
                $_POST["ny11"],
                $_POST["ny12"],
                $_POST["ny13"],
                $_POST["ny14"],
                $_POST["ny15"],
                $_POST["ny16"],
                $_POST["ny17"],
                $_POST["ny18"],
                $_POST["ny19"],
                $_POST["ny20"],
                $_POST["ny21"],
                $_POST["ny22"],
                $_POST["ny23"],
                $_POST["ny24"],
                $_POST["ny25"],
                $_POST["ny26"],
                $_POST["ny27"],
                $_POST["ny28"],
                $_POST["ny29"],
                $_POST["ny30"],
                $_POST["ny31"],
                $total_skor,
                $persentase,
                $_POST["id"]
            );

        $db->database_prepare("UPDATE tbl_penilaian_internal SET tanggal_nilai = ?
                                                        WHERE id_nilai = ?")
            ->execute(
                $date,
                $_POST["id"]
            );

        header("Location: ../../dashboard.php?module=pelayan&code=1");
    }
}

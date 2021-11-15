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
    if ($_GET['mod'] == 'karakter' && $_GET['act'] == 'nilai') {

        $date = gmdate("Y-m-d H:i:s", time() + 60 * 60 * 7);

        $total_skor = $_POST['nt1'] + $_POST['nt2'] + $_POST['nt3'] + $_POST['nt4'] + $_POST['nt5'] + $_POST['nt6'] + $_POST['nt7'] +
            $_POST['nt8'] + $_POST['nt9'] + $_POST['nt10'] + $_POST['nt11'] + $_POST['nt12'] + $_POST['nt13'] + $_POST['nt14'] + $_POST['nt15'] +
            $_POST['nt16'] + $_POST['nt17'] + $_POST['nt18'] + $_POST['nt19'] + $_POST['nt20'] + $_POST['nt21'] + $_POST['nt22'] + $_POST['nt23'] +
            $_POST['nt24'] + $_POST['nt25'] + $_POST['nt26'] + $_POST['nt27'] + $_POST['nt28'] + $_POST['nt29'] + $_POST['nt30'] + $_POST['nt31'] +
            $_POST['nt32'] + $_POST['nt33'] + $_POST['nt34'] + $_POST['nt35'] + $_POST['nt36'] + $_POST['nt37'] + $_POST['nt38'];

        $persentase = ($total_skor / 190) * 100;

        $db->database_prepare("UPDATE karakter SET 
       nt_indikator1 = ?,
       nt_indikator2 = ?,
       nt_indikator3 = ?,
       nt_indikator4 = ?,
       nt_indikator5 = ?,
       nt_indikator6 = ?,
       nt_indikator7 = ?,
       nt_indikator8 = ?,
       nt_indikator9 = ?,
       nt_indikator10 = ?,
       nt_indikator11 = ?,
       nt_indikator12 = ?,
       nt_indikator13 = ?,
       nt_indikator14 = ?,
       nt_indikator15 = ?,
       nt_indikator16 = ?,
       nt_indikator17 = ?,
       nt_indikator18 = ?,
       nt_indikator19 = ?,
       nt_indikator20 = ?,
       nt_indikator21 = ?,
       nt_indikator22 = ?,
       nt_indikator23 = ?,
       nt_indikator24 = ?,
       nt_indikator25 = ?,
       nt_indikator26 = ?,
       nt_indikator27 = ?,
       nt_indikator28 = ?,
       nt_indikator29 = ?,
       nt_indikator30 = ?,
       nt_indikator31 = ?,
       nt_indikator32 = ?,
       nt_indikator33 = ?,
       nt_indikator34 = ?,
       nt_indikator35 = ?,
       nt_indikator36 = ?,
       nt_indikator37 = ?,
       nt_indikator38 = ?,
       nt_total_skor = ?,
       nt_persentase = ?
        WHERE id_penilaian_karakter = ?")
            ->execute(
                $_POST["nt1"],
                $_POST["nt2"],
                $_POST["nt3"],
                $_POST["nt4"],
                $_POST["nt5"],
                $_POST["nt6"],
                $_POST["nt7"],
                $_POST["nt8"],
                $_POST["nt9"],
                $_POST["nt10"],
                $_POST["nt11"],
                $_POST["nt12"],
                $_POST["nt13"],
                $_POST["nt14"],
                $_POST["nt15"],
                $_POST["nt16"],
                $_POST["nt17"],
                $_POST["nt18"],
                $_POST["nt19"],
                $_POST["nt20"],
                $_POST["nt21"],
                $_POST["nt22"],
                $_POST["nt23"],
                $_POST["nt24"],
                $_POST["nt25"],
                $_POST["nt26"],
                $_POST["nt27"],
                $_POST["nt28"],
                $_POST["nt29"],
                $_POST["nt30"],
                $_POST["nt31"],
                $_POST["nt32"],
                $_POST["nt33"],
                $_POST["nt34"],
                $_POST["nt35"],
                $_POST["nt36"],
                $_POST["nt37"],
                $_POST["nt38"],
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

        header("Location: ../../dashboard.php?module=karakter&code=1");
    }
}

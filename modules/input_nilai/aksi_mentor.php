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
    if ($_GET['mod'] == 'mentor' && $_GET['act'] == 'nilai') {

        $date = gmdate("Y-m-d H:i:s", time() + 60 * 60 * 7);

        $total_skor = $_POST['nm1'] + $_POST['nm2'] + $_POST['nm3'] + $_POST['nm4'] + $_POST['nm5'] + $_POST['nm6'] + $_POST['nm7'] +
            $_POST['nm8'] + $_POST['nm9'] + $_POST['nm10'] + $_POST['nm11'] + $_POST['nm12'] + $_POST['nm13'] + $_POST['nm14'] + $_POST['nm15'] +
            $_POST['nm16'] + $_POST['nm17'] + $_POST['nm18'] + $_POST['nm19'] + $_POST['nm20'] + $_POST['nm21'] + $_POST['nm22'] + $_POST['nm23'];

        $persentase = ($total_skor / 115) * 100;

        $db->database_prepare("UPDATE mentor SET 
        nm_indikator1 = ?,
        nm_indikator2 = ?,
        nm_indikator3 = ?,
        nm_indikator4 = ?,
        nm_indikator5 = ?,
        nm_indikator6 = ?,
        nm_indikator7 = ?,
        nm_indikator8 = ?,
        nm_indikator9 = ?,
        nm_indikator10 = ?,
        nm_indikator11 = ?,
        nm_indikator12 = ?,
        nm_indikator13 = ?,
        nm_indikator14 = ?,
        nm_indikator15 = ?,
        nm_indikator16 = ?,
        nm_indikator17 = ?,
        nm_indikator18 = ?,
        nm_indikator19 = ?,
        nm_indikator20 = ?,
        nm_indikator21 = ?,
        nm_indikator22 = ?,
        nm_indikator23 = ?,
        nm_total_skor = ?,
        nm_persentase = ?
        WHERE id_penilaian_mentor = ?")
            ->execute(
                $_POST["nm1"],
                $_POST["nm2"],
                $_POST["nm3"],
                $_POST["nm4"],
                $_POST["nm5"],
                $_POST["nm6"],
                $_POST["nm7"],
                $_POST["nm8"],
                $_POST["nm9"],
                $_POST["nm10"],
                $_POST["nm11"],
                $_POST["nm12"],
                $_POST["nm13"],
                $_POST["nm14"],
                $_POST["nm15"],
                $_POST["nm16"],
                $_POST["nm17"],
                $_POST["nm18"],
                $_POST["nm19"],
                $_POST["nm20"],
                $_POST["nm21"],
                $_POST["nm22"],
                $_POST["nm23"],
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

        header("Location: ../../dashboard.php?module=mentor&code=1");
    }
}

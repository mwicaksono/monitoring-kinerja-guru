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
    if ($_GET['mod'] == 'spiritual' && $_GET['act'] == 'nilai') {

        $date = gmdate("Y-m-d H:i:s", time() + 60 * 60 * 7);

        $total_skor = $_POST['nr1'] + $_POST['nr2'] + $_POST['nr3'] + $_POST['nr4'] + $_POST['nr5'] + $_POST['nr6'] + $_POST['nr7'] +
            $_POST['nr8'] + $_POST['nr9'] + $_POST['nr10'] + $_POST['nr11'] + $_POST['nr12'] + $_POST['nr13'] + $_POST['nr14'] + $_POST['nr15'] + $_POST['nr16'];

        $persentase = ($total_skor / 80) * 100;

        $db->database_prepare("UPDATE spiritual SET 
        nr_indikator1 = ?,
        nr_indikator2 = ?,
        nr_indikator3 = ?,
        nr_indikator4 = ?,
        nr_indikator5 = ?,
        nr_indikator6 = ?,
        nr_indikator7 = ?,
        nr_indikator8 = ?,
        nr_indikator9 = ?,
        nr_indikator10 = ?,
        nr_indikator11 = ?,
        nr_indikator12 = ?,
        nr_indikator13 = ?,
        nr_indikator14 = ?,
        nr_indikator15 = ?,
        nr_indikator16 = ?,
        nr_total_skor = ?,
        nr_persentase = ?
        WHERE id_penilaian_spiritual = ?")
            ->execute(
                $_POST["nr1"],
                $_POST["nr2"],
                $_POST["nr3"],
                $_POST["nr4"],
                $_POST["nr5"],
                $_POST["nr6"],
                $_POST["nr7"],
                $_POST["nr8"],
                $_POST["nr9"],
                $_POST["nr10"],
                $_POST["nr11"],
                $_POST["nr12"],
                $_POST["nr13"],
                $_POST["nr14"],
                $_POST["nr15"],
                $_POST["nr16"],
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

        header("Location: ../../dashboard.php?module=spiritual&code=1");
    }
}

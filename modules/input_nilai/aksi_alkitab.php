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
    if ($_GET['mod'] == 'alkitab' && $_GET['act'] == 'nilai') {

        $date = gmdate("Y-m-d H:i:s", time() + 60 * 60 * 7);

        $total_skor = $_POST['nk1'] + $_POST['nk2'] + $_POST['nk3'] + $_POST['nk4'] + $_POST['nk5'] + $_POST['nk6'] + $_POST['nk7'] +
            $_POST['nk8'] + $_POST['nk9'];

        $persentase = ($total_skor / 45) * 100;

        $db->database_prepare("UPDATE alkitab SET 
        nk_indikator1 = ?,
        nk_indikator2 = ?,
        nk_indikator3 = ?,
        nk_indikator4 = ?,
        nk_indikator5 = ?,
        nk_indikator6 = ?,
        nk_indikator7 = ?,
        nk_indikator8 = ?,
        nk_indikator9 = ?,
        nk_total_skor = ?,
        nk_persentase = ?
        WHERE id_penilaian_alkitab = ?")
            ->execute(
                $_POST["nk1"],
                $_POST["nk2"],
                $_POST["nk3"],
                $_POST["nk4"],
                $_POST["nk5"],
                $_POST["nk6"],
                $_POST["nk7"],
                $_POST["nk8"],
                $_POST["nk9"],
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

        header("Location: ../../dashboard.php?module=alkitab&code=1");
    }
}

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
    if ($_GET['mod'] == 'akademik' && $_GET['act'] == 'nilai') {

        $date = gmdate("Y-m-d H:i:s", time() + 60 * 60 * 7);

        $total_skor = $_POST['na1'] + $_POST['na2'] + $_POST['na3'] + $_POST['na4'] + $_POST['na5'] + $_POST['na6'] + $_POST['na7'] +
            $_POST['na8'] + $_POST['na9'] + $_POST['na10'] + $_POST['na11'] + $_POST['na12'] + $_POST['na13'] + $_POST['na14'];

        $persentase = ($total_skor / 70) * 100;

        $db->database_prepare("UPDATE akademik SET 
        na_indikator1 = ?,
        na_indikator2 = ?,
        na_indikator3 = ?,
        na_indikator4 = ?,
        na_indikator5 = ?,
        na_indikator6 = ?,
        na_indikator7 = ?,
        na_indikator8 = ?,
        na_indikator9 = ?,
        na_indikator10 = ?,
        na_indikator11 = ?,
        na_indikator12 = ?,
        na_indikator13 = ?,
        na_indikator14 = ?,
        na_total_skor = ?,
        na_persentase = ?
        WHERE id_penilaian_akademik = ?")
            ->execute(
                $_POST["na1"],
                $_POST["na2"],
                $_POST["na3"],
                $_POST["na4"],
                $_POST["na5"],
                $_POST["na6"],
                $_POST["na7"],
                $_POST["na8"],
                $_POST["na9"],
                $_POST["na10"],
                $_POST["na11"],
                $_POST["na12"],
                $_POST["na13"],
                $_POST["na14"],
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

        header("Location: ../../dashboard.php?module=akademik&code=1");
    }
}

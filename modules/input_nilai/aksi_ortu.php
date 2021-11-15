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
    if ($_GET['mod'] == 'ortu' && $_GET['act'] == 'nilai') {

        $date = gmdate("Y-m-d H:i:s", time() + 60 * 60 * 7);

        $total_skor = $_POST['no1'] + $_POST['no2'] + $_POST['no3'] + $_POST['no4'] + $_POST['no5'] + $_POST['no6'] + $_POST['no7'] +
            $_POST['no8'];

        $persentase = ($total_skor / 40) * 100;

        $db->database_prepare("UPDATE ortu SET 
        no_indikator1 = ?,
        no_indikator2 = ?,
        no_indikator3 = ?,
        no_indikator4 = ?,
        no_indikator5 = ?,
        no_indikator6 = ?,
        no_indikator7 = ?,
        no_indikator8 = ?,
        no_total_skor = ?,
        no_persentase = ?
        WHERE id_penilaian_ortu = ?")
            ->execute(
                $_POST["no1"],
                $_POST["no2"],
                $_POST["no3"],
                $_POST["no4"],
                $_POST["no5"],
                $_POST["no6"],
                $_POST["no7"],
                $_POST["no8"],
                $total_skor,
                $persentase,
                $_POST["id"]
            );

        $db->database_prepare("UPDATE tbl_penilaian_ortu SET tanggal_nilai = ?
                                                        WHERE id_nilai = ?")
            ->execute(
                $date,
                $_POST["id"]
            );

        header("Location: ../../dashboard.php?module=ortu&code=1");
    }
}

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

/* jika user sudah login, maka jalankan perintah untuk update */
else{
    if ($_GET['mod'] == 'k1' && $_GET['act'] == 'nilai') {

        $date = gmdate("Y-m-d H:i:s", time()+60*60*7);

        $total_skor = $_POST['nk1'] + $_POST['nk2'] + $_POST['nk3'] + $_POST['nk4'] + $_POST['nk5'];

        $persentase = ($total_skor / 10) * 100;
        
        if ($persentase <= 25) {
            $nilai_kompetensi = '1';
        } elseif ($persentase > 25 && $persentase <= 50) {
            $nilai_kompetensi = '2';
        } elseif ($persentase > 50 && $persentase <= 75) {
            $nilai_kompetensi = '3';
        } elseif ($persentase > 75 && $persentase <= 100) {
            $nilai_kompetensi = '4';
        }
        

        $db->database_prepare("UPDATE kepribadian1 SET  ak1_point1 = ?,
                                                        ak1_point2 = ?,
                                                        ak1_point3 = ?,
                                                        ak1_point4 = ?,
                                                        ak1_point5 = ?,
                                                        ak1_point6 = ?,
                                                        ak1_point7 = ?,
                                                        ak1_point8 = ?,
                                                        nk1_indikator1 = ?,
                                                        nk1_indikator2 = ?,
                                                        nk1_indikator3 = ?,
                                                        nk1_indikator4 = ?,
                                                        nk1_indikator5 = ?,
                                                        nk1_total_skor = ?,
                                                        nk1_persentase = ?,
                                                        nk1_nilai_kompetensi = ?
                                                        WHERE id_kepribadian1 = ?")
                                            ->execute(  $_POST["ak1"],
                                                        $_POST["ak2"],
                                                        $_POST["ak3"],
                                                        $_POST["ak4"],
                                                        $_POST["ak5"],
                                                        $_POST["ak6"],
                                                        $_POST["ak7"],
                                                        $_POST["ak8"],
                                                        $_POST["nk1"],
                                                        $_POST["nk2"],
                                                        $_POST["nk3"],
                                                        $_POST["nk4"],
                                                        $_POST["nk5"],
                                                        $total_skor,
                                                        $persentase,
                                                        $nilai_kompetensi,
                                                        $_POST["id"]);
        
        $db->database_prepare("UPDATE tbl_penilaian SET tanggal_nilai = ?
                                                        WHERE id_nilai = ?")
                                            ->execute(  $date,
                                                        $_POST["id"]);

        header("Location: ../../dashboard.php?module=k1&code=1");
    }
}
?>
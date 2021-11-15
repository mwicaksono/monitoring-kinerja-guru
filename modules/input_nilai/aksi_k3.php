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
    if ($_GET['mod'] == 'k3' && $_GET['act'] == 'nilai') {

        $date = gmdate("Y-m-d H:i:s", time()+60*60*7);

        $total_skor = $_POST['nk1'] + $_POST['nk2'] + $_POST['nk3'] + $_POST['nk4'] + $_POST['nk5'] + $_POST['nk6'] + $_POST['nk7'] + $_POST['nk8'];

        $persentase = ($total_skor / 16) * 100;
        
        if ($persentase <= 25) {
            $nilai_kompetensi = '1';
        } elseif ($persentase > 25 && $persentase <= 50) {
            $nilai_kompetensi = '2';
        } elseif ($persentase > 50 && $persentase <= 75) {
            $nilai_kompetensi = '3';
        } elseif ($persentase > 75 && $persentase <= 100) {
            $nilai_kompetensi = '4';
        }
        

        $db->database_prepare("UPDATE kepribadian3 SET  ak3_point1 = ?,
                                                        ak3_point2 = ?,
                                                        ak3_point3 = ?,
                                                        ak3_point4 = ?,
                                                        ak3_point5 = ?,
                                                        ak3_point6 = ?,
                                                        ak3_point7 = ?,
                                                        ak3_point8 = ?,
                                                        ak3_point9 = ?,
                                                        ak3_point10 = ?,
                                                        ak3_point11 = ?,
                                                        nk3_indikator1 = ?,
                                                        nk3_indikator2 = ?,
                                                        nk3_indikator3 = ?,
                                                        nk3_indikator4 = ?,
                                                        nk3_indikator5 = ?,
                                                        nk3_indikator6 = ?,
                                                        nk3_indikator7 = ?,
                                                        nk3_indikator8 = ?,
                                                        nk3_total_skor = ?,
                                                        nk3_persentase = ?,
                                                        nk3_nilai_kompetensi = ?
                                                        WHERE id_kepribadian3 = ?")
                                            ->execute(  $_POST["ak1"],
                                                        $_POST["ak2"],
                                                        $_POST["ak3"],
                                                        $_POST["ak4"],
                                                        $_POST["ak5"],
                                                        $_POST["ak6"],
                                                        $_POST["ak7"],
                                                        $_POST["ak8"],
                                                        $_POST["ak9"],
                                                        $_POST["ak10"],
                                                        $_POST["ak11"],
                                                        $_POST["nk1"],
                                                        $_POST["nk2"],
                                                        $_POST["nk3"],
                                                        $_POST["nk4"],
                                                        $_POST["nk5"],
                                                        $_POST["nk6"],
                                                        $_POST["nk7"],
                                                        $_POST["nk8"],
                                                        $total_skor,
                                                        $persentase,
                                                        $nilai_kompetensi,
                                                        $_POST["id"]);
        
        $db->database_prepare("UPDATE tbl_penilaian SET tanggal_nilai = ?
                                                        WHERE id_nilai = ?")
                                            ->execute(  $date,
                                                        $_POST["id"]);

        header("Location: ../../dashboard.php?module=k3&code=1");
    }
}
?>
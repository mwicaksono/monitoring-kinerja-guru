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
    if ($_GET['mod'] == 'k2' && $_GET['act'] == 'nilai') {

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
        

        $db->database_prepare("UPDATE kepribadian2 SET  ak2_point1 = ?,
                                                        ak2_point2 = ?,
                                                        ak2_point3 = ?,
                                                        ak2_point4 = ?,
                                                        ak2_point5 = ?,
                                                        ak2_point6 = ?,
                                                        ak2_point7 = ?,
                                                        ak2_point8 = ?,
                                                        ak2_point9 = ?,
                                                        nk2_indikator1 = ?,
                                                        nk2_indikator2 = ?,
                                                        nk2_indikator3 = ?,
                                                        nk2_indikator4 = ?,
                                                        nk2_indikator5 = ?,
                                                        nk2_total_skor = ?,
                                                        nk2_persentase = ?,
                                                        nk2_nilai_kompetensi = ?
                                                        WHERE id_kepribadian2 = ?")
                                            ->execute(  $_POST["ak1"],
                                                        $_POST["ak2"],
                                                        $_POST["ak3"],
                                                        $_POST["ak4"],
                                                        $_POST["ak5"],
                                                        $_POST["ak6"],
                                                        $_POST["ak7"],
                                                        $_POST["ak8"],
                                                        $_POST["ak9"],
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

        header("Location: ../../dashboard.php?module=k2&code=1");
    }
}
?>
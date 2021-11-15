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
    if ($_GET['mod'] == 'p1' && $_GET['act'] == 'nilai') {

        $date = gmdate("Y-m-d H:i:s", time()+60*60*7);

        $total_skor = $_POST['np1'] + $_POST['np2'] + $_POST['np3'] + $_POST['np4'] + $_POST['np5'] + $_POST['np6'];

        $persentase = ($total_skor / 12) * 100;
        
        if ($persentase <= 25) {
            $nilai_kompetensi = '1';
        } elseif ($persentase > 25 && $persentase <= 50) {
            $nilai_kompetensi = '2';
        } elseif ($persentase > 50 && $persentase <= 75) {
            $nilai_kompetensi = '3';
        } elseif ($persentase > 75 && $persentase <= 100) {
            $nilai_kompetensi = '4';
        }
        

        $db->database_prepare("UPDATE pedagogik1 SET    ap1_point1 = ?,
                                                        ap1_point2 = ?,
                                                        ap1_point3 = ?,
                                                        ap1_point4 = ?,
                                                        ap1_point5 = ?,
                                                        ap1_point6 = ?,
                                                        ap1_point7 = ?,
                                                        ap1_point8 = ?,
                                                        ap1_point9 = ?,
                                                        ap1_point10 = ?,
                                                        ap1_point11 = ?,
                                                        ap1_point12 = ?,
                                                        ap1_point13 = ?,
                                                        ap1_point14 = ?,
                                                        ap1_point15 = ?,
                                                        ap1_point16 = ?,
                                                        ap1_point17 = ?,
                                                        np1_indikator1 = ?,
                                                        np1_indikator2 = ?,
                                                        np1_indikator3 = ?,
                                                        np1_indikator4 = ?,
                                                        np1_indikator5 = ?,
                                                        np1_indikator6 = ?,
                                                        np1_total_skor = ?,
                                                        np1_persentase = ?,
                                                        np1_nilai_kompetensi = ?
                                                        WHERE id_pedagogik1 = ?")
                                            ->execute(  $_POST["ap1"],
                                                        $_POST["ap2"],
                                                        $_POST["ap3"],
                                                        $_POST["ap4"],
                                                        $_POST["ap5"],
                                                        $_POST["ap6"],
                                                        $_POST["ap7"],
                                                        $_POST["ap8"],
                                                        $_POST["ap9"],
                                                        $_POST["ap10"],
                                                        $_POST["ap11"],
                                                        $_POST["ap12"],
                                                        $_POST["ap13"],
                                                        $_POST["ap14"],
                                                        $_POST["ap15"],
                                                        $_POST["ap16"],
                                                        $_POST["ap17"],
                                                        $_POST["np1"],
                                                        $_POST["np2"],
                                                        $_POST["np3"],
                                                        $_POST["np4"],
                                                        $_POST["np5"],
                                                        $_POST["np6"],
                                                        $total_skor,
                                                        $persentase,
                                                        $nilai_kompetensi,
                                                        $_POST["id"]);
        
        $db->database_prepare("UPDATE tbl_penilaian SET tanggal_nilai = ?
                                                        WHERE id_nilai = ?")
                                            ->execute(  $date,
                                                        $_POST["id"]);

        header("Location: ../../dashboard.php?module=p1&code=1");
    }
}
?>
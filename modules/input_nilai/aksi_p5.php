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
    if ($_GET['mod'] == 'p5' && $_GET['act'] == 'nilai') {

        $date = gmdate("Y-m-d H:i:s", time()+60*60*7);

        $total_skor = $_POST['np1'] + $_POST['np2'] + $_POST['np3'] + $_POST['np4'] + $_POST['np5'] + $_POST['np6'] + $_POST['np7'];

        $persentase = ($total_skor / 14) * 100;
        
        if ($persentase <= 25) {
            $nilai_kompetensi = '1';
        } elseif ($persentase > 25 && $persentase <= 50) {
            $nilai_kompetensi = '2';
        } elseif ($persentase > 50 && $persentase <= 75) {
            $nilai_kompetensi = '3';
        } elseif ($persentase > 75 && $persentase <= 100) {
            $nilai_kompetensi = '4';
        }
        

        $db->database_prepare("UPDATE pedagogik5 SET    ap5_point1 = ?,
                                                        ap5_point2 = ?,
                                                        ap5_point3 = ?,
                                                        ap5_point4 = ?,
                                                        ap5_point5 = ?,
                                                        ap5_point6 = ?,
                                                        ap5_point7 = ?,
                                                        ap5_point8 = ?,
                                                        ap5_point9 = ?,
                                                        ap5_point10 = ?,
                                                        ap5_point11 = ?,
                                                        ap5_point12 = ?,
                                                        ap5_point13 = ?,
                                                        ap5_point14 = ?,
                                                        ap5_point15 = ?,
                                                        ap5_point16 = ?,
                                                        ap5_point17 = ?,
                                                        ap5_point18 = ?,
                                                        ap5_point19 = ?,
                                                        ap5_point20 = ?,
                                                        ap5_point21 = ?,
                                                        ap5_point22 = ?,
                                                        ap5_point23 = ?,
                                                        np5_indikator1 = ?,
                                                        np5_indikator2 = ?,
                                                        np5_indikator3 = ?,
                                                        np5_indikator4 = ?,
                                                        np5_indikator5 = ?,
                                                        np5_indikator6 = ?,
                                                        np5_indikator7 = ?,
                                                        np5_total_skor = ?,
                                                        np5_persentase = ?,
                                                        np5_nilai_kompetensi = ?
                                                        WHERE id_pedagogik5 = ?")
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
                                                        $_POST["ap18"],
                                                        $_POST["ap19"],
                                                        $_POST["ap20"],
                                                        $_POST["ap21"],
                                                        $_POST["ap22"],
                                                        $_POST["ap23"],
                                                        $_POST["np1"],
                                                        $_POST["np2"],
                                                        $_POST["np3"],
                                                        $_POST["np4"],
                                                        $_POST["np5"],
                                                        $_POST["np6"],
                                                        $_POST["np7"],
                                                        $total_skor,
                                                        $persentase,
                                                        $nilai_kompetensi,
                                                        $_POST["id"]);
        
        $db->database_prepare("UPDATE tbl_penilaian SET tanggal_nilai = ?
                                                        WHERE id_nilai = ?")
                                            ->execute(  $date,
                                                        $_POST["id"]);

        header("Location: ../../dashboard.php?module=p5&code=1");
    }
}
?>
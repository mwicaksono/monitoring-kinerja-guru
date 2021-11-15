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
    if ($_GET['mod'] == 'p4' && $_GET['act'] == 'nilai') {

        $date = gmdate("Y-m-d H:i:s", time()+60*60*7);

        $total_skor = $_POST['np1'] + $_POST['np2'] + $_POST['np3'] + $_POST['np4'] + $_POST['np5'] + $_POST['np6'] + $_POST['np7'] + $_POST['np8'] + $_POST['np9'] + $_POST['np10'] + $_POST['np11'];

        $persentase = ($total_skor / 22) * 100;
        
        if ($persentase <= 25) {
            $nilai_kompetensi = '1';
        } elseif ($persentase > 25 && $persentase <= 50) {
            $nilai_kompetensi = '2';
        } elseif ($persentase > 50 && $persentase <= 75) {
            $nilai_kompetensi = '3';
        } elseif ($persentase > 75 && $persentase <= 100) {
            $nilai_kompetensi = '4';
        }
        

        $db->database_prepare("UPDATE pedagogik4 SET    ap4_point1 = ?,
                                                        ap4_point2 = ?,
                                                        ap4_point3 = ?,
                                                        ap4_point4 = ?,
                                                        ap4_point5 = ?,
                                                        ap4_point6 = ?,
                                                        ap4_point7 = ?,
                                                        ap4_point8 = ?,
                                                        ap4_point9 = ?,
                                                        ap4_point10 = ?,
                                                        ap4_point11 = ?,
                                                        ap4_point12 = ?,
                                                        ap4_point13 = ?,
                                                        ap4_point14 = ?,
                                                        ap4_point15 = ?,
                                                        ap4_point16 = ?,
                                                        ap4_point17 = ?,
                                                        ap4_point18 = ?,
                                                        ap4_point19 = ?,
                                                        ap4_point20 = ?,
                                                        ap4_point21 = ?,
                                                        ap4_point22 = ?,
                                                        ap4_point23 = ?,
                                                        ap4_point24 = ?,
                                                        ap4_point25 = ?,
                                                        ap4_point26 = ?,
                                                        np4_indikator1 = ?,
                                                        np4_indikator2 = ?,
                                                        np4_indikator3 = ?,
                                                        np4_indikator4 = ?,
                                                        np4_indikator5 = ?,
                                                        np4_indikator6 = ?,
                                                        np4_indikator7 = ?,
                                                        np4_indikator8 = ?,
                                                        np4_indikator9 = ?,
                                                        np4_indikator10 = ?,
                                                        np4_indikator11 = ?,
                                                        np4_total_skor = ?,
                                                        np4_persentase = ?,
                                                        np4_nilai_kompetensi = ?
                                                        WHERE id_pedagogik4 = ?")
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
                                                        $_POST["ap24"],
                                                        $_POST["ap25"],
                                                        $_POST["ap26"],
                                                        $_POST["np1"],
                                                        $_POST["np2"],
                                                        $_POST["np3"],
                                                        $_POST["np4"],
                                                        $_POST["np5"],
                                                        $_POST["np6"],
                                                        $_POST["np7"],
                                                        $_POST["np8"],
                                                        $_POST["np9"],
                                                        $_POST["np10"],
                                                        $_POST["np11"],
                                                        $total_skor,
                                                        $persentase,
                                                        $nilai_kompetensi,
                                                        $_POST["id"]);
        
        $db->database_prepare("UPDATE tbl_penilaian SET tanggal_nilai = ?
                                                        WHERE id_nilai = ?")
                                            ->execute(  $date,
                                                        $_POST["id"]);

        header("Location: ../../dashboard.php?module=p4&code=1");
    }
}
?>
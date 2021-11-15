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
    if ($_GET['mod'] == 'pf2' && $_GET['act'] == 'nilai') {

        $date = gmdate("Y-m-d H:i:s", time()+60*60*7);

        $total_skor = $_POST['npf1'] + $_POST['npf2'] + $_POST['npf3'] + $_POST['npf4'] + $_POST['npf5'] + $_POST['npf6'];

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
        

        $db->database_prepare("UPDATE profesional2 SET  apf2_point1 = ?,
                                                        apf2_point2 = ?,
                                                        apf2_point3 = ?,
                                                        apf2_point4 = ?,
                                                        apf2_point5 = ?,
                                                        apf2_point6 = ?,
                                                        npf2_indikator1 = ?,
                                                        npf2_indikator2 = ?,
                                                        npf2_indikator3 = ?,
                                                        npf2_indikator4 = ?,
                                                        npf2_indikator5 = ?,
                                                        npf2_indikator6 = ?,
                                                        npf2_total_skor = ?,
                                                        npf2_persentase = ?,
                                                        npf2_nilai_kompetensi = ?
                                                        WHERE id_profesional2 = ?")
                                            ->execute(  $_POST["apf1"],
                                                        $_POST["apf2"],
                                                        $_POST["apf3"],
                                                        $_POST["apf4"],
                                                        $_POST["apf5"],
                                                        $_POST["apf6"],
                                                        $_POST["npf1"],
                                                        $_POST["npf2"],
                                                        $_POST["npf3"],
                                                        $_POST["npf4"],
                                                        $_POST["npf5"],
                                                        $_POST["npf6"],
                                                        $total_skor,
                                                        $persentase,
                                                        $nilai_kompetensi,
                                                        $_POST["id"]);
        
        $db->database_prepare("UPDATE tbl_penilaian SET tanggal_nilai = ?
                                                        WHERE id_nilai = ?")
                                            ->execute(  $date,
                                                        $_POST["id"]);

        header("Location: ../../dashboard.php?module=pf2&code=1");
    }
}
?>
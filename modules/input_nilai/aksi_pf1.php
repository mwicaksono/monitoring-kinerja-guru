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
    if ($_GET['mod'] == 'pf1' && $_GET['act'] == 'nilai') {

        $date = gmdate("Y-m-d H:i:s", time()+60*60*7);

        $total_skor = $_POST['npf1'] + $_POST['npf2'] + $_POST['npf3'];

        $persentase = ($total_skor / 6) * 100;
        
        if ($persentase <= 25) {
            $nilai_kompetensi = '1';
        } elseif ($persentase > 25 && $persentase <= 50) {
            $nilai_kompetensi = '2';
        } elseif ($persentase > 50 && $persentase <= 75) {
            $nilai_kompetensi = '3';
        } elseif ($persentase > 75 && $persentase <= 100) {
            $nilai_kompetensi = '4';
        }
        

        $db->database_prepare("UPDATE profesional1 SET  apf1_point1 = ?,
                                                        apf1_point2 = ?,
                                                        apf1_point3 = ?,
                                                        apf1_point4 = ?,
                                                        apf1_point5 = ?,
                                                        apf1_point6 = ?,
                                                        apf1_point7 = ?,
                                                        apf1_point8 = ?,
                                                        apf1_point9 = ?,
                                                        apf1_point10 = ?,
                                                        npf1_indikator1 = ?,
                                                        npf1_indikator2 = ?,
                                                        npf1_indikator3 = ?,
                                                        npf1_total_skor = ?,
                                                        npf1_persentase = ?,
                                                        npf1_nilai_kompetensi = ?
                                                        WHERE id_profesional1 = ?")
                                            ->execute(  $_POST["apf1"],
                                                        $_POST["apf2"],
                                                        $_POST["apf3"],
                                                        $_POST["apf4"],
                                                        $_POST["apf5"],
                                                        $_POST["apf6"],
                                                        $_POST["apf7"],
                                                        $_POST["apf8"],
                                                        $_POST["apf9"],
                                                        $_POST["apf10"],
                                                        $_POST["npf1"],
                                                        $_POST["npf2"],
                                                        $_POST["npf3"],
                                                        $total_skor,
                                                        $persentase,
                                                        $nilai_kompetensi,
                                                        $_POST["id"]);
        
        $db->database_prepare("UPDATE tbl_penilaian SET tanggal_nilai = ?
                                                        WHERE id_nilai = ?")
                                            ->execute(  $date,
                                                        $_POST["id"]);

        header("Location: ../../dashboard.php?module=pf1&code=1");
    }
}
?>
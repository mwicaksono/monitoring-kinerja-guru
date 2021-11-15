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
    if ($_GET['mod'] == 's2' && $_GET['act'] == 'nilai') {

        $date = gmdate("Y-m-d H:i:s", time()+60*60*7);

        $total_skor = $_POST['ns1'] + $_POST['ns2'] + $_POST['ns3'];

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
        

        $db->database_prepare("UPDATE sosial2 SET   as2_point1 = ?,
                                                    as2_point2 = ?,
                                                    as2_point3 = ?,
                                                    ns2_indikator1 = ?,
                                                    ns2_indikator2 = ?,
                                                    ns2_indikator3 = ?,
                                                    ns2_total_skor = ?,
                                                    ns2_persentase = ?,
                                                    ns2_nilai_kompetensi = ?
                                                    WHERE id_sosial2 = ?")
                                        ->execute(  $_POST["as1"],
                                                    $_POST["as2"],
                                                    $_POST["as3"],
                                                    $_POST["ns1"],
                                                    $_POST["ns2"],
                                                    $_POST["ns3"],
                                                    $total_skor,
                                                    $persentase,
                                                    $nilai_kompetensi,
                                                    $_POST["id"]);
        
        $db->database_prepare("UPDATE tbl_penilaian SET tanggal_nilai = ?
                                                        WHERE id_nilai = ?")
                                            ->execute(  $date,
                                                        $_POST["id"]);

        header("Location: ../../dashboard.php?module=s2&code=1");
    }
}
?>
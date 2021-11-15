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
    if ($_GET['mod'] == 's1' && $_GET['act'] == 'nilai') {

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
        

        $db->database_prepare("UPDATE sosial1 SET   as1_point1 = ?,
                                                    as1_point2 = ?,
                                                    as1_point3 = ?,
                                                    as1_point4 = ?,
                                                    as1_point5 = ?,
                                                    as1_point6 = ?,
                                                    as1_point7 = ?,
                                                    as1_point8 = ?,
                                                    ns1_indikator1 = ?,
                                                    ns1_indikator2 = ?,
                                                    ns1_indikator3 = ?,
                                                    ns1_total_skor = ?,
                                                    ns1_persentase = ?,
                                                    ns1_nilai_kompetensi = ?
                                                    WHERE id_sosial1 = ?")
                                        ->execute(  $_POST["as1"],
                                                    $_POST["as2"],
                                                    $_POST["as3"],
                                                    $_POST["as4"],
                                                    $_POST["as5"],
                                                    $_POST["as6"],
                                                    $_POST["as7"],
                                                    $_POST["as8"],
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

        header("Location: ../../dashboard.php?module=s1&code=1");
    }
}
?>
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
    if ($_GET['mod'] == 'hasil_nilai' && $_GET['act'] == 'selesai') {

        $date = gmdate("Y-m-d H:i:s", time()+60*60*7);

        $db->database_prepare("UPDATE tbl_penilaian SET tanggal_nilai = ?,
                                                        jumlah_nilai = ?,
                                                        nilai_pkg = ?,
                                                        angka_kredit = ?
                                                        WHERE id_nilai = ?")
                                            ->execute(  $date,
                                                        $_GET['jml'],
                                                        $_GET['n'],
                                                        $_GET['ak'],
                                                        $_GET["id"]);

        header("Location: ../../dashboard.php?module=hasil_nilai&code=1");
    }
}
?>
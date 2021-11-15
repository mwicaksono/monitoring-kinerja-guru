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

/* jika user sudah login, maka jalankan perintah untuk update */ else {
    if ($_GET['mod'] == 'siswa' && $_GET['act'] == 'nilai') {

        $date = gmdate("Y-m-d H:i:s", time() + 60 * 60 * 7);

        $total_skor = $_POST['ns1'] + $_POST['ns2'] + $_POST['ns3'] + $_POST['ns4'] + $_POST['ns5'] + $_POST['ns6'] + $_POST['ns7'] +
            $_POST['ns8'] + $_POST['ns9'] + $_POST['ns10'] + $_POST['ns11'] + $_POST['ns12'] + $_POST['ns13'] + $_POST['ns14'] +
            $_POST['ns15'] + $_POST['ns16'] + $_POST['ns17'] + $_POST['ns18'] + $_POST['ns19'] + $_POST['ns20'] + $_POST['ns21'] +
            $_POST['ns22'] + $_POST['ns23'] + $_POST['ns24'] + $_POST['ns25'] + $_POST['ns26'] + $_POST['ns27'] + $_POST['ns28'] +
            $_POST['ns29'] + $_POST['ns30'] + $_POST['ns31'] + $_POST['ns32'] + $_POST['ns33'] + $_POST['ns34'] + $_POST['ns35'] +
            $_POST['ns36'] + $_POST['ns37'] + $_POST['ns38'] + $_POST['ns39'];

        $persentase = ($total_skor / 195) * 100;

        $db->database_prepare("UPDATE siswa SET 
        ns_indikator1 = ?,
        ns_indikator2 = ?,
        ns_indikator3 = ?,
        ns_indikator4 = ?,
        ns_indikator5 = ?,
        ns_indikator6 = ?,
        ns_indikator7 = ?,
        ns_indikator8 = ?,
        ns_indikator9 = ?,
        ns_indikator10 = ?,
        ns_indikator11 = ?,
        ns_indikator12 = ?,
        ns_indikator13 = ?,
        ns_indikator14 = ?,
        ns_indikator15 = ?,
        ns_indikator16 = ?,
        ns_indikator17 = ?,
        ns_indikator18 = ?,
        ns_indikator19 = ?,
        ns_indikator20 = ?,
        ns_indikator21 = ?,
        ns_indikator22 = ?,
        ns_indikator23 = ?,
        ns_indikator24 = ?,
        ns_indikator25 = ?,
        ns_indikator26 = ?,
        ns_indikator27 = ?,
        ns_indikator28 = ?,
        ns_indikator29 = ?,
        ns_indikator30 = ?,
        ns_indikator31 = ?,
        ns_indikator32 = ?,
        ns_indikator33 = ?,
        ns_indikator34 = ?,
        ns_indikator35 = ?,
        ns_indikator36 = ?,
        ns_indikator37 = ?,
        ns_indikator38 = ?,
        ns_indikator39 = ?,
        ns_total_skor = ?,
        ns_persentase = ?
        WHERE id_penilaian_siswa = ?")
            ->execute(
                $_POST["ns1"],
                $_POST["ns2"],
                $_POST["ns3"],
                $_POST["ns4"],
                $_POST["ns5"],
                $_POST["ns6"],
                $_POST["ns7"],
                $_POST["ns8"],
                $_POST["ns9"],
                $_POST["ns10"],
                $_POST["ns11"],
                $_POST["ns12"],
                $_POST["ns13"],
                $_POST["ns14"],
                $_POST["ns15"],
                $_POST["ns16"],
                $_POST["ns17"],
                $_POST["ns18"],
                $_POST["ns19"],
                $_POST["ns20"],
                $_POST["ns21"],
                $_POST["ns22"],
                $_POST["ns23"],
                $_POST["ns24"],
                $_POST["ns25"],
                $_POST["ns26"],
                $_POST["ns27"],
                $_POST["ns28"],
                $_POST["ns29"],
                $_POST["ns30"],
                $_POST["ns31"],
                $_POST["ns32"],
                $_POST["ns33"],
                $_POST["ns34"],
                $_POST["ns35"],
                $_POST["ns36"],
                $_POST["ns37"],
                $_POST["ns38"],
                $_POST["ns39"],
                $total_skor,
                $persentase,
                $_POST["id"]
            );

        $db->database_prepare("UPDATE tbl_penilaian_siswa SET tanggal_nilai = ?
                                                        WHERE id_nilai = ?")
            ->execute(
                $date,
                $_POST["id"]
            );

        header("Location: ../../dashboard.php?module=siswa&code=1");
    }
}

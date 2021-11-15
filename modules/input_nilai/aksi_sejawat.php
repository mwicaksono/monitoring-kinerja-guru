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
    if ($_GET['mod'] == 'sejawat' && $_GET['act'] == 'nilai') {

        $date = gmdate("Y-m-d H:i:s", time() + 60 * 60 * 7);

        $total_skor = $_POST['nj1'] + $_POST['nj2'] + $_POST['nj3'] + $_POST['nj4'] + $_POST['nj5'] + $_POST['nj6'] + $_POST['nj7'] +
            $_POST['nj8'] + $_POST['nj9'] + $_POST['nj10'] + $_POST['nj11'] + $_POST['nj12'] + $_POST['nj13'] + $_POST['nj14'] +
            $_POST['nj15'] + $_POST['nj16'] + $_POST['nj17'] + $_POST['nj18'] + $_POST['nj19'] + $_POST['nj20'] + $_POST['nj21'] +
            $_POST['nj22'] + $_POST['nj23'] + $_POST['nj24'] + $_POST['nj25'] + $_POST['nj26'] + $_POST['nj27'] + $_POST['nj28'] +
            $_POST['nj29'] + $_POST['nj30'] + $_POST['nj31'] + $_POST['nj32'] + $_POST['nj33'];

        $persentase = ($total_skor / 165) * 100;

        $db->database_prepare("UPDATE sejawat SET 
        nj_indikator1 = ?,
        nj_indikator2 = ?,
        nj_indikator3 = ?,
        nj_indikator4 = ?,
        nj_indikator5 = ?,
        nj_indikator6 = ?,
        nj_indikator7 = ?,
        nj_indikator8 = ?,
        nj_indikator9 = ?,
        nj_indikator10 = ?,
        nj_indikator11 = ?,
        nj_indikator12 = ?,
        nj_indikator13 = ?,
        nj_indikator14 = ?,
        nj_indikator15 = ?,
        nj_indikator16 = ?,
        nj_indikator17 = ?,
        nj_indikator18 = ?,
        nj_indikator19 = ?,
        nj_indikator20 = ?,
        nj_indikator21 = ?,
        nj_indikator22 = ?,
        nj_indikator23 = ?,
        nj_indikator24 = ?,
        nj_indikator25 = ?,
        nj_indikator26 = ?,
        nj_indikator27 = ?,
        nj_indikator28 = ?,
        nj_indikator29 = ?,
        nj_indikator30 = ?,
        nj_indikator31 = ?,
        nj_indikator32 = ?,
        nj_indikator33 = ?,
        nj_total_skor = ?,
        nj_persentase = ?
        WHERE id_penilaian_sejawat = ?")
            ->execute(
                $_POST["nj1"],
                $_POST["nj2"],
                $_POST["nj3"],
                $_POST["nj4"],
                $_POST["nj5"],
                $_POST["nj6"],
                $_POST["nj7"],
                $_POST["nj8"],
                $_POST["nj9"],
                $_POST["nj10"],
                $_POST["nj11"],
                $_POST["nj12"],
                $_POST["nj13"],
                $_POST["nj14"],
                $_POST["nj15"],
                $_POST["nj16"],
                $_POST["nj17"],
                $_POST["nj18"],
                $_POST["nj19"],
                $_POST["nj20"],
                $_POST["nj21"],
                $_POST["nj22"],
                $_POST["nj23"],
                $_POST["nj24"],
                $_POST["nj25"],
                $_POST["nj26"],
                $_POST["nj27"],
                $_POST["nj28"],
                $_POST["nj29"],
                $_POST["nj30"],
                $_POST["nj31"],
                $_POST["nj32"],
                $_POST["nj33"],
                $total_skor,
                $persentase,
                $_POST["id"]
            );

        $db->database_prepare("UPDATE tbl_penilaian_sejawat SET tanggal_nilai = ?
                                                        WHERE id_nilai = ?")
            ->execute(
                $date,
                $_POST["id"]
            );

        header("Location: ../../dashboard.php?module=sejawat&code=1");
    }
}

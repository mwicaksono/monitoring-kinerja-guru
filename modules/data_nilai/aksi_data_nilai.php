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

/* jika user sudah login, maka jalankan perintah untuk simpan, ubah dan hapus */
else{

    /* perintah untuk menyimpan data ke tabel data_nilai */
    if ($_GET['mod'] == 'data_nilai' && $_GET['act'] == 'input') {

        /* perintah untuk membuat kode data_nilai */
        $data = $db->database_fetch_array($db->database_prepare(" SELECT max(id_nilai) as kode
                                                                  FROM tbl_penilaian")->execute());
        $kode = $data['kode'] + 1;
        /* ------------------------------------------------------------------------------------------ */

        /* perintah insert */
        $db->database_prepare("INSERT INTO tbl_penilaian (  id_nilai,
                                                            periode_nilai,
                                                            guru_dinilai,
                                                            guru_penilai)
                                                    VALUES (?,?,?,?)")
                                                ->execute(  $kode,
                                                            $_POST["id_periode"],
                                                            $_POST["guru_dinilai"],
                                                            $_POST["guru_penilai"]);
        
        $db->database_prepare("INSERT INTO pedagogik1 (id_pedagogik1)
                                               VALUES (?)")
                                            ->execute( $kode);

        $db->database_prepare("INSERT INTO pedagogik2 (id_pedagogik2)
                                               VALUES (?)")
                                            ->execute( $kode);

        $db->database_prepare("INSERT INTO pedagogik3 (id_pedagogik3)
                                               VALUES (?)")
                                            ->execute( $kode);

        $db->database_prepare("INSERT INTO pedagogik4 (id_pedagogik4)
                                               VALUES (?)")
                                            ->execute( $kode);

        $db->database_prepare("INSERT INTO pedagogik5 (id_pedagogik5)
                                               VALUES (?)")
                                            ->execute( $kode);

        $db->database_prepare("INSERT INTO pedagogik6 (id_pedagogik6)
                                               VALUES (?)")
                                            ->execute( $kode);

        $db->database_prepare("INSERT INTO pedagogik7 (id_pedagogik7)
                                               VALUES (?)")
                                            ->execute( $kode);

        $db->database_prepare("INSERT INTO kepribadian1 (id_kepribadian1)
                                                 VALUES (?)")
                                             ->execute(  $kode);

        $db->database_prepare("INSERT INTO kepribadian2 (id_kepribadian2)
                                                 VALUES (?)")
                                             ->execute(  $kode);

        $db->database_prepare("INSERT INTO kepribadian3 (id_kepribadian3)
                                                 VALUES (?)")
                                             ->execute(  $kode);

        $db->database_prepare("INSERT INTO sosial1 (id_sosial1)
                                            VALUES (?)")
                                        ->execute(  $kode);

        $db->database_prepare("INSERT INTO sosial2 (id_sosial2)
                                            VALUES (?)")
                                        ->execute(  $kode);

        $db->database_prepare("INSERT INTO profesional1 (id_profesional1)
                                                 VALUES (?)")
                                             ->execute(  $kode);

        $db->database_prepare("INSERT INTO profesional2 (id_profesional2)
                                                 VALUES (?)")
                                             ->execute(  $kode);

        /* lalu alihkan ke halaman data data_nilai dan tampilkan pesan = 1 */
        header("Location: ../../dashboard.php?module=data_nilai&code=1");
    }

    /* perintah untuk mengubah data data_nilai */
    elseif ($_GET['mod'] == 'data_nilai' && $_GET['act'] == 'update') {

        /* perintah update */
        $db->database_prepare("UPDATE tbl_penilaian SET periode_nilai = ?,
                                                        guru_dinilai = ?,
                                                        guru_penilai = ?
                                                        WHERE id_nilai = ?")
                                            ->execute(  $_POST["id_periode"],
                                                        $_POST["guru_dinilai"],
                                                        $_POST["guru_penilai"],
                                                        $_POST["id"]);
        
        /* lalu alihkan ke halaman data data_nilai dan tampilkan pesan = 2 */
        header("Location: ../../dashboard.php?module=data_nilai&code=2");
    }

    /* perintah untuk menghapus data di tabel data_nilai */
    elseif ($_GET['mod'] == 'data_nilai' && $_GET['act'] == 'delete') {
        
        /* perintah delete */
        $db->database_prepare("DELETE FROM tbl_penilaian WHERE id_nilai = ?")->execute($_GET["id"]);

        /* lalu alihkan ke halaman data data_nilai dan tampilkan pesan = 3 */
        header("Location: ../../dashboard.php?module=data_nilai&code=3");
    }
}
?>
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

/* jika user sudah login, maka jalankan perintah untuk simpan, ubah dan hapus */ else {

    /* perintah untuk menyimpan data ke tabel data_nilai */
    if ($_GET['mod'] == 'data_nilai_internal' && $_GET['act'] == 'input') {

        /* perintah untuk membuat kode data_nilai */
        $data = $db->database_fetch_array($db->database_prepare(" SELECT max(id_nilai) as kode
                                                                  FROM tbl_penilaian_internal")->execute());

        $kepsek = $db->database_fetch_array($db->database_prepare("SELECT nip
        FROM tbl_user 
        WHERE level = 'Kepala Sekolah'")->execute());
        $kode = $data['kode'] + 1;
        /* ------------------------------------------------------------------------------------------ */

        /* perintah insert */
        $db->database_prepare("INSERT INTO tbl_penilaian_internal (  id_nilai,
                                                            periode_nilai,
                                                            guru_dinilai,
                                                            guru_penilai)
                                                    VALUES (?,?,?,?)")
            ->execute(
                $kode,
                $_POST["id_periode"],
                $_POST["guru_dinilai"],
                $kepsek['nip']
            );

        $db->database_prepare("INSERT INTO pelayan (id_penilaian_pelayan)
            VALUES (?)")
            ->execute($kode);

        $db->database_prepare("INSERT INTO akademik (id_penilaian_akademik)
            VALUES (?)")
            ->execute($kode);

        $db->database_prepare("INSERT INTO spiritual (id_penilaian_spiritual)
            VALUES (?)")
            ->execute($kode);

        $db->database_prepare("INSERT INTO alkitab (id_penilaian_alkitab)
            VALUES (?)")
            ->execute($kode);

        $db->database_prepare("INSERT INTO mentor (id_penilaian_mentor)
            VALUES (?)")
            ->execute($kode);

        $db->database_prepare("INSERT INTO karakter (id_penilaian_karakter)
            VALUES (?)")
            ->execute($kode);


        /* lalu alihkan ke halaman data data_nilai dan tampilkan pesan = 1 */
        header("Location: ../../dashboard.php?module=data_nilai_internal&code=1");
    }

    /* perintah untuk mengubah data data_nilai */ elseif ($_GET['mod'] == 'data_nilai_internal' && $_GET['act'] == 'update') {

        /* perintah update */
        $db->database_prepare("UPDATE tbl_penilaian_internal SET periode_nilai = ?,
                                                        guru_dinilai = ?,
                                                        guru_penilai = ?
                                                        WHERE id_nilai = ?")
            ->execute(
                $_POST["id_periode"],
                $_POST["guru_dinilai"],
                $_POST["guru_penilai"],
                $_POST["id"]
            );

        /* lalu alihkan ke halaman data data_nilai dan tampilkan pesan = 2 */
        header("Location: ../../dashboard.php?module=data_nilai_internal&code=2");
    }

    /* perintah untuk menghapus data di tabel data_nilai */ elseif ($_GET['mod'] == 'data_nilai_internal' && $_GET['act'] == 'delete') {

        /* perintah delete */
        $db->database_prepare("DELETE FROM tbl_penilaian_internal WHERE id_nilai = ?")->execute($_GET["id"]);
        /* lalu alihkan ke halaman data data_nilai dan tampilkan pesan = 3 */
        header("Location: ../../dashboard.php?module=data_nilai_internal&code=3");
    }
}

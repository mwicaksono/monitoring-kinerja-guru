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
    if ($_GET['mod'] == 'data_nilai_siswa' && $_GET['act'] == 'input') {

        $dataguru = $db->database_prepare("SELECT nip FROM tbl_guru")->execute();
        while ($dataG = $db->database_fetch_array($dataguru)) {
            /* perintah untuk membuat kode data_nilai */
            $data = $db->database_fetch_array($db->database_prepare(" SELECT max(id_nilai) as kode
                                                                  FROM tbl_penilaian_siswa")->execute());
            $kode = $data['kode'] + 1;

            /* ------------------------------------------------------------------------------------------ */
            /* perintah insert */
            $db->database_prepare("INSERT INTO tbl_penilaian_siswa ( id_nilai, 
                                                                    periode_nilai,
                                                                    guru_dinilai,
                                                                    siswa_penilai)
                                                            VALUES (?,?,?,?)")
                ->execute(
                    $kode,
                    $_POST["id_periode"],
                    $dataG['nip'],
                    $_POST["siswa_penilai"]
                );

            $db->database_prepare("INSERT INTO siswa (id_penilaian_siswa)
                    VALUES (?)")
                ->execute($kode);
        }
        /* lalu alihkan ke halaman data data_nilai dan tampilkan pesan = 1 */
        header("Location: ../../dashboard.php?module=data_nilai_siswa&code=1");
    }


    /* perintah untuk mengubah data data_nilai */ elseif ($_GET['mod'] == 'data_nilai_siswa' && $_GET['act'] == 'update') {

        /* perintah update */
        $db->database_prepare("UPDATE tbl_penilaian_siswa SET periode_nilai = ?,
                                                        guru_dinilai = ?,
                                                        siswa_penilai = ?
                                                        WHERE id_nilai = ?")
            ->execute(
                $_POST["id_periode"],
                $_POST["guru_dinilai"],
                $_POST["siswa_penilai"],
                $_POST["id"]
            );

        /* lalu alihkan ke halaman data data_nilai dan tampilkan pesan = 2 */
        header("Location: ../../dashboard.php?module=data_nilai_siswa&code=2");
    }

    /* perintah untuk menghapus data di tabel data_nilai */ elseif ($_GET['mod'] == 'data_nilai_siswa' && $_GET['act'] == 'delete') {

        /* perintah delete */
        $db->database_prepare("DELETE FROM tbl_penilaian_siswa WHERE siswa_penilai = ?")->execute($_GET["id"]);
        /* lalu alihkan ke halaman data data_nilai dan tampilkan pesan = 3 */
        header("Location: ../../dashboard.php?module=data_nilai_siswa&code=3");

        // Jika ada data guru yang barusan ditambahkan
    } elseif ($_GET['mod'] == 'data_nilai_siswa' && $_GET['act'] == 'input_new_guru') {
        /* perintah untuk membuat kode data_nilai */
        $data = $db->database_fetch_array($db->database_prepare(" SELECT max(id_nilai) as kode
                FROM tbl_penilaian_siswa")->execute());
        $kode = $data['kode'] + 1;

        $guru = $_POST['guru_dinilai'];
        $cekguru = $db->database_num_rows($db->database_prepare(" SELECT guru_dinilai FROM tbl_penilaian_siswa WHERE guru_dinilai = '$guru'")->execute());

        if ($cekguru > 0) {
            header("Location: ../../dashboard.php?module=data_nilai_siswa&code=4");
        } else {
            $db->database_prepare("INSERT INTO tbl_penilaian_siswa ( id_nilai, 
                                                            periode_nilai,
                                                            guru_dinilai,
                                                            siswa_penilai)
                                                    VALUES (?,?,?,?)")
                ->execute(
                    $kode,
                    $_POST["id_periode"],
                    $_POST["guru_dinilai"],
                    $_POST["siswa_penilai"]
                );

            $db->database_prepare("INSERT INTO siswa (id_penilaian_siswa)
        VALUES (?)")
                ->execute($kode);
            /* lalu alihkan ke halaman data data_nilai dan tampilkan pesan = 1 */
            header("Location: ../../dashboard.php?module=data_nilai_siswa&code=1");
        }
    }
}

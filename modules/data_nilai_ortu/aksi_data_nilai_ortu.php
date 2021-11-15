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
    if ($_GET['mod'] == 'data_nilai_ortu' && $_GET['act'] == 'input') {
        $dataortu = $db->database_prepare("SELECT nip FROM tbl_guru")->execute();
        while ($dataO = $db->database_fetch_array($dataortu)) {

            /* perintah untuk membuat kode data_nilai */
            $data = $db->database_fetch_array($db->database_prepare(" SELECT max(id_nilai) as kode
                                                                  FROM tbl_penilaian_ortu")->execute());
            $kode = $data['kode'] + 1;
            /* ------------------------------------------------------------------------------------------ */

            /* perintah insert */
            $db->database_prepare("INSERT INTO tbl_penilaian_ortu (  id_nilai,
                                                            periode_nilai,
                                                            guru_dinilai,
                                                            ortu_penilai)
                                                    VALUES (?,?,?,?)")
                ->execute(
                    $kode,
                    $_POST["id_periode"],
                    $dataO['nip'],
                    $_POST["ortu_penilai"]
                );

            $db->database_prepare("INSERT INTO ortu (id_penilaian_ortu)
            VALUES (?)")
                ->execute($kode);
        }
        /* lalu alihkan ke halaman data data_nilai dan tampilkan pesan = 1 */
        header("Location: ../../dashboard.php?module=data_nilai_ortu&code=1");
    }

    /* perintah untuk mengubah data data_nilai */ elseif ($_GET['mod'] == 'data_nilai_ortu' && $_GET['act'] == 'update') {

        /* perintah update */
        $db->database_prepare("UPDATE tbl_penilaian_ortu SET periode_nilai = ?,
                                                        guru_dinilai = ?,
                                                        ortu_penilai = ?
                                                        WHERE id_nilai = ?")
            ->execute(
                $_POST["id_periode"],
                $_POST["guru_dinilai"],
                $_POST["ortu_penilai"],
                $_POST["id"]
            );

        /* lalu alihkan ke halaman data data_nilai dan tampilkan pesan = 2 */
        header("Location: ../../dashboard.php?module=data_nilai_ortu&code=2");
    }

    /* perintah untuk menghapus data di tabel data_nilai */ elseif ($_GET['mod'] == 'data_nilai_ortu' && $_GET['act'] == 'delete') {

        /* perintah delete */
        $db->database_prepare("DELETE FROM tbl_penilaian_ortu WHERE ortu_penilai = ?")->execute($_GET["id"]);
        /* lalu alihkan ke halaman data data_nilai dan tampilkan pesan = 3 */
        header("Location: ../../dashboard.php?module=data_nilai_ortu&code=3");
        // jika ada data guru baru yang barusan ditambahkan
    } elseif ($_GET['mod'] == 'data_nilai_ortu' && $_GET['act'] == 'input_new_guru') {
        /* perintah untuk membuat kode data_nilai */
        $data = $db->database_fetch_array($db->database_prepare(" SELECT max(id_nilai) as kode
                FROM tbl_penilaian_ortu")->execute());
        $kode = $data['kode'] + 1;

        $guru = $_POST['guru_dinilai'];
        $cekguru = $db->database_num_rows($db->database_prepare(" SELECT guru_dinilai FROM tbl_penilaian_ortu WHERE guru_dinilai = '$guru'")->execute());

        if ($cekguru > 0) {
            header("Location: ../../dashboard.php?module=data_nilai_ortu&code=4");
        } else {
            $db->database_prepare("INSERT INTO tbl_penilaian_ortu ( id_nilai, 
                                                            periode_nilai,
                                                            guru_dinilai,
                                                            ortu_penilai)
                                                    VALUES (?,?,?,?)")
                ->execute(
                    $kode,
                    $_POST["id_periode"],
                    $_POST["guru_dinilai"],
                    $_POST["ortu_penilai"]
                );

            $db->database_prepare("INSERT INTO ortu (id_penilaian_ortu)
        VALUES (?)")
                ->execute($kode);
            /* lalu alihkan ke halaman data data_nilai dan tampilkan pesan = 1 */
            header("Location: ../../dashboard.php?module=data_nilai_ortu&code=1");
        }
    }
}

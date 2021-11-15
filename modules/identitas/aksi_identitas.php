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

/* jika user sudah login, maka jalankan perintah untuk ubah identitas */ else {


    $db->database_prepare("UPDATE tbl_sekolah SET   npsn = ?,
                                                        nama_sekolah = ?,
                                                        status = ?,
                                                        alamat = ?,
                                                        kelurahan = ?,
                                                        kecamatan = ?,
                                                        kota = ?,
                                                        provinsi = ?,
                                                        kode_pos = ?,
                                                        telepon = ?,
                                                        email = ?,
                                                        website = ?
                                                        WHERE id_sekolah = ?")
        ->execute(
            $_POST["npsn"],
            $_POST["nama"],
            $_POST["status"],
            $_POST["alamat"],
            $_POST["kelurahan"],
            $_POST["kecamatan"],
            $_POST["kota"],
            $_POST["provinsi"],
            $_POST["kode_pos"],
            $_POST["telepon"],
            $_POST["email"],
            $_POST["website"],
            $_POST["id"]
        );

    header("Location: ../../dashboard.php?module=identitas&code=1");
}

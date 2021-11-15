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
    if ($_GET['mod'] == 'user2' && $_GET['act'] == 'input') {

        /* perintah untuk membuat id user */
        $data = $db->database_fetch_array($db->database_prepare(" SELECT max(id_user) as kode
                                                                  FROM tbl_user")->execute());
        $kode = $data['kode'] + 1;
        /* ------------------------------------------------------------------------------------------ */
        // cek duplikasi username
        $user = $_POST['username'];
        $cekuser = $db->database_num_rows($db->database_prepare(" SELECT username FROM tbl_user WHERE username = '$user'")->execute());

        if ($cekuser > 0) {
            header("Location: ../../dashboard.php?module=user2&code=4");
        } else {
            $db->database_prepare("INSERT INTO tbl_user (id_user,
            nama,
            username,
            password,
            level)
   VALUES ( ?,?,?,?,?)")
                ->execute(
                    $kode,
                    $_POST["nama"],
                    $_POST["username"],
                    md5($_POST["password"]),
                    $_POST["level"]
                );

            header("Location: ../../dashboard.php?module=user2&code=1");
        }

        // Update User
    } elseif ($_GET['mod'] == 'user2' && $_GET['act'] == 'update') {

        if (empty($_POST['password'])) {
            $db->database_prepare("UPDATE tbl_user SET  username = ?, 
                                                        nama = ?,
                                                        level = ?
                                                        WHERE id_user = ?")
                ->execute(
                    $_POST["username"],
                    $_POST["nama"],
                    $_POST["level"],
                    $_POST["id"]
                );
            header("Location: ../../dashboard.php?module=user2&code=2");
        } else {

            $db->database_prepare("UPDATE tbl_user SET  username = ?,
                                                        password = ?,
                                                        nama = ?,
                                                        level = ?
                                                        WHERE id_user = ?")
                ->execute(
                    $_POST["username"],
                    md5($_POST["password"]),
                    $_POST["nama"],
                    $_POST["level"],
                    $_POST["id"]
                );
            header("Location: ../../dashboard.php?module=user2&code=2");
        }
    } elseif ($_GET['mod'] == 'user2' && $_GET['act'] == 'delete') {

        $db->database_prepare("DELETE FROM tbl_user WHERE id_user = ?")->execute($_GET["id"]);

        header("Location: ../../dashboard.php?module=user2&code=3");
    }
}

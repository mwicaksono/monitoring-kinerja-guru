<?php
error_reporting(0);		/* sembunyikan error untuk menampilkan pesan */
session_start();		/* memulai session */

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

/* jika user sudah login, maka jalankan perintah untuk ubah password */
else {
	/* deklarasi variabel */
	$old_pass = md5($_POST['old_pass']);
	$new_pass = md5($_POST['new_pass']);
	$retype_pass= md5($_POST['retype_pass']);
	
	/* ambil password dari tabel user untuk dicek */
	$data_user = $db->database_fetch_array($db->database_prepare("SELECT password FROM tbl_user 
																  WHERE id_user = ?")->execute($_SESSION["id_user"]));
	
	/* fungsi untuk pengecekan password sebelum diubah 
	*  jika input password lama tidak sama dengan password didatabase, 
	*  alihkan ke halaman ubah password dan tampilkan pesan = 1
	*/
	if ($old_pass != $data_user['password']){
		header("Location: ../../dashboard.php?module=password&code=1");
	}

	/* jika input password lama sama dengan password didatabase, jalankan perintah untuk pengecekan selanjutnya */
	else {

		/* jika input password baru tidak sama dengan input ulangi password baru, 
		*  alihkan ke halaman ubah password dan tampilkan pesan = 2 
		*/
		if ($new_pass != $retype_pass){
				header("Location: ../../dashboard.php?module=password&code=2");
		}

		/* selain itu, jalankan perintah update password */
		else {
			$db->database_prepare("UPDATE tbl_user SET 	password = ?
														WHERE id_user = ?")
											->execute(	$new_pass,
														$_SESSION["id_user"]);
			
			/* lalu alihkan ke halaman ubah password dan tampilkan pesan = 3 */
			header("Location: ../../dashboard.php?module=password&code=3");
		}
	}
}

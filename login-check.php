<?php
// Jika Hosting Error Pakai fungsi dibawah ini
// ob_start();
/* panggil file untuk konfigurasi dan koneksi ke database */
include "includes/class_database.php";
include "includes/serverconfig.php";
include "includes/debug.php";
/* ------------------------------------------------------ */

/* deklarasi variabel */
$username = $_POST['username'];
$password = md5($_POST['password']);

/* ambil data dari tabel user untuk pengecekan berdasarkan inputan username dan passrword */
$sql = $db->database_prepare("SELECT * FROM tbl_user WHERE username = ? AND password = ?")->execute($username, $password);
$nums = $db->database_num_rows($sql);

$data = $db->database_fetch_array($sql);

/* jika data ada, jalankan perintah untuk membuat session */
if ($nums > 0) {
	session_start();
	$_SESSION['id_user']	  	= $data['id_user'];
	$_SESSION['username']		= $data['username'];
	$_SESSION['nama']			= $data['nama'];
	$_SESSION['nip'] 			= $data['nip'];
	$_SESSION['level']	  		= $data['level'];
	echo $_SESSION['level'], $_SESSION['nip'], $_SESSION['id_user'], $_SESSION['nama'];

	/* lalu alihkan ke halaman admin */

	if ($_SESSION['level'] == 'Siswa') {
		header("Location: dashboard.php?module=input_nilai2");
	} elseif ($_SESSION['level'] == 'Orang Tua') {
		header("Location: dashboard.php?module=input_nilai_ortu");
	} elseif ($_SESSION['level'] == 'Teman Sejawat') {
		header("Location: dashboard.php?module=input_nilai_sejawat");
	} else {
		header("Location: dashboard.php?module=home");
	}
}

/* jika data tidak ada, alihkan ke halaman login dan tampilkan pesan = 1 */ else {
	header("Location: index.php?code=1");
}

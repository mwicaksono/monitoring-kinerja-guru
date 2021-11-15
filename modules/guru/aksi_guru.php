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

    /* perintah untuk menyimpan data ke tabel guru */
    if ($_GET['mod'] == 'guru' && $_GET['act'] == 'input') {

        $tgl_lahir       = $_POST['tanggal_lahir'];
        $explode_lahir   = explode('-',$tgl_lahir);
        $tanggal_lahir   = $explode_lahir[2]."-".$explode_lahir[1]."-".$explode_lahir[0];

        $tgl_bekerja       = $_POST['tanggal_bekerja'];
        $explode_bekerja   = explode('-',$tgl_bekerja);
        $tanggal_bekerja   = $explode_bekerja[2]."-".$explode_bekerja[1]."-".$explode_bekerja[0];

        /* perintah insert */
        $db->database_prepare("INSERT INTO tbl_guru (   nip,
                                                        nama_guru,
                                                        gelar,
                                                        tempat_lahir,
                                                        tanggal_lahir,
                                                        jenis_kelamin,
                                                        status_pns,
                                                        no_seri_karpeg,
                                                        pangkat_golongan,
                                                        nuptk,
                                                        nrg,
                                                        pendidikan_terakhir,
                                                        mata_pelajaran,
                                                        jabatan_fungsional,
                                                        tanggal_bekerja,
                                                        masa_kerja)
                                                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")
                                              ->execute($_POST["nip"],
                                                        $_POST["nama_guru"],
                                                        $_POST["gelar"],
                                                        $_POST["tempat_lahir"],
                                                        $tanggal_lahir,
                                                        $_POST["jenis_kelamin"],
                                                        $_POST["status_pns"],
                                                        $_POST["no_seri_karpeg"],
                                                        $_POST["pangkat_golongan"],
                                                        $_POST["nuptk"],
                                                        $_POST["nrg"],
                                                        $_POST["pendidikan_terakhir"],
                                                        $_POST["matapelajaran"],
                                                        $_POST["jabatan_fungsional"],
                                                        $tanggal_bekerja,
                                                        $_POST["masa_kerja"]);

        /* lalu alihkan ke halaman data guru dan tampilkan pesan = 1 */
        header("Location: ../../dashboard.php?module=guru&code=1");
    }

    /* perintah untuk mengubah data guru */
    elseif ($_GET['mod'] == 'guru' && $_GET['act'] == 'update') {

        $tgl_lahir       = $_POST['tanggal_lahir'];
        $explode_lahir   = explode('-',$tgl_lahir);
        $tanggal_lahir   = $explode_lahir[2]."-".$explode_lahir[1]."-".$explode_lahir[0];

        $tgl_bekerja       = $_POST['tanggal_bekerja'];
        $explode_bekerja   = explode('-',$tgl_bekerja);
        $tanggal_bekerja   = $explode_bekerja[2]."-".$explode_bekerja[1]."-".$explode_bekerja[0];

        /* perintah update */
        $db->database_prepare("UPDATE tbl_guru SET  nama_guru = ?,
                                                    gelar = ?,
                                                    tempat_lahir = ?,
                                                    tanggal_lahir = ?,
                                                    jenis_kelamin = ?,
                                                    status_pns = ?,
                                                    no_seri_karpeg = ?,
                                                    pangkat_golongan = ?,
                                                    nuptk = ?,
                                                    nrg = ?,
                                                    pendidikan_terakhir = ?,
                                                    mata_pelajaran = ?,
                                                    jabatan_fungsional = ?,
                                                    tanggal_bekerja = ?,
                                                    masa_kerja = ?
                                                    WHERE nip = ?")
                                        ->execute(  $_POST["nama_guru"],
                                                    $_POST["gelar"],
                                                    $_POST["tempat_lahir"],
                                                    $tanggal_lahir,
                                                    $_POST["jenis_kelamin"],
                                                    $_POST["status_pns"],
                                                    $_POST["no_seri_karpeg"],
                                                    $_POST["pangkat_golongan"],
                                                    $_POST["nuptk"],
                                                    $_POST["nrg"],
                                                    $_POST["pendidikan_terakhir"],
                                                    $_POST["matapelajaran"],
                                                    $_POST["jabatan_fungsional"],
                                                    $tanggal_bekerja,
                                                    $_POST["masa_kerja"],
                                                    $_POST["nip"]);
        
        /* lalu alihkan ke halaman data guru dan tampilkan pesan = 2 */
        header("Location: ../../dashboard.php?module=guru&code=2");
    }

    /* perintah untuk menghapus data di tabel guru */
    elseif ($_GET['mod'] == 'guru' && $_GET['act'] == 'delete') {
        
        /* perintah delete */
        $db->database_prepare("DELETE FROM tbl_guru WHERE nip = ?")->execute($_GET["id"]);

        /* lalu alihkan ke halaman data guru dan tampilkan pesan = 3 */
        header("Location: ../../dashboard.php?module=guru&code=3");
    }
}
?>
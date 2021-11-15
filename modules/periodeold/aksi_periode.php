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

/* jika user sudah login, maka jalankan perintah untuk ubah */
else {
	if ($_GET['mod'] == 'periode' && $_GET['act'] == 'on') {

		$tgl_awal       = $_POST['tanggal_awal'];
        $tgla           = explode('-',$tgl_awal);
        $tanggal_awal   = $tgla[2]."-".$tgla[1]."-".$tgla[0];

        $tgl_akhir       = $_POST['tanggal_akhir'];
        $tglb            = explode('-',$tgl_akhir);
        $tanggal_akhir   = $tglb[2]."-".$tglb[1]."-".$tglb[0];

		$status = 'on';

        $sql = $db->database_prepare("SELECT id_periode, periode, tahun_ajaran FROM tbl_periode 
                                      WHERE periode='$_POST[periode]' AND tahun_ajaran='$_POST[tahun_ajaran]'")->execute();

        $num = $db->database_num_rows($sql);

        if ($num <> 0) {

            $data_id = $db->database_fetch_array($sql);

            $id = $data_id['id_periode'];

            $db->database_prepare("UPDATE tbl_periode SET   periode = ?,
                                                            tanggal_awal = ?,
                                                            tanggal_akhir = ?,
                                                            tahun_ajaran = ?,
                                                            status = ?,
                                                            keterangan = ?
                                                            WHERE id_periode = ?")
                                                ->execute(  $_POST["periode"],
                                                            $tanggal_awal,
                                                            $tanggal_akhir,
                                                            $_POST["tahun_ajaran"],
                                                            $status,
                                                            $_POST["keterangan"],
                                                            $id);
        } else {

            /* perintah untuk membuat kode konselor */
            $data = $db->database_fetch_array($db->database_prepare("SELECT max(id_periode) as kode
                                                                     FROM tbl_periode")->execute());
            $kode = $data['kode'] + 1;
            /* ------------------------------------------------------------------------------------------ */

            /* perintah insert */
            $db->database_prepare("INSERT INTO tbl_periode (id_periode,
                                                            periode,
                                                            tanggal_awal,
                                                            tanggal_akhir,
                                                            tahun_ajaran,
                                                            status,
                                                            keterangan)
                                                    VALUES (?,?,?,?,?,?,?)")
                                                  ->execute($kode,
                                                            $_POST["periode"],
                                                            $tanggal_awal,
                                                            $tanggal_akhir,
                                                            $_POST["tahun_ajaran"],
                                                            $status,
                                                            $_POST["keterangan"]);
        }
		
		header("Location: ../../dashboard.php?module=periode&code=1");
	}

	elseif ($_GET['mod'] == 'periode' && $_GET['act'] == 'off') {

		$status = 'off';

		$db->database_prepare("UPDATE tbl_periode SET 	status = ?
                                                        WHERE id_periode = ?")
                                            ->execute(  $status,
                                                        $_POST["id"]);

		header("Location: ../../dashboard.php?module=periode&code=2");
	}
}
?>
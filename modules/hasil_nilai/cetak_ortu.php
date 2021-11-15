<?php
//error_reporting(0);   /* sembunyikan error untuk menampilkan pesan */
session_start();      /* memulai session */

/* panggil file untuk konfigurasi dan koneksi ke database */
include "../../includes/class_database.php";
include "../../includes/serverconfig.php";
include "../../includes/debug.php";
include "../../includes/fungsi_tanggal.php";
/* ------------------------------------------------------ */

$data = $db->database_fetch_array($db->database_prepare("SELECT a.*, b.*, c.*, c.nip as nipa, d.nama, e.*
                                                          FROM tbl_penilaian_ortu AS a
                                                          JOIN tbl_periode AS b
                                                          JOIN tbl_guru AS c
                                                          JOIN tbl_user AS d
                                                          JOIN ortu AS e
                                                          ON a.periode_nilai=b.id_periode 
                                                          AND a.guru_dinilai=c.nip
                                                          AND a.ortu_penilai=d.id_user
                                                          AND a.id_nilai=e.id_penilaian_ortu
                                                          WHERE a.id_nilai='$_GET[id]'")->execute());


$tanggal        = $data['tanggal_nilai'];
$potong_date    = substr($tanggal, 0, 10);
$tgld           = explode('-', $potong_date);
$date           = tgl_eng_to_ind($tgld[2] . "-" . $tgld[1] . "-" . $tgld[0]);

$tgl_bekerja       = $data['tanggal_bekerja'];
$tglc              = explode('-', $tgl_bekerja);
$tanggal_bekerja   = tgl_eng_to_ind($tglc[2] . "-" . $tglc[1] . "-" . $tglc[0]);


$tgl_lahir       = $data['tanggal_lahir'];
$tgle             = explode('-', $tgl_lahir);
$tanggal_lahir   = tgl_eng_to_ind($tgle[2] . "-" . $tgle[1] . "-" . $tgle[0]);

$tgl_awal       = $data['tanggal_awal'];
$tgla           = explode('-', $tgl_awal);
$tanggal_awal   = tgl_eng_to_ind(isset($tgla[2]) . "-" . isset($tgla[1]) . "-" . $tgla[0]);

$tgl_akhir       = $data['tanggal_akhir'];
$tglb            = explode('-', $tgl_akhir);
$tanggal_akhir   = tgl_eng_to_ind(isset($tglb[2]) . "-" . isset($tglb[1]) . "-" . $tglb[0]);

$total_skor1 = $data['no_indikator1'] + $data['no_indikator2'] + $data['no_indikator3'];
$total_skor2 = $data['no_indikator4'] + $data['no_indikator5'] + $data['no_indikator6'] + $data['no_indikator7'] +
    $data['no_indikator8'];

// KOMPETENSI 1 
$persentaseKomunikasi = ceil(($total_skor1 / 15) * 100);

if ($persentaseKomunikasi <= 25) {
    $nilaiKomunikasi = '1';
} elseif ($persentaseKomunikasi > 25 && $persentaseKomunikasi <= 50) {
    $nilaiKomunikasi = '2';
} elseif ($persentaseKomunikasi > 50 && $persentaseKomunikasi <= 75) {
    $nilaiKomunikasi = '3';
} elseif ($persentaseKomunikasi > 75 && $persentaseKomunikasi <= 100) {
    $nilaiKomunikasi = '4';
}

// KOMPETENSI 2 
$persentaseKepercayaan = ceil(($total_skor2 / 25) * 100);

if ($persentaseKepercayaan <= 25) {
    $nilaiKepercayaan = '1';
} elseif ($persentaseKepercayaan > 25 && $persentaseKepercayaan <= 50) {
    $nilaiKepercayaan = '2';
} elseif ($persentaseKepercayaan > 50 && $persentaseKepercayaan <= 75) {
    $nilaiKepercayaan = '3';
} elseif ($persentaseKepercayaan > 75 && $persentaseKepercayaan <= 100) {
    $nilaiKepercayaan = '4';
}

$jumlahKompetensi = $nilaiKomunikasi + $nilaiKepercayaan;

$tanggal_nilai  = $date;

$data_sekolah = $db->database_fetch_array($db->database_prepare(" SELECT * FROM tbl_sekolah
                                                                  WHERE id_sekolah = '1'")->execute());


$data_kepsek = $db->database_fetch_array($db->database_prepare("SELECT a.*, b.* FROM tbl_guru as a JOIN tbl_user as b ON a.nip = b.nip
                                                                WHERE b.level = 'Kepala Sekolah'")->execute());


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hasil Cetak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="nononon" />
    <meta name=" author" content="tests" />
    <link rel="shortcut icon" href="../../assets/img/favicon.png">
    <title>Responsive Table</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/cetak-reset.css">

    <!--external css-->


    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/cetak.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/cetak-responsive.css" />
</head>
<style>
    @media print {
        @page {
            size: A4 portrait;
            width: 212cm;
            margin-top: -50px;
            margin-bottom: -150px;
            /* Reflect the paper height in the screen rendering (must match size from @page rule) */
            min-height: 29.7cm;

        }

    }
</style>

<body onload="window.print()">

    <section id="container" class="">
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">

                <!-- page 1 start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="font-size:25px" colspan="3"> <br>
                                                    <img src="../../assets/img/favicon.png" height="150"> <br><br>
                                                    DOKUMEN <br>
                                                    PENILAIAN KINERJA GURU OLEH ORANG TUA <br>
                                                    <br>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th style="font-size:18px" colspan="3">IDENTITAS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td width="100" align="center">1</td>
                                                <td width="350">NAMA GURU</td>
                                                <td width="500"><?php echo $data['nama_guru']; ?>, <?php echo $data['gelar']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">2</td>
                                                <td width="350">NIY</td>
                                                <td width="500"><?= $data['nipa'] ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">3</td>
                                                <td width="350">NO SERI KARPEG</td>
                                                <td width="500"><?php echo $data['no_seri_karpeg']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">4</td>
                                                <td width="350">PANGKAT/GOLONGAN</td>
                                                <td width="500"><?php echo $data['pangkat_golongan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">5</td>
                                                <td width="350">NUPTK</td>
                                                <td width="500"><?php echo $data['nuptk']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">6</td>
                                                <td width="350">NRG</td>
                                                <td width="500"><?php echo $data['nrg']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">7</td>
                                                <td width="350">NAMA PELAJARAN</td>
                                                <td width="500"><?php echo $data['mata_pelajaran']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">8</td>
                                                <td width="350">NAMA SEKOLAH</td>
                                                <td width="500"><?php echo $data_sekolah['nama_sekolah']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">9</td>
                                                <td width="350">ALAMAT SEKOLAH</td>
                                                <td width="500"><?php echo $data_sekolah['alamat']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">10</td>
                                                <td width="350">PERIODE PENILAIAN</td>
                                                <td width="500"><?php echo $data['tahun_ajaran']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">11</td>
                                                <td width="350">NAMA PENILAI</td>
                                                <td width="500"><?php echo $data['nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:25px" colspan="3" width="100" align="center"><br>
                                                    <b>EBEN HAEZER SALATIGA<br>
                                                        YP EBEN HAEZER GKI SALATIGA <br>
                                                        2021</b> <br><br>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 1 end -->

                <!-- page 2 start-->
                <div class="row" style="margin-top: 70px; font-size:12px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="font-size:18px" colspan="3">
                                                    LAPORAN DAN EVALUASI <br>
                                                    PENILAIAN KINERJA GURU OLEH ORANG TUA <br>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th style="font-size:16px" colspan="3">IDENTITAS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td width="100" align="center">1</td>
                                                <td width="350">Nama Guru</td>
                                                <td width="500"><?php echo $data['nama_guru']; ?>, <?php echo $data['gelar']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">2</td>
                                                <td width="350">NIY</td>
                                                <td width="500"><?php echo $data['nipa']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">3</td>
                                                <td width="350">NO Seri Karpeg</td>
                                                <td width="500"><?php echo $data['no_seri_karpeg']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">4</td>
                                                <td width="350">Pangkalan/Golongan Ruang</td>
                                                <td width="500"><?php echo $data['pangkat_golongan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">5</td>
                                                <td width="350">NUPTK</td>
                                                <td width="500"><?php echo $data['nuptk']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">6</td>
                                                <td width="350">NRG</td>
                                                <td width="500"><?php echo $data['nrg']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">7</td>
                                                <td width="350">Nama Sekolah</td>
                                                <td width="500"><?php echo $data_sekolah['nama_sekolah']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">8</td>
                                                <td width="350">Alamat Sekolah</td>
                                                <td width="500"><?php echo $data_sekolah['alamat']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">9</td>
                                                <td width="350">Tanggal Mulai Bekerja Disekolah Ini</td>
                                                <td width="500"><?php echo $data['tanggal_bekerja']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">10</td>
                                                <td width="350">Periode Penilaian</td>
                                                <td width="500"><?php echo $data['tahun_ajaran']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td style="font-size:16px" colspan="4" align="center"><b>PERSETUJUAN</b><br><br></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">Penilai dan guru yang dinilai menyatakan telah membaca dan memahami semua aspek yang ditulis/dilaporkan dalam format ini dan menyatakan setuju.<br><br></td>
                                            </tr>
                                            <tr>
                                                <td width="250">Nama Guru</td>
                                                <td width="300"><?php echo $data['nama_guru']; ?>, <?php echo $data['gelar']; ?></td>
                                                <td width="250">Nama Penilai</td>
                                                <td width="300"><?= $data['nama'] ?></td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align:middle" height="100" width="250">Tanda Tangan</td>
                                                <td height="100" width="300"></td>
                                                <td style="vertical-align:middle" height="100" width="250">Tanda Tangan</td>
                                                <td height="100" width="300"></td>
                                            </tr>
                                            <tr>
                                                <td width="250">Tanggal</td>
                                                <td width="300"><?php echo $tanggal_nilai; ?></td>
                                                </td>
                                                <td width="250"></td>
                                                <td width="300"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>

                        </section>
                    </div>
                </div>
                <!-- page 2 end -->

                <!-- page 3 start-->
                <div class="row page-1">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU OLEH ORANG TUA</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>Komponen 1: Komunikasi</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td style="vertical-align:middle" class="center" width="2000" rowspan="2"><b>Indikator</b></td>
                                                <td class="center" colspan="5"><b>Skor</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td width="10"><b>Tidak Pernah</b></td>
                                                <td width="10"><b>Kadang-kadang</b></td>
                                                <td width="10"><b>Agak Sering</b></td>
                                                <td width="10"><b>Sering</b></td>
                                                <td width="10"><b>Selalu</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru menyampaikan perkembangan anak saya di sekolah
                                                </td>
                                                <?php
                                                if ($data['no_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator1'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator1'] == '5') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Guru memberikan kesempatan saya untuk berkomunikasi berkaitan dengan kesulitan belajar anak saya
                                                </td>
                                                <?php
                                                if ($data['no_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator2'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator2'] == '5') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru bekerja sama dengan orang tua untuk menyelesaikan kesulitan belajar anak saya
                                                </td>
                                                <?php
                                                if ($data['no_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator3'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator3'] == '5') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Total skor untuk Komponen 1</td>
                                                <td style="text-align:center" colspan="5"><b><?= $total_skor1 ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (Total skor / 15) x 100%</td>
                                                <td style="text-align:center" colspan="5"><b><?php echo ceil(($total_skor1 / 15) * 100) ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk Kompetensi 1 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="5"><b><?= $nilaiKomunikasi ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br><br>
                                    <div style="margin-left:450px">
                                        <span>
                                            <?= $data_sekolah['kota'] ?>, <?php echo $tanggal_nilai; ?>
                                        </span>
                                    </div>
                                    <div style="margin-left:450px;margin-bottom:70px">
                                        <span>
                                            Penilai,
                                        </span>
                                    </div>
                                    <div style="margin-left:450px">
                                        <span>
                                            <?php echo $data['nama']; ?>
                                        </span>
                                        <br>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 3 end -->

                <!-- page 4 start -->
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 50px;">
                        <section class="panel">
                            <div class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU OLEH ORANG TUA</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>Komponen 2: Kepercayaan dalam memberikan pendidikan kepada peserta didik</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td style="vertical-align:middle" class="center" width="2000" rowspan="2"><b>Indikator</b></td>
                                                <td class="center" colspan="5"><b>Skor</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td width="10"><b>Tidak Pernah</b></td>
                                                <td width="10"><b>Kadang-kadang</b></td>
                                                <td width="10"><b>Agak Sering</b></td>
                                                <td width="10"><b>Sering</b></td>
                                                <td width="10"><b>Selalu</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru berperan sebagai orang tua bagi anak saya di sekolah
                                                </td>
                                                <?php
                                                if ($data['no_indikator4'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator4'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator4'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator4'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator4'] == '5') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Guru mengubah perilaku dan karakter anak saya menjadi lebih baik
                                                </td>
                                                <?php
                                                if ($data['no_indikator5'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator5'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator5'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator5'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator5'] == '5') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru memberikan bimbingan dalam pembelajaran kepada anak saya yang dapat dimanfaatkan dalam kehidupan sehari-hari
                                                </td>
                                                <?php
                                                if ($data['no_indikator6'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator6'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator6'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator6'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator6'] == '5') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4. Guru disenangi oleh anak saya dan teman-temannya
                                                </td>
                                                <?php
                                                if ($data['no_indikator7'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator7'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator7'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator7'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator7'] == '5') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5. Guru mengembalikan hasil belajar (PR, Tugas, Ulangan) anak saya dilengkapi dengan catatan
                                                </td>
                                                <?php
                                                if ($data['no_indikator8'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator8'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator8'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator8'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['no_indikator8'] == '5') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>

                                            <tr>
                                                <td>Total skor untuk Komponen 2</td>
                                                <td style="text-align:center" colspan="5"><?= $total_skor2 ?></td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (Total skor / 25) x 100%</td>
                                                <td style="text-align:center" colspan="5"><?php echo ceil(($total_skor2 / 25) * 100) ?> %</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk Kompetensi 2 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="5"><b><?= $nilaiKepercayaan ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br><br>
                                    <div style="margin-left:500px">
                                        <span>
                                            <?= $data_sekolah['kota'] ?>, <?php echo $tanggal_nilai; ?>
                                        </span>
                                    </div>
                                    <div style="margin-left:500px;margin-bottom:70px">
                                        <span>
                                            Penilai,
                                        </span>
                                    </div>
                                    <div style="margin-left:500px">
                                        <span>
                                            <?php echo $data['nama']; ?>
                                        </span>
                                        <br>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 4 end -->

                <!-- page 5 start-->
                <div class="row" style="margin-top: 450px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <div>
                                        <p style="text-align:center;font-size:18px"><b>REKAP HASIL PENILAIAN KINERJA GURU OLEH ORANG TUA</b></p>
                                    </div>
                                    <table style="margin-left:15px; font-size:12px;" cellpadding="3">
                                        <tbody>
                                            <tr>
                                                <td width="30">a.</td>
                                                <td width="300">Nama Guru</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['nama_guru']; ?>, <?php echo $data['gelar']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">NIY</td>
                                                <td width="5">:</td>
                                                <td width="500"><?= $data['nipa'] ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Tempat, Tanggal Lahir</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['tempat_lahir']; ?>, <?php echo $tanggal_lahir; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Pangkat/Golongan/Jabatan</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['pangkat_golongan']; ?> / <?php echo $data['jabatan_fungsional']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">TMT sebagai guru</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $tanggal_bekerja; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Masa Kerja</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['masa_kerja']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Jenis Kelamin</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['jenis_kelamin']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Pendidikan terakhir/spesialisai</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['pendidikan_terakhir']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Program Keahlian yang diampu</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['mata_pelajaran']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table style="margin-left:15px; font-size:12px;" cellpadding="3">
                                        <tbody>
                                            <tr>
                                                <td width="30">b.</td>
                                                <td width="300">Nama Instansi/Nama Sekolah</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data_sekolah['nama_sekolah']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Telepone/Faks.</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data_sekolah['telepon']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Kelurahan</td>
                                                <td width="5">:</td>
                                                <td width="500"><?= $data_sekolah['kelurahan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Kecamatan</td>
                                                <td width="5">:</td>
                                                <td width="500"><?= $data_sekolah['kecamatan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Kabupaten/Kota</td>
                                                <td width="5">:</td>
                                                <td width="500"><?= $data_sekolah['kota'] ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Provinsi</td>
                                                <td width="5">:</td>
                                                <td width="500"><?= $data_sekolah['provinsi'] ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </section>
                                <br>
                                <p style="font-size:15px;"><b>Periode</b> Penilaian <?php echo $tanggal_awal; ?> s.d. <?php echo $tanggal_akhir; ?></p>


                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>KOMPETENSI</th>
                                            <th>NILAI *)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align:center">1.</td>
                                            <td>Komunikasi</td>
                                            <td style="text-align:center" width="100"><?= $nilaiKomunikasi ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">2.</td>
                                            <td>Kepercayaan dalam memberikan pendidikan kepada peserta didik</td>
                                            <td style="text-align:center" width="100"><?= $nilaiKepercayaan ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center" colspan="2"><b>Jumlah (Hasil penilaian kinerja guru)</b></td>
                                            <td style="text-align:center" width="100"><?= $jumlahKompetensi ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div>
                                    <p style="font-size:13px">*) Nilai diisi berdasarkan laporan dan evaluasi PK Guru oleh Orang Tua. Nilai minimum per kompetensi = 1 dan nilai maksimum = 4</p>
                                </div>
                                <br>
                                <div>
                                    <p style="margin-left:450px;font-size:14px"><?php echo $data_sekolah['kota']; ?>, <?php echo $tanggal_nilai; ?></p>
                                </div>
                                <table style="margin-left:20px">
                                    <tbody>
                                        <tr>
                                            <td width="300">Guru yang dinilai,</td>
                                            <td width="300">Penilai,</td>
                                            <td width="300">Kepala Sekolah,</td>
                                        </tr>
                                        <tr>
                                            <td height="70" width="300"></td>
                                            <td height="70" width="300"></td>
                                            <td height="70" width="300"></td>
                                        </tr>
                                        <tr>
                                            <td width="300">
                                                <?php echo $data['nama_guru']; ?>, <?php echo $data['gelar']; ?> <br>
                                                <span style="border-top:1px solid #bcbcbc">NIY <?php echo $data['nipa']; ?></span> <br>
                                            </td>
                                            <td width="300">
                                                <?= $data['nama'] ?> <br>
                                            </td>
                                            <td width="300">
                                                <?php echo $data_kepsek['nama_guru']; ?>, <?php echo $data_kepsek['gelar']; ?> <br>
                                                <span style="border-top:1px solid #bcbcbc">NIY <?php echo $data_kepsek['nip']; ?></span> <br>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 5 end -->


            </section>
        </section>
        <!--main content end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="../../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>

    <script class="include" type="text/javascript" src="../../assets/js/jquery.dcjqaccordion.2.7.js"></script>

    <script type="text/javascript" src="../../assets/js/respond.min.js"></script>
    <!--common script for all pages-->
    <script type="text/javascript" src="../../assets/js/common-scripts.js"></script>


</body>

</html>
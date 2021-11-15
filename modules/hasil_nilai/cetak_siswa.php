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
                                                          FROM tbl_penilaian_siswa AS a
                                                          JOIN tbl_periode AS b
                                                          JOIN tbl_guru AS c
                                                          JOIN tbl_user AS d
                                                          JOIN siswa AS e
                                                          ON a.periode_nilai=b.id_periode 
                                                          AND a.guru_dinilai=c.nip
                                                          AND a.siswa_penilai=d.id_user
                                                          AND a.id_nilai=e.id_penilaian_siswa
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

$total_skor1 = $data['ns_indikator1'] + $data['ns_indikator2'] + $data['ns_indikator3'] + $data['ns_indikator4'];
$total_skor2 = $data['ns_indikator5'] + $data['ns_indikator6'] + $data['ns_indikator7'] + $data['ns_indikator8'] +
    $data['ns_indikator9'] + $data['ns_indikator10'] + $data['ns_indikator11'] + $data['ns_indikator12'] +
    $data['ns_indikator13'] + $data['ns_indikator14'] + $data['ns_indikator15'] + $data['ns_indikator16'] +
    $data['ns_indikator17'];
$total_skor3 = $data['ns_indikator18'] + $data['ns_indikator19'] + $data['ns_indikator20'] + $data['ns_indikator21'] +
    $data['ns_indikator22'] + $data['ns_indikator23'] + $data['ns_indikator24'] + $data['ns_indikator25'] +
    $data['ns_indikator26'] + $data['ns_indikator27'] + $data['ns_indikator28'] + $data['ns_indikator29'] +
    $data['ns_indikator30'] + $data['ns_indikator31'] + $data['ns_indikator32'];
$total_skor4 = $data['ns_indikator33'] + $data['ns_indikator34'] + $data['ns_indikator35'] + $data['ns_indikator36'] +
    $data['ns_indikator37'] + $data['ns_indikator38'] + $data['ns_indikator39'];


// KOMPETENSI 1 
$persentasePenguasaan = ceil(($total_skor1 / 20) * 100);

if ($persentasePenguasaan <= 25) {
    $nilaiPenguasaan = '1';
} elseif ($persentasePenguasaan > 25 && $persentasePenguasaan <= 50) {
    $nilaiPenguasaan = '2';
} elseif ($persentasePenguasaan > 50 && $persentasePenguasaan <= 75) {
    $nilaiPenguasaan = '3';
} elseif ($persentasePenguasaan > 75 && $persentasePenguasaan <= 100) {
    $nilaiPenguasaan = '4';
}

// KOMPETENSI 2 
$persentaseKemahiran = ceil(($total_skor2 / 65) * 100);

if ($persentaseKemahiran <= 25) {
    $nilaiKemahiran = '1';
} elseif ($persentaseKemahiran > 25 && $persentaseKemahiran <= 50) {
    $nilaiKemahiran = '2';
} elseif ($persentaseKemahiran > 50 && $persentaseKemahiran <= 75) {
    $nilaiKemahiran = '3';
} elseif ($persentaseKemahiran > 75 && $persentaseKemahiran <= 100) {
    $nilaiKemahiran = '4';
}

// KOMPETENSI 3
$persentasePerilaku = ceil(($total_skor3 / 75) * 100);

if ($persentasePerilaku <= 25) {
    $nilaiPerilaku = '1';
} elseif ($persentasePerilaku > 25 && $persentasePerilaku <= 50) {
    $nilaiPerilaku = '2';
} elseif ($persentasePerilaku > 50 && $persentasePerilaku <= 75) {
    $nilaiPerilaku = '3';
} elseif ($persentasePerilaku > 75 && $persentasePerilaku <= 100) {
    $nilaiPerilaku = '4';
}

// KOMPETENSI 4 
$persentaseHubungan = ceil(($total_skor4 / 35) * 100);

if ($persentaseHubungan <= 25) {
    $nilaiHubungan = '1';
} elseif ($persentaseHubungan > 25 && $persentaseHubungan <= 50) {
    $nilaiHubungan = '2';
} elseif ($persentaseHubungan > 50 && $persentaseHubungan <= 75) {
    $nilaiHubungan = '3';
} elseif ($persentaseHubungan > 75 && $persentaseHubungan <= 100) {
    $nilaiHubungan = '4';
}

$jumlahKompetensi = $nilaiHubungan + $nilaiPerilaku + $nilaiKemahiran + $nilaiPenguasaan;



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
    <meta name="description" content="nonoono" />
    <meta name="author" content="tests" />
    <link rel="shortcut icon" href="../../assets/img/favicon.png">
    <title>Responsive Table</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/cetak-reset.css">

    <!--external css-->
    <link rel="stylesheet" type="text/css" href="../../assets/js/font-awesome/css/font-awesome.css" />

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/cetak.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/cetak-responsive.css" />
</head>

<style>
    @media print {
        @page {
            size: A4 portrait;
            width: auto;
            margin-top: -50px;
            margin-bottom: -125px;
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
                                                    PENILAIAN KINERJA GURU OLEH PESERTA DIDIK <br>
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
                                                    PENILAIAN KINERJA GURU OLEH PESERTA DIDIK <br>
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
                <div class="row" style="margin-top: -60px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU OLEH PESERTA DIDIK</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>Komponen 1: Penguasaan Materi</b></td>
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
                                                    1. Guru menyampaikan materi dengan contoh dalam kehidupan sehari-hari
                                                </td>
                                                <?php
                                                if ($data['ns_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator1'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator1'] == '5') { ?>
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
                                                    2. Guru menjelaskan pelajaran dari buku paket dan sumber lain
                                                </td>
                                                <?php
                                                if ($data['ns_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator2'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator2'] == '5') { ?>
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
                                                    3. Guru menjawab pertanyaan dengan benar dan jelas
                                                </td>
                                                <?php
                                                if ($data['ns_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator3'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator3'] == '5') { ?>
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
                                                    4. Guru mengajar sesuai dengan materi pelajaran
                                                </td>
                                                <?php
                                                if ($data['ns_indikator4'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator4'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator4'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator4'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator4'] == '5') { ?>
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
                                                <td>Persentase = (Total skor / 20) x 100%</td>
                                                <td style="text-align:center" colspan="5"><b><?php echo ceil(($total_skor1 / 20) * 100) ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk Kompetensi 1 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="5"><b><?= $nilaiPenguasaan ?></b></td>
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
                            <!-- <div style="text-align:right;padding:0 30px 20px 0">1</div> -->
                        </section>
                    </div>
                </div>
                <!-- page 3 end -->

                <!-- page 4 start -->
                <div class="row" style="margin-top: 20px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU OLEH PESERTA DIDIK</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered" style="font-size:11px;">
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>Komponen 2: Kemahiran dalam Mengajar</b></td>
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
                                                    1. Guru menyampaikan kegiatan belajar hari ini
                                                </td>
                                                <?php
                                                if ($data['ns_indikator5'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator5'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator5'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator5'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator5'] == '5') { ?>
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
                                                    2.Guru memberikan motivasi kepada saya dan teman-teman
                                                </td>
                                                <?php
                                                if ($data['ns_indikator6'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator6'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator6'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator6'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator6'] == '5') { ?>
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
                                                    3. Guru menyampaikan pelajaran dengan mudah dimengerti
                                                </td>
                                                <?php
                                                if ($data['ns_indikator7'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator7'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator7'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator7'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator7'] == '5') { ?>
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
                                                    4. Guru mengajar dengan bervariasi misalnya diskusi, tanya jawab, dll
                                                </td>
                                                <?php
                                                if ($data['ns_indikator8'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator8'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator8'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator8'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator8'] == '5') { ?>
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
                                                    5. Guru berbicara dengan jelas saat mengajar
                                                </td>
                                                <?php
                                                if ($data['ns_indikator9'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator9'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator9'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator9'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator9'] == '5') { ?>
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
                                                    6. Guru mengajar dengan menyenangkan dan menarik
                                                </td>
                                                <?php
                                                if ($data['ns_indikator10'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator10'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator10'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator10'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator10'] == '5') { ?>
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
                                                    7. Guru meminta saya dan teman-teman belajar secara berkelompok
                                                </td>
                                                <?php
                                                if ($data['ns_indikator11'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator11'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator11'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator11'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator11'] == '5') { ?>
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
                                                    8. Guru membimbing saya dan teman-teman ketika mengalami kesulitan dalam belajar
                                                </td>
                                                <?php
                                                if ($data['ns_indikator12'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator12'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator12'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator12'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator12'] == '5') { ?>
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
                                                    9. Guru membuat suasana kelas menjadi nyaman
                                                </td>
                                                <?php
                                                if ($data['ns_indikator13'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator13'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator13'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator13'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator13'] == '5') { ?>
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
                                                    10. Guru memberikan kesempaan kepada saya dan teman-teman untuk bertanya dan menjawab
                                                </td>
                                                <?php
                                                if ($data['ns_indikator14'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator14'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator14'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator14'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator14'] == '5') { ?>
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
                                                    11. Guru menghargai kemampuan saya dan teman-teman
                                                </td>
                                                <?php
                                                if ($data['ns_indikator15'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator15'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator15'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator15'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator15'] == '5') { ?>
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
                                                    12. Guru memberikan nilai
                                                </td>
                                                <?php
                                                if ($data['ns_indikator16'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator16'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator16'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator16'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator16'] == '5') { ?>
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
                                                    13. Guru memberikan tugas belajar dalam pembelajaran
                                                </td>
                                                <?php
                                                if ($data['ns_indikator17'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator17'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator17'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator17'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator17'] == '5') { ?>
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
                                                <td style="text-align:center" colspan="5"><b><?= $total_skor2 ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (Total skor / 65) x 100%</td>
                                                <td style="text-align:center" colspan="5"><b><?php echo ceil(($total_skor2 / 65) * 100) ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk Kompetensi 2 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="5"><b><?= $nilaiKemahiran ?></b></td>
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
                            <!-- <div style="text-align:right;padding:0 30px 20px 0">2</div> -->
                        </section>
                    </div>
                </div>
                <!-- page 4 end -->

                <!-- page 5 start -->
                <div class="row" style="margin-top: 20px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU OLEH PESERTA DIDIK</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered" style="font-size: 11px;">
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>Komponen 3: Perilaku Guru Sehari-hari</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td style="vertical-align:middle" class="center" width="3000" rowspan="2"><b>Indikator</b></td>
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
                                                    1. Guru mengajar dan mengajak saya dan teman-teman untuk berperilaku baik
                                                </td>
                                                <?php
                                                if ($data['ns_indikator18'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator18'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator18'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator18'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator18'] == '5') { ?>
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
                                                    2. Guru memberi contoh perilaku yang sesuai dengan aturan
                                                </td>
                                                <?php
                                                if ($data['ns_indikator19'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator19'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator19'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator19'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator19'] == '5') { ?>
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
                                                    3. Guru mengikuti ibadah setiap hari Jumat pagi
                                                </td>
                                                <?php
                                                if ($data['ns_indikator20'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator20'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator20'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator20'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator20'] == '5') { ?>
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
                                                    4. Guru berpakaian sopan dan rapi sesuai aturan sekolah
                                                </td>
                                                <?php
                                                if ($data['ns_indikator21'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator21'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator21'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator21'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator21'] == '5') { ?>
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
                                                    5. Guru bersikap adil dan tidak membeda-bedakan
                                                </td>
                                                <?php
                                                if ($data['ns_indikator22'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator22'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator22'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator22'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator22'] == '5') { ?>
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
                                                    6. Guru berbicara dengan sopan
                                                </td>
                                                <?php
                                                if ($data['ns_indikator23'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator23'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator23'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator23'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator23'] == '5') { ?>
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
                                                    7. Guru ramah
                                                </td>
                                                <?php
                                                if ($data['ns_indikator24'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator24'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator24'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator24'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator24'] == '5') { ?>
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
                                                    8. Guru sabar
                                                </td>
                                                <?php
                                                if ($data['ns_indikator25'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator25'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator25'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator25'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator25'] == '5') { ?>
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
                                                    9. Guru memulai pembelajaran tepat waktu
                                                </td>
                                                <?php
                                                if ($data['ns_indikator26'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator26'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator26'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator26'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator26'] == '5') { ?>
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
                                                    10. Guru memulai pelajaran dengan berdoa dan renungan
                                                </td>
                                                <?php
                                                if ($data['ns_indikator27'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator27'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator27'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator27'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator27'] == '5') { ?>
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
                                                    11. Guru mengakhiri pembelajaran dengan doa
                                                </td>
                                                <?php
                                                if ($data['ns_indikator28'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator28'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator28'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator28'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator28'] == '5') { ?>
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
                                                    12. Guru mengakhiri kegiatan belajar dengan tepat waktu
                                                </td>
                                                <?php
                                                if ($data['ns_indikator29'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator29'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator29'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator29'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator29'] == '5') { ?>
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
                                                    13. Guru memberikan tugas apabila berhalangan hadir
                                                </td>
                                                <?php
                                                if ($data['ns_indikator30'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator30'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator30'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator30'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator30'] == '5') { ?>
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
                                                    14. Guru menjaga kebersihan lingkungan
                                                </td>
                                                <?php
                                                if ($data['ns_indikator31'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator31'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator31'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator31'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator31'] == '5') { ?>
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
                                                    15. Guru tidak merokok
                                                </td>
                                                <?php
                                                if ($data['ns_indikator32'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator32'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator32'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator32'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator32'] == '5') { ?>
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
                                                <td>Total skor untuk Komponen 3</td>
                                                <td style="text-align:center" colspan="5"><b><?= $total_skor3 ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (Total skor / 75) x 100%</td>
                                                <td style="text-align:center" colspan="5"><b><?php echo ceil(($total_skor3 / 75) * 100) ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk Kompetensi 3 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="5"><b><?= $nilaiPerilaku ?></b></td>
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
                            <!-- <div style="text-align:right;padding:0 30px 20px 0">3</div> -->
                        </section>
                    </div>
                </div>
                <!-- page 5 end -->

                <!-- page 6 start -->
                <div class="row" style="font-size: 12px; margin-top:20px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style=" font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU OLEH PESERTA DIDIK</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>Komponen 4: Hubungan Sosial dengan Peserta Didik</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td style="vertical-align:middle" class="center" width="3000" rowspan="2"><b>Indikator</b></td>
                                                <td class="center" colspan="5"><b>Skor</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td width="25"><b>Tidak Pernah</b></td>
                                                <td width="25"><b>Kadang-kadang</b></td>
                                                <td width="25"><b>Agak Sering</b></td>
                                                <td width="25"><b>Sering</b></td>
                                                <td width="25"><b>Selalu</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru melibatkan aktif saya dan teman-teman dalam kegiatan belajar di kelas
                                                </td>
                                                <?php
                                                if ($data['ns_indikator33'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator33'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator33'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator33'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator33'] == '5') { ?>
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
                                                    2. Guru memperhatikan kebutuhan belajar saya dan teman-teman
                                                </td>
                                                <?php
                                                if ($data['ns_indikator34'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator34'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator34'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator34'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator34'] == '5') { ?>
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
                                                    3. Guru menyebutkan nama saya dan teman-teman selama kegiatan belajar
                                                </td>
                                                <?php
                                                if ($data['ns_indikator35'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator35'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator35'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator35'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator35'] == '5') { ?>
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
                                                    4. Guru memberi perhatian kepada saya dan teman-teman
                                                </td>
                                                <?php
                                                if ($data['ns_indikator36'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator36'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator36'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator36'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator36'] == '5') { ?>
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
                                                    5. Guru mudah dihubungi jika diperlukan
                                                </td>
                                                <?php
                                                if ($data['ns_indikator37'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator37'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator37'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator37'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator37'] == '5') { ?>
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
                                                    6. Guru akrab dengan saya dan teman-teman
                                                </td>
                                                <?php
                                                if ($data['ns_indikator38'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator38'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator38'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator38'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator38'] == '5') { ?>
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
                                                    7. Guru ikut dalam kegiatan sekolah seperti ibadah, upacara, perayaan natal, paskah, senam bersama, dll
                                                </td>
                                                <?php
                                                if ($data['ns_indikator39'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator39'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator39'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator39'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ns_indikator39'] == '5') { ?>
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
                                                <td>Total skor untuk Komponen 4</td>
                                                <td style="text-align:center" colspan="5"><?= $total_skor4 ?></td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (Total skor / 35) x 100%</td>
                                                <td style="text-align:center" colspan="5"><?php echo ceil(($total_skor4 / 35) * 100) ?> %</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk Kompetensi 4 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="5"><b><?= $nilaiHubungan ?></b></td>
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
                            <!-- <div style="text-align:right;padding:0 30px 20px 0">4</div> -->
                        </section>
                    </div>
                </div>
                <!-- page 6 end -->

                <!-- page 7 start-->
                <div class="row" style="margin-top: 50px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <div>
                                        <p style="text-align:center;font-size:18px"><b>REKAP HASIL PENILAIAN KINERJA GURU OLEH PESERTA DIDIK</b></p>
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
                                            <td>Penguasaan Materi</td>
                                            <td style="text-align:center" width="100"><?= $nilaiPenguasaan ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">2.</td>
                                            <td>Kemahiran dalam Mengajar</td>
                                            <td style="text-align:center" width="100"><?= $nilaiKemahiran ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">3.</td>
                                            <td>Perilaku Guru Sehari-hari</td>
                                            <td style="text-align:center" width="100"><?= $nilaiPerilaku ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">4.</td>
                                            <td>Hubungan Sosial dengan Peserta Didik</td>
                                            <td style="text-align:center" width="100"><?= $nilaiHubungan ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center" colspan="2"><b>Jumlah (Hasil penilaian kinerja guru)</b></td>
                                            <td style="text-align:center" width="100"><?= $jumlahKompetensi ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div>
                                    <p style="font-size:13px">*) Nilai diisi berdasarkan laporan dan evaluasi PK Guru oleh Peserta Didik. Nilai minimum per kompetensi = 1 dan nilai maksimum = 4</p>
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
                <!-- page 7 end -->


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
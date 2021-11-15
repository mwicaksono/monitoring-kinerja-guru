<?php
//error_reporting(0);   /* sembunyikan error untuk menampilkan pesan */
session_start();      /* memulai session */

/* panggil file untuk konfigurasi dan koneksi ke database */
include "../../includes/class_database.php";
include "../../includes/serverconfig.php";
include "../../includes/debug.php";
include "../../includes/fungsi_tanggal.php";
/* ------------------------------------------------------ */

$data = $db->database_fetch_array($db->database_prepare("SELECT a.*, b.*, c.*, c.nip as nipa,
                                                        d.nip as nipb,d.nama_guru as nama_gurub,d.gelar as gelarb,d.tempat_lahir as tempat_lahirb,d.tanggal_lahir as tanggal_lahirb,d.jenis_kelamin as jenis_kelaminb,d.status_pns as status_pnsb,d.no_seri_karpeg as no_seri_karpegb,d.pangkat_golongan as pangkat_golonganb,d.nuptk as nuptkb,d.nrg as nrgb,d.pendidikan_terakhir as pendidikan_terakhirb,d.mata_pelajaran as mata_pelajaranb,d.jabatan_fungsional as jabatan_fungsionalb,d.tanggal_bekerja as tanggal_bekerjab,d.masa_kerja as masa_kerjab,
                                                        e.*, f.*, g.*, h.*, i.*, j.*
                                                          FROM tbl_penilaian_internal AS a
                                                          JOIN tbl_periode AS b
                                                          JOIN tbl_guru AS c
                                                          JOIN tbl_guru AS d
                                                          JOIN pelayan AS e
                                                          JOIN akademik AS f
                                                          JOIN spiritual AS g
                                                          JOIN alkitab AS h
                                                          JOIN mentor AS i
                                                          JOIN karakter AS j
                                                          ON a.periode_nilai=b.id_periode 
                                                          AND a.guru_dinilai=c.nip
                                                          AND a.guru_penilai=d.nip
                                                          AND a.id_nilai=e.id_penilaian_pelayan
                                                          AND a.id_nilai=f.id_penilaian_akademik
                                                          AND a.id_nilai=g.id_penilaian_spiritual
                                                          AND a.id_nilai=h.id_penilaian_alkitab
                                                          AND a.id_nilai=i.id_penilaian_mentor
                                                          AND a.id_nilai=j.id_penilaian_karakter
                                                          WHERE a.id_nilai='$_GET[id]'")->execute());


$tanggal        = $data['tanggal_nilai'];
$potong_date    = substr($tanggal, 0, 10);
$tgld           = explode('-', $potong_date);
$date           = tgl_eng_to_ind($tgld[2] . "-" . $tgld[1] . "-" . $tgld[0]);

$tgl_bekerja       = $data['tanggal_bekerja'];
$tglc              = explode('-', $tgl_bekerja);
$tanggal_bekerja   = tgl_eng_to_ind($tglc[2] . "-" . $tglc[1] . "-" . $tglc[0]);


$tgl_awal       = $data['tanggal_awal'];
$tgla           = explode('-', $tgl_awal);
$tanggal_awal   = tgl_eng_to_ind(isset($tgla[2]) . "-" . isset($tgla[1]) . "-" . $tgla[0]);

$tgl_akhir       = $data['tanggal_akhir'];
$tglb            = explode('-', $tgl_akhir);
$tanggal_akhir   = tgl_eng_to_ind(isset($tglb[2]) . "-" . isset($tglb[1]) . "-" . $tglb[0]);

$tgl_bekerja       = $data['tanggal_bekerja'];
$tglc              = explode('-', $tgl_bekerja);
$tanggal_bekerja   = tgl_eng_to_ind($tglc[2] . "-" . $tglc[1] . "-" . $tglc[0]);

$tgl_lahir       = $data['tanggal_lahir'];
$tgle             = explode('-', $tgl_lahir);
$tanggal_lahir   = tgl_eng_to_ind($tgle[2] . "-" . $tgle[1] . "-" . $tgle[0]);


$tanggal_nilai  = $date;

$data_sekolah = $db->database_fetch_array($db->database_prepare(" SELECT * FROM tbl_sekolah
                                                                  WHERE id_sekolah = '1'")->execute());

$data_kepsek = $db->database_fetch_array($db->database_prepare("SELECT a.*, b.* FROM tbl_guru as a JOIN tbl_user as b ON a.nip = b.nip
                                                                WHERE b.level = 'Kepala Sekolah'")->execute());


// NILAI KOMPETENSI
// TUPOKSI 1 : Pelayan Iman
$persentaseIman = ceil(($data['ny_total_skor'] / 155) * 100);

if ($persentaseIman <= 25) {
    $nilaiIman = '1';
} elseif ($persentaseIman > 25 && $persentaseIman <= 50) {
    $nilaiIman = '2';
} elseif ($persentaseIman > 50 && $persentaseIman <= 75) {
    $nilaiIman = '3';
} elseif ($persentaseIman > 75 && $persentaseIman <= 100) {
    $nilaiIman = '4';
}

// TUPOKSI 2 : Pemimpin Akademik
$persentaseAkademik = ceil(($data['na_total_skor'] / 70) * 100);

if ($persentaseAkademik <= 25) {
    $nilaiAkademik = '1';
} elseif ($persentaseAkademik > 25 && $persentaseAkademik <= 50) {
    $nilaiAkademik = '2';
} elseif ($persentaseAkademik > 50 && $persentaseAkademik <= 75) {
    $nilaiAkademik = '3';
} elseif ($persentaseAkademik > 75 && $persentaseAkademik <= 100) {
    $nilaiAkademik = '4';
}

// TUPOKSI 3 : Pemimpin Spiritual
$persentaseSpiritual = ceil(($data['nr_total_skor'] / 80) * 100);

if ($persentaseSpiritual <= 25) {
    $nilaiSpiritual = '1';
} elseif ($persentaseSpiritual > 25 && $persentaseSpiritual <= 50) {
    $nilaiSpiritual = '2';
} elseif ($persentaseSpiritual > 50 && $persentaseSpiritual <= 75) {
    $nilaiSpiritual = '3';
} elseif ($persentaseSpiritual > 75 && $persentaseSpiritual <= 100) {
    $nilaiSpiritual = '4';
}

// TUPOKSI 4 : Model Peran Alkitab
$persentaseAlkitab = ceil(($data['nk_total_skor'] / 45) * 100);

if ($persentaseAlkitab <= 25) {
    $nilaiAlkitab = '1';
} elseif ($persentaseAlkitab > 25 && $persentaseAlkitab <= 50) {
    $nilaiAlkitab = '2';
} elseif ($persentaseAlkitab > 50 && $persentaseAlkitab <= 75) {
    $nilaiAlkitab = '3';
} elseif ($persentaseAlkitab > 75 && $persentaseAlkitab <= 100) {
    $nilaiAlkitab = '4';
}

// TUPOKSI 5 : Mentor
$persentaseMentor = ceil(($data['nm_total_skor'] / 115) * 100);

if ($persentaseMentor <= 25) {
    $nilaiMentor = '1';
} elseif ($persentaseMentor > 25 && $persentaseMentor <= 50) {
    $nilaiMentor = '2';
} elseif ($persentaseMentor > 50 && $persentaseMentor <= 75) {
    $nilaiMentor = '3';
} elseif ($persentaseMentor > 75 && $persentaseMentor <= 100) {
    $nilaiMentor = '4';
}

// TUPOKSI 6 : Model Pendidik Karakter
$persentaseKarakter = ceil(($data['nt_total_skor'] / 190) * 100);

if ($persentaseKarakter <= 25) {
    $nilaiKarakter = '1';
} elseif ($persentaseKarakter > 25 && $persentaseKarakter <= 50) {
    $nilaiKarakter = '2';
} elseif ($persentaseKarakter > 50 && $persentaseKarakter <= 75) {
    $nilaiKarakter = '3';
} elseif ($persentaseKarakter > 75 && $persentaseKarakter <= 100) {
    $nilaiKarakter = '4';
}

$jumlahTupoksi = $nilaiIman + $nilaiAkademik + $nilaiSpiritual + $nilaiMentor + $nilaiKarakter;

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

<body onload="window.print();">

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
                                                <th style="font-size:15px" colspan="3"> <br>
                                                    <img src="../../assets/img/favicon.png" height="150"> <br><br>
                                                    DOKUMEN <br>
                                                    PENILAIAN KINERJA GURU SEKOLAH DASAR BERBASIS TUGAS POKOK DAN FUNGSI<br>
                                                    YP EBEN HAEZER GKI SALATIGA <br><br>
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
                                                <td width="500"><?php echo $tanggal_awal; ?> s/d <?php echo $tanggal_akhir; ?> <?php echo $data['tahun_ajaran']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">11</td>
                                                <td width="350">NAMA PENILAI</td>
                                                <td width="500"><?php echo $data['nama_gurub']; ?></td>
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
                                                    PENILAIAN KINERJA GURU SEKOLAH DASAR BERBASIS TUGAS POKOK DAN FUNGSI<br><br>
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
                                                <td width="500"><?php echo $tanggal_bekerja; ?></td>
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
                                                <td width="300"><?= $data['nama_gurub'] ?>, <?= $data['gelarb'] ?></td>
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
                <div class="row" style="margin-top: -50px; font-size:12px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN PENILAIAN KINERJA GURU SEKOLAH DASAR BERBASIS TUGAS POKOK DAN FUNGSI</b><br>
                                        </p>
                                        <p>Tupoksi 1: Pelayan Iman</p>
                                    </div>
                                    <table class="table table-bordered text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>Hadir dan Melayani</b></td>
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
                                                    1. Guru mendisiplinkan peserta didik sesuai dengan prinsip Alkitab
                                                </td>
                                                <?php
                                                if ($data['ny_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator1'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator1'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
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
                                                    2. Guru menuntun, membimbing, dan mengarahkan peserta didik kepada kebenaran
                                                </td>
                                                <?php
                                                if ($data['ny_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator2'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator2'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator2'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru bertanggung jawab, membina, dan memajukan kehidupan rohani peserta didik
                                                </td>
                                                <?php
                                                if ($data['ny_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator3'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator3'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator3'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4. Guru melayani peserta didik tanpa diskriminasi
                                                </td>
                                                <?php
                                                if ($data['ny_indikator4'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator4'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator4'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator4'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator4'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5. Guru memberikan kesempatan kedua bagi peserta didik jika gagal berperilaku tidak hanya sekedar memberikan hukuman
                                                </td>
                                                <?php
                                                if ($data['ny_indikator5'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator5'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator5'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator5'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator5'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    6. Guru membangun ingatan peserta didik dengan kata-kata yang baik melalui ayat Alkitab
                                                </td>
                                                <?php
                                                if ($data['ny_indikator6'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator6'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator6'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator6'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator6'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    7. Guru memberikan pengajaran dengan kasih dan tegas
                                                </td>
                                                <?php
                                                if ($data['ny_indikator7'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator7'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator7'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator7'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator7'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    8. Guru menunjukkan kepribadian yang mantap dan stabil, dewasa, arif, berwibawa, berbudi luhur serta layak dijadikan teladan dapat memberikan pelajaran bagi siswa
                                                </td>
                                                <?php
                                                if ($data['ny_indikator8'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator8'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator8'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator8'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator8'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    9. Guru menjelaskan pentingnya menyampaikan kebenaran tentang Firman Tuhan
                                                </td>
                                                <?php
                                                if ($data['ny_indikator9'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator9'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator9'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator9'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator9'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    10. Guru menjadi orang tua yang mereka segani
                                                </td>
                                                <?php
                                                if ($data['ny_indikator10'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator10'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator10'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator10'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator10'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td colspan="6"><b>Memimpin</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru mengawali pelajaran dengan berdoa dan renungan
                                                </td>
                                                <?php
                                                if ($data['ny_indikator11'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator11'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator11'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator11'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator11'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Guru mengajak peserta didik untuk memuji Tuhan di awal pelajaran
                                                </td>
                                                <?php
                                                if ($data['ny_indikator12'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator12'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator12'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator12'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator12'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru mengakhiri pelajaran dengan berdoa
                                                </td>
                                                <?php
                                                if ($data['ny_indikator13'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator13'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator13'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator13'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator13'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4. Guru memberikan kesempatan kepada peserta didik untuk memimpin doa dan renungan
                                                </td>
                                                <?php
                                                if ($data['ny_indikator14'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator14'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator14'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator14'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator14'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5. Guru memberi kesempatan kepada peserta didik untuk memimpin pujian di awal pelajaran
                                                </td>
                                                <?php
                                                if ($data['ny_indikator15'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator15'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator15'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator15'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator15'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>

                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 3 end -->

                <!-- page 3.1 start -->
                <div class="row" style="font-size:12px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <table class="table table-bordered text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>Kepedulian</b></td>
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
                                                    1. Guru memberikan pengajaran dengan kasih
                                                </td>
                                                <?php
                                                if ($data['ny_indikator16'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator16'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator16'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator16'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator16'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Guru menerapkan disiplin kepada peserta didik
                                                </td>
                                                <?php
                                                if ($data['ny_indikator17'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator17'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator17'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator17'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator17'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru melakukan <i>home visit</i> ketika ada peserta didik yang bermasalah
                                                </td>
                                                <?php
                                                if ($data['ny_indikator18'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator18'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator18'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator18'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator18'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4. Guru membicarakan perilaku baik dan buruk dengan peserta didik beserta dengan konsekuensinya
                                                </td>
                                                <?php
                                                if ($data['ny_indikator19'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator19'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator19'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator19'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator19'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5. Guru memberikan pujian dan dukungan kepada peserta didik yang mampu menjawab pertanyaan, bercerita, dan berperilaku baik
                                                </td>
                                                <?php
                                                if ($data['ny_indikator20'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator20'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator20'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator20'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator20'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5. Guru memberikan <i>reward</i> kepada peserta didik atas prestasi atau setelah melakukan hal yang baik dan benar
                                                </td>
                                                <?php
                                                if ($data['ny_indikator21'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator21'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator21'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator21'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator21'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    7. Guru memperkenalkan hal yang baik dan buruk melalui percakapan
                                                </td>
                                                <?php
                                                if ($data['ny_indikator22'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator22'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator22'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator22'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator22'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 3.1 end -->

                <!-- page 3.2 start -->
                <div class="row" style="margin-top:50px; font-size:12px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <table class="table table-bordered text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>Mengenal Peserta Didik</b></td>
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
                                                    1. Guru memahami pribadi masing-masing peserta didik
                                                </td>
                                                <?php
                                                if ($data['ny_indikator23'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator23'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator23'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator23'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator23'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Guru mengenal karakteristik peserta didik
                                                </td>
                                                <?php
                                                if ($data['ny_indikator24'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator24'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator24'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator24'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator24'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru mengajak berdiskusi mengenai konsep-konsep watak
                                                </td>
                                                <?php
                                                if ($data['ny_indikator25'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator25'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator25'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator25'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator25'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4. Guru mampu mengajarkan peserta didik dalam membentuk kepribadian mereka sama seperti Kristus melalui keterampilan dan seni
                                                </td>
                                                <?php
                                                if ($data['ny_indikator26'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator26'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator26'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator26'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator26'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5. Guru memperlengkapi peserta didik dengan berbagai kebutuhan agar bertumbuh di dalam Yesus Kristus
                                                </td>
                                                <?php
                                                if ($data['ny_indikator27'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator27'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator27'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator27'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator27'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    6. Guru mampu menjadi pelatih sebab pendidikan dan pembelajaran memerlukan latihan dan keterampilan baik intelektual maupun motorik
                                                </td>
                                                <?php
                                                if ($data['ny_indikator28'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator28'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator28'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator28'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator28'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    7. Guru dapat menjadi teman dan sahabat siswa
                                                </td>
                                                <?php
                                                if ($data['ny_indikator29'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator29'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator29'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator29'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator29'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    8. Guru memiliki komunikasi yang baik dengan siswa
                                                </td>
                                                <?php
                                                if ($data['ny_indikator30'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator30'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator30'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator30'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator30'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    9. Guru memahami kebutuhan atau keperluan peserta didik dalam proses belajar melalui fasilitator pendidik.
                                                </td>
                                                <?php
                                                if ($data['ny_indikator31'] == '1') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator31'] == '2') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator31'] == '3') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>3</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator31'] == '4') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['ny_indikator31'] == '5') { ?>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">3</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Total Skor</td>
                                                <td style="text-align:center" colspan="5"><b><?= $data['ny_total_skor'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum tupoksi 1 = jumlah indikator × 5</td>
                                                <td style="text-align:center" colspan="5">155</b></td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (Total skor / 155) x 100%</td>
                                                <td style="text-align:center" colspan="5"><b><?php echo ceil(($data['ny_total_skor'] / 155) * 100) ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk Tupoksi 1 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="5"><b><?= $nilaiIman ?></b></td>
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
                                            <?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?>
                                        </span>
                                        <br>
                                        <span style="border-top:1px solid #bcbcbc">
                                            NIY <?php echo $data['nipb']; ?>
                                        </span>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 3.2 end -->

                <!-- page 4 start -->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN PENILAIAN KINERJA GURU SEKOLAH DASAR BERBASIS TUGAS POKOK DAN FUNGSI</b><br>
                                        </p>
                                        <p>Tupoksi 2: Pemimpin Akademik</p>
                                    </div>
                                    <table class="table table-bordered text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>Melakukan Inovasi</b></td>
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
                                                    1. Guru mempelajari berbagai bidang ilmu dan teknologi
                                                </td>
                                                <?php
                                                if ($data['na_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator1'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator1'] == '5') { ?>
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
                                                    2. Membangun suasana yang menyenangkan sehingga muncul ide-ide kreatif
                                                </td>
                                                <?php
                                                if ($data['na_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator2'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator2'] == '5') { ?>
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
                                                    3. Memanfaatkan berbagai sumber daya dengan menggunakan berbagai sumber untuk mendapatkan ide dan inspirasi
                                                </td>
                                                <?php
                                                if ($data['na_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator3'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator3'] == '5') { ?>
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
                                                    4. Berpikiran luas, mengkomibinasikan ide-ide secara unik dan mengaitkan ide-ide yang tidak terkait menjadi temuan baru
                                                </td>
                                                <?php
                                                if ($data['na_indikator4'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator4'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator4'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator4'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator4'] == '5') { ?>
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
                                                    5. Guru memiliki pengetahuan yang luas, mendalam, dan terkini
                                                </td>
                                                <?php
                                                if ($data['na_indikator5'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator5'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator5'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator5'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator5'] == '5') { ?>
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
                                                    6. Guru tidak hanya mampu menjelaskan tentang materi yang diajarkan, tetapi juga dapat membantu peserta didiknya memahami manfaat atau kegunaan dari proses belajar yang tengah berlangsung
                                                </td>
                                                <?php
                                                if ($data['na_indikator6'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator6'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator6'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator6'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator6'] == '5') { ?>
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
                                                <td colspan="6"><b>Berkolaborasi</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Secara proaktif berusaha membangun hubungan kerja sama yang efektif dengan peserta didik
                                                </td>
                                                <?php
                                                if ($data['na_indikator7'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator7'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator7'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator7'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator7'] == '5') { ?>
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
                                                    2. Mengembangkan ide-ide yang muncul baik dari diri sendiri maupun orang lain mengenai masalah-masalah yang ada untuk menjadi alternatif baru
                                                </td>
                                                <?php
                                                if ($data['na_indikator8'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator8'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator8'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator8'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator8'] == '5') { ?>
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
                                                    3. Memberi prioritas tujuan organisasi/ kelompok daripada tujuan pribadi
                                                </td>
                                                <?php
                                                if ($data['na_indikator9'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator9'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator9'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator9'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator9'] == '5') { ?>
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
                                                    4. Menciptakan hubungan interpersonal yang baik dengan cara membantu orang lain untuk merasa dihargai, dihormati, dilibatkan dalam diskusi yang berlangsung (meningkatkan harga diri, berempati, melibatkan, terbuka, mendukung)
                                                </td>
                                                <?php
                                                if ($data['na_indikator10'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator10'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator10'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator10'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator10'] == '5') { ?>
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
                                                    5. Mendapatkan persetujuan dari rekan kerja untuk mendukung ide-ide untuk mengambil tindakan yang berorientasi pada kemitraan. Dapat menjelaskan maksud dari setiap tujuan dengan logika yang tepat
                                                </td>
                                                <?php
                                                if ($data['na_indikator11'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator11'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator11'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator11'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator11'] == '5') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 4 end -->

                <!-- page 4.1 start -->
                <div class="row" style="margin-top: 100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <table class="table table-bordered text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>Komunikasi</b></td>
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
                                                    1. Guru dapat membangun hubungan saling percaya dengan orang tua dan peserta didik melalui komunikasi yang terbuka dan jujur
                                                </td>
                                                <?php
                                                if ($data['na_indikator12'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator12'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator12'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator12'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator12'] == '5') { ?>
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
                                                    2. Guru memastikan kehadiran baik di kelas maupun dalam setiap permasalahan yang ada
                                                </td>
                                                <?php
                                                if ($data['na_indikator13'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator13'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator13'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator13'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator13'] == '5') { ?>
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
                                                    3. Guru fokus dengan apa yang dibicarakan, dapat menjadi pendengar bukan pendebat, bukan untuk marah, menasihati atau melarang.
                                                </td>
                                                <?php
                                                if ($data['na_indikator14'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator14'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator14'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator14'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['na_indikator14'] == '5') { ?>
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
                                                <td>Total Skor</td>
                                                <td style="text-align:center" colspan="5"><b><?= $data['na_total_skor'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum tupoksi 1 = jumlah indikator × 5</td>
                                                <td style="text-align:center" colspan="5">70</b></td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (Total skor / 70) x 100%</td>
                                                <td style="text-align:center" colspan="5"><b><?php echo ceil(($data['na_total_skor'] / 70) * 100) ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk Tupoksi 2 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="5"><b><?= $nilaiAkademik ?></b></td>
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
                                            <?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?>
                                        </span>
                                        <br>
                                        <span style="border-top:1px solid #bcbcbc">
                                            NIY <?php echo $data['nipb']; ?>
                                        </span>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 4.1 end -->

                <!-- page 5 start -->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN PENILAIAN KINERJA GURU SEKOLAH DASAR BERBASIS TUGAS POKOK DAN FUNGSI</b><br>
                                        </p>
                                        <p>Tupoksi 3: Pemimpin Spiritual</p>
                                    </div>
                                    <table class="table table-bordered text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>Religius</b></td>
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
                                                    1. Guru menunjukkan sikap takut akan Tuhan
                                                </td>
                                                <?php
                                                if ($data['nr_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator1'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator1'] == '5') { ?>
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
                                                    2. Menghargai keberadaan peserta didik sebagai ciptaan Tuhan yang berharga dan spesial
                                                </td>
                                                <?php
                                                if ($data['nr_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator2'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator2'] == '5') { ?>
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
                                                    3. Menunjukkan pribadi yang religius, cerdas secara spiritual dan emosional
                                                </td>
                                                <?php
                                                if ($data['nr_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator3'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator3'] == '5') { ?>
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
                                                <td colspan="6"><b>Jujur</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru menunjukkan sikap dan tindakan yang jujur
                                                </td>
                                                <?php
                                                if ($data['nr_indikator4'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator4'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator4'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator4'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator4'] == '5') { ?>
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
                                                    2. Bersikap dan bertindak adil terhadap peserta didik
                                                </td>
                                                <?php
                                                if ($data['nr_indikator5'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator5'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator5'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator5'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator5'] == '5') { ?>
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
                                                    3. Melakukan pekerjaannya sebagai panggilan dari hati nurani untuk melayani Tuhan
                                                </td>
                                                <?php
                                                if ($data['nr_indikator6'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator6'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator6'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator6'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator6'] == '5') { ?>
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
                                                    4. Guru melakukan pekerjaannya dengan semangat
                                                </td>
                                                <?php
                                                if ($data['nr_indikator7'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator7'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator7'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator7'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator7'] == '5') { ?>
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
                                                    5. Guru bersikap bijaksana dalam menghadapi dan menyelesaikan masalah berkaitan dengan kegiatan pembelajaran dan hubungan antar peserta didik dan orang tua siswa
                                                </td>
                                                <?php
                                                if ($data['nr_indikator8'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator8'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator8'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator8'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator8'] == '5') { ?>
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
                                                    6. Guru bersikap terbuka terhadap perubahan dengan melakukan perubahan/ inovasi dalam kegiatan pembelajaran tanpa meninggalkan nilai-nilai kekristenan
                                                </td>
                                                <?php
                                                if ($data['nr_indikator9'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator9'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator9'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator9'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator9'] == '5') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 5 end -->

                <!-- page 5.1 start -->
                <div class="row" style="margin-top: 50px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <table class="table table-bordered text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>Rendah Hati</b></td>
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
                                                    1. Guru mempunyai rasa cinta kasih terhadap peserta didik yang dididiknya
                                                </td>
                                                <?php
                                                if ($data['nr_indikator10'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator10'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator10'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator10'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator10'] == '5') { ?>
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
                                                    2. Guru memiliki disiplin yang tinggi tapi fleksibel dan cerdas
                                                </td>
                                                <?php
                                                if ($data['nr_indikator11'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator11'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator11'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator11'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator11'] == '5') { ?>
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
                                                    3. Guru mempunyai sikap rendah hati
                                                </td>
                                                <?php
                                                if ($data['nr_indikator12'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator12'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator12'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator12'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator12'] == '5') { ?>
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
                                                    4. Guru menjadi inspirator bagi peserta didik
                                                </td>
                                                <?php
                                                if ($data['nr_indikator13'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator13'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator13'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator13'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator13'] == '5') { ?>
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
                                                    5. Guru mempunyai hubungan yang harmoni, dekat, dan akrab dengan peserta didik
                                                </td>
                                                <?php
                                                if ($data['nr_indikator14'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator14'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator14'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator14'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator14'] == '5') { ?>
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
                                                    6. Guru mempunyai hubungan yang harmoni, dekat, dan akrab dengan sesama teman sejawat
                                                </td>
                                                <?php
                                                if ($data['nr_indikator15'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator15'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator15'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator15'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator15'] == '5') { ?>
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
                                                    7. Guru memberikan pengalaman belajar kepada peserta didik
                                                </td>
                                                <?php
                                                if ($data['nr_indikator16'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator16'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator16'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator16'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nr_indikator16'] == '5') { ?>
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
                                                <td>Total Skor</td>
                                                <td style="text-align:center" colspan="5"><b><?= $data['nr_total_skor'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum tupoksi 1 = jumlah indikator × 5</td>
                                                <td style="text-align:center" colspan="5">80</b></td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (Total skor / 70) x 100%</td>
                                                <td style="text-align:center" colspan="5"><b><?php echo ceil(($data['nr_total_skor'] / 80) * 100) ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk Tupoksi 3 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="5"><b><?= $nilaiSpiritual ?></b></td>
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
                                            <?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?>
                                        </span>
                                        <br>
                                        <span style="border-top:1px solid #bcbcbc">
                                            NIY <?php echo $data['nipb']; ?>
                                        </span>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 5.1 end -->

                <!-- page 6 start -->
                <div class="row" style="margin-top: -50px; font-size:12px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN PENILAIAN KINERJA GURU SEKOLAH DASAR BERBASIS TUGAS POKOK DAN FUNGSI</b><br>
                                        </p>
                                        <p>Tupoksi 4: Model Peran Alkitab</p>
                                    </div>
                                    <table class="table table-bordered text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>Keteladanan</b></td>
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
                                                    1. Guru sebagai pendoa syafaat bagi peserta didik
                                                </td>
                                                <?php
                                                if ($data['nk_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator1'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator1'] == '5') { ?>
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
                                                    2. Guru mempunyai ketaatan dan kemauan untuk belajar
                                                </td>
                                                <?php
                                                if ($data['nk_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator2'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator2'] == '5') { ?>
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
                                                    3. Guru menunjukkan sikap setia dan tidak menunda-nunda pekerjaan
                                                </td>
                                                <?php
                                                if ($data['nk_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator3'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator3'] == '5') { ?>
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
                                                    4. Guru mendasari pengajarannya berdasarkan firman Allah
                                                </td>
                                                <?php
                                                if ($data['nk_indikator4'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator4'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator4'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator4'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator4'] == '5') { ?>
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
                                                    5. Guru menjadi wakil peserta didik di hadapan Allah
                                                </td>
                                                <?php
                                                if ($data['nk_indikator5'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator5'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator5'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator5'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator5'] == '5') { ?>
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
                                                    6. Guru bersikap tegas dalam menegakkan kebenaran baik kepada peserta didik maupun rekan guru
                                                </td>
                                                <?php
                                                if ($data['nk_indikator6'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator6'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator6'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator6'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator6'] == '5') { ?>
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
                                                    7. Guru mengembangkan komunitas belajar yang penuh kasih dan penuh perhatian di dalam kelas.
                                                </td>
                                                <?php
                                                if ($data['nk_indikator7'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator7'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator7'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator7'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator7'] == '5') { ?>
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
                                                    8. Guru bertanggung jawab dalam setiap proses belajar mengajarnya menjadikan fasilitas belajar menjadi berguna, menarik, mengundang kegairahan belajar, serta dirancang dengan baik, demi kepentingan proses belajar mengajar yang berhasil dan sesuai dengan firman Allah.
                                                </td>
                                                <?php
                                                if ($data['nk_indikator8'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator8'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator8'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator8'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator8'] == '5') { ?>
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
                                                    9. Guru tidak hanya mengajarkan seluruh disiplin ilmu pengetahuan yang ada di dunia, namun mengajarkan segala sesuatu yang bersumber dari kebenaran Firman Allah yang telah diintegrasikan dengan keseluruhan ilmu pengetahuan
                                                </td>
                                                <?php
                                                if ($data['nk_indikator9'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator9'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator9'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator9'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nk_indikator9'] == '5') { ?>
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
                                                <td>Total Skor</td>
                                                <td style="text-align:center" colspan="5"><b><?= $data['nk_total_skor'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum tupoksi 1 = jumlah indikator × 5</td>
                                                <td style="text-align:center" colspan="5">45</b></td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (Total skor / 70) x 100%</td>
                                                <td style="text-align:center" colspan="5"><b><?php echo ceil(($data['nk_total_skor'] / 45) * 100) ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk Tupoksi 4 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="5"><b><?= $nilaiAlkitab ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br><br>
                                    <div style="margin-left:450px; margin-top: -40px;">
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
                                            <?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?>
                                        </span>
                                        <br>
                                        <span style="border-top:1px solid #bcbcbc">
                                            NIY <?php echo $data['nipb']; ?>
                                        </span>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 6 end -->

                <!-- page 7 start -->
                <div class="row" style="margin-top: 50px; font-size:12px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN PENILAIAN KINERJA GURU SEKOLAH DASAR BERBASIS TUGAS POKOK DAN FUNGSI</b><br>
                                        </p>
                                        <p>Tupoksi 5: Mentor</p>
                                    </div>
                                    <table class="table table-bordered text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>Penasihat</b></td>
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
                                                    1. Guru mendengarkan setiap permasalahan yang dihadapi peserta didik
                                                </td>
                                                <?php
                                                if ($data['nm_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator1'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator1'] == '5') { ?>
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
                                                    2. Guru memberikan kesempatan kepada peserta didik untuk mengemukakan pendapatnya
                                                </td>
                                                <?php
                                                if ($data['nm_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator2'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator2'] == '5') { ?>
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
                                                    3. Guru menjadi pendengar yang baik, penuh pengertian dan perhatian kepada peserta didik
                                                </td>
                                                <?php
                                                if ($data['nm_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator3'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator3'] == '5') { ?>
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
                                                    4. Guru mengembangkan hubungan yang membawa peserta didik lebih terbuka terhadap pengarah positif dari guru 
                                                </td>
                                                <?php
                                                if ($data['nm_indikator4'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator4'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator4'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator4'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator4'] == '5') { ?>
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
                                                    5. Guru menghargai pendapat siswa dengan memberikan sebuah forum ketika mereka dapat mengutarakan pikiran dan perhatiannya
                                                </td>
                                                <?php
                                                if ($data['nm_indikator5'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator5'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator5'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator5'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator5'] == '5') { ?>
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
                                                    6. Guru membangun kepercayaan diri mereka, dan memberikan nasehat yang berkenaan dengan permasalahan sosial
                                                </td>
                                                <?php
                                                if ($data['nm_indikator6'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator6'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator6'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator6'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator6'] == '5') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 7 end -->

                <!-- page 7.1 start -->
                <div class="row" style="margin-top: 50px; font-size:12px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <table class="table table-bordered text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>Motivator</b></td>
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
                                                    1. Guru menyampaikan tujuan pembelajaran kepada peserta didik
                                                </td>
                                                <?php
                                                if ($data['nm_indikator7'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator7'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator7'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator7'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator7'] == '5') { ?>
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
                                                    2. Guru menciptakan suasana belajar yang menyenangkan
                                                </td>
                                                <?php
                                                if ($data['nm_indikator8'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator8'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator8'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator8'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator8'] == '5') { ?>
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
                                                    3. Guru memberikan pujian wajar kepada setiap keberhasilan peserta didik
                                                </td>
                                                <?php
                                                if ($data['nm_indikator9'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator9'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator9'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator9'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator9'] == '5') { ?>
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
                                                    4. Guru membantu peserta didik meraih kesuksesan di sekolah
                                                </td>
                                                <?php
                                                if ($data['nm_indikator10'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator10'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator10'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator10'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator10'] == '5') { ?>
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
                                                    5. Guru memberikan komentar membangun terhadap hasil belajar peserta didik
                                                </td>
                                                <?php
                                                if ($data['nm_indikator11'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator11'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator11'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator11'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator11'] == '5') { ?>
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
                                                    6. Guru memberikan penilaian hasil belajar peserta didik
                                                </td>
                                                <?php
                                                if ($data['nm_indikator12'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator12'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator12'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator12'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator12'] == '5') { ?>
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
                                                    7. Guru menciptakan persaingan dan kerja sama yang positif antar peserta didik
                                                </td>
                                                <?php
                                                if ($data['nm_indikator13'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator13'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator13'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator13'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator13'] == '5') { ?>
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
                                                    8. Guru memberikan pujian kepada peserta didik dalam bentuk lisan maupun melalui tulisan; meminta siswa selalu menulis jurnal dan guru menuliskan komentar sebagai respons atas masukan dari siswa
                                                </td>
                                                <?php
                                                if ($data['nm_indikator14'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator14'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator14'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator14'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator14'] == '5') { ?>
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
                                                    9. Guru membimbing peserta didik dengan cara mencoba mencari tahu, menguatkan, dan mengembangkan bakat khusus dan kelebihan setiap anak
                                                </td>
                                                <?php
                                                if ($data['nm_indikator15'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator15'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator15'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator15'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator15'] == '5') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 7.1 end -->

                <!-- page 7.2 start -->
                <div class="row" style="margin-top: 25px; font-size:12px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <table class="table table-bordered text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>Keteladanan</b></td>
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
                                                    1. Guru bersikap adil terhadap peserta didik
                                                </td>
                                                <?php
                                                if ($data['nm_indikator16'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator16'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator16'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator16'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator16'] == '5') { ?>
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
                                                    2. Guru merespons jawaban yang salah atau tidak lengkap peserta didik dengan baik dan mengurangi ketakutan pesertya didik untuk melakukan kesalahan
                                                </td>
                                                <?php
                                                if ($data['nm_indikator17'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator17'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator17'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator17'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator17'] == '5') { ?>
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
                                                    3. Guru mendiskusikan pentingnya moral bersama-sama dengan peserta didik, apalagi ketika permasalahan yang berkaitan dengan moral itu muncul di sekitar mereka
                                                </td>
                                                <?php
                                                if ($data['nm_indikator18'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator18'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator18'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator18'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator18'] == '5') { ?>
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
                                                    4. Guru memberikan komentar tentang etika secara personal yang dapat membantu para siswa mengerti mengapa tindakan seperti curang, mencuri, mengganggu, dan memanggil nama siswa lain dengan panggilan yang tidak semestinya adalah salah dan menyakitkan orang lain
                                                </td>
                                                <?php
                                                if ($data['nm_indikator19'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator19'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator19'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator19'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator19'] == '5') { ?>
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
                                                    5. Guru mengajarkan siswa untuk peduli terhadap nilai-nilai moral seperti kejujuran dan rasa hormat dengan menunjukkan dalamnya perasaan seseorang ketika nilai-nilai tersebut dilanggar
                                                </td>
                                                <?php
                                                if ($data['nm_indikator20'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator20'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator20'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator20'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator20'] == '5') { ?>
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
                                                    6. Guru bercerita yang dapat mengajarkan nilai-nilai yang baik 
                                                </td>
                                                <?php
                                                if ($data['nm_indikator21'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator21'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator21'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator21'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator21'] == '5') { ?>
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
                                                    7. Guru menggunakan pertemuan personal untuk memberikan umpan balik yang korektif ketika mereka membutuhkannya.
                                                </td>
                                                <?php
                                                if ($data['nm_indikator22'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator22'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator22'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator22'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator22'] == '5') { ?>
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
                                                    8. Guru mampu membimbing dan bertanggung jawab atas perjalanan dan perkembangan peserta didik
                                                </td>
                                                <?php
                                                if ($data['nm_indikator23'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator23'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator23'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator23'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nm_indikator23'] == '5') { ?>
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
                                                <td>Total Skor</td>
                                                <td style="text-align:center" colspan="5"><b><?= $data['nm_total_skor'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum tupoksi 1 = jumlah indikator × 5</td>
                                                <td style="text-align:center" colspan="5">115</b></td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (Total skor / 115) x 100%</td>
                                                <td style="text-align:center" colspan="5"><b><?php echo ceil(($data['nm_total_skor'] / 115) * 100) ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk Tupoksi 5 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="5"><b><?= $nilaiMentor ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br><br>
                                    <div style="margin-left:450px; margin-top:-40px;">
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
                                            <?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?>
                                        </span>
                                        <br>
                                        <span style="border-top:1px solid #bcbcbc">
                                            NIY <?php echo $data['nipb']; ?>
                                        </span>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 7.2 end -->

                <!-- page 8 start -->
                <div class="row" style="font-size:12px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN PENILAIAN KINERJA GURU SEKOLAH DASAR BERBASIS TUGAS POKOK DAN FUNGSI</b><br>
                                        </p>
                                        <p>Tupoksi 6: Pendidik Karakter</p>
                                    </div>
                                    <table class="table table-bordered text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td colspan="6"><b>Pembiasaan</b></td>
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
                                                    1. Guru datang tepat waktu
                                                </td>
                                                <?php
                                                if ($data['nt_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator1'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator1'] == '5') { ?>
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
                                                    2. Guru mengucapkan salam dengan ramah kepada peserta didik ketika memasuki ruangan kelas
                                                </td>
                                                <?php
                                                if ($data['nt_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator2'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator2'] == '5') { ?>
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
                                                    3. Guru berdoa dan renungan sebelum membuka pelajaran, dan peserta didik belajar memimpinnya
                                                </td>
                                                <?php
                                                if ($data['nt_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator3'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator3'] == '5') { ?>
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
                                                    4. Guru mengecek kehadiran peserta didik
                                                </td>
                                                <?php
                                                if ($data['nt_indikator4'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator4'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator4'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator4'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator4'] == '5') { ?>
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
                                                    5. Guru mendoakan peserta didikyang tidak hadir atau karena halangan lainnya
                                                </td>
                                                <?php
                                                if ($data['nt_indikator5'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator5'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator5'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator5'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator5'] == '5') { ?>
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
                                                    6. Guru menegur siswa yang terlambat dengan sopan
                                                </td>
                                                <?php
                                                if ($data['nt_indikator6'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator6'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator6'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator6'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator6'] == '5') { ?>
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
                                                    7. Guru mengaitkan materi yang akan diajarkan dengan karakter yang diharapkan
                                                </td>
                                                <?php
                                                if ($data['nt_indikator7'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator7'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator7'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator7'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator7'] == '5') { ?>
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
                                                    8. Guru menyampaikan butir-butir nilai yang akan dicapai dalam pembelajaran
                                                </td>
                                                <?php
                                                if ($data['nt_indikator8'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator8'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator8'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator8'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator8'] == '5') { ?>
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
                                                <td colspan="6"><b>Menanamkan Nilai-Nilai Kebaikan</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru memberikan iklim yang penuh kasih sayang, kebaikan, kebajikan, dan penghormatan
                                                </td>
                                                <?php
                                                if ($data['nt_indikator9'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator9'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator9'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator9'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator9'] == '5') { ?>
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
                                                    2. Guru memperlakukan murid-muridnya dengan kasih sayang, adil, dan hormat
                                                </td>
                                                <?php
                                                if ($data['nt_indikator10'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator10'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator10'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator10'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator10'] == '5') { ?>
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
                                                    3. Guru memberikan perhatian khusus secara individual, dan mengerti permasalahan setiap peserta didiknya
                                                </td>
                                                <?php
                                                if ($data['nt_indikator11'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator11'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator11'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator11'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator11'] == '5') { ?>
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
                                                    4. Guru menumbuhkan rasa percaya diri setiap peserta didik dengan dorongan atau pujian yang mempunyai sentuhan personal
                                                </td>
                                                <?php
                                                if ($data['nt_indikator12'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator12'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator12'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator12'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator12'] == '5') { ?>
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
                                                    5. Guru menjadi panutan bagi peserta didik dan senantiasa selalu memperbaiki citra dirinya
                                                </td>
                                                <?php
                                                if ($data['nt_indikator13'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator13'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator13'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator13'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator13'] == '5') { ?>
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
                                                    6. Guru mengoreksi kesalahan peserta didiknya yang salah secara lembut
                                                </td>
                                                <?php
                                                if ($data['nt_indikator14'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator14'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator14'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator14'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator14'] == '5') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 8 end -->

                <!-- page 8.1 start -->
                <div class="row" style="font-size:12px; margin-top:50px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <table class="table table-bordered text-nowrap">
                                        <tbody>
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
                                                    7. Guru menjelaskan pelajaran dengan semangat dan metode yang memukau sekan materi tersebut sesuatu yang baru, menarik, dan penting
                                                </td>
                                                <?php
                                                if ($data['nt_indikator15'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator15'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator15'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator15'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator15'] == '5') { ?>
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
                                                    8. Guru memiliki standar kualitas pribadi yang mencakup tanggung jawab, wibawa, mandiri dan disiplin.
                                                </td>
                                                <?php
                                                if ($data['nt_indikator16'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator16'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator16'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator16'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator16'] == '5') { ?>
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
                                                    9. Guru bersikap terbuka kepada siswa dalam menghadapi perkembangan zaman
                                                </td>
                                                <?php
                                                if ($data['nt_indikator17'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator17'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator17'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator17'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator17'] == '5') { ?>
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
                                                    10. Guru membantu peserta didik agar dapat mengembangkan potensi yang dimilikinya secara maksimal.
                                                </td>
                                                <?php
                                                if ($data['nt_indikator18'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator18'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator18'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator18'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator18'] == '5') { ?>
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
                                                    11. Guru memahami gaya belajar para siswa dan mengatur gaya mengajar mereka menurut gaya tersebut
                                                </td>
                                                <?php
                                                if ($data['nt_indikator19'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator19'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator19'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator19'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator19'] == '5') { ?>
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
                                                    12. Guru berperan sebagai orang tua kedua, yang memberi dan membangun motivasi peserta didik untuk belajar serta menambah wawasan dalam berbagai bidang
                                                </td>
                                                <?php
                                                if ($data['nt_indikator20'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator20'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator20'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator20'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator20'] == '5') { ?>
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
                                                    13. Guru mendampingi peserta didik dalam berbagai pergumulan dan permasalahan yang ada pada diri siswa.
                                                </td>
                                                <?php
                                                if ($data['nt_indikator21'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator21'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator21'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator21'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator21'] == '5') { ?>
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
                                                    14. Guru menjadi konselor bagi siswa yang memiliki masalah
                                                </td>
                                                <?php
                                                if ($data['nt_indikator22'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator22'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator22'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator22'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator22'] == '5') { ?>
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
                                                    15. Guru membimbing siswa dengan memberikan nasihat yang berdasar pada kebenaran firman Tuhan
                                                </td>
                                                <?php
                                                if ($data['nt_indikator23'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator23'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator23'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator23'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator23'] == '5') { ?>
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
                                                    16. Guru membimbing, memberikan pendampingan, perhatian, dan kasih yang tulus kepada siswa
                                                </td>
                                                <?php
                                                if ($data['nt_indikator24'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator24'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator24'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator24'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator24'] == '5') { ?>
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
                                                    17. Guru membangun karakter peserta didik dengan menanamkan kedisiplinan
                                                </td>
                                                <?php
                                                if ($data['nt_indikator25'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator25'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator25'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator25'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator25'] == '5') { ?>
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
                                                    18. Guru melibatkan orangtua dalam mendukung pembelajaran yang sudah diberikan oleh guru kepada peserta didik
                                                </td>
                                                <?php
                                                if ($data['nt_indikator26'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator26'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator26'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator26'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator26'] == '5') { ?>
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
                                                <td colspan="6"><b>Melaksanakan Perbuatan Baik</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru memajang gambar-gambar tokoh inspiratif di ruang kelas.
                                                </td>
                                                <?php
                                                if ($data['nt_indikator27'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator27'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator27'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator27'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator27'] == '5') { ?>
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
                                                    2. Guru meminta peserta didik mengungkapkan tokoh idolanya dan alasan mengidolakannya
                                                </td>
                                                <?php
                                                if ($data['nt_indikator28'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator28'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator28'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator28'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator28'] == '5') { ?>
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
                                                    3. Guru mengapresiasi peserta didik yang berprestasi
                                                </td>
                                                <?php
                                                if ($data['nt_indikator29'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator29'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator29'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator29'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator29'] == '5') { ?>
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
                                                    4. Guru membuat tata tertib di kelas yang disetujui dan disepakati bersama peserta didik
                                                </td>
                                                <?php
                                                if ($data['nt_indikator30'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator30'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator30'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator30'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator30'] == '5') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>5</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 8.1 end -->

                <!-- page 8.2 start -->
                <div class="row" style="font-size:12px; margin-top:50px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <table class="table table-bordered text-nowrap">
                                        <tbody>
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
                                                    5. Guru berkomunikasi dengan orang tua peserta didik untuk membicarakan kemajuan peserta didik
                                                </td>
                                                <?php
                                                if ($data['nt_indikator31'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator31'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator31'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator31'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator31'] == '5') { ?>
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
                                                    6. Guru melibatkan orangtua peserta didik dalam mengatasi perilaku tidak baik siswa dengan cara mengirimkan surat, memanggil orangtua atau melalui kunjungan ke rumah yang bersangkutan
                                                </td>
                                                <?php
                                                if ($data['nt_indikator32'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator32'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator32'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator32'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator32'] == '5') { ?>
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
                                                    7. Guru menekankan kepada peserta didik mengenai pentingnyakepedulian terhadap orang lain dan lingkungan
                                                </td>
                                                <?php
                                                if ($data['nt_indikator33'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator33'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator33'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator33'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator33'] == '5') { ?>
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
                                                    8. Guru mengajarkan sopan santun secara jelas.
                                                </td>
                                                <?php
                                                if ($data['nt_indikator34'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator34'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator34'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator34'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator34'] == '5') { ?>
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
                                                    9. Guru mengajarkan kepada peserta didik bagaimana mendengarkan orang lain dengan penuh perhatian dan tidak memotong pembicaraan orang lain.
                                                </td>
                                                <?php
                                                if ($data['nt_indikator35'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator35'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator35'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator35'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator35'] == '5') { ?>
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
                                                    10. Guru berani mengakui kesalahannya
                                                </td>
                                                <?php
                                                if ($data['nt_indikator36'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator36'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator36'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator36'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator36'] == '5') { ?>
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
                                                    11. Guru mengajarkan pentingnya sikap sportif / tidak curang dalam berolahraga, bermain, dan dalam berbagai bentuk interaksi dengan orang lain
                                                </td>
                                                <?php
                                                if ($data['nt_indikator37'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator37'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator37'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator37'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator37'] == '5') { ?>
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
                                                    12. Guru menunjukkan penghargaan terhadap siapapun yang berbeda keyakinan dan berbeda budaya
                                                </td>
                                                <?php
                                                if ($data['nt_indikator38'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator38'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator38'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                    <td style="text-align:center" width="100">4</td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator38'] == '4') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>4</b></span></td>
                                                    <td style="text-align:center" width="100">5</td>
                                                <?php
                                                } elseif ($data['nt_indikator38'] == '5') { ?>
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
                                                <td>Total Skor</td>
                                                <td style="text-align:center" colspan="5"><b><?= $data['nt_total_skor'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum tupoksi 1 = jumlah indikator × 5</td>
                                                <td style="text-align:center" colspan="5">190</b></td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (Total skor / 190) x 100%</td>
                                                <td style="text-align:center" colspan="5"><b><?php echo ceil(($data['nt_total_skor'] / 190) * 100) ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk Tupoksi 6 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="5"><b><?= $nilaiKarakter ?></b></td>
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
                                            <?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?>
                                        </span>
                                        <br>
                                        <span style="border-top:1px solid #bcbcbc">
                                            NIY <?php echo $data['nipb']; ?>
                                        </span>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 8.2 end -->

                <!-- page 9 start -->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <div>
                                        <p style="text-align:center;font-size:18px"><b>REKAP HASIL PENILAIAN KINERJA GURU SEKOLAH DASAR <br>BERBASIS TUGAS POKOK DAN FUNGSI</b></p>
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
                                            <th>TUPOKSI</th>
                                            <th>NILAI *)</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td style="text-align:center">1.</td>
                                            <td>Pelayan Iman</td>
                                            <td style="text-align:center" width="100"><?= $nilaiIman ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">2.</td>
                                            <td>Pemimpin Akademik</td>
                                            <td style="text-align:center" width="100"><?= $nilaiAkademik ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">3.</td>
                                            <td>Pemimpin Spiritual</td>
                                            <td style="text-align:center" width="100"><?= $nilaiSpiritual ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">4.</td>
                                            <td>Model Peran Alkitab</td>
                                            <td style="text-align:center" width="100"><?= $nilaiAlkitab ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">5.</td>
                                            <td>Mentor</td>
                                            <td style="text-align:center" width="100"><?= $nilaiMentor ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">6.</td>
                                            <td>Pendidik Karakter</td>
                                            <td style="text-align:center" width="100"><?= $nilaiKarakter ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center" colspan="2"><b>Jumlah (Hasil penilaian kinerja guru)</b></td>
                                            <td style="text-align:center" width="100"><?= $jumlahTupoksi ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div>
                                    <p style="font-size:13px">*) Nilai diisi berdasarkan laporan dan evaluasi PK Guru oleh Kepala Sekolah. Nilai minimum per kompetensi = 1 dan nilai maksimum = 4</p>
                                </div>
                                <br>
                                <div>
                                    <p style="margin-left:450px;font-size:14px"><?php echo $data_sekolah['kota']; ?>, <?php echo $tanggal_nilai; ?></p>
                                </div>
                                <table style="margin-left:20px">
                                    <tbody>
                                        <tr>
                                            <td width="300">Guru yang dinilai,</td>
                                            <td width="300"></td>
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
                <!-- page 9 end -->
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
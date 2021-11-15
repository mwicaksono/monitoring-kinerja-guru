<?php
//error_reporting(0);   /* sembunyikan error untuk menampilkan pesan */
session_start();      /* memulai session */

/* panggil file untuk konfigurasi dan koneksi ke database */
include "../../includes/class_database.php";
include "../../includes/serverconfig.php";
include "../../includes/debug.php";
include "../../includes/fungsi_tanggal.php";
/* ------------------------------------------------------ */

$data = $db->database_fetch_array($db->database_prepare("SELECT a.*,
                                                          b.id_periode,b.periode,b.tanggal_awal,b.tanggal_akhir,b.tahun_ajaran,
                                                          c.nip as nipa,c.nama_guru as nama_gurua,c.gelar as gelara,c.tempat_lahir as tempat_lahira,c.tanggal_lahir as tanggal_lahira,c.jenis_kelamin as jenis_kelamina,c.status_pns as status_pnsa,c.no_seri_karpeg as no_seri_karpega,c.pangkat_golongan as pangkat_golongana,c.nuptk as nuptka,c.nrg as nrga,c.pendidikan_terakhir as pendidikan_terakhira,c.mata_pelajaran as mata_pelajarana,c.jabatan_fungsional as jabatan_fungsionala,c.tanggal_bekerja as tanggal_bekerjaa,c.masa_kerja as masa_kerjaa,
                                                          d.nip as nipb,d.nama_guru as nama_gurub,d.gelar as gelarb,d.tempat_lahir as tempat_lahirb,d.tanggal_lahir as tanggal_lahirb,d.jenis_kelamin as jenis_kelaminb,d.status_pns as status_pnsb,d.no_seri_karpeg as no_seri_karpegb,d.pangkat_golongan as pangkat_golonganb,d.nuptk as nuptkb,d.nrg as nrgb,d.pendidikan_terakhir as pendidikan_terakhirb,d.mata_pelajaran as mata_pelajaranb,d.jabatan_fungsional as jabatan_fungsionalb,d.tanggal_bekerja as tanggal_bekerjab,d.masa_kerja as masa_kerjab,
                                                          e.id_pedagogik1,e.ap1_point1,e.ap1_point2,e.ap1_point3,e.ap1_point4,e.ap1_point5,e.ap1_point6,e.ap1_point7,e.ap1_point8,e.ap1_point9,e.ap1_point10,e.ap1_point11,e.ap1_point12,e.ap1_point13,e.ap1_point14,e.ap1_point15,e.ap1_point16,e.ap1_point17,e.np1_indikator1,e.np1_indikator2,e.np1_indikator3,e.np1_indikator4,e.np1_indikator5,e.np1_indikator6,e.np1_total_skor,e.np1_persentase,e.np1_nilai_kompetensi,
                                                          f.id_pedagogik2,f.ap2_point1,f.ap2_point2,f.ap2_point3,f.ap2_point4,f.ap2_point5,f.ap2_point6,f.ap2_point7,f.ap2_point8,f.ap2_point9,f.ap2_point10,f.ap2_point11,f.ap2_point12,f.ap2_point13,f.ap2_point14,f.ap2_point15,f.ap2_point16,f.ap2_point17,f.ap2_point18,f.np2_indikator1,f.np2_indikator2,f.np2_indikator3,f.np2_indikator4,f.np2_indikator5,f.np2_indikator6,f.np2_total_skor,f.np2_persentase,f.np2_nilai_kompetensi,
                                                          g.id_pedagogik3,g.ap3_point1,g.ap3_point2,g.ap3_point3,g.ap3_point4,g.ap3_point5,g.ap3_point6,g.ap3_point7,g.ap3_point8,g.ap3_point9,g.ap3_point10,g.ap3_point11,g.ap3_point12,g.ap3_point13,g.ap3_point14,g.np3_indikator1,g.np3_indikator2,g.np3_indikator3,g.np3_indikator4,g.np3_total_skor,g.np3_persentase,g.np3_nilai_kompetensi,
                                                          h.id_pedagogik4,h.ap4_point1,h.ap4_point2,h.ap4_point3,h.ap4_point4,h.ap4_point5,h.ap4_point6,h.ap4_point7,h.ap4_point8,h.ap4_point9,h.ap4_point10,h.ap4_point11,h.ap4_point12,h.ap4_point13,h.ap4_point14,h.ap4_point15,h.ap4_point16,h.ap4_point17,h.ap4_point18,h.ap4_point19,h.ap4_point20,h.ap4_point21,h.ap4_point22,h.ap4_point23,h.ap4_point24,h.ap4_point25,h.ap4_point26,h.np4_indikator1,h.np4_indikator2,h.np4_indikator3,h.np4_indikator4,h.np4_indikator5,h.np4_indikator6,h.np4_indikator7,h.np4_indikator8,h.np4_indikator9,h.np4_indikator10,h.np4_indikator11,h.np4_total_skor,h.np4_persentase,h.np4_nilai_kompetensi,
                                                          i.id_pedagogik5,i.ap5_point1,i.ap5_point2,i.ap5_point3,i.ap5_point4,i.ap5_point5,i.ap5_point6,i.ap5_point7,i.ap5_point8,i.ap5_point9,i.ap5_point10,i.ap5_point11,i.ap5_point12,i.ap5_point13,i.ap5_point14,i.ap5_point15,i.ap5_point16,i.ap5_point17,i.ap5_point18,i.ap5_point19,i.ap5_point20,i.ap5_point21,i.ap5_point22,i.ap5_point23,i.np5_indikator1,i.np5_indikator2,i.np5_indikator3,i.np5_indikator4,i.np5_indikator5,i.np5_indikator6,i.np5_indikator7,i.np5_total_skor,i.np5_persentase,i.np5_nilai_kompetensi,
                                                          j.id_pedagogik6,j.ap6_point1,j.ap6_point2,j.ap6_point3,j.ap6_point4,j.ap6_point5,j.ap6_point6,j.ap6_point7,j.ap6_point8,j.ap6_point9,j.ap6_point10,j.ap6_point11,j.ap6_point12,j.ap6_point13,j.ap6_point14,j.ap6_point15,j.ap6_point16,j.ap6_point17,j.ap6_point18,j.ap6_point19,j.np6_indikator1,j.np6_indikator2,j.np6_indikator3,j.np6_indikator4,j.np6_indikator5,j.np6_indikator6,j.np6_total_skor,j.np6_persentase,j.np6_nilai_kompetensi,
                                                          k.id_pedagogik7,k.ap7_point1,k.ap7_point2,k.ap7_point3,k.ap7_point4,k.ap7_point5,k.ap7_point6,k.ap7_point7,k.ap7_point8,k.ap7_point9,k.ap7_point10,k.ap7_point11,k.ap7_point12,k.ap7_point13,k.ap7_point14,k.ap7_point15,k.ap7_point16,k.ap7_point17,k.np7_indikator1,k.np7_indikator2,k.np7_indikator3,k.np7_indikator4,k.np7_indikator5,k.np7_total_skor,k.np7_persentase,k.np7_nilai_kompetensi,
                                                          l.id_kepribadian1,l.ak1_point1,l.ak1_point2,l.ak1_point3,l.ak1_point4,l.ak1_point5,l.ak1_point6,l.ak1_point7,l.ak1_point8,l.nk1_indikator1,l.nk1_indikator2,l.nk1_indikator3,l.nk1_indikator4,l.nk1_indikator5,l.nk1_total_skor,l.nk1_persentase,l.nk1_nilai_kompetensi,
                                                          m.id_kepribadian2,m.ak2_point1,m.ak2_point2,m.ak2_point3,m.ak2_point4,m.ak2_point5,m.ak2_point6,m.ak2_point7,m.ak2_point8,m.ak2_point9,m.nk2_indikator1,m.nk2_indikator2,m.nk2_indikator3,m.nk2_indikator4,m.nk2_indikator5,m.nk2_total_skor,m.nk2_persentase,m.nk2_nilai_kompetensi,
                                                          n.id_kepribadian3,n.ak3_point1,n.ak3_point2,n.ak3_point3,n.ak3_point4,n.ak3_point5,n.ak3_point6,n.ak3_point7,n.ak3_point8,n.ak3_point9,n.ak3_point10,n.ak3_point11,n.nk3_indikator1,n.nk3_indikator2,n.nk3_indikator3,n.nk3_indikator4,n.nk3_indikator5,n.nk3_indikator6,n.nk3_indikator7,n.nk3_indikator8,n.nk3_total_skor,n.nk3_persentase,n.nk3_nilai_kompetensi,
                                                          o.id_sosial1,o.as1_point1,o.as1_point2,o.as1_point3,o.as1_point4,o.as1_point5,o.as1_point6,o.as1_point7,o.as1_point8,o.ns1_indikator1,o.ns1_indikator2,o.ns1_indikator3,o.ns1_total_skor,o.ns1_persentase,o.ns1_nilai_kompetensi,
                                                          p.id_sosial2,p.as2_point1,p.as2_point2,p.as2_point3,p.ns2_indikator1,p.ns2_indikator2,p.ns2_indikator3,p.ns2_total_skor,p.ns2_persentase,p.ns2_nilai_kompetensi,
                                                          q.id_profesional1,q.apf1_point1,q.apf1_point2,q.apf1_point3,q.apf1_point4,q.apf1_point5,q.apf1_point6,q.apf1_point7,q.apf1_point8,q.apf1_point9,q.apf1_point10,q.npf1_indikator1,q.npf1_indikator2,q.npf1_indikator3,q.npf1_total_skor,q.npf1_persentase,q.npf1_nilai_kompetensi,
                                                          r.id_profesional2,r.apf2_point1,r.apf2_point2,r.apf2_point3,r.apf2_point4,r.apf2_point5,r.apf2_point6,r.npf2_indikator1,r.npf2_indikator2,r.npf2_indikator3,r.npf2_indikator4,r.npf2_indikator5,r.npf2_indikator6,r.npf2_total_skor,r.npf2_persentase,r.npf2_nilai_kompetensi
                                                          FROM tbl_penilaian AS a
                                                          JOIN tbl_periode AS b
                                                          JOIN tbl_guru AS c
                                                          JOIN tbl_guru AS d
                                                          JOIN pedagogik1 AS e
                                                          JOIN pedagogik2 AS f
                                                          JOIN pedagogik3 AS g
                                                          JOIN pedagogik4 AS h
                                                          JOIN pedagogik5 AS i
                                                          JOIN pedagogik6 AS j
                                                          JOIN pedagogik7 AS k
                                                          JOIN kepribadian1 AS l
                                                          JOIN kepribadian2 AS m
                                                          JOIN kepribadian3 AS n
                                                          JOIN sosial1 AS o
                                                          JOIN sosial2 AS p
                                                          JOIN profesional1 AS q
                                                          JOIN profesional2 AS r
                                                          ON a.periode_nilai=b.id_periode 
                                                          AND a.guru_dinilai=c.nip
                                                          AND a.guru_penilai=d.nip
                                                          AND a.id_nilai=e.id_pedagogik1
                                                          AND a.id_nilai=f.id_pedagogik2
                                                          AND a.id_nilai=g.id_pedagogik3
                                                          AND a.id_nilai=h.id_pedagogik4
                                                          AND a.id_nilai=i.id_pedagogik5
                                                          AND a.id_nilai=j.id_pedagogik6
                                                          AND a.id_nilai=k.id_pedagogik7
                                                          AND a.id_nilai=l.id_kepribadian1
                                                          AND a.id_nilai=m.id_kepribadian2
                                                          AND a.id_nilai=n.id_kepribadian3
                                                          AND a.id_nilai=o.id_sosial1
                                                          AND a.id_nilai=p.id_sosial2
                                                          AND a.id_nilai=q.id_profesional1
                                                          AND a.id_nilai=r.id_profesional2
                                                          WHERE a.id_nilai='$_GET[id]'")->execute());

$tgl_awal       = $data['tanggal_awal'];
$tgla           = explode('-', $tgl_awal);
$tanggal_awal   = tgl_eng_to_ind(isset($tgla[2]) . "-" . isset($tgla[1]) . "-" . $tgla[0]);

$tgl_akhir       = $data['tanggal_akhir'];
$tglb            = explode('-', $tgl_akhir);
$tanggal_akhir   = tgl_eng_to_ind(isset($tglb[2]) . "-" . isset($tglb[1]) . "-" . $tglb[0]);

$tgl_bekerja       = $data['tanggal_bekerjaa'];
$tglc              = explode('-', $tgl_bekerja);
$tanggal_bekerja   = tgl_eng_to_ind($tglc[2] . "-" . $tglc[1] . "-" . $tglc[0]);

$tanggal        = $data['tanggal_nilai'];
$potong_date    = substr($tanggal, 0, 10);
$tgld           = explode('-', $potong_date);
$date           = tgl_eng_to_ind($tgld[2] . "-" . $tgld[1] . "-" . $tgld[0]);

$tgl_lahira       = $data['tanggal_lahira'];
$tgle             = explode('-', $tgl_lahira);
$tanggal_lahira   = tgl_eng_to_ind($tgle[2] . "-" . $tgle[1] . "-" . $tgle[0]);

$tanggal_nilai  = "$date";

$data_sekolah = $db->database_fetch_array($db->database_prepare(" SELECT * FROM tbl_sekolah
                                                                  WHERE id_sekolah = '1'")->execute());

$data_kepsek = $db->database_fetch_array($db->database_prepare("SELECT a.*, b.* FROM tbl_guru as a JOIN tbl_user as b ON a.nip = b.nip
                                                                WHERE b.level = 'Kepala Sekolah'")->execute());
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Panel | Sistem Monitoring Kinerja Guru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="MTs Negeri 2 Jember | Sistem Monitoring Kinerja Guru MTs Negeri 2 Jember" />
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


<body style="background:#bcbcbc" onload="window.print();">

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
                                                    PENILAIAN KINERJA GURU <br>
                                                    MATA PELAJARAN <br><br>
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
                                                <td width="500"><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">2</td>
                                                <td width="350">NIY</td>
                                                <td width="500"><?php echo $data['nipa']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">3</td>
                                                <td width="350">NO SERI KARPEG</td>
                                                <td width="500"><?php echo $data['no_seri_karpega']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">4</td>
                                                <td width="350">PANGKAT/GOLONGAN</td>
                                                <td width="500"><?php echo $data['pangkat_golongana']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">5</td>
                                                <td width="350">NUPTK</td>
                                                <td width="500"><?php echo $data['nuptka']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">6</td>
                                                <td width="350">NRG</td>
                                                <td width="500"><?php echo $data['nrga']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">7</td>
                                                <td width="350">NAMA PELAJARAN</td>
                                                <td width="500"><?php echo $data['mata_pelajarana']; ?></td>
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
                                                <td width="500"><?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?></td>
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
                                                    PENILAIAN KINERJA GURU MATA PELAJARAN <br><br>
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
                                                <td width="500"><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">2</td>
                                                <td width="350">NIY</td>
                                                <td width="500"><?php echo $data['nipa']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">3</td>
                                                <td width="350">NO Seri Karpeg</td>
                                                <td width="500"><?php echo $data['no_seri_karpega']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">4</td>
                                                <td width="350">Pangkalan/Golongan Ruang</td>
                                                <td width="500"><?php echo $data['pangkat_golongana']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">5</td>
                                                <td width="350">NUPTK</td>
                                                <td width="500"><?php echo $data['nuptka']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100" align="center">6</td>
                                                <td width="350">NRG</td>
                                                <td width="500"><?php echo $data['nrga']; ?></td>
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
                                                <td width="500"><?php echo $tanggal_awal; ?> s/d <?php echo $tanggal_akhir; ?> <?php echo $data['tahun_ajaran']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td style="font-size:16px" colspan="4" align="center"><b>PERSETUJUAN</b><br><br></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">Penilai dan guru yang dinilai menyatakan telah membaca dan memahami semua asfek yang ditulis/dilaporkan dalam format ini dan menyatakan setuju.<br><br></td>
                                            </tr>
                                            <tr>
                                                <td width="250">Nama Guru</td>
                                                <td width="300"><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                                <td width="250">Nama Penilai</td>
                                                <td width="300"><?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?></td>
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
                <div class="row" style="margin-top:80px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="text-align:center;font-size:18px"><b>IDENTITAS GURU DAN PENILAI</b></p>
                                    </div>
                                    <div>
                                        <p style="font-size:14px"><b>A. IDENTITAS GURU YANG DINILAI</b></p>
                                    </div>
                                    <table style="margin-left:15px" cellpadding="3">
                                        <tbody>
                                            <tr>
                                                <td width="30">1.</td>
                                                <td width="300">Nama dan Gelar</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30">2.</td>
                                                <td width="300">Status PNS</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['status_pnsa']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30">3.</td>
                                                <td width="300">NIY/NO SERI KARPEG</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['nipa']; ?> / <?php echo $data['no_seri_karpega']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30">4.</td>
                                                <td width="300">Pangkat/Gol Ruang/TMT</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['pangkat_golongana']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30">5.</td>
                                                <td width="300">Jabatan Funsional</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['jabatan_fungsionala']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30">6.</td>
                                                <td width="300">NUPTK/NRG</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['nuptka']; ?> / <?php echo $data['nrga']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30">7.</td>
                                                <td width="300">Mata Pelajaran yang Diampu</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['mata_pelajarana']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30">8.</td>
                                                <td width="300">Periode Penilaian</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $tanggal_awal; ?> s/d <?php echo $tanggal_akhir; ?> <?php echo $data['tahun_ajaran']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div>
                                        <p style="font-size:14px"><b>B. IDENTITAS SEKOLAH</b></p>
                                    </div>
                                    <table style="margin-left:15px" cellpadding="3">
                                        <tbody>
                                            <tr>
                                                <td width="30">1.</td>
                                                <td width="300">Nama Sekolah</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data_sekolah['nama_sekolah']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30">2.</td>
                                                <td width="300">NSS/NPSN</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data_sekolah['npsn']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30">3.</td>
                                                <td width="300">Status</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data_sekolah['status']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30">4.</td>
                                                <td width="300">Alamat Sekolah</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data_sekolah['alamat']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">a. Desa/Kelurahan</td>
                                                <td width="5">:</td>
                                                <td width="500"><?= $data_sekolah['kelurahan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">b. Kecamatan</td>
                                                <td width="5">:</td>
                                                <td width="500"><?= $data_sekolah['kecamatan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">c. Kabupaten/Kota</td>
                                                <td width="5">:</td>
                                                <td width="500"><?= $data_sekolah['kota'] ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">d. Provinsi</td>
                                                <td width="5">:</td>
                                                <td width="500"><?= $data_sekolah['provinsi'] ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">e. Kode Pos</td>
                                                <td width="5">:</td>
                                                <td width="500"><?= $data_sekolah['kode_pos'] ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">f. Telepone/Faks.</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data_sekolah['telepon']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">g. E-mail</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data_sekolah['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">h. Wesite</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data_sekolah['website']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div>
                                        <p style="font-size:14px"><b>C. DATA PENILAI</b></p>
                                    </div>
                                    <table style="margin-left:15px" cellpadding="3">
                                        <tbody>
                                            <tr>
                                                <td width="30">1.</td>
                                                <td width="300">Waktu Pelaksanaan</td>
                                                <td width="5"></td>
                                                <td width="500"></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">a. Tanggal Pengamatan</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $tanggal_nilai; ?></td>
                                            </tr>
                                            <!-- <tr>
                                                <td width="30"></td>
                                                <td width="300">b. Rentang Pemantauan</td>
                                                <td width="5">:</td>
                                                <td width="500"></td>
                                            </tr> -->
                                            <tr>
                                                <td width="30">2.</td>
                                                <td width="300">Petugas Penilai</td>
                                                <td width="5"></td>
                                                <td width="500"></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">a. Nama dan Gelar</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">b. Status PNS</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['status_pnsb']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">c. NIY</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['nipb']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">d. Pangkat/Gol Ruang/TMT</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['pangkat_golonganb']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">e. Jabatan Fungsional</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['jabatan_fungsionalb']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">f. NUPTK</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['nuptkb']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">g. Mata Pelajaran yang Diampu</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['mata_pelajaranb']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>

                                <br><br><br>
                                <div>
                                    <p style="margin-left:500px;font-size:14px"><?= $data_sekolah['kota'] ?>, <?php echo $tanggal_nilai; ?></p>
                                </div>
                                <br>
                                <table style="margin-left:20px; margin-bottom:20px;">
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
                                                <?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?> <br>
                                                <span style="border-top:1px solid #bcbcbc">NIY <?php echo $data['nipa']; ?></span> <br>
                                            </td>
                                            <td width="300">
                                                <?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?> <br>
                                                <span style="border-top:1px solid #bcbcbc">NIY <?php echo $data['nipb']; ?></span> <br>
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
                <!-- page 3 end -->

                <!-- page 4 start-->
                <div class="row" style="margin-top:100px;font-size:11px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <div>
                                        <p style="border:1px solid #bcbcbc;text-align:center;font-size:14px;margin-left:500px"><b>Lampiran I A</b></p>
                                    </div>
                                    <div>
                                        <p style="text-align:center;font-size:14px">
                                            <b>Lembar pernyataan kompetensi, indikator, dan cara menilai <br>
                                                PK Guru Kelas/Mata Pelajaran</b>
                                        </p>
                                    </div>
                                    <div>
                                        <p><b>Sumber :</b></p>
                                        <ul style="margin-left:30px">
                                            <li>
                                                <i style="margin-right:10px" class="icon-caret-right"></i>
                                                Peraturan Materi Pendidikan Nasional16/2007 tentang Standar Kualifikasi Akademik dan Kompetensi Guru
                                            </li>
                                            <li>
                                                <i style="margin-right:10px" class="icon-caret-right"></i>
                                                BSNP Versi 6.0. 11/2008 Kerangka Indikator Untuk Pelaporan Pencapaian Standar Nasional
                                            </li>
                                            <li style="margin-left:19px">
                                                Pendidikan : Standar Kualifikasi Akademik dan Kopetensi Guru.
                                            </li>
                                            <li>
                                                <i style="margin-right:10px" class="icon-caret-right"></i>
                                                Permenegpan dan RB 16/2009 tentang Jabatan Fungsional Guru dan Angka Kreditnya.
                                            </li>
                                        </ul>
                                    </div>
                                    <br>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Kompetensi</th>
                                                <th>Cara menilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2"><b>Pedagogik</b></td>
                                            </tr>
                                            <tr>
                                                <td>1. Menguasai Karakteristik Peserta Didik</td>
                                                <td width="200">Pengamatan & Pemantauan</td>
                                            </tr>
                                            <tr>
                                                <td>2. Menguasai teori belajar dan prinsip-prinsip pembelajaran yang mendidik.</td>
                                                <td width="200">Pengamatan</td>
                                            </tr>
                                            <tr>
                                                <td>3. Pengembangan kurikulum</td>
                                                <td width="200">Pengamatan</td>
                                            </tr>
                                            <tr>
                                                <td>4. Kegiatan pembelajaran yang mendidik</td>
                                                <td width="200">Pengamatan</td>
                                            </tr>
                                            <tr>
                                                <td>5. Pengembangan potensi peserta didik.</td>
                                                <td width="200">Pengamatan & Pemantauan</td>
                                            </tr>
                                            <tr>
                                                <td>6. Komunikasi dengan peserta didik.</td>
                                                <td width="200">Pengamatan</td>
                                            </tr>
                                            <tr>
                                                <td>7. Penilaian dan evaluasi</td>
                                                <td width="200">Pengamatan</td>
                                            </tr>

                                            <tr>
                                                <td colspan="2"><b>Kepribadian</b></td>
                                            </tr>
                                            <tr>
                                                <td>8. Bertindak sesuai dengan norma agama, hukum, sosial, dan kebudayaan nasional.</td>
                                                <td width="200">Pengamatan & Peantauan</td>
                                            </tr>
                                            <tr>
                                                <td>9. Menunjukkan pribadi yang dewasa dan teladan.</td>
                                                <td width="200">Pengamatan & Peantauan</td>
                                            </tr>
                                            <tr>
                                                <td>10. Etos kerja, tanggung jawab yang tinggi, rasa bangga menjadi guru</td>
                                                <td width="200">Pengamatan & Peantauan</td>
                                            </tr>

                                            <tr>
                                                <td colspan="2"><b>Sosial</b></td>
                                            </tr>
                                            <tr>
                                                <td>11. Bersikap Inklusif, bertindak obyektif, serta tidak diskriminatif.</td>
                                                <td width="200">Pengamatan & Pemantauan</td>
                                            </tr>
                                            <tr>
                                                <td>12. Komunikasi dengan sesama guru, tenaga kependidikan, orang tua, peserta didik, dan masyarakat</td>
                                                <td width="200">Pemantauan</td>
                                            </tr>

                                            <tr>
                                                <td colspan="2"><b>Profesional</b></td>
                                            </tr>
                                            <tr>
                                                <td>13. Penguasaan materi, struktur, konsep, dan pola pikir keilmuan yang mendukung mata pelajaran yang diampu.</td>
                                                <td width="200">Pemantauan</td>
                                            </tr>
                                            <tr>
                                                <td>14. Mengembangkan keprofesionalan melalui tindakn yang reflektif.</td>
                                                <td width="200">Pemantauan</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div>
                                        <span style="border-bottom:1px solid #bcbcbc">
                                            <b>Keterangan</b>
                                        </span>
                                        <p>
                                            <b>Pengamatan</b> adalah kegiatan untuk menilai kinerja guru melalui diskusi sebelum pengamatan, pengamatan <br>
                                            <b>Pemantauan</b> adalah kegiatan untuk menilai kinerja guru melalui pemeriksaan dokumen, wawancara dengan
                                        </p>
                                    </div>
                                    <br><br>
                                    <div style="margin-left:600px;margin-bottom:50px">
                                        <span>
                                            Penilai Kinerja Guru,
                                        </span>
                                    </div>
                                    <div style="margin-left:600px">
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
                <!-- page 4 end -->

                <!-- page 5 start-->
                <div class="row" style="margin-top:100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <div>
                                        <p style="border:1px solid #bcbcbc;text-align:center;font-size:14px;margin-left:500px"><b>Lampiran IB</b></p>
                                    </div>
                                    <div>
                                        <p style="text-align:center;font-size:14px">
                                            <b>PENILAIAN KINERJA GURU KELAS / GURU MATA PELAJARAN</b>
                                        </p>
                                    </div>
                                    <br>
                                    <table style="margin-left:15px" cellpadding="3">
                                        <tbody>
                                            <tr>
                                                <td width="250">Nama Guru</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['nama_gurua']; ?> / <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="250">NIY/Nomor Seri Karpeg</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['nipa']; ?> / <?php echo $data['no_seri_karpega']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="250">Pangkat/Golongan Ruang/TMT</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['pangkat_golongana']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="250">NUPTK/NRG</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['nuptka']; ?> / <?php echo $data['nrga']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="250">Nama Sekolah dan Alamat</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data_sekolah['nama_sekolah']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="250"></td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data_sekolah['alamat']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="250">Tanggal Mulai Bekerja Disekolah Ini</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $tanggal_bekerja; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="250">Periode Penilaian</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $tanggal_awal; ?> s/d <?php echo $tanggal_akhir; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br><br>
                                    <div style="border:1px solid #bcbcbc;padding:10px">
                                        <p style="text-align:center">
                                            <b>Persetujuan</b><br>
                                            <i>(Persetujuan ini harus ditandatangani oleh penilai dan guru yang dinilai)</i>
                                        </p>
                                        <p>Penilai dan guru yang dinilai menyatakan telah membaca dan memahami semua aspek yang ditulis/dilaporkan dalam format ini dan menyatakan setuju.</p> <br>

                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td width="200">Nama Guru</td>
                                                    <td style="border-bottom:1px solid #bcbcbc" width="500"><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                                    <td width="200">Nama penilai</td>
                                                    <td style="border-bottom:1px solid #bcbcbc" width="500"><?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?></td>
                                                </tr>
                                                <tr style="vertical-align:middle">
                                                    <td height="90" width="200">Tanda tangan</td>
                                                    <td style="border-bottom:1px solid #bcbcbc" height="90" width="500"></td>
                                                    <td height="90" width="200">Tanda tangan</td>
                                                    <td style="border-bottom:1px solid #bcbcbc" height="90" width="500"></td>
                                                </tr>
                                                <tr>
                                                    <td height="50" width="200">Tanggal</td>
                                                    <td height="50" width="500"><?php echo $tanggal_nilai; ?></td>
                                                    <td height="50" width="200"></td>
                                                    <td height="50" width="500"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 5 end -->

                <!-- page 6 start-->
                <div class="row" style="margin-top: 75px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="text-align:center;font-size:14px">
                                            <b>TAHAP PENILAIAN PKG</b><br>
                                        </p>
                                    </div>
                                    <div>
                                        <p><b>Tahap Persiapan</b></p>
                                        <p style="margin-left:30px">Dalam tahap persiapan, penilaian kinerja guru maupun guru yang akan dinilai, harus memahami pedoman penilaian kinerja guru yang mencakup:</p>
                                        <ul style="margin-left:30px">
                                            <li>
                                                1) Konsep penilaian kinerja guru,
                                            </li>
                                            <li>
                                                2) Prosedur pelaksana penilaian kinerja guru.
                                            </li>
                                            <li>
                                                3) Instrumen penilaian kinerja guru yang terdiri dari:
                                                <ul style="margin-left:15px">
                                                    <li>(a) Format hasil pemantauan dan pengamatan;</li>
                                                    <li>(b) Format Penilaian Kinerja Guru;</li>
                                                    <li>(c) Rekap Hasil Penilaian Kinerja Guru; dan penggunanya.</li>
                                                </ul>
                                            </li>
                                            <li>
                                                4) Tugas dan tanggung jawab penilai dan guru yang akan dinilai,
                                            </li>

                                            <br><br>
                                            <p><b>Pelaksana Penilaian Kinerja Guru</b></p>
                                            <p style="margin-left:30px">Penilaian kinerja guru dilakukan dengan pengamatan dan/atau pemantauan dengan tahapan sebagai berikut:</p>
                                            <ul style="margin-left:30px">
                                                <li>
                                                    <b>a) Sebelum Pengamatan dan/atau Pemantauan</b>
                                                    <ul style="margin-left:15px">
                                                        <li>
                                                            <i class='icon-caret-right'></i>
                                                            Lakukan pertemuan awal antara penilai kinerja guru dengan guru yang akan dinilai. Guru mata pelajaran harus menyerahkan perangkat pembelajaran antara lain;
                                                        </li>
                                                        <li>
                                                            <i class='icon-caret-right'></i>
                                                            Program Tahunan, Program Semester, Silabus, RPP, Bahan Ajar, Lembar Kerja Siswa, Instrumen Penilaian, Nilai Hasil Belajar, Analisis Penilaian Hasil Belajar, Program Tindak Lanjut (Remedial dan Pengayaan) dan Daftar Nama Peserta Didik.
                                                        </li>
                                                        <li>
                                                            <i class='icon-caret-right'></i>
                                                            Penilai melakukan penilaian terhadap semua dokumen perangkat Pembelajaran/pembimbingan. Diskusikan berbagai hal yang berkaitan dengan tugas pokok guru dengan mengacu pada instrumen penilain kinerja.
                                                        </li>
                                                        <li>
                                                            <i class='icon-caret-right'></i>
                                                            Catat semua hasil diskusi dalm instrumen penilaian kinerja untuk masing-masing indikator kinerja setiap tugas utama guru sebagai bukti penilaian kinerja.
                                                        </li>
                                                        <li>
                                                            <i class='icon-caret-right'></i>
                                                            Sepakati jadwal pelaksanaan penilaian kinerja guru, khususnya untuk kegiatan pengamatan dalam penilaian kinerja.
                                                        </li>

                                                        <br>
                                                        <span><b>Selama Pengamatan</b></span>
                                                        <ul style="margin-left:15px">
                                                            <span><b>Pengamatan terhadap guru</b></span>
                                                            <li>
                                                                <i class='icon-caret-right'></i>
                                                                Pastikan guru yang akan dinilai membawa perangkat pembelajaran (RPP, Daftar Nama Peserta Didik, Daftar Nilai, Buku Pegangan Guru, Media Pembelajaran, dan Instrumen Evaluasi, dsb)
                                                            </li>
                                                            <li>
                                                                <i class='icon-caret-right'></i>
                                                                Lakukan pengamatan proses pembelajaran di dalam dan/atau diluar kelas dan catat semua kegiatan yang dilakukan oleh guru.
                                                            </li>
                                                            <li>
                                                                <i class='icon-caret-right'></i>
                                                                Gunakan instrumen penilaian kinerja guru pembelajaran untuk menetapkan ketercapaian/keterlaksanaan semua indikator secara valid, reliabel, dan konsisten, pengamatan dimungkinkan dapat dilakukan lebih dari satu kali.
                                                            </li>
                                                        </ul>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </ul>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 6 end -->

                <!-- page 7 start-->
                <div class="row" style="margin-top:110px; font-size:11px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <div>
                                        <p style="font-size:15px">
                                            <b>I. PEDAGOGIK</b><br>
                                        </p>
                                    </div>
                                    <div>
                                        <p style="text-align:center;font-size:15px">
                                            <b>LEMBAR PENGAMATAN PK GURU</b><br>
                                        </p>
                                    </div>
                                    <table>
                                        <tbody>
                                            <tr style="font-size:15px">
                                                <td width="130"><b>Kompetensi 1</b></td>
                                                <td width="15">:</td>
                                                <td><b>Mengenal karakteristik peserta didik</b></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Guru</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Penilai</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Sebelum Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    1. Daftar Nama Peserta Didik <br>
                                                    2. Buku Pemetaan karakteristik peserta didik dengan aspek fisik Intelektual, Sosial Emeosional, Moral, dan Latar Belakang Sosial Budaya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tanggapan Penilaian terhadap dokumen dan/atau keterangan guru</b>
                                                    <br><br>
                                                    1. Guru memiliki absensi siswa <i><b><?php echo $data['ap1_point1']; ?></b></i> lengkap
                                                    <br>
                                                    2. Guru memiliki pemetaan kelas <i><b><?php echo $data['ap1_point2']; ?></b></i> lengkap
                                                    <br>
                                                    3. Guru memiliki catatan siswa yang lemah, ataupun yang berkebutuhan khusus dengan <i><b><?php echo $data['ap1_point3']; ?></b></i> lengkap.
                                                    <br>
                                                    4. Guru memiliki catatan siswa yang berprestasi dengan <i><b><?php echo $data['ap1_point4']; ?></b></i> lengkap
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Perencanaan <b>Mengenal karakteristik peserta didik</b> dalam KBM <i><b><?php echo $data['ap1_point5']; ?></b></i> sesuai dengan kurikulum karenanya dapat <i><b><?php echo $data['ap1_point6']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div>
                                        <p style="font-size:14px">
                                            <b>Selama Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    1. Daftar Nama Peserta Didik <br>
                                                    2. Buku Pemetaan karakteristik peserta didik dengan aspek fisik Intelektual, Sosial Emeosional, Moral, dan Latar Belakang Sosial Budaya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Kegiatan/aktivitas guru dan peserta didik selama pengamatan:</b>
                                                    <br><br>
                                                    1. Guru menerapkan metode pembelajaran mampu membantu siswa <i><b><?php echo $data['ap1_point7']; ?></b></i> aktif dalam KBM
                                                    <br>
                                                    2. Guru <i><b><?php echo $data['ap1_point8']; ?></b></i> memotivasi siswa
                                                    <br>
                                                    3. Pengaturan tempat duduk <i><b><?php echo $data['ap1_point9']; ?></b></i> memperhatikan kondisi siswa.
                                                    <br>
                                                    4. Konsentrasi siswa dalam KBM <i><b><?php echo $data['ap1_point10']; ?></b></i>
                                                    <br>
                                                    5. Guru memfasilitasi siswa <i><b><?php echo $data['ap1_point11']; ?></b></i>
                                                    <br>
                                                    6. Guru memberi pelayanan kepada siswa yang kurang, lemah atau berkebutuhan khusus dengan <i><b><?php echo $data['ap1_point12']; ?></b></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Pelaksanaan <b>Mengenal karakteristik peserta didik</b> dalam KBM <i><b><?php echo $data['ap1_point13']; ?></b></i> sesuai dengan kurikulum karenanya dapat <i><b><?php echo $data['ap1_point14']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div>
                                        <p style="font-size:14px">
                                            <b>Setelah Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    1. Denah pembagian kelompok diskusi siswa <br>
                                                    2. Catatan Hasil Penilaian Guru baik dari diskusi kelompok menyangkut penilaian Sikap, Keterampilan dan Pengetahuan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Setelah Pengamatan: Tanggapan Penilai terhadap dokumen dan/atau keterangan guru</b><br>
                                                    Kegiatan pembelajaran dengan memperhatikan kekurangan atau kelebihan siswa yang mampu mengembangkan kompetensi siswa berlangsung dengan <i><b><?php echo $data['ap1_point15']; ?></b></i> baik
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Penilai menyarankan bahwa dalam mengenal karakteristik peserta didik perlu <i><b><?php echo $data['ap1_point16']; ?></b></i> untuk KBM selanjutnya
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 7 end -->

                <!-- page 8 start-->
                <div class="row" style="margin-top:100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Pemantauan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Tanggal</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    1. Catatang Maping Class tentang kemajuan dan perkembangan peserta didik dalam aspek inteletual, sosial emosional, spritual, dan moral
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Catatan dan Tanggapan Penilai terhadap dokumen dan/atau keterangan guru (catat kegiatan yang dilakukan)</b><br>
                                                    Catatan tentang kemajuan siswa <i><b><?php echo $data['ap1_point17']; ?></b></i> terekam dalam dokumentasi
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 8 end -->

                <!-- page 9 start-->
                <div class="row" style="margin-top:100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU MATA PELAJARAN</b><br>
                                        </p>
                                    </div>
                                    <div>
                                        <p style="font-size:15px">
                                            <b>I. PEDAGOGIK</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="4"><b>Penilaian untuk kompetensi 1: Mengenai karakteristik peserta didik</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td style="vertical-align:middle" class="center" rowspan="2"><b>Indikator</b></td>
                                                <td class="center" colspan="3"><b>Skor</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td width="100"><b>Tidak ada bukti (Tidak terpenuhi)</b></td>
                                                <td width="100"><b>Terpenuhi sebagian</b></td>
                                                <td width="100"><b>Seluruhnya terpenuhi</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru dapat mengidentifikasi karakteristik belajar setiap peserta didik di kelasnya
                                                </td>
                                                <?php
                                                if ($data['np1_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np1_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np1_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Guru memastikan bahwa semua peserta didik mendapatkan kesempatan yang sama untuk berpartisipasi aktif dalam kegiatan pembelajaran
                                                </td>
                                                <?php
                                                if ($data['np1_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np1_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np1_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru dapat mengatur kelas untuk memberikan kesempatan belajar yang sama pada semua peserta didik dengan kelainan fisik dan kemampuan belajar yang berbeda
                                                </td>
                                                <?php
                                                if ($data['np1_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np1_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np1_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4. Guru mencoba mengetahui penyebab penyimpangan prilaku peserta didik untuk mencegah agar prilaku tersebut tidak merugikan peserta didik yang lainnya
                                                </td>
                                                <?php
                                                if ($data['np1_indikator4'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np1_indikator4'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np1_indikator4'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5. Guru membantu mengembangkan potensi dan mengatasi kekurangan peserta didik
                                                </td>
                                                <?php
                                                if ($data['np1_indikator5'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np1_indikator5'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np1_indikator5'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    6. Guru memperhatikan peserta didik dengan kelemahan fisik tertentu agar dapat mengikuti aktivitas pembelajaran, sehingga peserta didik tersebut tidak termarginalkan (tersisihkan, diolok-olok, minder, dsb)
                                                </td>
                                                <?php
                                                if ($data['np1_indikator6'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np1_indikator6'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np1_indikator6'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Total skor untuk kompetensi 1</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['np1_total_skor']; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum kopentensi 1 = jumlah indikator x 2</td>
                                                <td style="text-align:center" colspan="3">12</td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (total skor/12) x 100%</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['np1_persentase']; ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk kompetensi 1 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="3"><b><?php echo $data['np1_nilai_kompetensi']; ?></b></td>
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
                <!-- page 9 end -->

                <!-- page 10 start-->
                <div class="row" style="margin-top:100px; font-size:12px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <table>
                                        <tbody>
                                            <tr style="font-size:15px">
                                                <td width="130"><b>Kompetensi 2</b></td>
                                                <td width="15">:</td>
                                                <td><b>Menguasai teori belajar dan prinsip-prinsip pembelajaran yang mendidik</b></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Guru</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Penilai</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Sebelum Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    1. Silabus 2. RPP <br>
                                                    2. Buku Pegangan Guru/Media Pembelajaran
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tanggapan Penilaian terhadap dokumen dan/atau keterangan guru</b><br>
                                                    Pada perangkat pembelajaran terdapat:
                                                    <br>
                                                    1. Materi yang mampu mengaktifkan siswa dengan <i><b><?php echo $data['ap2_point1']; ?></b></i> lengkap
                                                    <br>
                                                    2. Materi pembelajaran <i><b><?php echo $data['ap2_point2']; ?></b></i> sesuai dengan kondisi siswa
                                                    <br>
                                                    3. Kegiatan KBM direncanakan dengan <i><b><?php echo $data['ap2_point3']; ?></b></i> baik yang mampu.
                                                    <br>
                                                    4. Teknik pembelajaran direncanakan dengan <i><b><?php echo $data['ap2_point4']; ?></b></i> baik yang mampu meningkatkan kompetensi siswa secara maksimal.
                                                    <br>
                                                    5. Tujuan pembelajaran direncanakan dengan <i><b><?php echo $data['ap2_point5']; ?></b></i> baik yang mampu meningkatkan kompetensi siswa secara maksimal.
                                                    <br>
                                                    6. Kegiatan KBM direncanakan dengan <i><b><?php echo $data['ap2_point6']; ?></b></i> baik yang mampu meningkatkan respon siswa secara maksimal.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Perencanaan langkah-langkah dan tahapan KBM <b><i><?php echo $data['ap2_point7']; ?></i> sesuai dengan</b> kurikulum karenanya dapat <i><b><?php echo $data['ap2_point8']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Selama Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    1. Silabus 2. RPP <br>
                                                    2. Buku Pegangan Guru/Media Pembelajaran
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Kegiatan/aktivitas guru dan peserta didik selama pengamatan:</b><br>
                                                    Pada pelaksanaan kegiatan pembelajaran terdapat:
                                                    <br>
                                                    1. Materi yang mampu mengaktifkan siswa dengan <i><b><?php echo $data['ap2_point9']; ?></b></i> lengkap
                                                    <br>
                                                    2. Materi pembelajaran <i><b><?php echo $data['ap2_point10']; ?></b></i> sesuai dengan kondisi siswa
                                                    <br>
                                                    3. Kegiatan KBM direncanakan dengan <i><b><?php echo $data['ap2_point11']; ?></b></i> baik yang mampu meningkatkan kompetensi siswa secara maksimal
                                                    <br>
                                                    4. Teknik pembelajaran direncanakan dengan <i><b><?php echo $data['ap2_point12']; ?></b></i> baik yang mampu meningkatkan kompetensi siswa secara maksimal
                                                    <br>
                                                    5. Tujuan pembelajaran direncanakan dengan <i><b><?php echo $data['ap2_point13']; ?></b></i> baik yang mampu meningkatkan kompetensi siswa secara maksimal
                                                    <br>
                                                    6. Kegiatan KBM direncanakan dengan <i><b><?php echo $data['ap2_point14']; ?></b></i> baik yang mampu meningkatkan kompetensi siswa secara maksimal
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    Pelaksanaan langkah-langkah dan tahapan KBM <b><i><?php echo $data['ap2_point15']; ?></i> sesuai dengan</b> kurikulum karenanya dapat <i><b><?php echo $data['ap2_point16']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Setelah Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    SK, KI, KD, dan Tujuan Pembelajaran yang tercantum dalam RPP maupun silabus
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Setelah Pengamatan: Tanggapan Penilai terhadap dokumen dan/atau keterangan guru</b><br>
                                                    Tingkat Penguasaan teori belajar dan prinsip-prinsip pembelajaran guru tergolong <i><b><?php echo $data['ap2_point17']; ?></b></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Tingkat Penguasaan teori belajar dan prinsip-prinsip pembelajaran guru agar <i><b><?php echo $data['ap2_point18']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 10 end -->

                <!-- page 11 start-->
                <div class="row" style="margin-top:75px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU MATA PELAJARAN</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="4"><b>Penilaian untuk kompetensi 2: Menguasai teori belajar dan prisip-prinsip pembelajaran yang mendidik</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td style="vertical-align:middle" class="center" width="2000" rowspan="2"><b>Indikator</b></td>
                                                <td class="center" colspan="3"><b>Skor</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td width="10"><b>Tidak ada bukti (Tidak terpenuhi)</b></td>
                                                <td width="10"><b>Terpenuhi sebagian</b></td>
                                                <td width="10"><b>Seluruhnya terpenuhi</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru memberi kesempatan kepada pesrta didik untuk menguasai materi pembelajaran sesuai usia dan kemampuan belajarnya melalui pengaturan proses pembelajaran dan aktivitas yang bervariasi.
                                                </td>
                                                <?php
                                                if ($data['np2_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np2_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np2_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Guru selalu memastikan tingkat pemahaman peserta didik terhadap materi pembelajaran tertentu dan menyesuaikan aktivitas pembelajaran berikutnya berdasarkan tingkat pemahaman tersebut.
                                                </td>
                                                <?php
                                                if ($data['np2_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np2_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np2_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru dapat menjelaskan alasan pelaksanaan kegiatan/aktivitas yang dilakukannya, baik yang sesuai maupun yang berbeda dengan rencana, terkait keberhasilan pembelajaran.
                                                </td>
                                                <?php
                                                if ($data['np2_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np2_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np2_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4. Guru menggunakan berbagai teknik untuk memotivasi kemampuan belajar peserta didik.
                                                </td>
                                                <?php
                                                if ($data['np2_indikator4'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np2_indikator4'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np2_indikator4'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5. Guru merencanakan kegiatan pembelajaran yang saling terkait satu sama lain, dengan memperhatikan tujuan pembelajaran maupun proses belajar peserta didik.
                                                </td>
                                                <?php
                                                if ($data['np2_indikator5'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np2_indikator5'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np2_indikator5'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    6. Guru memperhatikan respon peserta didik yang belum/kurang memahami materi pembelajaran yang diajarkan dan menggunakannya untuk memperbaiki rancangan pembelajaran berikutnya.
                                                </td>
                                                <?php
                                                if ($data['np2_indikator6'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np2_indikator6'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np2_indikator6'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Total skor untuk kompetensi 2</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['np2_total_skor']; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum kopentensi 2 = jumlah indikator x 2</td>
                                                <td style="text-align:center" colspan="3">12</td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (total skor/12) x 100%</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['np2_persentase']; ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk kompetensi 2 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="3"><b><?php echo $data['np2_nilai_kompetensi']; ?></b></td>
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
                <!-- page 11 end -->

                <!-- page 12 start-->
                <div class="row" style="margin-top:100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <table>
                                        <tbody>
                                            <tr style="font-size:15px">
                                                <td width="130"><b>Kompetensi 3</b></td>
                                                <td width="15">:</td>
                                                <td><b>Pengembangan Kurikulum</b></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Guru</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Penilai</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Sebelum Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    1. Standar Isi <br>
                                                    2. Silabus <br>
                                                    3. RPP
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tanggapan Penilaian terhadap dokumen dan/atau keterangan guru</b><br>
                                                    Perangkat pembelajaran yang disusun oleh guru:<br>
                                                    1. Silabus yang disusun <i><b><?php echo $data['ap3_point1']; ?></b></i> sesuai dengan kurikulum (standar isi)
                                                    <br>
                                                    2. RPP yang disusun <i><b><?php echo $data['ap3_point2']; ?></b></i> sesuai dengan sialbus
                                                    <br>
                                                    3. Urutan materi pembelajaran dengan <i><b><?php echo $data['ap3_point3']; ?></b></i> memperhatikan tujuan pembelajaran.
                                                    <br>
                                                    4. Materi pembelajaran dengan <i><b><?php echo $data['ap3_point4']; ?></b></i> sesuai indikator atau tujuan pembelajaran.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Perencanaan langkah-langkah dan tahapan KBM <b><i><?php echo $data['ap3_point5']; ?></i></b> sesuai dengan kurikulum karenanya dapat <i><b><?php echo $data['ap3_point6']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Selama Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    1. Silabus <br>
                                                    2. RPP
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Kegiatan/aktivitas guru dan peserta didik selama pengamatan:</b>
                                                    <br><br>
                                                    1. Pelaksanaan KBM tidak/ <i><b><?php echo $data['ap3_point7']; ?></b></i> sesuai dengan silabus
                                                    <br>
                                                    2. Pelaksanaan KBM <i><b><?php echo $data['ap3_point8']; ?></b></i> sesuai dengan RPP
                                                    <br>
                                                    3. Urutan materi pembelajaran <i><b><?php echo $data['ap3_point9']; ?></b></i> sesuai dengan indikator
                                                    <br>
                                                    4. Materi pembelajaran <i><b><?php echo $data['ap3_point10']; ?></b></i> diakui siswa dengan optimal
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Pelaksanaan langkah-langkah dan tahapan KBM <b><i><?php echo $data['ap3_point11']; ?></i></b> sesuai dengan kurikulum karenanya dapat <i><b><?php echo $data['ap3_point12']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Setelah Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    Analisis Penilaian Hasil belajar dan RPP KD berikutnya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Setelah Pengamatan: Tanggapan Penilai terhadap dokumen, pelaksanaan KBM, dan/atau keterangan guru</b><br>
                                                    Berdasarkan hasil ulangan dan analisis hasil belajar dapat dikatakan bahwa hasil KBM <i><b><?php echo $data['ap3_point13']; ?></b></i> sesuai KKM yang ditetapkan pada kurikulum
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Dokumen dan pelaksanaan KBM kesesuaian dengan kurikulum perlu <i><b><?php echo $data['ap3_point14']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 12 end -->

                <!-- page 13 start-->
                <div class="row" style="margin-top:100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU MATA PELAJARAN</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="4"><b>kompetensi 3: Pengembangan Kurikulum</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td style="vertical-align:middle" class="center" rowspan="2"><b>Indikator</b></td>
                                                <td class="center" colspan="3"><b>Skor</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td width="100"><b>Tidak ada bukti (Tidak terpenuhi)</b></td>
                                                <td width="100"><b>Terpenuhi sebagian</b></td>
                                                <td width="100"><b>Seluruhnya terpenuhi</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru dapat menyusun silabus yang sesuia dengan kurikulum
                                                </td>
                                                <?php
                                                if ($data['np3_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np3_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np3_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Guru merancang rencana pembelajaran yang sesuai dengan silabus untuk membahas materi ajar tertentu agar peserta didik dapat mencapai kompetensi dasar yang ditetapkan.
                                                </td>
                                                <?php
                                                if ($data['np3_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np3_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np3_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru mengikuti urutan materi pembelajaran dengan memperhatikan tujuan pembelajaran.
                                                </td>
                                                <?php
                                                if ($data['np3_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np3_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np3_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4. Guru memilih materi pembelajaran yang: a) sesuai dengan tujuan pembelajaran, b) tepat dan mutakhir, c) sesuai dengan usia dan tingkat kemampuan belajar peserta didik, dan d) dapat dilaksanakan dikelas e) sesuai dengan konteks kehidupan sehari-hari peserta didik
                                                </td>
                                                <?php
                                                if ($data['np3_indikator4'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np3_indikator4'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np3_indikator4'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>

                                            <tr>
                                                <td>Total skor untuk kompetensi 3</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['np3_total_skor']; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum kopentensi 3 = jumlah indikator x 2</td>
                                                <td style="text-align:center" colspan="3">8</td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (total skor/8) x 100%</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['np3_persentase']; ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk kompetensi 3 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="3"><b><?php echo $data['np3_nilai_kompetensi']; ?></b></td>
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
                <!-- page 13 end -->

                <!-- page 14 start-->
                <div class="row" style="margin-top:100px; font-size:11px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <table>
                                        <tbody>
                                            <tr style="font-size:15px">
                                                <td width="130"><b>Kompetensi 4</b></td>
                                                <td width="15">:</td>
                                                <td><b>Kegiatan Pembelajaran yang Mendidik</b></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Guru</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Penilai</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Sebelum Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span style="margin-right:70px">1. Standar Isi</span> <span style="margin-right:70px">2. Silabus</span> <span>3. RPP</span><br>
                                                    <span style="margin-right:36px">4. media/alat bantu</span> <span>5. LKS</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tanggapan Penilaian terhadap dokumen dan/atau keterangan guru</b><br>
                                                    Perangkat pembelajaran yang disusun oleh guru:
                                                    <br>
                                                    1. Tujuan pembelajaran/indikator <i><b><?php echo $data['ap4_point1']; ?></b></i> sesuai dengan KD
                                                    <br>
                                                    2. Strategi dan metode yang dipilih <i><b><?php echo $data['ap4_point2']; ?></b></i> dapat menciptakan rasa nyaman dan senang bagi siswa
                                                    <br>
                                                    3. Materi prasyarat dirumuskan dengan <i><b><?php echo $data['ap4_point3']; ?></b></i> sesuai materi pokok
                                                    <br>
                                                    4. Pembahasan PR/tugas lainnya <i><b><?php echo $data['ap4_point4']; ?></b></i> sesuai dengan alokasi waktu yang tersedia.
                                                    <br>
                                                    5. Materi yang dirumuskan <i><b><?php echo $data['ap4_point5']; ?></b></i> mengkaitkan kehidupan nyata
                                                    <br>
                                                    6. Metode pembelajaran <i><b><?php echo $data['ap4_point6']; ?></b></i> bervariatif
                                                    <br>
                                                    7. Partisipatif siswa <i><b><?php echo $data['ap4_point7']; ?></b></i> maksimal
                                                    <br>
                                                    8. Perencanaan pembelajaran <i><b><?php echo $data['ap4_point8']; ?></b></i> sesuai dengan kondisi kelas
                                                    <br>
                                                    9. Kesempatan siswa bertanya dirumuskan dengan <i><b><?php echo $data['ap4_point9']; ?></b></i>
                                                    <br>
                                                    10. Kegiatan refleksi direncanakan <i><b><?php echo $data['ap4_point10']; ?></b></i>
                                                    <br>
                                                    11. Alat peraga dan alat bantu lainnya dirumuskan <i><b><?php echo $data['ap4_point11']; ?></b></i> beragam
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Perencanaan KBM yang mendidik perlu <i><b><?php echo $data['ap4_point12']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div>
                                        <p style="font-size:14px">
                                            <b>Selama Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span style="margin-right:70px">1. Standar Isi</span> <span style="margin-right:70px">2. Silabus</span> <span>3. RPP</span><br>
                                                    <span style="margin-right:36px">4. media/alat bantu</span> <span>5. LKS</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Kegiatan/aktivitas guru dan peserta didik selama pengamatan:</b><br>
                                                    Pelaksanaan kegiatan pembelajaran yang dialkukan oleh guru:
                                                    <br>
                                                    1. Tujuan pembelajaran/indikator <i><b><?php echo $data['ap4_point13']; ?></b></i> disampaikan
                                                    <br>
                                                    2. Strategi dan metode yang digunakan <i><b><?php echo $data['ap4_point14']; ?></b></i> dapat menciptakan rasa nyaman dan senang bagi siswa.
                                                    <br>
                                                    3. Materi Prasyarat disampaikan dengan <i><b><?php echo $data['ap4_point15']; ?></b></i> sesuai materi pokok
                                                    <br>
                                                    4. Pembahasan PR/tugas lainnya <i><b><?php echo $data['ap4_point16']; ?></b></i> dibahas
                                                    <br>
                                                    5. Materi yang disajikan <i><b><?php echo $data['ap4_point17']; ?></b></i> mengkaitkan kehidupan nyata
                                                    <br>
                                                    6. Metode pembelajaran <i><b><?php echo $data['ap4_point18']; ?></b></i> bervariatif
                                                    <br>
                                                    7. Partisipasif siswa <i><b><?php echo $data['ap4_point19']; ?></b></i> maksimal
                                                    <br>
                                                    8. Pelaksanaan pembelajaran <i><b><?php echo $data['ap4_point20']; ?></b></i> sesuai dengan kondisi kelas
                                                    <br>
                                                    9. Kesempatan siswa bertanya diwujudkan dengan <i><b><?php echo $data['ap4_point21']; ?></b></i> baik
                                                    <br>
                                                    10. Kegiatan refleksi dilaksanakan <i><b><?php echo $data['ap4_point22']; ?></b></i> baik
                                                    <br>
                                                    11. Alat peraga dan alat bantu lainnya digunakan <i><b><?php echo $data['ap4_point23']; ?></b></i> beragam
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Dokumentasi dan pelaksanaan KBM perlu <i><b><?php echo $data['ap4_point24']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div>
                                        <p style="font-size:14px">
                                            <b>Setelah Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    Analisis Penilaian Hasil belajar dan program Remidial
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    Berdasarkan hasil ulangan dan analisis hasil belajar dapat dikatakan bahwa hasil KBM <i><b><?php echo $data['ap4_point25']; ?></b></i> dapat mendidik dan mengembangkan kompetensi siswa secara optimal
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Perencanaan dan pelaksanaan KBM perlu <i><b><?php echo $data['ap4_point26']; ?></b></i> lebih lanjut <br>
                                                    Baik aspek kognitif, sikap ataupun keterampilan
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 14 end -->

                <!-- page 15 start-->
                <div class="row" style="margin-top:100px; font-size:10px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU MATA PELAJARAN</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="4"><b>Kompetensi 4: Kegiatan Pembelajaran yang Mendidik</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td style="vertical-align:middle" class="center" width="3000" rowspan="2"><b>Indikator</b></td>
                                                <td class="center" colspan="3"><b>Skor</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td width="5"><b>Tidak ada bukti (Tidak terpenuhi)</b></td>
                                                <td width="5"><b>Terpenuhi sebagian</b></td>
                                                <td width="5"><b>Seluruhnya terpenuhi</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru melaksanakan aktivitas pembelajaran sesuai dengan ranvangan yang telah disusun secara lengkap dan pelaksanaan aktivitas tersebut mengindikasikan bahwa guru mengerti tentang tujuannya.
                                                </td>
                                                <?php
                                                if ($data['np4_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Guru melaksanakan aktivitas pembelajaran yang bertujuan untuk membantu proses belajar peserta didik, bukan untuk menguji sehingga membuat peserta didik merasa tertekan.
                                                </td>
                                                <?php
                                                if ($data['np4_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru mengkomunikasikan informasi baru (misalnya materi tambahan) sesuai dengan usia dan tingkat kemampuan belajar peserta didik.
                                                </td>
                                                <?php
                                                if ($data['np4_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4. Guru menyikapi kesalahan yang dilakukan peserta didik sebagai tahapan proses pembelajaran, bukan semata-mata kesalahan yang harus dikoreksi. Misalnya: dengan mengetahui terlebih dahulu peserta didik lain yang setuju atau tidak setuju dengan jawaban tersebut, sebelum memberika penjelasan tentang jawaban yang benar.
                                                </td>
                                                <?php
                                                if ($data['np4_indikator4'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator4'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator4'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5. Guru melaksanakan kegiatan pembelajaran sesuai isi kurikulum dan mengaitkannya dengan konteks kehidupan sehari-hari peserta didik.
                                                </td>
                                                <?php
                                                if ($data['np4_indikator5'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator5'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator5'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    6. Guru melakukan aktivitas pembelajaran secara bervariasi dengan waktu yang cukup untuk kegiatan pembelajaran yang sesuai dengan usia dan tingkat kemampuan belajar dan mempertahankan perhatian peserta didik.
                                                </td>
                                                <?php
                                                if ($data['np4_indikator6'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator6'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator6'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    7. Guru mengelola kelas dengan efektif tanpa mendominasi atau sibuk dengan kegiatannya sendiri agar semua waktu peserta dapat termanfaatkan secara produktif.
                                                </td>
                                                <?php
                                                if ($data['np4_indikator7'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator7'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator7'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    8. Guru mampu menyesuaikan Aktivitas pembelajaran yang dirancang dengan kondisi kelas.
                                                </td>
                                                <?php
                                                if ($data['np4_indikator8'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator8'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator8'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    9. Guru memberikan banyak kesempatan kepada peserta didik untuk bertanya, mempraktekkan dan berinteraksi dengan peserta didik lain.
                                                </td>
                                                <?php
                                                if ($data['np4_indikator9'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator9'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator9'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    10. Guru mengatur pelaksanaan aktivitas pembelajaran secara sistematis untuk membantu proses belajar peserta didik.Sebagai contoh: guru menambah informasi baru setelah mengevaluasi pemahaman.
                                                </td>
                                                <?php
                                                if ($data['np4_indikator10'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator10'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator10'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    11. Guru menggunakan alat bantu mengajar, dan/atau audio visual (termasuk TIK) untuk meningkatkan motivasi belajar peserta didik dalam mencapai tujuan pembelajaran.
                                                </td>
                                                <?php
                                                if ($data['np4_indikator11'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator11'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np4_indikator11'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>

                                            <tr>
                                                <td>Total skor untuk kompetensi 4</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['np4_total_skor']; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum kopentensi 4 = jumlah indikator x 2</td>
                                                <td style="text-align:center" colspan="3">12</td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (total skor/17) x 100%</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['np4_persentase']; ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk kompetensi 4 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="3"><b><?php echo $data['np4_nilai_kompetensi']; ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br><br>
                                    <div style="margin-left:550px">
                                        <span>
                                            <?= $data_sekolah['kota'] ?>, <?php echo $tanggal_nilai; ?>
                                        </span>
                                    </div>
                                    <div style="margin-left:550px;margin-bottom:70px">
                                        <span>
                                            Penilai,
                                        </span>
                                    </div>
                                    <div style="margin-left:550px">
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
                <!-- page 15 end -->

                <!-- page 16 start-->
                <div class="row" style="margin-top:100px; font-size:12px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <table>
                                        <tbody>
                                            <tr style="font-size:15px">
                                                <td width="130"><b>Kompetensi 5</b></td>
                                                <td width="15">:</td>
                                                <td><b>Memahami dan mengembangkan potensi</b></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Guru</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Penilai</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Sebelum Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span style="margin-right:70px">1. Daftar Hadir Siswa</span> <span style="margin-right:70px">3. Daftar nilai</span> <span>5. Instrumen penilaian</span><br>
                                                    <span style="margin-right:48px">2. Dokumen Layanan BK</span> <span>4. RPP</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tanggapan Penilaian terhadap dokumen dan/atau keterangan guru</b>
                                                    <br>
                                                    1. Penilaian hasil belajar mencakup <i><b><?php echo $data['ap5_point1']; ?></b></i>
                                                    <br>
                                                    2. Perencanaan pembelajaran <i><b><?php echo $data['ap5_point2']; ?></b></i> dapat mendorong dalam belajar
                                                    <br>
                                                    3. Perencanaan pembelajaran <i><b><?php echo $data['ap5_point3']; ?></b></i> dapat memunculkan daya kreativitas dan kemampuan berfikir kritis peserta didik.
                                                    <br>
                                                    4. Kegiatan pembelajaran <i><b><?php echo $data['ap5_point4']; ?></b></i> terfokus pada peserta didik
                                                    <br>
                                                    5. Bakat, minat, potensi, dan kesulitan belajar masing-masing peserta didik teridentifikasi dengan <i><b><?php echo $data['ap5_point5']; ?></b></i> baik
                                                    <br>
                                                    6. Peserta didik sesuai dengan cara belajarnya masing-masing direncanakan dengan <i><b><?php echo $data['ap5_point6']; ?></b></i> baik
                                                    <br>
                                                    7. Interaksi dengan peserta didik dan mendorongnya untuk memahami dan menggunakan informasi yang disampaikan direncanakan dengan <i><b><?php echo $data['ap5_point7']; ?></b></i> baik
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Dokumentasi dan bukti yang ada <i><b><?php echo $data['ap5_point8']; ?></b></i> baik karena itu perlu <i><b><?php echo $data['ap5_point9']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div>
                                        <p style="font-size:14px">
                                            <b>Selama Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span style="margin-right:70px">1. Daftar Hadir Siswa</span> <span style="margin-right:70px">3. Daftar nilai</span> <span>5. Instrumen penilaian</span><br>
                                                    <span style="margin-right:48px">2. Dokumen Layanan BK</span> <span>4. RPP</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Kegiatan/aktivitas guru dan peserta didik selama pengamatan:</b>
                                                    <br>
                                                    1. Penilaian hasil belajar mencakup <i><b><?php echo $data['ap5_point10']; ?></b></i>
                                                    <br>
                                                    2. Perencanaan pembelajaran <i><b><?php echo $data['ap5_point11']; ?></b></i> dapat mendorong dalam belajar
                                                    <br>
                                                    3. Pelaksanaan pembelajaran <i><b><?php echo $data['ap5_point12']; ?></b></i> dapat memunculkan daya kreativitas dan kemampuan berfikir kritis peserta didik.
                                                    <br>
                                                    4. Kegiatan pembelajaran <i><b><?php echo $data['ap5_point13']; ?></b></i> terfokus pada peserta didik.
                                                    <br>
                                                    5. Bakat, minat, potensi, dan kesulitan belajar masing-masing peserta didik teridentifikasi dengan <i><b><?php echo $data['ap5_point14']; ?></b></i> baik.
                                                    <br>
                                                    6. Peserta didik sesuai dengan cara belajarnya masing-masing direncanakan dengan <i><b><?php echo $data['ap5_point15']; ?></b></i> baik.
                                                    <br>
                                                    7. Interaksi dengan peserta didik dan mendorongnya untuk memahami dan menggunakan informasi yang disampaikan direncanakan dengan <i><b><?php echo $data['ap5_point16']; ?></b></i> baik.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Pelaksanaan pembelajaran dalam memahami dan mengembangkan potensi siswa terlaksana <i><b><?php echo $data['ap5_point17']; ?></b></i> baik karena itu perlu <i><b><?php echo $data['ap5_point18']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div>
                                        <p style="font-size:14px">
                                            <b>Setelah Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span style="margin-right:70px">1. Daftar Hadir Siswa</span> <span style="margin-right:70px">3. Daftar nilai</span> <span>5. Instrumen penilaian</span><br>
                                                    <span style="margin-right:48px">2. Dokumen Layanan BK</span> <span>4. RPP</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Setelah Pengamatan: Tanggapan Penilai terhadap dokumen dan/atau keterangan guru</b><br>
                                                    Dokumentasi dan pelaksanaan KBM dalam memahami dan mengembangkan potensi siswa terlaksana <i><b><?php echo $data['ap5_point19']; ?></b></i> baik karena itu perlu <i><b><?php echo $data['ap5_point20']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    KBM dalam memahami dan mengembangkan potensi siswa perlu <i><b><?php echo $data['ap5_point21']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 16 end -->

                <!-- page 17 start-->
                <div class="row" style="margin-top:100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Pemantauan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span style="margin-right:70px">1. Daftar Hadir Siswa</span> <span style="margin-right:70px">3. Daftar nilai</span> <span>5. Instrumen penilaian</span><br>
                                                    <span style="margin-right:48px">2. Dokumen Layanan BK</span> <span style="margin-right:103px">4. RPP</span> <span>6. Dokumen kemajuan siswa</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Catatan dan Tanggapan Penilai terhadap dokumen dan/atau keterangan guru <br>
                                                        (catat kegiatan yang dilakukan)</b><br>
                                                    Dokumentasi dan bukti dalam memahami dan mengembangkan potensi siswa <i><b><?php echo $data['ap5_point22']; ?></b></i> baik <br>
                                                    karena itu perlu <i><b><?php echo $data['ap5_point23']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 17 end -->

                <!-- page 18 start-->
                <div class="row" style="margin-top: 100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU MATA PELAJARAN</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="4"><b>Kompetensi 5: Memahami dan mengembangkan potensi</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td style="vertical-align:middle" class="center" width="2000" rowspan="2"><b>Indikator</b></td>
                                                <td class="center" colspan="3"><b>Skor</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td width="10"><b>Tidak ada bukti (Tidak terpenuhi)</b></td>
                                                <td width="10"><b>Terpenuhi sebagian</b></td>
                                                <td width="10"><b>Seluruhnya terpenuhi</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru menganalisis hasil belajar berdasarkan segala bentuk penilaian terhadap seriap peserta didik untuk mengetahui tingkat kemajuan masing-masing.
                                                </td>
                                                <?php
                                                if ($data['np5_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np5_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np5_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Guru merancang dan melaksanakan aktivitas pembelajaran yang mendorong peserta didik untuk belajar sesuai dengan kecakapan dan pola belajar masing-masing.
                                                </td>
                                                <?php
                                                if ($data['np5_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np5_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np5_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru merancang dan melaksanakan aktivitas pembelajaran untuk memunculkan daya kreativitas dan kemampuan berfikir kritis pesrta didik.
                                                </td>
                                                <?php
                                                if ($data['np5_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np5_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np5_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4. Guru secara aktif membantu peserta didik dalam proses pembelajaran dengan memberikan perhatian kepada setiap individu.
                                                </td>
                                                <?php
                                                if ($data['np5_indikator4'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np5_indikator4'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np5_indikator4'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5. Guru dapat mengidentifikasi dengan benar tentang bakat, minat, potensi dan kesulitan belajar masing-masing pesrta didik.
                                                </td>
                                                <?php
                                                if ($data['np5_indikator5'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np5_indikator5'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np5_indikator5'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    6. Guru memberikan kesempatan belajar kepada peserta didik sesuai dengan cara belajarnya masing-masing.
                                                </td>
                                                <?php
                                                if ($data['np5_indikator6'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np5_indikator6'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np5_indikator6'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    7. Guru memusatkan perhatian pada interaksi dengan peserta didik dan mendorongnya untuk memahami dan menggunakan informasi yang disampaikan.
                                                </td>
                                                <?php
                                                if ($data['np5_indikator7'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np5_indikator7'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np5_indikator7'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>Total skor untuk kompetensi 5</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['np5_total_skor']; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum kopentensi 5 = jumlah indikator x 2</td>
                                                <td style="text-align:center" colspan="3">14</td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (total skor/12) x 100%</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['np5_persentase']; ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk kompetensi 5 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="3"><b><?php echo $data['np5_nilai_kompetensi']; ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br><br>
                                    <div style="margin-left:500px; margin-top:-25px;">
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
                <!-- page 18 end -->

                <!-- page 19 start-->
                <div class="row" style="margin-top: 100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <table>
                                        <tbody>
                                            <tr style="font-size:15px">
                                                <td width="130"><b>Kompetensi 6</b></td>
                                                <td width="15">:</td>
                                                <td><b>Komunikasi dengan peserta didik</b></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Guru</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Penilai</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Sebelum Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span style="margin-right:70px">1. Daftar Hadir Siswa</span> <span style="margin-right:70px">3. Daftar nilai</span> <span>5. Instrumen penilaian</span><br>
                                                    <span style="margin-right:48px">2. Dokumen Layanan BK</span> <span style="margin-right:103px">4. RPP</span> <span>6. LKS</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tanggapan Penilaian terhadap dokumen dan/atau keterangan guru</b>
                                                    <br>
                                                    1. Pertanyaan yang menantang <i><b><?php echo $data['ap6_point1']; ?></b></i> dirumuskan dengan baik
                                                    <br>
                                                    2. Pemberian penghargaan terhadap siswa yang aktif <i><b><?php echo $data['ap6_point2']; ?></b></i> dirumuskan
                                                    <br>
                                                    3. Bentuk pertanyaan <i><b><?php echo $data['ap6_point3']; ?></b></i> sesuai dengan tujuan pembelajaran/indikator.
                                                    <br>
                                                    4. Kerjasama/ diskusi antar siswa direncanakan dengan <i><b><?php echo $data['ap6_point4']; ?></b></i> baik
                                                    <br>
                                                    5. Pendapat/jawaban siswa yang benar ataupun salah <i><b><?php echo $data['ap6_point5']; ?></b></i> direncanakan untuk dihargai
                                                    <br>
                                                    6. Untuk mengatasi siswa yang lemah telah dirumuskan dengan <i><b><?php echo $data['ap6_point6']; ?></b></i> baik
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Perencanaan pembelajaran dalam mengembangkan komunikasi dengan peserta didik <i><b><?php echo $data['ap6_point7']; ?></b></i> baik karena itu perlu <i><b><?php echo $data['ap6_point8']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div>
                                        <p style="font-size:14px">
                                            <b>Selama Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span style="margin-right:70px">1. Daftar Hadir Siswa</span> <span style="margin-right:70px">3. Daftar nilai</span> <span>5. Instrumen penilaian</span><br>
                                                    <span style="margin-right:48px">2. Dokumen Layanan BK</span> <span style="margin-right:103px">4. RPP</span> <span>6. LKS</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Kegiatan/aktivitas guru dan peserta didik selama pengamatan:</b>
                                                    <br>
                                                    1. Pertanyaan yang menantang <i><b><?php echo $data['ap6_point9']; ?></b></i> dilakukan dengan baik
                                                    <br>
                                                    2. Pemberian penghargaan terhadap siswa yang aktif <i><b><?php echo $data['ap6_point10']; ?></b></i> dilakukan
                                                    <br>
                                                    3. Bentuk pertanyaan <i><b><?php echo $data['ap6_point11']; ?></b></i> sesuai dengan tujuan pembelajaran/indikator.
                                                    <br>
                                                    4. Kerjasama/ diskusi antar siswa dilaksanakan dengan <i><b><?php echo $data['ap6_point12']; ?></b></i> baik.
                                                    <br>
                                                    5. Pendapat/jawaban siswa yang benar ataupun salah <i><b><?php echo $data['ap6_point13']; ?></b></i> dilaksanakan untuk dihargai.
                                                    <br>
                                                    6. Untuk mengatasi siswa yang lemah telah dilaksanakan dengan <i><b><?php echo $data['ap6_point14']; ?></b></i> baik.
                                                    <br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Pelaksanaan pembelajaran dalam mengembangkan komunikasi dengan peserta didik terlaksana <i><b><?php echo $data['ap6_point15']; ?></b></i> baik karena itu perlu <i><b><?php echo $data['ap6_point16']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div>
                                        <p style="font-size:14px">
                                            <b>Setelah Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span style="margin-right:70px">1. Daftar Hadir Siswa</span> <span style="margin-right:70px">3. Daftar nilai</span> <span>5. Instrumen penilaian</span><br>
                                                    <span style="margin-right:48px">2. Dokumen Layanan BK</span> <span style="margin-right:103px">4. RPP</span> <span>6. LKS</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Setelah Pengamatan: Tanggapan Penilai terhadap dokumen, pelaksanaan KBM dan/atau keterangan guru</b><br>
                                                    Dokumentasi dan pelaksanaan KBM dalam memahami dan mengembangkan potensi siswa terlaksana <i><b><?php echo $data['ap6_point17']; ?></b></i> baik karena itu perlu <i><b><?php echo $data['ap6_point18']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    KBM dalam memahami dan mengembangkan komunikasi dengan peserta didik perlu <i><b><?php echo $data['ap6_point19']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                        </section>
                    </div>
                </div>
                <!-- page 19 end -->

                <!-- page 20 start-->
                <div class="row" style="margin-top: 100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU MATA PELAJARAN</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="4"><b>Penilaian untuk Kompetensi 6: komunikasi dengan perserta didik</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td style="vertical-align:middle" class="center" rowspan="2"><b>Indikator</b></td>
                                                <td class="center" colspan="3"><b>Skor</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td width="100"><b>Tidak ada bukti (Tidak terpenuhi)</b></td>
                                                <td width="100"><b>Terpenuhi sebagian</b></td>
                                                <td width="100"><b>Seluruhnya terpenuhi</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru menggunakan pertanyaann untuk mengetahui pemahaman dan menjaga partisipasi perserta didik, termasuk memberikan pertanyaan terbuka yang menurut perserta didik untuk menjawab dengan ide dan pengetahuan mereka.
                                                </td>
                                                <?php
                                                if ($data['np6_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np6_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np6_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Guru memberikan perhatian dan medengarkan semua pertanyaan dan tanggapan perserta didik, tanpa mengintrupsi, kecuali jika diperlukan untuk membantu atau mengklarifikasi pertanyaan/tanggapan tesebut.
                                                </td>
                                                <?php
                                                if ($data['np6_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np6_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np6_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru menangapi pertanyaan persert didik secara tepat, benar, dan mutakhir, sesuai tujuan pembelajaran dan isi kurikulum, tanpa mempermalukannya
                                                </td>
                                                <?php
                                                if ($data['np6_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np6_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np6_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4. Guru menyajikan kegiatan pembelajaran yang dapat menumbuhkan kerja sma yang baik antar persertadidik.
                                                </td>
                                                <?php
                                                if ($data['np6_indikator4'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np6_indikator4'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np6_indikator4'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5. Guru mendengarkan dan memberikan perhatian terhadap semua jawaban perserta didikbaik yang benar maupun yang dianggap salah untuk mengukur tingkat pemahaman perserta didik.
                                                </td>
                                                <?php
                                                if ($data['np6_indikator5'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np6_indikator5'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np6_indikator5'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    6. Guru memberikan perhatian terhadap pertanyaan perserta didik dan meresponya secara lengkap dan relevan untuk menghilangkan kebingungan pada perserta didik.
                                                </td>
                                                <?php
                                                if ($data['np6_indikator6'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np6_indikator6'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np6_indikator6'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>

                                            <tr>
                                                <td>Total skor untuk kompetensi 6</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['np6_total_skor']; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum kopentensi 6 = jumlah indikator x 2</td>
                                                <td style="text-align:center" colspan="3">12</td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (total skor/12) x 100%</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['np6_persentase']; ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk kompetensi 6 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="3"><b><?php echo $data['np6_nilai_kompetensi']; ?></b></td>
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
                <!-- page 20 end -->

                <!-- page 21 start-->
                <div class="row" style="margin-top: 100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <table>
                                        <tbody>
                                            <tr style="font-size:15px">
                                                <td width="130"><b>Kompetensi 7</b></td>
                                                <td width="15">:</td>
                                                <td><b>Penilaian dan Evaluasi</b></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Guru</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Penilai</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Sebelum Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span style="margin-right:70px">1. Kisi-kisi Soal</span>
                                                    <span style="margin-right:70px">2. Kartu soal</span>
                                                    <span style="margin-right:70px">3. Insrtumen Soal</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tanggapan Penilaian terhadap dokumen dan/atau keterangan guru</b>
                                                    <br>
                                                    1. Alat penilaian yang disusun <i><b><?php echo $data['ap7_point1']; ?></b></i> sesuai dengan tujuan pembelajaran/indikator
                                                    <br>
                                                    2. Penilaian yang disusun dengan mengunakan <i><b><?php echo $data['ap7_point2']; ?></b></i>
                                                    <br>
                                                    3. Hasil penilaian yang dirumuskan <i><b><?php echo $data['ap7_point3']; ?></b></i> dapat mengidentifikasi topik/kompetensi dasar yang sulit sehingga diketahui kekuan dan kelemahan masing-masing peserta didik untuk keperluan remedial dan pengayaan
                                                    <br>
                                                    4. Releksi pembelajaran yang dirumuskan <i><b><?php echo $data['ap7_point4']; ?></b></i> menerima masukan peserta didik yang sesuai
                                                    <br>
                                                    5. Hasil penilaian <i><b><?php echo $data['ap7_point5']; ?></b></i> dijadikan masukan atau acuan penyusunanan RPP
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Perencanaan pembelajaran dalam mengembangkan komunikasi dengan peserta didik terlaksana <i><b><?php echo $data['ap7_point6']; ?></b></i> baik karena itu perlu <i><b><?php echo $data['ap7_point7']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div>
                                        <p style="font-size:14px">
                                            <b>Selama Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span style="margin-right:50px">1. RPP</span>
                                                    <span style="margin-right:50px">2. Intrumen/ alat penillaian</span>
                                                    <span style="margin-right:50px">3. Hasil Analisis penilaian</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tanggapan penilaian terhadap dokumen, pelaksanaan KBM dan/atau keterangan guru</b>
                                                    <br>
                                                    1. Alat penilaian yang dilaksanakan <i><b><?php echo $data['ap7_point8']; ?></b></i> sesuai dengan tujuan pembelajaran/indikator
                                                    <br>
                                                    2. Penilaian yang dilaksanakan dengan mengunakan <i><b><?php echo $data['ap7_point9']; ?></b></i>
                                                    <br>
                                                    3. Hasil penilaian yang dilaksanakan <i><b><?php echo $data['ap7_point10']; ?></b></i> dapat mengidentifikasi topik/kompetensi dasar yang sulit sehingga diketahui kekuan dan kelemahan masing-masing peserta didik untuk keperluan remedial dan pengayaan
                                                    <br>
                                                    4. Releksi pembelajaran yang dilaksanakan <i><b><?php echo $data['ap7_point11']; ?></b></i> menerima masukan peserta didik yang sesuai
                                                    <br>
                                                    5. Hasil penilaian <i><b><?php echo $data['ap7_point12']; ?></b></i> dijadikan masukan atau acuan penyusunanan RPP
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Pelaksanaan penilaian dan evaluasi pembelajaran peserta didik terlaksana <i><b><?php echo $data['ap7_point13']; ?></b></i> baik karena itu perlu <i><b><?php echo $data['ap7_point14']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div>
                                        <p style="font-size:14px">
                                            <b>Setelah Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span style="margin-right:50px">1. RPP</span>
                                                    <span style="margin-right:50px">2. Intrumen/ alat penillaian</span>
                                                    <span style="margin-right:50px">3. Hasil Analisis penilaian</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Setelah Pengamatan: Tanggapan Penilai terhadap dokumen, pelaksanaan KBM dan/atau keterangan guru</b><br>
                                                    Dokumentasi dan pelaksanaan KBM dalam pelaksanaan dan evaluasi perseta didik terlaksana <i><b><?php echo $data['ap7_point15']; ?></b></i> baik karena itu perlu <i><b><?php echo $data['ap7_point16']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    penialain dan evaluasi pada KBM perlu <i><b><?php echo $data['ap7_point17']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 21 end -->

                <!-- page 22 start-->
                <div class="row" style="margin-top: 100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU MATA PELAJARAN</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="4"><b>Kompetensi 7: Penilaian dan evaluasi</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td style="vertical-align:middle" class="center" rowspan="2"><b>Indikator</b></td>
                                                <td class="center" colspan="3"><b>Skor</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td width="100"><b>Tidak ada bukti (Tidak terpenuhi)</b></td>
                                                <td width="100"><b>Terpenuhi sebagian</b></td>
                                                <td width="100"><b>Seluruhnya terpenuhi</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru menyusun atat penilaian yang sesuai degan tujuan pembelajaran untuk mencapai kompetensi tertentu seperti yng tertulis dalam RPP.
                                                </td>
                                                <?php
                                                if ($data['np7_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np7_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np7_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Guru melaksanakan penilaian dengan berbagai teknik dan jenis penilain, selain penilaianforma yag dilaksankan disekolah, dan mengumumkan hasil serta implikasinya kepada perseta didik, tentang tingkat pemahaman terhadap materi pembelajran yang telah dan akan yang dipelajari.
                                                </td>
                                                <?php
                                                if ($data['np7_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np7_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np7_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru menganalisis hasil pinilaian untuk mengidentifikasi topik/kompetensi dasar yang sulit sehingga diketehui keuatan dan kelemahan masing-masing peserta didik untuk keperluan remedial dan pengayaan.
                                                </td>
                                                <?php
                                                if ($data['np7_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np7_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np7_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4. Guru memanfaatkan masukan dari perserta didik dan merefksikannya untuk meningkatkan pembelajaran selanjutnya, dan dapat membutiannya sesuai catatan , juarnal, pembelajaran , rancanagan pembelajaran, materi tambahan, dan sebagainya.
                                                </td>
                                                <?php
                                                if ($data['np7_indikator4'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np7_indikator4'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np7_indikator4'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5. Guru memanfaatkan hasil penilaian sebagai bahan penyusunan racangan pembelajaran yang akan dilakukan selanjutnya.
                                                </td>
                                                <?php
                                                if ($data['np7_indikator5'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np7_indikator5'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['np7_indikator5'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>

                                            <tr>
                                                <td>Total skor untuk kompetensi 7</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['np7_total_skor']; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum kopentensi 7 = jumlah indikator x 2</td>
                                                <td style="text-align:center" colspan="3">10</td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (total skor/12) x 100%</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['np7_persentase']; ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk kompetensi 7 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="3"><b><?php echo $data['np7_nilai_kompetensi']; ?></b></td>
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
                <!-- page 22 end -->

                <!-- page 23 start-->
                <div class="row" style="margin-top: 100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <div style="font-size:15px">
                                        <b>II. KEPRIBADIAN</b>
                                    </div>
                                    <br>
                                    <table>
                                        <tbody>
                                            <tr style="font-size:15px">
                                                <td width="120"><b>Kompetensi 8</b></td>
                                                <td width="15">:</td>
                                                <td><b>Bertindak sesuai dengan norma agama, hukum, sosial dan kebudayaan nasional indonesia</b></td>
                                            </tr>
                                            <tr>
                                                <td width="120">Nama Guru</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="120">Nama Penilai</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Sebelum Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span style="margin-right:70px">1. Nilai-nilai Pancasila</span>
                                                    <span style="margin-right:70px">2. Kode etik guru</span>
                                                    <span>3. UU Guru</span><br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tanggapan Penilaian terhadap dokumen dan/atau keterangan guru</b>
                                                    <br>
                                                    1. Guru <i><b><?php echo $data['ak1_point1']; ?></b></i> memahami kode etik guru dan prinsi-prinsip atau nilai-nilai pancasila
                                                    <br>
                                                    2. Guru <i><b><?php echo $data['ak1_point2']; ?></b></i> mampu mengembangkan kerjasama dan membina kebersamaaan dengan teman sejawat tanpa memperhatikan perbedaan yang ada (misalnya : suku, agama, dan gender)
                                                    <br>
                                                    3. Guru <i><b><?php echo $data['ak1_point3']; ?></b></i> menghormati dan menghargai temna sejawat sesuai dengan kondisi dan keberadaan masing-masing.
                                                    <br>
                                                    4. Guru <i><b><?php echo $data['ak1_point4']; ?></b></i> memiliki rasa persatuan dan kesatuan (nasionalisme)
                                                    <br>
                                                    5. Guru <i><b><?php echo $data['ak1_point5']; ?></b></i> mempunyai pandangan yang luas tentang keberaaman bangsa indonesia
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Sikap dan prilaku guru dalam bertindak sesuai dengan norma agama, hukum, sosial dan kebudayaan nasional indonesia perlu <i><b><?php echo $data['ak1_point6']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Pemantauan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span style="margin-right:70px">1. Nilai-nilai Pancasila</span>
                                                    <span style="margin-right:70px">2. Kode etik guru</span>
                                                    <span>3. UU Guru</span><br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    Catatan dan Tanggapan penilaian terhadap dokumen dan/atau keterangan guru
                                                    <br>
                                                    (catat kegiatan yang dilakukan) memalui wawancara dengan warga sekolah :
                                                    <br>
                                                    1. Guru <i><b><?php echo $data['ak1_point7']; ?></b></i> memiliki pandangan yang luas tentang keragaman suku, budaya, dan agama dengan dilandasi prinsip-prinsip pancasila sebagai ideologi bangsa indonesia dengan semboyan bhineka tunggal ika.
                                                    <br>
                                                    2. dalam kehidupan sehari-hari baik disekolah maupun dimasyarakat <i><b><?php echo $data['ak1_point8']; ?></b></i> menunjukan sikap saling menghormati,soladiritas dan kerjasma.
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 23 end -->

                <!-- page 24 start-->
                <div class="row" style="margin-top: 100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU MATA PELAJARAN</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="4"><b>Kompetensi 8 : Berindak sesuai dengan norma agama, hukum, sosial dan kebudayaan nasional indonesia</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td style="vertical-align:middle" class="center" rowspan="2"><b>Indikator</b></td>
                                                <td class="center" colspan="3"><b>Skor</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td width="100"><b>Tidak ada bukti (Tidak terpenuhi)</b></td>
                                                <td width="100"><b>Terpenuhi sebagian</b></td>
                                                <td width="100"><b>Seluruhnya terpenuhi</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru menghargai dan mempromosikan prinsip-prinsip pancasilla sebagi dar ediologi dan etika bagi seluruh warga indonesia.
                                                </td>
                                                <?php
                                                if ($data['nk1_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk1_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk1_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Guru mengembangkan kerjasma dan membina kebersmaan dengan teman sejawat tanpa memperhatikan perbedaan yang ada (misalnya : suku, agama, dan gender).
                                                </td>
                                                <?php
                                                if ($data['nk1_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk1_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk1_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru saling menghormati dan menghargai teman sejawat sesyi engan kondisi dan keberadan masing-masing
                                                </td>
                                                <?php
                                                if ($data['nk1_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk1_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk1_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4. Guru memiliki rasa persatuan dan kkesatuan sebagai bangsa indonesia.
                                                </td>
                                                <?php
                                                if ($data['nk1_indikator4'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk1_indikator4'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk1_indikator4'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5. Guru mempunyai pandanagan yang luas tentang keberagaman bangsa indonesia (misalnya : budaya, suku, agama).
                                                </td>
                                                <?php
                                                if ($data['nk1_indikator5'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk1_indikator5'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk1_indikator5'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>

                                            <tr>
                                                <td>Total skor untuk kompetensi 8</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['nk1_total_skor']; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum kopentensi 8 = jumlah indikator x 2</td>
                                                <td style="text-align:center" colspan="3">10</td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (total skor/12) x 100%</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['nk1_persentase']; ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk kompetensi 8 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="3"><b><?php echo $data['nk1_nilai_kompetensi']; ?></b></td>
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
                <!-- page 24 end -->

                <!-- page 25 start-->
                <div class="row" style="margin-top:100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <table>
                                        <tbody>
                                            <tr style="font-size:15px">
                                                <td width="130"><b>Kompetensi 9</b></td>
                                                <td width="15">:</td>
                                                <td><b>Menunjukan pribadi yang dewasa dan teladan</b></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Guru</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Penilai</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Sebelum Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span>1. Guru santun tehadap semua warga sekolah (stakeholders) dalam berkominikasi</span><br>
                                                    <span>2. Perseta didik sopan, santun dan hormat terhadap gurunya</span><br>
                                                    <span>3. Perseta didik tanggap dan berpartisipasi aktif dalam pembelajaran penilaian</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tanggapan Penilaian terhadap dokumen dan/atau keterangan guru</b>
                                                    <br>
                                                    1. Guru bertingkah laku <i><b><?php echo $data['ak2_point1']; ?></b></i> sopan dalam berbicara, berpenampilan, dan berbuat terhadap semua perseta didik, orang tua, dan teman sejawat
                                                    <br>
                                                    2. Guru <i><b><?php echo $data['ak2_point2']; ?></b></i> bersedia membagi pengalamannya dengan teman sejawat, termaksuk mengundang mereka untuk mengobservasi cara mengajarnya dan memberikan masukan.
                                                    <br>
                                                    3. Guru <i><b><?php echo $data['ak2_point3']; ?></b></i> mampu mengeola pembelajaran yang membuktikan bahwa guru dihormati oleh perseta didik sehingga semua perserta didik selalu memperhatikan guru dan berpartisipasi aktif dalam proses pembelajaran.
                                                    <br>
                                                    4. Guru bersikap <i><b><?php echo $data['ak2_point4']; ?></b></i> dewasa menerima masukan dari perseta didik dan memberikan kesempatan kepada perseta didik untuk berpartisipasi dalam proses pembelajaran.
                                                    <br>
                                                    5. Guru berperilaku <i><b><?php echo $data['ak2_point5']; ?></b></i> baik untuk mencitrakan baik sekolah.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    sikap dan prilaku guru dalam menunjukkan pribadi yang dewasa dan teladan perlu <i><b><?php echo $data['ak2_point6']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Pemantauan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span>1. Guru santun tehadap semua warga sekolah (stakeholders) dalam berkominikasi</span><br>
                                                    <span>2. Perseta didik sopan, santun dan hormat terhadap gurunya</span><br>
                                                    <span>3. Perseta didik tanggap dan berpartisipasi aktif dalam pembelajaran penilaian</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    Catatan dan tanggapan penilaian terhadap dokumen dan/atau keterangan guru
                                                    <br>
                                                    (catat kegiatan yang dilakuan) mealui wawancara dan pengamatan
                                                    <br>
                                                    1. Guru hadir <i><b><?php echo $data['ak2_point7']; ?></b></i> tepat waktu baik disekolah dan dikelas
                                                    <br>
                                                    2. Hasil evauasi dan tugas siswa <i><b><?php echo $data['ak2_point8']; ?></b></i> dinilai dan dikembalikan ke siswa
                                                    <br>
                                                    3. Guru <i><b><?php echo $data['ak2_point9']; ?></b></i> berperan aktif dalam kegiatan MGMP di sekolah
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 25 end -->

                <!-- page 26 start-->
                <div class="row" style="margin-top: 100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU MATA PELAJARAN</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="4"><b>Kompetensi 9 : Menunjukan pribadi yang dewasa dan teladan</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td style="vertical-align:middle" class="center" rowspan="2"><b>Indikator</b></td>
                                                <td class="center" colspan="3"><b>Skor</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td width="100"><b>Tidak ada bukti (Tidak terpenuhi)</b></td>
                                                <td width="100"><b>Terpenuhi sebagian</b></td>
                                                <td width="100"><b>Seluruhnya terpenuhi</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru bertingah laku sopan dalam berbicara, berpenampian, dan berbuat terhadap semua perseta didik, orang tua, teman sejawat.
                                                </td>
                                                <?php
                                                if ($data['nk2_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk2_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk2_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Guru mau membagi pengalamannya dengan teman sejawat, termasuk mengundang mereka untuk mengobservasi cara mengajar dan memberi masukan.
                                                </td>
                                                <?php
                                                if ($data['nk2_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk2_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk2_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru mampu memnegelah pembelajaran yang membuktikan bahwa guru di hrmati eh perserta didik, sehingga semua perserta didik selalu memperhatikan guru dan berprtisipasi aktif dalm prses pembelajran.
                                                </td>
                                                <?php
                                                if ($data['nk2_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk2_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk2_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4. Guru bersikap dewasa dalm menerima masukan dari perseta didik dan memberikan kesempatan kepada perserta didik untuk berprtisipasi dalam proses pembelajaran.
                                                </td>
                                                <?php
                                                if ($data['nk2_indikator4'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk2_indikator4'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk2_indikator4'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5. Guru berprilaku baik untuk menceritakan nama baik sekolah.
                                                </td>
                                                <?php
                                                if ($data['nk2_indikator5'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk2_indikator5'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk2_indikator5'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>

                                            <tr>
                                                <td>Total skor untuk kompetensi 9</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['nk2_total_skor']; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum kopentensi 9 = jumlah indikator x 2</td>
                                                <td style="text-align:center" colspan="3">10</td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (total skor/12) x 100%</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['nk2_persentase']; ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk kompetensi 9 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="3"><b><?php echo $data['nk2_nilai_kompetensi']; ?></b></td>
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
                <!-- page 26 end -->

                <!-- page 27 start-->
                <div class="row" style="margin-top: 100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <table>
                                        <tbody>
                                            <tr style="font-size:15px">
                                                <td width="130"><b>Kompetensi 10</b></td>
                                                <td width="15">:</td>
                                                <td><b>Etos kerja, tanggung jawab yang tinggi, dan bangga menjadi guru</b></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Guru</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Penilai</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Sebelum Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span>1. Daftar hadir guru</span><br>
                                                    <span>2. Jurnal/ agenda kerja</span><br>
                                                    <span>3. Jadwal tatap muka</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Kegiatan/aktifitas guru perserta didik selama pengamatan :</b>
                                                    <br>
                                                    1. Guru <i><b><?php echo $data['ak3_point1']; ?></b></i> mengawali dan mengaakhir pembelajaran dan tepat waktu
                                                    <br>
                                                    2. Jika guru harus meningalkan kelas , guru <i><b><?php echo $data['ak3_point2']; ?></b></i> mengaktifkan siswa dengan melakukan hal-hal produktif terkait dengan mata pelajaran dan meminta guru piket atau guru lain untuk mengawasi kelas.
                                                    <br>
                                                    3. Guru <i><b><?php echo $data['ak3_point3']; ?></b></i> memenuhi jam mengajar dan dapat melakukan semua kegiatan lain diluar jam mengajar berdasarkan ijin dan persetujuan pengelolah sekolah.
                                                    <br>
                                                    4. Guru <i><b><?php echo $data['ak3_point4']; ?></b></i> meminta ijin dan mmberitahu lebih awal, dengan memberikan alasan dan bukti yang sah jika tidak menghadiri kegiatan yang telah direncanakan, termasuk proses pembelajaran dikelas.
                                                    <br>
                                                    5. Guru <i><b><?php echo $data['ak3_point5']; ?></b></i> menyelesaikan semua tugas administraktif dan non pembelajaran dengan tepat waktu sesuai standar yang ditetapkan
                                                    <br>
                                                    6. Guru <i><b><?php echo $data['ak3_point6']; ?></b></i> memanfatkan waktu luang selain mengajar untuk kegiatan yang produktif terkait dengan tugasnya.
                                                    <br>
                                                    7. Guru <i><b><?php echo $data['ak3_point7']; ?></b></i> memberikan kontribusi terhadap pengembangan sekolah dan mempunyai prestasi yang berdampak positif terhadap nama baik sekolah.
                                                    <br>
                                                    8. Guru <i><b><?php echo $data['ak3_point8']; ?></b></i> merasa bangga dengan propesinya sebagai guru.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    sikap dan prilaku guru dalam etos kerja, tanggung jawab yng tinggi, dan rasa bangga menjadi guru <i><b><?php echo $data['ak3_point9']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Pemantauan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span>1. Daftar hadir guru</span><br>
                                                    <span>2. Jurnal/ agenda kerja</span><br>
                                                    <span>3. Jadwal tatap muka</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    Catatan dan tanggapan penilaian terhadap dokumen dan/atau keterangan guru
                                                    <br>
                                                    (catat kegiatan yang dilakuan) dari hasil pemantauan dan wawancara dengan warga sekolah diperoleh
                                                    <br>
                                                    1. Pengaturan waktu dalam memulai dan mengkhiri pembelajaran <i><b><?php echo $data['ak3_point10']; ?></b></i> sesuai dengan RPP
                                                    <br>
                                                    2. Kehadiran guru dikelas <i><b><?php echo $data['ak3_point11']; ?></b></i> dan sisanya memberikn tugas yang harus dikerjakan oleh perserta didik dan memiliki komitmen dalam mengevaluasi dan memberikan penilaian/terhadap tugas-tugas dan pembelajaran
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 27 end -->

                <!-- page 28 start-->
                <div class="row" style="margin-top: 75px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU MATA PELAJARAN</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="4"><b>Kompetensi 10 : Etos kerja, tanggung jawab yang tinggi, dan rasa bangga menjadi guru</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td style="vertical-align:middle" class="center" width="2000" rowspan="2"><b>Indikator</b></td>
                                                <td class="center" colspan="3"><b>Skor</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td width="10"><b>Tidak ada bukti (Tidak terpenuhi)</b></td>
                                                <td width="10"><b>Terpenuhi sebagian</b></td>
                                                <td width="10"><b>Seluruhnya terpenuhi</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru mengawali dan mengakhiri pembelajaran dengan tepat waktu.
                                                </td>
                                                <?php
                                                if ($data['nk3_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk3_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk3_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Guru jika guru harus meningalkan kelas, guru mengaktifkan siswa dengan melakukan hal-hal produktif terkait dengan matapelajaran, dan mementa guru piket atau guru lain untuk mengawasi kelas.
                                                </td>
                                                <?php
                                                if ($data['nk3_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk3_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk3_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru memenuhi jam mengajar dan dapt melakukan semua kegiatan lain diluar jam mengajar berdasarkan ijin dan persetujuan dan pengelolah sekolah.
                                                </td>
                                                <?php
                                                if ($data['nk3_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk3_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk3_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4. Guru meminta ijin dan memberitahu lebih awal, dengan memberikan alasan dan bukti ynag sah jika tidak menghadiri kegiatan yang telah direncanakan, termasuk proses pembelajaran dikelas.
                                                </td>
                                                <?php
                                                if ($data['nk3_indikator4'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk3_indikator4'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk3_indikator4'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5. Guru melesaikan semua tugas administratif dan n0n_pembelajaran dengan tepat waktu sesuai standar yang ditetapkan.
                                                </td>
                                                <?php
                                                if ($data['nk3_indikator5'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk3_indikator5'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk3_indikator5'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    6. Guru memanfaatkan waktu luang selain mengajar untuk kegiatan yang prduktif terkait dengan tugasnya.
                                                </td>
                                                <?php
                                                if ($data['nk3_indikator6'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk3_indikator6'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk3_indikator6'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    7. Guru memberikan k0ntribusi terhadap pengembangan sek0lah dan mempunyai prestasi yang berdampak p0sitif terhadap nama baik seklah.
                                                </td>
                                                <?php
                                                if ($data['nk3_indikator7'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk3_indikator7'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk3_indikator7'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    8. Guru merasa bangga dengan profesi nya sebagi guru.
                                                </td>
                                                <?php
                                                if ($data['nk3_indikator8'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk3_indikator8'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['nk3_indikator8'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>

                                            <tr>
                                                <td>Total skor untuk kompetensi 10</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['nk3_total_skor']; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum kopentensi 10 = jumlah indikator x 2</td>
                                                <td style="text-align:center" colspan="3">16</td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (total skor/12) x 100%</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['nk3_persentase']; ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk kompetensi 10 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="3"><b><?php echo $data['nk3_nilai_kompetensi']; ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br><br>
                                    <div style="margin-left:500px; margin-top:-25px;">
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
                <!-- page 28 end -->

                <!-- page 29 start-->
                <div class="row" style="margin-top:100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <div style="font-size:15px">
                                        <b>III. SOSIAL</b>
                                    </div>
                                    <br>
                                    <table>
                                        <tbody>
                                            <tr style="font-size:15px">
                                                <td width="130"><b>Kompetensi 11</b></td>
                                                <td width="15">:</td>
                                                <td><b>Bersikap inklusif, bertindak objektif, serta tidak diskriminatif</b></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Guru</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Penilai</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Sebelum Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span>1. Daftar nilai</span><br>
                                                    <span>2. Lembar kerja siswa</span><br>
                                                    <span>3. Program perbaikan/pengayakan</span><br>
                                                    <span>4. Buku kasus/catatan solusi terhadap siswa yang bermasalah</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Kegiatan/aktifitas guru peserta didik selama pengamatan :</b>
                                                    <br>
                                                    1. Guru <i><b><?php echo $data['as1_point1']; ?></b></i> memperlakukan semua peserta didik secara adil , memberikan perhatian dan bantuan sesuai kebutuhan masing-masing, tanpa memperdulikan faktor personal.
                                                    <br>
                                                    2. Guru <i><b><?php echo $data['as1_point2']; ?></b></i> menjaga hubungan baik dengan teman sejawat (bersikap inklusif), serta berkontribusi positif terhadap semua diskusi formal dan informal terkait dengan pekerjaannya.
                                                    <br>
                                                    3. Guru berinteraksi dengan peserta didik dan tidak membatasi perhatiannya pada kelompok tertentu (misalnya: peserta didik yang pandai, kaya, berasal dari daerah yang sama dengan guru) <i><b><?php echo $data['as1_point3']; ?></b></i> baik
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    sikap dan prilaku guru dalam etos kerja, tanggung jawab yng tinggi, dan rasa bangga menjadi guru <i><b><?php echo $data['as1_point4']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Pemantauan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span>1. Daftar nilai</span><br>
                                                    <span>2. Lembar kerja siswa</span><br>
                                                    <span>3. Program perbaikan/pengayakan</span><br>
                                                    <span>4. Buku kasus/catatan solusi terhadap siswa yang bermasalah</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    Catatan dan Tanggapan penilaian terhadap dokumen dan/atau keterangan guru
                                                    <br>
                                                    (catat kegiatan yang dilakuan) dari hasil wawancara
                                                    <br>
                                                    1. Guru berkomunikasi dan berinteraksi dengan peserta didik, sambil bertanya dengan individu atau kelompok sangat <i><b><?php echo $data['as1_point5']; ?></b></i> baik
                                                    <br>
                                                    2. Guru <i><b><?php echo $data['as1_point6']; ?></b></i> memberikan reward kepada peserta didik yang memberikan jawaban dan perkerjaan yang benar dan baik.
                                                    <br>
                                                    3. Kepedulian guru kepada semua warga sekolah, orang tua dan masyarakat lingkungan sekolah dengan <i><b><?php echo $data['as1_point7']; ?></b></i> baik
                                                    <br>
                                                    4. Guru <i><b><?php echo $data['as1_point8']; ?></b></i> meberikan kontribusi dalam berbagai pertemuan diskusi dan rapat
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 29 end -->

                <!-- page 30 start-->
                <div class="row" style="margin-top: 100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU MATA PELAJARAN</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="4"><b>Kompetensi 11 : Bersikap inklusif, bertindak objektif, serta tidak diskriminatif</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td style="vertical-align:middle" class="center" rowspan="2"><b>Indikator</b></td>
                                                <td class="center" colspan="3"><b>Skor</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td width="100"><b>Tidak ada bukti (Tidak terpenuhi)</b></td>
                                                <td width="100"><b>Terpenuhi sebagian</b></td>
                                                <td width="100"><b>Seluruhnya terpenuhi</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru memperlakukan semua peserta didik secara adil, memberikan perhatian dan bantuan sesuai kebutuhan masing-masing, tanpa meperdulikan faktor personal.
                                                </td>
                                                <?php
                                                if ($data['ns1_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['ns1_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['ns1_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Guru menjaga hubungan baik dan peduli dengan teman sejawan (bersifat inklusif, serta berkontribusi positif terhadap semua diskusi formal dan informal terkait dengan pekerjaannya.
                                                </td>
                                                <?php
                                                if ($data['ns1_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['ns1_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['ns1_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru sering berinteraksi dengan perserta didik dan tidak membatasi perhatiannya hanya pada kelompok tertentu (misalnya: perserta didik yang pandai, kaya, berasal dari daerah yang sama degan guru).
                                                </td>
                                                <?php
                                                if ($data['ns1_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['ns1_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['ns1_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>

                                            <tr>
                                                <td>Total skor untuk kompetensi 11</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['ns1_total_skor']; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum kopentensi 11 = jumlah indikator x 2</td>
                                                <td style="text-align:center" colspan="3">6</td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (total skor/12) x 100%</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['ns1_persentase']; ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk kompetensi 11 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="3"><b><?php echo $data['ns1_nilai_kompetensi']; ?></b></td>
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
                <!-- page 30 end -->

                <!-- page 31 start-->
                <div class="row" style="margin-top: 100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <table>
                                        <tbody>
                                            <tr style="font-size:15px">
                                                <td width="130"><b>Kompetensi 12</b></td>
                                                <td width="15">:</td>
                                                <td><b>Komunikasi dengan sesama guru, tenaga pendidikan, orang tua peserta didik, dan masyarakat</b></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Guru</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Penilai</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Pemantauan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span>Buku catatan kemajuan & pelanggaran siswa serta solusinya</span><br>
                                                    <span>Dokumen pernah menyelesaikan permasalahan siswa bersama guru lain</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    Catatan dan Tanggapan Penilaian terhadap dokumen dan/atau keterangan guru
                                                    <br>
                                                    (catat kegiatan yang dilakukan)
                                                    <br>
                                                    1. Guru memiliki dokumen pencatatan pertemuan guru yang berkenan dengan aspek kemajuan, kesulitan dan potensi peserta didik dengan <i><b><?php echo $data['as2_point1']; ?></b></i>
                                                    <br>
                                                    2. Adanya dokumen kerjasama guru dengan guru BK dan wakasek serta tenaga TU berkenan dengan pelayanan terhadap peserta didik dalam berbagai aspek. Dengan <i><b><?php echo $data['as2_point2']; ?></b></i> dirumuskan
                                                    <br>
                                                    3. Guru <i><b><?php echo $data['as2_point3']; ?></b></i> memperhatikan sekolah sebagai bagian dari masyarakat, berkomunikasi dengan masyarakat sekitar, serta berperan dalam kegiatan sosial di masyarakat.
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 31 end -->

                <!-- page 32 start-->
                <div class="row" style="margin-top: 100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU MATA PELAJARAN</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="4"><b>Kompetensi 12: Komunikasi dengan sesama guru, tenaga pendidikan, orang tua peserta didik, dan masyarakat</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td style="vertical-align:middle" class="center" rowspan="2"><b>Indikator</b></td>
                                                <td class="center" colspan="3"><b>Skor</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td width="100"><b>Tidak ada bukti (Tidak terpenuhi)</b></td>
                                                <td width="100"><b>Terpenuhi sebagian</b></td>
                                                <td width="100"><b>Seluruhnya terpenuhi</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru menyampaikan informasi tentang kemajuan, kesulitan, dan potensi peserta didik kepada orang tuanya, baik dalam pertemuan formal maupun tidak formal antara guru dan orang tua, teman sejawat, dan dapat menunjukkan buktinya.
                                                </td>
                                                <?php
                                                if ($data['ns2_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['ns2_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['ns2_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Guru ikut berperan aktif dalam kegiatan di luar pembelajaran yang diselenggarakan oleh sekolah dan masyarakat dan dapat memberikan bukti keikutsertaannya.
                                                </td>
                                                <?php
                                                if ($data['ns2_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['ns2_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['ns2_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru memperhatikan sekolah sebagai bagian dari masyarakat, berkomunikasi dengan masyarakat sekitar, serta dalam kegiatan sosial di masyarakat.
                                                </td>
                                                <?php
                                                if ($data['ns2_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['ns2_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['ns2_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>

                                            <tr>
                                                <td>Total skor untuk kompetensi 12</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['ns2_total_skor']; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum kopentensi 12 = jumlah indikator x 2</td>
                                                <td style="text-align:center" colspan="3">6</td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (total skor/12) x 100%</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['ns2_persentase']; ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk kompetensi 12 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="3"><b><?php echo $data['ns2_nilai_kompetensi']; ?></b></td>
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
                <!-- page 32 end -->

                <!-- page 33 start-->
                <div class="row" style="margin-top: 100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <div style="font-size:15px">
                                        <b>IV. PROFESIONAL</b>
                                    </div>
                                    <br>
                                    <table>
                                        <tbody>
                                            <tr style="font-size:15px">
                                                <td width="130"><b>Kompetensi 13</b></td>
                                                <td width="15">:</td>
                                                <td><b>Penguasaan materi struktur konsep dan pola pikir keilmuan yang mendukung mata pelajaran yang diampu</b></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Guru</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Penilai</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Sebelum Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span>RPP, Rangkuman materi</span><br>
                                                    <span>Buku guru</span><br>
                                                    <span>LKS yang dibuat guru</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tanggapan Penilaian terhadap dokumen dan/atau keterangan guru</b>
                                                    <br>
                                                    1. Guru <i><b><?php echo $data['apf1_point1']; ?></b></i> melakukan pemetaan standar kompetensi dan kompetensi dasar sampai dengan mengidentifikasi kesulitan materi pelajaran dengan benar
                                                    <br>
                                                    2. Guru merumuskan materi pembelajaran dalam rencana pelaksanaan pembelajaran sesuai dengan kondisi sekolah dengan kualitas <i><b><?php echo $data['apf1_point2']; ?></b></i>
                                                    <br>
                                                    3. Materi pembelajaran yang disusun <i><b><?php echo $data['apf1_point3']; ?></b></i>
                                                    <br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Pengusaan materi struktur konsep dan pola pikir keilmuan yang mendukung mata pelajaran yang diampu bagi guru berkualitas <i><b><?php echo $data['apf1_point4']; ?></b></i> karena itu perlu <i><b><?php echo $data['apf1_point5']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div>
                                        <p style="font-size:14px">
                                            <b>Selama Pengamatan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span>RPP, Rangkuman materi</span><br>
                                                    <span>Buku guru</span><br>
                                                    <span>LKS yang dibuat guru</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tanggapan Penilaian terhadap dokumen dan/atau keterangan guru</b>
                                                    <br>
                                                    1. Guru <i><b><?php echo $data['apf1_point6']; ?></b></i> melakukan pemetaan standar kompetensi dan kompetensi dasar sampai dengan mengidentifikasi kesulitan materi pelajaran dengan benar
                                                    <br>
                                                    2. Guru menguasai materi pembelajaran dalam pelaksanaan pembelajaran sesuai dengan kondisi sekolah dengan kualitas <i><b><?php echo $data['apf1_point7']; ?></b></i>
                                                    <br>
                                                    3. Materi pembelajaran yang disajikan kepada siswa, dengan tingkat pemahaman siswa <i><b><?php echo $data['apf1_point8']; ?></b></i>
                                                    <br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Tindak lanjut yang diperlukan:</b>
                                                    <br>
                                                    Pengusaan materi struktur konsep dan pola pikir keilmuan yang mendukung pelajaran yang diampu bagi guru pada penyampaian kepada siswa berkualitas <i><b><?php echo $data['apf1_point9']; ?></b></i> karena itu perlu <i><b><?php echo $data['apf1_point10']; ?></b></i> lebih lanjut
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 33 end -->

                <!-- page 34 start-->
                <div class="row" style="margin-top: 100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU MATA PELAJARAN</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="4"><b>Kompetensi 13: Penguasaan materi struktur konsep dan pola pikir keilmuan yang mendukung mata</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td style="vertical-align:middle" class="center" rowspan="2"><b>Indikator</b></td>
                                                <td class="center" colspan="3"><b>Skor</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td width="100"><b>Tidak ada bukti (Tidak terpenuhi)</b></td>
                                                <td width="100"><b>Terpenuhi sebagian</b></td>
                                                <td width="100"><b>Seluruhnya terpenuhi</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru melakukan pemetaan standar kompetensi dan kompetensi dasar untuk mata pelajaran yang diampunya, untuk mengidentifikasi materi pembelajaran yang dianggap sulit, melakukan perencanaan dan pelaksanaan pembelajaran, dan memperkirakan alokasi waktu yang diperlukan.
                                                </td>
                                                <?php
                                                if ($data['npf1_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['npf1_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['npf1_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Guru menyertakan informasi yang tepat dan mutakhir didalam perencanaan dan pelaksanaan pembelajaran.
                                                </td>
                                                <?php
                                                if ($data['npf1_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['npf1_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['npf1_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru menyusun materi, perencanaan dan pelaksanaan pembelajaran yang berisi informasi yang tepat, mutakhir, dan yang membantu peserta didik untuk memahami konsep materi pembelajaran.
                                                </td>
                                                <?php
                                                if ($data['npf1_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['npf1_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['npf1_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>

                                            <tr>
                                                <td>Total skor untuk kompetensi 13</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['npf1_total_skor']; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum kopentensi 13 = jumlah indikator x 2</td>
                                                <td style="text-align:center" colspan="3">6</td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (total skor/12) x 100%</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['npf1_persentase']; ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk kompetensi 13 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="3"><b><?php echo $data['npf1_nilai_kompetensi']; ?></b></td>
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
                <!-- page 34 end -->

                <!-- page 35 start-->
                <div class="row" style="margin-top: 100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <table>
                                        <tbody>
                                            <tr style="font-size:15px">
                                                <td width="130"><b>Kompetensi 14</b></td>
                                                <td width="15">:</td>
                                                <td><b>Mengembangkan keprofesionalan melalui tindakan reflektif</b></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Guru</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="130">Nama Penilai</td>
                                                <td width="15">:</td>
                                                <td><?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <div>
                                        <p style="font-size:14px">
                                            <b>Pemantauan</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="100"><b>Keterangan</b></td>
                                                <td width="15"></td>
                                            </tr>
                                            <tr>
                                                <td width="100">Dokumen dan bahan lain yang diperiksa</td>
                                                <td width="250">
                                                    <span>Sertifikat/piagam pelatihan</span><br>
                                                    <span>Piagam penghargaan</span><br>
                                                    <span>Buku referensi guru</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" width="100">
                                                    <b>Catatan dan Tanggapan Penilaian terhadap dokumen dan/atau keterangan guru
                                                        <br>
                                                        (catat kegiatan yang dilakukan)</b>
                                                    <br>
                                                    1. Guru <i><b><?php echo $data['apf2_point1']; ?></b></i> melakukan evaluasi diri secara spesifik, lengkap, dan didukung dengan contoh pengalaman diri sendiri.
                                                    <br>
                                                    2. Guru <i><b><?php echo $data['apf2_point2']; ?></b></i> memiliki jurnal pembelajaran, catatan masukan dari kolega atau hasil penilaian proses pembelajaran sebagai bukti yang mengambarkan kinerjanya dengan kualitas kurang/cukup/baik.
                                                    <br>
                                                    3. Guru <i><b><?php echo $data['apf2_point3']; ?></b></i> memanfaatkan bukti gambaran kinerjanya untuk mengembangkan perencamnaan dan pelaksanaan pembelajaran selanjutnya dalam program Pengembangan Keprofesian Berkelanjutan (PKB).
                                                    <br>
                                                    4. Guru <i><b><?php echo $data['apf2_point4']; ?></b></i> dapat mengaplikasikan pengalaman PKB dalam perencanaan, pelaksanaan, penilaian pembelajaran dan tindak lanjutnya.
                                                    <br>
                                                    5. Guru melakukan penelitian, mengembangkan karya inovasi, mengikuti kegiatan ilmiah (misalnya seminar, konferensi), dan aktif dalam melaksanakan PKB yang ditunjukkan dengan piagam atau sertifikat atau karya ilmiahnya. <i><b><?php echo $data['apf2_point5']; ?></b></i>
                                                    <br>
                                                    6. Guru <i><b><?php echo $data['apf2_point6']; ?></b></i> dapat memanfaatkan TIK dalam berkomunikasi dan pelaksanaan PKB.
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 35 end -->

                <!-- page 36 start-->
                <div class="row" style="margin-top: 75px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br><br>
                                    <div>
                                        <p style="font-size:16px;text-align:center">
                                            <b>INSTRUMEN DAN RUBRIK PENILAIAN KINERJA GURU MATA PELAJARAN</b><br>
                                        </p>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="4"><b>Kompetensi 14: Mengembangkan keprofesionalan melalui tindakan efektif</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td style="vertical-align:middle" class="center" rowspan="2"><b>Indikator</b></td>
                                                <td class="center" colspan="3"><b>Skor</b></td>
                                            </tr>
                                            <tr style="text-align:center">
                                                <td width="100"><b>Tidak ada bukti (Tidak terpenuhi)</b></td>
                                                <td width="100"><b>Terpenuhi sebagian</b></td>
                                                <td width="100"><b>Seluruhnya terpenuhi</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1. Guru melakukan evaluasi diri secara spesifik, lengkap, dan didukung dengan contoh pengalaman diri sendiri.
                                                </td>
                                                <?php
                                                if ($data['npf2_indikator1'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['npf2_indikator1'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['npf2_indikator1'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2. Guru memiliki jurnal pembelajaran, catatan masukan dari kolega atau hasil penilaian proses pembelajaran sebagai bukti yang menggambarkan kinerjanya.
                                                </td>
                                                <?php
                                                if ($data['npf2_indikator2'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['npf2_indikator2'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['npf2_indikator2'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3. Guru memanfaatkan bukti gambaran kinerjanya untuk mengembangkan perencanaan dan pelaksanaan pembelajaran selanjutnya dalam program Pengembangan Keprofesian Berkelanjutan (PKB).
                                                </td>
                                                <?php
                                                if ($data['npf2_indikator3'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['npf2_indikator3'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['npf2_indikator3'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4. Guru dapat mengaplikasikan pengalaman PKB dalam perencanaan, pelaksanaan, penilaian, pembelajaran, dan tindak lanjutnya.
                                                </td>
                                                <?php
                                                if ($data['npf2_indikator4'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['npf2_indikator4'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['npf2_indikator4'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5. Guru melakukan penelitian, mengembangkan karya inovasi, mengikuti kegiatan ilmiah (misalnya seminar, konferensi), dan aktif dalam melaksanakan PKB.
                                                </td>
                                                <?php
                                                if ($data['npf2_indikator5'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['npf2_indikator5'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['npf2_indikator5'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    6. Guru dapat memanfaatkan TIK dalam berkomunikasi dan pelaksanaan PKB.
                                                </td>
                                                <?php
                                                if ($data['npf2_indikator6'] == '0') { ?>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>0</b></span></td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['npf2_indikator6'] == '1') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>1</b></span></td>
                                                    <td style="text-align:center" width="100">2</td>
                                                <?php
                                                } elseif ($data['npf2_indikator6'] == '2') { ?>
                                                    <td style="text-align:center" width="100">0</td>
                                                    <td style="text-align:center" width="100">1</td>
                                                    <td style="text-align:center" width="100"><span style="border:1px solid #bcbcbc;padding:5px;border-radius:50px"><b>2</b></span></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>

                                            <tr>
                                                <td>Total skor untuk kompetensi 14</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['npf2_total_skor']; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Skor maksimum kopentensi 14 = jumlah indikator x 2</td>
                                                <td style="text-align:center" colspan="3">12</td>
                                            </tr>
                                            <tr>
                                                <td>Persentase = (total skor/12) x 100%</td>
                                                <td style="text-align:center" colspan="3"><b><?php echo $data['npf2_persentase']; ?> %</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nilai untuk kompetensi 14 <br>
                                                    (0% < X ≤ 25%=1; 25% < X ≤ 50%=2; <br>
                                                        50% < X ≤ 75%=3; 75% < x ≤ 100%=4) </td>
                                                <td style="text-align:center;vertical-align:middle" colspan="3"><b><?php echo $data['npf2_nilai_kompetensi']; ?></b></td>
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
                <!-- page 36 end -->

                <!-- page 37 start-->
                <div class="row" style="margin-top: 100px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">
                                <section>
                                    <br>
                                    <div>
                                        <p style="border:1px solid #bcbcbc;text-align:center;font-size:14px;margin-left:500px"><b>Lampiran IC</b></p>
                                    </div>
                                    <div>
                                        <p style="text-align:center;font-size:18px"><b>REKAP HASIL PENILAIAN KINERJA GURU KELAS/MATA PELAJARAN</b></p>
                                    </div>
                                    <table style="margin-left:15px; font-size:12px;" cellpadding="3">
                                        <tbody>
                                            <tr>
                                                <td width="30">a.</td>
                                                <td width="300">Nama Guru</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">NIY</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['nipa']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Tempat, Tanggal Lahir</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['tempat_lahira']; ?>, <?php echo $tanggal_lahira; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Pangkat/Golongan/Jabatan</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['pangkat_golongana']; ?> / <?php echo $data['jabatan_fungsionala']; ?></td>
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
                                                <td width="500"><?php echo $data['masa_kerjaa']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Jenis Kelamin</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['jenis_kelamina']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Pendidikan terakhir/spesialisai</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['pendidikan_terakhira']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Program Keahlian yang diampu</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['mata_pelajarana']; ?></td>
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
                                            <td colspan="3"><b>Pedagogik</b></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">1.</td>
                                            <td>Menguasai Karakteristik Peserta Didik</td>
                                            <td style="text-align:center" width="100"><?php echo $data['np1_nilai_kompetensi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">2.</td>
                                            <td>Menguasai teori belajar dan prinsip-prinsip pembelajaran yang mendidik.</td>
                                            <td style="text-align:center" width="100"><?php echo $data['np2_nilai_kompetensi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">3.</td>
                                            <td>Pengembangan kurikulum</td>
                                            <td style="text-align:center" width="100"><?php echo $data['np3_nilai_kompetensi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">4.</td>
                                            <td>Kegiatan pembelajaran yang mendidik</td>
                                            <td style="text-align:center" width="100"><?php echo $data['np4_nilai_kompetensi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">5.</td>
                                            <td>Pengembangan potensi peserta didik.</td>
                                            <td style="text-align:center" width="100"><?php echo $data['np5_nilai_kompetensi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">6.</td>
                                            <td>Komunikasi dengan peserta didik.</td>
                                            <td style="text-align:center" width="100"><?php echo $data['np6_nilai_kompetensi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">7.</td>
                                            <td>Penilaian dan evaluasi</td>
                                            <td style="text-align:center" width="100"><?php echo $data['np7_nilai_kompetensi']; ?></td>
                                        </tr>

                                        <tr>
                                            <td colspan="3"><b>Kepribadian</b></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">8.</td>
                                            <td>Bertindak sesuai dengan norma agama, hukum, sosial, dan kebudayaan nasional.</td>
                                            <td style="text-align:center" width="100"><?php echo $data['nk1_nilai_kompetensi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">9.</td>
                                            <td>Menunjukkan pribadi yang dewasa dan teladan.</td>
                                            <td style="text-align:center" width="100"><?php echo $data['nk2_nilai_kompetensi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">10.</td>
                                            <td>Etos kerja, tanggung jawab yang tinggi, rasa bangga menjadi guru</td>
                                            <td style="text-align:center" width="100"><?php echo $data['nk3_nilai_kompetensi']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- page 37 end -->

                <!-- page 38 start -->
                <div class="row" style="margin-top: 150px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div style="min-height:1250px" class="panel-body">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>KOMPETENSI</th>
                                            <th>NILAI *)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td colspan="3"><b>Sosial</b></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">11.</td>
                                            <td>Bersikap Inklusif, bertindak obyektif, serta tidak diskriminatif.</td>
                                            <td style="text-align:center" width="100"><?php echo $data['ns1_nilai_kompetensi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">12.</td>
                                            <td>Komunikasi dengan sesama guru, tenaga kependidikan, orang tua, peserta didik, dan masyarakat</td>
                                            <td style="text-align:center" width="100"><?php echo $data['ns2_nilai_kompetensi']; ?></td>
                                        </tr>

                                        <tr>
                                            <td colspan="2"><b>Profesional</b></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">13.</td>
                                            <td>Penguasaan materi, struktur, konsep, dan pola pikir keilmuan yang mendukung mata pelajaran yang diampu.</td>
                                            <td style="text-align:center" width="100"><?php echo $data['npf1_nilai_kompetensi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center">14.</td>
                                            <td>Mengembangkan keprofesionalan melalui tindakn yang reflektif.</td>
                                            <td style="text-align:center" width="100"><?php echo $data['npf2_nilai_kompetensi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center" colspan="2"><b>Jumlah (Hasil penilaian kinerja guru)</b></td>
                                            <td style="text-align:center" width="100"><?php echo $data['jumlah_nilai']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div>
                                    <p style="font-size:13px">*) Nilai diisi berdasarkan laporan dan evaluasi PK Guru. Nilai minimum per kompetensi = 1 dan nilai maksimum = 4</p>
                                </div>
                                <br>
                                <div>
                                    <p style="margin-left:500px;font-size:14px"><?php echo $data_sekolah['kota']; ?>, <?php echo $tanggal_nilai; ?></p>
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
                                                <?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?> <br>
                                                <span style="border-top:1px solid #bcbcbc">NIY <?php echo $data['nipa']; ?></span> <br>
                                            </td>
                                            <td width="300">
                                                <?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?> <br>
                                                <span style="border-top:1px solid #bcbcbc">NIY <?php echo $data['nipb']; ?></span> <br>
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
                <!-- page 38 end -->

                <!-- page 39 start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <section>
                                    <br>
                                    <div>
                                        <p style="border:1px solid #bcbcbc;text-align:center;font-size:14px;margin-left:700px"><b>Lampiran ID</b></p>
                                    </div>
                                    <div>
                                        <p style="text-align:center;font-size:18px"><b>FORMAT PENGHITUNGAN ANGKA KREDIT PK GURU KELAS/MATA PELAJARAN</b></p>
                                    </div>
                                    <br>
                                    <table style="margin-left:15px" cellpadding="3">
                                        <tbody>
                                            <tr>
                                                <td width="30">a.</td>
                                                <td width="300">Nama</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">NIY</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['nipa']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Tempat, Tanggal Lahir</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['tempat_lahira']; ?>, <?php echo $tanggal_lahira; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Pangkat/Golongan/Jabatan</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['pangkat_golongana']; ?> / <?php echo $data['jabatan_fungsionala']; ?></td>
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
                                                <td width="500"><?php echo $data['masa_kerjaa']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Jenis Kelamin</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['jenis_kelamina']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Pendidikan terakhir/spesialisai</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['pendidikan_terakhira']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Program Keahlian yang diampu</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data['mata_pelajarana']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table style="margin-left:15px" cellpadding="3">
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
                                                <td width="500"><?php echo $data_sekolah['kelurahan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Kecamatan</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data_sekolah['kecamatan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Kabupaten/Kota</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data_sekolah['kota']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td width="300">Provinsi</td>
                                                <td width="5">:</td>
                                                <td width="500"><?php echo $data_sekolah['provinsi']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                                <br>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Nilai PK GURU Kelas/Mata Pelajaran</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Konversi nilai PK GURU ke dalam skala 0 - 100 sesuai Permenneg PAN & RB No. 16 Tahun 2009 dengan rumus <br><br>
                                                <span>Nilai PKG (100) =</span>
                                                <span>Nilai PKG </span> <span style="margin-left:60px">x 100</span><br>
                                                <span style="margin-left:106px;border-top:1px solid #47596f">Nilai PKG tertinggi</span>
                                            </td>
                                            <td style="text-align:center;vertical-align:middle" width="100"><?php echo $data['nilai_pkg']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Berdasarkan hasil konversi ke dalam skala nilai sesuai dengan peraturan tersebut, selanjutnya ditetapkan sebutan dan persentase angka kreditnya</td>
                                            <td style="text-align:center" width="100"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Perolehan angka kredit (untuk pembelajaran) yang dihitung berdasarkan rumus berikut ini.<br><br>
                                                <span>Angka Kredit satu tahun =</span>
                                                <span style="border-bottom:1px solid #47596f"> (AKK - AKP) X (JM/JWM) X NPK</span><br>
                                                <span style="margin-left:250px">4</span>
                                            </td>
                                            <td style="text-align:center;vertical-align:middle" width="100"><?php echo $data['angka_kredit']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div>
                                    <p style="margin-left:500px;font-size:14px"><?php echo $data_sekolah['kota']; ?>, <?php echo $tanggal_nilai; ?></p>
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
                                                <?php echo $data['nama_gurua']; ?>, <?php echo $data['gelara']; ?> <br>
                                                <span style="border-top:1px solid #bcbcbc">NIY <?php echo $data['nipa']; ?></span> <br>
                                            </td>
                                            <td width="300">
                                                <?php echo $data['nama_gurub']; ?>, <?php echo $data['gelarb']; ?> <br>
                                                <span style="border-top:1px solid #bcbcbc">NIY <?php echo $data['nipb']; ?></span> <br>
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
                <!-- page 39 end -->
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
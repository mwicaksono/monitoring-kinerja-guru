    <div class="row-fluid">
        <?php
        if ($_GET['code'] == 1) {
        ?>
            <div class="row">
                <div class="panel-body">
                    <div class="alert alert-success alert-block fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <h4>
                            <i class="icon-ok-sign"></i>
                            Sukses!
                        </h4>
                        <p>data hasil penilaian berhasil disimpan.</p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <?php
    switch ($_GET['act']) {
        default:
    ?>
            <div class="row">
                <div class="col-lg-12">

                    <?php if ($_SESSION['level'] == 'Admin') { ?>
                        <a title="guru" href="?module=hasil_nilai">
                            <button class='btn btn-primary'> Hasil Penilaian Guru / Pengajar</button>
                        </a>
                        <a title="siswa" href="?module=hasil_nilai_siswa">
                            <button class='btn btn-primary'> Hasil Penilaian Peserta Didik</button>
                        </a>
                        <a title="orang tua" href="?module=hasil_nilai_ortu">
                            <button class='btn btn-primary'> Hasil Penilaian Orang Tua</button>
                        </a>
                        <a title="sejawat" href="?module=hasil_nilai_sejawat">
                            <button class='btn btn-primary'> Hasil Penilaian Teman Sejawat</button>
                        </a>
                        <a title="lembaga" href="?module=hasil_nilai_internal">
                            <button class='btn btn-primary'> Hasil Penilaian Lembaga</button>
                        </a>
                    <?php } else { ?>
                        <div class="btn-group">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                Pedagogik
                                <span style="margin-left:7px" class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="?module=p1"><i class="icon-angle-right"></i> Karakteristik</a>
                                </li>
                                <li>
                                    <a href="?module=p2"><i class="icon-angle-right"></i> Teori Pembelajaran</a>
                                </li>
                                <li>
                                    <a href="?module=p3"><i class="icon-angle-right"></i> Pengembangan Kurikulum</a>
                                </li>
                                <li>
                                    <a href="?module=p4"><i class="icon-angle-right"></i> Kegiatan Pembelajaran</a>
                                </li>
                                <li>
                                    <a href="?module=p5"><i class="icon-angle-right"></i> Pengembangan Potensi</a>
                                </li>
                                <li>
                                    <a href="?module=p6"><i class="icon-angle-right"></i> Komunikasi</a>
                                </li>
                                <li>
                                    <a href="?module=p7"><i class="icon-angle-right"></i> Penilaian dan Evaluasi</a>
                                </li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                Kepribadian
                                <span style="margin-left:7px" class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="?module=k1"><i class="icon-angle-right"></i> Tindakan</a>
                                </li>
                                <li>
                                    <a href="?module=k2"><i class="icon-angle-right"></i> Pribadi</a>
                                </li>
                                <li>
                                    <a href="?module=k3"><i class="icon-angle-right"></i> Etos Kerja</a>
                                </li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                Sosial
                                <span style="margin-left:7px" class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="?module=s1"><i class="icon-angle-right"></i> Sikap dan Tindakan</a>
                                </li>
                                <li>
                                    <a href="?module=s2"><i class="icon-angle-right"></i> Komunikasi</a>
                                </li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                Profesional
                                <span style="margin-left:7px" class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="?module=pf1"><i class="icon-angle-right"></i> Penguasaan Materi</a>
                                </li>
                                <li>
                                    <a href="?module=pf2"><i class="icon-angle-right"></i> Mengembangkan Keprofesionalan</a>
                                </li>
                            </ul>
                        </div>
                        <?php if ($_SESSION['level'] == 'Kepala Sekolah' or $_SESSION['level'] == 'Guru') { ?>

                            <div class="btn-group">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                    Hasil Penilaian
                                    <span style="margin-left:7px" class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="?module=hasil_nilai"><i class="icon-angle-right"></i> Hasil Penilaian Guru / Pengajar</a>
                                    </li>
                                    <li>
                                        <a href="?module=hasil_nilai_siswa"><i class="icon-angle-right"></i> Hasil Penilaian Peserta Didik</a>
                                    </li>
                                    <li>
                                        <a href="?module=hasil_nilai_ortu"><i class="icon-angle-right"></i> Hasil Penilaian Orang Tua</a>
                                    </li>
                                    <li>
                                        <a href="?module=hasil_nilai_sejawat"><i class="icon-angle-right"></i> Hasil Penilaian Teman Sejawat</a>
                                    </li>
                                    <?php if ($_SESSION['level'] == 'Kepala Sekolah') { ?>
                                        <li>
                                            <a href="?module=hasil_nilai_internal"><i class="icon-angle-right"></i> Hasil Penilaian Lembaga</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>

                        <?php } else { ?>
                            <a title="Ubah" href="?module=hasil_nilai">
                                <button class='btn btn-primary'> Hasil Penilaian</button>
                            </a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header style="font-size:18px" class="panel-heading">
                            <i style="margin-right:7px" class="icon-list-alt"></i> Hasil Penilaian Guru / Pengajar
                        </header>
                        <div class="panel-body">
                            <?php
                            if ($_SESSION['level'] == 'Guru') { ?>
                                <div class="adv-table">
                                    <table class="display table table-striped table-bordered table-hover" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Periode</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Tanggal Penilaian</th>
                                                <th>Guru Dinilai</th>
                                                <th>Guru Penilai</th>
                                                <th>Jumlah Nilai</th>
                                                <th>Nilai PKG</th>
                                                <th>Angka Kredit</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $sql = $db->database_prepare("SELECT a.id_nilai,a.tanggal_nilai,a.periode_nilai,a.guru_dinilai,a.guru_penilai,a.jumlah_nilai,a.nilai_pkg,a.angka_kredit,
                                                          b.id_periode,b.periode,b.tahun_ajaran,
                                                          c.nip,c.nama_guru as nama_gurua,c.gelar as gelara,
                                                          d.nip,d.nama_guru as nama_gurub,d.gelar as gelarb,
                                                          e.id_pedagogik1,e.np1_nilai_kompetensi,
                                                          f.id_pedagogik2,f.np2_nilai_kompetensi,
                                                          g.id_pedagogik3,g.np3_nilai_kompetensi,
                                                          h.id_pedagogik4,h.np4_nilai_kompetensi,
                                                          i.id_pedagogik5,i.np5_nilai_kompetensi,
                                                          j.id_pedagogik6,j.np6_nilai_kompetensi,
                                                          k.id_pedagogik7,k.np7_nilai_kompetensi,
                                                          l.id_kepribadian1,l.nk1_nilai_kompetensi,
                                                          m.id_kepribadian2,m.nk2_nilai_kompetensi,
                                                          n.id_kepribadian3,n.nk3_nilai_kompetensi,
                                                          o.id_sosial1,o.ns1_nilai_kompetensi,
                                                          p.id_sosial2,p.ns2_nilai_kompetensi,
                                                          q.id_profesional1,q.npf1_nilai_kompetensi,
                                                          r.id_profesional2,r.npf2_nilai_kompetensi
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
                                                          WHERE a.guru_penilai='$_SESSION[nip]'
                                                          ORDER BY a.id_nilai DESC")->execute();
                                            while ($data = $db->database_fetch_array($sql)) {

                                                $tanggal        = $data['tanggal_nilai'];
                                                $potong_date    = substr($tanggal, 0, 10);
                                                $potong_time    = substr($tanggal, 10);

                                                $tgl            = explode('-', $potong_date);
                                                $date           = $tgl[2] . "-" . $tgl[1] . "-" . $tgl[0];

                                                $tanggal_nilai  = "$date $potong_time";

                                                $jumlah_nilai = $data['np1_nilai_kompetensi'] + $data['np2_nilai_kompetensi'] + $data['np3_nilai_kompetensi'] + $data['np4_nilai_kompetensi'] + $data['np5_nilai_kompetensi'] + $data['np6_nilai_kompetensi'] + $data['np7_nilai_kompetensi'] + $data['nk1_nilai_kompetensi'] + $data['nk2_nilai_kompetensi'] + $data['nk3_nilai_kompetensi'] + $data['ns1_nilai_kompetensi'] + $data['ns2_nilai_kompetensi'] + $data['npf1_nilai_kompetensi'] + $data['npf2_nilai_kompetensi'];


                                                $nilai_pkg = number_format(($jumlah_nilai / 56) * 100, 1);

                                                if ($nilai_pkg <= 50) {
                                                    $angka_kredit = 'Rendah';
                                                } elseif ($nilai_pkg > 50 && $nilai_pkg <= 60) {
                                                    $angka_kredit = 'Sedang';
                                                } elseif ($nilai_pkg > 60 && $nilai_pkg <= 75) {
                                                    $angka_kredit = 'Cukup';
                                                } elseif ($nilai_pkg > 75 && $nilai_pkg <= 90) {
                                                    $angka_kredit = 'Baik';
                                                } elseif ($nilai_pkg > 90 && $nilai_pkg <= 100) {
                                                    $angka_kredit = 'Amat Baik';
                                                }

                                                echo "
                                <tr class='gradeX'>
                                    <td width='50' class='center'>$no</td>
                                    <td width='80' class='center'>$data[periode]</td>
                                    <td width='120' class='center'>$data[tahun_ajaran]</td>
                                    <td width='150' class='center'>$tanggal_nilai</td>
                                    <td>$data[nama_gurua], $data[gelara] ($data[guru_dinilai])</td>
                                    <td>$data[nama_gurub], $data[gelarb] ($data[guru_penilai])</td>
                                    <td width='100' class='center'>$jumlah_nilai</td>
                                    <td width='100' class='center'>$nilai_pkg</td>
                                    <td width='110' class='center'>$angka_kredit</td>
                                    <td width='100' class='center'>";

                                                if ($data['angka_kredit'] == '') {
                                            ?>
                                                    <a title="Verifikasi" href="modules/hasil_nilai/aksi_hasil_nilai.php?mod=hasil_nilai&act=selesai&id=<?php echo $data['id_nilai']; ?>&jml=<?php echo $jumlah_nilai; ?>&n=<?php echo $nilai_pkg; ?>&ak=<?php echo $angka_kredit; ?>" onclick="return confirm('Pastikan semua data penilaian yang Anda inputkan sudah benar. Pilih OK untuk menyimpan data Anda.');">
                                                        <button class="btn btn-primary btn-xs"><i class="icon-check"></i> Verifikasi</button>
                                                    </a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a title="Cetak" href="modules/hasil_nilai/cetak.php?id=<?php echo $data['id_nilai']; ?>" target="_blank">
                                                        <button class="btn btn-primary btn-xs"><i class="icon-print"></i> Cetak</button>
                                                    </a>
                                            <?php
                                                }
                                                echo "</td>
                                </tr>";
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php
                            } else { ?>
                                <div class="adv-table">
                                    <table class="display table table-striped table-bordered table-hover" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Periode</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Tanggal Penilaian</th>
                                                <th>Guru Dinilai</th>
                                                <th>Guru Penilai</th>
                                                <th>Jumlah Nilai</th>
                                                <th>Nilai PKG</th>
                                                <th>Angka Kredit</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $sql = $db->database_prepare("SELECT a.id_nilai,a.tanggal_nilai,a.periode_nilai,a.guru_dinilai,a.guru_penilai,a.jumlah_nilai,a.nilai_pkg,a.angka_kredit,
                                                          b.id_periode,b.periode,b.tahun_ajaran,
                                                          c.nip,c.nama_guru as nama_gurua,c.gelar as gelara,
                                                          d.nip,d.nama_guru as nama_gurub,d.gelar as gelarb,
                                                          e.id_pedagogik1,e.np1_nilai_kompetensi,
                                                          f.id_pedagogik2,f.np2_nilai_kompetensi,
                                                          g.id_pedagogik3,g.np3_nilai_kompetensi,
                                                          h.id_pedagogik4,h.np4_nilai_kompetensi,
                                                          i.id_pedagogik5,i.np5_nilai_kompetensi,
                                                          j.id_pedagogik6,j.np6_nilai_kompetensi,
                                                          k.id_pedagogik7,k.np7_nilai_kompetensi,
                                                          l.id_kepribadian1,l.nk1_nilai_kompetensi,
                                                          m.id_kepribadian2,m.nk2_nilai_kompetensi,
                                                          n.id_kepribadian3,n.nk3_nilai_kompetensi,
                                                          o.id_sosial1,o.ns1_nilai_kompetensi,
                                                          p.id_sosial2,p.ns2_nilai_kompetensi,
                                                          q.id_profesional1,q.npf1_nilai_kompetensi,
                                                          r.id_profesional2,r.npf2_nilai_kompetensi
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
                                                          ORDER BY a.id_nilai DESC")->execute();
                                            while ($data = $db->database_fetch_array($sql)) {

                                                $tanggal        = $data['tanggal_nilai'];
                                                $potong_date    = substr($tanggal, 0, 10);
                                                $potong_time    = substr($tanggal, 10);

                                                $tgl            = explode('-', $potong_date);
                                                $date           = $tgl[2] . "-" . $tgl[1] . "-" . $tgl[0];

                                                $tanggal_nilai  = "$date $potong_time";

                                                $jumlah_nilai = $data['np1_nilai_kompetensi'] + $data['np2_nilai_kompetensi'] + $data['np3_nilai_kompetensi'] + $data['np4_nilai_kompetensi'] + $data['np5_nilai_kompetensi'] + $data['np6_nilai_kompetensi'] + $data['np7_nilai_kompetensi'] + $data['nk1_nilai_kompetensi'] + $data['nk2_nilai_kompetensi'] + $data['nk3_nilai_kompetensi'] + $data['ns1_nilai_kompetensi'] + $data['ns2_nilai_kompetensi'] + $data['npf1_nilai_kompetensi'] + $data['npf2_nilai_kompetensi'];


                                                $nilai_pkg = number_format(($jumlah_nilai / 56) * 100, 1);

                                                if ($nilai_pkg <= 50) {
                                                    $angka_kredit = 'Rendah';
                                                } elseif ($nilai_pkg > 50 && $nilai_pkg <= 60) {
                                                    $angka_kredit = 'Sedang';
                                                } elseif ($nilai_pkg > 60 && $nilai_pkg <= 75) {
                                                    $angka_kredit = 'Cukup';
                                                } elseif ($nilai_pkg > 75 && $nilai_pkg <= 90) {
                                                    $angka_kredit = 'Baik';
                                                } elseif ($nilai_pkg > 90 && $nilai_pkg <= 100) {
                                                    $angka_kredit = 'Amat Baik';
                                                }

                                                echo "
                                <tr class='gradeX'>
                                    <td width='50' class='center'>$no</td>
                                    <td width='80' class='center'>$data[periode]</td>
                                    <td width='120' class='center'>$data[tahun_ajaran]</td>
                                    <td width='150' class='center'>$tanggal_nilai</td>
                                    <td>$data[nama_gurua], $data[gelara] ($data[guru_dinilai])</td>
                                    <td>$data[nama_gurub], $data[gelarb] ($data[guru_penilai])</td>
                                    <td width='100' class='center'>$jumlah_nilai</td>
                                    <td width='100' class='center'>$nilai_pkg</td>
                                    <td width='110' class='center'>$angka_kredit</td>
                                    <td width='100' class='center'>";

                                                if ($data['angka_kredit'] == '') {
                                            ?>
                                                    <a title="Verifikasi" href="modules/hasil_nilai/aksi_hasil_nilai.php?mod=hasil_nilai&act=selesai&id=<?php echo $data['id_nilai']; ?>&jml=<?php echo $jumlah_nilai; ?>&n=<?php echo $nilai_pkg; ?>&ak=<?php echo $angka_kredit; ?>" onclick="return confirm('Pastikan semua data penilaian yang Anda inputkan sudah benar. Pilih OK untuk menyimpan data Anda.');">
                                                        <button class="btn btn-primary btn-xs"><i class="icon-check"></i> Verifikasi</button>
                                                    </a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a title="Cetak" href="modules/hasil_nilai/cetak.php?id=<?php echo $data['id_nilai']; ?>" target="_blank">
                                                        <button class="btn btn-primary btn-xs"><i class="icon-print"></i> Cetak</button>
                                                    </a>
                                            <?php
                                                }
                                                echo "</td>
                                </tr>";
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </section>
                </div>
            </div>

    <?php
            break;
    }
    ?>
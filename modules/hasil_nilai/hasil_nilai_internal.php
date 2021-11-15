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
            <?php if ($_SESSION['level'] == 'Kepala Sekolah' or $_SESSION['level'] == 'Guru') { ?>
                <div class="row">
                    <div class="col-lg-12">
                        <a title="penilaian guru" href="?module=pelayan">
                            <button class='btn btn-primary'> Pelayan Iman</button>
                        </a>
                        <a title="penilaian guru" href="?module=akademik">
                            <button class='btn btn-primary'> Pemimpin Akademik</button>
                        </a>
                        <a title="penilaian guru" href="?module=spiritual">
                            <button class='btn btn-primary'> Pemimpin Spiritual</button>
                        </a>
                        <a title="penilaian guru" href="?module=alkitab">
                            <button class='btn btn-primary'> Model Peran Alkitab</button>
                        </a>
                        <a title="penilaian guru" href="?module=mentor">
                            <button class='btn btn-primary'> Mentor</button>
                        </a>
                        <a title="penilaian guru" href="?module=karakter">
                            <button class='btn btn-primary'> Pendidik Karakter</button>
                        </a>
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
                    </div>
                </div>

            <?php } elseif ($_SESSION['level'] == 'Admin') { ?>
                <div class="row">
                    <div class="col-lg-12">
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
                    </div>
                </div>
            <?php } ?>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header style="font-size:18px" class="panel-heading">
                            <i style="margin-right:7px" class="icon-list-alt"></i> Hasil Penilaian Lembaga
                        </header>
                        <div class="panel-body">
                            <?php
                            if ($_SESSION['level'] == 'Kepala Sekolah') { ?>
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
                                                <th>Rerata Nilai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $sql = $db->database_prepare("SELECT a.id_nilai, a.tanggal_nilai, a.periode_nilai, a.guru_dinilai, a.guru_penilai, a.jumlah_nilai,
                                            b.id_periode, b.periode, b.tahun_ajaran,
                                            c.nip, c.nama_guru as nama_gurua, c.gelar as gelara,
                                            d.nip, d.nama_guru as nama_gurub, d.gelar as gelarb,
                                            e.ny_total_skor,
                                            f.na_total_skor,
                                            g.nr_total_skor,
                                            h.nk_total_skor,
                                            i.nm_total_skor,
                                            j.nt_total_skor
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
                                            WHERE a.guru_penilai='$_SESSION[nip]'
                                            ORDER BY a.id_nilai DESC")->execute();
                                            while ($data = $db->database_fetch_array($sql)) {

                                                $tanggal        = $data['tanggal_nilai'];
                                                $potong_date    = substr($tanggal, 0, 10);
                                                $potong_time    = substr($tanggal, 10);

                                                $tgl            = explode('-', $potong_date);
                                                $date           = $tgl[2] . "-" . $tgl[1] . "-" . $tgl[0];

                                                $tanggal_nilai  = "$date $potong_time";
                                                $totalskor = ceil(($data['ny_total_skor'] + $data['na_total_skor'] + $data['nr_total_skor'] + $data['nk_total_skor'] + $data['nm_total_skor'] + $data['nt_total_skor']) / 6);

                                                echo "
                                <tr class='gradeX'>
                                    <td width='50' class='center'>$no</td>
                                    <td width='80' class='center'>$data[periode]</td>
                                    <td width='120' class='center'>$data[tahun_ajaran]</td>
                                    <td width='150' class='center'>$tanggal_nilai</td>
                                    <td>$data[nama_gurua], $data[gelara] ($data[guru_dinilai])</td>
                                    <td>$data[nama_gurub], $data[gelarb] ($data[guru_penilai])</td>
                                    <td width='100' class='center'>$totalskor</td>
                                    <td width='100' class='center'>";
                                                if ($data['na_total_skor'] <= 1 or $data['ny_total_skor'] <= 1 or $data['nr_total_skor'] <= 1 or $data['nk_total_skor'] <= 1 or $data['nm_total_skor'] <= 1 or $data['nt_total_skor'] <= 1) {
                                                    echo "<a title='Cetak' href='#' disabled>
                                    <button class='btn btn-danger btn-xs'><i class='icon-exclamation'></i> Belum dinilai</button>
                                    </a>
                                    </td>
                                </tr>";
                                                } else {
                                                    echo "<a title='Cetak' href='modules/hasil_nilai/cetak_internal.php?id=$data[id_nilai]' target='_blank'>
                                                    <button class='btn btn-primary btn-xs'><i class='icon-print'></i> Cetak</button>
                                                </a>
                                                </td>
                                </tr>";
                                                }
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } elseif ($_SESSION['level'] == 'Admin') { ?>
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
                                                <th>Rerata Nilai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $sql = $db->database_prepare("SELECT a.id_nilai, a.tanggal_nilai, a.periode_nilai, a.guru_dinilai, a.guru_penilai, a.jumlah_nilai,
                                            b.id_periode, b.periode, b.tahun_ajaran,
                                            c.nip, c.nama_guru as nama_gurua, c.gelar as gelara,
                                            d.nip, d.nama_guru as nama_gurub, d.gelar as gelarb,
                                            e.ny_total_skor,
                                            f.na_total_skor,
                                            g.nr_total_skor,
                                            h.nk_total_skor,
                                            i.nm_total_skor,
                                            j.nt_total_skor
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
                                            ORDER BY a.id_nilai DESC")->execute();
                                            while ($data = $db->database_fetch_array($sql)) {

                                                $tanggal        = $data['tanggal_nilai'];
                                                $potong_date    = substr($tanggal, 0, 10);
                                                $potong_time    = substr($tanggal, 10);

                                                $tgl            = explode('-', $potong_date);
                                                $date           = $tgl[2] . "-" . $tgl[1] . "-" . $tgl[0];

                                                $tanggal_nilai  = "$date $potong_time";
                                                $totalskor = ceil(($data['ny_total_skor'] + $data['na_total_skor'] + $data['nr_total_skor'] + $data['nk_total_skor'] + $data['nm_total_skor'] + $data['nt_total_skor']) / 6);

                                                echo "
                                <tr class='gradeX'>
                                    <td width='50' class='center'>$no</td>
                                    <td width='80' class='center'>$data[periode]</td>
                                    <td width='120' class='center'>$data[tahun_ajaran]</td>
                                    <td width='150' class='center'>$tanggal_nilai</td>
                                    <td>$data[nama_gurua], $data[gelara] ($data[guru_dinilai])</td>
                                    <td>$data[nama_gurub], $data[gelarb] ($data[guru_penilai])</td>
                                    <td width='100' class='center'>$totalskor</td>
                                    <td width='100' class='center'>";
                                                if ($data['na_total_skor'] <= 1 or $data['ny_total_skor'] <= 1 or $data['nr_total_skor'] <= 1 or $data['nk_total_skor'] <= 1 or $data['nm_total_skor'] <= 1 or $data['nt_total_skor'] <= 1) {
                                                    echo "<a title='Cetak' href='#' disabled>
                                    <button class='btn btn-danger btn-xs'><i class='icon-exclamation'></i> Belum dinilai</button>
                                    </a>
                                    </td>
                                </tr>";
                                                } else {
                                                    echo "<a title='Cetak' href='modules/hasil_nilai/cetak_internal.php?id=$data[id_nilai]' target='_blank'>
                                                    <button class='btn btn-primary btn-xs'><i class='icon-print'></i> Cetak</button>
                                                </a>
                                                </td>
                                </tr>";
                                                }
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
                        </div>
                    </section>
                </div>
            </div>

    <?php
            break;
    }
    ?>
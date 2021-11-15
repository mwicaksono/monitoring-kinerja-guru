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

            <?php if ($_SESSION['level'] == 'Siswa') { ?>
                <div class="row">
                    <div class="col-lg-6">
                        <a title="penilaian guru" href="?module=siswa">
                            <button class='btn btn-primary'> Penilaian Guru</button>
                        </a>
                        <a title="Ubah" href="?module=hasil_nilai_siswa">
                            <button class='btn btn-primary'> Hasil Penilaian</button>
                        </a>
                    </div>
                </div>
            <?php } elseif ($_SESSION['level'] == 'Admin' or $_SESSION['level'] == 'Kepala Sekolah' or $_SESSION['level'] == 'Guru') { ?>
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
                        <?php if ($_SESSION['level'] == 'Admin' or $_SESSION['level'] == 'Kepala Sekolah') { ?>
                            <a title="lembaga" href="?module=hasil_nilai_internal">
                                <button class='btn btn-primary'> Hasil Penilaian Lembaga</button>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>



            <br>

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header style="font-size:18px" class="panel-heading">
                            <i style="margin-right:7px" class="icon-list-alt"></i> Hasil Penilaian Oleh Peserta Didik
                        </header>
                        <div class="panel-body">
                            <?php
                            if ($_SESSION['level'] == 'Siswa') { ?>
                                <div class="adv-table">
                                    <table class="display table table-striped table-bordered table-hover" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Periode</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Tanggal Penilaian</th>
                                                <th>Guru Dinilai</th>
                                                <th>Jumlah Nilai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $sql = $db->database_prepare("SELECT
                                            a.id_nilai, a.tanggal_nilai, a.periode_nilai, a.guru_dinilai, a.siswa_penilai,
                                                          b.id_periode,b.periode,b.tahun_ajaran,
                                                          c.nip,c.nama_guru as nama_gurua,c.gelar as gelara,
                                                          d.nama, d.id_user,
                                                          e.ns_total_skor
                                                          FROM tbl_penilaian_siswa AS a
                                                          JOIN tbl_periode AS b
                                                          JOIN tbl_guru AS c
                                                          JOIN tbl_user AS d
                                                          JOIN siswa AS e
                                                          ON a.periode_nilai=b.id_periode 
                                                          AND a.guru_dinilai=c.nip
                                                          AND a.siswa_penilai=d.id_user
                                                          AND a.id_nilai=e.id_penilaian_siswa
                                                          WHERE a.siswa_penilai='$_SESSION[id_user]'
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
                                    <td width='100' class='center'>$data[ns_total_skor]</td>
                                    <td width='100' class='center'>";
                                                if ($data['ns_total_skor'] <= 1) {
                                                    echo "<a title='Cetak' href='#' disabled>
                                    <button class='btn btn-danger btn-xs'><i class='icon-exclamation'></i> Belum dinilai</button>
                                    </a>
                                    </td>
                                </tr>";
                                                } else {
                                                    echo "<a title='Cetak' href='modules/hasil_nilai/cetak_siswa.php?id=$data[id_nilai]' target='_blank'>
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
                            <?php
                            } elseif ($_SESSION['level'] == 'Admin' or $_SESSION['level'] == 'Kepala Sekolah') { ?>
                                <div class="adv-table">
                                    <table class="display table table-striped table-bordered table-hover" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Periode</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Tanggal Penilaian</th>
                                                <th>Guru Dinilai</th>
                                                <th>Siswa Penilai</th>
                                                <th>Jumlah Nilai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $sql = $db->database_prepare("SELECT
                                            a.id_nilai, a.tanggal_nilai, a.periode_nilai, a.guru_dinilai, a.siswa_penilai,
                                                          b.id_periode,b.periode,b.tahun_ajaran,
                                                          c.nip,c.nama_guru as nama_gurua,c.gelar as gelara,
                                                          d.nama, d.id_user,
                                                          e.ns_total_skor
                                                          FROM tbl_penilaian_siswa AS a
                                                          JOIN tbl_periode AS b
                                                          JOIN tbl_guru AS c
                                                          JOIN tbl_user AS d
                                                          JOIN siswa AS e
                                                          ON a.periode_nilai=b.id_periode 
                                                          AND a.guru_dinilai=c.nip
                                                          AND a.siswa_penilai=d.id_user
                                                          AND a.id_nilai=e.id_penilaian_siswa
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
                                    <td>$data[nama]</td>
                                    <td width='100' class='center'>$data[ns_total_skor]</td>
                                    <td width='100' class='center'>";
                                                if ($data['ns_total_skor'] <= 1) {
                                                    echo "<a title='Cetak' href='#' disabled>
                                    <button class='btn btn-danger btn-xs'><i class='icon-exclamation'></i> Belum dinilai</button>
                                    </a>
                                    </td>
                                </tr>";
                                                } else {
                                                    echo "<a title='Cetak' href='modules/hasil_nilai/cetak_siswa.php?id=$data[id_nilai]' target='_blank'>
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
                            <?php } elseif (($_SESSION['level'] == 'Guru')) {  ?>
                                <div class="adv-table">
                                    <table class="display table table-striped table-bordered table-hover" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Periode</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Tanggal Penilaian</th>
                                                <th>Guru Dinilai</th>
                                                <th>Siswa Penilai</th>
                                                <th>Jumlah Nilai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $sql = $db->database_prepare("SELECT
                                            a.id_nilai, a.tanggal_nilai, a.periode_nilai, a.guru_dinilai, a.siswa_penilai,
                                                          b.id_periode,b.periode,b.tahun_ajaran,
                                                          c.nip,c.nama_guru as nama_gurua,c.gelar as gelara,
                                                          d.nama, d.id_user,
                                                          e.ns_total_skor
                                                          FROM tbl_penilaian_siswa AS a
                                                          JOIN tbl_periode AS b
                                                          JOIN tbl_guru AS c
                                                          JOIN tbl_user AS d
                                                          JOIN siswa AS e
                                                          ON a.periode_nilai=b.id_periode 
                                                          AND a.guru_dinilai=c.nip
                                                          AND a.siswa_penilai=d.id_user
                                                          AND a.id_nilai=e.id_penilaian_siswa
                                                          WHERE a.guru_dinilai='$_SESSION[nip]'
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
                                    <td>$data[nama]</td>
                                    <td width='100' class='center'>$data[ns_total_skor]</td>
                                    <td width='100' class='center'>";
                                                if ($data['ns_total_skor'] <= 1) {
                                                    echo "<a title='Cetak' href='#' disabled>
                                    <button class='btn btn-danger btn-xs'><i class='icon-exclamation'></i> Belum dinilai</button>
                                    </a>
                                    </td>
                                </tr>";
                                                } else {
                                                    echo "<a title='Cetak' href='modules/hasil_nilai/cetak_siswa.php?id=$data[id_nilai]' target='_blank'>
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
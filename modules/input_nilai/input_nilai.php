<?php

$sql_periode = $db->database_prepare("SELECT * FROM tbl_periode WHERE status='on'")->execute();

$num = $db->database_num_rows($sql_periode);

if ($num <> 0) {

    while ($data_periode = $db->database_fetch_array($sql_periode)) {

        $tgl_awal       = $data_periode['tanggal_awal'];
        $tgla           = explode('-', $tgl_awal);
        $tanggal_awal   = $tgla[2] . "-" . $tgla[1] . "-" . $tgla[0];

        $tgl_akhir       = $data_periode['tanggal_akhir'];
        $tglb            = explode('-', $tgl_akhir);
        $tanggal_akhir   = $tglb[2] . "-" . $tglb[1] . "-" . $tglb[0];

?>
        <div class="row">
            <div class="col-lg-12">

                <?php if ($_SESSION['level'] == 'Admin') { ?>
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
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <div class="panel-body">
                        <div class="panel-body">
                            <div class="alert alert-info alert-block fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="icon-remove"></i>
                                </button>
                                <p style="font-size:15px"><i class="icon-info-sign"></i> Periode penilaian aktif dari tanggal <?php echo $tanggal_awal; ?> s.d. tanggal <?php echo $tanggal_akhir; ?>.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    <?php
    }
} else { ?>

    <div class="row">
        <div class="panel-body">
            <div class="alert alert-danger alert-block fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <p style="font-size:15px"><i class="icon-warning-sign"></i> Periode penilaian tidak aktif.</p>
            </div>
        </div>
    </div>

<?php
}
?>
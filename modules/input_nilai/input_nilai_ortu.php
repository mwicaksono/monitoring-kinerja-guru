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
            <div class="col-lg-6">
                <a title="penilaian guru" href="?module=ortu">
                    <button class='btn btn-primary'> Penilaian Guru</button>
                </a>
                <!-- <a title="Ubah" href="?module=hasil_nilai_ortu">
                    <button class='btn btn-primary'> Hasil Penilaian</button>
                </a> -->
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
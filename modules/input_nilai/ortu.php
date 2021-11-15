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
                    <p>data penilaian berhasil disimpan.</p>
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
                    <header style="font-size:18px" class="panel-heading">
                        <i style="margin-right:7px" class="icon-edit"></i> Penilaian Oleh Orang Tua
                        <p style="margin-top:10px;">Penilai : <b><?= $_SESSION['nama'] ?></b></p>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table class="display table table-striped table-bordered table-hover" id="example">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center">No</th>
                                        <th rowspan="2" class="text-center">Periode</th>
                                        <th rowspan="2">Guru Dinilai</th>
                                        <th rowspan="2" class="text-center">Total Skor</th>
                                        <th rowspan="2" class="text-center">Persentase</th>
                                        <th rowspan="2" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = $db->database_prepare("SELECT a.id_nilai, a.periode_nilai, a.guru_dinilai, a.ortu_penilai,
										b.id_periode, b.periode,
										c.nip, c.nama_guru, c.gelar,
										d.id_user, d.nama,
										e.no_total_skor, e.no_persentase
										FROM tbl_penilaian_ortu AS a
										JOIN tbl_periode AS b
										JOIN tbl_guru AS c
										JOIN tbl_user AS d
										JOIN ortu AS e
										ON a.periode_nilai=b.id_periode 
										AND a.guru_dinilai=c.nip
										AND a.ortu_penilai=d.id_user
										AND a.id_nilai=e.id_penilaian_ortu
										WHERE d.id_user='$_SESSION[id_user]'
										ORDER BY a.id_nilai DESC")->execute();
                                    while ($data = $db->database_fetch_array($sql)) {
                                        echo "
                                <tr class='gradeX'>
                                    <td width='50' class='center'>$no</td>
                                    <td width='80' class='center'>$data[periode]</td>
                                    <td width='300'>$data[nama_guru], $data[gelar] ($data[guru_dinilai])</td>
                                    <td width='100' class='center'>$data[no_total_skor]</td>
                                    <td width='100' class='center'>$data[no_persentase] %</td>";
                                        if ($data['no_total_skor'] == '0') {
                                            echo "
									<td width='100' class='center'>
									<a title='Penilaian' href='?module=ortu&act=nilai&id=$data[id_nilai]'>
                                            <button class='btn btn-primary btn-xs'><i class='icon-edit'></i> Nilai</button>
                                        </a> 
									</td>";
                                        } elseif ($data['no_total_skor'] != '0') {
                                            echo "
						<td width='100' class='center'><i class='icon-check'></i></td>
						";
                                        }

                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </section>
            </div>
        </div>

    <?php

        break;

    case "nilai":
        $data = $db->database_fetch_array($db->database_prepare("SELECT a.id_nilai, a.periode_nilai, a.guru_dinilai, a.ortu_penilai,
                                                            b.id_periode, b.periode,
                                                            c.nip, c.nama_guru, c.gelar,
															d.nama, d.id_user
                                                            FROM tbl_penilaian_ortu AS a
                                                            JOIN tbl_periode AS b
                                                            JOIN tbl_guru AS c
															JOIN tbl_user AS d
                                                            ON a.periode_nilai=b.id_periode 
                                                            AND a.guru_dinilai=c.nip
                                                            AND a.ortu_penilai=d.id_user
                                                            WHERE a.id_nilai=?")->execute($_GET["id"]));
    ?>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <div class="panel-body">
                        <form class="form-horizontal">

                            <input type="hidden" name="id_periode" value="<?php echo $data['id_periode']; ?>">

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Periode</label>
                                <div class="col-sm-2">
                                    <input type="text" name="periode" class="form-control" autocomplete="off" required="true" readonly="" value="<?php echo $data['periode']; ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Guru Dinilai</label>
                                <div class="col-sm-4">
                                    <input type="text" name="guru_dinilai" class="form-control" autocomplete="off" required="true" readonly="" value="<?php echo $data['nama_guru']; ?>, <?php echo $data['gelar']; ?> (<?php echo $data['nip']; ?>)" />
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Penilaian Guru oleh Orang Tua
                    </header>
                    <div class="panel-body">
                        <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_ortu.php?mod=ortu&act=nilai" method="POST" name="frmK1">

                            <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">
                            <div class="alert alert-info alert-block fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="icon-remove"></i>
                                </button>
                                <p style="font-size:15px">Komunikasi</p>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-10 col-sm-10 control-label">1. Guru menyampaikan perkembangan anak saya di sekolah</label>
                                <div class="col-sm-2">
                                    <select type="text" name="no1" class="form-control" required>
                                        <option value=""></option>
                                        <option value=0>tidak pernah</option>
                                        <option value=1>kadang-kadang</option>
                                        <option value=2>agak sering</option>
                                        <option value=4>sering</option>
                                        <option value=5>selalu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-10 col-sm-10 control-label">2. Guru memberikan kesempatan saya untuk berkomunikasi berkaitan dengan kesulitan belajar anak saya</label>
                                <div class="col-sm-2">
                                    <select type="text" name="no2" class="form-control" required>
                                        <option value=""></option>
                                        <option value=0>tidak pernah</option>
                                        <option value=1>kadang-kadang</option>
                                        <option value=2>agak sering</option>
                                        <option value=4>sering</option>
                                        <option value=5>selalu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-10 col-sm-10 control-label">3. Guru bekerja sama dengan orang tua untuk menyelesaikan kesulitan belajar anak saya</label>
                                <div class="col-sm-2">
                                    <select type="text" name="no3" class="form-control" required>
                                        <option value=""></option>
                                        <option value=0>tidak pernah</option>
                                        <option value=1>kadang-kadang</option>
                                        <option value=2>agak sering</option>
                                        <option value=4>sering</option>
                                        <option value=5>selalu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="alert alert-info alert-block fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="icon-remove"></i>
                                </button>
                                <p style="font-size:15px">Kepercayaan dalam memberikan pendidikan kepada peserta didik</p>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-10 col-sm-10 control-label">1. Guru berperan sebagai orang tua bagi anak saya di sekolah</label>
                                <div class="col-sm-2">
                                    <select type="text" name="no4" class="form-control" required>
                                        <option value=""></option>
                                        <option value=0>tidak pernah</option>
                                        <option value=1>kadang-kadang</option>
                                        <option value=2>agak sering</option>
                                        <option value=4>sering</option>
                                        <option value=5>selalu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-10 col-sm-10 control-label">2. Guru mengubah perilaku dan karakter anak saya menjadi lebih baik</label>
                                <div class="col-sm-2">
                                    <select type="text" name="no5" class="form-control" required>
                                        <option value=""></option>
                                        <option value=0>tidak pernah</option>
                                        <option value=1>kadang-kadang</option>
                                        <option value=2>agak sering</option>
                                        <option value=4>sering</option>
                                        <option value=5>selalu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-10 col-sm-10 control-label">3. Guru memberikan bimbingan dalam pembelajaran kepada anak saya yang dapat dimanfaatkan dalam kehidupan sehari-hari</label>
                                <div class="col-sm-2">
                                    <select type="text" name="no6" class="form-control" required>
                                        <option value=""></option>
                                        <option value=0>tidak pernah</option>
                                        <option value=1>kadang-kadang</option>
                                        <option value=2>agak sering</option>
                                        <option value=4>sering</option>
                                        <option value=5>selalu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-10 col-sm-10 control-label">4. Guru disenangi oleh anak saya dan teman-temannya</label>
                                <div class="col-sm-2">
                                    <select type="text" name="no7" class="form-control" required>
                                        <option value=""></option>
                                        <option value=0>tidak pernah</option>
                                        <option value=1>kadang-kadang</option>
                                        <option value=2>agak sering</option>
                                        <option value=4>sering</option>
                                        <option value=5>selalu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-10 col-sm-10 control-label">5. Guru mengembalikan hasil belajar (PR, Tugas, Ulangan) anak saya dilengkapi dengan catatan</label>
                                <div class="col-sm-2">
                                    <select type="text" name="no8" class="form-control" required>
                                        <option value=""></option>
                                        <option value=0>tidak pernah</option>
                                        <option value=1>kadang-kadang</option>
                                        <option value=2>agak sering</option>
                                        <option value=4>sering</option>
                                        <option value=5>selalu</option>
                                    </select>
                                </div>
                            </div>

                            <hr />
                            <div class="form-group">
                                <div class="col-sm-2 pull-right">
                                    <button type="submit" class="btn btn-primary"> Simpan</button>
                                    <a style="margin-left:10px;width:80px" href="?module=ortu" class="btn btn-white"> Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>

    <?php
        break;

    case "edit":
        echo 'dalam tahap pengembangan';
    ?>
<?php
        break;
}
?>
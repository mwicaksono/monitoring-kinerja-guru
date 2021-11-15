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
                <a title="penilaian guru" href="?module=sejawat">
                    <button class='btn btn-primary'> Penilaian Guru</button>
                </a>
                <!-- <a title="Ubah" href="?module=hasil_nilai_sejawat">
                    <button class='btn btn-primary'> Hasil Penilaian</button>
                </a> -->
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header style="font-size:18px" class="panel-heading">
                        <i style="margin-right:7px" class="icon-edit"></i> Penilaian Oleh Teman Sejawat
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
                                    $sql = $db->database_prepare("SELECT a.id_nilai, a.periode_nilai, a.guru_dinilai, a.sejawat_penilai,
										b.id_periode, b.periode,
										c.nip, c.nama_guru, c.gelar,
										d.id_user, d.nama,
										e.nj_total_skor, e.nj_persentase
										FROM tbl_penilaian_sejawat AS a
										JOIN tbl_periode AS b
										JOIN tbl_guru AS c
										JOIN tbl_user AS d
										JOIN sejawat AS e
										ON a.periode_nilai=b.id_periode 
										AND a.guru_dinilai=c.nip
										AND a.sejawat_penilai=d.id_user
										AND a.id_nilai=e.id_penilaian_sejawat
										WHERE d.id_user='$_SESSION[id_user]'
										ORDER BY a.id_nilai DESC")->execute();
                                    while ($data = $db->database_fetch_array($sql)) {
                                        echo "
                                <tr class='gradeX'>
                                    <td width='50' class='center'>$no</td>
                                    <td width='80' class='center'>$data[periode]</td>
                                    <td width='300'>$data[nama_guru], $data[gelar] ($data[guru_dinilai])</td>
                                    <td width='100' class='center'>$data[nj_total_skor]</td>
                                    <td width='100' class='center'>$data[nj_persentase] %</td>";
                                        if ($data['nj_total_skor'] == '0') {
                                            echo "
									<td width='100' class='center'>
									<a title='Penilaian' href='?module=sejawat&act=nilai&id=$data[id_nilai]'>
                                            <button class='btn btn-primary btn-xs'><i class='icon-edit'></i> Nilai</button>
                                        </a> 
									</td>";
                                        } elseif ($data['nj_total_skor'] != '0') {
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
        $data = $db->database_fetch_array($db->database_prepare("SELECT a.id_nilai, a.periode_nilai, a.guru_dinilai, a.sejawat_penilai,
                                                            b.id_periode, b.periode,
                                                            c.nip, c.nama_guru, c.gelar,
															d.nama, d.id_user
                                                            FROM tbl_penilaian_sejawat AS a
                                                            JOIN tbl_periode AS b
                                                            JOIN tbl_guru AS c
															JOIN tbl_user AS d
                                                            ON a.periode_nilai=b.id_periode 
                                                            AND a.guru_dinilai=c.nip
                                                            AND a.sejawat_penilai=d.id_user
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
                        Penilaian Guru oleh Teman Sejawat
                    </header>
                    <div class="panel-body">
                        <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_sejawat.php?mod=sejawat&act=nilai" method="POST" name="frmK1">

                            <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">
                            <div class="alert alert-info alert-block fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="icon-remove"></i>
                                </button>
                                <p style="font-size:15px">Perilaku Guru Sehari-hari</p>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-10 col-sm-10 control-label">1. Guru datang ke sekolah tepat waktu</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj1" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">2. Guru bersedia memimpin doa guru dan karyawan sebelum memulai kegiatan di sekolah</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj2" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">3. Guru bersedia memimpin renungan guru dan karyawan pada akhir kegiatan di sekolah</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj3" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">4. Guru mengikuti doa dan renungan guru dan karyawan</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj4" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">5. Guru menaati peraturan di sekolah</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj5" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">6. Guru bekerja sesuai dengan jadwal yang ditetapkan</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj6" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">7. Guru berpakain rapi dan atau sopan</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj7" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">8. Guru berperilaku baik terhadap saya dan teman sekerja yang lain</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj8" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">9. Guru bersedia menerima kritik dan saran dari saya atau teman guru</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj9" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">10. Guru menjadi teladan bagi saya dan teman-teman yang lain</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj10" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">11. Guru pandai mengendalikan diri</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj11" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">12. Guru ikut aktif menjaga lingkungan dari hal yang berbahaya (rokok, narkoba, dll)</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj12" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">13. Guru ikut berpartisipasi aktif dalam kegiatan ekstrakurikuler</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj13" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">14. Guru berpartisipasi aktif dan ikut berperan dalam peningkatan prestasi sekolah</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj14" class="form-control" required>
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
                                <p style="font-size:15px">Hubungan Guru dengan Teman Sejawat</p>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-10 col-sm-10 control-label">1. Guru menunjukkan sikap mengasihi kepada teman sejawat</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj15" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">2. Guru menunjukkan sikap peduli kepada saya maupun teman yang lain</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj16" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">3. Guru menunjukkan sifat yang ramah terhadap saya dan rekan sekerja</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj17" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">4. Guru berbahasa santun baik kepada saya maupun kepada teman yang lain</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj18" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">5. Guru memotivasi diri dan rekan sejawat secara aktif dan kreatif dalam melakasanakan proses pembelajaran</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj19" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">6. Guru memberi motivasi kepada saya dan teman yang lain</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj20" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">7. Guru pandai berkomunikasi secara lisan atau tertulis</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj21" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">8. Guru mencptakan suasana kekeluargaan di dalam maupun di luar sekolah</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj22" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">9. Guru mudah bekerjasama dengan saya maupun dengan teman yang lain</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj23" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">10. Guru bersedia diajak berdiskusi tenatng hal yang berkaitan dengan peserta didik dan sekolah</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj24" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">11. Guru bersedia membantu masalah saya atau teman lainnya</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj25" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">12. Guru menghargai kemampuan saya dan teman lainnya</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj26" class="form-control" required>
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
                                <p style="font-size:15px">Perilaku Profesional Guru </p>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-10 col-sm-10 control-label">1. Guru kreatif dan peduli kepada peserta didik</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj27" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">2. Guru mempunyai kemampuan Teknologi Informatika yang memadai</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj28" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">3. Guru memiliki perangkat pembelajaran yang lengkap</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj29" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">4. Guru memulai pembelajaran tepat waktu</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj30" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">5. Guru memberikan tugas kepada peserta didik apabila berhalangan hadir untuk mengajar</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj31" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">6. Guru memberikan informasikepada saya atau guru lain jika berhalangan hadir untuk mengajar</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj32" class="form-control" required>
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
                                <label class="col-sm-10 col-sm-10 control-label">7. Guru memperlakukan peserta didik dengan penuh kasih dan sayang</label>
                                <div class="col-sm-2">
                                    <select type="text" name="nj33" class="form-control" required>
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
                                    <a style="margin-left:10px;width:80px" href="?module=sejawat" class="btn btn-white"> Batal</a>
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
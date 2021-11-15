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
	            <div class="col-lg-12">
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

	                <a title="Ubah" href="?module=hasil_nilai">
	                    <button class='btn btn-primary'> Hasil Penilaian</button>
	                </a>
	                <?php if ($_SESSION['level'] == 'Admin') { ?>
	                    <a title="Ubah" href="?module=hasil_nilai_siswa">
	                        <button class='btn btn-primary'> Hasil Penilaian Siswa</button>
	                    </a>
	                    <a title="Ubah" href="?module=hasil_nilai_ortu">
	                        <button class='btn btn-primary'> Hasil Penilaian Orang Tua</button>
	                    </a>
	                    <a title="Ubah" href="?module=hasil_nilai_sejawat">
	                        <button class='btn btn-primary'> Hasil Penilaian Teman Sejawat</button>
	                    </a>
	                <?php } ?>
	            </div>
	        </div>
	        <br>
	        <div class="row">
	            <div class="col-lg-12">
	                <section class="panel">
	                    <header style="font-size:18px" class="panel-heading">
	                        <i style="margin-right:7px" class="icon-edit"></i> Sosial
	                    </header>
	                    <div class="panel-body">
	                        <div class="alert alert-info alert-block fade in">
	                            <button data-dismiss="alert" class="close close-sm" type="button">
	                                <i class="icon-remove"></i>
	                            </button>
	                            <p style="font-size:15px">Kompetensi 11 : Bersikap inklusif, bertindak obyektif, serta tidak diskriminatif</p>
	                        </div>
	                        <div class="adv-table">
	                            <table class="display table table-striped table-bordered table-hover" id="example">
	                                <thead>
	                                    <tr>
	                                        <th rowspan="2">No</th>
	                                        <th rowspan="2">Periode</th>
	                                        <th rowspan="2">Guru Dinilai</th>
	                                        <th colspan="3">Indikator Penilaian</th>
	                                        <th rowspan="2">Total Skor</th>
	                                        <th rowspan="2">Persentase</th>
	                                        <th rowspan="2">Nilai Kompetensi</th>
	                                        <th rowspan="2"></th>
	                                    </tr>
	                                    <tr>
	                                        <th> 1</th>
	                                        <th> 2</th>
	                                        <th> 3</th>

	                                    </tr>
	                                </thead>
	                                <tbody>
	                                    <?php
                                        $no = 1;
                                        $sql = $db->database_prepare("SELECT a.id_nilai,a.periode_nilai,a.guru_dinilai,a.guru_penilai,a.angka_kredit,
                                                          b.id_periode,b.periode,
                                                          c.nip,c.nama_guru,c.gelar,
                                                          d.id_sosial1,d.ns1_indikator1,d.ns1_indikator2,d.ns1_indikator3,d.ns1_total_skor,d.ns1_persentase,d.ns1_nilai_kompetensi
                                                          FROM tbl_penilaian AS a
                                                          JOIN tbl_periode AS b
                                                          JOIN tbl_guru AS c
                                                          JOIN sosial1 AS d
                                                          ON a.periode_nilai=b.id_periode 
                                                          AND a.guru_dinilai=c.nip
                                                          AND a.id_nilai=d.id_sosial1
                                                          WHERE a.guru_penilai='$_SESSION[nip]'
                                                          ORDER BY a.id_nilai DESC")->execute();
                                        while ($data = $db->database_fetch_array($sql)) {
                                            echo "
                                <tr class='gradeX'>
                                    <td width='50' class='center'>$no</td>
                                    <td width='80' class='center'>$data[periode]</td>
                                    <td width='300'>$data[nama_guru], $data[gelar] ($data[guru_dinilai])</td>
                                    <td width='80' class='center'>$data[ns1_indikator1]</td>
                                    <td width='80' class='center'>$data[ns1_indikator2]</td>
                                    <td width='80' class='center'>$data[ns1_indikator3]</td>
                                    <td class='center'>$data[ns1_total_skor]</td>
                                    <td class='center'>$data[ns1_persentase] %</td>
                                    <td class='center'>$data[ns1_nilai_kompetensi]</td>";

                                            if ($data['ns1_nilai_kompetensi'] == '0' && $data['angka_kredit'] == '') {
                                                echo "
                                    <td width='100' class='center'>
                                        <a title='Penilaian' href='?module=s1&act=nilai&id=$data[id_nilai]'>
                                            <button class='btn btn-primary btn-xs'><i class='icon-edit'></i> Nilai</button>
                                        </a> 
                                    </td>";
                                            } elseif ($data['ns1_nilai_kompetensi'] != '0' && $data['angka_kredit'] == '') {
                                                echo "
                                    <td width='100' class='center'>
                                        <a title='Ubah' href='?module=s1&act=edit&id=$data[id_nilai]'>
                                            <button class='btn btn-primary btn-xs'><i class='icon-pencil'></i> Ubah</button>
                                        </a> 
                                    </td>";
                                            } elseif ($data['ns1_nilai_kompetensi'] != '0' && $data['angka_kredit'] != '') {
                                                echo "
                                    <td width='100' class='center'><i class='icon-check'></i></td>";
                                            }

                                            echo "
                                </tr>";
                                            $no++;
                                        }
                                        ?>
	                                </tbody>
	                            </table>
	                        </div>

	                    </div>
	                    <label style="margin-left:20px;color:#3a87ad;font-size:12px;padding:5px 10px" class="label-info"> 0 = Tidak terpenuhi, 1 = Terpenuhi sebagian, 2 = Seluruhnya terpenuhi</label>
	                </section>
	            </div>
	        </div>

	    <?php

            break;

        case "nilai":
            $data = $db->database_fetch_array($db->database_prepare("SELECT a.id_nilai,a.periode_nilai,a.guru_dinilai,a.guru_penilai,
                                                            b.id_periode,b.periode,
                                                            c.nip,c.nama_guru,c.gelar
                                                            FROM tbl_penilaian AS a
                                                            JOIN tbl_periode AS b
                                                            JOIN tbl_guru AS c
                                                            ON a.periode_nilai=b.id_periode 
                                                            AND a.guru_dinilai=c.nip
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
	                        Kompetensi 11 : Bersikap inklusif, bertindak obyektif, serta tidak diskriminatif
	                    </header>
	                    <div class="panel-body">
	                        <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_s1.php?mod=s1&act=nilai" method="POST" name="frmS1">

	                            <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

	                            <div class="alert alert-info alert-block fade in">
	                                <button data-dismiss="alert" class="close close-sm" type="button">
	                                    <i class="icon-remove"></i>
	                                </button>
	                                <p style="font-size:15px">Selama Pengamatan.</p>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">1. Guru memperlakukan semua peserta didik secara adil, memberikan perhatian dan bantuan sesuai kebutuhan masing--masing, tanpa memperdulikan faktor personal</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="as1" class="form-control">
	                                        <option value=""></option>
	                                        <option value="kurang">kurang</option>
	                                        <option value="cukup">cukup</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">2. Guru menjaga hubungan baik dan peduli dengan teman sejawat (bersifat inklusif), serta berkontribusi positif terhadap semua diskusi formal dan informal terkait dengan pekerjaannya</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="as2" class="form-control">
	                                        <option value=""></option>
	                                        <option value="kurang">kurang</option>
	                                        <option value="cukup">cukup</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">3. Guru berinteraksi dengan peserta didik dan tidak membatasi perhatiannya hanya pada kelompok tertentu (misalnya: peserta didik yang pandai, kaya, berasal dari daerah yang sama dengan guru) dilakukannya dengan baik</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="as3" class="form-control">
	                                        <option value=""></option>
	                                        <option value="kurang">kurang</option>
	                                        <option value="cukup">cukup</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">Sikap dan perilaku guru dalam etos kerja, tanggung jawab yang tinggi, dan rasa bangga menjadi guru perlu</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="as4" class="form-control">
	                                        <option value=""></option>
	                                        <option value="ditingkatkan">ditingkatkan</option>
	                                        <option value="dikembangkan">dikembangkan</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="alert alert-info alert-block fade in">
	                                <button data-dismiss="alert" class="close close-sm" type="button">
	                                    <i class="icon-remove"></i>
	                                </button>
	                                <p style="font-size:15px">Pemantauan.</p>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">1. Guru berkomunikasi dan berinteraksi dengan peserta didik, sambil bertanya dengan individu atau kelompok sangat KBM dengan baik</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="as5" class="form-control">
	                                        <option value=""></option>
	                                        <option value="kurang">kurang</option>
	                                        <option value="cukup">cukup</option>
	                                        <option value="sangat">sangat</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">2. Guru memberikan reward kepada peserta didik yang memberikan jawaban dan pekerjaan yang benar dan baik</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="as6" class="form-control">
	                                        <option value=""></option>
	                                        <option value="tidak pernah">tidak pernah</option>
	                                        <option value="sering">sering</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">3. Kepedulian guru kepada semua warga sekolah, orang tua, dan masyarakat lingkungan sekolah dengan baik</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="as7" class="form-control">
	                                        <option value=""></option>
	                                        <option value="kurang">kurang</option>
	                                        <option value="cukup">cukup</option>
	                                        <option value="sangat">sangat</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">4. Guru memberikan kontribusi dalam berbagai pertemuan diskusi dan rapat kerja sekolah</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="as8" class="form-control">
	                                        <option value=""></option>
	                                        <option value="tidak pernah">tidak pernah</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="sering">sering</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="alert alert-info alert-block fade in">
	                                <button data-dismiss="alert" class="close close-sm" type="button">
	                                    <i class="icon-remove"></i>
	                                </button>
	                                <p style="font-size:15px">Penilaian.</p>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">1. Guru memperlakukan semua peserta didik secara adil, memberikan perhatian dan bantuan sesuai kebutuhan masing--masing, tanpa memperdulikan faktor personal</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ns1" class="form-control">
	                                        <option value=""></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">2. Guru menjaga hubungan baik dan peduli dengan teman sejawat (bersifat inklusif), serta berkontribusi positif terhadap semua diskusi formal dan informal terkait dengan pekerjaannya</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ns2" class="form-control">
	                                        <option value=""></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">3. Guru sering berinteraksi dengan peserta didik dan tidak membatasi perhatiannya hanya pada kelompok tertentu (misalnya: peserta didik yang pandai, kaya, berasal dari daerah yang sama dengan guru) dilakukannya dengan baik</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ns3" class="form-control">
	                                        <option value=""></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <hr />
	                            <div class="form-group">
	                                <div class="col-sm-2 pull-right">
	                                    <button type="submit" class="btn btn-primary"> Simpan</button>
	                                    <a style="margin-left:10px;width:80px" href="?module=s1" class="btn btn-white"> Batal</a>
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
            $data = $db->database_fetch_array($db->database_prepare("SELECT a.id_nilai,a.periode_nilai,a.guru_dinilai,a.guru_penilai,
                                                            b.id_periode,b.periode,
                                                            c.nip,c.nama_guru,c.gelar,
                                                            d.id_sosial1,d.as1_point1,d.as1_point2,d.as1_point3,d.as1_point4,d.as1_point5,d.as1_point6,d.as1_point7,d.as1_point8,d.ns1_indikator1,d.ns1_indikator2,d.ns1_indikator3,d.ns1_total_skor,d.ns1_persentase,d.ns1_nilai_kompetensi
                                                            FROM tbl_penilaian AS a
                                                            JOIN tbl_periode AS b
                                                            JOIN tbl_guru AS c
                                                            JOIN sosial1 AS d
                                                            ON a.periode_nilai=b.id_periode 
                                                            AND a.guru_dinilai=c.nip
                                                            AND a.id_nilai=d.id_sosial1
                                                            WHERE d.id_sosial1=?")->execute($_GET["id"]));

            if ($data['ns1_indikator1'] == '0') {
                $ns1_indikator1 = 'Tidak terpenuhi';
            } elseif ($data['ns1_indikator1'] == '1') {
                $ns1_indikator1 = 'Terpenuhi sebagian';
            } elseif ($data['ns1_indikator1'] == '2') {
                $ns1_indikator1 = 'Seluruhnya terpenuhi';
            }

            if ($data['ns1_indikator2'] == '0') {
                $ns1_indikator2 = 'Tidak terpenuhi';
            } elseif ($data['ns1_indikator2'] == '1') {
                $ns1_indikator2 = 'Terpenuhi sebagian';
            } elseif ($data['ns1_indikator2'] == '2') {
                $ns1_indikator2 = 'Seluruhnya terpenuhi';
            }

            if ($data['ns1_indikator3'] == '0') {
                $ns1_indikator3 = 'Tidak terpenuhi';
            } elseif ($data['ns1_indikator3'] == '1') {
                $ns1_indikator3 = 'Terpenuhi sebagian';
            } elseif ($data['ns1_indikator3'] == '2') {
                $ns1_indikator3 = 'Seluruhnya terpenuhi';
            }

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
	                        Kompetensi 11 : Bersikap inklusif, bertindak obyektif, serta tidak diskriminatif
	                    </header>
	                    <div class="panel-body">
	                        <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_s1.php?mod=s1&act=nilai" method="POST" name="frmS1">

	                            <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

	                            <div class="alert alert-info alert-block fade in">
	                                <button data-dismiss="alert" class="close close-sm" type="button">
	                                    <i class="icon-remove"></i>
	                                </button>
	                                <p style="font-size:15px">Selama Pengamatan.</p>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">1. Guru memperlakukan semua peserta didik secara adil, memberikan perhatian dan bantuan sesuai kebutuhan masing--masing, tanpa memperdulikan faktor personal</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="as1" class="form-control">
	                                        <option value="<?php echo $data['as1_point1']; ?>"><?php echo $data['as1_point1']; ?></option>
	                                        <option value="kurang">kurang</option>
	                                        <option value="cukup">cukup</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">2. Guru menjaga hubungan baik dan peduli dengan teman sejawat (bersifat inklusif), serta berkontribusi positif terhadap semua diskusi formal dan informal terkait dengan pekerjaannya</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="as2" class="form-control">
	                                        <option value="<?php echo $data['as1_point2']; ?>"><?php echo $data['as1_point2']; ?></option>
	                                        <option value="kurang">kurang</option>
	                                        <option value="cukup">cukup</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">3. Guru berinteraksi dengan peserta didik dan tidak membatasi perhatiannya hanya pada kelompok tertentu (misalnya: peserta didik yang pandai, kaya, berasal dari daerah yang sama dengan guru) dilakukannya dengan baik</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="as3" class="form-control">
	                                        <option value="<?php echo $data['as1_point3']; ?>"><?php echo $data['as1_point3']; ?></option>
	                                        <option value="kurang">kurang</option>
	                                        <option value="cukup">cukup</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">Sikap dan perilaku guru dalam etos kerja, tanggung jawab yang tinggi, dan rasa bangga menjadi guru perlu</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="as4" class="form-control">
	                                        <option value="<?php echo $data['as1_point4']; ?>"><?php echo $data['as1_point4']; ?></option>
	                                        <option value="ditingkatkan">ditingkatkan</option>
	                                        <option value="dikembangkan">dikembangkan</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="alert alert-info alert-block fade in">
	                                <button data-dismiss="alert" class="close close-sm" type="button">
	                                    <i class="icon-remove"></i>
	                                </button>
	                                <p style="font-size:15px">Pemantauan.</p>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">1. Guru berkomunikasi dan berinteraksi dengan peserta didik, sambil bertanya dengan individu atau kelompok sangat KBM dengan baik</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="as5" class="form-control">
	                                        <option value="<?php echo $data['as1_point5']; ?>"><?php echo $data['as1_point5']; ?></option>
	                                        <option value="kurang">kurang</option>
	                                        <option value="cukup">cukup</option>
	                                        <option value="sangat">sangat</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">2. Guru memberikan reward kepada peserta didik yang memberikan jawaban dan pekerjaan yang benar dan baik</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="as6" class="form-control">
	                                        <option value="<?php echo $data['as1_point6']; ?>"><?php echo $data['as1_point6']; ?></option>
	                                        <option value="tidak pernah">tidak pernah</option>
	                                        <option value="sering">sering</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">3. Kepedulian guru kepada semua warga sekolah, orang tua, dan masyarakat lingkungan sekolah dengan baik</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="as7" class="form-control">
	                                        <option value="<?php echo $data['as1_point7']; ?>"><?php echo $data['as1_point7']; ?></option>
	                                        <option value="kurang">kurang</option>
	                                        <option value="cukup">cukup</option>
	                                        <option value="sangat">sangat</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">4. Guru memberikan kontribusi dalam berbagai pertemuan diskusi dan rapat kerja sekolah</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="as8" class="form-control">
	                                        <option value="<?php echo $data['as1_point8']; ?>"><?php echo $data['as1_point8']; ?></option>
	                                        <option value="tidak pernah">tidak pernah</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="sering">sering</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="alert alert-info alert-block fade in">
	                                <button data-dismiss="alert" class="close close-sm" type="button">
	                                    <i class="icon-remove"></i>
	                                </button>
	                                <p style="font-size:15px">Penilaian.</p>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">1. Guru memperlakukan semua peserta didik secara adil, memberikan perhatian dan bantuan sesuai kebutuhan masing--masing, tanpa memperdulikan faktor personal</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ns1" class="form-control">
	                                        <option value="<?php echo $data['ns1_indikator1']; ?>"><?php echo $ns1_indikator1; ?></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">2. Guru menjaga hubungan baik dan peduli dengan teman sejawat (bersifat inklusif), serta berkontribusi positif terhadap semua diskusi formal dan informal terkait dengan pekerjaannya</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ns2" class="form-control">
	                                        <option value="<?php echo $data['ns1_indikator2']; ?>"><?php echo $ns1_indikator2; ?></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">3. Guru sering berinteraksi dengan peserta didik dan tidak membatasi perhatiannya hanya pada kelompok tertentu (misalnya: peserta didik yang pandai, kaya, berasal dari daerah yang sama dengan guru) dilakukannya dengan baik</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ns3" class="form-control">
	                                        <option value="<?php echo $data['ns1_indikator3']; ?>"><?php echo $ns1_indikator3; ?></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <hr />
	                            <div class="form-group">
	                                <div class="col-sm-2 pull-right">
	                                    <button type="submit" class="btn btn-primary"> Simpan</button>
	                                    <a style="margin-left:10px;width:80px" href="?module=s1" class="btn btn-white"> Batal</a>
	                                </div>
	                            </div>
	                        </form>
	                    </div>
	                </section>
	            </div>
	        </div>

	<?php
            break;
    }
    ?>
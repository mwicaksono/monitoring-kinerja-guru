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
	                        <i style="margin-right:7px" class="icon-edit"></i> Kepribadian
	                    </header>
	                    <div class="panel-body">
	                        <div class="alert alert-info alert-block fade in">
	                            <button data-dismiss="alert" class="close close-sm" type="button">
	                                <i class="icon-remove"></i>
	                            </button>
	                            <p style="font-size:15px">Kompetensi 10 : Etos kerja, tanggung jawab yang tinggi, dan rasa bangga menjadi guru.</p>
	                        </div>
	                        <div class="adv-table">
	                            <table class="display table table-striped table-bordered table-hover" id="example">
	                                <thead>
	                                    <tr>
	                                        <th rowspan="2">No</th>
	                                        <th rowspan="2">Periode</th>
	                                        <th rowspan="2">Guru Dinilai</th>
	                                        <th colspan="8">Indikator Penilaian</th>
	                                        <th rowspan="2">Total Skor</th>
	                                        <th rowspan="2">Persentase</th>
	                                        <th rowspan="2">Nilai Kompetensi</th>
	                                        <th rowspan="2"></th>
	                                    </tr>
	                                    <tr>
	                                        <th> 1</th>
	                                        <th> 2</th>
	                                        <th> 3</th>
	                                        <th> 4</th>
	                                        <th> 5</th>
	                                        <th> 6</th>
	                                        <th> 7</th>
	                                        <th> 8</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                    <?php
                                        $no = 1;
                                        $sql = $db->database_prepare("SELECT a.id_nilai,a.periode_nilai,a.guru_dinilai,a.guru_penilai,a.angka_kredit,
                                                          b.id_periode,b.periode,
                                                          c.nip,c.nama_guru,c.gelar,
                                                          d.id_kepribadian3,d.nk3_indikator1,d.nk3_indikator2,d.nk3_indikator3,d.nk3_indikator4,d.nk3_indikator5,d.nk3_indikator6,d.nk3_indikator7,d.nk3_indikator8,d.nk3_total_skor,d.nk3_persentase,d.nk3_nilai_kompetensi
                                                          FROM tbl_penilaian AS a
                                                          JOIN tbl_periode AS b
                                                          JOIN tbl_guru AS c
                                                          JOIN kepribadian3 AS d
                                                          ON a.periode_nilai=b.id_periode 
                                                          AND a.guru_dinilai=c.nip
                                                          AND a.id_nilai=d.id_kepribadian3
                                                          WHERE a.guru_penilai='$_SESSION[nip]'
                                                          ORDER BY a.id_nilai DESC")->execute();
                                        while ($data = $db->database_fetch_array($sql)) {
                                            echo "
                                <tr class='gradeX'>
                                    <td width='50' class='center'>$no</td>
                                    <td width='80' class='center'>$data[periode]</td>
                                    <td width='200'>$data[nama_guru], $data[gelar] ($data[guru_dinilai])</td>
                                    <td width='50' class='center'>$data[nk3_indikator1]</td>
                                    <td width='50' class='center'>$data[nk3_indikator2]</td>
                                    <td width='50' class='center'>$data[nk3_indikator3]</td>
                                    <td width='50' class='center'>$data[nk3_indikator4]</td>
                                    <td width='50' class='center'>$data[nk3_indikator5]</td>
                                    <td width='50' class='center'>$data[nk3_indikator6]</td>
                                    <td width='50' class='center'>$data[nk3_indikator7]</td>
                                    <td width='50' class='center'>$data[nk3_indikator8]</td>
                                    <td class='center'>$data[nk3_total_skor]</td>
                                    <td class='center'>$data[nk3_persentase] %</td>
                                    <td class='center'>$data[nk3_nilai_kompetensi]</td>";

                                            if ($data['nk3_nilai_kompetensi'] == '0' && $data['angka_kredit'] == '') {
                                                echo "
                                    <td width='100' class='center'>
                                        <a title='Penilaian' href='?module=k3&act=nilai&id=$data[id_nilai]'>
                                            <button class='btn btn-primary btn-xs'><i class='icon-edit'></i> Nilai</button>
                                        </a> 
                                    </td>";
                                            } elseif ($data['nk3_nilai_kompetensi'] != '0' && $data['angka_kredit'] == '') {
                                                echo "
                                    <td width='100' class='center'>
                                        <a title='Ubah' href='?module=k3&act=edit&id=$data[id_nilai]'>
                                            <button class='btn btn-primary btn-xs'><i class='icon-pencil'></i> Ubah</button>
                                        </a> 
                                    </td>";
                                            } elseif ($data['nk3_nilai_kompetensi'] != '0' && $data['angka_kredit'] != '') {
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
	                        Kompetensi 10 : Etos kerja, tanggung jawab yang tinggi, dan rasa bangga menjadi guru
	                    </header>
	                    <div class="panel-body">
	                        <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_k3.php?mod=k3&act=nilai" method="POST" name="frmK3">

	                            <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

	                            <div class="alert alert-info alert-block fade in">
	                                <button data-dismiss="alert" class="close close-sm" type="button">
	                                    <i class="icon-remove"></i>
	                                </button>
	                                <p style="font-size:15px">Selama Pengamatan.</p>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">1. Guru mengawali dan mengakhiri pembelajaran dengan tepat waktu</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak1" class="form-control">
	                                        <option value=""></option>
	                                        <option value="tidak">tidak</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">2. Jika guru harus meninggalkan kelas, guru mengaktifkan siswa dengan melakukan hal-hal produktif terkait dengan mata pelajaran, dan meminta guru piket atau guru lain untuk mengawasi kelas</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak2" class="form-control">
	                                        <option value=""></option>
	                                        <option value="tidak">tidak</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">3. Guru memenuhi jam mengajar dan dapat melakukan semua kegiatan lain diluar jam mengajar berdasarkan izin dan persetujuan dari pengelola sekolah</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak3" class="form-control">
	                                        <option value=""></option>
	                                        <option value="tidak">tidak</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">4. Guru meminta ijin dan memberitahu lebih awal dengan memberikan alasan dan bukti yang sah jika tidak menghadiri kegiatan yang telah direncanakan, termasuk proses pembelajaran di kelas</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak4" class="form-control">
	                                        <option value=""></option>
	                                        <option value="tidak">tidak</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">5. Guru menyelesaikan semua tugas administratif dan non-pembelajaran dengan tepat waktu sesuai standar yang ditetapkan</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak5" class="form-control">
	                                        <option value=""></option>
	                                        <option value="tidak">tidak</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">6. Guru memanfaatkan waktu luang selain mengajar untuk kegiatan yang produktif terkait dengan tugasnya</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak6" class="form-control">
	                                        <option value=""></option>
	                                        <option value="tidak">tidak</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">7. Guru memberikan kontribusi terhadap pengembangan sekolah dan mempunyai prestasi yang berdampak positif terhadap nama baik sekolah</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak7" class="form-control">
	                                        <option value=""></option>
	                                        <option value="tidak">tidak</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">8. Guru merasa bangga dengan profesinya sebagai guru</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak8" class="form-control">
	                                        <option value=""></option>
	                                        <option value="tidak">tidak</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">sikap dan perilaku guru dalam etos kerja, tanggung jawab yang tingi, dan rasa bangga menjadi guru perlu</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak9" class="form-control">
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
	                                <label class="col-sm-10 col-sm-10 control-label">1. Pengaturan waktu dalam memulai dan mengakhiri pembelajaran sesuai dengan RPP</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak10" class="form-control">
	                                        <option value=""></option>
	                                        <option value="tidak">tidak</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">2. Kehadiran guru di kelas</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak11" class="form-control">
	                                        <option value=""></option>
	                                        <option value="dibawah 50 %">dibawah 50 %</option>
	                                        <option value="kurang dari 80 %">kurang dari 80 %</option>
	                                        <option value="lebih dari 80 %">lebih dari 80 %</option>
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
	                                <label class="col-sm-10 col-sm-10 control-label">1. Guru mengawali dan mengakhiri pembelajaran dengan tepat waktu </label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="nk1" class="form-control">
	                                        <option value=""></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">2. Jika guru harus meninggalkan kelas, guru mengaktifkan siswa dengan melakukan hal-hal produktif terkait dengan mata pelajaran, dan meminta guru piket atau guru lain untuk mengawasi kelas</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="nk2" class="form-control">
	                                        <option value=""></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">3. Guru memenuhi jam mengajar dan dapat melakukan semua kegiatan lain diluar jam mengajar berdasarkan izin dan persetujuan dari pengelola sekolah</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="nk3" class="form-control">
	                                        <option value=""></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">4. Guru meminta ijin dan memberitahu lebih awal dengan memberikan alasan dan bukti yang sah jika tidak menghadiri kegiatan yang telah direncanakan, termasuk proses pembelajaran di kelas</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="nk4" class="form-control">
	                                        <option value=""></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">5. Guru menyelesaikan semua tugas administratif dan non-pembelajaran dengan tepat waktu sesuai standar yang ditetapkan</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="nk5" class="form-control">
	                                        <option value=""></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">6. Guru memanfaatkan waktu luang selain mengajar untuk kegiatan yang produktif terkait dengan tugasnya</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="nk6" class="form-control">
	                                        <option value=""></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">7. Guru memberikan kontribusi terhadap pengembangan sekolah dan mempunyai prestasi yang berdampak positif terhadap nama baik sekolah</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="nk7" class="form-control">
	                                        <option value=""></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">8. Guru merasa bangga dengan profesinya sebagai guru</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="nk8" class="form-control">
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
	                                    <a style="margin-left:10px;width:80px" href="?module=k3" class="btn btn-white"> Batal</a>
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
                                                            d.id_kepribadian3,d.ak3_point1,d.ak3_point2,d.ak3_point3,d.ak3_point4,d.ak3_point5,d.ak3_point6,d.ak3_point7,d.ak3_point8,d.ak3_point9,d.ak3_point10,d.ak3_point11,d.nk3_indikator1,d.nk3_indikator2,d.nk3_indikator3,d.nk3_indikator4,d.nk3_indikator5,d.nk3_indikator6,d.nk3_indikator7,d.nk3_indikator8,d.nk3_total_skor,d.nk3_persentase,d.nk3_nilai_kompetensi
                                                            FROM tbl_penilaian AS a
                                                            JOIN tbl_periode AS b
                                                            JOIN tbl_guru AS c
                                                            JOIN kepribadian3 AS d
                                                            ON a.periode_nilai=b.id_periode 
                                                            AND a.guru_dinilai=c.nip
                                                            AND a.id_nilai=d.id_kepribadian3
                                                            WHERE d.id_kepribadian3=?")->execute($_GET["id"]));

            if ($data['nk3_indikator1'] == '0') {
                $nk3_indikator1 = 'Tidak terpenuhi';
            } elseif ($data['nk3_indikator1'] == '1') {
                $nk3_indikator1 = 'Terpenuhi sebagian';
            } elseif ($data['nk3_indikator1'] == '2') {
                $nk3_indikator1 = 'Seluruhnya terpenuhi';
            }

            if ($data['nk3_indikator2'] == '0') {
                $nk3_indikator2 = 'Tidak terpenuhi';
            } elseif ($data['nk3_indikator2'] == '1') {
                $nk3_indikator2 = 'Terpenuhi sebagian';
            } elseif ($data['nk3_indikator2'] == '2') {
                $nk3_indikator2 = 'Seluruhnya terpenuhi';
            }

            if ($data['nk3_indikator3'] == '0') {
                $nk3_indikator3 = 'Tidak terpenuhi';
            } elseif ($data['nk3_indikator3'] == '1') {
                $nk3_indikator3 = 'Terpenuhi sebagian';
            } elseif ($data['nk3_indikator3'] == '2') {
                $nk3_indikator3 = 'Seluruhnya terpenuhi';
            }

            if ($data['nk3_indikator4'] == '0') {
                $nk3_indikator4 = 'Tidak terpenuhi';
            } elseif ($data['nk3_indikator4'] == '1') {
                $nk3_indikator4 = 'Terpenuhi sebagian';
            } elseif ($data['nk3_indikator4'] == '2') {
                $nk3_indikator4 = 'Seluruhnya terpenuhi';
            }

            if ($data['nk3_indikator5'] == '0') {
                $nk3_indikator5 = 'Tidak terpenuhi';
            } elseif ($data['nk3_indikator5'] == '1') {
                $nk3_indikator5 = 'Terpenuhi sebagian';
            } elseif ($data['nk3_indikator5'] == '2') {
                $nk3_indikator5 = 'Seluruhnya terpenuhi';
            }

            if ($data['nk3_indikator6'] == '0') {
                $nk3_indikator6 = 'Tidak terpenuhi';
            } elseif ($data['nk3_indikator6'] == '1') {
                $nk3_indikator6 = 'Terpenuhi sebagian';
            } elseif ($data['nk3_indikator6'] == '2') {
                $nk3_indikator6 = 'Seluruhnya terpenuhi';
            }

            if ($data['nk3_indikator7'] == '0') {
                $nk3_indikator7 = 'Tidak terpenuhi';
            } elseif ($data['nk3_indikator7'] == '1') {
                $nk3_indikator7 = 'Terpenuhi sebagian';
            } elseif ($data['nk3_indikator7'] == '2') {
                $nk3_indikator7 = 'Seluruhnya terpenuhi';
            }

            if ($data['nk3_indikator8'] == '0') {
                $nk3_indikator8 = 'Tidak terpenuhi';
            } elseif ($data['nk3_indikator8'] == '1') {
                $nk3_indikator8 = 'Terpenuhi sebagian';
            } elseif ($data['nk3_indikator8'] == '2') {
                $nk3_indikator8 = 'Seluruhnya terpenuhi';
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
	                        Kompetensi 10 : Etos kerja, tanggung jawab yang tinggi, dan rasa bangga menjadi guru
	                    </header>
	                    <div class="panel-body">
	                        <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_k3.php?mod=k3&act=nilai" method="POST" name="frmK3">

	                            <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

	                            <div class="alert alert-info alert-block fade in">
	                                <button data-dismiss="alert" class="close close-sm" type="button">
	                                    <i class="icon-remove"></i>
	                                </button>
	                                <p style="font-size:15px">Selama Pengamatan.</p>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">1. Guru mengawali dan mengakhiri pembelajaran dengan tepat waktu</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak1" class="form-control">
	                                        <option value="<?php echo $data['ak3_point1']; ?>"><?php echo $data['ak3_point1']; ?></option>
	                                        <option value="tidak">tidak</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">2. Jika guru harus meninggalkan kelas, guru mengaktifkan siswa dengan melakukan hal-hal produktif terkait dengan mata pelajaran, dan meminta guru piket atau guru lain untuk mengawasi kelas</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak2" class="form-control">
	                                        <option value="<?php echo $data['ak3_point2']; ?>"><?php echo $data['ak3_point2']; ?></option>
	                                        <option value="tidak">tidak</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">3. Guru memenuhi jam mengajar dan dapat melakukan semua kegiatan lain diluar jam mengajar berdasarkan izin dan persetujuan dari pengelola sekolah</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak3" class="form-control">
	                                        <option value="<?php echo $data['ak3_point3']; ?>"><?php echo $data['ak3_point3']; ?></option>
	                                        <option value="tidak">tidak</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">4. Guru meminta ijin dan memberitahu lebih awal dengan memberikan alasan dan bukti yang sah jika tidak menghadiri kegiatan yang telah direncanakan, termasuk proses pembelajaran di kelas</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak4" class="form-control">
	                                        <option value="<?php echo $data['ak3_point4']; ?>"><?php echo $data['ak3_point4']; ?></option>
	                                        <option value="tidak">tidak</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">5. Guru menyelesaikan semua tugas administratif dan non-pembelajaran dengan tepat waktu sesuai standar yang ditetapkan</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak5" class="form-control">
	                                        <option value="<?php echo $data['ak3_point5']; ?>"><?php echo $data['ak3_point5']; ?></option>
	                                        <option value="tidak">tidak</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">6. Guru memanfaatkan waktu luang selain mengajar untuk kegiatan yang produktif terkait dengan tugasnya</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak6" class="form-control">
	                                        <option value="<?php echo $data['ak3_point6']; ?>"><?php echo $data['ak3_point6']; ?></option>
	                                        <option value="tidak">tidak</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">7. Guru memberikan kontribusi terhadap pengembangan sekolah dan mempunyai prestasi yang berdampak positif terhadap nama baik sekolah</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak7" class="form-control">
	                                        <option value="<?php echo $data['ak3_point7']; ?>"><?php echo $data['ak3_point7']; ?></option>
	                                        <option value="tidak">tidak</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">8. Guru merasa bangga dengan profesinya sebagai guru</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak8" class="form-control">
	                                        <option value="<?php echo $data['ak3_point8']; ?>"><?php echo $data['ak3_point8']; ?></option>
	                                        <option value="tidak">tidak</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">sikap dan perilaku guru dalam etos kerja, tanggung jawab yang tingi, dan rasa bangga menjadi guru perlu</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak9" class="form-control">
	                                        <option value="<?php echo $data['ak3_point9']; ?>"><?php echo $data['ak3_point9']; ?></option>
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
	                                <label class="col-sm-10 col-sm-10 control-label">1. Pengaturan waktu dalam memulai dan mengakhiri pembelajaran sesuai dengan RPP</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak10" class="form-control">
	                                        <option value="<?php echo $data['ak3_point10']; ?>"><?php echo $data['ak3_point10']; ?></option>
	                                        <option value="tidak">tidak</option>
	                                        <option value="kadang-kadang">kadang-kadang</option>
	                                        <option value="selalu">selalu</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">2. Kehadiran guru di kelas</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="ak11" class="form-control">
	                                        <option value="<?php echo $data['ak3_point11']; ?>"><?php echo $data['ak3_point11']; ?></option>
	                                        <option value="dibawah 50 %">dibawah 50 %</option>
	                                        <option value="kurang dari 80 %">kurang dari 80 %</option>
	                                        <option value="lebih dari 80 %">lebih dari 80 %</option>
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
	                                <label class="col-sm-10 col-sm-10 control-label">1. Guru mengawali dan mengakhiri pembelajaran dengan tepat waktu </label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="nk1" class="form-control">
	                                        <option value="<?php echo $data['nk3_indikator1']; ?>"><?php echo $nk3_indikator1; ?></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">2. Jika guru harus meninggalkan kelas, guru mengaktifkan siswa dengan melakukan hal-hal produktif terkait dengan mata pelajaran, dan meminta guru piket atau guru lain untuk mengawasi kelas</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="nk2" class="form-control">
	                                        <option value="<?php echo $data['nk3_indikator2']; ?>"><?php echo $nk3_indikator2; ?></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">3. Guru memenuhi jam mengajar dan dapat melakukan semua kegiatan lain diluar jam mengajar berdasarkan izin dan persetujuan dari pengelola sekolah</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="nk3" class="form-control">
	                                        <option value="<?php echo $data['nk3_indikator3']; ?>"><?php echo $nk3_indikator3; ?></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">4. Guru meminta ijin dan memberitahu lebih awal dengan memberikan alasan dan bukti yang sah jika tidak menghadiri kegiatan yang telah direncanakan, termasuk proses pembelajaran di kelas</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="nk4" class="form-control">
	                                        <option value="<?php echo $data['nk3_indikator4']; ?>"><?php echo $nk3_indikator4; ?></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">5. Guru menyelesaikan semua tugas administratif dan non-pembelajaran dengan tepat waktu sesuai standar yang ditetapkan</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="nk5" class="form-control">
	                                        <option value="<?php echo $data['nk3_indikator5']; ?>"><?php echo $nk3_indikator5; ?></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">6. Guru memanfaatkan waktu luang selain mengajar untuk kegiatan yang produktif terkait dengan tugasnya</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="nk6" class="form-control">
	                                        <option value="<?php echo $data['nk3_indikator6']; ?>"><?php echo $nk3_indikator6; ?></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">7. Guru memberikan kontribusi terhadap pengembangan sekolah dan mempunyai prestasi yang berdampak positif terhadap nama baik sekolah</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="nk7" class="form-control">
	                                        <option value="<?php echo $data['nk3_indikator7']; ?>"><?php echo $nk3_indikator7; ?></option>
	                                        <option value="0">Tidak terpenuhi</option>
	                                        <option value="1">Terpenuhi sebagian</option>
	                                        <option value="2">Seluruhnya terpenuhi</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-10 col-sm-10 control-label">8. Guru merasa bangga dengan profesinya sebagai guru</label>
	                                <div class="col-sm-2">
	                                    <select type="text" name="nk8" class="form-control">
	                                        <option value="<?php echo $data['nk3_indikator7']; ?>"><?php echo $nk3_indikator7; ?></option>
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
	                                    <a style="margin-left:10px;width:80px" href="?module=k3" class="btn btn-white"> Batal</a>
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
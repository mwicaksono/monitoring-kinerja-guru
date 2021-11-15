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
					<a title="Ubah" href="?module=hasil_nilai_internal">
						<button class='btn btn-primary'> Hasil Penilaian</button>
					</a>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-12">
					<section class="panel">
						<header style="font-size:18px" class="panel-heading">
							<i style="margin-right:7px" class="icon-edit"></i> TUPOKSI 2: Pemimpin Akademik
						</header>
						<div class="panel-body">
							<div class="adv-table">
								<table class="display table table-striped table-bordered table-hover" id="example">
									<thead>
										<tr>
											<th rowspan="2">No</th>
											<th rowspan="2">Periode</th>
											<th rowspan="2">Guru Dinilai</th>
											<th rowspan="2">Total Skor</th>
											<th rowspan="2">Persentase</th>
											<th rowspan="2"></th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$sql = $db->database_prepare("SELECT
										a.id_nilai, a.periode_nilai, a.guru_dinilai, a.guru_penilai,
										b.id_periode, b.periode,
										c.nip, c.nama_guru, c.gelar,
										d.na_total_skor, d.na_persentase
										FROM tbl_penilaian_internal AS a
										JOIN tbl_periode AS b
										JOIN tbl_guru AS c
										JOIN akademik AS d
										ON a.periode_nilai = b.id_periode 
										AND a.guru_dinilai = c.nip
										AND a.id_nilai = d.id_penilaian_akademik
										WHERE a.guru_penilai= '$_SESSION[nip]'
										ORDER BY a.id_nilai DESC")->execute();
										while ($data = $db->database_fetch_array($sql)) {
											echo "
                                <tr class='gradeX'>
                                    <td width='50' class='center'>$no</td>
                                    <td width='80' class='center'>$data[periode]</td>
                                    <td width='300'>$data[nama_guru], $data[gelar] ($data[guru_dinilai])</td>
                                    <td width='100' class='center'>$data[na_total_skor]</td>
                                    <td width='100' class='center'>$data[na_persentase] %</td>";
											if ($data['na_total_skor'] == '0') {
												echo "
									<td width='100' class='center'>
									<a title='Penilaian' href='?module=akademik&act=nilai&id=$data[id_nilai]'>
                                            <button class='btn btn-primary btn-xs'><i class='icon-edit'></i> Nilai</button>
                                        </a> 
									</td>";
											} elseif ($data['na_total_skor'] != '0') {
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
			$data = $db->database_fetch_array($db->database_prepare("SELECT a.id_nilai, a.periode_nilai, a.guru_dinilai, a.guru_penilai,
                                                            b.id_periode, b.periode,
                                                            c.nip, c.nama_guru, c.gelar
                                                            FROM tbl_penilaian_internal AS a
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
							<p><b>TUPOKSI 2: Pemimpin Akademik</b></p>
						</header>
						<div class="panel-body">
							<form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_akademik.php?mod=akademik&act=nilai" method="POST" name="frmK1">

								<input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">
								<div class="alert alert-info alert-block fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="icon-remove"></i>
									</button>
									<p style="font-size:15px">Melakukan Inovasi</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru mempelajari berbagai bidang ilmu dan teknologi</label>
									<div class="col-sm-2">
										<select type="text" name="na1" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">2. Membangun suasana yang menyenangkan sehingga muncul ide-ide kreatif</label>
									<div class="col-sm-2">
										<select type="text" name="na2" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">3. Memanfaatkan berbagai sumber daya dengan menggunakan berbagai sumber untuk mendapatkan ide dan inspirasi</label>
									<div class="col-sm-2">
										<select type="text" name="na3" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">4. Berpikiran luas, mengkomibinasikan ide-ide secara unik dan mengaitkan ide-ide yang tidak terkait menjadi temuan baru</label>
									<div class="col-sm-2">
										<select type="text" name="na4" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">5. Guru memiliki pengetahuan yang luas, mendalam, dan terkini</label>
									<div class="col-sm-2">
										<select type="text" name="na5" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">6. Guru tidak hanya mampu menjelaskan tentang materi yang diajarkan, tetapi juga dapat membantu peserta didiknya memahami manfaat atau kegunaan dari proses belajar yang tengah berlangsung</label>
									<div class="col-sm-2">
										<select type="text" name="na6" class="form-control" required>
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
									<p style="font-size:15px">Berkolaborasi</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Secara proaktif berusaha membangun hubungan kerja sama yang efektif dengan peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="na7" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">2. Mengembangkan ide-ide yang muncul baik dari diri sendiri maupun orang lain mengenai masalah-masalah yang ada untuk menjadi alternatif baru</label>
									<div class="col-sm-2">
										<select type="text" name="na8" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">3. Memberi prioritas tujuan organisasi/ kelompok daripada tujuan pribadi</label>
									<div class="col-sm-2">
										<select type="text" name="na9" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">4. Menciptakan hubungan interpersonal yang baik dengan cara membantu orang lain untuk merasa dihargai, dihormati, dilibatkan dalam diskusi yang berlangsung (meningkatkan harga diri, berempati, melibatkan, terbuka, mendukung)</label>
									<div class="col-sm-2">
										<select type="text" name="na10" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">5. Mendapatkan persetujuan dari rekan kerja untuk mendukung ide-ide untuk mengambil tindakan yang berorientasi pada kemitraan. Dapat menjelaskan maksud dari setiap tujuan dengan logika yang tepat</label>
									<div class="col-sm-2">
										<select type="text" name="na11" class="form-control" required>
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
									<p style="font-size:15px">Komunikasi</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru dapat membangun hubungan saling percaya dengan orang tua dan peserta didik melalui komunikasi yang terbuka dan jujur</label>
									<div class="col-sm-2">
										<select type="text" name="na12" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">2. Guru memastikan kehadiran baik di kelas maupun dalam setiap permasalahan yang ada </label>
									<div class="col-sm-2">
										<select type="text" name="na13" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">3. Guru fokus dengan apa yang dibicarakan, dapat menjadi pendengar bukan pendebat, bukan untuk marah, menasihati atau melarang.</label>
									<div class="col-sm-2">
										<select type="text" name="na14" class="form-control" required>
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
										<a style="margin-left:10px;width:80px" href="?module=akademik" class="btn btn-white"> Batal</a>
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
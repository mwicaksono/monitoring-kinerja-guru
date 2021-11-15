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
							<i style="margin-right:7px" class="icon-edit"></i> TUPOKSI 3: Pemimpin Spiritual
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
										d.nr_total_skor, d.nr_persentase
										FROM tbl_penilaian_internal AS a
										JOIN tbl_periode AS b
										JOIN tbl_guru AS c
										JOIN spiritual AS d
										ON a.periode_nilai = b.id_periode 
										AND a.guru_dinilai = c.nip
										AND a.id_nilai = d.id_penilaian_spiritual
										WHERE a.guru_penilai= '$_SESSION[nip]'
										ORDER BY a.id_nilai DESC")->execute();
										while ($data = $db->database_fetch_array($sql)) {
											echo "
                                <tr class='gradeX'>
                                    <td width='50' class='center'>$no</td>
                                    <td width='80' class='center'>$data[periode]</td>
                                    <td width='300'>$data[nama_guru], $data[gelar] ($data[guru_dinilai])</td>
                                    <td width='100' class='center'>$data[nr_total_skor]</td>
                                    <td width='100' class='center'>$data[nr_persentase] %</td>";
											if ($data['nr_total_skor'] == '0') {
												echo "
									<td width='100' class='center'>
									<a title='Penilaian' href='?module=spiritual&act=nilai&id=$data[id_nilai]'>
                                            <button class='btn btn-primary btn-xs'><i class='icon-edit'></i> Nilai</button>
                                        </a> 
									</td>";
											} elseif ($data['nr_total_skor'] != '0') {
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
							<p><b>TUPOKSI 3: Pemimpin Spiritual</b></p>
						</header>
						<div class="panel-body">
							<form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_spiritual.php?mod=spiritual&act=nilai" method="POST" name="frmK1">

								<input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">
								<div class="alert alert-info alert-block fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="icon-remove"></i>
									</button>
									<p style="font-size:15px">Religius</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru menunjukkan sikap takut akan Tuhan</label>
									<div class="col-sm-2">
										<select type="text" name="nr1" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">2. Menghargai keberadaan peserta didik sebagai ciptaan Tuhan yang berharga dan spesial</label>
									<div class="col-sm-2">
										<select type="text" name="nr2" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">3. Menunjukkan pribadi yang religius, cerdas secara spiritual dan emosional</label>
									<div class="col-sm-2">
										<select type="text" name="nr3" class="form-control" required>
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
									<p style="font-size:15px">Jujur</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru menunjukkan sikap dan tindakan yang jujur</label>
									<div class="col-sm-2">
										<select type="text" name="nr4" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">2. Bersikap dan bertindak adil terhadap peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="nr5" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">3. Melakukan pekerjaannya sebagai panggilan dari hati nurani untuk melayani Tuhan</label>
									<div class="col-sm-2">
										<select type="text" name="nr6" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">4. Guru melakukan pekerjaannya dengan semangat </label>
									<div class="col-sm-2">
										<select type="text" name="nr7" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">5. Guru bersikap bijaksana dalam menghadapi dan menyelesaikan masalah berkaitan dengan kegiatan pembelajaran dan hubungan antar peserta didik dan orang tua siswa</label>
									<div class="col-sm-2">
										<select type="text" name="nr8" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">6. Guru bersikap terbuka terhadap perubahan dengan melakukan perubahan/ inovasi dalam kegiatan pembelajaran tanpa meninggalkan nilai-nilai kekristenan</label>
									<div class="col-sm-2">
										<select type="text" name="nr9" class="form-control" required>
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
									<p style="font-size:15px">Rendah Hati</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru mempunyai rasa cinta kasih terhadap peserta didik yang dididiknya</label>
									<div class="col-sm-2">
										<select type="text" name="nr10" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">2. Guru memiliki disiplin yang tinggi tapi fleksibel dan cerdas</label>
									<div class="col-sm-2">
										<select type="text" name="nr11" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">3. Guru mempunyai sikap rendah hati</label>
									<div class="col-sm-2">
										<select type="text" name="nr12" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">4. Guru menjadi inspirator bagi peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="nr13" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">5. Guru mempunyai hubungan yang harmoni, dekat, dan akrab dengan peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="nr14" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">6. Guru mempunyai hubungan yang harmoni, dekat, dan akrab dengan sesama teman sejawat</label>
									<div class="col-sm-2">
										<select type="text" name="nr15" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">7. Guru memberikan pengalaman belajar kepada peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="nr16" class="form-control" required>
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
										<a style="margin-left:10px;width:80px" href="?module=spiritual" class="btn btn-white"> Batal</a>
									</div>
								</div>
							</form>
						</div>
					</section>
				</div>
			</div>

			<!-- Tidak DIgunakan code dibawah ini -->
		<?php
			break;

		case "edit":
			echo 'dalam tahap pengembangan';
		?>
	<?php
			break;
	}
	?>
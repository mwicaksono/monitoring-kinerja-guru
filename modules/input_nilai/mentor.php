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
							<i style="margin-right:7px" class="icon-edit"></i> TUPOKSI 5: Mentor
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
										d.nm_total_skor, d.nm_persentase
										FROM tbl_penilaian_internal AS a
										JOIN tbl_periode AS b
										JOIN tbl_guru AS c
										JOIN mentor AS d
										ON a.periode_nilai = b.id_periode 
										AND a.guru_dinilai = c.nip
										AND a.id_nilai = d.id_penilaian_mentor
										WHERE a.guru_penilai= '$_SESSION[nip]'
										ORDER BY a.id_nilai DESC")->execute();
										while ($data = $db->database_fetch_array($sql)) {
											echo "
                                <tr class='gradeX'>
                                    <td width='50' class='center'>$no</td>
                                    <td width='80' class='center'>$data[periode]</td>
                                    <td width='300'>$data[nama_guru], $data[gelar] ($data[guru_dinilai])</td>
                                    <td width='100' class='center'>$data[nm_total_skor]</td>
                                    <td width='100' class='center'>$data[nm_persentase] %</td>";
											if ($data['nm_total_skor'] == '0') {
												echo "
									<td width='100' class='center'>
									<a title='Penilaian' href='?module=mentor&act=nilai&id=$data[id_nilai]'>
                                            <button class='btn btn-primary btn-xs'><i class='icon-edit'></i> Nilai</button>
                                        </a> 
									</td>";
											} elseif ($data['nm_total_skor'] != '0') {
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
							<p><b>TUPOKSI 5: Mentor</b></p>
						</header>
						<div class="panel-body">
							<form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_mentor.php?mod=mentor&act=nilai" method="POST" name="frmK1">

								<input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">
								<div class="alert alert-info alert-block fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="icon-remove"></i>
									</button>
									<p style="font-size:15px">Penasihat</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru mendengarkan setiap permasalahan yang dihadapi peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="nm1" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">2. Guru memberikan kesempatan kepada peserta didik untuk mengemukakan pendapatnya</label>
									<div class="col-sm-2">
										<select type="text" name="nm2" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">3. Guru menjadi pendengar yang baik, penuh pengertian dan perhatian kepada peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="nm3" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">4. Guru mengembangkan hubungan yang membawa peserta didik lebih terbuka terhadap pengarah positif dari guru </label>
									<div class="col-sm-2">
										<select type="text" name="nm4" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">5. Guru menghargai pendapat siswa dengan memberikan sebuah forum ketika mereka dapat mengutarakan pikiran dan perhatiannya</label>
									<div class="col-sm-2">
										<select type="text" name="nm5" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">6. Guru membangun kepercayaan diri mereka, dan memberikan nasehat yang berkenaan dengan permasalahan sosial</label>
									<div class="col-sm-2">
										<select type="text" name="nm6" class="form-control" required>
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
									<p style="font-size:15px">Motivator</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru menyampaikan tujuan pembelajaran kepada peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="nm7" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">2. Guru menciptakan suasana belajar yang menyenangkan</label>
									<div class="col-sm-2">
										<select type="text" name="nm8" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">3. Guru memberikan pujian wajar kepada setiap keberhasilan peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="nm9" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">4. Guru membantu peserta didik meraih kesuksesan di sekolah</label>
									<div class="col-sm-2">
										<select type="text" name="nm10" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">5. Guru memberikan komentar membangun terhadap hasil belajar peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="nm11" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">6. Guru memberikan penilaian hasil belajar peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="nm12" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">7. Guru menciptakan persaingan dan kerja sama yang positif antar peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="nm13" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">8. Guru memberikan pujian kepada peserta didik dalam bentuk lisan maupun melalui tulisan; meminta siswa selalu menulis jurnal dan guru menuliskan komentar sebagai respons atas masukan dari siswa</label>
									<div class="col-sm-2">
										<select type="text" name="nm14" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">9. Guru membimbing peserta didik dengan cara mencoba mencari tahu, menguatkan, dan mengembangkan bakat khusus dan kelebihan setiap anak</label>
									<div class="col-sm-2">
										<select type="text" name="nm15" class="form-control" required>
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
									<p style="font-size:15px">Keteladanan</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru bersikap adil terhadap peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="nm16" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">2. Guru merespons jawaban yang salah atau tidak lengkap peserta didik dengan baik dan mengurangi ketakutan pesertya didik untuk melakukan kesalahan</label>
									<div class="col-sm-2">
										<select type="text" name="nm17" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">3. Guru mendiskusikan pentingnya moral bersama-sama dengan peserta didik, apalagi ketika permasalahan yang berkaitan dengan moral itu muncul di sekitar mereka</label>
									<div class="col-sm-2">
										<select type="text" name="nm18" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">4. Guru memberikan komentar tentang etika secara personal yang dapat membantu para siswa mengerti mengapa tindakan seperti curang, mencuri, mengganggu, dan memanggil nama siswa lain dengan panggilan yang tidak semestinya adalah salah dan menyakitkan orang lain</label>
									<div class="col-sm-2">
										<select type="text" name="nm19" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">5. Guru mengajarkan siswa untuk peduli terhadap nilai-nilai moral seperti kejujuran dan rasa hormat dengan menunjukkan dalamnya perasaan seseorang ketika nilai-nilai tersebut dilanggar</label>
									<div class="col-sm-2">
										<select type="text" name="nm20" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">6. Guru bercerita yang dapat mengajarkan nilai-nilai yang baik </label>
									<div class="col-sm-2">
										<select type="text" name="nm21" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">7. Guru menggunakan pertemuan personal untuk memberikan umpan balik yang korektif ketika mereka membutuhkannya.</label>
									<div class="col-sm-2">
										<select type="text" name="nm22" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">8. Guru mampu membimbing dan bertanggung jawab atas perjalanan dan perkembangan peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="nm23" class="form-control" required>
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
										<a style="margin-left:10px;width:80px" href="?module=mentor" class="btn btn-white"> Batal</a>
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
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
							<i style="margin-right:7px" class="icon-edit"></i> TUPOKSI 1: Pelayan Iman
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
										d.ny_total_skor, d.ny_persentase
										FROM tbl_penilaian_internal AS a
										JOIN tbl_periode AS b
										JOIN tbl_guru AS c
										JOIN pelayan AS d
										ON a.periode_nilai = b.id_periode 
										AND a.guru_dinilai = c.nip
										AND a.id_nilai = d.id_penilaian_pelayan
										WHERE a.guru_penilai= '$_SESSION[nip]'
										ORDER BY a.id_nilai DESC")->execute();
										while ($data = $db->database_fetch_array($sql)) {
											echo "
                                <tr class='gradeX'>
                                    <td width='50' class='center'>$no</td>
                                    <td width='80' class='center'>$data[periode]</td>
                                    <td width='300'>$data[nama_guru], $data[gelar] ($data[guru_dinilai])</td>
                                    <td width='100' class='center'>$data[ny_total_skor]</td>
                                    <td width='100' class='center'>$data[ny_persentase] %</td>";
											if ($data['ny_total_skor'] == '0') {
												echo "
									<td width='100' class='center'>
									<a title='Penilaian' href='?module=pelayan&act=nilai&id=$data[id_nilai]'>
                                            <button class='btn btn-primary btn-xs'><i class='icon-edit'></i> Nilai</button>
                                        </a> 
									</td>";
											} elseif ($data['ny_total_skor'] != '0') {
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
							<p><b>TUPOKSI 1: Pelayan Iman</b></p>
						</header>
						<div class="panel-body">
							<form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_pelayan.php?mod=pelayan&act=nilai" method="POST" name="frmK1">

								<input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">
								<div class="alert alert-info alert-block fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="icon-remove"></i>
									</button>
									<p style="font-size:15px">Hadir dan Melayani</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru mendisiplinkan peserta didik sesuai dengan prinsip Alkitab</label>
									<div class="col-sm-2">
										<select type="text" name="ny1" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Guru menuntun, membimbing, dan mengarahkan peserta didik kepada kebenaran</label>
									<div class="col-sm-2">
										<select type="text" name="ny2" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Guru bertanggung jawab, membina, dan memajukan kehidupan rohani peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="ny3" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Guru melayani peserta didik tanpa diskriminasi</label>
									<div class="col-sm-2">
										<select type="text" name="ny4" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Guru memberikan kesempatan kedua bagi peserta didik jika gagal berperilaku tidak hanya sekedar memberikan hukuman</label>
									<div class="col-sm-2">
										<select type="text" name="ny5" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">6. Guru membangun ingatan peserta didik dengan kata-kata yang baik melalui ayat Alkitab </label>
									<div class="col-sm-2">
										<select type="text" name="ny6" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">7. Guru memberikan pengajaran dengan kasih dan tegas</label>
									<div class="col-sm-2">
										<select type="text" name="ny7" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">8. Guru menunjukkan kepribadian yang mantap dan stabil, dewasa, arif, berwibawa, berbudi luhur serta layak dijadikan teladan dapat memberikan pelajaran bagi siswa</label>
									<div class="col-sm-2">
										<select type="text" name="ny8" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">9. Guru menjelaskan pentingnya menyampaikan kebenaran tentang Firman Tuhan</label>
									<div class="col-sm-2">
										<select type="text" name="ny9" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">10. Guru menjadi orang tua yang mereka segani </label>
									<div class="col-sm-2">
										<select type="text" name="ny10" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="alert alert-info alert-block fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="icon-remove"></i>
									</button>
									<p style="font-size:15px">Memimpin</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru mengawali pelajaran dengan berdoa dan renungan</label>
									<div class="col-sm-2">
										<select type="text" name="ny11" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Guru mengajak peserta didik untuk memuji Tuhan di awal pelajaran</label>
									<div class="col-sm-2">
										<select type="text" name="ny12" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Guru mengakhiri pelajaran dengan berdoa</label>
									<div class="col-sm-2">
										<select type="text" name="ny13" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Guru memberikan kesempatan kepada peserta didik untuk memimpin doa dan renungan</label>
									<div class="col-sm-2">
										<select type="text" name="ny14" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Guru memberi kesempatan kepada peserta didik untuk memimpin pujian di awal pelajaran</label>
									<div class="col-sm-2">
										<select type="text" name="ny15" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="alert alert-info alert-block fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="icon-remove"></i>
									</button>
									<p style="font-size:15px">Kepedulian</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru memberikan pengajaran dengan kasih</label>
									<div class="col-sm-2">
										<select type="text" name="ny16" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Guru menerapkan disiplin kepada peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="ny17" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Guru melakukan <i>home visit</i> ketika ada peserta didik yang bermasalah</label>
									<div class="col-sm-2">
										<select type="text" name="ny18" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Guru membicarakan perilaku baik dan buruk dengan peserta didik beserta dengan konsekuensinya</label>
									<div class="col-sm-2">
										<select type="text" name="ny19" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Guru memberikan pujian dan dukungan kepada peserta didik yang mampu menjawab pertanyaan, bercerita, dan berperilaku baik</label>
									<div class="col-sm-2">
										<select type="text" name="ny20" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">6. Guru memberikan <i>reward</i> kepada peserta didik atas prestasi atau setelah melakukan hal yang baik dan benar</label>
									<div class="col-sm-2">
										<select type="text" name="ny21" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">7. Guru memperkenalkan hal yang baik dan buruk melalui percakapan</label>
									<div class="col-sm-2">
										<select type="text" name="ny22" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="alert alert-info alert-block fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="icon-remove"></i>
									</button>
									<p style="font-size:15px">Mengenal Peserta Didik</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru memahami pribadi masing-masing peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="ny23" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Guru mengenal karakteristik peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="ny24" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Guru mengajak berdiskusi mengenai konsep-konsep watak</label>
									<div class="col-sm-2">
										<select type="text" name="ny25" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Guru mampu mengajarkan peserta didik dalam membentuk kepribadian mereka sama seperti Kristus melalui keterampilan dan seni</label>
									<div class="col-sm-2">
										<select type="text" name="ny26" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Guru memperlengkapi peserta didik dengan berbagai kebutuhan agar bertumbuh di dalam Yesus Kristus</label>
									<div class="col-sm-2">
										<select type="text" name="ny27" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">6. Guru mampu menjadi pelatih sebab pendidikan dan pembelajaran memerlukan latihan dan keterampilan baik intelektual maupun motorik</label>
									<div class="col-sm-2">
										<select type="text" name="ny28" class="form-control" required>
											<option value=""></option>
											<option value="0">tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">7. Guru dapat menjadi teman dan sahabat siswa</label>
									<div class="col-sm-2">
										<select type="text" name="ny29" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">8. Guru memiliki komunikasi yang baik dengan siswa</label>
									<div class="col-sm-2">
										<select type="text" name="ny30" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">9. Guru memahami kebutuhan atau keperluan peserta didik dalam proses belajar melalui fasilitator pendidik.</label>
									<div class="col-sm-2">
										<select type="text" name="ny31" class="form-control" required>
											<option value=""></option>
											<option value=1>tidak pernah</option>
											<option value=2>kadang-kadang</option>
											<option value=3>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<hr />
								<div class="form-group">
									<div class="col-sm-2 pull-right">
										<button type="submit" class="btn btn-primary"> Simpan</button>
										<a style="margin-left:10px;width:80px" href="?module=pelayan" class="btn btn-white"> Batal</a>
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
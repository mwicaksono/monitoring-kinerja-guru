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
								<p style="font-size:15px">Kompetensi 8 : Bertindak sesuai dengan norma agama, hukum, sosial, dan kebudayaan nasional Indonesia.</p>
							</div>
							<div class="adv-table">
								<table class="display table table-striped table-bordered table-hover" id="example">
									<thead>
										<tr>
											<th rowspan="2">No</th>
											<th rowspan="2">Periode</th>
											<th rowspan="2">Guru Dinilai</th>
											<th colspan="5">Indikator Penilaian</th>
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
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$sql = $db->database_prepare("SELECT a.id_nilai,a.periode_nilai,a.guru_dinilai,a.guru_penilai,a.angka_kredit,
                                                          b.id_periode,b.periode,
                                                          c.nip,c.nama_guru,c.gelar,
                                                          d.id_kepribadian1,d.nk1_indikator1,d.nk1_indikator2,d.nk1_indikator3,d.nk1_indikator4,d.nk1_indikator5,d.nk1_total_skor,d.nk1_persentase,d.nk1_nilai_kompetensi
                                                          FROM tbl_penilaian AS a
                                                          JOIN tbl_periode AS b
                                                          JOIN tbl_guru AS c
                                                          JOIN kepribadian1 AS d
                                                          ON a.periode_nilai=b.id_periode 
                                                          AND a.guru_dinilai=c.nip
                                                          AND a.id_nilai=d.id_kepribadian1
                                                          WHERE a.guru_penilai='$_SESSION[nip]'
                                                          ORDER BY a.id_nilai DESC")->execute();
										while ($data = $db->database_fetch_array($sql)) {
											echo "
                                <tr class='gradeX'>
                                    <td width='50' class='center'>$no</td>
                                    <td width='80' class='center'>$data[periode]</td>
                                    <td width='200'>$data[nama_guru], $data[gelar] ($data[guru_dinilai])</td>
                                    <td width='60' class='center'>$data[nk1_indikator1]</td>
                                    <td width='60' class='center'>$data[nk1_indikator2]</td>
                                    <td width='60' class='center'>$data[nk1_indikator3]</td>
                                    <td width='60' class='center'>$data[nk1_indikator4]</td>
                                    <td width='60' class='center'>$data[nk1_indikator5]</td>
                                    <td class='center'>$data[nk1_total_skor]</td>
                                    <td class='center'>$data[nk1_persentase] %</td>
                                    <td class='center'>$data[nk1_nilai_kompetensi]</td>";

											if ($data['nk1_nilai_kompetensi'] == '0' && $data['angka_kredit'] == '') {
												echo "
                                    <td width='100' class='center'>
                                        <a title='Penilaian' href='?module=k1&act=nilai&id=$data[id_nilai]'>
                                            <button class='btn btn-primary btn-xs'><i class='icon-edit'></i> Nilai</button>
                                        </a> 
                                    </td>";
											} elseif ($data['nk1_nilai_kompetensi'] != '0' && $data['angka_kredit'] == '') {
												echo "
                                    <td width='100' class='center'>
                                        <a title='Ubah' href='?module=k1&act=edit&id=$data[id_nilai]'>
                                            <button class='btn btn-primary btn-xs'><i class='icon-pencil'></i> Ubah</button>
                                        </a> 
                                    </td>";
											} elseif ($data['nk1_nilai_kompetensi'] != '0' && $data['angka_kredit'] != '') {
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
							Kompetensi 8 : Bertindak sesuai dengan norma agama, hukum, sosial, dan kebudayaan nasional Indonesia
						</header>
						<div class="panel-body">
							<form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_k1.php?mod=k1&act=nilai" method="POST" name="frmK1">

								<input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

								<div class="alert alert-info alert-block fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="icon-remove"></i>
									</button>
									<p style="font-size:15px">Selama Pengamatan.</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru memahami kode etik guru dan prinsip-prinsip atau nilai-nilai Pancasila</label>
									<div class="col-sm-2">
										<select type="text" name="ak1" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="sedikit">sedikit</option>
											<option value="memadai">memadai</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Guru mampu mengembangkan kerjasama dan membina kebersamaan dengan teman sejawat tanpa memperhatikan perbedaan yang ada (misalnya: suku, agama, dan gender)</label>
									<div class="col-sm-2">
										<select type="text" name="ak2" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Guru menghormati dan menghargai teman sejawat sesuai dengan kondisi dan keberadaan masing-masing</label>
									<div class="col-sm-2">
										<select type="text" name="ak3" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="kadang-kadang">kadang-kadang</option>
											<option value="selalu">selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Guru memiliki rasa persatuan dan kesatuan (nasionalisme)</label>
									<div class="col-sm-2">
										<select type="text" name="ak4" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Guru mempunyai pandangan yang luas tentang keberagaman bangsa Indonesia( misalnya:budaya, suku, agama)</label>
									<div class="col-sm-2">
										<select type="text" name="ak5" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="sedikit">sedikit</option>
											<option value="memadai">memadai</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Sikap dan perilaku guru dalam bertindak sesuai dengan norma agama, hukum, sosial, dan kebudayaan nasional Indonesia perlu</label>
									<div class="col-sm-2">
										<select type="text" name="ak6" class="form-control">
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
									<label class="col-sm-10 col-sm-10 control-label">1. Guru memiliki pandangan yang luas tentang keragaman suku, budaya, dan agama dengan dilandasi perinsip- perinsip Pancasila sebagai sebagai ideologi Bangsa Indonesia dengan semboyan Bhineka Tunggal Ika</label>
									<div class="col-sm-2">
										<select type="text" name="ak7" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Dalam kehidupan sehari-hari baik di sekolah maupun di masyarakat menunjukan sikap saling menghormati, solidaritas, dan bekerja sama</label>
									<div class="col-sm-2">
										<select type="text" name="ak8" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
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
									<label class="col-sm-10 col-sm-10 control-label">1. Guru menghargai dan mempromosikan prinsip-prinsip Pancasila sebagai ideologi dan etika bagi semua warga Indonesia.</label>
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
									<label class="col-sm-10 col-sm-10 control-label">2. Guru mengembangkan kerjasama dan membina kebersamaan dengan teman sejawat tanpa memperhatikan perbedaan yang ada (misalnya:suku,agama, dan gender)</label>
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
									<label class="col-sm-10 col-sm-10 control-label">3. Guru saling menghormati dan menghargai teman sejawat sesuai dengan kondisi dan keberadaan masing-masing</label>
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
									<label class="col-sm-10 col-sm-10 control-label">4. Guru memiliki rasa persatuan dan kesatuan sebagai bangsa Indonesia</label>
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
									<label class="col-sm-10 col-sm-10 control-label">5. Guru mempunyai pandangan yang luas tentang keberagaman bangsa Indonesia (misalnya: budaya, suku, agama)</label>
									<div class="col-sm-2">
										<select type="text" name="nk5" class="form-control">
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
										<a style="margin-left:10px;width:80px" href="?module=k1" class="btn btn-white"> Batal</a>
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
                                                            d.id_kepribadian1,d.ak1_point1,d.ak1_point2,d.ak1_point3,d.ak1_point4,d.ak1_point5,d.ak1_point6,d.ak1_point7,d.ak1_point8,d.nk1_indikator1,d.nk1_indikator2,d.nk1_indikator3,d.nk1_indikator4,d.nk1_indikator5,d.nk1_total_skor,d.nk1_persentase,d.nk1_nilai_kompetensi
                                                            FROM tbl_penilaian AS a
                                                            JOIN tbl_periode AS b
                                                            JOIN tbl_guru AS c
                                                            JOIN kepribadian1 AS d
                                                            ON a.periode_nilai=b.id_periode 
                                                            AND a.guru_dinilai=c.nip
                                                            AND a.id_nilai=d.id_kepribadian1
                                                            WHERE d.id_kepribadian1=?")->execute($_GET["id"]));

			if ($data['nk1_indikator1'] == '0') {
				$nk1_indikator1 = 'Tidak terpenuhi';
			} elseif ($data['nk1_indikator1'] == '1') {
				$nk1_indikator1 = 'Terpenuhi sebagian';
			} elseif ($data['nk1_indikator1'] == '2') {
				$nk1_indikator1 = 'Seluruhnya terpenuhi';
			}

			if ($data['nk1_indikator2'] == '0') {
				$nk1_indikator2 = 'Tidak terpenuhi';
			} elseif ($data['nk1_indikator2'] == '1') {
				$nk1_indikator2 = 'Terpenuhi sebagian';
			} elseif ($data['nk1_indikator2'] == '2') {
				$nk1_indikator2 = 'Seluruhnya terpenuhi';
			}

			if ($data['nk1_indikator3'] == '0') {
				$nk1_indikator3 = 'Tidak terpenuhi';
			} elseif ($data['nk1_indikator3'] == '1') {
				$nk1_indikator3 = 'Terpenuhi sebagian';
			} elseif ($data['nk1_indikator3'] == '2') {
				$nk1_indikator3 = 'Seluruhnya terpenuhi';
			}

			if ($data['nk1_indikator4'] == '0') {
				$nk1_indikator4 = 'Tidak terpenuhi';
			} elseif ($data['nk1_indikator4'] == '1') {
				$nk1_indikator4 = 'Terpenuhi sebagian';
			} elseif ($data['nk1_indikator4'] == '2') {
				$nk1_indikator4 = 'Seluruhnya terpenuhi';
			}

			if ($data['nk1_indikator5'] == '0') {
				$nk1_indikator5 = 'Tidak terpenuhi';
			} elseif ($data['nk1_indikator5'] == '1') {
				$nk1_indikator5 = 'Terpenuhi sebagian';
			} elseif ($data['nk1_indikator5'] == '2') {
				$nk1_indikator5 = 'Seluruhnya terpenuhi';
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
							Kompetensi 8 : Bertindak sesuai dengan norma agama, hukum, sosial, dan kebudayaan nasional Indonesia
						</header>
						<div class="panel-body">
							<form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_k1.php?mod=k1&act=nilai" method="POST" name="frmK1">

								<input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

								<div class="alert alert-info alert-block fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="icon-remove"></i>
									</button>
									<p style="font-size:15px">Selama Pengamatan.</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru memahami kode etik guru dan prinsip-prinsip atau nilai-nilai Pancasila</label>
									<div class="col-sm-2">
										<select type="text" name="ak1" class="form-control">
											<option value="<?php echo $data['ak1_point1']; ?>"><?php echo $data['ak1_point1']; ?></option>
											<option value="tidak">tidak</option>
											<option value="sedikit">sedikit</option>
											<option value="memadai">memadai</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Guru mampu mengembangkan kerjasama dan membina kebersamaan dengan teman sejawat tanpa memperhatikan perbedaan yang ada (misalnya: suku, agama, dan gender)</label>
									<div class="col-sm-2">
										<select type="text" name="ak2" class="form-control">
											<option value="<?php echo $data['ak1_point2']; ?>"><?php echo $data['ak1_point2']; ?></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Guru menghormati dan menghargai teman sejawat sesuai dengan kondisi dan keberadaan masing-masing</label>
									<div class="col-sm-2">
										<select type="text" name="ak3" class="form-control">
											<option value="<?php echo $data['ak1_point3']; ?>"><?php echo $data['ak1_point3']; ?></option>
											<option value="kurang">kurang</option>
											<option value="kadang-kadang">kadang-kadang</option>
											<option value="selalu">selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Guru memiliki rasa persatuan dan kesatuan (nasionalisme)</label>
									<div class="col-sm-2">
										<select type="text" name="ak4" class="form-control">
											<option value="<?php echo $data['ak1_point4']; ?>"><?php echo $data['ak1_point4']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Guru mempunyai pandangan yang luas tentang keberagaman bangsa Indonesia( misalnya:budaya, suku, agama)</label>
									<div class="col-sm-2">
										<select type="text" name="ak5" class="form-control">
											<option value="<?php echo $data['ak1_point5']; ?>"><?php echo $data['ak1_point5']; ?></option>
											<option value="tidak">tidak</option>
											<option value="sedikit">sedikit</option>
											<option value="memadai">memadai</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Sikap dan perilaku guru dalam bertindak sesuai dengan norma agama, hukum, sosial, dan kebudayaan nasional Indonesia perlu</label>
									<div class="col-sm-2">
										<select type="text" name="ak6" class="form-control">
											<option value="<?php echo $data['ak1_point6']; ?>"><?php echo $data['ak1_point6']; ?></option>
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
									<label class="col-sm-10 col-sm-10 control-label">1. Guru memiliki pandangan yang luas tentang keragaman suku, budaya, dan agama dengan dilandasi perinsip- perinsip Pancasila sebagai sebagai ideologi Bangsa Indonesia dengan semboyan Bhineka Tunggal Ika</label>
									<div class="col-sm-2">
										<select type="text" name="ak7" class="form-control">
											<option value="<?php echo $data['ak1_point7']; ?>"><?php echo $data['ak1_point7']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Dalam kehidupan sehari-hari baik di sekolah maupun di masyarakat menunjukan sikap saling menghormati, solidaritas, dan bekerja sama</label>
									<div class="col-sm-2">
										<select type="text" name="ak8" class="form-control">
											<option value="<?php echo $data['ak1_point8']; ?>"><?php echo $data['ak1_point8']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
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
									<label class="col-sm-10 col-sm-10 control-label">1. Guru menghargai dan mempromosikan prinsip-prinsip Pancasila sebagai ideologi dan etika bagi semua warga Indonesia.</label>
									<div class="col-sm-2">
										<select type="text" name="nk1" class="form-control">
											<option value="<?php echo $data['nk1_indikator1']; ?>"><?php echo $nk1_indikator1; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Guru mengembangkan kerjasama dan membina kebersamaan dengan teman sejawat tanpa memperhatikan perbedaan yang ada (misalnya:suku,agama, dan gender)</label>
									<div class="col-sm-2">
										<select type="text" name="nk2" class="form-control">
											<option value="<?php echo $data['nk1_indikator2']; ?>"><?php echo $nk1_indikator2; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Guru saling menghormati dan menghargai teman sejawat sesuai dengan kondisi dan keberadaan masing-masing</label>
									<div class="col-sm-2">
										<select type="text" name="nk3" class="form-control">
											<option value="<?php echo $data['nk1_indikator3']; ?>"><?php echo $nk1_indikator3; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Guru memiliki rasa persatuan dan kesatuan sebagai bangsa Indonesia</label>
									<div class="col-sm-2">
										<select type="text" name="nk4" class="form-control">
											<option value="<?php echo $data['nk1_indikator4']; ?>"><?php echo $nk1_indikator4; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Guru mempunyai pandangan yang luas tentang keberagaman bangsa Indonesia (misalnya: budaya, suku, agama)</label>
									<div class="col-sm-2">
										<select type="text" name="nk5" class="form-control">
											<option value="<?php echo $data['nk1_indikator5']; ?>"><?php echo $nk1_indikator5; ?></option>
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
										<a style="margin-left:10px;width:80px" href="?module=k1" class="btn btn-white"> Batal</a>
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
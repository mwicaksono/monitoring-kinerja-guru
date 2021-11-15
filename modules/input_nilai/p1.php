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
							<i style="margin-right:7px" class="icon-edit"></i> Pedagogik
						</header>
						<div class="panel-body">
							<div class="alert alert-info alert-block fade in">
								<button data-dismiss="alert" class="close close-sm" type="button">
									<i class="icon-remove"></i>
								</button>
								<p style="font-size:15px">Kompetensi 1 : Menguasai karakteristik peserta didik.</p>
							</div>
							<div class="adv-table">
								<table class="display table table-striped table-bordered table-hover" id="example">
									<thead>
										<tr>
											<th rowspan="2">No</th>
											<th rowspan="2">Periode</th>
											<th rowspan="2">Guru Dinilai</th>
											<th colspan="6">Indikator Penilaian</th>
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

										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$sql = $db->database_prepare("SELECT a.id_nilai,a.periode_nilai,a.guru_dinilai,a.guru_penilai,a.angka_kredit,
                                                          b.id_periode,b.periode,
                                                          c.nip,c.nama_guru,c.gelar,
                                                          d.id_pedagogik1,d.np1_indikator1,d.np1_indikator2,d.np1_indikator3,d.np1_indikator4,d.np1_indikator5,d.np1_indikator6,d.np1_total_skor,d.np1_persentase,d.np1_nilai_kompetensi
                                                          FROM tbl_penilaian AS a
                                                          JOIN tbl_periode AS b
                                                          JOIN tbl_guru AS c
                                                          JOIN pedagogik1 AS d
                                                          ON a.periode_nilai=b.id_periode 
                                                          AND a.guru_dinilai=c.nip
                                                          AND a.id_nilai=d.id_pedagogik1
                                                          WHERE a.guru_penilai='$_SESSION[nip]'
                                                          ORDER BY a.id_nilai DESC")->execute();
										while ($data = $db->database_fetch_array($sql)) {
											echo "
								<tr class='gradeX'>
									<td width='50' class='center'>$no</td>
									<td width='80' class='center'>$data[periode]</td>
                                    <td width='200'>$data[nama_guru], $data[gelar] ($data[guru_dinilai])</td>
                                    <td width='50' class='center'>$data[np1_indikator1]</td>
                                    <td width='50' class='center'>$data[np1_indikator2]</td>
                                    <td width='50' class='center'>$data[np1_indikator3]</td>
                                    <td width='50' class='center'>$data[np1_indikator4]</td>
                                    <td width='50' class='center'>$data[np1_indikator5]</td>
                                    <td width='50' class='center'>$data[np1_indikator6]</td>
                                    <td class='center'>$data[np1_total_skor]</td>
                                    <td class='center'>$data[np1_persentase] %</td>
                                    <td class='center'>$data[np1_nilai_kompetensi]</td>";

											if ($data['np1_nilai_kompetensi'] == '0' && $data['angka_kredit'] == '') {
												echo "
                                    <td width='100' class='center'>
                                        <a title='Penilaian' href='?module=p1&act=nilai&id=$data[id_nilai]'>
                                            <button class='btn btn-primary btn-xs'><i class='icon-edit'></i> Nilai</button>
                                        </a> 
                                    </td>";
											} elseif ($data['np1_nilai_kompetensi'] != '0' && $data['angka_kredit'] == '') {
												echo "
                                    <td width='100' class='center'>
                                        <a title='Ubah' href='?module=p1&act=edit&id=$data[id_nilai]'>
                                            <button class='btn btn-primary btn-xs'><i class='icon-pencil'></i> Ubah</button>
                                        </a> 
                                    </td>";
											} elseif ($data['np1_nilai_kompetensi'] != '0' && $data['angka_kredit'] != '') {
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
							Kompetensi 1 : Mengenal karakteristik peserta didik
						</header>
						<div class="panel-body">
							<form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_p1.php?mod=p1&act=nilai" method="POST" name="frmP1">

								<input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

								<div class="alert alert-info alert-block fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="icon-remove"></i>
									</button>
									<p style="font-size:15px">Sebelum Pengamatan.</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru memiliki absensi siswa lengkap</label>
									<div class="col-sm-2">
										<select type="text" name="ap1" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Guru memiliki pemetaan kelas lengkap</label>
									<div class="col-sm-2">
										<select type="text" name="ap2" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Guru memiliki catatan siswa yang lemah, ataupun yang berkebutuhan khusus dengan lengkap</label>
									<div class="col-sm-2">
										<select type="text" name="ap3" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Guru memiliki catatan siswa yang berprestasi dengan lengkap</label>
									<div class="col-sm-2">
										<select type="text" name="ap4" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Perencanaan Mengenal Karakteristik peserta didik dalam KBM</label>
									<div style="margin-bottom: 10px" class="col-sm-2">
										<select type="text" name="ap5" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>

									<label class="col-sm-10 col-sm-10 control-label">sesuai dengan kurikulum karenanya dapat</label>
									<div class="col-sm-2">
										<select type="text" name="ap6" class="form-control">
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
									<p style="font-size:15px">Selama Pengamatan.</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru menerapkan metode pembelajaran mampu membantu siswa aktif dalam KBM</label>
									<div class="col-sm-2">
										<select type="text" name="ap7" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="sebagian kecil">sebagian kecil</option>
											<option value="sebagian besar">sebagian besar</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Guru memotivasi siswa</label>
									<div class="col-sm-2">
										<select type="text" name="ap8" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="sedikit">sedikit</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Pengaturan tempat duduk memperhatikan kondisi siswa</label>
									<div class="col-sm-2">
										<select type="text" name="ap9" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="sedikit">sedikit</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Konsentrasi siswa dalam KBM</label>
									<div class="col-sm-2">
										<select type="text" name="ap10" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="baik">baik</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Guru memfasilitasi siswa</label>
									<div class="col-sm-2">
										<select type="text" name="ap11" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="baik">baik</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">6. Guru memberi pelayanan kepada siswa yang kurang, lemah atau berkebutuhan khusus</label>
									<div class="col-sm-2">
										<select type="text" name="ap12" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="baik">baik</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Pelaksanaan Mengenal Karakteristik peserta didik dalam KBM</label>
									<div style="margin-bottom: 10px" class="col-sm-2">
										<select type="text" name="ap13" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>

									<label class="col-sm-10 col-sm-10 control-label">sesuai dengan kurikulum karenanya dapat</label>
									<div class="col-sm-2">
										<select type="text" name="ap14" class="form-control">
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
									<p style="font-size:15px">Setelah Pengamatan.</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Kelangsungan kegiatan pembelajaran dengan memperhatikan kekurangan atau kelebihan siswa yang mampu mengembangkan kompetensi siswa</label>
									<div class="col-sm-2">
										<select type="text" name="ap15" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Penilai menyarankan bahwa dalam mengenal karakteristik peserta didik untuk KBM selanjutnya</label>
									<div class="col-sm-2">
										<select type="text" name="ap16" class="form-control">
											<option value=""></option>
											<option value="dilakukan">dilakukan</option>
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
									<label class="col-sm-10 col-sm-10 control-label">Pemantauan tentang kemajuan siswa terekam dalam dokumentasi</label>
									<div class="col-sm-2">
										<select type="text" name="ap17" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="sebagian kecil">sebagian kecil</option>
											<option value="sebagian besar">sebagian besar</option>
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
									<label class="col-sm-10 col-sm-10 control-label">1. Guru dapat mengidentifikasi karakteristik belajar setiap peserta didik dikelasnya.</label>
									<div class="col-sm-2">
										<select type="text" name="np1" class="form-control">
											<option value=""></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Guru memastikan bahwa semua peserta didik mendapatkan kesempatan yang sama untuk berpartisipasi aktif dalam kegiatan pembelajaran</label>
									<div class="col-sm-2">
										<select type="text" name="np2" class="form-control">
											<option value=""></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Guru dapat mengatur kelas untuk memberikan kesempatan belajar yang sama pada semua peserta didik dengan kelainan fisik dan kemampuan belajar yang berbeda.</label>
									<div class="col-sm-2">
										<select type="text" name="np3" class="form-control">
											<option value=""></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Guru mencoba mengetahui penyebab penyimpangan perilaku peserta didik untuk mencegah agar perilaku tersebut tidak merugikan peserta didik lainnya.</label>
									<div class="col-sm-2">
										<select type="text" name="np4" class="form-control">
											<option value=""></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Guru membantu mengembangkan potensi dan mengatasi kekurangan peserta didik.</label>
									<div class="col-sm-2">
										<select type="text" name="np5" class="form-control">
											<option value=""></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">6. Guru memperhatikan peserta didik dengan kelemahan fisik tertentu agar dapat mengikuti aktivitas pembelajaran, sehingga peserta didik tersebut tidak termarjinalkan (tersisihkan, diolok-olok, minder, dsb).</label>
									<div class="col-sm-2">
										<select type="text" name="np6" class="form-control">
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
										<a style="margin-left:10px;width:80px" href="?module=p1" class="btn btn-white"> Batal</a>
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
                                                            d.id_pedagogik1,d.ap1_point1,d.ap1_point2,d.ap1_point3,d.ap1_point4,d.ap1_point5,d.ap1_point6,d.ap1_point7,d.ap1_point8,d.ap1_point9,d.ap1_point10,d.ap1_point11,d.ap1_point12,d.ap1_point13,d.ap1_point14,d.ap1_point15,d.ap1_point16,d.ap1_point17,d.np1_indikator1,d.np1_indikator2,d.np1_indikator3,d.np1_indikator4,d.np1_indikator5,d.np1_indikator6,d.np1_total_skor,d.np1_persentase,d.np1_nilai_kompetensi
                                                            FROM tbl_penilaian AS a
                                                            JOIN tbl_periode AS b
                                                            JOIN tbl_guru AS c
                                                            JOIN pedagogik1 AS d
                                                            ON a.periode_nilai=b.id_periode 
                                                            AND a.guru_dinilai=c.nip
                                                            AND a.id_nilai=d.id_pedagogik1
                                                            WHERE d.id_pedagogik1=?")->execute($_GET["id"]));

			if ($data['np1_indikator1'] == '0') {
				$np1_indikator1 = 'Tidak terpenuhi';
			} elseif ($data['np1_indikator1'] == '1') {
				$np1_indikator1 = 'Terpenuhi sebagian';
			} elseif ($data['np1_indikator1'] == '2') {
				$np1_indikator1 = 'Seluruhnya terpenuhi';
			}

			if ($data['np1_indikator2'] == '0') {
				$np1_indikator2 = 'Tidak terpenuhi';
			} elseif ($data['np1_indikator2'] == '1') {
				$np1_indikator2 = 'Terpenuhi sebagian';
			} elseif ($data['np1_indikator2'] == '2') {
				$np1_indikator2 = 'Seluruhnya terpenuhi';
			}

			if ($data['np1_indikator3'] == '0') {
				$np1_indikator3 = 'Tidak terpenuhi';
			} elseif ($data['np1_indikator3'] == '1') {
				$np1_indikator3 = 'Terpenuhi sebagian';
			} elseif ($data['np1_indikator3'] == '2') {
				$np1_indikator3 = 'Seluruhnya terpenuhi';
			}

			if ($data['np1_indikator4'] == '0') {
				$np1_indikator4 = 'Tidak terpenuhi';
			} elseif ($data['np1_indikator4'] == '1') {
				$np1_indikator4 = 'Terpenuhi sebagian';
			} elseif ($data['np1_indikator4'] == '2') {
				$np1_indikator4 = 'Seluruhnya terpenuhi';
			}

			if ($data['np1_indikator5'] == '0') {
				$np1_indikator5 = 'Tidak terpenuhi';
			} elseif ($data['np1_indikator5'] == '1') {
				$np1_indikator5 = 'Terpenuhi sebagian';
			} elseif ($data['np1_indikator5'] == '2') {
				$np1_indikator5 = 'Seluruhnya terpenuhi';
			}

			if ($data['np1_indikator6'] == '0') {
				$np1_indikator6 = 'Tidak terpenuhi';
			} elseif ($data['np1_indikator6'] == '1') {
				$np1_indikator6 = 'Terpenuhi sebagian';
			} elseif ($data['np1_indikator6'] == '2') {
				$np1_indikator6 = 'Seluruhnya terpenuhi';
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
							Kompetensi 1 : Mengenal karakteristik peserta didik
						</header>
						<div class="panel-body">
							<form class="form-horizontal" action="modules/input_nilai/aksi_p1.php?mod=p1&act=nilai" method="POST" name="frmP1">

								<input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

								<div class="alert alert-info alert-block fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="icon-remove"></i>
									</button>
									<p style="font-size:15px">Sebelum Pengamatan.</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru memiliki absensi siswa lengkap</label>
									<div class="col-sm-2">
										<select type="text" name="ap1" class="form-control">
											<option value="<?php echo $data['ap1_point1']; ?>"><?php echo $data['ap1_point1']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Guru memiliki pemetaan kelas lengkap</label>
									<div class="col-sm-2">
										<select type="text" name="ap2" class="form-control">
											<option value="<?php echo $data['ap1_point2']; ?>"><?php echo $data['ap1_point2']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Guru memiliki catatan siswa yang lemah, ataupun yang berkebutuhan khusus dengan lengkap</label>
									<div class="col-sm-2">
										<select type="text" name="ap3" class="form-control">
											<option value="<?php echo $data['ap1_point3']; ?>"><?php echo $data['ap1_point3']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Guru memiliki catatan siswa yang berprestasi dengan lengkap</label>
									<div class="col-sm-2">
										<select type="text" name="ap4" class="form-control">
											<option value="<?php echo $data['ap1_point4']; ?>"><?php echo $data['ap1_point4']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Perencanaan Mengenal Karakteristik peserta didik dalam KBM</label>
									<div style="margin-bottom: 10px" class="col-sm-2">
										<select type="text" name="ap5" class="form-control">
											<option value="<?php echo $data['ap1_point5']; ?>"><?php echo $data['ap1_point5']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>

									<label class="col-sm-10 col-sm-10 control-label">sesuai dengan kurikulum karenanya dapat</label>
									<div class="col-sm-2">
										<select type="text" name="ap6" class="form-control">
											<option value="<?php echo $data['ap1_point6']; ?>"><?php echo $data['ap1_point6']; ?></option>
											<option value="ditingkatkan">ditingkatkan</option>
											<option value="dikembangkan">dikembangkan</option>
										</select>
									</div>
								</div>

								<div class="alert alert-info alert-block fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="icon-remove"></i>
									</button>
									<p style="font-size:15px">Selama Pengamatan.</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru menerapkan metode pembelajaran mampu membantu siswa aktif dalam KBM</label>
									<div class="col-sm-2">
										<select type="text" name="ap7" class="form-control">
											<option value="<?php echo $data['ap1_point7']; ?>"><?php echo $data['ap1_point7']; ?></option>
											<option value="tidak">tidak</option>
											<option value="sebagian kecil">sebagian kecil</option>
											<option value="sebagian besar">sebagian besar</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Guru memotivasi siswa</label>
									<div class="col-sm-2">
										<select type="text" name="ap8" class="form-control">
											<option value="<?php echo $data['ap1_point8']; ?>"><?php echo $data['ap1_point8']; ?></option>
											<option value="tidak">tidak</option>
											<option value="sedikit">sedikit</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Pengaturan tempat duduk memperhatikan kondisi siswa</label>
									<div class="col-sm-2">
										<select type="text" name="ap9" class="form-control">
											<option value="<?php echo $data['ap1_point9']; ?>"><?php echo $data['ap1_point9']; ?></option>
											<option value="tidak">tidak</option>
											<option value="sedikit">sedikit</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Konsentrasi siswa dalam KBM</label>
									<div class="col-sm-2">
										<select type="text" name="ap10" class="form-control">
											<option value="<?php echo $data['ap1_point10']; ?>"><?php echo $data['ap1_point10']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="baik">baik</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Guru memfasilitasi siswa</label>
									<div class="col-sm-2">
										<select type="text" name="ap11" class="form-control">
											<option value="<?php echo $data['ap1_point11']; ?>"><?php echo $data['ap1_point11']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="baik">baik</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">6. Guru memberi pelayanan kepada siswa yang kurang, lemah atau berkebutuhan khusus</label>
									<div class="col-sm-2">
										<select type="text" name="ap12" class="form-control">
											<option value="<?php echo $data['ap1_point12']; ?>"><?php echo $data['ap1_point12']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="baik">baik</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Pelaksanaan Mengenal Karakteristik peserta didik dalam KBM</label>
									<div style="margin-bottom: 10px" class="col-sm-2">
										<select type="text" name="ap13" class="form-control">
											<option value="<?php echo $data['ap1_point13']; ?>"><?php echo $data['ap1_point13']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>

									<label class="col-sm-10 col-sm-10 control-label">sesuai dengan kurikulum karenanya dapat</label>
									<div class="col-sm-2">
										<select type="text" name="ap14" class="form-control">
											<option value="<?php echo $data['ap1_point14']; ?>"><?php echo $data['ap1_point14']; ?></option>
											<option value="ditingkatkan">ditingkatkan</option>
											<option value="dikembangkan">dikembangkan</option>
										</select>
									</div>
								</div>

								<div class="alert alert-info alert-block fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="icon-remove"></i>
									</button>
									<p style="font-size:15px">Setelah Pengamatan.</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Kelangsungan kegiatan pembelajaran dengan memperhatikan kekurangan atau kelebihan siswa yang mampu mengembangkan kompetensi siswa</label>
									<div class="col-sm-2">
										<select type="text" name="ap15" class="form-control">
											<option value="<?php echo $data['ap1_point15']; ?>"><?php echo $data['ap1_point15']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Penilai menyarankan bahwa dalam mengenal karakteristik peserta didik untuk KBM selanjutnya</label>
									<div class="col-sm-2">
										<select type="text" name="ap16" class="form-control">
											<option value="<?php echo $data['ap1_point16']; ?>"><?php echo $data['ap1_point16']; ?></option>
											<option value="dilakukan">dilakukan</option>
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
									<label class="col-sm-10 col-sm-10 control-label">Pemantauan tentang kemajuan siswa terekam dalam dokumentasi</label>
									<div class="col-sm-2">
										<select type="text" name="ap17" class="form-control">
											<option value="<?php echo $data['ap1_point17']; ?>"><?php echo $data['ap1_point17']; ?></option>
											<option value="tidak">tidak</option>
											<option value="sebagian kecil">sebagian kecil</option>
											<option value="sebagian besar">sebagian besar</option>
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
									<label class="col-sm-10 col-sm-10 control-label">1. Guru dapat mengidentifikasi karakteristik belajar setiap peserta didik dikelasnya.</label>
									<div class="col-sm-2">
										<select type="text" name="np1" class="form-control">
											<option value="<?php echo $data['np1_indikator1']; ?>"><?php echo $np1_indikator1; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Guru memastikan bahwa semua peserta didik mendapatkan kesempatan yang sama untuk berpartisipasi aktif dalam kegiatan pembelajaran</label>
									<div class="col-sm-2">
										<select type="text" name="np2" class="form-control">
											<option value="<?php echo $data['np1_indikator2']; ?>"><?php echo $np1_indikator2; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Guru dapat mengatur kelas untuk memberikan kesempatan belajar yang sama pada semua peserta didik dengan kelainan fisik dan kemampuan belajar yang berbeda.</label>
									<div class="col-sm-2">
										<select type="text" name="np3" class="form-control">
											<option value="<?php echo $data['np1_indikator3']; ?>"><?php echo $np1_indikator3; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Guru mencoba mengetahui penyebab penyimpangan perilaku peserta didik untuk mencegah agar perilaku tersebut tidak merugikan peserta didik lainnya.</label>
									<div class="col-sm-2">
										<select type="text" name="np4" class="form-control">
											<option value="<?php echo $data['np1_indikator4']; ?>"><?php echo $np1_indikator4; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Guru membantu mengembangkan potensi dan mengatasi kekurangan peserta didik.</label>
									<div class="col-sm-2">
										<select type="text" name="np5" class="form-control">
											<option value="<?php echo $data['np1_indikator5']; ?>"><?php echo $np1_indikator5; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">6. Guru memperhatikan peserta didik dengan kelemahan fisik tertentu agar dapat mengikuti aktivitas pembelajaran, sehingga peserta didik tersebut tidak termarjinalkan (tersisihkan, diolok-olok, minder, dsb).</label>
									<div class="col-sm-2">
										<select type="text" name="np6" class="form-control">
											<option value="<?php echo $data['np1_indikator6']; ?>"><?php echo $np1_indikator6; ?></option>
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
										<a style="margin-left:10px;width:80px" href="?module=p1" class="btn btn-white"> Batal</a>
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
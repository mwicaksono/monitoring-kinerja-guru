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
								<p style="font-size:15px">Kompetensi 2 : Menguasai teori belajar dan prinsip-prinsip pembelajaran yang mendidik.</p>
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
                                                          d.id_pedagogik2,d.np2_indikator1,d.np2_indikator2,d.np2_indikator3,d.np2_indikator4,d.np2_indikator5,d.np2_indikator6,d.np2_total_skor,d.np2_persentase,d.np2_nilai_kompetensi
                                                          FROM tbl_penilaian AS a
                                                          JOIN tbl_periode AS b
                                                          JOIN tbl_guru AS c
                                                          JOIN pedagogik2 AS d
                                                          ON a.periode_nilai=b.id_periode 
                                                          AND a.guru_dinilai=c.nip
                                                          AND a.id_nilai=d.id_pedagogik2
                                                          WHERE a.guru_penilai='$_SESSION[nip]'
                                                          ORDER BY a.id_nilai DESC")->execute();
										while ($data = $db->database_fetch_array($sql)) {
											echo "
                                <tr class='gradeX'>
                                    <td width='50' class='center'>$no</td>
                                    <td width='80' class='center'>$data[periode]</td>
                                    <td width='200'>$data[nama_guru], $data[gelar] ($data[guru_dinilai])</td>
                                    <td width='50' class='center'>$data[np2_indikator1]</td>
                                    <td width='50' class='center'>$data[np2_indikator2]</td>
                                    <td width='50' class='center'>$data[np2_indikator3]</td>
                                    <td width='50' class='center'>$data[np2_indikator4]</td>
                                    <td width='50' class='center'>$data[np2_indikator5]</td>
                                    <td width='50' class='center'>$data[np2_indikator6]</td>
                                    <td class='center'>$data[np2_total_skor]</td>
                                    <td class='center'>$data[np2_persentase] %</td>
                                    <td class='center'>$data[np2_nilai_kompetensi]</td>";

											if ($data['np2_nilai_kompetensi'] == '0' && $data['angka_kredit'] == '') {
												echo "
                                    <td width='100' class='center'>
                                        <a title='Penilaian' href='?module=p2&act=nilai&id=$data[id_nilai]'>
                                            <button class='btn btn-primary btn-xs'><i class='icon-edit'></i> Nilai</button>
                                        </a> 
                                    </td>";
											} elseif ($data['np2_nilai_kompetensi'] != '0' && $data['angka_kredit'] == '') {
												echo "
                                    <td width='100' class='center'>
                                        <a title='Ubah' href='?module=p2&act=edit&id=$data[id_nilai]'>
                                            <button class='btn btn-primary btn-xs'><i class='icon-pencil'></i> Ubah</button>
                                        </a> 
                                    </td>";
											} elseif ($data['np2_nilai_kompetensi'] != '0' && $data['angka_kredit'] != '') {
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
							Kompetensi 2 : Menguasai teori belajar dan prinsip-prinsip pembelajaran yang mendidik
						</header>
						<div class="panel-body">
							<form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_p2.php?mod=p2&act=nilai" method="POST" name="frmP2">

								<input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

								<div class="alert alert-info alert-block fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="icon-remove"></i>
									</button>
									<p style="font-size:15px">Sebelum Pengamatan.</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Materi mampu mengaktifkan siswa dengan lengkap</label>
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
									<label class="col-sm-10 col-sm-10 control-label">2. Materi pembelajaran sesuai dengan kondisi siswa</label>
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
									<label class="col-sm-10 col-sm-10 control-label">3. Kegiatan KBM direncanakan dengan baik yang mampu meningkatkan kompetensi siswa secara maksimal</label>
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
									<label class="col-sm-10 col-sm-10 control-label">4. Teknik pembelajaran direncanakan dengan baik yang mampu meningkatkan kompetensi siswa secara maksimal</label>
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
									<label class="col-sm-10 col-sm-10 control-label">5. Tujuan pembelajaran direncanakan dengan baik yang mampu meningkatkan kompetensi siswa secara maksimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap5" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">6. Kegiatan KBM direncanakan dengan baik yang mampu meningkatkan respon siswa secara maksimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap6" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Perencanaan langkah-langkah dan tahapan KBM sesuai dengan kurikulum</label>
									<div style="margin-bottom: 10px" class="col-sm-2">
										<select type="text" name="ap7" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>

									<label class="col-sm-10 col-sm-10 control-label">karenanya dapat lebih lanjut</label>
									<div class="col-sm-2">
										<select type="text" name="ap8" class="form-control">
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
									<label class="col-sm-10 col-sm-10 control-label">1. Materi yang mampu mengaktifkan siswa demgan lengkap</label>
									<div class="col-sm-2">
										<select type="text" name="ap9" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Materi pembelajaran sesuai dengan kondisi siswa</label>
									<div class="col-sm-2">
										<select type="text" name="ap10" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Kegiatan KBM direncanakan dengan baik yang mampu meningkatkan kompetensi siswa secara maksimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap11" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Teknik pembelajaran direncanakan dengan baik yang mampu meningkatkan kompetensi siswa secara maksimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap12" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Tujuan Pembelajaran direncanakan dengan baik yang mampu meningkatkan kompetensi siswa secara maksimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap13" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">6. Kegiatan KBM direncanakan dengan baik yang mampu meningkatkan respon siswa secara maksimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap14" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Pelaksanaan langkah-langkah dan tahapan KBM sesuai dengan KBM</label>
									<div style="margin-bottom: 10px" class="col-sm-2">
										<select type="text" name="ap15" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sudah</option>
										</select>
									</div>

									<label class="col-sm-10 col-sm-10 control-label">karenanya dapat lebih lanjut</label>
									<div class="col-sm-2">
										<select type="text" name="ap16" class="form-control">
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
									<label class="col-sm-10 col-sm-10 control-label">Tingkat penguasaan teori belajar dan prinsip-prinsip pembelajaran guru tergolong </label>
									<div class="col-sm-2">
										<select type="text" name="ap17" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="baik">baik</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Tingkat penguasaan teori belajar dan prinsip-prinsip pembelajaran guru agar lebih lanjut</label>
									<div class="col-sm-2">
										<select type="text" name="ap18" class="form-control">
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
									<p style="font-size:15px">Penilaian.</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru memberi kesempatan kepada peserta didik untuk menguasai materi pembelajaran sesuai usia dan kemampuan belajarnya melalui pengaturan proses pembelajaran dan aktivitas yang bervariasi</label>
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
									<label class="col-sm-10 col-sm-10 control-label">2. Guru selalu memastikan tingkat pemahaman peserta didik terhadap materi pembelajaran tertentu dan menyesuaikan aktivitas pembelajaran berikutnya berdasarkan tingkat pemahaman tersebut</label>
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
									<label class="col-sm-10 col-sm-10 control-label">3. Guru dapat menjelaskan alasan pelaksanaan kegiatan/aktivitas yang dilakukannya, baik yang sesuai maupun yang berbeda dengan rencana, terkait keberhasilan pembelajaran</label>
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
									<label class="col-sm-10 col-sm-10 control-label">4. Guru menggunakan berbagai teknik untuk memotivasi kemauan belajar peserta didik</label>
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
									<label class="col-sm-10 col-sm-10 control-label">5. Guru merencanakan kegiatan pembelajaran yang saling terkait satu sama lain dengan memperhatikan tujuan pembelajaran maupun proses belajar peserta didik</label>
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
									<label class="col-sm-10 col-sm-10 control-label">6. Guru memperhatikan respon peserta didik yang belum/kurang memahami materi pembelajaran yang diajarkan dan menggunakannya untuk memperbaiki rancangan pembelajaran berikutnya</label>
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
										<a style="margin-left:10px;width:80px" href="?module=p2" class="btn btn-white"> Batal</a>
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
                                                            d.id_pedagogik2,d.ap2_point1,d.ap2_point2,d.ap2_point3,d.ap2_point4,d.ap2_point5,d.ap2_point6,d.ap2_point7,d.ap2_point8,d.ap2_point9,d.ap2_point10,d.ap2_point11,d.ap2_point12,d.ap2_point13,d.ap2_point14,d.ap2_point15,d.ap2_point16,d.ap2_point17,d.ap2_point18,d.np2_indikator1,d.np2_indikator2,d.np2_indikator3,d.np2_indikator4,d.np2_indikator5,d.np2_indikator6,d.np2_total_skor,d.np2_persentase,d.np2_nilai_kompetensi
                                                            FROM tbl_penilaian AS a
                                                            JOIN tbl_periode AS b
                                                            JOIN tbl_guru AS c
                                                            JOIN pedagogik2 AS d
                                                            ON a.periode_nilai=b.id_periode 
                                                            AND a.guru_dinilai=c.nip
                                                            AND a.id_nilai=d.id_pedagogik2
                                                            WHERE d.id_pedagogik2=?")->execute($_GET["id"]));

			if ($data['np2_indikator1'] == '0') {
				$np2_indikator1 = 'Tidak terpenuhi';
			} elseif ($data['np2_indikator1'] == '1') {
				$np2_indikator1 = 'Terpenuhi sebagian';
			} elseif ($data['np2_indikator1'] == '2') {
				$np2_indikator1 = 'Seluruhnya terpenuhi';
			}

			if ($data['np2_indikator2'] == '0') {
				$np2_indikator2 = 'Tidak terpenuhi';
			} elseif ($data['np2_indikator2'] == '1') {
				$np2_indikator2 = 'Terpenuhi sebagian';
			} elseif ($data['np2_indikator2'] == '2') {
				$np2_indikator2 = 'Seluruhnya terpenuhi';
			}

			if ($data['np2_indikator3'] == '0') {
				$np2_indikator3 = 'Tidak terpenuhi';
			} elseif ($data['np2_indikator3'] == '1') {
				$np2_indikator3 = 'Terpenuhi sebagian';
			} elseif ($data['np2_indikator3'] == '2') {
				$np2_indikator3 = 'Seluruhnya terpenuhi';
			}

			if ($data['np2_indikator4'] == '0') {
				$np2_indikator4 = 'Tidak terpenuhi';
			} elseif ($data['np2_indikator4'] == '1') {
				$np2_indikator4 = 'Terpenuhi sebagian';
			} elseif ($data['np2_indikator4'] == '2') {
				$np2_indikator4 = 'Seluruhnya terpenuhi';
			}

			if ($data['np2_indikator5'] == '0') {
				$np2_indikator5 = 'Tidak terpenuhi';
			} elseif ($data['np2_indikator5'] == '1') {
				$np2_indikator5 = 'Terpenuhi sebagian';
			} elseif ($data['np2_indikator5'] == '2') {
				$np2_indikator5 = 'Seluruhnya terpenuhi';
			}

			if ($data['np2_indikator6'] == '0') {
				$np2_indikator6 = 'Tidak terpenuhi';
			} elseif ($data['np2_indikator6'] == '1') {
				$np2_indikator6 = 'Terpenuhi sebagian';
			} elseif ($data['np2_indikator6'] == '2') {
				$np2_indikator6 = 'Seluruhnya terpenuhi';
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
							Kompetensi 2 : Menguasai teori belajar dan prinsip-prinsip pembelajaran yang mendidik
						</header>
						<div class="panel-body">
							<form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_p2.php?mod=p2&act=nilai" method="POST" name="frmP2">

								<input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

								<div class="alert alert-info alert-block fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="icon-remove"></i>
									</button>
									<p style="font-size:15px">Sebelum Pengamatan.</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Materi mampu mengaktifkan siswa dengan lengkap</label>
									<div class="col-sm-2">
										<select type="text" name="ap1" class="form-control">
											<option value="<?php echo $data['ap2_point1']; ?>"><?php echo $data['ap2_point1']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Materi pembelajaran sesuai dengan kondisi siswa</label>
									<div class="col-sm-2">
										<select type="text" name="ap2" class="form-control">
											<option value="<?php echo $data['ap2_point2']; ?>"><?php echo $data['ap2_point2']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Kegiatan KBM direncanakan dengan baik yang mampu meningkatkan kompetensi siswa secara maksimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap3" class="form-control">
											<option value="<?php echo $data['ap2_point3']; ?>"><?php echo $data['ap2_point3']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Teknik pembelajaran direncanakan dengan baik yang mampu meningkatkan kompetensi siswa secara maksimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap4" class="form-control">
											<option value="<?php echo $data['ap2_point4']; ?>"><?php echo $data['ap2_point4']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Tujuan pembelajaran direncanakan dengan baik yang mampu meningkatkan kompetensi siswa secara maksimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap5" class="form-control">
											<option value="<?php echo $data['ap2_point5']; ?>"><?php echo $data['ap2_point5']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">6. Kegiatan KBM direncanakan dengan baik yang mampu meningkatkan respon siswa secara maksimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap6" class="form-control">
											<option value="<?php echo $data['ap2_point6']; ?>"><?php echo $data['ap2_point6']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Perencanaan langkah-langkah dan tahapan KBM sesuai dengan kurikulum</label>
									<div style="margin-bottom: 10px" class="col-sm-2">
										<select type="text" name="ap7" class="form-control">
											<option value="<?php echo $data['ap2_point7']; ?>"><?php echo $data['ap2_point7']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>

									<label class="col-sm-10 col-sm-10 control-label">karenanya dapat lebih lanjut</label>
									<div class="col-sm-2">
										<select type="text" name="ap8" class="form-control">
											<option value="<?php echo $data['ap2_point8']; ?>"><?php echo $data['ap2_point8']; ?></option>
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
									<label class="col-sm-10 col-sm-10 control-label">1. Materi yang mampu mengaktifkan siswa demgan lengkap</label>
									<div class="col-sm-2">
										<select type="text" name="ap9" class="form-control">
											<option value="<?php echo $data['ap2_point9']; ?>"><?php echo $data['ap2_point9']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Materi pembelajaran sesuai dengan kondisi siswa</label>
									<div class="col-sm-2">
										<select type="text" name="ap10" class="form-control">
											<option value="<?php echo $data['ap2_point10']; ?>"><?php echo $data['ap2_point10']; ?></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Kegiatan KBM direncanakan dengan baik yang mampu meningkatkan kompetensi siswa secara maksimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap11" class="form-control">
											<option value="<?php echo $data['ap2_point11']; ?>"><?php echo $data['ap2_point11']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Teknik pembelajaran direncanakan dengan baik yang mampu meningkatkan kompetensi siswa secara maksimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap12" class="form-control">
											<option value="<?php echo $data['ap2_point12']; ?>"><?php echo $data['ap2_point12']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Tujuan Pembelajaran direncanakan dengan baik yang mampu meningkatkan kompetensi siswa secara maksimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap13" class="form-control">
											<option value="<?php echo $data['ap2_point13']; ?>"><?php echo $data['ap2_point13']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">6. Kegiatan KBM direncanakan dengan baik yang mampu meningkatkan respon siswa secara maksimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap14" class="form-control">
											<option value="<?php echo $data['ap2_point14']; ?>"><?php echo $data['ap2_point14']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Pelaksanaan langkah-langkah dan tahapan KBM sesuai dengan KBM</label>
									<div style="margin-bottom: 10px" class="col-sm-2">
										<select type="text" name="ap15" class="form-control">
											<option value="<?php echo $data['ap2_point15']; ?>"><?php echo $data['ap2_point15']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sudah</option>
										</select>
									</div>

									<label class="col-sm-10 col-sm-10 control-label">karenanya dapat lebih lanjut</label>
									<div class="col-sm-2">
										<select type="text" name="ap16" class="form-control">
											<option value="<?php echo $data['ap2_point16']; ?>"><?php echo $data['ap2_point16']; ?></option>
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
									<label class="col-sm-10 col-sm-10 control-label">Tingkat penguasaan teori belajar dan prinsip-prinsip pembelajaran guru tergolong </label>
									<div class="col-sm-2">
										<select type="text" name="ap17" class="form-control">
											<option value="<?php echo $data['ap2_point17']; ?>"><?php echo $data['ap2_point17']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="baik">baik</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Tingkat penguasaan teori belajar dan prinsip-prinsip pembelajaran guru agar lebih lanjut</label>
									<div class="col-sm-2">
										<select type="text" name="ap18" class="form-control">
											<option value="<?php echo $data['ap2_point18']; ?>"><?php echo $data['ap2_point18']; ?></option>
											<option value="ditingkatkan">ditingkatkan</option>
											<option value="dikembangkan">dikembangkan</option>
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
									<label class="col-sm-10 col-sm-10 control-label">1. Guru memberi kesempatan kepada peserta didik untuk menguasai materi pembelajaran sesuai usia dan kemampuan belajarnya melalui pengaturan proses pembelajaran dan aktivitas yang bervariasi</label>
									<div class="col-sm-2">
										<select type="text" name="np1" class="form-control">
											<option value="<?php echo $data['np2_indikator1']; ?>"><?php echo $np2_indikator1; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Guru selalu memastikan tingkat pemahaman peserta didik terhadap materi pembelajaran tertentu dan menyesuaikan aktivitas pembelajaran berikutnya berdasarkan tingkat pemahaman tersebut</label>
									<div class="col-sm-2">
										<select type="text" name="np2" class="form-control">
											<option value="<?php echo $data['np2_indikator2']; ?>"><?php echo $np2_indikator2; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Guru dapat menjelaskan alasan pelaksanaan kegiatan/aktivitas yang dilakukannya, baik yang sesuai maupun yang berbeda dengan rencana, terkait keberhasilan pembelajaran</label>
									<div class="col-sm-2">
										<select type="text" name="np3" class="form-control">
											<option value="<?php echo $data['np2_indikator3']; ?>"><?php echo $np2_indikator3; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Guru menggunakan berbagai teknik untuk memotivasi kemauan belajar peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="np4" class="form-control">
											<option value="<?php echo $data['np2_indikator4']; ?>"><?php echo $np2_indikator4; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Guru merencanakan kegiatan pembelajaran yang saling terkait satu sama lain dengan memperhatikan tujuan pembelajaran maupun proses belajar peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="np5" class="form-control">
											<option value="<?php echo $data['np2_indikator5']; ?>"><?php echo $np2_indikator5; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>


								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">6. Guru memperhatikan respon peserta didik yang belum/kurang memahami materi pembelajaran yang diajarkan dan menggunakannya untuk memperbaiki rancangan pembelajaran berikutnya</label>
									<div class="col-sm-2">
										<select type="text" name="np6" class="form-control">
											<option value="<?php echo $data['np2_indikator6']; ?>"><?php echo $np2_indikator6; ?></option>
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
										<a style="margin-left:10px;width:80px" href="?module=p2" class="btn btn-white"> Batal</a>
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
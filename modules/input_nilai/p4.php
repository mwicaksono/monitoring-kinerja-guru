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
								<p style="font-size:15px">Kompetensi 4 : Kegiatan pembelajaran yang mendidik</p>
							</div>
							<div class="adv-table">
								<table class="display table table-striped table-bordered table-hover" id="example">
									<thead>
										<tr>
											<th rowspan="2">No</th>
											<th rowspan="2">Periode</th>
											<th rowspan="2">Guru Dinilai</th>
											<th colspan="11">Indikator Penilaian</th>
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
											<th> 9</th>
											<th> 10</th>
											<th> 11</th>

										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$sql = $db->database_prepare("SELECT a.id_nilai,a.periode_nilai,a.guru_dinilai,a.guru_penilai,a.angka_kredit,
                                                          b.id_periode,b.periode,
                                                          c.nip,c.nama_guru,c.gelar,
                                                          d.id_pedagogik4,d.np4_indikator1,d.np4_indikator2,d.np4_indikator3,d.np4_indikator4,d.np4_indikator5,d.np4_indikator6,d.np4_indikator7,d.np4_indikator8,d.np4_indikator9,d.np4_indikator10,d.np4_indikator11,d.np4_total_skor,d.np4_persentase,d.np4_nilai_kompetensi
                                                          FROM tbl_penilaian AS a
                                                          JOIN tbl_periode AS b
                                                          JOIN tbl_guru AS c
                                                          JOIN pedagogik4 AS d
                                                          ON a.periode_nilai=b.id_periode 
                                                          AND a.guru_dinilai=c.nip
                                                          AND a.id_nilai=d.id_pedagogik4
                                                          WHERE a.guru_penilai='$_SESSION[nip]'
                                                          ORDER BY a.id_nilai DESC")->execute();
										while ($data = $db->database_fetch_array($sql)) {
											echo "
                                <tr class='gradeX'>
                                    <td width='50' class='center'>$no</td>
                                    <td width='80' class='center'>$data[periode]</td>
                                    <td width='200'>$data[nama_guru], $data[gelar] ($data[guru_dinilai])</td>
                                    <td width='50' class='center'>$data[np4_indikator1]</td>
                                    <td width='50' class='center'>$data[np4_indikator2]</td>
                                    <td width='50' class='center'>$data[np4_indikator3]</td>
                                    <td width='50' class='center'>$data[np4_indikator4]</td>
                                    <td width='50' class='center'>$data[np4_indikator5]</td>
                                    <td width='50' class='center'>$data[np4_indikator6]</td>
                                    <td width='50' class='center'>$data[np4_indikator7]</td>
                                    <td width='50' class='center'>$data[np4_indikator8]</td>
                                    <td width='50' class='center'>$data[np4_indikator9]</td>
                                    <td width='50' class='center'>$data[np4_indikator10]</td>
                                    <td width='50' class='center'>$data[np4_indikator11]</td>
                                    <td class='center'>$data[np4_total_skor]</td>
                                    <td class='center'>$data[np4_persentase] %</td>
                                    <td class='center'>$data[np4_nilai_kompetensi]</td>";

											if ($data['np4_nilai_kompetensi'] == '0' && $data['angka_kredit'] == '') {
												echo "
                                    <td width='100' class='center'>
                                        <a title='Penilaian' href='?module=p4&act=nilai&id=$data[id_nilai]'>
                                            <button class='btn btn-primary btn-xs'><i class='icon-edit'></i> Nilai</button>
                                        </a> 
                                    </td>";
											} elseif ($data['np4_nilai_kompetensi'] != '0' && $data['angka_kredit'] == '') {
												echo "
                                    <td width='100' class='center'>
                                        <a title='Ubah' href='?module=p4&act=edit&id=$data[id_nilai]'>
                                            <button class='btn btn-primary btn-xs'><i class='icon-pencil'></i> Ubah</button>
                                        </a> 
                                    </td>";
											} elseif ($data['np4_nilai_kompetensi'] != '0' && $data['angka_kredit'] != '') {
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
							Kompetensi 4 : Kegiatan pembelajaran yang mendidik
						</header>
						<div class="panel-body">
							<form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_p4.php?mod=p4&act=nilai" method="POST" name="frmP4">

								<input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

								<div class="alert alert-info alert-block fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="icon-remove"></i>
									</button>
									<p style="font-size:15px">Sebelum Pengamatan.</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Tujuan pembelajaran/indikator sesuai dengan KD</label>
									<div class="col-sm-2">
										<select type="text" name="ap1" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Strategi dan metode yang dipilih dapat menciptakan rasa nyaman dan tenang bagi siswa</label>
									<div class="col-sm-2">
										<select type="text" name="ap2" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Materi prasyarat dirumukan dengan sesuai materi pokok</label>
									<div class="col-sm-2">
										<select type="text" name="ap3" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Pembahasan PR/tugas lainnya sesuai dengan alokasi waktu yang tersedia</label>
									<div class="col-sm-2">
										<select type="text" name="ap4" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Materi yang dirumuskan mengaitkan kehidupan nyata</label>
									<div class="col-sm-2">
										<select type="text" name="ap5" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="sedikit">sedikit</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">6. Metode pembelajaran bervariatif</label>
									<div class="col-sm-2">
										<select type="text" name="ap6" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">7. Partisipatif siswa maksimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap7" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">8. Perencanaan pembelajaran sesuai dengan kondisi kelas</label>
									<div class="col-sm-2">
										<select type="text" name="ap8" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">9. Kesempatan siswa bertanya dirumuskan dengan baik</label>
									<div class="col-sm-2">
										<select type="text" name="ap9" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">10. Kegiatan refleksi direncanakan dengan baik</label>
									<div class="col-sm-2">
										<select type="text" name="ap10" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">11. Alat peraga dan alat bantu lainnya dirumuskan beragam</label>
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
									<label class="col-sm-10 col-sm-10 control-label">Perencanaan KBM yang mendidik perlu lebih lanjut</label>
									<div class="col-sm-2">
										<select type="text" name="ap12" class="form-control">
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
									<label class="col-sm-10 col-sm-10 control-label">1. Tujuan pembelajaran/indikator disampaikan</label>
									<div class="col-sm-2">
										<select type="text" name="ap13" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="sebagian">sebagian</option>
											<option value="lengkap">lengkap</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Strategi dan metode yang digunakan dapat menciptakan rasa nyaman dan senang bagi siswa</label>
									<div class="col-sm-2">
										<select type="text" name="ap14" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Materi prasyarat disampaikan dengan sesuai materi pokok</label>
									<div class="col-sm-2">
										<select type="text" name="ap15" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Pembahasan PR/tugas lainnya dibahas</label>
									<div class="col-sm-2">
										<select type="text" name="ap16" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Materi yang disajikan mengaitkan kehidupan nyata</label>
									<div class="col-sm-2">
										<select type="text" name="ap17" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="sedikit">sedikit</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">6. Metode pembelajaran bervariatif</label>
									<div class="col-sm-2">
										<select type="text" name="ap18" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">7. Partisipasi siswa maksimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap19" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">8. Pelaksanaan pembelajaran sesuai dengan kondisi kelas</label>
									<div class="col-sm-2">
										<select type="text" name="ap20" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">9. Kesempatan siswa bertanya diwujudkan dengan baik</label>
									<div class="col-sm-2">
										<select type="text" name="ap21" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">10. Kegiatan refleksi dilaksanakan dengan baik</label>
									<div class="col-sm-2">
										<select type="text" name="ap22" class="form-control">
											<option value=""></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">11. Alat peraga dan alat bantu lainnya digunakan beragam</label>
									<div class="col-sm-2">
										<select type="text" name="ap23" class="form-control">
											<option value=""></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Dokumentasi dan pelaksanaan KBM perlu lebih lanjut</label>
									<div class="col-sm-2">
										<select type="text" name="ap24" class="form-control">
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
									<label class="col-sm-10 col-sm-10 control-label">Berdasarkan hasil ulangan dan hasil analisis belajar dapat dikatakan bahwa hasil KBM dapat mendidik dan mengembangkan kompetensi siswa secara optimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap25" class="form-control">
											<option value=""></option>
											<option value="belum">belum</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Baik aspek kognitif, sikap, ataupun keterampilan dalam perencanaan dan pelaksanaan KBM perlu lebih lanjut</label>
									<div class="col-sm-2">
										<select type="text" name="ap26" class="form-control">
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
									<label class="col-sm-10 col-sm-10 control-label">1. Guru melaksanakan aktivitas pembelajaran sesuai dengan rancangan yang telah disusun secara lengkap dan pelaksanaan aktivitas tersebut mengindikasikan bahwa guru mengerti tentang tujuannya</label>
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
									<label class="col-sm-10 col-sm-10 control-label">2. Guru melaksanakan aktivitas pembelajaran yang bertujuan untuk membantu proses belajar peserta didik, bukan untuk menguji sehingga membuat peserta didik merasa tertekan</label>
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
									<label class="col-sm-10 col-sm-10 control-label">3. Guru menkomunikasikan informasi baru (misalnya materi tambahan) sesuai dengan usia dan tingkat kemampuan belajar peserta didik.</label>
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
									<label class="col-sm-10 col-sm-10 control-label">4. menyikapi kesalahan yang dilakukan peserta didik sebagai tahapan proses pembelajaran, bukan semata-mata kesalahan yang harus dikoreksi. Misalnya: dengan mengetahui terlebih dahulu peserta didik lain yang setuju atau tidak stuju dengan jawaban tersebut, sebelum memberikan penjelasan tentang jawaban yang benar</label>
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
									<label class="col-sm-10 col-sm-10 control-label">5. Guru melaksanakan kegiatan pembelajaran sesuai isi kurikulum dan mengaitkannya dengan konteks kehidupan sehari-hari pseserta didik</label>
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
									<label class="col-sm-10 col-sm-10 control-label">6. Guru melakukan aktivitas pembelajaran secara bervariasi dengan waktu yang cukup untuk kegiatan pembelajaran yang sesuai dengan usia dan tingkat kemampuan belajar dan mempertahankan perhatian peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="np6" class="form-control">
											<option value=""></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">7. Guru mengelola kelas dengan efektif tanpa mendominasi atau sibuk dengan kegiatannya sendiri agar semua waktu peserta dapat termanfaatkan secara produktif</label>
									<div class="col-sm-2">
										<select type="text" name="np7" class="form-control">
											<option value=""></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">8. Guru mampu menyesuaikan aktivitas pembelajaran yang dirancang dengan kondisi kelas</label>
									<div class="col-sm-2">
										<select type="text" name="np8" class="form-control">
											<option value=""></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">9. Guru memberikan banyak kesempatan kepada peserta didik untuk bertanya, mempraktekan, dan berinteraksi dengan peserta didik lain</label>
									<div class="col-sm-2">
										<select type="text" name="np9" class="form-control">
											<option value=""></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">10. Guru mengatur pelaksanaan aktivitas pembelajaran secara sistematis untuk membantu proses belajar peserta didik. Sebagai contoh: guru menambah informasi baru setelah mengevaluasi pemahaman</label>
									<div class="col-sm-2">
										<select type="text" name="np10" class="form-control">
											<option value=""></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">11. Guru menggunakan alat bantu mengajar, dan/atau audio visual (termasuk TIK) untuk meningkatkan motivasi belajar peserta didik dalam mencapai tujuan pembelajaran</label>
									<div class="col-sm-2">
										<select type="text" name="np11" class="form-control">
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
										<a style="margin-left:10px;width:80px" href="?module=p4" class="btn btn-white"> Batal</a>
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
                                                            d.id_pedagogik4,d.ap4_point1,d.ap4_point2,d.ap4_point3,d.ap4_point4,d.ap4_point5,d.ap4_point6,d.ap4_point7,d.ap4_point8,d.ap4_point9,d.ap4_point10,d.ap4_point11,d.ap4_point12,d.ap4_point13,d.ap4_point14,d.ap4_point15,d.ap4_point16,d.ap4_point17,d.ap4_point18,d.ap4_point19,d.ap4_point20,d.ap4_point21,d.ap4_point22,d.ap4_point23,d.ap4_point24,d.ap4_point25,d.ap4_point26,d.np4_indikator1,d.np4_indikator2,d.np4_indikator3,d.np4_indikator4,d.np4_indikator5,d.np4_indikator6,d.np4_indikator7,d.np4_indikator8,d.np4_indikator9,d.np4_indikator10,d.np4_indikator11,d.np4_total_skor,d.np4_persentase,d.np4_nilai_kompetensi
                                                            FROM tbl_penilaian AS a
                                                            JOIN tbl_periode AS b
                                                            JOIN tbl_guru AS c
                                                            JOIN pedagogik4 AS d
                                                            ON a.periode_nilai=b.id_periode 
                                                            AND a.guru_dinilai=c.nip
                                                            AND a.id_nilai=d.id_pedagogik4
                                                            WHERE d.id_pedagogik4=?")->execute($_GET["id"]));

			if ($data['np4_indikator1'] == '0') {
				$np4_indikator1 = 'Tidak terpenuhi';
			} elseif ($data['np4_indikator1'] == '1') {
				$np4_indikator1 = 'Terpenuhi sebagian';
			} elseif ($data['np4_indikator1'] == '2') {
				$np4_indikator1 = 'Seluruhnya terpenuhi';
			}

			if ($data['np4_indikator2'] == '0') {
				$np4_indikator2 = 'Tidak terpenuhi';
			} elseif ($data['np4_indikator2'] == '1') {
				$np4_indikator2 = 'Terpenuhi sebagian';
			} elseif ($data['np4_indikator2'] == '2') {
				$np4_indikator2 = 'Seluruhnya terpenuhi';
			}

			if ($data['np4_indikator3'] == '0') {
				$np4_indikator3 = 'Tidak terpenuhi';
			} elseif ($data['np4_indikator3'] == '1') {
				$np4_indikator3 = 'Terpenuhi sebagian';
			} elseif ($data['np4_indikator3'] == '2') {
				$np4_indikator3 = 'Seluruhnya terpenuhi';
			}

			if ($data['np4_indikator4'] == '0') {
				$np4_indikator4 = 'Tidak terpenuhi';
			} elseif ($data['np4_indikator4'] == '1') {
				$np4_indikator4 = 'Terpenuhi sebagian';
			} elseif ($data['np4_indikator4'] == '2') {
				$np4_indikator4 = 'Seluruhnya terpenuhi';
			}

			if ($data['np4_indikator5'] == '0') {
				$np4_indikator5 = 'Tidak terpenuhi';
			} elseif ($data['np4_indikator5'] == '1') {
				$np4_indikator5 = 'Terpenuhi sebagian';
			} elseif ($data['np4_indikator5'] == '2') {
				$np4_indikator5 = 'Seluruhnya terpenuhi';
			}

			if ($data['np4_indikator6'] == '0') {
				$np4_indikator6 = 'Tidak terpenuhi';
			} elseif ($data['np4_indikator6'] == '1') {
				$np4_indikator6 = 'Terpenuhi sebagian';
			} elseif ($data['np4_indikator6'] == '2') {
				$np4_indikator6 = 'Seluruhnya terpenuhi';
			}

			if ($data['np4_indikator7'] == '0') {
				$np4_indikator7 = 'Tidak terpenuhi';
			} elseif ($data['np4_indikator7'] == '1') {
				$np4_indikator7 = 'Terpenuhi sebagian';
			} elseif ($data['np4_indikator7'] == '2') {
				$np4_indikator7 = 'Seluruhnya terpenuhi';
			}

			if ($data['np4_indikator8'] == '0') {
				$np4_indikator8 = 'Tidak terpenuhi';
			} elseif ($data['np4_indikator8'] == '1') {
				$np4_indikator8 = 'Terpenuhi sebagian';
			} elseif ($data['np4_indikator8'] == '2') {
				$np4_indikator8 = 'Seluruhnya terpenuhi';
			}

			if ($data['np4_indikator9'] == '0') {
				$np4_indikator9 = 'Tidak terpenuhi';
			} elseif ($data['np4_indikator9'] == '1') {
				$np4_indikator9 = 'Terpenuhi sebagian';
			} elseif ($data['np4_indikator9'] == '2') {
				$np4_indikator9 = 'Seluruhnya terpenuhi';
			}

			if ($data['np4_indikator10'] == '0') {
				$np4_indikator10 = 'Tidak terpenuhi';
			} elseif ($data['np4_indikator10'] == '1') {
				$np4_indikator10 = 'Terpenuhi sebagian';
			} elseif ($data['np4_indikator10'] == '2') {
				$np4_indikator10 = 'Seluruhnya terpenuhi';
			}

			if ($data['np4_indikator11'] == '0') {
				$np4_indikator11 = 'Tidak terpenuhi';
			} elseif ($data['np4_indikator11'] == '1') {
				$np4_indikator11 = 'Terpenuhi sebagian';
			} elseif ($data['np4_indikator11'] == '2') {
				$np4_indikator11 = 'Seluruhnya terpenuhi';
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
							Kompetensi 4 : Kegiatan pembelajaran yang mendidik
						</header>
						<div class="panel-body">
							<form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_p4.php?mod=p4&act=nilai" method="POST" name="frmP4">

								<input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

								<div class="alert alert-info alert-block fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="icon-remove"></i>
									</button>
									<p style="font-size:15px">Sebelum Pengamatan.</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Tujuan pembelajaran/indikator sesuai dengan KD</label>
									<div class="col-sm-2">
										<select type="text" name="ap1" class="form-control">
											<option value="<?php echo $data['ap4_point1']; ?>"><?php echo $data['ap4_point1']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Strategi dan metode yang dipilih dapat menciptakan rasa nyaman dan tenang bagi siswa</label>
									<div class="col-sm-2">
										<select type="text" name="ap2" class="form-control">
											<option value="<?php echo $data['ap4_point2']; ?>"><?php echo $data['ap4_point2']; ?></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Materi prasyarat dirumukan dengan sesuai materi pokok</label>
									<div class="col-sm-2">
										<select type="text" name="ap3" class="form-control">
											<option value="<?php echo $data['ap4_point3']; ?>"><?php echo $data['ap4_point3']; ?></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Pembahasan PR/tugas lainnya sesuai dengan alokasi waktu yang tersedia</label>
									<div class="col-sm-2">
										<select type="text" name="ap4" class="form-control">
											<option value="<?php echo $data['ap4_point4']; ?>"><?php echo $data['ap4_point4']; ?></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Materi yang dirumuskan mengaitkan kehidupan nyata</label>
									<div class="col-sm-2">
										<select type="text" name="ap5" class="form-control">
											<option value="<?php echo $data['ap4_point5']; ?>"><?php echo $data['ap4_point5']; ?></option>
											<option value="tidak">tidak</option>
											<option value="sedikit">sedikit</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">6. Metode pembelajaran bervariatif</label>
									<div class="col-sm-2">
										<select type="text" name="ap6" class="form-control">
											<option value="<?php echo $data['ap4_point6']; ?>"><?php echo $data['ap4_point6']; ?></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">7. Partisipatif siswa maksimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap7" class="form-control">
											<option value="<?php echo $data['ap4_point7']; ?>"><?php echo $data['ap4_point7']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">8. Perencanaan pembelajaran sesuai dengan kondisi kelas</label>
									<div class="col-sm-2">
										<select type="text" name="ap8" class="form-control">
											<option value="<?php echo $data['ap4_point8']; ?>"><?php echo $data['ap4_point8']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">9. Kesempatan siswa bertanya dirumuskan dengan baik</label>
									<div class="col-sm-2">
										<select type="text" name="ap9" class="form-control">
											<option value="<?php echo $data['ap4_point9']; ?>"><?php echo $data['ap4_point9']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">10. Kegiatan refleksi direncanakan dengan baik</label>
									<div class="col-sm-2">
										<select type="text" name="ap10" class="form-control">
											<option value="<?php echo $data['ap4_point10']; ?>"><?php echo $data['ap4_point10']; ?></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">11. Alat peraga dan alat bantu lainnya dirumuskan beragam</label>
									<div class="col-sm-2">
										<select type="text" name="ap11" class="form-control">
											<option value="<?php echo $data['ap4_point11']; ?>"><?php echo $data['ap4_point11']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Perencanaan KBM yang mendidik perlu lebih lanjut</label>
									<div class="col-sm-2">
										<select type="text" name="ap12" class="form-control">
											<option value="<?php echo $data['ap4_point12']; ?>"><?php echo $data['ap4_point12']; ?></option>
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
									<label class="col-sm-10 col-sm-10 control-label">1. Tujuan pembelajaran/indikator disampaikan</label>
									<div class="col-sm-2">
										<select type="text" name="ap13" class="form-control">
											<option value="<?php echo $data['ap4_point13']; ?>"><?php echo $data['ap4_point13']; ?></option>
											<option value="tidak">tidak</option>
											<option value="sebagian">sebagian</option>
											<option value="lengkap">lengkap</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Strategi dan metode yang digunakan dapat menciptakan rasa nyaman dan senang bagi siswa</label>
									<div class="col-sm-2">
										<select type="text" name="ap14" class="form-control">
											<option value="<?php echo $data['ap4_point14']; ?>"><?php echo $data['ap4_point14']; ?></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Materi prasyarat disampaikan dengan sesuai materi pokok</label>
									<div class="col-sm-2">
										<select type="text" name="ap15" class="form-control">
											<option value="<?php echo $data['ap4_point15']; ?>"><?php echo $data['ap4_point15']; ?></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. Pembahasan PR/tugas lainnya dibahas</label>
									<div class="col-sm-2">
										<select type="text" name="ap16" class="form-control">
											<option value="<?php echo $data['ap4_point16']; ?>"><?php echo $data['ap4_point16']; ?></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Materi yang disajikan mengaitkan kehidupan nyata</label>
									<div class="col-sm-2">
										<select type="text" name="ap17" class="form-control">
											<option value="<?php echo $data['ap4_point17']; ?>"><?php echo $data['ap4_point17']; ?></option>
											<option value="tidak">tidak</option>
											<option value="sedikit">sedikit</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">6. Metode pembelajaran bervariatif</label>
									<div class="col-sm-2">
										<select type="text" name="ap18" class="form-control">
											<option value="<?php echo $data['ap4_point18']; ?>"><?php echo $data['ap4_point18']; ?></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">7. Partisipasi siswa maksimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap19" class="form-control">
											<option value="<?php echo $data['ap4_point19']; ?>"><?php echo $data['ap4_point19']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">8. pelaksanaan pembelajaran sesuai dengan kondisi kelas</label>
									<div class="col-sm-2">
										<select type="text" name="ap20" class="form-control">
											<option value="<?php echo $data['ap4_point20']; ?>"><?php echo $data['ap4_point20']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">9. Kesempatan siswa bertanya diwujudkan dengan baik</label>
									<div class="col-sm-2">
										<select type="text" name="ap21" class="form-control">
											<option value="<?php echo $data['ap4_point21']; ?>"><?php echo $data['ap4_point21']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">10. Kegiatan refleksi dilaksanakan dengan baik</label>
									<div class="col-sm-2">
										<select type="text" name="ap22" class="form-control">
											<option value="<?php echo $data['ap4_point22']; ?>"><?php echo $data['ap4_point22']; ?></option>
											<option value="tidak">tidak</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">11. Alat peraga dan alat bantu lainnya digunakan beragam</label>
									<div class="col-sm-2">
										<select type="text" name="ap23" class="form-control">
											<option value="<?php echo $data['ap4_point23']; ?>"><?php echo $data['ap4_point23']; ?></option>
											<option value="kurang">kurang</option>
											<option value="cukup">cukup</option>
											<option value="sangat">sangat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Dokumentasi dan pelaksanaan KBM perlu lebih lanjut</label>
									<div class="col-sm-2">
										<select type="text" name="ap24" class="form-control">
											<option value="<?php echo $data['ap4_point24']; ?>"><?php echo $data['ap4_point24']; ?></option>
											<option value="ditingkatkan">tditingkatkan</option>
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
									<label class="col-sm-10 col-sm-10 control-label">Berdasarkan hasil ulangan dan hasil analisis belajar dapat dikatakan bahwa hasil KBMd apat mendidik dan mengembangkan kompetensi siswa secara optimal</label>
									<div class="col-sm-2">
										<select type="text" name="ap25" class="form-control">
											<option value="<?php echo $data['ap4_point25']; ?>"><?php echo $data['ap4_point25']; ?></option>
											<option value="belum">belum</option>
											<option value="cukup">cukup</option>
											<option value="sudah">sudah</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">Baik aspek kognitif, sikap, ataupun keterampilan dalam perencanaan dan pelaksanaan KBM perlu lebih lanjut</label>
									<div class="col-sm-2">
										<select type="text" name="ap26" class="form-control">
											<option value="<?php echo $data['ap4_point26']; ?>"><?php echo $data['ap4_point26']; ?></option>
											<option value="ditingkatkan">tditingkatkan</option>
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
									<label class="col-sm-10 col-sm-10 control-label">1. Guru melaksanakan aktivitas pembelajaran sesuai dengan rancangan yang telah disusun secara lengkap dan pelaksanaan aktivitas tersebut mengindikasikan bahwa guru mengerti tentang tujuannya</label>
									<div class="col-sm-2">
										<select type="text" name="np1" class="form-control">
											<option value="<?php echo $data['np4_indikator1']; ?>"><?php echo $np4_indikator1; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">2. Guru melaksanakan aktivitas pembelajaran yang bertujuan untuk membantu proses belajar peserta didik, bukan untuk menguji sehingga membuat peserta didik merasa tertekan</label>
									<div class="col-sm-2">
										<select type="text" name="np2" class="form-control">
											<option value="<?php echo $data['np4_indikator2']; ?>"><?php echo $np4_indikator2; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">3. Guru menkomunikasikan informasi baru (misalnya materi tambahan) sesuai dengan usia dan tingkat kemampuan belajar peserta didik.</label>
									<div class="col-sm-2">
										<select type="text" name="np3" class="form-control">
											<option value="<?php echo $data['np4_indikator3']; ?>"><?php echo $np4_indikator3; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">4. menyikapi kesalahan yang dilakukan peserta didik sebagai tahapan proses pembelajaran, bukan semata-mata kesalahan yang harus dikoreksi. Misalnya: dengan mengetahui terlebih dahulu peserta didik lain yang setuju atau tidak stuju dengan jawaban tersebut, sebelum memberikan penjelasan tentang jawaban yang benar</label>
									<div class="col-sm-2">
										<select type="text" name="np4" class="form-control">
											<option value="<?php echo $data['np4_indikator4']; ?>"><?php echo $np4_indikator4; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">5. Guru melaksanakan kegiatan pembelajaran sesuai isi kurikulum dan mengaitkannya dengan konteks kehidupan sehari-hari pseserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="np5" class="form-control">
											<option value="<?php echo $data['np4_indikator5']; ?>"><?php echo $np4_indikator5; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">6. Guru melakukan aktivitas pembelajaran secara bervariasi dengan waktu yang cukup untuk kegiatan pembelajaran yang sesuai dengan usia dan tingkat kemampuan belajar dan mempertahankan perhatian peserta didik</label>
									<div class="col-sm-2">
										<select type="text" name="np6" class="form-control">
											<option value="<?php echo $data['np4_indikator6']; ?>"><?php echo $np4_indikator6; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">7. Guru mengelola kelas dengan efektif tanpa mendominasi atau sibuk dengan kegiatannya sendiri agar semua waktu peserta dapat termanfaatkan secara produktif</label>
									<div class="col-sm-2">
										<select type="text" name="np7" class="form-control">
											<option value="<?php echo $data['np4_indikator7']; ?>"><?php echo $np4_indikator7; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">8. Guru mampu menyesuaikan aktivitas pembelajaran yang dirancang dengan kondisi kelas</label>
									<div class="col-sm-2">
										<select type="text" name="np8" class="form-control">
											<option value="<?php echo $data['np4_indikator8']; ?>"><?php echo $np4_indikator8; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">9. Guru memberikan banyak kesempatan kepada peserta didik untuk bertanya, mempraktekan, dan berinteraksi dengan peserta didik lain</label>
									<div class="col-sm-2">
										<select type="text" name="np9" class="form-control">
											<option value="<?php echo $data['np4_indikator9']; ?>"><?php echo $np4_indikator9; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">10. Guru mengatur pelaksanaan aktivitas pembelajaran secara sistematis untuk membantu proses belajar peserta didik. Sebagai contoh: guru menambah informasi baru setelah mengevaluasi pemahaman</label>
									<div class="col-sm-2">
										<select type="text" name="np10" class="form-control">
											<option value="<?php echo $data['np4_indikator10']; ?>"><?php echo $np4_indikator10; ?></option>
											<option value="0">Tidak terpenuhi</option>
											<option value="1">Terpenuhi sebagian</option>
											<option value="2">Seluruhnya terpenuhi</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">11. Guru menggunakan alat bantu mengajar, dan/atau audio visual (termasuk TIK) untuk meningkatkan motivasi belajar peserta didik dalam mencapai tujuan pembelajaran</label>
									<div class="col-sm-2">
										<select type="text" name="np11" class="form-control">
											<option value="<?php echo $data['np4_indikator11']; ?>"><?php echo $np4_indikator11; ?></option>
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
										<a style="margin-left:10px;width:80px" href="?module=p4" class="btn btn-white"> Batal</a>
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
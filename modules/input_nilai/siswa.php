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
				<div class="col-lg-6">
					<a title="penilaian guru" href="?module=siswa">
						<button class='btn btn-primary'> Penilaian Guru</button>
					</a>
					<!-- <a title="Ubah" href="?module=hasil_nilai_siswa">
						<button class='btn btn-primary'> Hasil Penilaian</button>
					</a> -->
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-12">
					<section class="panel">
						<header style="font-size:18px" class="panel-heading">
							<i style="margin-right:7px" class="icon-edit"></i> Penilaian Oleh Peserta Didik
							<p style="margin-top:10px;">Penilai : <b><?= $_SESSION['nama'] ?></b></p>
						</header>
						<div class="panel-body">
							<div class="adv-table">
								<table class="display table table-striped table-bordered table-hover" id="example">
									<thead>
										<tr>
											<th rowspan="2" class="text-center">No</th>
											<th rowspan="2" class="text-center">Periode</th>
											<th rowspan="2">Guru Dinilai</th>
											<th rowspan="2" class="text-center">Total Skor</th>
											<th rowspan="2" class="text-center">Persentase</th>
											<th rowspan="2" class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$sql = $db->database_prepare("SELECT a.id_nilai,a.periode_nilai,a.guru_dinilai,a.siswa_penilai,
										b.id_periode,b.periode,
										c.nip,c.nama_guru,c.gelar,
										d.id_user, d.nama,
										e.ns_total_skor, e.ns_persentase
										FROM tbl_penilaian_siswa AS a
										JOIN tbl_periode AS b
										JOIN tbl_guru AS c
										JOIN tbl_user AS d
										JOIN siswa AS e
										ON a.periode_nilai=b.id_periode 
										AND a.guru_dinilai=c.nip
										AND a.siswa_penilai=d.id_user
										AND a.id_nilai=e.id_penilaian_siswa
										WHERE d.id_user='$_SESSION[id_user]'
										ORDER BY a.id_nilai DESC")->execute();
										while ($data = $db->database_fetch_array($sql)) {
											echo "
                                <tr class='gradeX'>
                                    <td width='50' class='center'>$no</td>
                                    <td width='80' class='center'>$data[periode]</td>
                                    <td width='300'>$data[nama_guru], $data[gelar] ($data[guru_dinilai])</td>
                                    <td width='100' class='center'>$data[ns_total_skor]</td>
                                    <td width='100' class='center'>$data[ns_persentase] %</td>";
											if ($data['ns_total_skor'] == '0') {
												echo "
									<td width='100' class='center'>
									<a title='Penilaian' href='?module=siswa&act=nilai&id=$data[id_nilai]'>
                                            <button class='btn btn-primary btn-xs'><i class='icon-edit'></i> Nilai</button>
                                        </a> 
									</td>";
											} elseif ($data['ns_total_skor'] != '0') {
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
			$data = $db->database_fetch_array($db->database_prepare("SELECT a.id_nilai, a.periode_nilai, a.guru_dinilai, a.siswa_penilai,
                                                            b.id_periode, b.periode,
                                                            c.nip, c.nama_guru, c.gelar,
															d.nama, d.id_user
                                                            FROM tbl_penilaian_siswa AS a
                                                            JOIN tbl_periode AS b
                                                            JOIN tbl_guru AS c
															JOIN tbl_user AS d
                                                            ON a.periode_nilai=b.id_periode 
                                                            AND a.guru_dinilai=c.nip
                                                            AND a.siswa_penilai=d.id_user
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
							Penilaian Guru oleh Peserta Didik
						</header>
						<div class="panel-body">
							<form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_siswa.php?mod=siswa&act=nilai" method="POST" name="frmK1">

								<input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">
								<div class="alert alert-info alert-block fade in">
									<button data-dismiss="alert" class="close close-sm" type="button">
										<i class="icon-remove"></i>
									</button>
									<p style="font-size:15px">Penguasaan Materi</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru menyampaikan materi dengan contoh dalam kehidupan sehari-hari</label>
									<div class="col-sm-2">
										<select type="text" name="ns1" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">2. Guru menjelaskan pelajaran dari buku paket dan sumber lain</label>
									<div class="col-sm-2">
										<select type="text" name="ns2" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">3. Guru menjawab pertanyaan dengan benar dan jelas</label>
									<div class="col-sm-2">
										<select type="text" name="ns3" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">4. Guru mengajar sesuai dengan materi pelajaran</label>
									<div class="col-sm-2">
										<select type="text" name="ns4" class="form-control" required>
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
									<p style="font-size:15px">Kemahiran dalam Mengajar</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru menyampaikan kegiatan belajar hari ini</label>
									<div class="col-sm-2">
										<select type="text" name="ns5" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">2. Guru memberikan motivasi kepada saya dan teman-teman</label>
									<div class="col-sm-2">
										<select type="text" name="ns6" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">3. Guru menyampaikan pelajaran dengan mudah dimengerti</label>
									<div class="col-sm-2">
										<select type="text" name="ns7" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">4. Guru mengajar dengan bervariasi misalnya diskusi, tanya jawab, dll</label>
									<div class="col-sm-2">
										<select type="text" name="ns8" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">5. Guru berbicara dengan jelas saat mengajar</label>
									<div class="col-sm-2">
										<select type="text" name="ns9" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">6. Guru mengajar dengan menyenangkan dan menarik</label>
									<div class="col-sm-2">
										<select type="text" name="ns10" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">7. Guru meminta saya dan teman-teman belajar secara berkelompok</label>
									<div class="col-sm-2">
										<select type="text" name="ns11" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">8. Guru membimbing saya dan teman-teman ketika mengalami kesulitan dalam belajar</label>
									<div class="col-sm-2">
										<select type="text" name="ns12" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">9. Guru membuat suasana kelas menjadi nyaman</label>
									<div class="col-sm-2">
										<select type="text" name="ns13" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">10. Guru memberikan kesempaan kepada saya dan teman-teman untuk bertanya dan menjawab</label>
									<div class="col-sm-2">
										<select type="text" name="ns14" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">11. Guru menghargai kemampuan saya dan teman-teman</label>
									<div class="col-sm-2">
										<select type="text" name="ns15" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">12. Guru memberikan nilai</label>
									<div class="col-sm-2">
										<select type="text" name="ns16" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">13. Guru memberikan tugas belajar dalam pembelajaran</label>
									<div class="col-sm-2">
										<select type="text" name="ns17" class="form-control" required>
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
									<p style="font-size:15px">Perilaku Guru Sehari-hari</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru mengajar dan mengajak saya dan teman-teman untuk berperilaku baik</label>
									<div class="col-sm-2">
										<select type="text" name="ns18" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">2. Guru memberi contoh perilaku yang sesuai dengan aturan</label>
									<div class="col-sm-2">
										<select type="text" name="ns19" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">3. Guru mengikuti ibadah setiap hari Jumat pagi</label>
									<div class="col-sm-2">
										<select type="text" name="ns20" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">4. Guru berpakaian sopan dan rapi sesuai aturan sekolah</label>
									<div class="col-sm-2">
										<select type="text" name="ns21" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">5. Guru bersikap adil dan tidak membeda-bedakan</label>
									<div class="col-sm-2">
										<select type="text" name="ns22" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">6. Guru berbicara dengan sopan</label>
									<div class="col-sm-2">
										<select type="text" name="ns23" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">7. Guru ramah</label>
									<div class="col-sm-2">
										<select type="text" name="ns24" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">8. Guru sabar</label>
									<div class="col-sm-2">
										<select type="text" name="ns25" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">9. Guru memulai pembelajaran tepat waktu</label>
									<div class="col-sm-2">
										<select type="text" name="ns26" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">10. Guru memulai pelajaran dengan berdoa dan renungan</label>
									<div class="col-sm-2">
										<select type="text" name="ns27" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">11. Guru mengakhiri pembelajaran dengan doa</label>
									<div class="col-sm-2">
										<select type="text" name="ns28" class="form-control" required>
											<option value=""></option>
											<option value="0">tidak pernah</option>
											<option value=1>kadang-kadang</option>
											<option value=2>agak sering</option>
											<option value=4>sering</option>
											<option value=5>selalu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">12. Guru mengakhiri kegiatan belajar dengan tepat waktu</label>
									<div class="col-sm-2">
										<select type="text" name="ns29" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">13. Guru memberikan tugas apabila berhalangan hadir</label>
									<div class="col-sm-2">
										<select type="text" name="ns30" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">14. Guru menjaga kebersihan lingkungan</label>
									<div class="col-sm-2">
										<select type="text" name="ns31" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">15. Guru tidak merokok</label>
									<div class="col-sm-2">
										<select type="text" name="ns32" class="form-control" required>
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
									<p style="font-size:15px">Hubungan Sosial dengan Peserta Didik</p>
								</div>

								<div class="form-group">
									<label class="col-sm-10 col-sm-10 control-label">1. Guru melibatkan aktif saya dan teman-teman dalam kegiatan belajar di kelas</label>
									<div class="col-sm-2">
										<select type="text" name="ns33" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">2. Guru memperhatikan kebutuhan belajar saya dan teman-teman</label>
									<div class="col-sm-2">
										<select type="text" name="ns34" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">3. Guru menyebutkan nama saya dan teman-teman selama kegiatan belajar</label>
									<div class="col-sm-2">
										<select type="text" name="ns35" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">4. Guru memberi perhatian kepada saya dan teman-teman</label>
									<div class="col-sm-2">
										<select type="text" name="ns36" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">5. Guru mudah dihubungi jika diperlukan</label>
									<div class="col-sm-2">
										<select type="text" name="ns37" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">6. Guru akrab dengan saya dan teman-teman</label>
									<div class="col-sm-2">
										<select type="text" name="ns38" class="form-control" required>
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
									<label class="col-sm-10 col-sm-10 control-label">7. Guru ikut dalam kegiatan sekolah seperti ibadah, upacara, perayaan natal, paskah, senam bersama, dll</label>
									<div class="col-sm-2">
										<select type="text" name="ns39" class="form-control" required>
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
										<a style="margin-left:10px;width:80px" href="?module=siswa" class="btn btn-white"> Batal</a>
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
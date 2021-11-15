<?php

if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
	echo "<meta http-equiv='refresh' content='0; url=index.php?code=1'>";
} else {
	if ($_GET['module'] == 'home') { ?>
		<!-- maka tampilkan -->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<div class="panel-body">
						<form class="form-inline" method="POST" action="?module=chart">
							<?php
							if ($_SESSION['level'] == 'Pengawas Sekolah') { ?>
								<div class="form-group">
									<div class="col-sm-4">
										<select style="width:300px" type="text" id="sekolah" name="sekolah" class="">
											<option value=""></option>

											<?php
											$sql = $db->database_prepare("  SELECT npsn, nama_sekolah FROM tbl_sekolah
	                                                                        ORDER BY nama_sekolah ASC")->execute();
											while ($data = $db->database_fetch_array($sql)) {
												echo "<option value=\"$data[nama_sekolah]\"> $data[nama_sekolah] </option>";
											}
											?>
											<option value="xxx">xxx</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-4">
										<select style="width:200px" type="text" id="tahun_ajaran" name="tahun_ajaran" class="">
											<option value=""></option>
											<?php
											$sql = $db->database_prepare("  SELECT tahun_ajaran FROM tbl_periode
	                                        								GROUP BY tahun_ajaran
	                                                                        ORDER BY tahun_ajaran DESC")->execute();
											while ($data = $db->database_fetch_array($sql)) {
												echo "<option value=\"$data[tahun_ajaran]\"> $data[tahun_ajaran] </option>";
											}
											?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-4">
										<select style="width:200px" type="text" id="periode" name="periode" class="">
											<option value=""></option>
											<?php
											$sql = $db->database_prepare("  SELECT periode FROM tbl_periode
	                                                                        ORDER BY periode DESC")->execute();
											while ($data = $db->database_fetch_array($sql)) {
												echo "<option value=\"$data[periode]\"> $data[periode] </option>";
											}
											?>
										</select>
									</div>
								</div>
							<?php
							} else {

								$data_periode = $db->database_fetch_array($db->database_prepare("SELECT periode, tahun_ajaran, status
                                                            								 FROM tbl_periode
                                                            								 WHERE status = 'on'")->execute());
							?>
								<div class="form-group">
									<div class="col-sm-4">
										<select style="width:200px" type="text" id="tahun_ajaran" name="tahun_ajaran" class="">
											<option value="<?php echo $data_periode['tahun_ajaran']; ?>"><?php echo $data_periode['tahun_ajaran']; ?></option>
											<?php
											$sql = $db->database_prepare("  SELECT tahun_ajaran FROM tbl_periode
	                                        								GROUP BY tahun_ajaran
	                                                                        ORDER BY tahun_ajaran DESC")->execute();
											while ($data = $db->database_fetch_array($sql)) {
												echo "<option value=\"$data[tahun_ajaran]\"> $data[tahun_ajaran] </option>";
											}
											?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-4">
										<select style="width:200px" type="text" id="periode" name="periode" class="">
											<option value="<?php echo $data_periode['periode']; ?>"><?php echo $data_periode['periode']; ?></option>
											<?php
											$sql = $db->database_prepare("  SELECT periode FROM tbl_periode
	                                                                        ORDER BY periode DESC")->execute();
											while ($data = $db->database_fetch_array($sql)) {
												echo "<option value=\"$data[periode]\"> $data[periode] </option>";
											}
											?>
										</select>
									</div>
								</div>
							<?php
							}
							?>
							<button class="btn btn-primary pull-right" type="submit">Tampilkan</button>
						</form>
					</div>
				</section>
			</div>
		</div>

		<?php
		if ($_SESSION['level'] == 'Pengawas Sekolah') { ?>
			<div class="row">
				<div class="col-lg-12">

				</div>
			</div>
		<?php
		} else { ?>

			<div class="row">
				<div class="col-lg-9">
					<section class="panel">
						<div class="panel-body">
							<div id="nilai_pkg" style="min-width: 500px; height: 250px; max-width: 600px; margin: 0 auto"></div>
							<div id="nilai_pkg2" style="min-width: 500px; height: 250px; max-width: 600px; margin: 0 auto"></div>
						</div>
					</section>
				</div>

				<div class="col-md-3">
					<section class="panel tasks-widget">
						<header class="panel-heading">
							Kinerja Guru
						</header>
						<div class="panel-body">
							<div class="task-content">
								<ul class="task-list">
									<?php
									$sql = $db->database_prepare("SELECT a.guru_dinilai,a.angka_kredit,
                            							  b.nip,b.nama_guru
                            							  FROM tbl_penilaian as a
                            							  JOIN tbl_guru as b
                            							  ON a.guru_dinilai=b.nip
	                                                      ORDER BY a.angka_kredit ASC")->execute();
									while ($data = $db->database_fetch_array($sql)) {
										echo "	<li>
		                                    <div class='task-title'>
		                                        <span class='task-title-sp'>$data[nama_guru]</span>
		                                        <span class='badge badge-sm label-success'>$data[angka_kredit]</span>
		                                    </div>
		                                </li>";
									}
									?>

								</ul>
							</div>
						</div>
					</section>
				</div>
			</div>
		<?php
		}
		?>


	<?php
	} elseif ($_GET['module'] == 'chart') { ?>
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<div class="panel-body">
						<form class="form-inline" method="POST" action="?module=chart">
							<?php
							if ($_SESSION['level'] == 'Pengawas Sekolah') { ?>
								<div class="form-group">
									<div class="col-sm-4">
										<select style="width:300px" type="text" id="sekolah" name="sekolah" class="">
											<option value="<?php echo $_POST['sekolah']; ?>"><?php echo $_POST['sekolah']; ?></option>
											<?php
											$sql = $db->database_prepare("  SELECT npsn, nama_sekolah FROM tbl_sekolah
                                                                            ORDER BY nama_sekolah ASC")->execute();
											while ($data = $db->database_fetch_array($sql)) {
												echo "<option value=\"$data[nama_sekolah]\"> $data[nama_sekolah] </option>";
											}
											?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-4">
										<select style="width:200px" type="text" id="tahun_ajaran" name="tahun_ajaran" class="">
											<option value="<?php echo $_POST['tahun_ajaran']; ?>"><?php echo $_POST['tahun_ajaran']; ?></option>
											<?php
											$sql = $db->database_prepare("  SELECT tahun_ajaran FROM tbl_periode
                                                                            GROUP BY tahun_ajaran
                                                                            ORDER BY tahun_ajaran DESC")->execute();
											while ($data = $db->database_fetch_array($sql)) {
												echo "<option value=\"$data[tahun_ajaran]\"> $data[tahun_ajaran] </option>";
											}
											?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-4">
										<select style="width:200px" type="text" id="periode" name="periode" class="">
											<option value="<?php echo $_POST['periode']; ?>"><?php echo $_POST['periode']; ?></option>
											<?php
											$sql = $db->database_prepare("  SELECT periode FROM tbl_periode
                                                                            ORDER BY periode DESC")->execute();
											while ($data = $db->database_fetch_array($sql)) {
												echo "<option value=\"$data[periode]\"> $data[periode] </option>";
											}
											?>
										</select>
									</div>
								</div>
							<?php
							} else { ?>
								<div class="form-group">
									<div class="col-sm-4">
										<select style="width:200px" type="text" id="tahun_ajaran" name="tahun_ajaran" class="">
											<option value="<?php echo $_POST['tahun_ajaran']; ?>"><?php echo $_POST['tahun_ajaran']; ?></option>
											<?php
											$sql = $db->database_prepare("  SELECT tahun_ajaran FROM tbl_periode
                                                                            GROUP BY tahun_ajaran
                                                                            ORDER BY tahun_ajaran DESC")->execute();
											while ($data = $db->database_fetch_array($sql)) {
												echo "<option value=\"$data[tahun_ajaran]\"> $data[tahun_ajaran] </option>";
											}
											?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-4">
										<select style="width:200px" type="text" id="periode" name="periode" class="">
											<option value="<?php echo $_POST['periode']; ?>"><?php echo $_POST['periode']; ?></option>
											<?php
											$sql = $db->database_prepare("  SELECT periode FROM tbl_periode
                                                                            ORDER BY periode DESC")->execute();
											while ($data = $db->database_fetch_array($sql)) {
												echo "<option value=\"$data[periode]\"> $data[periode] </option>";
											}
											?>
										</select>
									</div>
								</div>
							<?php
							}
							?>

							<button class="btn btn-primary pull-right" type="submit">Tampilkan</button>
						</form>
					</div>
				</section>
			</div>
		</div>

		<div class="alert alert-info alert-block fade in">
			<button data-dismiss="alert" class="close close-sm" type="button">
				<i class="icon-remove"></i>
			</button>
			<p style="font-size:15px">Monitoring Kinerja Guru <?php echo $_POST['sekolah']; ?> Tahun Ajaran <?php echo $_POST['tahun_ajaran']; ?> Periode <?php echo $_POST['periode']; ?>.</p>
		</div>

		<div class="row">
			<div class="col-lg-9">
				<section class="panel">
					<div class="panel-body">
						<div id="nilai_pkg" style="min-width: 500px; height: 150px; max-width: 600px; margin: 0 auto"></div>
						<div id="nilai_pkg2" style="min-width: 500px; height: 150px; max-width: 600px; margin: 0 auto"></div>
					</div>
				</section>
			</div>

			<div class="col-md-3">
				<section class="panel tasks-widget">
					<header class="panel-heading">
						Kinerja Guru
					</header>
					<div class="panel-body">
						<div class="task-content">
							<ul class="task-list">
								<?php
								$sql = $db->database_prepare("SELECT a.guru_dinilai,a.angka_kredit,
                            							  b.nip,b.nama_guru
                            							  FROM tbl_penilaian as a
                            							  JOIN tbl_guru as b
                            							  ON a.guru_dinilai=b.nip
	                                                      ORDER BY a.angka_kredit ASC")->execute();
								while ($data = $db->database_fetch_array($sql)) {
									echo "	<li>
		                                    <div class='task-title'>
		                                        <span class='task-title-sp'>$data[nama_guru]</span>
		                                        <span class='badge badge-sm label-success'>$data[angka_kredit]</span>
		                                    </div>
		                                </li>";
								}
								?>

							</ul>
						</div>
					</div>
				</section>
			</div>
		</div>
	<?php
	} elseif ($_GET['module'] == 'identitas') { ?>
		<?php include "modules/identitas/identitas.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'guru') { ?>
		<?php include "modules/guru/guru.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'periode') { ?>
		<?php include "modules/periode/periode.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'data_nilai') { ?>
		<?php include "modules/data_nilai/data_nilai.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'input_nilai') { ?>
		<?php include "modules/input_nilai/input_nilai.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'p1') { ?>
		<?php include "modules/input_nilai/p1.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'p2') { ?>
		<?php include "modules/input_nilai/p2.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'p3') { ?>
		<?php include "modules/input_nilai/p3.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'p4') { ?>
		<?php include "modules/input_nilai/p4.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'p5') { ?>
		<?php include "modules/input_nilai/p5.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'p6') { ?>
		<?php include "modules/input_nilai/p6.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'p7') { ?>
		<?php include "modules/input_nilai/p7.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'k1') { ?>
		<?php include "modules/input_nilai/k1.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'k2') { ?>
		<?php include "modules/input_nilai/k2.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'k3') { ?>
		<?php include "modules/input_nilai/k3.php"; ?>

	<?php
	} elseif ($_GET['module'] == 's1') { ?>
		<?php include "modules/input_nilai/s1.php"; ?>

	<?php
	} elseif ($_GET['module'] == 's2') { ?>
		<?php include "modules/input_nilai/s2.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'pf1') { ?>
		<?php include "modules/input_nilai/pf1.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'pf2') { ?>
		<?php include "modules/input_nilai/pf2.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'hasil_nilai') { ?>
		<?php include "modules/hasil_nilai/hasil_nilai.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'user') { ?>
		<?php include "modules/user/user.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'user2') { ?>
		<?php include "modules/user/user2.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'password') { ?>
		<?php include "modules/password/password.php"; ?>

		<!-- Modul Untuk Penilaian SISWA -->
	<?php
	} elseif ($_GET['module'] == 'input_nilai2') { ?>
		<?php include "modules/input_nilai/input_nilai2.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'siswa') { ?>
		<?php include "modules/input_nilai/siswa.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'data_nilai_siswa') { ?>
		<?php include "modules/data_nilai_siswa/data_nilai_siswa.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'hasil_nilai_siswa') { ?>
		<?php include "modules/hasil_nilai/hasil_nilai_siswa.php"; ?>

		<!-- Modul Untuk Penilaian ORTU -->
	<?php
	} elseif ($_GET['module'] == 'input_nilai_ortu') { ?>
		<?php include "modules/input_nilai/input_nilai_ortu.php"; ?>
	<?php
	} elseif ($_GET['module'] == 'ortu') { ?>
		<?php include "modules/input_nilai/ortu.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'data_nilai_ortu') { ?>
		<?php include "modules/data_nilai_ortu/data_nilai_ortu.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'hasil_nilai_ortu') { ?>
		<?php include "modules/hasil_nilai/hasil_nilai_ortu.php"; ?>

		<!-- Modul Untuk Penilaian TEMAN SEJAWAT -->
	<?php
	} elseif ($_GET['module'] == 'input_nilai_sejawat') { ?>
		<?php include "modules/input_nilai/input_nilai_sejawat.php"; ?>
	<?php
	} elseif ($_GET['module'] == 'sejawat') { ?>
		<?php include "modules/input_nilai/sejawat.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'data_nilai_sejawat') { ?>
		<?php include "modules/data_nilai_sejawat/data_nilai_sejawat.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'hasil_nilai_sejawat') { ?>
		<?php include "modules/hasil_nilai/hasil_nilai_sejawat.php"; ?>

		<!-- Modul Untuk Penilaian INTERNAL -->
	<?php
	} elseif ($_GET['module'] == 'input_nilai_internal') { ?>
		<?php include "modules/input_nilai/input_nilai_internal.php"; ?>
	<?php
	} elseif ($_GET['module'] == 'internal') { ?>
		<?php include "modules/input_nilai/sejawat.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'data_nilai_internal') { ?>
		<?php include "modules/data_nilai_internal/data_nilai_internal.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'hasil_nilai_internal') { ?>
		<?php include "modules/hasil_nilai/hasil_nilai_internal.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'pelayan') { ?>
		<?php include "modules/input_nilai/pelayan.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'akademik') { ?>
		<?php include "modules/input_nilai/akademik.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'spiritual') { ?>
		<?php include "modules/input_nilai/spiritual.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'alkitab') { ?>
		<?php include "modules/input_nilai/alkitab.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'mentor') { ?>
		<?php include "modules/input_nilai/mentor.php"; ?>

	<?php
	} elseif ($_GET['module'] == 'karakter') { ?>
		<?php include "modules/input_nilai/karakter.php"; ?>

<?php
	}
}
?>
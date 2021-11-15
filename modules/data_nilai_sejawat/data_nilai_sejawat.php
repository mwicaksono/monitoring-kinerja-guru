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
						<p>data penilaian baru berhasil disimpan.</p>
					</div>
				</div>
			</div>
		<?php
		}
		if ($_GET['code'] == 2) {
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
						<p>data penilaian berhasil diubah.</p>
					</div>
				</div>
			</div>
		<?php
		}
		if ($_GET['code'] == 3) {
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
						<p>data penilaian berhasil dihapus.</p>
					</div>
				</div>
			</div>
		<?php
		}
		?>
		<?php if ($_GET['code'] == 4) { ?>
			<div class="row">
				<div class="panel-body">
					<div class="alert alert-danger alert-block fade in">
						<button data-dismiss="alert" class="close close-sm" type="button">
							<i class="icon-remove"></i>
						</button>
						<h4>
							<i class="icon-exclamation-sign"></i>
							Gagal!
						</h4>
						<p>Data Guru Sudah Ada / Ditambahkan!.</p>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>

	<?php
	switch ($_GET['act']) {
		default:
	?>
			<div class="row">
				<div class="col-lg-12">
					<section class="panel">
						<header style="font-size:18px" class="panel-heading">
							<i style="margin-right:7px" class="icon-list-alt"></i> Data Penilaian Guru Oleh Teman Sejawat
							<a href="?module=data_nilai_sejawat&act=add">
								<button style="margin-top:-4px" class="btn btn-primary pull-right"><i class="icon-plus icon-white"></i> Tambah</button>
							</a>
							<a href="?module=data_nilai_sejawat&act=add_new_guru">
								<button style="margin-top:-4px; margin-right: 5px;" class="btn btn-primary pull-right"><i class="icon-plus icon-white"></i> Tambah <b>(Jika Ada Data Guru Baru Yang Ditambahkan)</b></button>
							</a>
						</header>
						<div class="panel-body">
							<div class="adv-table">
								<table class="display table table-striped table-bordered table-hover" id="example">
									<thead>
										<tr>
											<th>No</th>
											<th>Periode</th>
											<th>Tahun Ajaran</th>
											<th>Teman Sejawat Penilai</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$sql = $db->database_prepare("SELECT 
										a.id_nilai, a.periode_nilai, a.guru_dinilai, a.sejawat_penilai,
                                        b.id_periode, b.periode, b.tahun_ajaran,
                                        c.nip, c.nama_guru as nama_gurua, c.gelar as gelara,
                                        d.id_user, d.nama as nama
										FROM tbl_penilaian_sejawat AS a
										JOIN tbl_periode AS b
										JOIN tbl_guru AS c
										JOIN tbl_user AS d
										ON a.periode_nilai=b.id_periode 
										AND a.guru_dinilai=c.nip
										AND a.sejawat_penilai=d.id_user
										WHERE d.level ='Teman Sejawat'
										GROUP BY d.nama
										ORDER BY a.id_nilai DESC")->execute();
										while ($data = $db->database_fetch_array($sql)) {
											echo "
								<tr class='gradeX'>
									<td width='80' class='center'>$no</td>
									<td width='100' class='center'>$data[periode]</td>
                                    <td width='150' class='center'>$data[tahun_ajaran]</td>
                                    <td>$data[nama]</td>
									<td width='100' class='center'>";
										?>
											<a title="Hapus" href="modules/data_nilai_sejawat/aksi_data_nilai_sejawat.php?mod=data_nilai_sejawat&act=delete&id=<?php echo $data['sejawat_penilai']; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');">
												<button class="btn btn-danger btn-xs"><i class="icon-trash"></i> </button>
											</a>
										<?php
											echo "</td>
								</tr>";
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

		case "add":
			$data = $db->database_fetch_array($db->database_prepare("SELECT id_periode, periode, tahun_ajaran FROM tbl_periode 
                                                             WHERE status='on'")->execute());
		?>
			<div class="row">
				<div class="col-lg-12">
					<section class="panel">
						<header class="panel-heading">
							<i class="icon-edit"></i> Input data penilaian baru <b>(Teman Sejawat)</b>
						</header>
						<div class="panel-body">
							<form class="form-horizontal" action="modules/data_nilai_sejawat/aksi_data_nilai_sejawat.php?mod=data_nilai_sejawat&act=input" method="POST" name="frmdatanilai">

								<input type="hidden" name="id_periode" value="<?php echo $data['id_periode']; ?>">

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Periode</label>
									<div class="col-sm-3">
										<input type="text" name="periode" class="form-control" autocomplete="off" required="true" readonly="" value="<?php echo $data['periode']; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Tahun Ajaran</label>
									<div class="col-sm-3">
										<input type="text" name="tahun_ajaran" class="form-control" autocomplete="off" required="true" readonly="" value="<?php echo $data['tahun_ajaran']; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Teman Sejawat Penilai</label>
									<div class="col-sm-4">
										<select style="width:387px" type="text" id="sejawat_penilai" name="sejawat_penilai" class="form-control" required>
											<option value="">-- Pilih Teman Sejawat --</option>
											<?php
											$sqluser = $db->database_prepare("SELECT id_user, nama FROM tbl_user
                                                                        WHERE level='Teman Sejawat' ORDER BY nama ASC")->execute();
											while ($datauser = $db->database_fetch_array($sqluser)) {
												echo "<option value=\"$datauser[id_user]\"> $datauser[nama] </option>";
											}
											?>
										</select>
									</div>
								</div>
								<hr />
								<div class="form-group">
									<div class="col-lg-offset-2 col-lg-10">
										<button type="submit" class="btn btn-primary"> Simpan</button>
										<a style="margin-left:10px;width:80px" href="?module=data_nilai_sejawat" class="btn btn-white"> Batal</a>
									</div>
								</div>
							</form>
						</div>
					</section>
				</div>
			</div>

		<?php
			break;

		case "add_new_guru":
			$data = $db->database_fetch_array($db->database_prepare("SELECT id_periode, periode, tahun_ajaran FROM tbl_periode 
																	 WHERE status='on'")->execute());
		?>
			<div class="row">
				<div class="col-lg-12">
					<section class="panel">
						<header class="panel-heading">
							<i class="icon-edit"></i> Input data penilaian baru <b>(Teman Sejawat)</b>
						</header>
						<div class="panel-body">
							<form class="form-horizontal" action="modules/data_nilai_sejawat/aksi_data_nilai_sejawat.php?mod=data_nilai_sejawat&act=input_new_guru" method="POST" name="frmdatanilai">

								<input type="hidden" name="id_periode" value="<?php echo $data['id_periode']; ?>">

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Periode</label>
									<div class="col-sm-3">
										<input type="text" name="periode" class="form-control" autocomplete="off" required="true" readonly="" value="<?php echo $data['periode']; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Tahun Ajaran</label>
									<div class="col-sm-3">
										<input type="text" name="tahun_ajaran" class="form-control" autocomplete="off" required="true" readonly="" value="<?php echo $data['tahun_ajaran']; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Teman Sejawat Penilai</label>
									<div class="col-sm-4">
										<select style="width:387px" type="text" id="guru_penilai" name="sejawat_penilai" required>
											<option value="">-- Pilih Teman Sejawat --</option>
											<?php
											$sqluser = $db->database_prepare("SELECT id_user, nama FROM tbl_user
                                                                        WHERE level='Teman Sejawat' ORDER BY nama ASC")->execute();
											while ($datauser = $db->database_fetch_array($sqluser)) {
												echo "<option value=\"$datauser[id_user]\"> $datauser[nama] </option>";
											}
											?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Guru Dinilai</label>
									<div class="col-sm-4">
										<select style="width:387px" type="text" id="guru_dinilai" name="guru_dinilai" required>
											<option value=""></option>
											<?php
											$sql = $db->database_prepare("  SELECT nip, nama_guru, gelar FROM tbl_guru
                                                                        ORDER BY nama_guru ASC")->execute();
											while ($data = $db->database_fetch_array($sql)) {
												echo "<option value=\"$data[nip]\"> $data[nama_guru], $data[gelar] ($data[nip]) </option>";
											}
											?>
										</select>
									</div>
								</div>

								<hr />
								<div class="form-group">
									<div class="col-lg-offset-2 col-lg-10">
										<button type="submit" class="btn btn-primary"> Simpan</button>
										<a style="margin-left:10px;width:80px" href="?module=data_nilai_sejawat" class="btn btn-white"> Batal</a>
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
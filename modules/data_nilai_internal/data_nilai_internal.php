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
	</div>

	<?php
	switch ($_GET['act']) {
		default:
	?>
			<div class="row">
				<div class="col-lg-12">
					<section class="panel">
						<header style="font-size:18px" class="panel-heading">
							<i style="margin-right:7px" class="icon-list-alt"></i> Data Penilaian Lembaga
							<a href="?module=data_nilai_internal&act=add">
								<button style="margin-top:-4px" class="btn btn-primary pull-right"><i class="icon-plus icon-white"></i> Tambah</button>
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
											<th>Guru Dinilai</th>
											<th>Guru Penilai</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$sql = $db->database_prepare("SELECT 
										a.id_nilai, a.periode_nilai, a.guru_dinilai, a.guru_penilai,
                                        b.id_periode, b.periode, b.tahun_ajaran,
										c.nip, c.nama_guru as nama_gurua, c.gelar as gelara,
										d.nip, d.nama_guru as nama_gurub, d.gelar as gelarb
										FROM tbl_penilaian_internal AS a
										JOIN tbl_periode AS b
										JOIN tbl_guru AS c
										JOIN tbl_guru AS d
										ON a.periode_nilai=b.id_periode 
										AND a.guru_dinilai=c.nip
										AND a.guru_penilai=d.nip
										ORDER BY a.id_nilai DESC")->execute();
										while ($data = $db->database_fetch_array($sql)) {
											echo "
								<tr class='gradeX'>
									<td width='80' class='center'>$no</td>
									<td width='100' class='center'>$data[periode]</td>
                                    <td width='150' class='center'>$data[tahun_ajaran]</td>
                                    <td>$data[nama_gurua], $data[gelara] ($data[guru_dinilai])</td>
									<td>$data[nama_gurub], $data[gelarb] ($data[guru_penilai])</td>
									<td width='100' class='center'>
										<a title='Ubah' href='?module=data_nilai_internal&act=edit&id=$data[id_nilai]'>
											<button class='btn btn-primary btn-xs'><i class='icon-pencil'></i> </button>
										</a> ";
										?>
											<a title="Hapus" href="modules/data_nilai_internal/aksi_data_nilai_internal.php?mod=data_nilai_internal&act=delete&id=<?php echo $data['id_nilai']; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');">
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
							<i class="icon-edit"></i> Input data penilaian baru
						</header>
						<div class="panel-body">
							<form class="form-horizontal" action="modules/data_nilai_internal/aksi_data_nilai_internal.php?mod=data_nilai_internal&act=input" method="POST" name="frmdatanilai">

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
									<label class="col-sm-2 col-sm-2 control-label">Guru Dinilai</label>
									<div class="col-sm-4">
										<select style="width:387px" type="text" id="guru_dinilai" name="guru_dinilai" class="" required>
											<option value=""></option>
											<?php
											$sql = $db->database_prepare("SELECT nip, nama_guru, gelar FROM tbl_guru
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
										<a style="margin-left:10px;width:80px" href="?module=data_nilai_internal" class="btn btn-white"> Batal</a>
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
			$dataedit = $db->database_fetch_array($db->database_prepare("SELECT 
		 a.id_nilai, a.periode_nilai, a.guru_dinilai,
		 b.id_periode,b.periode,b.tahun_ajaran,
		 c.nip, c.nama_guru, c.gelar
		FROM tbl_penilaian_internal AS a
		JOIN tbl_periode AS b
		JOIN tbl_guru AS c
		ON a.periode_nilai=b.id_periode 
		AND a.guru_dinilai=c.nip
		WHERE a.id_nilai = ?")->execute($_GET["id"]));
		?>
			<div class="row">
				<div class="col-lg-12">
					<section class="panel">
						<header class="panel-heading">
							<i class="icon-edit"></i> Ubah data nilai
						</header>
						<div class="panel-body">
							<form class="form-horizontal" action="modules/data_nilai_internal/aksi_data_nilai_internal.php?mod=data_nilai_internal&act=update" method="POST" name="frmdatanilai">

								<input type="hidden" name="id" value="<?php echo $dataedit['id_nilai']; ?>">

								<input type="hidden" name="id_periode" value="<?php echo $dataedit['id_periode']; ?>">

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Periode</label>
									<div class="col-sm-3">
										<input type="text" name="periode" class="form-control" autocomplete="off" required="true" readonly="" value="<?php echo $dataedit['periode']; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Tahun Ajaran</label>
									<div class="col-sm-3">
										<input type="text" name="tahun_ajaran" class="form-control" autocomplete="off" required="true" readonly="" value="<?php echo $dataedit['tahun_ajaran']; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Guru Dinilai</label>
									<div class="col-sm-4">
										<select style="width:387px" type="text" id="guru_dinilai" name="guru_dinilai" class="">
											<option value="<?php echo $dataedit['guru_dinilai']; ?>"><?php echo $dataedit['nama_guru']; ?>, <?php echo $dataedit['gelar']; ?> (<?php echo $dataedit['guru_dinilai']; ?>)</option>
											<?php
											$sql = $db->database_prepare("SELECT nip, nama_guru, gelar FROM tbl_guru
                                                                        ORDER BY nama_guru ASC")->execute();
											while ($dataguru = $db->database_fetch_array($sql)) {
												echo "<option value=\"$dataguru[nip]\"> $dataguru[nama_guru], $dataguru[gelar] ($dataguru[nip]) </option>";
											}
											?>
										</select>
									</div>
								</div>
								<?php
								$datab = $db->database_fetch_array($db->database_prepare("SELECT
								a.id_nilai, a.guru_dinilai, a.guru_penilai,
								b.nip, b.nama_guru, b.gelar
								FROM tbl_penilaian_internal AS a
								JOIN tbl_guru AS b
								ON a.guru_penilai=b.nip
								WHERE a.id_nilai = ?")->execute($_GET["id"]));
								?>
								<div class="form-group">

									<label class="col-sm-2 col-sm-2 control-label">Guru Penilai</label>
									<div class="col-sm-4">
										<select style="width:387px" type="text" id="guru_penilai" name="guru_penilai" class="">
											<option value="<?php echo $datab['guru_penilai']; ?>"><?php echo $datab['nama_guru']; ?>, <?php echo $datab['gelar']; ?> (<?php echo $datab['guru_penilai']; ?>)</option>
											<?php
											$sql = $db->database_prepare("SELECT nip, nama_guru, gelar FROM tbl_guru
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
										<a style="margin-left:10px;width:80px" href="?module=data_nilai_internal" class="btn btn-white"> Batal</a>
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
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
						<p>user baru telah berhasil disimpan.</p>
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
						<p>user berhasil diubah.</p>
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
						<p>user berhasil dihapus.</p>
					</div>
				</div>
			</div>
		<?php
		}
		if ($_GET['code'] == 4) {
		?>
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
						<p>user sudah ada.</p>
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
							<i style="margin-right:7px" class="icon-user"></i> Data User
							<a href="?module=user&act=add">
								<button style="margin-top:-4px; margin-left: 8px;" class="btn btn-primary pull-right"><i class="icon-plus icon-white"></i> Tambah User</button>
							</a>
						</header>
						<div class="panel-body">
							<div class="adv-table">
								<table class="display table table-bordered table-striped table-hover" id="example">
									<thead>
										<tr>
											<th>No</th>
											<th>Username</th>
											<th>NIY</th>
											<th>Nama</th>
											<th>Level</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$sql_user = $db->database_prepare(" SELECT a.id_user,a.username,a.nip,a.level,
                                                                b.nip,b.nama_guru
                                                                FROM tbl_user AS a
                                                                JOIN tbl_guru AS b
                                                                ON a.nip=b.nip
                                                                ORDER BY a.username ASC")->execute();
										while ($data_user = $db->database_fetch_array($sql_user)) {

											echo "
                                        <tr class='gradeX'>
                                            <td width='50' class='center'>$no</td>
                                            <td>$data_user[username]</td>
                                            <td width='220' class='center'>$data_user[nip]</td>
                                            <td>$data_user[nama_guru]</td>
                                            <td>$data_user[level]</td>
                                            <td width='100' class='center'>
                                                <a title='Edit' href='?module=user&act=edit&id=$data_user[id_user]'>
                                                    <button class='btn btn-primary btn-xs'><i class='icon-pencil'></i> </button>
                                                </a> ";

										?>
											<a title="Hapus" href="modules/user/aksi_user.php?mod=user&act=delete&id=<?php echo $data_user['id_user']; ?>" onclick="return confirm('Anda yakin ingin menghapus user <?php echo $data_user['username']; ?>?');">
												<button class="btn btn-danger btn-xs"><i class="icon-trash"></i> </button>
											</a>

										<?php
											echo "      </td>
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
		?>
			<div class="row">
				<div class="col-lg-12">
					<section class="panel">
						<header class="panel-heading">
							<i class="icon-edit"></i> Input data user <b>(Guru)</b>
						</header>
						<div class="panel-body">
							<form class="form-horizontal" action="modules/user/aksi_user.php?mod=user&act=input" method="POST">

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nama Guru</label>
									<div class="col-sm-4">
										<select style="width:387px" type="text" id="guru" name="guru" class="" required>
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

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Username</label>
									<div class="col-sm-4">
										<input type="text" name="username" class="form-control" autocomplete="off" required="true" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Password</label>
									<div class="col-sm-4">
										<input type="password" name="password" class="form-control" required="true" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Level</label>
									<div class="col-sm-3">
										<select style="width:300px" type="text" id="level" name="level" class="" required="true">
											<option value=""></option>
											<option value="Admin">Admin</option>
											<option value="Guru">Guru</option>
											<option value="Kepala Sekolah">Kepala Sekolah</option>
										</select>
									</div>
								</div>
								<hr />
								<div class="form-group">
									<div class="col-lg-offset-2 col-lg-10">
										<button type="submit" class="btn btn-primary">Simpan</button>
										<a style="margin-left:10px;width:80px" href="?module=user" class="btn btn-white">Batal</a>
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
			$data_user = $db->database_fetch_array($db->database_prepare("SELECT a.id_user,a.username,a.password,a.nip,a.level,
                                                                  b.nip,b.nama_guru,b.gelar
                                                                  FROM tbl_user AS a
                                                                  JOIN tbl_guru AS b
                                                                  ON a.nip=b.nip
                                                                  AND id_user = ?")->execute($_GET["id"]));
		?>
			<div class="row">
				<div class="col-lg-12">
					<section class="panel">
						<header class="panel-heading">
							<i class="icon-edit"></i> Ubah data user
						</header>
						<div class="panel-body">
							<form class="form-horizontal" action="modules/user/aksi_user.php?mod=user&act=update" method="POST" enctype="multipart/form-data" name="frmUser">

								<input type="hidden" name="id" value="<?php echo $data_user['id_user']; ?>">

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nama Guru</label>
									<div class="col-sm-4">
										<input type="text" name="guru" class="form-control" readonly="" value="<?php echo $data_user['nama_guru']; ?>,<?php echo $data_user['gelar']; ?> (<?php echo $data_user['nip']; ?>)" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Username</label>
									<div class="col-sm-4">
										<input type="text" name="username" class="form-control" autocomplete="off" required="true" value="<?php echo $data_user['username']; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Password</label>
									<div class="col-sm-4">
										<input type="password" name="password" class="form-control" />
										<span class="help-block">* kosongkan jika tidak diubah.</span>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Level</label>
									<div class="col-sm-3">
										<select style="width:300px" type="text" id="level" name="level" class="" required="true">
											<option value="<?php echo $data_user['level']; ?>"><?php echo $data_user['level']; ?></option>
											<option value="Admin">Admin</option>
											<option value="Guru">Guru</option>
											<option value="Kepala Sekolah">Kepala Sekolah</option>
											<option value="Siswa">Siswa</option>
											<option value="Orang Tua">Orang Tua</option>
											<option value="Teman Sejawat">Teman Sejawat</option>
										</select>
									</div>
								</div>
								<hr />
								<div class="form-group">
									<div class="col-lg-offset-2 col-lg-10">
										<button type="submit" class="btn btn-primary">Simpan</button>
										<a style="margin-left:10px;width:80px" href="?module=user" class="btn btn-white">Batal</a>
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
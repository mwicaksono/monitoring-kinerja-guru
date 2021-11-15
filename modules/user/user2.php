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
							<i style="margin-right:7px" class="icon-group"></i> Data User Siswa, Orang Tua, dan Teman Sejawat
							<a href="?module=user2&act=add">
								<button style="margin-top:-4px" class="btn btn-primary pull-right"><i class="icon-plus icon-white"></i> Tambah User</button>
							</a>
						</header>
						<div class="panel-body">
							<div class="adv-table">
								<table class="display table table-bordered table-striped table-hover" id="example">
									<thead>
										<tr>
											<th>No</th>
											<th>Username</th>
											<th>Nama</th>
											<th>Level</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$sql_user = $db->database_prepare(" SELECT id_user,username,nama,level
                                                                FROM tbl_user
																WHERE level='Siswa' OR level='Orang Tua' OR level='Teman Sejawat'
                                                                ORDER BY username ASC")->execute();
										while ($data_user = $db->database_fetch_array($sql_user)) {

											echo "
                                        <tr class='gradeX'>
                                            <td width='50' class='center'>$no</td>
                                            <td>$data_user[username]</td>
                                            <td>$data_user[nama]</td>
                                            <td>$data_user[level]</td>
                                            <td width='100' class='center'>
                                                <a title='Edit' href='?module=user2&act=edit&id=$data_user[id_user]'>
                                                    <button class='btn btn-primary btn-xs'><i class='icon-pencil'></i> </button>
                                                </a> ";

										?>
											<a title="Hapus" href="modules/user/aksi_user2.php?mod=user2&act=delete&id=<?php echo $data_user['id_user']; ?>" onclick="return confirm('Anda yakin ingin menghapus user <?php echo $data_user['username']; ?>?');">
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
							<i class="icon-edit"></i> Input data user <b>(Siswa / Orang Tua / Teman Sejawat)</b>
						</header>
						<div class="panel-body">
							<form class="form-horizontal" action="modules/user/aksi_user2.php?mod=user2&act=input" method="POST">


								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nama</label>
									<div class="col-sm-4">
										<input type="text" name="nama" class="form-control" autocomplete="off" required="true" />
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

		case "edit":
			$data_edit = $db->database_fetch_array($db->database_prepare("SELECT id_user,username,password,nama,level,nip
                                                                  FROM tbl_user
                                                                  WHERE id_user = ?")->execute($_GET["id"]));
		?>
			<div class="row">
				<div class="col-lg-12">
					<section class="panel">
						<header class="panel-heading">
							<i class="icon-edit"></i> Ubah data user
						</header>
						<div class="panel-body">
							<form class="form-horizontal" action="modules/user/aksi_user2.php?mod=user2&act=update" method="POST" enctype="multipart/form-data" name="frmUser">

								<input type="hidden" name="id" value="<?php echo $data_edit['id_user']; ?>">


								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nama</label>
									<div class="col-sm-4">
										<input type="text" name="nama" class="form-control" autocomplete="off" required="true" value="<?php echo $data_edit['nama']; ?>" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Username</label>
									<div class="col-sm-4">
										<input type="text" name="username" class="form-control" autocomplete="off" required="true" value="<?php echo $data_edit['username']; ?>" />
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
											<option value="<?php echo $data_edit['level']; ?>"><?php echo $data_edit['level']; ?></option>
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
										<a style="margin-left:10px;width:80px" href="?module=user2" class="btn btn-white">Batal</a>
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
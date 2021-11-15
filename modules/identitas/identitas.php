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
						<p>data sekolah telah diperbarui.</p>
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

			$data = $db->database_fetch_array($db->database_prepare("SELECT * FROM tbl_sekolah
                                                             WHERE id_sekolah = '1'")->execute());
	?>
			<div class="row">
				<div class="col-lg-12">
					<section class="panel">
						<header class="panel-heading">
							<i style="margin-right:5px;" class="icon-leaf"></i> Identitas Sekolah
						</header>
						<div class="panel-body">
							<form class="form-horizontal" action="modules/identitas/aksi_identitas.php" method="POST" enctype="multipart/form-data" name="frmIdentitas" target="_self">

								<input type="hidden" name="id" value="<?php echo $data['id_sekolah']; ?>">

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">NPSN</label>
									<div class="col-sm-3">
										<input type="text" name="npsn" class="form-control" autocomplete="off" required="true" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['npsn']; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nama Sekolah</label>
									<div class="col-sm-4">
										<input type="text" name="nama" class="form-control" autocomplete="off" required="true" value="<?php echo $data['nama_sekolah']; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Status</label>
									<div class="col-sm-2">
										<select type="text" name="status" class="form-control" required="true">
											<option value="<?php echo $data['status']; ?>"><?php echo $data['status']; ?></option>
											<option value="">-- Pilih Status --</option>
											<option value="Negeri">Negeri</option>
											<option value="Swasta">Swasta</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Kelurahan</label>
									<div class="col-sm-4">
										<input type="text" name="kelurahan" class="form-control" autocomplete="off" required="true" value="<?php echo $data['kelurahan']; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Kecamatan</label>
									<div class="col-sm-4">
										<input type="text" name="kecamatan" class="form-control" autocomplete="off" required="true" value="<?php echo $data['kecamatan']; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Kota/Kabupaten</label>
									<div class="col-sm-4">
										<input type="text" name="kota" class="form-control" autocomplete="off" required="true" value="<?php echo $data['kota']; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Provinsi</label>
									<div class="col-sm-4">
										<input type="text" name="provinsi" class="form-control" autocomplete="off" required="true" value="<?php echo $data['provinsi']; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Kode Pos</label>
									<div class="col-sm-4">
										<input type="text" name="kode_pos" class="form-control" autocomplete="off" required="true" value="<?php echo $data['kode_pos']; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Alamat</label>
									<div class="col-sm-4">
										<textarea type="text" name="alamat" class="form-control" rows="3"><?php echo $data['alamat']; ?></textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Telepon</label>
									<div class="col-sm-2">
										<input type="text" name="telepon" class="form-control" autocomplete="off" maxlength="12" required="true" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['telepon']; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Email</label>
									<div class="col-sm-3">
										<input type="email" name="email" class="form-control" autocomplete="off" required="true" value="<?php echo $data['email']; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Website</label>
									<div class="col-sm-3">
										<input type="text" name="website" class="form-control" autocomplete="off" required="true" value="<?php echo $data['website']; ?>" />
									</div>
								</div>

								<hr />
								<div class="form-group">
									<div class="col-lg-offset-2 col-lg-10">
										<button type="submit" class="btn btn-primary"> Simpan Perubahan</button>
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
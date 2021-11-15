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
	                    <p>data guru baru berhasil disimpan.</p>
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
	                    <p>data guru berhasil diubah.</p>
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
	                    <p>data guru berhasil dihapus.</p>
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
	                        <i style="margin-right:7px" class="icon-group"></i> Data Guru
	                        <a href="?module=guru&act=add">
	                            <button style="margin-top:-4px" class="btn btn-primary pull-right"><i class="icon-plus icon-white"></i> Tambah</button>
	                        </a>
	                    </header>
	                    <div class="panel-body">
	                        <div class="adv-table">
	                            <table class="display table table-striped table-bordered table-hover" id="example">
	                                <thead>
	                                    <tr>
	                                        <th>No</th>
	                                        <th>NIY</th>
	                                        <th>Nama</th>
	                                        <th>No Seri Karpeg</th>
	                                        <th>Pangkat / Golongan</th>
	                                        <th>NUPTK / NRG</th>
	                                        <th>Mata Pelajaran</th>
	                                        <th>Jabatan Fungsional</th>
	                                        <th>Aksi</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                    <?php
                                        $no = 1;
                                        $sql_guru = $db->database_prepare(" SELECT * FROM tbl_guru 
                                                                ORDER BY nama_guru ASC")->execute();
                                        while ($data_guru = $db->database_fetch_array($sql_guru)) {
                                            echo "
								<tr class='gradeX'>
									<td width='50' class='center'>$no</td>
                                    <td width='100' class='center'>$data_guru[nip]</td>
                                    <td width=170'>
                                        <a title='Detail' href='?module=guru&act=detail&id=$data_guru[nip]'>
                                            $data_guru[nama_guru], $data_guru[gelar]
                                        </a>
                                    </td>
                                    <td width='120'>$data_guru[no_seri_karpeg]</td>
                                    <td width='150'>$data_guru[pangkat_golongan]</td>
                                    <td width='120'>$data_guru[nuptk] / $data_guru[nrg]</td>
                                    <td>$data_guru[mata_pelajaran]</td>
                                    <td width='150'>$data_guru[jabatan_fungsional]</td>
									<td width='80' class='center'>
										<a title='Ubah' href='?module=guru&act=edit&id=$data_guru[nip]'>
											<button class='btn btn-primary btn-xs'><i class='icon-pencil'></i> </button>
										</a> ";
                                        ?>
	                                        <a title="Hapus" href="modules/guru/aksi_guru.php?mod=guru&act=delete&id=<?php echo $data_guru['nip']; ?>" onclick="return confirm('Anda yakin ingin menghapus guru <?php echo $data_guru['nama_guru']; ?>?');">
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
        ?>
	        <div class="row">
	            <div class="col-lg-12">
	                <section class="panel">
	                    <header class="panel-heading">
	                        <i class="icon-edit"></i> Input guru baru
	                    </header>
	                    <div class="panel-body">
	                        <form class="form-horizontal" action="modules/guru/aksi_guru.php?mod=guru&act=input" method="POST" name="frmguru">

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">NIY</label>
	                                <div class="col-sm-3">
	                                    <input type="text" name="nip" class="form-control" autocomplete="off" required="true" onKeyPress="return goodchars(event,'0123456789',this)" maxlength="18" />
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Nama Guru</label>
	                                <div class="col-sm-4">
	                                    <input type="text" name="nama_guru" class="form-control" autocomplete="off" required="true" />
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Gelar</label>
	                                <div class="col-sm-3">
	                                    <input type="text" name="gelar" class="form-control" autocomplete="off" required="true" />
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Tempat Lahir</label>
	                                <div class="col-sm-3">
	                                    <input type="text" name="tempat_lahir" class="form-control" autocomplete="off" required="true" />
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
	                                <div class="col-sm-2 col-xs-11">
	                                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="" class="input-append date dpYears">
	                                        <input type="text" name="tanggal_lahir" readonly="" value="" size="16" class="form-control" required="true">
	                                        <span class="input-group-btn add-on">
	                                            <button style="padding:8px" class="btn btn-primary" type="button"><i class="icon-calendar"></i></button>
	                                        </span>
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
	                                <div class="col-sm-3">
	                                    <select style="width:284px" id="jenis_kelamin" name="jenis_kelamin" class="" required="true">
	                                        <option value=""></option>
	                                        <option value="Laki-laki">Laki-laki</option>
	                                        <option value="Perempuan">Perempuan</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Status PNS</label>
	                                <div class="col-sm-3">
	                                    <select style="width:284px" id="status_pns" name="status_pns" class="" required="true">
	                                        <option value=""></option>
	                                        <option value="Guru">Guru</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">No. Seri Karpeg</label>
	                                <div class="col-sm-3">
	                                    <input type="text" name="no_seri_karpeg" class="form-control" autocomplete="off" required="true" />
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Pangkat/Golongan</label>
	                                <div class="col-sm-3">
	                                    <select style="width:284px" id="pangkat_golongan" name="pangkat_golongan" class="" required="true">
	                                        <option value=""></option>
	                                        <option value="Juru Muda / IA">Juru Muda / IA</option>
	                                        <option value="Juru Muda Tingkat I / IB">Juru Muda Tingkat I / IB</option>
	                                        <option value="Juru / IC">Juru / IC</option>
	                                        <option value="Juru Tingkat I / ID">Juru Tingkat I / ID</option>
	                                        <option value="Pengatur Muda / IIA">Pengatur Muda / IIA</option>
	                                        <option value="Pengatur Muda Tingkat I / IIB">Pengatur Muda Tingkat I / IIB</option>
	                                        <option value="Pengatur / IIC">Pengatur / IIC</option>
	                                        <option value="Pengatur Tingkat I / IID">Pengatur Tingkat I / IID</option>
	                                        <option value="Penata Muda / IIIA">Penata Muda / IIIA</option>
	                                        <option value="Penata Muda Tingkat I / IIIB">Penata Muda Tingkat I / IIIB</option>
	                                        <option value="Penata / IIIC">Penata / IIIC</option>
	                                        <option value="Penata Tingkat I / IIID">Penata Tingkat I / IIID</option>
	                                        <option value="Pembina / IVA">Pembina / IVA</option>
	                                        <option value="Pembina Tingkat I / IVB">Pembina Tingkat I / IVB</option>
	                                        <option value="Pembina Utama Muda / IVC">Pembina Utama Muda / IVC</option>
	                                        <option value="Pembina Utama Madya / IVD">Pembina Utama Madya / IVD</option>
	                                        <option value="Pembina Utama / IVE">Pembina Utama / IVE</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">NUPTK</label>
	                                <div class="col-sm-3">
	                                    <input type="text" name="nuptk" class="form-control" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" />
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">NRG</label>
	                                <div class="col-sm-3">
	                                    <input type="text" name="nrg" class="form-control" required autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" />
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Pendidikan Terakhir</label>
	                                <div class="col-sm-3">
	                                    <input type="text" name="pendidikan_terakhir" class="form-control" autocomplete="off" required />
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Mata Pelajaran</label>
	                                <div class="col-sm-3">
	                                    <select style="width:284px" id="matapelajaran" name="matapelajaran" class="" required="true">
	                                        <option value=""></option>
	                                        <option value="Pendidikan Agama">Pendidikan Agama</option>
	                                        <option value="Pendidikan Kewarganegaraan">Pendidikan Kewarganegaraan</option>
	                                        <option value="Bahasa Indonesia">Bahasa Indonesia</option>
	                                        <option value="Matematika">Matematika</option>
	                                        <option value="Bahasa Inggris">Bahasa Inggris</option>
	                                        <option value="Ilmu Pengetahuan Alam">Ilmu Pengetahuan Alam</option>
	                                        <option value="Ilmu Pengetahuan Sosial">Ilmu Pengetahuan Sosial</option>
	                                        <option value="Seni Budaya">Seni Budaya</option>
	                                        <option value="Pendidikan Jasmani, Olahraga dan Kesehatan">Pendidikan Jasmani, Olahraga dan Kesehatan</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Jabatan Fungsional</label>
	                                <div class="col-sm-3">
	                                    <select style="width:284px" id="jabatan_fungsional" name="jabatan_fungsional" class="" required="true">
	                                        <option value=""></option>
	                                        <option value="Guru Muda">Guru Muda</option>
	                                        <option value="Guru Madya">Guru Madya</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Tanggal Mulai Bekerja</label>
	                                <div class="col-sm-2 col-xs-11">
	                                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="" class="input-append date dpYears">
	                                        <input type="text" name="tanggal_bekerja" readonly="" value="" size="16" class="form-control" required="true">
	                                        <span class="input-group-btn add-on">
	                                            <button style="padding:8px" class="btn btn-primary" type="button"><i class="icon-calendar"></i></button>
	                                        </span>
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Masa Kerja</label>
	                                <div class="col-sm-3">
	                                    <input type="text" name="masa_kerja" class="form-control" required autocomplete="off" />
	                                </div>
	                            </div>

	                            <hr />
	                            <div class="form-group">
	                                <div class="col-lg-offset-2 col-lg-10">
	                                    <button type="submit" class="btn btn-primary"> Simpan</button>
	                                    <a style="margin-left:10px;width:80px" href="?module=guru" class="btn btn-white"> Batal</a>
	                                </div>
	                            </div>
	                        </form>
	                    </div>
	                </section>
	            </div>
	        </div>

	    <?php

            break;

        case "detail":
            $data_guru = $db->database_fetch_array($db->database_prepare("  SELECT * FROM tbl_guru 
                                                                    WHERE nip = ?")->execute($_GET["id"]));

            $tgl_lahir       = $data_guru['tanggal_lahir'];
            $explode_lahir   = explode('-', $tgl_lahir);
            $tanggal_lahir   = tgl_eng_to_ind($explode_lahir[2] . "-" . $explode_lahir[1] . "-" . $explode_lahir[0]);

            $tgl_bekerja       = $data_guru['tanggal_bekerja'];
            $explode_bekerja   = explode('-', $tgl_bekerja);
            $tanggal_bekerja   = tgl_eng_to_ind($explode_bekerja[2] . "-" . $explode_bekerja[1] . "-" . $explode_bekerja[0]);
        ?>
	        <div class="row">
	            <div class="col-lg-12">
	                <section class="panel">
	                    <header class="panel-heading">
	                        <i class="icon-edit"></i> Detail guru
	                    </header>
	                    <div class="panel-body">
	                        <form class="form-horizontal tasi-form" action="modules/guru/aksi_guru.php?mod=guru&act=input" method="POST" name="frmguru">

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">NIY</label>
	                                <label class="col-sm-5 col-sm-5 control-label">: <?php echo $data_guru['nip']; ?></label>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Nama Guru</label>
	                                <label class="col-sm-5 col-sm-5 control-label">: <?php echo $data_guru['nama_guru']; ?>, <?php echo $data_guru['gelar']; ?></label>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Tempat, Tanggal Lahir</label>
	                                <label class="col-sm-5 col-sm-5 control-label">: <?php echo $data_guru['tempat_lahir']; ?>, <?php echo $tanggal_lahir; ?></label>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
	                                <label class="col-sm-5 col-sm-5 control-label">: <?php echo $data_guru['jenis_kelamin']; ?></label>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Status PNS</label>
	                                <label class="col-sm-5 col-sm-5 control-label">: <?php echo $data_guru['status_pns']; ?></label>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">No. Seri Karpeg</label>
	                                <label class="col-sm-5 col-sm-5 control-label">: <?php echo $data_guru['no_seri_karpeg']; ?></label>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Pangkat/Golongan</label>
	                                <label class="col-sm-5 col-sm-5 control-label">: <?php echo $data_guru['pangkat_golongan']; ?></label>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">NUPTK</label>
	                                <label class="col-sm-5 col-sm-5 control-label">: <?php echo $data_guru['nuptk']; ?></label>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">NRG</label>
	                                <label class="col-sm-5 col-sm-5 control-label">: <?php echo $data_guru['nrg']; ?></label>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Pendidikan Terakhir</label>
	                                <label class="col-sm-5 col-sm-5 control-label">: <?php echo $data_guru['pendidikan_terakhir']; ?></label>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Mata Pelajaran</label>
	                                <label class="col-sm-5 col-sm-5 control-label">: <?php echo $data_guru['mata_pelajaran']; ?></label>
	                            </div>


	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Jabatan Fungsional</label>
	                                <label class="col-sm-5 col-sm-5 control-label">: <?php echo $data_guru['jabatan_fungsional']; ?></label>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Tanggal Mulai Bekerja</label>
	                                <label class="col-sm-5 col-sm-5 control-label">: <?php echo $tanggal_bekerja; ?></label>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Masa Kerja</label>
	                                <label class="col-sm-5 col-sm-5 control-label">: <?php echo $data_guru['masa_kerja']; ?></label>
	                            </div>

	                            <hr />
	                            <div class="form-group">
	                                <div class="col-lg-offset-2 col-lg-10">
	                                    <a style="width:80px" href="?module=guru" class="btn btn-white"> Kembali</a>
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
            $data_guru = $db->database_fetch_array($db->database_prepare("  SELECT * FROM tbl_guru 
                                                                    WHERE nip = ?")->execute($_GET["id"]));

            $tgl_lahir       = $data_guru['tanggal_lahir'];
            $explode_lahir   = explode('-', $tgl_lahir);
            $tanggal_lahir   = $explode_lahir[2] . "-" . $explode_lahir[1] . "-" . $explode_lahir[0];

            $tgl_bekerja       = $data_guru['tanggal_bekerja'];
            $explode_bekerja   = explode('-', $tgl_bekerja);
            $tanggal_bekerja   = $explode_bekerja[2] . "-" . $explode_bekerja[1] . "-" . $explode_bekerja[0];
        ?>
	        <div class="row">
	            <div class="col-lg-12">
	                <section class="panel">
	                    <header class="panel-heading">
	                        <i class="icon-edit"></i> Ubah guru
	                    </header>
	                    <div class="panel-body">
	                        <form class="form-horizontal" action="modules/guru/aksi_guru.php?mod=guru&act=update" method="POST" name="frmguru">

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">NIYP</label>
	                                <div class="col-sm-3">
	                                    <input type="text" name="nip" class="form-control" required="true" readonly="" value="<?php echo $data_guru['nip']; ?>" />
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Nama Guru</label>
	                                <div class="col-sm-4">
	                                    <input type="text" name="nama_guru" class="form-control" autocomplete="off" required="true" value="<?php echo $data_guru['nama_guru']; ?>" />
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Gelar</label>
	                                <div class="col-sm-3">
	                                    <input type="text" name="gelar" class="form-control" autocomplete="off" required="true" value="<?php echo $data_guru['gelar']; ?>" />
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Tempat Lahir</label>
	                                <div class="col-sm-3">
	                                    <input type="text" name="tempat_lahir" class="form-control" autocomplete="off" required="true" value="<?php echo $data_guru['tempat_lahir']; ?>" />
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
	                                <div class="col-sm-2 col-xs-11">
	                                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="" class="input-append date dpYears">
	                                        <input type="text" name="tanggal_lahir" readonly="" value="<?php echo $tanggal_lahir; ?>" size="16" class="form-control" required="true">
	                                        <span class="input-group-btn add-on">
	                                            <button style="padding:8px" class="btn btn-primary" type="button"><i class="icon-calendar"></i></button>
	                                        </span>
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
	                                <div class="col-sm-3">
	                                    <select style="width:284px" id="jenis_kelamin" name="jenis_kelamin" class="" required="true">
	                                        <option value="<?php echo $data_guru['jenis_kelamin']; ?>"><?php echo $data_guru['jenis_kelamin']; ?></option>
	                                        <option value="Laki-laki">Laki-laki</option>
	                                        <option value="Perempuan">Perempuan</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Status PNS</label>
	                                <div class="col-sm-3">
	                                    <select style="width:284px" id="status_pns" name="status_pns" class="" required="true">
	                                        <option value="<?php echo $data_guru['status_pns']; ?>"><?php echo $data_guru['status_pns']; ?></option>
	                                        <option value="Guru">Guru</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">No. Seri Karpeg</label>
	                                <div class="col-sm-3">
	                                    <input type="text" name="no_seri_karpeg" class="form-control" autocomplete="off" required="true" value="<?php echo $data_guru['no_seri_karpeg']; ?>" />
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Pangkat/Golongan</label>
	                                <div class="col-sm-3">
	                                    <select style="width:284px" id="pangkat_golongan" name="pangkat_golongan" class="" required="true">
	                                        <option value="<?php echo $data_guru['pangkat_golongan']; ?>"><?php echo $data_guru['pangkat_golongan']; ?></option>
	                                        <option value="Juru Muda / IA">Juru Muda / IA</option>
	                                        <option value="Juru Muda Tingkat I / IB">Juru Muda Tingkat I / IB</option>
	                                        <option value="Juru / IC">Juru / IC</option>
	                                        <option value="Juru Tingkat I / ID">Juru Tingkat I / ID</option>
	                                        <option value="Pengatur Muda / IIA">Pengatur Muda / IIA</option>
	                                        <option value="Pengatur Muda Tingkat I / IIB">Pengatur Muda Tingkat I / IIB</option>
	                                        <option value="Pengatur / IIC">Pengatur / IIC</option>
	                                        <option value="Pengatur Tingkat I / IID">Pengatur Tingkat I / IID</option>
	                                        <option value="Penata Muda / IIIA">Penata Muda / IIIA</option>
	                                        <option value="Penata Muda Tingkat I / IIIB">Penata Muda Tingkat I / IIIB</option>
	                                        <option value="Penata / IIIC">Penata / IIIC</option>
	                                        <option value="Penata Tingkat I / IIID">Penata Tingkat I / IIID</option>
	                                        <option value="Pembina / IVA">Pembina / IVA</option>
	                                        <option value="Pembina Tingkat I / IVB">Pembina Tingkat I / IVB</option>
	                                        <option value="Pembina Utama Muda / IVC">Pembina Utama Muda / IVC</option>
	                                        <option value="Pembina Utama Madya / IVD">Pembina Utama Madya / IVD</option>
	                                        <option value="Pembina Utama / IVE">Pembina Utama / IVE</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">NUPTK</label>
	                                <div class="col-sm-3">
	                                    <input type="text" name="nuptk" class="form-control" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data_guru['nuptk']; ?>" />
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">NRG</label>
	                                <div class="col-sm-3">
	                                    <input type="text" name="nrg" class="form-control" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data_guru['nrg']; ?>" />
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Pendidikan Terakhir</label>
	                                <div class="col-sm-3">
	                                    <input type="text" name="pendidikan_terakhir" class="form-control" autocomplete="off" value="<?php echo $data_guru['pendidikan_terakhir']; ?>" />
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Mata Pelajaran</label>
	                                <div class="col-sm-3">
	                                    <select style="width:284px" id="matapelajaran" name="matapelajaran" class="" required="true">
	                                        <option value="<?php echo $data_guru['mata_pelajaran']; ?>"><?php echo $data_guru['mata_pelajaran']; ?></option>
	                                        <option value="Pendidikan Agama">Pendidikan Agama</option>
	                                        <option value="Pendidikan Kewarganegaraan">Pendidikan Kewarganegaraan</option>
	                                        <option value="Bahasa Indonesia">Bahasa Indonesia</option>
	                                        <option value="Matematika">Matematika</option>
	                                        <option value="Bahasa Inggris">Bahasa Inggris</option>
	                                        <option value="Ilmu Pengetahuan Alam">Ilmu Pengetahuan Alam</option>
	                                        <option value="Ilmu Pengetahuan Sosial">Ilmu Pengetahuan Sosial</option>
	                                        <option value="Seni Budaya">Seni Budaya</option>
	                                        <option value="Pendidikan Jasmani, Olahraga dan Kesehatan">Pendidikan Jasmani, Olahraga dan Kesehatan</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Jabatan Fungsional</label>
	                                <div class="col-sm-3">
	                                    <select style="width:284px" id="jabatan_fungsional" name="jabatan_fungsional" class="" required="true">
	                                        <option value="<?php echo $data_guru['jabatan_fungsional']; ?>"><?php echo $data_guru['jabatan_fungsional']; ?></option>
	                                        <option value="Guru Muda">Guru Muda</option>
	                                        <option value="Guru Madya">Guru Madya</option>
	                                    </select>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Tanggal Mulai Bekerja</label>
	                                <div class="col-sm-2 col-xs-11">
	                                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="" class="input-append date dpYears">
	                                        <input type="text" name="tanggal_bekerja" readonly="" value="<?php echo $tanggal_bekerja; ?>" size="16" class="form-control" required="true">
	                                        <span class="input-group-btn add-on">
	                                            <button style="padding:8px" class="btn btn-primary" type="button"><i class="icon-calendar"></i></button>
	                                        </span>
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Masa Kerja</label>
	                                <div class="col-sm-3">
	                                    <input type="text" name="masa_kerja" class="form-control" autocomplete="off" value="<?php echo $data_guru['masa_kerja']; ?>" />
	                                </div>
	                            </div>

	                            <hr />
	                            <div class="form-group">
	                                <div class="col-lg-offset-2 col-lg-10">
	                                    <button type="submit" class="btn btn-primary"> Simpan</button>
	                                    <a style="margin-left:10px;width:80px" href="?module=guru" class="btn btn-white"> Batal</a>
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
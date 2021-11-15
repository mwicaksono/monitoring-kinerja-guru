	<div class="row-fluid">
		<?php 
		if ($_GET['code'] == 1){
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
                    <p>periode penilaian berhasil diaktifkan.</p>
                </div>
            </div>
        </div>
		<?php
		}
		if ($_GET['code'] == 2){
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
                    <p>periode penilaian berhasil dinonaktifkan.</p>
                </div>
            </div>
        </div>
		<?php
		}
		?>
	</div>

	<div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                	<i style="margin-right:5px;" class="icon-calendar"></i> Periode Penilaian
                </header>

            <?php

            $sql_periode = $db->database_prepare("SELECT * FROM tbl_periode WHERE status='on'")->execute();

            $num = $db->database_num_rows($sql_periode);

            if ($num <> 0) {

                while ($data_periode = $db->database_fetch_array($sql_periode)) {

                $tgl_awal       = $data_periode['tanggal_awal'];
                $tgla           = explode('-',$tgl_awal);
                $tanggal_awal   = $tgla[2]."-".$tgla[1]."-".$tgla[0];

                $tgl_akhir       = $data_periode['tanggal_akhir'];
                $tglb            = explode('-',$tgl_akhir);
                $tanggal_akhir   = $tglb[2]."-".$tglb[1]."-".$tglb[0];

                    echo "
                    <div class='panel-body'>
                        <div class='alert alert-info alert-block fade in'>
                            <button data-dismiss='alert' class='close close-sm' type='button'>
                                <i class='icon-remove'></i>
                            </button>
                            <p><i class='icon-info-sign'> </i> Periode penilaian aktif dari tanggal $tanggal_awal s.d. tanggal $tanggal_akhir.</p>
                        </div>

                        <form class='form-horizontal' action='modules/periode/aksi_periode.php?mod=periode&act=off' method='POST'>

                            <input type='hidden' name='id' value='$data_periode[id_periode]'>

                            <div class='form-group'>
                                <label class='col-sm-2 col-sm-2 control-label'>Kode Periode</label>
                                <div class='col-sm-3'>
                                    <input type='text' name='periode' class='form-control' autocomplete='off' required='true' maxlength='5' value='$data_periode[periode]' />
                                </div>
                            </div>

                            <div class='form-group'>
                                <label class='col-sm-2 col-sm-2 control-label'>Tanggal Awal</label>
                                <div class='col-sm-3 col-xs-11'>
                                    <input class='form-control form-control-inline input-medium default-date-picker'  size='16' type='text' name='tanggal_awal' required='true' value='$tanggal_awal' />
                                </div>
                            </div>

                            <div class='form-group'>
                                <label class='col-sm-2 col-sm-2 control-label'>Tanggal Akhir</label>
                                <div class='col-sm-3 col-xs-11'>
                                    <input class='form-control form-control-inline input-medium default-date-picker'  size='16' type='text' name='tanggal_akhir' required='true' value='$tanggal_akhir' />
                                </div>
                            </div>

                            <div class='form-group'>
                                <label class='col-sm-2 col-sm-2 control-label'>Tahun</label>
                                <div class='col-sm-3'>
                                    <select type='text' name='tahun_ajaran' class='form-control' required='true'>
                                        <option value='$data_periode[tahun_ajaran]'>$data_periode[tahun_ajaran]</option>
                                        <option value=''>-- Pilih Tahun Ajaran --</option>
                                        <option value='2015'>2015</option>
                                        <option value='2014'>2014</option>
                                        <option value='2013'>2013</option>
                                        <option value='2012'>2012</option>
                                        <option value='2011'>2011</option>
                                        <option value='2010'>2010</option>
                                    </select>
                                </div>
                            </div>

                            <div class='form-group'>
                                <label class='col-sm-2 col-sm-2 control-label'>Keterangan</label>
                                <div class='col-sm-3'>
                                    <input type='text' name='keterangan' class='form-control' autocomplete='off' required='true' value='$data_periode[keterangan]' />
                                </div>
                            </div>

                            <hr/>

                            <div class='form-group'>
                                <div class='col-lg-offset-2 col-lg-10'>
                                    <button type='submit' class='btn btn-primary'>Nonaktifkan</button>
                                </div>
                            </div>
                        </form>
                    </div>";
                }
            } else {
                    echo "
                    <div class='panel-body'>
                        <div class='alert alert-info alert-block fade in'>
                            <button data-dismiss='alert' class='close close-sm' type='button'>
                                <i class='icon-remove'></i>
                            </button>
                            <p><i class='icon-info-sign'> </i> Periode penilaian tidak aktif.</p>
                        </div>

                        <form class='form-horizontal' action='modules/periode/aksi_periode.php?mod=periode&act=on' method='POST'>

                            <div class='form-group'>
                                <label class='col-sm-2 col-sm-2 control-label'>Kode Periode</label>
                                <div class='col-sm-3'>
                                    <input type='text' name='periode' class='form-control' autocomplete='off' required='true' maxlength='5' />
                                </div>
                            </div>

                            <div class='form-group'>
                                <label class='col-sm-2 col-sm-2 control-label'>Tanggal Awal</label>
                                <div class='col-sm-3 col-xs-11'>
                                    <input class='form-control form-control-inline input-medium default-date-picker'  size='16' type='text' name='tanggal_awal' required='true' />
                                </div>
                            </div>

                            <div class='form-group'>
                                <label class='col-sm-2 col-sm-2 control-label'>Tanggal Akhir</label>
                                <div class='col-sm-3 col-xs-11'>
                                    <input class='form-control form-control-inline input-medium default-date-picker'  size='16' type='text' name='tanggal_akhir' required='true' />
                                </div>
                            </div>

                            <div class='form-group'>
                                <label class='col-sm-2 col-sm-2 control-label'>Tahun</label>
                                <div class='col-sm-3'>
                                    <select type='text' name='tahun_ajaran' class='form-control' required='true'>
                                        <option value=''>-- Pilih Tahun Ajaran --</option>
                                        <option value='2015'>2015</option>
                                        <option value='2014'>2014</option>
                                        <option value='2013'>2013</option>
                                        <option value='2012'>2012</option>
                                        <option value='2011'>2011</option>
                                        <option value='2010'>2010</option>
                                    </select>
                                </div>
                            </div>

                            <div class='form-group'>
                                <label class='col-sm-2 col-sm-2 control-label'>Keterangan</label>
                                <div class='col-sm-3'>
                                    <input type='text' name='keterangan' class='form-control' autocomplete='off' required='true' />
                                </div>
                            </div>

                            <hr/>

                            <div class='form-group'>
                                <div class='col-lg-offset-2 col-lg-10'>
                                    <button type='submit' class='btn btn-primary'>Aktifkan</button>
                                </div>
                            </div>
                        </form>
                    </div>";
            }
            ?>
            </section>
        </div>
    </div>


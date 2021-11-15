	<div class="row-fluid">
	    <?php
        if ($_GET['code'] == 1) {
        ?>
	        <div class="row">
	            <div class="panel-body">
	                <div class="alert alert-danger alert-block fade in">
	                    <button data-dismiss="alert" class="close close-sm" type="button">
	                        <i class="icon-remove"></i>
	                    </button>
	                    <h4>
	                        <i class="icon-warning-sign"></i>
	                        Gagal!
	                    </h4>
	                    <p>Password lama Anda salah.</p>
	                </div>
	            </div>
	        </div>
	    <?php
        }
        if ($_GET['code'] == 2) {
        ?>
	        <div class="row">
	            <div class="panel-body">
	                <div class="alert alert-danger alert-block fade in">
	                    <button data-dismiss="alert" class="close close-sm" type="button">
	                        <i class="icon-remove"></i>
	                    </button>
	                    <h4>
	                        <i class="icon-warning-sign"></i>
	                        Gagal!
	                    </h4>
	                    <p>Password baru dan Ulangi password baru tidak cocok.</p>
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
	                    <p>Password berhasil diubah.</p>
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
	                    <header class="panel-heading">
	                        <i style="margin-right:5px;" class="icon-cog"></i> Ubah password
	                    </header>
	                    <div class="panel-body">
	                        <form class="form-horizontal" action="modules/password/password_action.php?mod=password" method="POST">

	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Password Lama</label>
	                                <div class="col-sm-4">
	                                    <input type="password" name="old_pass" class="form-control" autocomplete="off" required="true" />
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Password Baru</label>
	                                <div class="col-sm-4">
	                                    <input type="password" name="new_pass" class="form-control" autocomplete="off" required="true" />
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <label class="col-sm-2 col-sm-2 control-label">Ulangi Password Baru</label>
	                                <div class="col-sm-4">
	                                    <input type="password" name="retype_pass" class="form-control" autocomplete="off" required="true" />
	                                </div>
	                            </div>
	                            <hr />
	                            <div class="form-group">
	                                <div class="col-lg-offset-2 col-lg-10">
	                                    <button type="submit" class="btn btn-primary">Simpan</button>
	                                    <a style="margin-left:10px;width:80px" href="?module=home" class="btn btn-white">Batal</a>
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
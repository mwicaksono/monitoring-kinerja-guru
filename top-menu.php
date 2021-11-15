<!-- Jika user Admin -->
<?php if ($_SESSION['level'] == 'Admin') { ?>
    <ul class="nav navbar-nav">
        <?php
        if ($_GET["module"] == "home") {
            echo '  <li class="active">
                        <a href="?module=home">
                            <i style="margin-right:3px" class="icon-dashboard"></i> Dashboard
                        </a>
                    </li>';
        } else {
            echo '  <li>
                        <a href="?module=home">
                            <i style="margin-right:3px" class="icon-dashboard"></i> Dashboard
                        </a>
                    </li>';
        }

        if ($_GET["module"] == "identitas") {
            echo '  <li style="background:#1a9fd0" class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i style="margin-right:3px" class="icon-th-large"></i> Data Sekolah <b class=" icon-angle-down"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li style="border-bottom:1px solid #eaeaea" class="active"><a href="?module=identitas"><i style="margin-right:3px" class="icon-leaf"></i> Identitas Sekolah</a></li>
                            <li style="border-bottom:1px solid #eaeaea"><a href="?module=guru"><i style="margin-right:3px" class="icon-user"></i> Data Guru</a></li>
                            <li style="border-bottom:1px solid #eaeaea"><a href="?module=periode"><i style="margin-right:3px" class="icon-calendar"></i> Periode</a></li>
                        </ul>
                    </li>';
        } elseif ($_GET["module"] == "guru") {
            echo '  <li style="background:#1a9fd0" class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i style="margin-right:3px" class="icon-th-large"></i> Data Sekolah <b style="padding-left:3px" class=" icon-angle-down"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li style="border-bottom:1px solid #eaeaea"><a href="?module=identitas"><i style="margin-right:3px" class="icon-leaf"></i> Identitas Sekolah</a></li>
                            <li style="border-bottom:1px solid #eaeaea" class="active"><a href="?module=guru"><i style="margin-right:3px" class="icon-user"></i> Data Guru</a></li>
                            <li style="border-bottom:1px solid #eaeaea"><a href="?module=periode"><i style="margin-right:3px" class="icon-calendar"></i> Periode</a></li>
                        </ul>
                    </li>';
        } elseif ($_GET["module"] == "periode") {
            echo '  <li style="background:#1a9fd0" class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i style="margin-right:3px" class="icon-th-large"></i> Data Sekolah <b class=" icon-angle-down"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li style="border-bottom:1px solid #eaeaea"><a href="?module=identitas"><i style="margin-right:3px" class="icon-leaf"></i> Identitas Sekolah</a></li>
                            <li style="border-bottom:1px solid #eaeaea"><a href="?module=guru"><i style="margin-right:3px" class="icon-user"></i> Data Guru</a></li>
                            <li style="border-bottom:1px solid #eaeaea" class="active"><a href="?module=periode"><i style="margin-right:3px" class="icon-calendar"></i> Periode</a></li>
                        </ul>
                    </li>';
        } else {
            echo '  <li class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i style="margin-right:3px" class="icon-th-large"></i> Data Sekolah <b style="padding-left:3px" class=" icon-angle-down"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li style="border-bottom:1px solid #eaeaea"><a href="?module=identitas"><i style="margin-right:3px" class="icon-leaf"></i> Identitas Sekolah</a></li>
                            <li style="border-bottom:1px solid #eaeaea"><a href="?module=guru"><i style="margin-right:3px" class="icon-user"></i> Data Guru</a></li>
                            <li style="border-bottom:1px solid #eaeaea"><a href="?module=periode"><i style="margin-right:3px" class="icon-calendar"></i> Periode</a></li>
                        </ul>
                    </li>';
        }

        if ($_GET["module"] == "data_nilai") {
            echo '  <li style="background:#1a9fd0" class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i style="margin-right:3px" class="icon-star"></i> Kompetensi <b style="padding-left:3px" class=" icon-angle-down"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li style="border-bottom:1px solid #eaeaea" class=""><a href="?module=data_nilai"><i style="margin-right:3px" class="icon-list-alt"></i> Data Penilaian Guru</a></li>
                            <li style="border-bottom:1px solid #eaeaea" class=""><a href="?module=data_nilai_siswa"><i style="margin-right:3px" class="icon-list-alt"></i> Data Penilaian Siswa</a></li>
                            <li style="border-bottom:1px solid #eaeaea" class=""><a href="?module=data_nilai_ortu"><i style="margin-right:3px" class="icon-list-alt"></i> Data Penilaian Ortu</a></li>
                            <li style="border-bottom:1px solid #eaeaea" class=""><a href="?module=data_nilai_sejawat"><i style="margin-right:3px" class="icon-list-alt"></i> Data Penilaian Sejawat</a></li>   
                            <li style="border-bottom:1px solid #eaeaea"><a href="?module=input_nilai"><i style="margin-right:3px" class="icon-edit"></i> Penilaian</a></li>
                        </ul>
                    </li>';
        } elseif ($_GET["module"] == "input_nilai") {
            echo '  <li style="background:#1a9fd0" class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i style="margin-right:3px" class="icon-star"></i> Kompetensi <b style="padding-left:3px" class=" icon-angle-down"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li style="border-bottom:1px solid #eaeaea"><a href="?module=data_nilai"><i style="margin-right:3px" class="icon-list-alt"></i> Data Penilaian Guru</a></li>
                            <li style="border-bottom:1px solid #eaeaea"><a href="?module=data_nilai_siswa"><i style="margin-right:3px" class="icon-list-alt"></i> Data Penilaian Siswa</a></li>
                            <li style="border-bottom:1px solid #eaeaea" class=""><a href="?module=data_nilai_ortu"><i style="margin-right:3px" class="icon-list-alt"></i> Data Penilaian Ortu</a></li>
                            <li style="border-bottom:1px solid #eaeaea" class=""><a href="?module=data_nilai_sejawat"><i style="margin-right:3px" class="icon-list-alt"></i> Data Penilaian Sejawat</a></li>  
                            <li style="border-bottom:1px solid #eaeaea" class="active"><a href="?module=input_nilai"><i style="margin-right:3px" class="icon-edit"></i> Penilaian</a></li>
                        </ul>
                    </li>';
        } else {
            echo '  <li class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i style="margin-right:3px" class="icon-star"></i> Kompetensi <b style="padding-left:3px" class=" icon-angle-down"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li style="border-bottom:1px solid #eaeaea"><a href="?module=data_nilai"><i style="margin-right:3px" class="icon-list-alt"></i> Data Penilaian Guru</a></li>
                            <li style="border-bottom:1px solid #eaeaea" class=""><a href="?module=data_nilai_siswa"><i style="margin-right:3px" class="icon-list-alt"></i> Data Penilaian Siswa</a></li>                   
                            <li style="border-bottom:1px solid #eaeaea" class=""><a href="?module=data_nilai_ortu"><i style="margin-right:3px" class="icon-list-alt"></i> Data Penilaian Ortu</a></li>                   
                            <li style="border-bottom:1px solid #eaeaea" class=""><a href="?module=data_nilai_sejawat"><i style="margin-right:3px" class="icon-list-alt"></i> Data Penilaian Sejawat</a></li>                   
                            <li style="border-bottom:1px solid #eaeaea"><a href="?module=input_nilai"><i style="margin-right:3px" class="icon-edit"></i> Penilaian</a></li>
                        </ul>
                    </li>';
        }

        if ($_GET["module"] == "internal") {
            echo '  <li style="background:#1a9fd0" class="dropdown">
            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                <i style="margin-right:3px" class="icon-list-ol"></i> Lembaga <b class=" icon-angle-down"></b>
            </a>
            <ul class="dropdown-menu">
            <li style="border-bottom:1px solid #eaeaea" class=""><a href="?module=data_nilai_internal"><i style="margin-right:3px" class="icon-list-alt"></i> Data Penilaian Lembaga</a></li>  
            <li style="border-bottom:1px solid #eaeaea" class="active"><a href="?module=input_nilai_internal"><i style="margin-right:3px" class="icon-edit"></i> Penilaian Lembaga</a></li>
            </ul>
        </li>';
        } else {
            echo '  <li class="dropdown">
            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                <i style="margin-right:3px" class="icon-list-ol"></i> Lembaga <b class=" icon-angle-down"></b>
            </a>
            <ul class="dropdown-menu">
            <li style="border-bottom:1px solid #eaeaea" class=""><a href="?module=data_nilai_internal"><i style="margin-right:3px" class="icon-list-alt"></i> Data Penilaian Lembaga</a></li>                   
            <li style="border-bottom:1px solid #eaeaea"><a href="?module=input_nilai_internal"><i style="margin-right:3px" class="icon-edit"></i> Penilaian Lembaga</a></li>
            </ul>
        </li>';
        }

        if ($_GET["module"] == "user") {
            echo '  <li style="background:#1a9fd0" class="dropdown">
            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                <i style="margin-right:3px" class="icon-user"></i> Data User <b class=" icon-angle-down"></b>
            </a>
            <ul class="dropdown-menu">
                <li style="border-bottom:1px solid #eaeaea"><a href="?module=user"><i style="margin-right:3px" class="icon-user"></i> User Sekolah</a></li>
                <li style="border-bottom:1px solid #eaeaea"><a href="?module=user2"><i style="margin-right:3px" class="icon-group"></i> User Luar Sekolah</a></li>
            </ul>
        </li>';
        } else {
            echo '  <li class="dropdown">
            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                <i style="margin-right:3px" class="icon-user"></i> Data User <b class=" icon-angle-down"></b>
            </a>
            <ul class="dropdown-menu">
                <li style="border-bottom:1px solid #eaeaea"><a href="?module=user"><i style="margin-right:3px" class="icon-user"></i> User Sekolah</a></li>
                <li style="border-bottom:1px solid #eaeaea"><a href="?module=user2"><i style="margin-right:3px" class="icon-group"></i> User Luar Sekolah</a></li>
            </ul>
        </li>';
        }
        ?>
    </ul>
    <!-- Jika User Guru -->
<?php } elseif ($_SESSION['level'] == 'Guru') { ?>
    <ul class="nav navbar-nav">
        <?php
        if ($_GET["module"] == "home") {
            echo '  <li class="active">
                        <a href="#">
                            <i style="margin-right:3px" class="icon-dashboard"></i> Dashboard
                        </a>
                    </li>';
        } else {
            echo '  <li>
                        <a href="#">
                            <i style="margin-right:3px" class="icon-dashboard"></i> Dashboard
                        </a>
                    </li>';
        }

        if ($_GET["module"] == "input_nilai") {
            echo '  <li style="background:#1a9fd0" class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i style="margin-right:3px" class="icon-star"></i> Kompetensi <b style="padding-left:3px" class=" icon-angle-down"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li style="border-bottom:1px solid #eaeaea" class="active"><a href="?module=input_nilai"><i style="margin-right:3px" class="icon-edit"></i> Penilaian</a></li>
                        </ul>
                    </li>';
        } else {
            echo '  <li class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i style="margin-right:3px" class="icon-star"></i> Kompetensi <b style="padding-left:3px" class=" icon-angle-down"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li style="border-bottom:1px solid #eaeaea"><a href="?module=input_nilai"><i style="margin-right:3px" class="icon-edit"></i> Penilaian</a></li>
                        </ul>
                    </li>';
        }

        ?>
    </ul>
    <!-- Jika User Kepala Sekolah -->
<?php } elseif ($_SESSION['level'] == 'Kepala Sekolah') { ?>
    <ul class="nav navbar-nav">
        <?php
        if ($_GET["module"] == "home") {
            echo '  <li class="active">
                        <a href="?module=home">
                            <i style="margin-right:3px" class="icon-dashboard"></i> Dashboard
                        </a>
                    </li>';
        } else {
            echo '  <li>
                        <a href="?module=home">
                            <i style="margin-right:3px" class="icon-dashboard"></i> Dashboard
                        </a>
                    </li>';
        }

        if ($_GET["module"] == "input_nilai") {
            echo '  <li style="background:#1a9fd0" class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i style="margin-right:3px" class="icon-star"></i> Kompetensi <b style="padding-left:3px" class=" icon-angle-down"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li style="border-bottom:1px solid #eaeaea" class="active"><a href="?module=input_nilai"><i style="margin-right:3px" class="icon-edit"></i> Penilaian</a></li>
                        </ul>
                    </li>';
        } else {
            echo '  <li class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i style="margin-right:3px" class="icon-star"></i> Kompetensi <b style="padding-left:3px" class=" icon-angle-down"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li style="border-bottom:1px solid #eaeaea"><a href="?module=input_nilai"><i style="margin-right:3px" class="icon-edit"></i> Penilaian</a></li>
                        </ul>
                    </li>';
        }

        if ($_GET["module"] == "internal") {
            echo '  <li style="background:#1a9fd0" class="dropdown">
            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                <i style="margin-right:3px" class="icon-list-ol"></i> Lembaga <b class=" icon-angle-down"></b>
            </a>
            <ul class="dropdown-menu">
            <li style="border-bottom:1px solid #eaeaea" class="active"><a href="?module=input_nilai_internal"><i style="margin-right:3px" class="icon-edit"></i> Penilaian Lembaga</a></li>
            </ul>
        </li>';
        } else {
            echo '  <li class="dropdown">
            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                <i style="margin-right:3px" class="icon-list-ol"></i> Lembaga <b class=" icon-angle-down"></b>
            </a>
            <ul class="dropdown-menu">
            <li style="border-bottom:1px solid #eaeaea"><a href="?module=input_nilai_internal"><i style="margin-right:3px" class="icon-edit"></i> Penilaian Lembaga</a></li>
            </ul>
        </li>';
        }
        ?>
    </ul>
    <!-- Jika User Pengawas -->
<?php } elseif ($_SESSION['level'] == 'Pengawas Sekolah') { ?>
    <ul class="nav navbar-nav">
        <?php
        if ($_GET["module"] == "home") {
            echo '  <li class="active">
                        <a href="?module=home">
                            <i style="margin-right:3px" class="icon-dashboard"></i> Dashboard
                        </a>
                    </li>';
        } else {
            echo '  <li>
                        <a href="?module=home">
                            <i style="margin-right:3px" class="icon-dashboard"></i> Dashboard
                        </a>
                    </li>';
        }
        ?>
    </ul>
    <!-- Jika User Siswa -->
<?php } elseif ($_SESSION['level'] == 'Siswa') { ?>
    <ul class="nav navbar-nav">
        <?php

        if ($_GET["module"] == "input_nilai") {
            echo '  <li style="background:#1a9fd0" class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i style="margin-right:3px" class="icon-star"></i> Kompetensi <b style="padding-left:3px" class=" icon-angle-down"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li style="border-bottom:1px solid #eaeaea" class="active"><a href="?module=input_nilai2"><i style="margin-right:3px" class="icon-edit"></i> Penilaian</a></li>
                        </ul>
                    </li>';
        } else {
            echo '  <li class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i style="margin-right:3px" class="icon-star"></i> Kompetensi <b style="padding-left:3px" class=" icon-angle-down"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li style="border-bottom:1px solid #eaeaea"><a href="?module=input_nilai2"><i style="margin-right:3px" class="icon-edit"></i> Penilaian</a></li>
                        </ul>
                    </li>';
        }
        ?>
    </ul>
    <!-- Jika User Orang Tua -->
<?php } elseif ($_SESSION['level'] == 'Orang Tua') { ?>
    <ul class="nav navbar-nav">
        <?php
        if ($_GET["module"] == "input_nilai") {
            echo '  <li style="background:#1a9fd0" class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i style="margin-right:3px" class="icon-star"></i> Kompetensi <b style="padding-left:3px" class=" icon-angle-down"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li style="border-bottom:1px solid #eaeaea" class="active"><a href="?module=input_nilai_ortu"><i style="margin-right:3px" class="icon-edit"></i> Penilaian</a></li>
                        </ul>
                    </li>';
        } else {
            echo '  <li class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i style="margin-right:3px" class="icon-star"></i> Kompetensi <b style="padding-left:3px" class=" icon-angle-down"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li style="border-bottom:1px solid #eaeaea"><a href="?module=input_nilai_ortu"><i style="margin-right:3px" class="icon-edit"></i> Penilaian</a></li>
                        </ul>
                    </li>';
        }
        ?>
    </ul>
    <!-- Jika User Teman Sejawat -->
<?php } elseif ($_SESSION['level'] == 'Teman Sejawat') { ?>
    <ul class="nav navbar-nav">
        <?php
        if ($_GET["module"] == "input_nilai") {
            echo '  <li style="background:#1a9fd0" class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i style="margin-right:3px" class="icon-star"></i> Kompetensi <b style="padding-left:3px" class=" icon-angle-down"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li style="border-bottom:1px solid #eaeaea" class="active"><a href="?module=input_nilai_sejawat"><i style="margin-right:3px" class="icon-edit"></i> Penilaian</a></li>
                        </ul>
                    </li>';
        } else {
            echo '  <li class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i style="margin-right:3px" class="icon-star"></i> Kompetensi <b style="padding-left:3px" class=" icon-angle-down"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li style="border-bottom:1px solid #eaeaea"><a href="?module=input_nilai_sejawat"><i style="margin-right:3px" class="icon-edit"></i> Penilaian</a></li>
                        </ul>
                    </li>';
        }
        ?>
    </ul>
<?php } else { ?>
    <ul class="nav navbar-nav">

    </ul>
<?php
}
?>
Kompetensi 1 : Mengenal karakteristik peserta didik
</header>
<div class="panel-body">
    <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_p1.php?mod=p1&act=nilai" method="POST" name="frmP1">

        <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

        <div class="alert alert-info alert-block fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="icon-remove"></i>
            </button>
            <p style="font-size:15px">Sebelum Pengamatan.</p>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">1. Guru memiliki absensi siswa lengkap</label>
            <div class="col-sm-2">
                <select type="text" name="ap1" class="form-control">
                    <option value=""></option>
                    <option value="kurang">kurang</option>
                    <option value="cukup">cukup</option>
                    <option value="sangat">sangat</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">2. Guru memiliki pemetaan kelas lengkap</label>
            <div class="col-sm-2">
                <select type="text" name="ap2" class="form-control">
                    <option value=""></option>
                    <option value="kurang">kurang</option>
                    <option value="cukup">cukup</option>
                    <option value="sangat">sangat</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">3. Guru memiliki catatan siswa yang lemah, ataupun yang berkebutuhan khusus dengan lengkap</label>
            <div class="col-sm-2">
                <select type="text" name="ap3" class="form-control">
                    <option value=""></option>
                    <option value="kurang">kurang</option>
                    <option value="cukup">cukup</option>
                    <option value="sangat">sangat</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">4. Guru memiliki catatan siswa yang berprestasi dengan lengkap</label>
            <div class="col-sm-2">
                <select type="text" name="ap4" class="form-control">
                    <option value=""></option>
                    <option value="kurang">kurang</option>
                    <option value="cukup">cukup</option>
                    <option value="sangat">sangat</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">Perencanaan Mengenal Karakteristik peserta didik dalam KBM</label>
            <div style="margin-bottom: 10px" class="col-sm-2">
                <select type="text" name="ap5" class="form-control">
                    <option value=""></option>
                    <option value="kurang">kurang</option>
                    <option value="cukup">cukup</option>
                    <option value="sudah">sudah</option>
                </select>
            </div>

            <label class="col-sm-10 col-sm-10 control-label">sesuai dengan kurikulum karenanya dapat</label>
            <div class="col-sm-2">
                <select type="text" name="ap6" class="form-control">
                    <option value=""></option>
                    <option value="ditingkatkan">ditingkatkan</option>
                    <option value="dikembangkan">dikembangkan</option>
                </select>
            </div>
        </div>

        <div class="alert alert-info alert-block fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="icon-remove"></i>
            </button>
            <p style="font-size:15px">Selama Pengamatan.</p>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">1. Guru menerapkan metode pembelajaran mampu membantu siswa aktif dalam KBM</label>
            <div class="col-sm-2">
                <select type="text" name="ap7" class="form-control">
                    <option value=""></option>
                    <option value="tidak">tidak</option>
                    <option value="sebagian kecil">sebagian kecil</option>
                    <option value="sebagian besar">sebagian besar</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">2. Guru memotivasi siswa</label>
            <div class="col-sm-2">
                <select type="text" name="ap8" class="form-control">
                    <option value=""></option>
                    <option value="tidak">tidak</option>
                    <option value="sedikit">sedikit</option>
                    <option value="sangat">sangat</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">3. Pengaturan tempat duduk memperhatikan kondisi siswa</label>
            <div class="col-sm-2">
                <select type="text" name="ap9" class="form-control">
                    <option value=""></option>
                    <option value="tidak">tidak</option>
                    <option value="sedikit">sedikit</option>
                    <option value="sangat">sangat</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">4. Konsentrasi siswa dalam KBM</label>
            <div class="col-sm-2">
                <select type="text" name="ap10" class="form-control">
                    <option value=""></option>
                    <option value="kurang">kurang</option>
                    <option value="cukup">cukup</option>
                    <option value="baik">baik</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">5. Guru memfasilitasi siswa</label>
            <div class="col-sm-2">
                <select type="text" name="ap11" class="form-control">
                    <option value=""></option>
                    <option value="kurang">kurang</option>
                    <option value="cukup">cukup</option>
                    <option value="baik">baik</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">6. Guru memberi pelayanan kepada siswa yang kurang, lemah atau berkebutuhan khusus</label>
            <div class="col-sm-2">
                <select type="text" name="ap12" class="form-control">
                    <option value=""></option>
                    <option value="kurang">kurang</option>
                    <option value="cukup">cukup</option>
                    <option value="baik">baik</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">Pelaksanaan Mengenal Karakteristik peserta didik dalam KBM</label>
            <div style="margin-bottom: 10px" class="col-sm-2">
                <select type="text" name="ap13" class="form-control">
                    <option value=""></option>
                    <option value="kurang">kurang</option>
                    <option value="cukup">cukup</option>
                    <option value="sudah">sudah</option>
                </select>
            </div>

            <label class="col-sm-10 col-sm-10 control-label">sesuai dengan kurikulum karenanya dapat</label>
            <div class="col-sm-2">
                <select type="text" name="ap14" class="form-control">
                    <option value=""></option>
                    <option value="ditingkatkan">ditingkatkan</option>
                    <option value="dikembangkan">dikembangkan</option>
                </select>
            </div>
        </div>

        <div class="alert alert-info alert-block fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="icon-remove"></i>
            </button>
            <p style="font-size:15px">Setelah Pengamatan.</p>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">Kelangsungan kegiatan pembelajaran dengan memperhatikan kekurangan atau kelebihan siswa yang mampu mengembangkan kompetensi siswa</label>
            <div class="col-sm-2">
                <select type="text" name="ap15" class="form-control">
                    <option value=""></option>
                    <option value="kurang">kurang</option>
                    <option value="cukup">cukup</option>
                    <option value="sangat">sangat</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">Penilai menyarankan bahwa dalam mengenal karakteristik peserta didik untuk KBM selanjutnya</label>
            <div class="col-sm-2">
                <select type="text" name="ap16" class="form-control">
                    <option value=""></option>
                    <option value="dilakukan">dilakukan</option>
                    <option value="ditingkatkan">ditingkatkan</option>
                    <option value="dikembangkan">dikembangkan</option>
                </select>
            </div>
        </div>

        <div class="alert alert-info alert-block fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="icon-remove"></i>
            </button>
            <p style="font-size:15px">Pemantauan.</p>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">Pemantauan tentang kemajuan siswa terekam dalam dokumentasi</label>
            <div class="col-sm-2">
                <select type="text" name="ap17" class="form-control">
                    <option value=""></option>
                    <option value="tidak">tidak</option>
                    <option value="sebagian kecil">sebagian kecil</option>
                    <option value="sebagian besar">sebagian besar</option>
                </select>
            </div>
        </div>

        <div class="alert alert-info alert-block fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="icon-remove"></i>
            </button>
            <p style="font-size:15px">Penilaian.</p>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">1. Guru dapat mengidentifikasi karakteristik belajar setiap peserta didik dikelasnya.</label>
            <div class="col-sm-2">
                <select type="text" name="np1" class="form-control">
                    <option value=""></option>
                    <option value="0">Tidak terpenuhi</option>
                    <option value="1">Terpenuhi sebagian</option>
                    <option value="2">Seluruhnya terpenuhi</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">2. Guru memastikan bahwa semua peserta didik mendapatkan kesempatan yang sama untuk berpartisipasi aktif dalam kegiatan pembelajaran</label>
            <div class="col-sm-2">
                <select type="text" name="np2" class="form-control">
                    <option value=""></option>
                    <option value="0">Tidak terpenuhi</option>
                    <option value="1">Terpenuhi sebagian</option>
                    <option value="2">Seluruhnya terpenuhi</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">3. Guru dapat mengatur kelas untuk memberikan kesempatan belajar yang sama pada semua peserta didik dengan kelainan fisik dan kemampuan belajar yang berbeda.</label>
            <div class="col-sm-2">
                <select type="text" name="np3" class="form-control">
                    <option value=""></option>
                    <option value="0">Tidak terpenuhi</option>
                    <option value="1">Terpenuhi sebagian</option>
                    <option value="2">Seluruhnya terpenuhi</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">4. Guru mencoba mengetahui penyebab penyimpangan perilaku peserta didik untuk mencegah agar perilaku tersebut tidak merugikan peserta didik lainnya.</label>
            <div class="col-sm-2">
                <select type="text" name="np4" class="form-control">
                    <option value=""></option>
                    <option value="0">Tidak terpenuhi</option>
                    <option value="1">Terpenuhi sebagian</option>
                    <option value="2">Seluruhnya terpenuhi</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">5. Guru membantu mengembangkan potensi dan mengatasi kekurangan peserta didik.</label>
            <div class="col-sm-2">
                <select type="text" name="np5" class="form-control">
                    <option value=""></option>
                    <option value="0">Tidak terpenuhi</option>
                    <option value="1">Terpenuhi sebagian</option>
                    <option value="2">Seluruhnya terpenuhi</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-10 col-sm-10 control-label">6. Guru memperhatikan peserta didik dengan kelemahan fisik tertentu agar dapat mengikuti aktivitas pembelajaran, sehingga peserta didik tersebut tidak termarjinalkan (tersisihkan, diolok-olok, minder, dsb).</label>
            <div class="col-sm-2">
                <select type="text" name="np6" class="form-control">
                    <option value=""></option>
                    <option value="0">Tidak terpenuhi</option>
                    <option value="1">Terpenuhi sebagian</option>
                    <option value="2">Seluruhnya terpenuhi</option>
                </select>
            </div>
        </div>

        Kompetensi 2 : Menguasai teori belajar dan prinsip-prinsip pembelajaran yang mendidik
        </header>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_p2.php?mod=p2&act=nilai" method="POST" name="frmP2">

                <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

                <div class="alert alert-info alert-block fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <p style="font-size:15px">Sebelum Pengamatan.</p>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">1. Materi mampu mengaktifkan siswa dengan lengkap</label>
                    <div class="col-sm-2">
                        <select type="text" name="ap1" class="form-control">
                            <option value=""></option>
                            <option value="kurang">kurang</option>
                            <option value="cukup">cukup</option>
                            <option value="sangat">sangat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">2. Materi pembelajaran sesuai dengan kondisi siswa</label>
                    <div class="col-sm-2">
                        <select type="text" name="ap2" class="form-control">
                            <option value=""></option>
                            <option value="kurang">kurang</option>
                            <option value="cukup">cukup</option>
                            <option value="sangat">sangat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">3. Kegiatan KBM direncanakan dengan baik yang mampu meningkatkan kompetensi siswa secara maksimal</label>
                    <div class="col-sm-2">
                        <select type="text" name="ap3" class="form-control">
                            <option value=""></option>
                            <option value="kurang">kurang</option>
                            <option value="cukup">cukup</option>
                            <option value="sangat">sangat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">4. Teknik pembelajaran direncanakan dengan baik yang mampu meningkatkan kompetensi siswa secara maksimal</label>
                    <div class="col-sm-2">
                        <select type="text" name="ap4" class="form-control">
                            <option value=""></option>
                            <option value="kurang">kurang</option>
                            <option value="cukup">cukup</option>
                            <option value="sangat">sangat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">5. Tujuan pembelajaran direncanakan dengan baik yang mampu meningkatkan kompetensi siswa secara maksimal</label>
                    <div class="col-sm-2">
                        <select type="text" name="ap5" class="form-control">
                            <option value=""></option>
                            <option value="kurang">kurang</option>
                            <option value="cukup">cukup</option>
                            <option value="sangat">sangat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">6. Kegiatan KBM direncanakan dengan baik yang mampu meningkatkan respon siswa secara maksimal</label>
                    <div class="col-sm-2">
                        <select type="text" name="ap6" class="form-control">
                            <option value=""></option>
                            <option value="kurang">kurang</option>
                            <option value="cukup">cukup</option>
                            <option value="sangat">sangat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">Perencanaan langkah-langkah dan tahapan KBM sesuai dengan kurikulum</label>
                    <div style="margin-bottom: 10px" class="col-sm-2">
                        <select type="text" name="ap7" class="form-control">
                            <option value=""></option>
                            <option value="kurang">kurang</option>
                            <option value="cukup">cukup</option>
                            <option value="sudah">sudah</option>
                        </select>
                    </div>

                    <label class="col-sm-10 col-sm-10 control-label">karenanya dapat lebih lanjut</label>
                    <div class="col-sm-2">
                        <select type="text" name="ap8" class="form-control">
                            <option value=""></option>
                            <option value="ditingkatkan">ditingkatkan</option>
                            <option value="dikembangkan">dikembangkan</option>
                        </select>
                    </div>
                </div>
                <div class="alert alert-info alert-block fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <p style="font-size:15px">Selama Pengamatan.</p>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">1. Materi yang mampu mengaktifkan siswa demgan lengkap</label>
                    <div class="col-sm-2">
                        <select type="text" name="ap9" class="form-control">
                            <option value=""></option>
                            <option value="kurang">kurang</option>
                            <option value="cukup">cukup</option>
                            <option value="sangat">sangat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">2. Materi pembelajaran sesuai dengan kondisi siswa</label>
                    <div class="col-sm-2">
                        <select type="text" name="ap10" class="form-control">
                            <option value=""></option>
                            <option value="tidak">tidak</option>
                            <option value="cukup">cukup</option>
                            <option value="sangat">sangat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">3. Kegiatan KBM direncanakan dengan baik yang mampu meningkatkan kompetensi siswa secara maksimal</label>
                    <div class="col-sm-2">
                        <select type="text" name="ap11" class="form-control">
                            <option value=""></option>
                            <option value="kurang">kurang</option>
                            <option value="cukup">cukup</option>
                            <option value="sangat">sangat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">4. Teknik pembelajaran direncanakan dengan baik yang mampu meningkatkan kompetensi siswa secara maksimal</label>
                    <div class="col-sm-2">
                        <select type="text" name="ap12" class="form-control">
                            <option value=""></option>
                            <option value="kurang">kurang</option>
                            <option value="cukup">cukup</option>
                            <option value="sangat">sangat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">5. Tujuan Pembelajaran direncanakan dengan baik yang mampu meningkatkan kompetensi siswa secara maksimal</label>
                    <div class="col-sm-2">
                        <select type="text" name="ap13" class="form-control">
                            <option value=""></option>
                            <option value="kurang">kurang</option>
                            <option value="cukup">cukup</option>
                            <option value="sangat">sangat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">6. Kegiatan KBM direncanakan dengan baik yang mampu meningkatkan respon siswa secara maksimal</label>
                    <div class="col-sm-2">
                        <select type="text" name="ap14" class="form-control">
                            <option value=""></option>
                            <option value="kurang">kurang</option>
                            <option value="cukup">cukup</option>
                            <option value="sangat">sangat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">Pelaksanaan langkah-langkah dan tahapan KBM sesui dengan KBM</label>
                    <div style="margin-bottom: 10px" class="col-sm-2">
                        <select type="text" name="ap15" class="form-control">
                            <option value=""></option>
                            <option value="kurang">kurang</option>
                            <option value="cukup">cukup</option>
                            <option value="sangat">sudah</option>
                        </select>
                    </div>

                    <label class="col-sm-10 col-sm-10 control-label">karenanya dapat lebih lanjut</label>
                    <div class="col-sm-2">
                        <select type="text" name="ap16" class="form-control">
                            <option value=""></option>
                            <option value="ditingkatkan">ditingkatkan</option>
                            <option value="dikembangkan">dikembangkan</option>
                        </select>
                    </div>
                </div>

                <div class="alert alert-info alert-block fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <p style="font-size:15px">Setelah Pengamatan.</p>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">Tingkat penguasaan teori belajar dan prinsip-prinsip pembelajaran guru tergolong </label>
                    <div class="col-sm-2">
                        <select type="text" name="ap17" class="form-control">
                            <option value=""></option>
                            <option value="kurang">kurang</option>
                            <option value="cukup">cukup</option>
                            <option value="baik">baik</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">Tingkat penguasaan teori belajar dan prinsip-prinsip pembelajaran guru agar lebih lanjut</label>
                    <div class="col-sm-2">
                        <select type="text" name="ap18" class="form-control">
                            <option value=""></option>
                            <option value="ditingkatkan">ditingkatkan</option>
                            <option value="dikembangkan">dikembangkan</option>
                        </select>
                    </div>
                </div>

                <div class="alert alert-info alert-block fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <p style="font-size:15px">Penilaian.</p>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">1. Guru memberi kesempatan kepada pserta didik untuk menguasai materi pembelajaran sesuai usia dan kemampuan belajarnya melalui pengaturan proses pembelajaran dan aktivitas yang bervariasi</label>
                    <div class="col-sm-2">
                        <select type="text" name="np1" class="form-control">
                            <option value=""></option>
                            <option value="0">Tidak terpenuhi</option>
                            <option value="1">Terpenuhi sebagian</option>
                            <option value="2">Seluruhnya terpenuhi</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">2. Guru selalu memastikan tingkat pemahaman peserta didik terhadap materi pembelajaran tertentu an menyesuaikan aktivitas pembelajaran berikutnya berdasarkan tingkat pemahaman tersebut</label>
                    <div class="col-sm-2">
                        <select type="text" name="np2" class="form-control">
                            <option value=""></option>
                            <option value="0">Tidak terpenuhi</option>
                            <option value="1">Terpenuhi sebagian</option>
                            <option value="2">Seluruhnya terpenuhi</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">3. Guru dapat menjelaskan alasan pelaksanaan kegiatan/aktivitas yang dilakukannya, baik yang sesuai maupun yang berbeda dengan rencana, terkait keberhasilan pembelajaran</label>
                    <div class="col-sm-2">
                        <select type="text" name="np3" class="form-control">
                            <option value=""></option>
                            <option value="0">Tidak terpenuhi</option>
                            <option value="1">Terpenuhi sebagian</option>
                            <option value="2">Seluruhnya terpenuhi</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">4. Guru menggunakan berbagai teknik untuk memotivasi kemauan belajar peserta didik</label>
                    <div class="col-sm-2">
                        <select type="text" name="np4" class="form-control">
                            <option value=""></option>
                            <option value="0">Tidak terpenuhi</option>
                            <option value="1">Terpenuhi sebagian</option>
                            <option value="2">Seluruhnya terpenuhi</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">5. Guru merencanakan kegiatan pembelajaran yang saling terkait satu sama lain dengan memperhatikan tujuan pembelajaran maupun proses belajar peserta didik</label>
                    <div class="col-sm-2">
                        <select type="text" name="np5" class="form-control">
                            <option value=""></option>
                            <option value="0">Tidak terpenuhi</option>
                            <option value="1">Terpenuhi sebagian</option>
                            <option value="2">Seluruhnya terpenuhi</option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-10 col-sm-10 control-label">6. Guru memperhatikan respon peserta didik yang belum/kurang memahami materi pembelajaran yang diajarkan dan menggunakannya untuk memperbaiki rancangan pembelajaran berikutnya</label>
                    <div class="col-sm-2">
                        <select type="text" name="np6" class="form-control">
                            <option value=""></option>
                            <option value="0">Tidak terpenuhi</option>
                            <option value="1">Terpenuhi sebagian</option>
                            <option value="2">Seluruhnya terpenuhi</option>
                        </select>
                    </div>
                </div>

                Kompetensi 3 : Pengembangan kurikulum
                </header>
                <div class="panel-body">
                    <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_p3.php?mod=p3&act=nilai" method="POST" name="frmP3">

                        <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

                        <div class="alert alert-info alert-block fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="icon-remove"></i>
                            </button>
                            <p style="font-size:15px">Sebelum Pengamatan.</p>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-10 col-sm-10 control-label">1. Silabus yang disusun sesuai dengan kurikulum (standar isi)</label>
                            <div class="col-sm-2">
                                <select type="text" name="ap1" class="form-control">
                                    <option value=""></option>
                                    <option value="tidak">tidak</option>
                                    <option value="cukup">cukup</option>
                                    <option value="sudah">sudah</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-10 col-sm-10 control-label">2. RPP yang disusun sesuai dengan silabus</label>
                            <div class="col-sm-2">
                                <select type="text" name="ap2" class="form-control">
                                    <option value=""></option>
                                    <option value="tidak">tidak</option>
                                    <option value="cukup">cukup</option>
                                    <option value="sudah">sudah</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-10 col-sm-10 control-label">3. Urutan materi pelajaran memperhatikan tujuan pembelajaran</label>
                            <div class="col-sm-2">
                                <select type="text" name="ap3" class="form-control">
                                    <option value=""></option>
                                    <option value="tidak">tidak</option>
                                    <option value="cukup">cukup</option>
                                    <option value="sudah">sudah</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-10 col-sm-10 control-label">4. Materi pembelajaran sesuai dengan indikator atau tujuan pembelajaran</label>
                            <div class="col-sm-2">
                                <select type="text" name="ap4" class="form-control">
                                    <option value=""></option>
                                    <option value="tidak">tidak</option>
                                    <option value="cukup">cukup</option>
                                    <option value="sudah">sudah</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-10 col-sm-10 control-label">Perencanaan langkah-langkah dan tahapan KBM </label>
                            <div style="margin-bottom: 10px" class="col-sm-2">
                                <select type="text" name="ap5" class="form-control">
                                    <option value=""></option>
                                    <option value="kurang">kurang</option>
                                    <option value="cukup">cukup</option>
                                    <option value="sudah">sudah</option>
                                </select>
                            </div>

                            <label class="col-sm-10 col-sm-10 control-label">sesuai dengan kurikulum karenanya dapat lebih lanjut</label>
                            <div class="col-sm-2">
                                <select type="text" name="ap6" class="form-control">
                                    <option value=""></option>
                                    <option value="ditingkatkan">ditingkatkan</option>
                                    <option value="dikembangkan">dikembangkan</option>
                                </select>
                            </div>
                        </div>

                        <div class="alert alert-info alert-block fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="icon-remove"></i>
                            </button>
                            <p style="font-size:15px">Selama Pengamatan.</p>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-10 col-sm-10 control-label">1. Pelaksanaan KBM sesuai dengan silabus</label>
                            <div class="col-sm-2">
                                <select type="text" name="ap7" class="form-control">
                                    <option value=""></option>
                                    <option value="tidak">tidak</option>
                                    <option value="cukup">cukup</option>
                                    <option value="sudah">sudah</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-10 col-sm-10 control-label">2. Pelaksanaan KBM sesuai dengan RPP</label>
                            <div class="col-sm-2">
                                <select type="text" name="ap8" class="form-control">
                                    <option value=""></option>
                                    <option value="tidak">tidak</option>
                                    <option value="cukup">cukup</option>
                                    <option value="sudah">sudah</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-10 col-sm-10 control-label">3. Urutan materi pembelajaran sesuai dengan indikator</label>
                            <div class="col-sm-2">
                                <select type="text" name="ap9" class="form-control">
                                    <option value=""></option>
                                    <option value="tidak">tidak</option>
                                    <option value="cukup">cukup</option>
                                    <option value="sudah">sudah</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-10 col-sm-10 control-label">4. Materi pembelajaran dikuasai siswa dengan optimal</label>
                            <div class="col-sm-2">
                                <select type="text" name="ap10" class="form-control">
                                    <option value=""></option>
                                    <option value="tidak">tidak</option>
                                    <option value="cukup">cukup</option>
                                    <option value="sudah">sudah</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-10 col-sm-10 control-label">Pelaksanaan langkah-langkah dan tahapan KBM</label>
                            <div style="margin-bottom: 10px" class="col-sm-2">
                                <select type="text" name="ap11" class="form-control">
                                    <option value=""></option>
                                    <option value="kurang">kurang</option>
                                    <option value="cukup">cukup</option>
                                    <option value="sudah">sudah</option>
                                </select>
                            </div>

                            <label class="col-sm-10 col-sm-10 control-label">sesuai dengan kurikulum karenanya dapat lebih lanjut</label>
                            <div class="col-sm-2">
                                <select type="text" name="ap12" class="form-control">
                                    <option value=""></option>
                                    <option value="ditingkatkan">ditingkatkan</option>
                                    <option value="dikembangkan">dikembangkan</option>
                                </select>
                            </div>
                        </div>

                        <div class="alert alert-info alert-block fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="icon-remove"></i>
                            </button>
                            <p style="font-size:15px">Setelah Pengamatan.</p>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-10 col-sm-10 control-label">Berdasarkan hasil ulangan dan analisis belajar dapat dikatakan bahwa hasil KBM sesuai KKM yang ditetapkan pada kurikulum</label>
                            <div class="col-sm-2">
                                <select type="text" name="ap13" class="form-control">
                                    <option value=""></option>
                                    <option value="belum">belum</option>
                                    <option value="cukup">cukup</option>
                                    <option value="sudah">sudah</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-10 col-sm-10 control-label">Dokumen dan pelaksanaan KBM kesesuaian dengan kurikulum perlu lebih lanjut</label>
                            <div class="col-sm-2">
                                <select type="text" name="ap14" class="form-control">
                                    <option value=""></option>
                                    <option value="ditingkatkan">ditingkatkan</option>
                                    <option value="dikembangkan">dikembangkan</option>
                                </select>
                            </div>
                        </div>

                        <div class="alert alert-info alert-block fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="icon-remove"></i>
                            </button>
                            <p style="font-size:15px">Penilaian.</p>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-10 col-sm-10 control-label">1. Guru dapat menyusun silabus yang sesuai dengan kurikulum</label>
                            <div class="col-sm-2">
                                <select type="text" name="np1" class="form-control">
                                    <option value=""></option>
                                    <option value="0">Tidak terpenuhi</option>
                                    <option value="1">Terpenuhi sebagian</option>
                                    <option value="2">Seluruhnya terpenuhi</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-10 col-sm-10 control-label">2. Guru merancang rencana pembeljaran yang sesuai dengan silanus untuk membahas materi ajar tertentu agar peserta didik dapat mencapai kompetensi dasar yang ditetapkan</label>
                            <div class="col-sm-2">
                                <select type="text" name="np2" class="form-control">
                                    <option value=""></option>
                                    <option value="0">Tidak terpenuhi</option>
                                    <option value="1">Terpenuhi sebagian</option>
                                    <option value="2">Seluruhnya terpenuhi</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-10 col-sm-10 control-label">3. Guru mengikuti urutan materi pembelajaran dengan memperhatikan tujuan pembelajaran</label>
                            <div class="col-sm-2">
                                <select type="text" name="np3" class="form-control">
                                    <option value=""></option>
                                    <option value="0">Tidak terpenuhi</option>
                                    <option value="1">Terpenuhi sebagian</option>
                                    <option value="2">Seluruhnya terpenuhi</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-10 col-sm-10 control-label">4. Guru memilih materi pembelajaran yang: a) sesuai dengan tujuan pembelajaran, b) tepat dan mutakhir, c) sesuai dengan usia dan tingkat kemampuan belajar peserta didik, dan d) dapat dilaksanakan di kelas, e) sesuai dengan konteks kehidupan sehari-hari peserta didik</label>
                            <div class="col-sm-2">
                                <select type="text" name="np4" class="form-control">
                                    <option value=""></option>
                                    <option value="0">Tidak terpenuhi</option>
                                    <option value="1">Terpenuhi sebagian</option>
                                    <option value="2">Seluruhnya terpenuhi</option>
                                </select>
                            </div>
                        </div>

                        Kompetensi 4 : Kegiatan pembelajaran yang mendidik
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_p4.php?mod=p4&act=nilai" method="POST" name="frmP4">

                                <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

                                <div class="alert alert-info alert-block fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                                    <p style="font-size:15px">Sebelum Pengamatan.</p>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">1. Tujuan pembelajaran/indikator sesuai dengan KD</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap1" class="form-control">
                                            <option value=""></option>
                                            <option value="kurang">kurang</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sudah">sudah</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">2. Strategi dan metode yang dipilih dapat menciptakan rasa nyaman dan tenang bagi siswa</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap2" class="form-control">
                                            <option value=""></option>
                                            <option value="tidak">tidak</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sangat">sangat</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">3. Materi prasyarat dirumukan dengan sesuai materi pokok</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap3" class="form-control">
                                            <option value=""></option>
                                            <option value="tidak">tidak</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sangat">sangat</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">4. Pembahasan PR/tugas lainnya sesuai dengan alokasi waktu yang tersedia</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap4" class="form-control">
                                            <option value=""></option>
                                            <option value="tidak">tidak</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sudah">sudah</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">5. Materi yang dirumuskan mengaitkan kehidupan nyata</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap5" class="form-control">
                                            <option value=""></option>
                                            <option value="tidak">tidak</option>
                                            <option value="sedikit">sedikit</option>
                                            <option value="sudah">sudah</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">6. Metode pembelajaran bervariatif</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap6" class="form-control">
                                            <option value=""></option>
                                            <option value="tidak">tidak</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sudah">sudah</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">7. patisipatif siswa maksimal</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap7" class="form-control">
                                            <option value=""></option>
                                            <option value="kurang">kurang</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sudah">sudah</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">8. Perencanaan pembelajaran sesuai dengan kondisi kelas</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap8" class="form-control">
                                            <option value=""></option>
                                            <option value="kurang">kurang</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sudah">sudah</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">9. Kesempatan siswa bertanya dirumuskan dengan baik</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap9" class="form-control">
                                            <option value=""></option>
                                            <option value="kurang">kurang</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sudah">sudah</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">10. Kegiatan refleksi direncanakan dengan baik</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap10" class="form-control">
                                            <option value=""></option>
                                            <option value="tidak">tidak</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sudah">sudah</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">11. Alat peraga dan alat bantu lainnya dirumuskan beragam</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap11" class="form-control">
                                            <option value=""></option>
                                            <option value="kurang">kurang</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sangat">sangat</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">Perencanaan KBM yang mendidik perlu lebih lanjut</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap12" class="form-control">
                                            <option value=""></option>
                                            <option value="ditingkatkan">ditingkatkan</option>
                                            <option value="dikembangkan">dikembangkan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="alert alert-info alert-block fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                                    <p style="font-size:15px">Selama Pengamatan.</p>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">1. Tujuan pembelajaran/indikator disampaikan</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap13" class="form-control">
                                            <option value=""></option>
                                            <option value="tidak">tidak</option>
                                            <option value="sebagian">sebagian</option>
                                            <option value="lengkap">lengkap</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">2. Strategi dan metode yang digunakan dapat menciptakan rasa nyaman dan senang bagi siswa</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap14" class="form-control">
                                            <option value=""></option>
                                            <option value="tidak">tidak</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sangat">sangat</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">3. Materi prasyarat disampaikan dengan sesui materi pokok</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap15" class="form-control">
                                            <option value=""></option>
                                            <option value="tidak">tidak</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sangat">sangat</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">4. Pembahasan PR/tugas lainnya dibahas</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap16" class="form-control">
                                            <option value=""></option>
                                            <option value="tidak">tidak</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sangat">sangat</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">5. Materi yang disajikan mengaitkan kehidupan nyata</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap17" class="form-control">
                                            <option value=""></option>
                                            <option value="tidak">tidak</option>
                                            <option value="sedikit">sedikit</option>
                                            <option value="sudah">sudah</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">6. Metode pembelajaran bervariatif</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap18" class="form-control">
                                            <option value=""></option>
                                            <option value="tidak">tidak</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sudah">sudah</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">7. Partisipasi siswa maksimal</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap19" class="form-control">
                                            <option value=""></option>
                                            <option value="kurang">kurang</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sudah">sudah</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">8. pelaksanaan pembelajaran sesuai dengan kondisi kelas</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap20" class="form-control">
                                            <option value=""></option>
                                            <option value="kurang">kurang</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sudah">sudah</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">9. Kesempatan siswa bertanya diwujudkan dengan baik</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap21" class="form-control">
                                            <option value=""></option>
                                            <option value="kurang">kurang</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sudah">sudah</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">10. Kegiatan refleksi dilaksanakan dengan baik</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap22" class="form-control">
                                            <option value=""></option>
                                            <option value="tidak">tidak</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sudah">sudah</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">11. Alat peraga dan alat bantu lainnya digunakan beragam</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap23" class="form-control">
                                            <option value=""></option>
                                            <option value="kurang">kurang</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sangat">sangat</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">Dokumentasi dan pelaksanaan KBM perlu lebih lanjut</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap24" class="form-control">
                                            <option value=""></option>
                                            <option value="ditingkatkan">ditingkatkan</option>
                                            <option value="dikembangkan">dikembangkan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="alert alert-info alert-block fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                                    <p style="font-size:15px">Setelah Pengamatan.</p>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">Berdasarkan hasil ulangan dan hasil analisis belajar dapat dikatakan bahwa hasil KBM dapat mendidik dan mengembangkan kompetensi siswa secara optimal</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap25" class="form-control">
                                            <option value=""></option>
                                            <option value="belum">belum</option>
                                            <option value="cukup">cukup</option>
                                            <option value="sudah">sudah</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">Baik aspek kognitif, sikap, ataupun keterampilan dalam perencanaan dan pelaksanaan KBM perlu lebih lanjut</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="ap26" class="form-control">
                                            <option value=""></option>
                                            <option value="ditingkatkan">ditingkatkan</option>
                                            <option value="dikembangkan">dikembangkan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="alert alert-info alert-block fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                                    <p style="font-size:15px">Penilaian.</p>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">1. Guru melaksanakan aktivitas pembelajaran sesuai dengan rancangan yang telah disusun secara lengkap dan pelaksanaan aktivitas tersebut mengindikasikan bahwa guru mengerti tentang tujuannya</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="np1" class="form-control">
                                            <option value=""></option>
                                            <option value="0">Tidak terpenuhi</option>
                                            <option value="1">Terpenuhi sebagian</option>
                                            <option value="2">Seluruhnya terpenuhi</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">2. Guru melaksanakan aktivitas pembelajaran yang bertujuan untuk membantu proses belajar peserta didik, bukan untuk menguji sehingga membuat peserta didik merasa tertekan</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="np2" class="form-control">
                                            <option value=""></option>
                                            <option value="0">Tidak terpenuhi</option>
                                            <option value="1">Terpenuhi sebagian</option>
                                            <option value="2">Seluruhnya terpenuhi</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">3. Guru menkomunikasikan informasi baru (misalnya materi tambahan) sesuai dengan usia dan tingkat kemampuan belajar peserta didik.</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="np3" class="form-control">
                                            <option value=""></option>
                                            <option value="0">Tidak terpenuhi</option>
                                            <option value="1">Terpenuhi sebagian</option>
                                            <option value="2">Seluruhnya terpenuhi</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">4. menyikapi kesalahan yang dilakukan peserta didik sebagai tahapan proses pembelajaran, bukn semata-mata kesalahan yang harus dikoreksi. Misalnya: dengan mengetahui terlebih dahulu peserta didik lain yang setuju atau tidak stuju dengan jawaban tersebut, sebelum memberikan penjelasan tentang jawaban yang benar</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="np4" class="form-control">
                                            <option value=""></option>
                                            <option value="0">Tidak terpenuhi</option>
                                            <option value="1">Terpenuhi sebagian</option>
                                            <option value="2">Seluruhnya terpenuhi</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">5. Guru melaksanakan kegiatan pembelajaran sesuai isi kurikulum dan mengaitkannya dengan konteks kehidupan sehari-hari pseserta didik</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="np5" class="form-control">
                                            <option value=""></option>
                                            <option value="0">Tidak terpenuhi</option>
                                            <option value="1">Terpenuhi sebagian</option>
                                            <option value="2">Seluruhnya terpenuhi</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">6. Guru melakukan aktivitas pembelajaran secara bervariasi dengan waktu yang cukup untuk kegiatan pembelajaran yang sesuai dengan usia dan tingkat kemampuan belajar dan mempertahankan perhatian peserta didik</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="np6" class="form-control">
                                            <option value=""></option>
                                            <option value="0">Tidak terpenuhi</option>
                                            <option value="1">Terpenuhi sebagian</option>
                                            <option value="2">Seluruhnya terpenuhi</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">7. Guru mengelola kelas dengan efektif tanpa mendominasi atau sibuk dengan kegiatannya sendiri agar semua waktu peserta dapat termanfaatkan secara produktif</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="np7" class="form-control">
                                            <option value=""></option>
                                            <option value="0">Tidak terpenuhi</option>
                                            <option value="1">Terpenuhi sebagian</option>
                                            <option value="2">Seluruhnya terpenuhi</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">8. Guru mampu menyesuaikan aktivitas pembelajaran yang dirancang dengan kondisi kelas</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="np8" class="form-control">
                                            <option value=""></option>
                                            <option value="0">Tidak terpenuhi</option>
                                            <option value="1">Terpenuhi sebagian</option>
                                            <option value="2">Seluruhnya terpenuhi</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">9. Guru memberikan banyak kesempatan kepada peserta didik untuk bertanya, mempraktekan, dan berinteraksi dengan peserta didik lain</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="np9" class="form-control">
                                            <option value=""></option>
                                            <option value="0">Tidak terpenuhi</option>
                                            <option value="1">Terpenuhi sebagian</option>
                                            <option value="2">Seluruhnya terpenuhi</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">10. Guru mengatur pelaksanaan aktivitas pembelajaran secara sistematis untuk membantu proses belajar peserta didik. Sebagai contoh: guru menambah informasi baru setelah mengevaluasi pemahaman</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="np10" class="form-control">
                                            <option value=""></option>
                                            <option value="0">Tidak terpenuhi</option>
                                            <option value="1">Terpenuhi sebagian</option>
                                            <option value="2">Seluruhnya terpenuhi</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-10 col-sm-10 control-label">11. Guru menggunakan alat bantu mengajar, dan/atau audio visual (termasuk TIK) untuk meningkatkan motivasi belajar peserta didik dalam mencapai tujuan pembelajaran</label>
                                    <div class="col-sm-2">
                                        <select type="text" name="np11" class="form-control">
                                            <option value=""></option>
                                            <option value="0">Tidak terpenuhi</option>
                                            <option value="1">Terpenuhi sebagian</option>
                                            <option value="2">Seluruhnya terpenuhi</option>
                                        </select>
                                    </div>
                                </div>

                                Kompetensi 5 : Memahami dan mengembangkan kompetensi
                                </header>
                                <div class="panel-body">
                                    <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_p5.php?mod=p5&act=nilai" method="POST" name="frmP5">

                                        <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

                                        <div class="alert alert-info alert-block fade in">
                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                <i class="icon-remove"></i>
                                            </button>
                                            <p style="font-size:15px">Sebelum Pengamatan.</p>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">1. Penilaian hasil belajar mencakup </label>
                                            <div class="col-sm-2">
                                                <select type="text" name="ap1" class="form-control">
                                                    <option value=""></option>
                                                    <option value="satu aspek">satu aspek</option>
                                                    <option value="dua aspek">dua aspek</option>
                                                    <option value="tiga aspek">tiga aspek</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">2. Perencanaan pembelajaran dapat mendorong dalam belajar</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="ap2" class="form-control">
                                                    <option value=""></option>
                                                    <option value="tidak">tidak</option>
                                                    <option value="cukup">cukup</option>
                                                    <option value="sangat">sangat</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">3. Perencanaan pembelajaran dapat memunculkan daya kretivitas dan kemampuan berfikir kritis peserta didik</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="ap3" class="form-control">
                                                    <option value=""></option>
                                                    <option value="tidak">tidak</option>
                                                    <option value="cukup">cukup</option>
                                                    <option value="sangat">sangat</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">4. Kegiatan pembelajaran terfokus pada peserta didik</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="ap4" class="form-control">
                                                    <option value=""></option>
                                                    <option value="kurang">kurang</option>
                                                    <option value="cukup">cukup</option>
                                                    <option value="sudah">sudah</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">5. Bakat, minat, potensi, dan kesulitan belajar masing-masing peserta didik teridentifikasi dengan baik</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="ap5" class="form-control">
                                                    <option value=""></option>
                                                    <option value="kurang">kurang</option>
                                                    <option value="cukup">cukup</option>
                                                    <option value="sudah">sudah</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">6. Peserta didik sesuai dengan cara belajarnya masing-masing direncanakan dengan baik</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="ap6" class="form-control">
                                                    <option value=""></option>
                                                    <option value="kurang">kurang</option>
                                                    <option value="cukup">cukup</option>
                                                    <option value="sudah">sudah</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">7. Interaksi dengan peserta didik dan mendorongnya untuk memahami dan menggunakan informasi yang disampaikan dan direncanakan dengan baik</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="ap7" class="form-control">
                                                    <option value=""></option>
                                                    <option value="kurang">kurang</option>
                                                    <option value="cukup">cukup</option>
                                                    <option value="sudah">sudah</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">Dokumentasi dan bukti yang ada</label>
                                            <div style="margin-bottom: 10px" class="col-sm-2">
                                                <select type="text" name="ap8" class="form-control">
                                                    <option value=""></option>
                                                    <option value="kurang">kurang</option>
                                                    <option value="cukup">cukup</option>
                                                    <option value="sangat">sangat</option>
                                                </select>
                                            </div>

                                            <label class="col-sm-10 col-sm-10 control-label">karena itu perlu lebih lanjut</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="ap9" class="form-control">
                                                    <option value=""></option>
                                                    <option value="ditingkatkan">ditingkatkan</option>
                                                    <option value="dikembangkan">dikembangkan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="alert alert-info alert-block fade in">
                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                <i class="icon-remove"></i>
                                            </button>
                                            <p style="font-size:15px">Selama Pengamatan.</p>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">1. Penilaian hasil belajar mencakup</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="ap10" class="form-control">
                                                    <option value=""></option>
                                                    <option value="satu aspek">satu aspek</option>
                                                    <option value="dua aspek">dua aspek</option>
                                                    <option value="tiga aspek">tiga aspek</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">2. Pelaksanaan pembelajaran dapat mendorong dalam belajar</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="ap11" class="form-control">
                                                    <option value=""></option>
                                                    <option value="tidak">tidak</option>
                                                    <option value="cukup">cukup</option>
                                                    <option value="sangat">sangat</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">3. Pelaksanaan pembelajaran dapat memunculkan daya kretivitas dan kemampuan berfikir kritis peserta didik</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="ap12" class="form-control">
                                                    <option value=""></option>
                                                    <option value="tidak">tidak</option>
                                                    <option value="cukup">cukup</option>
                                                    <option value="sangat">sangat</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">4. Kegiatan pembelajaran terfokus pada peserta didik</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="ap13" class="form-control">
                                                    <option value=""></option>
                                                    <option value="kurang">kurang</option>
                                                    <option value="cukup">cukup</option>
                                                    <option value="sudah">sudah</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">5. Bakat, minat, potensi, dan kesulitan belajar masing-masing peserta didik teridentifikasi dengan baik</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="ap14" class="form-control">
                                                    <option value=""></option>
                                                    <option value="kurang">kurang</option>
                                                    <option value="cukup">cukup</option>
                                                    <option value="sudah">sudah</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">6. Peserta didik sesuai dengan cara belajarnya masing-masing direncanakan dengan baik</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="ap15" class="form-control">
                                                    <option value=""></option>
                                                    <option value="kurang">kurang</option>
                                                    <option value="cukup">cukup</option>
                                                    <option value="sudah">sudah</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">7. Interaksi dengan peserta didik dan mendorongnya untuk memahami dan menggunakan informasi yang disampaikan dan direncanakan dengan baik</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="ap16" class="form-control">
                                                    <option value=""></option>
                                                    <option value="kurang">kurang</option>
                                                    <option value="cukup">cukup</option>
                                                    <option value="sudah">sudah</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">Pelaksanaan pembelajaran dalam memahami dan mengembangkan potensi siswa terlaksana baik</label>
                                            <div style="margin-bottom: 10px" class="col-sm-2">
                                                <select type="text" name="ap17" class="form-control">
                                                    <option value=""></option>
                                                    <option value="kurang">kurang</option>
                                                    <option value="cukup">cukup</option>
                                                    <option value="sangat">sudah</option>
                                                </select>
                                            </div>

                                            <label class="col-sm-10 col-sm-10 control-label">karena itu perlu lebih lanjut</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="ap18" class="form-control">
                                                    <option value=""></option>
                                                    <option value="ditingkatkan">ditingkatkan</option>
                                                    <option value="dikembangkan">dikembangkan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="alert alert-info alert-block fade in">
                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                <i class="icon-remove"></i>
                                            </button>
                                            <p style="font-size:15px">Setelah Pengamatan.</p>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">Dokumentasi dan pelaksanaan KBM dalam memahami dan mengembangkan potensi siswa terlaksana dengan baik</label>
                                            <div style="margin-bottom: 10px" class="col-sm-2">
                                                <select type="text" name="ap19" class="form-control">
                                                    <option value=""></option>
                                                    <option value="kurang">kurang</option>
                                                    <option value="cukup">cukup</option>
                                                    <option value="sudah">sudah</option>
                                                </select>
                                            </div>

                                            <label class="col-sm-10 col-sm-10 control-label">karena itu perlu lebih lanjut</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="ap20" class="form-control">
                                                    <option value=""></option>
                                                    <option value="ditingkatkan">ditingkatkan</option>
                                                    <option value="dikembangkan">dikembangkan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">KBM dalam memahami dan mengembangkan potensi siswa perlu lebih lanjut</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="ap21" class="form-control">
                                                    <option value=""></option>
                                                    <option value="ditingkatkan">ditingkatkan</option>
                                                    <option value="dikembangkan">dikembangkan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="alert alert-info alert-block fade in">
                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                <i class="icon-remove"></i>
                                            </button>
                                            <p style="font-size:15px">Pemantauan.</p>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">Dokumentasi dan bukti dalam memahami dan mengembangkan potensi siswa</label>
                                            <div style="margin-bottom: 10px" class="col-sm-2">
                                                <select type="text" name="ap22" class="form-control">
                                                    <option value=""></option>
                                                    <option value="kurang baik">kurang baik</option>
                                                    <option value="cukup baik">cukup baik</option>
                                                    <option value="sudah baik">sudah baik</option>
                                                </select>
                                            </div>

                                            <label class="col-sm-10 col-sm-10 control-label">karena itu perlu lebih lanjut</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="ap23" class="form-control">
                                                    <option value=""></option>
                                                    <option value="ditingkatkan">ditingkatkan</option>
                                                    <option value="dikembangkan">dikembangkan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="alert alert-info alert-block fade in">
                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                <i class="icon-remove"></i>
                                            </button>
                                            <p style="font-size:15px">Penilaian.</p>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">1. Guru menganalisis hasil belajar berdasarkan segala bentuk penilaian terhadap setiap peserta didik untuk mengetahui tingkat kemajuan masing-masing</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="np1" class="form-control">
                                                    <option value=""></option>
                                                    <option value="0">Tidak terpenuhi</option>
                                                    <option value="1">Terpenuhi sebagian</option>
                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">2. Guru merancang dan melaksanakan aktivitas pembeljran yang mendorong peserta didik untuk beljar sesuai dengan kecakapan dan pola belajar masing-masing</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="np2" class="form-control">
                                                    <option value=""></option>
                                                    <option value="0">Tidak terpenuhi</option>
                                                    <option value="1">Terpenuhi sebagian</option>
                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">3. Guru merancang dan melaksanakan aktivitas pembelajaran untuk memunculkan daya kretivitas dan kemampuan berfikir kritis peserta didik</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="np3" class="form-control">
                                                    <option value=""></option>
                                                    <option value="0">Tidak terpenuhi</option>
                                                    <option value="1">Terpenuhi sebagian</option>
                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">4. Guru secara aktif membantu peserta didik dalam proses pembelajaran dengan memberikan perhatian kepada setiap individu</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="np4" class="form-control">
                                                    <option value=""></option>
                                                    <option value="0">Tidak terpenuhi</option>
                                                    <option value="1">Terpenuhi sebagian</option>
                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">5. Guru dapat mengidentifikasi dengan benar tentang bakat, minat, potensi, dan kesulitan belajar masing-masing peserta didik</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="np5" class="form-control">
                                                    <option value=""></option>
                                                    <option value="0">Tidak terpenuhi</option>
                                                    <option value="1">Terpenuhi sebagian</option>
                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">6. Guru memberikan kesempatan belajar kepada peserta didik sesuai dengan cara belajarnya masing-masing</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="np6" class="form-control">
                                                    <option value=""></option>
                                                    <option value="0">Tidak terpenuhi</option>
                                                    <option value="1">Terpenuhi sebagian</option>
                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 col-sm-10 control-label">7. Guru memusatkan perhatian pada interaksi dengan pesert didik dan mendorongnya untuk memahami dan menggunakan informasi yang dismpaikan</label>
                                            <div class="col-sm-2">
                                                <select type="text" name="np7" class="form-control">
                                                    <option value=""></option>
                                                    <option value="0">Tidak terpenuhi</option>
                                                    <option value="1">Terpenuhi sebagian</option>
                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                </select>
                                            </div>
                                        </div>
                                        Kompetensi 6 : Komunikasi dengan peserta didik
                                        </header>
                                        <div class="panel-body">
                                            <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_p6.php?mod=p6&act=nilai" method="POST" name="frmP6">

                                                <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

                                                <div class="alert alert-info alert-block fade in">
                                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                                        <i class="icon-remove"></i>
                                                    </button>
                                                    <p style="font-size:15px">Sebelum Pengamatan.</p>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">1. Pertanyaan yang menantang dirumuskan dengan baik</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="ap1" class="form-control">
                                                            <option value=""></option>
                                                            <option value="tidak">tidak</option>
                                                            <option value="cukup">cukup</option>
                                                            <option value="sudah">sudah</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">2. Pemberian penghargaan terhadap siswa yang aktif dirumuskan</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="ap2" class="form-control">
                                                            <option value=""></option>
                                                            <option value="tidak">tidak</option>
                                                            <option value="cukup">cukup</option>
                                                            <option value="sudah">sudah</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">3. Bentuk pertanyaan sesuai dengan tujuan pembelajaran/indikator</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="ap3" class="form-control">
                                                            <option value=""></option>
                                                            <option value="tidak">tidak</option>
                                                            <option value="cukup">cukup</option>
                                                            <option value="sudah">sudah</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">4. Kerjasama/diskusi antar siswa direncanakan dengn baik</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="ap4" class="form-control">
                                                            <option value=""></option>
                                                            <option value="kurang">kurang</option>
                                                            <option value="cukup">cukup</option>
                                                            <option value="sudah">sudah</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">5. Pendapat/jawaban siswa yang benar atupun salah direncanakan untuk dihargai</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="ap5" class="form-control">
                                                            <option value=""></option>
                                                            <option value="kurang">kurang</option>
                                                            <option value="cukup">cukup</option>
                                                            <option value="sudah">sudah</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">6. Untuk menghargai siswa yang lemah telah dirumuskan dengan baik</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="ap6" class="form-control">
                                                            <option value=""></option>
                                                            <option value="kurang">kurang</option>
                                                            <option value="cukup">cukup</option>
                                                            <option value="sangat">sangat</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">Perencanaan pembelajaran dalam mengembangkan komunikasi dengan peserta didik terlaksana baik</label>
                                                    <div style="margin-bottom: 10px" class="col-sm-2">
                                                        <select type="text" name="ap7" class="form-control">
                                                            <option value=""></option>
                                                            <option value="kurang">kurang</option>
                                                            <option value="cukup">cukup</option>
                                                            <option value="sudah">sudah</option>
                                                        </select>
                                                    </div>

                                                    <label class="col-sm-10 col-sm-10 control-label">karena dalam itu perlu lebih lanjut</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="ap8" class="form-control">
                                                            <option value=""></option>
                                                            <option value="ditingkatkan">ditingkatkan</option>
                                                            <option value="dikembangkan">dikembangkan</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="alert alert-info alert-block fade in">
                                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                                        <i class="icon-remove"></i>
                                                    </button>
                                                    <p style="font-size:15px">Selama Pengamatan.</p>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">1.Pertanyaan yang menantang dilakukan dengan baik</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="ap9" class="form-control">
                                                            <option value=""></option>
                                                            <option value="tidak">tidak</option>
                                                            <option value="cukup">cukup</option>
                                                            <option value="sudah">sudah</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">2. Pemberian penghargaan terhadap siswa yang aktif dilakukan</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="ap10" class="form-control">
                                                            <option value=""></option>
                                                            <option value="tidak">tidak</option>
                                                            <option value="cukup">cukup</option>
                                                            <option value="sudah">sudah</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">3. Bentuk pertanyaan sesuai dengan tujuan pembelajaran/indikator</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="ap11" class="form-control">
                                                            <option value=""></option>
                                                            <option value="tidak">tidak</option>
                                                            <option value="cukup">cukup</option>
                                                            <option value="sudah">sudah</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">4. Kerjasama/diskusi antar siswa direncanakan dengn baik</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="ap12" class="form-control">
                                                            <option value=""></option>
                                                            <option value="kurang">kurang</option>
                                                            <option value="cukup">cukup</option>
                                                            <option value="sudah">sudah</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">5. Pendapat/jawaban siswa yang benar atupun salah dilaksanakan untuk dihargai</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="ap13" class="form-control">
                                                            <option value=""></option>
                                                            <option value="kurang">kurang</option>
                                                            <option value="cukup">cukup</option>
                                                            <option value="sudah">sudah</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">6. Untuk menghargai siswa yang lemah telah dilakukan dengan baik</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="ap14" class="form-control">
                                                            <option value=""></option>
                                                            <option value="kurang">kurang</option>
                                                            <option value="cukup">cukup</option>
                                                            <option value="sangat">sangat</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">Pelaksanaan pembelajaran dalam mengembangkan komunikasi dengan peserta didik terlaksana baik</label>
                                                    <div style="margin-bottom: 10px" class="col-sm-2">
                                                        <select type="text" name="ap15" class="form-control">
                                                            <option value=""></option>
                                                            <option value="kurang">kurang</option>
                                                            <option value="cukup">cukup</option>
                                                            <option value="sudah">sudah</option>
                                                        </select>
                                                    </div>

                                                    <label class="col-sm-10 col-sm-10 control-label">karena dalam itu perlu lebih lanjut</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="ap16" class="form-control">
                                                            <option value=""></option>
                                                            <option value="ditingkatkan">ditingkatkan</option>
                                                            <option value="dikembangkan">dikembangkan</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="alert alert-info alert-block fade in">
                                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                                        <i class="icon-remove"></i>
                                                    </button>
                                                    <p style="font-size:15px">Setelah Pengamatan.</p>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">Dokumentasi dan pelaksanaan KBM dalam mengembangkan komunikasi dengan peserta didik terlaksana baik</label>
                                                    <div style="margin-bottom: 10px" class="col-sm-2">
                                                        <select type="text" name="ap17" class="form-control">
                                                            <option value=""></option>
                                                            <option value="kurang">kurang</option>
                                                            <option value="cukup">cukup</option>
                                                            <option value="sudah">sudah</option>
                                                        </select>
                                                    </div>

                                                    <label class="col-sm-10 col-sm-10 control-label">karena dalam itu perlu lebih lanjut</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="ap18" class="form-control">
                                                            <option value=""></option>
                                                            <option value="ditingkatkan">ditingkatkan</option>
                                                            <option value="dikembangkan">dikembangkan</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">KBM dalam memahami dan mengembangkan komunikasi dengan peserta didik perlu lebih lanjut</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="ap19" class="form-control">
                                                            <option value=""></option>
                                                            <option value="ditingkatkan">ditingkatkan</option>
                                                            <option value="dikembangkan">dikembangkan</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="alert alert-info alert-block fade in">
                                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                                        <i class="icon-remove"></i>
                                                    </button>
                                                    <p style="font-size:15px">Penilaian.</p>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">1. Guru menggunakan pertanyaan untuk mengetahui pemahaman dan menjaga partisipasi peserta didik, termasuk memberikan pertanyaan terbuka yang menuntut peserta didik untuk menjawab dengan ide dan pengetahuan mereka</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="np1" class="form-control">
                                                            <option value=""></option>
                                                            <option value="0">Tidak terpenuhi</option>
                                                            <option value="1">Terpenuhi sebagian</option>
                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">2. Guru memberikan perhatian dan menerangkan semua pertanyaan dan tanggapan peserta didik, tanpa menginterupsi, kecuali jika diperlukan untuk membantu atau mengklarifikasi pertanyaan/tanggapan tersebut</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="np2" class="form-control">
                                                            <option value=""></option>
                                                            <option value="0">Tidak terpenuhi</option>
                                                            <option value="1">Terpenuhi sebagian</option>
                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">3. Guru menanggapi pertanyaan peserta didik secara tepat, benar, dan mutakhir, sesuai tujuan pembelajaran dan isi kurikulum, tanpa mempermalukan</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="np3" class="form-control">
                                                            <option value=""></option>
                                                            <option value="0">Tidak terpenuhi</option>
                                                            <option value="1">Terpenuhi sebagian</option>
                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">4. Guru menyajikan kegiatan pembelajaran yang dapat menumbuhkan kerjasama yang baik antar peserta didik</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="np4" class="form-control">
                                                            <option value=""></option>
                                                            <option value="0">Tidak terpenuhi</option>
                                                            <option value="1">Terpenuhi sebagian</option>
                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">5. Guru mendengarkan dan memberikan perhatian terhadap semua jawaban peserta didik baik yang benar maupun yang dianggap salah untuk mengukur tingkat pemahaman peserta didik</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="np5" class="form-control">
                                                            <option value=""></option>
                                                            <option value="0">Tidak terpenuhi</option>
                                                            <option value="1">Terpenuhi sebagian</option>
                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-10 col-sm-10 control-label">6. Guru memberikan perhatian terhadap pertanyaan peserta didik dan meresponnya secara lengkap dan relevan untuk menghilangkan kebingungan pada peserta didik</label>
                                                    <div class="col-sm-2">
                                                        <select type="text" name="np6" class="form-control">
                                                            <option value=""></option>
                                                            <option value="0">Tidak terpenuhi</option>
                                                            <option value="1">Terpenuhi sebagian</option>
                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                Kompetensi 7 : Penilaian dan evaluasi
                                                </header>
                                                <div class="panel-body">
                                                    <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_p7.php?mod=p7&act=nilai" method="POST" name="frmP7">

                                                        <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

                                                        <div class="alert alert-info alert-block fade in">
                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                                <i class="icon-remove"></i>
                                                            </button>
                                                            <p style="font-size:15px">Sebelum Pengamatan.</p>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-sm-10 control-label">1. Alat penilaian yang disusun sesuai dengan tujuan pembelajaran/indikator</label>
                                                            <div class="col-sm-2">
                                                                <select type="text" name="ap1" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="tidak">tidak</option>
                                                                    <option value="sebagian">sebagian</option>
                                                                    <option value="seluruhnya">seluruhnya</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-sm-10 control-label">2. Penilaian yang disusun dengan menggunakan</label>
                                                            <div class="col-sm-2">
                                                                <select type="text" name="ap2" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="satu teknik penilaian">satu teknik penilaian</option>
                                                                    <option value="dua teknik penilaian">dua teknik penilaian</option>
                                                                    <option value="berbagai teknik penilaian">berbagai teknik penilaian</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-sm-10 control-label">3. Hasil penilaian yang dirumuskan dapat mengidentifikasi topik/kompetensi dasar yang sulit sehingga diketahui kekuatan dan kelemahan masing-masing peerta didik untuk keperluan remidial dan pengayaan</label>
                                                            <div class="col-sm-2">
                                                                <select type="text" name="ap3" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="kurang">kurang</option>
                                                                    <option value="cukup">cukup</option>
                                                                    <option value="sangat">sangat</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-sm-10 control-label">4. Releksi pembelajaran yang dirumuskan menerima masukan peserta didik yang sesuai</label>
                                                            <div class="col-sm-2">
                                                                <select type="text" name="ap4" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="tidak">tidak</option>
                                                                    <option value="kadang">kadang</option>
                                                                    <option value="selalu">selalu</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-sm-10 control-label">5. Hasil penilaian dijadikan masukan atau acuan penyusunan RPP selanjutnya</label>
                                                            <div class="col-sm-2">
                                                                <select type="text" name="ap5" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="tidak">tidak</option>
                                                                    <option value="sebagian">sebagian</option>
                                                                    <option value="seluruhnya">seluruhnya</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-sm-10 control-label">Perencanaan penilaian dan evaluasi pembelajaran peserta didik terlaksana baik</label>
                                                            <div style="margin-bottom: 10px" class="col-sm-2">
                                                                <select type="text" name="ap6" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="kurang">kurang</option>
                                                                    <option value="cukup">cukup</option>
                                                                    <option value="sudah">sudah</option>
                                                                </select>
                                                            </div>

                                                            <label class="col-sm-10 col-sm-10 control-label">karena dalam itu perlu</label>
                                                            <div class="col-sm-2">
                                                                <select type="text" name="ap7" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="ditingkatkan">ditingkatkan</option>
                                                                    <option value="dikembangkan">dikembangkan</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="alert alert-info alert-block fade in">
                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                                <i class="icon-remove"></i>
                                                            </button>
                                                            <p style="font-size:15px">Selama Pengamatan.</p>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-sm-10 control-label">1. Alat penilaian yang dilaksanakan sesuai dengan tujuan pembelajaran/indikator</label>
                                                            <div class="col-sm-2">
                                                                <select type="text" name="ap8" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="tidak">tidak</option>
                                                                    <option value="sebagian">sebagian</option>
                                                                    <option value="seluruhnya">seluruhnya</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-sm-10 control-label">2. Penilaian yang dilaksanakan dengan menggunakan</label>
                                                            <div class="col-sm-2">
                                                                <select type="text" name="ap9" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="satu teknik penilaian">satu teknik penilaian</option>
                                                                    <option value="dua teknik penilaian">dua teknik penilaian</option>
                                                                    <option value="berbagai teknik penilaian">berbagai teknik penilaian</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-sm-10 control-label">3. Hasil penilaian yang dilaksanakan dapat mengidentifikasi topik/kompetensi dasar yang sulit sehingga diketahui kekuatan dan kelemahan masing-masing peerta didik untuk keperluan remidial dan pengayaan</label>
                                                            <div class="col-sm-2">
                                                                <select type="text" name="ap10" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="kurang">kurang</option>
                                                                    <option value="cukup">cukup</option>
                                                                    <option value="sangat">sangat</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-sm-10 control-label">4. Releksi pembelajaran yang dilaksanakan menerima masukan peserta didik yang sesuai</label>
                                                            <div class="col-sm-2">
                                                                <select type="text" name="ap11" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="tidak">tidak</option>
                                                                    <option value="kadang">kadang</option>
                                                                    <option value="selalu">selalu</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-sm-10 control-label">5. Hasil penilaian dijadikan masukan atau acuan penyusunan RPP selanjutnya</label>
                                                            <div class="col-sm-2">
                                                                <select type="text" name="ap12" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="tidak">tidak</option>
                                                                    <option value="sebagian">sebagian</option>
                                                                    <option value="seluruhnya">seluruhnya</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-sm-10 control-label">Pelaksanaan penilaian dan evaluasi pembelajaran peserta didik terlaksana baik</label>
                                                            <div style="margin-bottom: 10px" class="col-sm-2">
                                                                <select type="text" name="ap13" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="kurang">kurang</option>
                                                                    <option value="cukup">cukup</option>
                                                                    <option value="sudah">sudah</option>
                                                                </select>
                                                            </div>

                                                            <label class="col-sm-10 col-sm-10 control-label">karena dalam itu perlu</label>
                                                            <div class="col-sm-2">
                                                                <select type="text" name="ap14" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="ditingkatkan">ditingkatkan</option>
                                                                    <option value="dikembangkan">dikembangkan</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="alert alert-info alert-block fade in">
                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                                <i class="icon-remove"></i>
                                                            </button>
                                                            <p style="font-size:15px">Setelah Pengamatan.</p>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-sm-10 control-label">Dokumentasi dan pelaksanaan KBM dalam penilaian dan evaluasi peserta didik terlaksana baik</label>
                                                            <div style="margin-bottom: 10px" class="col-sm-2">
                                                                <select type="text" name="ap15" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="kurang">kurang</option>
                                                                    <option value="cukup">cukup</option>
                                                                    <option value="sudah">sudah</option>
                                                                </select>
                                                            </div>

                                                            <label class="col-sm-10 col-sm-10 control-label">karena dalam itu perlu</label>
                                                            <div class="col-sm-2">
                                                                <select type="text" name="ap16" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="ditingkatkan">ditingkatkan</option>
                                                                    <option value="dikembangkan">dikembangkan</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-sm-10 control-label"> Penilaian dan evaluasi pada KBM perlu</label>
                                                            <div class="col-sm-2">
                                                                <select type="text" name="ap17" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="ditingkatkan">ditingkatkan</option>
                                                                    <option value="dikembangkan">dikembangkan</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="alert alert-info alert-block fade in">
                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                                <i class="icon-remove"></i>
                                                            </button>
                                                            <p style="font-size:15px">Penilaian.</p>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-sm-10 control-label">1. Guru menyusun alat penilaian yang sesuai dengan tujuan pembelajaran untuk mencapai kompetensi tertentu seperti yang tertulis dalam RPP</label>
                                                            <div class="col-sm-2">
                                                                <select type="text" name="np1" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="0">Tidak terpenuhi</option>
                                                                    <option value="1">Terpenuhi sebagian</option>
                                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-sm-10 control-label">2. Guru melaksanakan penilaian dengan berbagai teknik dan jenis penilaian, selain penilaian formal yang dilaksanakan sekolah, dan mengumumkan hasil serta implikasinya kepada peserta didik, tentang tingkat pemahaman terhadap materi pembelajaran yang telah akan dipelajari</label>
                                                            <div class="col-sm-2">
                                                                <select type="text" name="np2" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="0">Tidak terpenuhi</option>
                                                                    <option value="1">Terpenuhi sebagian</option>
                                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-sm-10 control-label">3. Guru menganalisis hasil penilaian untuk mengidentifikasi topik/kompetensi dasar yang sulit sehingga diketahui kekuatan dan kelemahan masing-masing peserta didik untuk keperluan remidial dan pengayaan</label>
                                                            <div class="col-sm-2">
                                                                <select type="text" name="np3" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="0">Tidak terpenuhi</option>
                                                                    <option value="1">Terpenuhi sebagian</option>
                                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-sm-10 control-label">4. Guru memanfaatkan masukan dari peserta didik dan merefleksikannya untuk meningkatkan pembelajaran selanjutnya, dan dapat membuktikannya melalui catatan, jurnal pembelajaran, rancangan pembelajaran, materi tambahan, dan sebagainya</label>
                                                            <div class="col-sm-2">
                                                                <select type="text" name="np4" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="0">Tidak terpenuhi</option>
                                                                    <option value="1">Terpenuhi sebagian</option>
                                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-sm-10 control-label">5. Guru memanfaatkan hasil penilaian sebagai bahan penyusunan rancangan pembelajaran yang akan dilakukan selanjutnya</label>
                                                            <div class="col-sm-2">
                                                                <select type="text" name="np5" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="0">Tidak terpenuhi</option>
                                                                    <option value="1">Terpenuhi sebagian</option>
                                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        Kompetensi 8 : Bertindak sesuai dengan norma agama, hukum, sosial, dan kebudayaan nasional Indonesia
                                                        </header>
                                                        <div class="panel-body">
                                                            <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_k1.php?mod=k1&act=nilai" method="POST" name="frmK1">

                                                                <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

                                                                <div class="alert alert-info alert-block fade in">
                                                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                                                        <i class="icon-remove"></i>
                                                                    </button>
                                                                    <p style="font-size:15px">Selama Pengamatan.</p>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-10 col-sm-10 control-label">1. Guru memahami kode etik guru dan prinsip-prinsip atau nilai-nilai Pancasila</label>
                                                                    <div class="col-sm-2">
                                                                        <select type="text" name="ak1" class="form-control">
                                                                            <option value=""></option>
                                                                            <option value="tidak">tidak</option>
                                                                            <option value="sedikit">sedikit</option>
                                                                            <option value="memadai">memadai</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-10 col-sm-10 control-label">2. Guru mampu mengembangkan kerjasama dan membina kebersamaan dengan teman sejawat tanpa memperhatikan perbedaan yang ada (misalnya: suku, agama, dan gender)</label>
                                                                    <div class="col-sm-2">
                                                                        <select type="text" name="ak2" class="form-control">
                                                                            <option value=""></option>
                                                                            <option value="tidak">tidak</option>
                                                                            <option value="cukup">cukup</option>
                                                                            <option value="sangat">sangat</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-10 col-sm-10 control-label">3. Guru menghormati dan menghargai teman sejawat sesuai dengan kondisi dan keberadaan masing-masing</label>
                                                                    <div class="col-sm-2">
                                                                        <select type="text" name="ak3" class="form-control">
                                                                            <option value=""></option>
                                                                            <option value="kurang">kurang</option>
                                                                            <option value="kadang-kadang">kadang-kadang</option>
                                                                            <option value="selalu">selalu</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-10 col-sm-10 control-label">4. Guru memiliki rasa persatuan dan kesatuan (nasionalisme)</label>
                                                                    <div class="col-sm-2">
                                                                        <select type="text" name="ak4" class="form-control">
                                                                            <option value=""></option>
                                                                            <option value="kurang">kurang</option>
                                                                            <option value="cukup">cukup</option>
                                                                            <option value="sangat">sangat</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-10 col-sm-10 control-label">5. Guru mempunyai pandangan yang luas tentang keberagaman bangsa Indonesia( misalnya:budaya, suku, agama)</label>
                                                                    <div class="col-sm-2">
                                                                        <select type="text" name="ak5" class="form-control">
                                                                            <option value=""></option>
                                                                            <option value="tidak">tidak</option>
                                                                            <option value="sedikit">sedikit</option>
                                                                            <option value="memadai">memadai</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-10 col-sm-10 control-label">Sikap dan perilaku guru dalam bertindak sesuai dengan norma agama, hukum, sosial, dan kebudayaan nasional Indonesia perlu</label>
                                                                    <div class="col-sm-2">
                                                                        <select type="text" name="ak6" class="form-control">
                                                                            <option value=""></option>
                                                                            <option value="ditingkatkan">ditingkatkan</option>
                                                                            <option value="dikembangkan">dikembangkan</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="alert alert-info alert-block fade in">
                                                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                                                        <i class="icon-remove"></i>
                                                                    </button>
                                                                    <p style="font-size:15px">Pemantauan.</p>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-10 col-sm-10 control-label">1. Guru memiliki pandangan yang luas tentang keragaman suku, budaya, dan agama dengan dilandasi perinsip- perinsip Pancasila sebagai sebagai ideologi Bangsa Indonesia dengan semboyan Bhineka Tunggal Ika</label>
                                                                    <div class="col-sm-2">
                                                                        <select type="text" name="ak7" class="form-control">
                                                                            <option value=""></option>
                                                                            <option value="kurang">kurang</option>
                                                                            <option value="cukup">cukup</option>
                                                                            <option value="sangat">sangat</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-10 col-sm-10 control-label">2. Dalam kehidupan sehari-hari baik di sekolah maupun di masyarakat menunjukan sikapsaling menghormati, solidaritas, dan bekerja sama</label>
                                                                    <div class="col-sm-2">
                                                                        <select type="text" name="ak8" class="form-control">
                                                                            <option value=""></option>
                                                                            <option value="kurang">kurang</option>
                                                                            <option value="cukup">cukup</option>
                                                                            <option value="sangat">sangat</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="alert alert-info alert-block fade in">
                                                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                                                        <i class="icon-remove"></i>
                                                                    </button>
                                                                    <p style="font-size:15px">Penilaian.</p>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-10 col-sm-10 control-label">1. Guru menghargai dan mempromosikan prinsip-prinsip Pancasila sebagai ideologi dan etika bagi semua warga Indonesia.</label>
                                                                    <div class="col-sm-2">
                                                                        <select type="text" name="nk1" class="form-control">
                                                                            <option value=""></option>
                                                                            <option value="0">Tidak terpenuhi</option>
                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-10 col-sm-10 control-label">2. Guru mengembangkan kerjasama dan membina kebersamaan dengan teman sejawat tanpa memperhatikan perbedaan yang ada (misalnya:suku,agama, dan gender)</label>
                                                                    <div class="col-sm-2">
                                                                        <select type="text" name="nk2" class="form-control">
                                                                            <option value=""></option>
                                                                            <option value="0">Tidak terpenuhi</option>
                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-10 col-sm-10 control-label">3. Guru saling menghormati dan menghargai teman sejawat sesuai dengan kondisi dan keberadaan masing-masing</label>
                                                                    <div class="col-sm-2">
                                                                        <select type="text" name="nk3" class="form-control">
                                                                            <option value=""></option>
                                                                            <option value="0">Tidak terpenuhi</option>
                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-10 col-sm-10 control-label">4. Guru memiliki rasa persatuan dan kesatuan sebagai bangsa Indonesia</label>
                                                                    <div class="col-sm-2">
                                                                        <select type="text" name="nk4" class="form-control">
                                                                            <option value=""></option>
                                                                            <option value="0">Tidak terpenuhi</option>
                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-10 col-sm-10 control-label">5. Guru mempunyai pandangan yang luas tentang keberagaman bangsa Indonesia (misalnya: budaya, suku, agama)</label>
                                                                    <div class="col-sm-2">
                                                                        <select type="text" name="nk5" class="form-control">
                                                                            <option value=""></option>
                                                                            <option value="0">Tidak terpenuhi</option>
                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                Kompetensi 9 : Menunjukan pribadi yang dewasa dan teladan
                                                                </header>
                                                                <div class="panel-body">
                                                                    <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_k2.php?mod=k2&act=nilai" method="POST" name="frmK2">

                                                                        <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

                                                                        <div class="alert alert-info alert-block fade in">
                                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                <i class="icon-remove"></i>
                                                                            </button>
                                                                            <p style="font-size:15px">Pengamatan.</p>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="col-sm-10 col-sm-10 control-label">1. Guru bertingkah laku sopan dalam berbicara, berpenampilan, dan berbuat terhadap semua peserta didik, orang tua, dan teman sejawat</label>
                                                                            <div class="col-sm-2">
                                                                                <select type="text" name="ak1" class="form-control">
                                                                                    <option value=""></option>
                                                                                    <option value="kurang">kurang</option>
                                                                                    <option value="cukup">cukup</option>
                                                                                    <option value="sangat">sangat</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="col-sm-10 col-sm-10 control-label">2. Guru bersedia membagi pengalamannya dengan teman sejawat, termasuk mengundang mereka untuk mengobservasi cara mengajarnya dan memberikan masukan</label>
                                                                            <div class="col-sm-2">
                                                                                <select type="text" name="ak2" class="form-control">
                                                                                    <option value=""></option>
                                                                                    <option value="kurang">kurang</option>
                                                                                    <option value="cukup">cukup</option>
                                                                                    <option value="sangat">sangat</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group">
                                                                            <label class="col-sm-10 col-sm-10 control-label">3. Guru mampu mengelola pembelajaran yang membuktikan bahwa guru dihormati oleh peserta didik, sehingga semua peserta didik selalu memperhatikan guru dan berpatisipasi aktif dalam proses pembelajaran</label>
                                                                            <div class="col-sm-2">
                                                                                <select type="text" name="ak3" class="form-control">
                                                                                    <option value=""></option>
                                                                                    <option value="kurang">kurang</option>
                                                                                    <option value="cukup">cukup</option>
                                                                                    <option value="sangat">sangat</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="col-sm-10 col-sm-10 control-label">4. Guru bersikap dewasa dalam menerima masukan dari peserta didik dan memberikan kesempatan kepada peserta didik untuk berpartisipadi dalam proses pembelajaran</label>
                                                                            <div class="col-sm-2">
                                                                                <select type="text" name="ak4" class="form-control">
                                                                                    <option value=""></option>
                                                                                    <option value="kurang">kurang</option>
                                                                                    <option value="cukup">cukup</option>
                                                                                    <option value="sangat">sangat</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group">
                                                                            <label class="col-sm-10 col-sm-10 control-label">5. Guru berperilaku baik untuk mencitrakan nama baik sekolah</label>
                                                                            <div class="col-sm-2">
                                                                                <select type="text" name="ak5" class="form-control">
                                                                                    <option value=""></option>
                                                                                    <option value="kurang">kurang</option>
                                                                                    <option value="cukup">cukup</option>
                                                                                    <option value="sangat">sangat</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="col-sm-10 col-sm-10 control-label">Sikap dan perilaku guru dalam menunjukan pribadi yang dewasa dan teladan perlu </label>
                                                                            <div class="col-sm-2">
                                                                                <select type="text" name="ak6" class="form-control">
                                                                                    <option value=""></option>
                                                                                    <option value="ditingkatkan">ditingkatkan</option>
                                                                                    <option value="dikembangkan">dikembangkan</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="alert alert-info alert-block fade in">
                                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                <i class="icon-remove"></i>
                                                                            </button>
                                                                            <p style="font-size:15px">Pemantauan.</p>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="col-sm-10 col-sm-10 control-label">1. Guru hadir tepat waktu baik di sekolah dan di kelas</label>
                                                                            <div class="col-sm-2">
                                                                                <select type="text" name="ak7" class="form-control">
                                                                                    <option value=""></option>
                                                                                    <option value="tidak">tidak</option>
                                                                                    <option value="kadang-kadang">kadang-kadang</option>
                                                                                    <option value="selalu">selalu</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="col-sm-10 col-sm-10 control-label">2. Hasil evaluasi dan tugas siswa dinilai dan dikembalikan ke siswa</label>
                                                                            <div class="col-sm-2">
                                                                                <select type="text" name="ak8" class="form-control">
                                                                                    <option value=""></option>
                                                                                    <option value="tidak">tidak</option>
                                                                                    <option value="kadang-kadang">kadang-kadang</option>
                                                                                    <option value="selalu">selalu</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="col-sm-10 col-sm-10 control-label">3. Guru berperan aktif dalam kegiatan MGMP di sekolah</label>
                                                                            <div class="col-sm-2">
                                                                                <select type="text" name="ak9" class="form-control">
                                                                                    <option value=""></option>
                                                                                    <option value="tidak">tidak</option>
                                                                                    <option value="kadang-kadang">kadang-kadang</option>
                                                                                    <option value="selalu">selalu</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="alert alert-info alert-block fade in">
                                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                <i class="icon-remove"></i>
                                                                            </button>
                                                                            <p style="font-size:15px">Penilaian.</p>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="col-sm-10 col-sm-10 control-label">1. Guru bertingkah laku sopan dalam berbicara, berpenampilan, dan berbuat terhadap semua peserta didik, orang tua, dan teman sejawat</label>
                                                                            <div class="col-sm-2">
                                                                                <select type="text" name="nk1" class="form-control">
                                                                                    <option value=""></option>
                                                                                    <option value="0">Tidak terpenuhi</option>
                                                                                    <option value="1">Terpenuhi sebagian</option>
                                                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group">
                                                                            <label class="col-sm-10 col-sm-10 control-label">2. Guru bersedia membagi pengalamannya dengan teman sejawat, termasuk mengundang mereka untuk mengobservasi cara mengajarnya dan memberikan masukan</label>
                                                                            <div class="col-sm-2">
                                                                                <select type="text" name="nk2" class="form-control">
                                                                                    <option value=""></option>
                                                                                    <option value="0">Tidak terpenuhi</option>
                                                                                    <option value="1">Terpenuhi sebagian</option>
                                                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="col-sm-10 col-sm-10 control-label">3. Guru mampu mengelola pembelajaran yang membuktikan bahwa guru dihormati oleh peserta didik, sehingga semua peserta didik selalu memperhatikan guru dan berpatisipasi aktif dalam proses pembelajaran</label>
                                                                            <div class="col-sm-2">
                                                                                <select type="text" name="nk3" class="form-control">
                                                                                    <option value=""></option>
                                                                                    <option value="0">Tidak terpenuhi</option>
                                                                                    <option value="1">Terpenuhi sebagian</option>
                                                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="col-sm-10 col-sm-10 control-label">4. Guru bersikap dewasa dalam menerima masukan dari peserta didik dan memberikan kesempatan kepada peserta didik untuk berpartisipadi dalam proses pembelajaran</label>
                                                                            <div class="col-sm-2">
                                                                                <select type="text" name="nk4" class="form-control">
                                                                                    <option value=""></option>
                                                                                    <option value="0">Tidak terpenuhi</option>
                                                                                    <option value="1">Terpenuhi sebagian</option>
                                                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="col-sm-10 col-sm-10 control-label">5. Guru berperilaku baik untuk mencitrakan nama baik sekolah</label>
                                                                            <div class="col-sm-2">
                                                                                <select type="text" name="nk5" class="form-control">
                                                                                    <option value=""></option>
                                                                                    <option value="0">Tidak terpenuhi</option>
                                                                                    <option value="1">Terpenuhi sebagian</option>
                                                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        Kompetensi 10 : Etos kerja, tanggung jawab yang tinggi, dan rasa bangga menjadi guru
                                                                        </header>
                                                                        <div class="panel-body">
                                                                            <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_k3.php?mod=k3&act=nilai" method="POST" name="frmK3">

                                                                                <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

                                                                                <div class="alert alert-info alert-block fade in">
                                                                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                        <i class="icon-remove"></i>
                                                                                    </button>
                                                                                    <p style="font-size:15px">Selama Pengamatan.</p>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="col-sm-10 col-sm-10 control-label">1. Guru mengawali dan mengakhiri pembelajaran dengan tepat waktu</label>
                                                                                    <div class="col-sm-2">
                                                                                        <select type="text" name="ak1" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="tidak">tidak</option>
                                                                                            <option value="kadang-kadang">kadang-kadang</option>
                                                                                            <option value="selalu">selalu</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="col-sm-10 col-sm-10 control-label">2. Jika guru harus meninggalkan kelas, guru mengaktifkan siswa dengan melakukan hal-hal produktif terkait dengan mata pelajaran, dan meminta guru piket atau guru lain untuk mengawasi kelas</label>
                                                                                    <div class="col-sm-2">
                                                                                        <select type="text" name="ak2" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="tidak">tidak</option>
                                                                                            <option value="kadang-kadang">kadang-kadang</option>
                                                                                            <option value="selalu">selalu</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="col-sm-10 col-sm-10 control-label">3. Guru memenuhi jam mengajar dan dapat melakukan semua kegiatan lain diluar jam mengajar berdasarkan izin dan persetujuan dari pengelola sekolah</label>
                                                                                    <div class="col-sm-2">
                                                                                        <select type="text" name="ak3" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="tidak">tidak</option>
                                                                                            <option value="kadang-kadang">kadang-kadang</option>
                                                                                            <option value="selalu">selalu</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="col-sm-10 col-sm-10 control-label">4. Guru meminta ijin dan memberitahu lebih awal dengan memberikan alasan dan bukti yang sah jika tidak menghadiri kegiatan yang telah direncanakan, termasuk proses pembelajaran di kelas</label>
                                                                                    <div class="col-sm-2">
                                                                                        <select type="text" name="ak4" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="tidak">tidak</option>
                                                                                            <option value="kadang-kadang">kadang-kadang</option>
                                                                                            <option value="selalu">selalu</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="col-sm-10 col-sm-10 control-label">5. Guru menyelesaikan semua tugas administratif dan non-pembelajaran dengan tepat waktu sesuai standar yang ditetapkan</label>
                                                                                    <div class="col-sm-2">
                                                                                        <select type="text" name="ak5" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="tidak">tidak</option>
                                                                                            <option value="kadang-kadang">kadang-kadang</option>
                                                                                            <option value="selalu">selalu</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="col-sm-10 col-sm-10 control-label">6. Guru memanfaatkan waktu luang selain mengajar untuk kegiatan yang produktif terkait dengan tugasnya</label>
                                                                                    <div class="col-sm-2">
                                                                                        <select type="text" name="ak6" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="tidak">tidak</option>
                                                                                            <option value="kadang-kadang">kadang-kadang</option>
                                                                                            <option value="selalu">selalu</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="col-sm-10 col-sm-10 control-label">7. Guru memberikan kontribusi terhadap pengembangan sekolah dan mempunyai prestasi yang berdampak positif terhadap nama baik sekolah</label>
                                                                                    <div class="col-sm-2">
                                                                                        <select type="text" name="ak7" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="tidak">tidak</option>
                                                                                            <option value="kadang-kadang">kadang-kadang</option>
                                                                                            <option value="selalu">selalu</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="col-sm-10 col-sm-10 control-label">8. Guru merasa bangga dengan profesinya sebagai guru</label>
                                                                                    <div class="col-sm-2">
                                                                                        <select type="text" name="ak8" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="tidak">tidak</option>
                                                                                            <option value="kadang-kadang">kadang-kadang</option>
                                                                                            <option value="selalu">selalu</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="col-sm-10 col-sm-10 control-label">sikap dan perilaku guru dalam etos kerja, tanggung jawab yang tingi, dan rasa bangga menjadi guru perlu</label>
                                                                                    <div class="col-sm-2">
                                                                                        <select type="text" name="ak9" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="ditingkatkan">ditingkatkan</option>
                                                                                            <option value="dikembangkan">dikembangkan</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="alert alert-info alert-block fade in">
                                                                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                        <i class="icon-remove"></i>
                                                                                    </button>
                                                                                    <p style="font-size:15px">Pemantauan.</p>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="col-sm-10 col-sm-10 control-label">1. Pengaturan waktu dalam memulai dan mengakhiri pembelajaran sesuai dengan RPP</label>
                                                                                    <div class="col-sm-2">
                                                                                        <select type="text" name="ak10" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="tidak">tidak</option>
                                                                                            <option value="kadang-kadang">kadang-kadang</option>
                                                                                            <option value="selalu">selalu</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="col-sm-10 col-sm-10 control-label">2. Kehadiran guru di kelas</label>
                                                                                    <div class="col-sm-2">
                                                                                        <select type="text" name="ak11" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="dibawah 50 %">dibawah 50 %</option>
                                                                                            <option value="kurang dari 80 %">kurang dari 80 %</option>
                                                                                            <option value="lebih dari 80 %">lebih dari 80 %</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="alert alert-info alert-block fade in">
                                                                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                        <i class="icon-remove"></i>
                                                                                    </button>
                                                                                    <p style="font-size:15px">Penilaian.</p>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="col-sm-10 col-sm-10 control-label">1. Guru mengawali dan mengakhiri pembelajaran dengan tepat waktu </label>
                                                                                    <div class="col-sm-2">
                                                                                        <select type="text" name="nk1" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="0">Tidak terpenuhi</option>
                                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="col-sm-10 col-sm-10 control-label">2. Jika guru harus meninggalkan kelas, guru mengaktifkan siswa dengan melakukan hal-hal produktif terkait dengan mata pelajaran, dan meminta guru piket atau guru lain untuk mengawasi kelas</label>
                                                                                    <div class="col-sm-2">
                                                                                        <select type="text" name="nk2" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="0">Tidak terpenuhi</option>
                                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="col-sm-10 col-sm-10 control-label">3. Guru memenuhi jam mengajar dan dapat melakukan semua kegiatan lain diluar jam mengajar berdasarkan izin dan persetujuan dari pengelola sekolah</label>
                                                                                    <div class="col-sm-2">
                                                                                        <select type="text" name="nk3" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="0">Tidak terpenuhi</option>
                                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="col-sm-10 col-sm-10 control-label">4. Guru meminta ijin dan memberitahu lebih awal dengan memberikan alasan dan bukti yang sah jika tidak menghadiri kegiatan yang telah direncanakan, termasuk proses pembelajaran di kelas</label>
                                                                                    <div class="col-sm-2">
                                                                                        <select type="text" name="nk4" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="0">Tidak terpenuhi</option>
                                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="col-sm-10 col-sm-10 control-label">5. Guru menyelesaikan semua tugas administratif dan non-pembelajaran dengan tepat waktu sesuai standar yang ditetapkan</label>
                                                                                    <div class="col-sm-2">
                                                                                        <select type="text" name="nk5" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="0">Tidak terpenuhi</option>
                                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="col-sm-10 col-sm-10 control-label">6. Guru memanfaatkan waktu luang selain mengajar untuk kegiatan yang produktif terkait dengan tugasnya</label>
                                                                                    <div class="col-sm-2">
                                                                                        <select type="text" name="nk6" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="0">Tidak terpenuhi</option>
                                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="col-sm-10 col-sm-10 control-label">7. Guru memberikan kontribusi terhadap pengembangan sekolah dan mempunyai prestasi yang berdampak positif terhadap nama baik sekolah</label>
                                                                                    <div class="col-sm-2">
                                                                                        <select type="text" name="nk7" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="0">Tidak terpenuhi</option>
                                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="col-sm-10 col-sm-10 control-label">8. Guru merasa bangga dengan profesinya sebagai guru</label>
                                                                                    <div class="col-sm-2">
                                                                                        <select type="text" name="nk8" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="0">Tidak terpenuhi</option>
                                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                Kompetensi 11 : Bersikap inklusif, bertindak obyektif, serta tidak diskriminatif
                                                                                </header>
                                                                                <div class="panel-body">
                                                                                    <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_s1.php?mod=s1&act=nilai" method="POST" name="frmS1">

                                                                                        <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

                                                                                        <div class="alert alert-info alert-block fade in">
                                                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                                <i class="icon-remove"></i>
                                                                                            </button>
                                                                                            <p style="font-size:15px">Selama Pengamatan.</p>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-10 col-sm-10 control-label">1. Guru memperlakukan semua peserta didik secara adil, memberikan perhatian dan bantuan sesuai kebutuhan masing--masing, tanpa memperdulikan faktor personal</label>
                                                                                            <div class="col-sm-2">
                                                                                                <select type="text" name="as1" class="form-control">
                                                                                                    <option value=""></option>
                                                                                                    <option value="kurang">kurang</option>
                                                                                                    <option value="cukup">cukup</option>
                                                                                                    <option value="selalu">selalu</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-10 col-sm-10 control-label">2. Guru menjaga hubungan baik dan peduli dengan teman sejawat (bersifat inklusif), serta berkontribusi positif terhadap semua diskusi formal dan informal terkait dengan pekerjaannya</label>
                                                                                            <div class="col-sm-2">
                                                                                                <select type="text" name="as2" class="form-control">
                                                                                                    <option value=""></option>
                                                                                                    <option value="kurang">kurang</option>
                                                                                                    <option value="cukup">cukup</option>
                                                                                                    <option value="selalu">selalu</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-10 col-sm-10 control-label">3. Guru berinteraksi dengan peserta didik dan tidak membatasi perhatiannya hanya pada kelompok tertentu (misalnya: peserta didik yang pandai, kaya, berasal dari daerah yang sama dengan guru) dilakukannya dengan baik</label>
                                                                                            <div class="col-sm-2">
                                                                                                <select type="text" name="as3" class="form-control">
                                                                                                    <option value=""></option>
                                                                                                    <option value="kurang">kurang</option>
                                                                                                    <option value="cukup">cukup</option>
                                                                                                    <option value="selalu">selalu</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-10 col-sm-10 control-label">Sikap dan perilaku guru dalam etos kerja, tanggung jawab yang tinggi, dan rasa bangga menjadi guru perlu</label>
                                                                                            <div class="col-sm-2">
                                                                                                <select type="text" name="as4" class="form-control">
                                                                                                    <option value=""></option>
                                                                                                    <option value="ditingkatkan">ditingkatkan</option>
                                                                                                    <option value="dikembangkan">dikembangkan</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="alert alert-info alert-block fade in">
                                                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                                <i class="icon-remove"></i>
                                                                                            </button>
                                                                                            <p style="font-size:15px">Pemantauan.</p>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-10 col-sm-10 control-label">1. Guru berkomunikasi dan berinteraksi dengan peserta didik, sambil bertanya dengan individu atau kelompok sangat KBM dengan baik</label>
                                                                                            <div class="col-sm-2">
                                                                                                <select type="text" name="as5" class="form-control">
                                                                                                    <option value=""></option>
                                                                                                    <option value="kurang">kurang</option>
                                                                                                    <option value="cukup">cukup</option>
                                                                                                    <option value="sangat">sangat</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-10 col-sm-10 control-label">2. Guru memberikan reward kepada peserta didik yang memberikan jawaban dan pekerjaan yang benar dan baik</label>
                                                                                            <div class="col-sm-2">
                                                                                                <select type="text" name="as6" class="form-control">
                                                                                                    <option value=""></option>
                                                                                                    <option value="tidak pernah">tidak pernah</option>
                                                                                                    <option value="sering">sering</option>
                                                                                                    <option value="selalu">selalu</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-10 col-sm-10 control-label">3. Kepedulian guru kepada semua warga sekolah, orang tua, dan masyarakat lingkungan sekolah dengan baik</label>
                                                                                            <div class="col-sm-2">
                                                                                                <select type="text" name="as7" class="form-control">
                                                                                                    <option value=""></option>
                                                                                                    <option value="kurang">kurang</option>
                                                                                                    <option value="cukup">cukup</option>
                                                                                                    <option value="sangat">sangat</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-10 col-sm-10 control-label">4. Guru memberikan kontribusi dalam berbagai pertemuan diskusi dan rapat kerja sekolah</label>
                                                                                            <div class="col-sm-2">
                                                                                                <select type="text" name="as8" class="form-control">
                                                                                                    <option value=""></option>
                                                                                                    <option value="tidak pernah">tidak pernah</option>
                                                                                                    <option value="kadang-kadang">kadang-kadang</option>
                                                                                                    <option value="sering">sering</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="alert alert-info alert-block fade in">
                                                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                                <i class="icon-remove"></i>
                                                                                            </button>
                                                                                            <p style="font-size:15px">Penilaian.</p>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-10 col-sm-10 control-label">1. Guru memperlakukan semua peserta didik secara adil, memberikan perhatian dan bantuan sesuai kebutuhan masing--masing, tanpa memperdulikan faktor personal</label>
                                                                                            <div class="col-sm-2">
                                                                                                <select type="text" name="ns1" class="form-control">
                                                                                                    <option value=""></option>
                                                                                                    <option value="0">Tidak terpenuhi</option>
                                                                                                    <option value="1">Terpenuhi sebagian</option>
                                                                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-10 col-sm-10 control-label">2. Guru menjaga hubungan baik dan peduli dengan teman sejawat (bersifat inklusif), serta berkontribusi positif terhadap semua diskusi formal dan informal terkait dengan pekerjaannya</label>
                                                                                            <div class="col-sm-2">
                                                                                                <select type="text" name="ns2" class="form-control">
                                                                                                    <option value=""></option>
                                                                                                    <option value="0">Tidak terpenuhi</option>
                                                                                                    <option value="1">Terpenuhi sebagian</option>
                                                                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-10 col-sm-10 control-label">3. Guru sering berinteraksi dengan peserta didik dan tidak membatasi perhatiannya hanya pada kelompok tertentu (misalnya: peserta didik yang pandai, kaya, berasal dari daerah yang sama dengan guru) dilakukannya dengan baik</label>
                                                                                            <div class="col-sm-2">
                                                                                                <select type="text" name="ns3" class="form-control">
                                                                                                    <option value=""></option>
                                                                                                    <option value="0">Tidak terpenuhi</option>
                                                                                                    <option value="1">Terpenuhi sebagian</option>
                                                                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        Kompetensi 12 : Komunikasi dengan sesama guru, tenaga pendidikan, orang tua peserta didik, dan masyarakat
                                                                                        </header>
                                                                                        <div class="panel-body">
                                                                                            <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_s2.php?mod=s2&act=nilai" method="POST" name="frmS2">

                                                                                                <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

                                                                                                <div class="alert alert-info alert-block fade in">
                                                                                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                                        <i class="icon-remove"></i>
                                                                                                    </button>
                                                                                                    <p style="font-size:15px">Pemantauan.</p>
                                                                                                </div>

                                                                                                <div class="form-group">
                                                                                                    <label class="col-sm-10 col-sm-10 control-label">1.Guru memiliki dokumen pencatatan pertemuan guru yang berkenaan dengan aspek kemajuan, kesulitan, dan potensi peserta didik dengan</label>
                                                                                                    <div class="col-sm-2">
                                                                                                        <select type="text" name="as1" class="form-control">
                                                                                                            <option value=""></option>
                                                                                                            <option value="tidak lengkap">tidak lengkap</option>
                                                                                                            <option value="cukup lengkap">cukup lengkap</option>
                                                                                                            <option value="lengkap dan baik">lengkap dan baik</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="form-group">
                                                                                                    <label class="col-sm-10 col-sm-10 control-label">2. Adanya dokumen kerjasama guru dengan guru BK dan wkasek serta tenaga TU berkenaan dengan pelayanan terhadap peserta didik dalam berbagai aspek dengan</label>
                                                                                                    <div class="col-sm-2">
                                                                                                        <select type="text" name="as2" class="form-control">
                                                                                                            <option value=""></option>
                                                                                                            <option value="tidak lengkap">tidak lengkap</option>
                                                                                                            <option value="cukup lengkap">cukup lengkap</option>
                                                                                                            <option value="lengkap dan baik">lengkap dan baik</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="form-group">
                                                                                                    <label class="col-sm-10 col-sm-10 control-label">3. Guru memperhatikan sekolah sebagai bagian dari masyarakat, berkomunikasi dengan masyarakat sekitar, serta berperan dalam kegiatan sosial di masyarakat</label>
                                                                                                    <div class="col-sm-2">
                                                                                                        <select type="text" name="as3" class="form-control">
                                                                                                            <option value=""></option>
                                                                                                            <option value="kurang">kurang</option>
                                                                                                            <option value="ckadang-kadang">kadang-kadang</option>
                                                                                                            <option value="selalu">selalu</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="alert alert-info alert-block fade in">
                                                                                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                                        <i class="icon-remove"></i>
                                                                                                    </button>
                                                                                                    <p style="font-size:15px">Penilaian.</p>
                                                                                                </div>

                                                                                                <div class="form-group">
                                                                                                    <label class="col-sm-10 col-sm-10 control-label">1.Guru menyampaikan informasi tentang kemajuan, kesulitan, dan potensi peserta didik kepada orang tuanya, baik dalam pertemuan formal maupun tidak formal antara guru dan orang tuanya, teman sejawat, dan dapat menunjukan buktinya</label>
                                                                                                    <div class="col-sm-2">
                                                                                                        <select type="text" name="ns1" class="form-control">
                                                                                                            <option value=""></option>
                                                                                                            <option value="0">Tidak terpenuhi</option>
                                                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="form-group">
                                                                                                    <label class="col-sm-10 col-sm-10 control-label">2.Guru berperan aktif dalam kegiatan di luar pembelajaran yang diselenggarakan oleh sekolah dan masyarakat dan dapat memberikan bukti keikutsertaannya</label>
                                                                                                    <div class="col-sm-2">
                                                                                                        <select type="text" name="ns2" class="form-control">
                                                                                                            <option value=""></option>
                                                                                                            <option value="0">Tidak terpenuhi</option>
                                                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="form-group">
                                                                                                    <label class="col-sm-10 col-sm-10 control-label">3. Guru memperhatikan sekolah sebagai bagian dari masyarakat, berkomunikasi dengan masyarakat sekitar, serta berperan dalam kegiatan sosial di masyarakat</label>
                                                                                                    <div class="col-sm-2">
                                                                                                        <select type="text" name="ns3" class="form-control">
                                                                                                            <option value=""></option>
                                                                                                            <option value="0">Tidak terpenuhi</option>
                                                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>

                                                                                                Kompetensi 13 : Penugasan materi, struktur, konsep, dan pola pikir keilmuan yang mendukung mata pelajaran yang diampu
                                                                                                </header>
                                                                                                <div class="panel-body">
                                                                                                    <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_pf1.php?mod=pf1&act=nilai" method="POST" name="frmPf1">

                                                                                                        <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

                                                                                                        <div class="alert alert-info alert-block fade in">
                                                                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                                                <i class="icon-remove"></i>
                                                                                                            </button>
                                                                                                            <p style="font-size:15px">Sebelum Pengamatan.</p>
                                                                                                        </div>

                                                                                                        <div class="form-group">
                                                                                                            <label class="col-sm-10 col-sm-10 control-label">1. Guru melakukan pemetaan standar kompetensi dan kompetensi dasar sampai dengan mengidentifikasi kesulitan materi pelajaran dengan benar</label>
                                                                                                            <div class="col-sm-2">
                                                                                                                <select type="text" name="apf1" class="form-control">
                                                                                                                    <option value=""></option>
                                                                                                                    <option value="tidak">tidak</option>
                                                                                                                    <option value="kadang-kadang">kadang-kadang</option>
                                                                                                                    <option value="selalu">selalu</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-group">
                                                                                                            <label class="col-sm-10 col-sm-10 control-label">2. Guru merumuskan materi pembelajaran dalam rencana pelaksanaan pembelajaran sesuai dengan kondisi sekolah dengan kualitas</label>
                                                                                                            <div class="col-sm-2">
                                                                                                                <select type="text" name="apf2" class="form-control">
                                                                                                                    <option value=""></option>
                                                                                                                    <option value="kurang">kurang</option>
                                                                                                                    <option value="cukup">cukup</option>
                                                                                                                    <option value="baik">baik</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-group">
                                                                                                            <label class="col-sm-10 col-sm-10 control-label">3. Materi pelajaran yang disusun adalah</label>
                                                                                                            <div class="col-sm-2">
                                                                                                                <select type="text" name="apf3" class="form-control">
                                                                                                                    <option value=""></option>
                                                                                                                    <option value="materi pokoknya saja">materi pokoknya saja</option>
                                                                                                                    <option value="uraian singkat">uraian singkat</option>
                                                                                                                    <option value="uraian singkat dan LKS">uraian singkat dan LKS</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-group">
                                                                                                            <label class="col-sm-10 col-sm-10 control-label">Penguasaan materi struktur konsep dan pola pikir keilmuan yang mendukung mata pelajaran yang diampu bagi guru berkualitas</label>
                                                                                                            <div class="col-sm-2">
                                                                                                                <select type="text" name="apf4" class="form-control">
                                                                                                                    <option value=""></option>
                                                                                                                    <option value="kurang">kurang</option>
                                                                                                                    <option value="cukup">cukup</option>
                                                                                                                    <option value="baik">baik</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-group">
                                                                                                            <label class="col-sm-10 col-sm-10 control-label">karena itu perlu</label>
                                                                                                            <div class="col-sm-2">
                                                                                                                <select type="text" name="apf5" class="form-control">
                                                                                                                    <option value=""></option>
                                                                                                                    <option value="ditingkatkan">ditingkatkan</option>
                                                                                                                    <option value="dikembangkan">dikembangkan</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="alert alert-info alert-block fade in">
                                                                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                                                <i class="icon-remove"></i>
                                                                                                            </button>
                                                                                                            <p style="font-size:15px">Selama Pengamatan.</p>
                                                                                                        </div>

                                                                                                        <div class="form-group">
                                                                                                            <label class="col-sm-10 col-sm-10 control-label">1. Guru melakukan pemetaan standar kompetensi dan kompetensi dasar sampai dengan mengidentifikasi kesulitan materi pelajaran dengan benar</label>
                                                                                                            <div class="col-sm-2">
                                                                                                                <select type="text" name="apf6" class="form-control">
                                                                                                                    <option value=""></option>
                                                                                                                    <option value="tidak">tidak</option>
                                                                                                                    <option value="kadang-kadang">kadang-kadang</option>
                                                                                                                    <option value="selalu">selalu</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-group">
                                                                                                            <label class="col-sm-10 col-sm-10 control-label">2. Guru menguasai materi pembelajaran dalam pelaksanaan pembelajaran sesuai dengan kondisi sekolah dengan kualitas</label>
                                                                                                            <div class="col-sm-2">
                                                                                                                <select type="text" name="apf7" class="form-control">
                                                                                                                    <option value=""></option>
                                                                                                                    <option value="kurang">kurang</option>
                                                                                                                    <option value="cukup">cukup</option>
                                                                                                                    <option value="baik">baik</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-group">
                                                                                                            <label class="col-sm-10 col-sm-10 control-label">3. Materi pelajaran yang disajikan kepada siswa, dengan tingkat pemahaman siswa</label>
                                                                                                            <div class="col-sm-2">
                                                                                                                <select type="text" name="apf8" class="form-control">
                                                                                                                    <option value=""></option>
                                                                                                                    <option value="kurang dari 50%">kurang dari 50%</option>
                                                                                                                    <option value="kurang dari 70%">kurang dari 70%</option>
                                                                                                                    <option value="lebih dari 70%">lebih dari 70%</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-group">
                                                                                                            <label class="col-sm-10 col-sm-10 control-label">Penguasaan materi struktur konsep dan pola pikir keilmuan yang mendukung mata pelajaran yang diampu bagi guru pada penyampaiannya kepada siswa berkualitas</label>
                                                                                                            <div class="col-sm-2">
                                                                                                                <select type="text" name="apf9" class="form-control">
                                                                                                                    <option value=""></option>
                                                                                                                    <option value="kurang">kurang</option>
                                                                                                                    <option value="cukup">cukup</option>
                                                                                                                    <option value="baik">baik</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-group">
                                                                                                            <label class="col-sm-10 col-sm-10 control-label">karena itu perlu</label>
                                                                                                            <div class="col-sm-2">
                                                                                                                <select type="text" name="apf10" class="form-control">
                                                                                                                    <option value=""></option>
                                                                                                                    <option value="ditingkatkan">ditingkatkan</option>
                                                                                                                    <option value="dikembangkan">dikembangkan</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>


                                                                                                        <div class="alert alert-info alert-block fade in">
                                                                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                                                <i class="icon-remove"></i>
                                                                                                            </button>
                                                                                                            <p style="font-size:15px">Penilaian.</p>
                                                                                                        </div>

                                                                                                        <div class="form-group">
                                                                                                            <label class="col-sm-10 col-sm-10 control-label">1. Guru melakukan pemetaan standar kompetensi dan kompetensi dasar untuk mata pelajaran yang diampunya, untuk mengidentifikasi materi embelajaran yang dianggap sulit, melakukan perencanaan dan pelaksanaan pembelajaran, dan memperkirakan alokasi waktu yang diperlukan</label>
                                                                                                            <div class="col-sm-2">
                                                                                                                <select type="text" name="npf1" class="form-control">
                                                                                                                    <option value=""></option>
                                                                                                                    <option value="0">Tidak terpenuhi</option>
                                                                                                                    <option value="1">Terpenuhi sebagian</option>
                                                                                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>


                                                                                                        <div class="form-group">
                                                                                                            <label class="col-sm-10 col-sm-10 control-label">2. Guru menyertakan informasi yang tepat dan mutakhir di dalam perencanaan dan pelaksanaan pembelajaran</label>
                                                                                                            <div class="col-sm-2">
                                                                                                                <select type="text" name="npf2" class="form-control">
                                                                                                                    <option value=""></option>
                                                                                                                    <option value="0">Tidak terpenuhi</option>
                                                                                                                    <option value="1">Terpenuhi sebagian</option>
                                                                                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-group">
                                                                                                            <label class="col-sm-10 col-sm-10 control-label">3. Guru menyusun materi, perencanaan, dan pelaksanaan pembelajaran yang berisi informasi yang tepat, mutakhir, dan yang membantu peserta didik untuk memahami konsep materi pembelajaran</label>
                                                                                                            <div class="col-sm-2">
                                                                                                                <select type="text" name="npf3" class="form-control">
                                                                                                                    <option value=""></option>
                                                                                                                    <option value="0">Tidak terpenuhi</option>
                                                                                                                    <option value="1">Terpenuhi sebagian</option>
                                                                                                                    <option value="2">Seluruhnya terpenuhi</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        Kompetensi 14 : Mengembangkan keprofesionalan melalui tindakan yang reflektif
                                                                                                        </header>
                                                                                                        <div class="panel-body">
                                                                                                            <form class="form-horizontal tasi-form" action="modules/input_nilai/aksi_pf2.php?mod=pf2&act=nilai" method="POST" name="frmPf2">

                                                                                                                <input type="hidden" name="id" value="<?php echo $data['id_nilai']; ?>">

                                                                                                                <div class="alert alert-info alert-block fade in">
                                                                                                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                                                        <i class="icon-remove"></i>
                                                                                                                    </button>
                                                                                                                    <p style="font-size:15px">Pemantauan</p>
                                                                                                                </div>

                                                                                                                <div class="form-group">
                                                                                                                    <label class="col-sm-10 col-sm-10 control-label">1. Guru melakukan evaluasi diri secara spesifik, lengkap, dan didukung dengan contoh pengalaman sendiri</label>
                                                                                                                    <div class="col-sm-2">
                                                                                                                        <select type="text" name="apf1" class="form-control">
                                                                                                                            <option value=""></option>
                                                                                                                            <option value="tidak">tidak</option>
                                                                                                                            <option value="kadang-kadang">kadang-kadang</option>
                                                                                                                            <option value="selalu">selalu</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="form-group">
                                                                                                                    <label class="col-sm-10 col-sm-10 control-label">2. Guru memiliki jurnal pembelajaran, catatan masukan dari kolega atau hasil penilaian proses pembelajaran sebagai bukti</label>
                                                                                                                    <div class="col-sm-2">
                                                                                                                        <select type="text" name="apf2" class="form-control">
                                                                                                                            <option value=""></option>
                                                                                                                            <option value="tidak memiliki">tidak memiliki</option>
                                                                                                                            <option value="memiliki kurang sempurna">memiliki kurang sempurna</option>
                                                                                                                            <option value="memiliki dengan lengkap">memiliki dengan lengkap</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="form-group">
                                                                                                                    <label class="col-sm-10 col-sm-10 control-label">3. Guru memanfaatkan bukti gambaran kinerjanya untuk mengembangkan perencanaan dan pelaksanaan pembelajaran selanjutnya dalam program Pengembangan Keprofesian Berkelanjutan (PKB)</label>
                                                                                                                    <div class="col-sm-2">
                                                                                                                        <select type="text" name="apf3" class="form-control">
                                                                                                                            <option value=""></option>
                                                                                                                            <option value="kurang">kurang</option>
                                                                                                                            <option value="cukup">cukup</option>
                                                                                                                            <option value="sangat">sangat</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="form-group">
                                                                                                                    <label class="col-sm-10 col-sm-10 control-label">4. Guru dapat mengaplikasikan pengalaman PKB dalam perencanaan, pelaksanaan, penilaian pembelajaran dan tindak lanjutnya</label>
                                                                                                                    <div class="col-sm-2">
                                                                                                                        <select type="text" name="apf4" class="form-control">
                                                                                                                            <option value=""></option>
                                                                                                                            <option value="kurang">kurang</option>
                                                                                                                            <option value="cukup">cukup</option>
                                                                                                                            <option value="sangat">sangat</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="form-group">
                                                                                                                    <label class="col-sm-10 col-sm-10 control-label">5. Guru melakukan penelitian, mengembangkan karya inovasi, mengikuti kegiatan ilmiah (misalnya:seminar, konfrensi), dan aktif dalam melaksanakan PKB yang ditunjukan dengan piagam atau sertifikat atau karya ilmiahnya</label>
                                                                                                                    <div class="col-sm-2">
                                                                                                                        <select type="text" name="apf5" class="form-control">
                                                                                                                            <option value=""></option>
                                                                                                                            <option value="tidak ada">tidak ada</option>
                                                                                                                            <option value="memiliki satu">memiliki satu</option>
                                                                                                                            <option value="lebih dari satu">lebih dari satu</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="form-group">
                                                                                                                    <label class="col-sm-10 col-sm-10 control-label">6. Guru dapat memanfaatkan TIK dalam berkomunikasi dan pelaksanaan PKB</label>
                                                                                                                    <div class="col-sm-2">
                                                                                                                        <select type="text" name="apf6" class="form-control">
                                                                                                                            <option value=""></option>
                                                                                                                            <option value="kurang">kurang</option>
                                                                                                                            <option value="sudah">sudah</option>
                                                                                                                            <option value="sangat">sangat</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="alert alert-info alert-block fade in">
                                                                                                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                                                        <i class="icon-remove"></i>
                                                                                                                    </button>
                                                                                                                    <p style="font-size:15px">Penilaian.</p>
                                                                                                                </div>

                                                                                                                <div class="form-group">
                                                                                                                    <label class="col-sm-10 col-sm-10 control-label">1. Guru melakukan evaluasi diri secara spesifik, lengkap, dan didukung dengan contoh pengalaman sendiri</label>
                                                                                                                    <div class="col-sm-2">
                                                                                                                        <select type="text" name="npf1" class="form-control">
                                                                                                                            <option value=""></option>
                                                                                                                            <option value="0">Tidak terpenuhi</option>
                                                                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="form-group">
                                                                                                                    <label class="col-sm-10 col-sm-10 control-label">2. Guru memiliki jurnal pembelajaran, catatan masukan dari kolega atau hasil penilaian proses pembelajaran sebagai bukti yang menggambarkan kinerjanya</label>
                                                                                                                    <div class="col-sm-2">
                                                                                                                        <select type="text" name="npf2" class="form-control">
                                                                                                                            <option value=""></option>
                                                                                                                            <option value="0">Tidak terpenuhi</option>
                                                                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="form-group">
                                                                                                                    <label class="col-sm-10 col-sm-10 control-label">3. Guru memanfaatkan bukti gambaran kinerjanya untuk mengembangkan perencanaan dan pelaksanaan pembelajaran selanjutnya dalam program Pengembangan Keprofesian Berkelanjutan (PKB)</label>
                                                                                                                    <div class="col-sm-2">
                                                                                                                        <select type="text" name="npf3" class="form-control">
                                                                                                                            <option value=""></option>
                                                                                                                            <option value="0">Tidak terpenuhi</option>
                                                                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="form-group">
                                                                                                                    <label class="col-sm-10 col-sm-10 control-label">4. Guru dapat mengaplikasikan pengalaman PKB dalam perencanaan, pelaksanaan, penilaian pembelajaran dan tindak lanjutnya</label>
                                                                                                                    <div class="col-sm-2">
                                                                                                                        <select type="text" name="npf4" class="form-control">
                                                                                                                            <option value=""></option>
                                                                                                                            <option value="0">Tidak terpenuhi</option>
                                                                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                    <label class="col-sm-10 col-sm-10 control-label">5. Guru melakukan penelitian, mengembangkan karya inovasi, mengikuti kegiatan ilmiah (misalnya:seminar, konfrensi), dan aktif dalam melaksanakan PKB</label>
                                                                                                                    <div class="col-sm-2">
                                                                                                                        <select type="text" name="npf5" class="form-control">
                                                                                                                            <option value=""></option>
                                                                                                                            <option value="0">Tidak terpenuhi</option>
                                                                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                    <label class="col-sm-10 col-sm-10 control-label">6. Guru dapat memanfaatkan TIK dalam berkomunikasi dan pelaksanaan PKB</label>
                                                                                                                    <div class="col-sm-2">
                                                                                                                        <select type="text" name="npf6" class="form-control">
                                                                                                                            <option value=""></option>
                                                                                                                            <option value="0">Tidak terpenuhi</option>
                                                                                                                            <option value="1">Terpenuhi sebagian</option>
                                                                                                                            <option value="2">Seluruhnya terpenuhi</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>
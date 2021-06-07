<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Form Pendaftaran</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Form Pendaftaran</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <?php if (!isset($_SESSION['idPendaftaran']) && !isset($_SESSION['idPendaftaranForm'])) { ?>
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="">
                        <div class="alert alert-warning mb-0" role="alert">
                            <p class="text-dark">Pendaftaran Telah di Tutup</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else {
            if (isset($_SESSION['register'])) { ?>
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="float-right">
                            <?php if ($data->status_pembayaran == 'belum lunas') { ?>
                                <span class="btn btn-danger"><?php echo strtoupper($data->status_pembayaran) ?></span>
                            <?php } else { ?>
                                <span class="btn btn-success"><?php echo strtoupper($data->status_pembayaran) ?></span>
                            <?php } ?>
                            <span class="btn btn-primary"><?php echo date($data->no_form) ?></span>
                            <a href="<?php echo base_url('users/pendaftaran/print'); ?>" class="btn btn-primary" target="_blank">Print Document</a>
                        </div>
                        <div class="form-group row">
                            <h4 class="mt-0 header-title"><strong>A. Keterangan Calon Siswa</strong></h4>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-2 col-form-label">1. Nama Lengkap (sesuai ijazah)</label>
                            <div class="col-md-10">
                                <input class="form-control" name="namaLengkap" required type="text" id="example-text-input" value="<?php echo $data->nama_lengkap ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-lg-2 col-form-label">2. Jenis Kelamin</label>
                            <div class="col-md-10">
                                <div class="custom-control custom-checkbox d-inline mr-3">
                                    <input type="radio" class="custom-control-input" id="customCheck1" name="jenisKelamin" value="laki laki" <?php if ($data->jenis_kelamin == "laki laki") {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?> disabled>
                                    <label class="custom-control-label" for="customCheck1">Laki Laki</label>
                                </div>
                                <div class="custom-control custom-checkbox d-inline">
                                    <input type="radio" class="custom-control-input" id="customCheck2" name="jenisKelamin" value="perempuan" <?php if ($data->jenis_kelamin == "perempuan") {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?> disabled>
                                    <label class="custom-control-label" for="customCheck2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-lg-2 col-form-label">3. Tempat / Tanggal Lahir</label>
                            <div class="col-md-10">
                                <input class="form-control" name="tempatLahir" type="text" placeholder="Tempat Lahir" value="<?php echo $data->tempat_lahir ?>" required id="example-email-input" disabled>
                                <input class="form-control m-t-10" name="tanggalLahir" type="date" value="<?php echo date($data->tanggal_lahir) ?>" required disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-url-input" class="col-lg-2 col-form-label">4. Agama</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="agama" value="<?php echo $data->agama ?>" required disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-tel-input" class="col-lg-2 col-form-label">5. Anak ke</label>
                            <div class="col-md-10">
                                <input class="form-control" name="anakKe" type="number" id="example-tel-input" value="<?php echo $data->anak_ke ?>" required disabled>
                            </div>
                        </div>
                        <div>
                            <label for="example-password-input" class="form-label">6. Jumlah Saudara</label>
                            <div class="form-group row">
                                <label for="kandung-input" class="col-lg-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;a. kandung</label>
                                <div class="col-md-10">
                                    <input class="form-control" name="saudaraKandung" type="number" id="kandung-input" value="<?php echo $data->anak_kandung ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tiri-input" class="col-lg-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;b. Tiri</label>
                                <div class="col-md-10">
                                    <input class="form-control" name="saudaraTiri" type="number" id="tiri-input" value="<?php echo $data->anak_tiri ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-lg-2 col-form-label">7. Status Dalam Keluarga</label>
                            <div class="col-md-10">
                                <div class="custom-control custom-checkbox d-inline mr-3">
                                    <input type="radio" class="custom-control-input" id="statusKeluarga1" name="statusKeluarga" value="anak kandung" <?php if ($data->status_keluarga == "anak kandung") {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?> disabled>
                                    <label class="custom-control-label" for="statusKeluarga1">Anak Kandung</label>
                                </div>
                                <div class="custom-control custom-checkbox d-inline mr-3">
                                    <input type="radio" class="custom-control-input" id="statusKeluarga2" name="statusKeluarga" value="anak tiri" <?php if ($data->status_keluarga == "anak tiri") {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?> disabled>
                                    <label class="custom-control-label" for="statusKeluarga2">Anak Tiri</label>
                                </div>
                                <div class="custom-control custom-checkbox d-inline">
                                    <input type="radio" class="custom-control-input" id="statusKeluarga3" name="statusKeluarga" value="lainnya" <?php if ($data->status_keluarga == "lainnya") {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?> disabled>
                                    <label class="custom-control-label" for="statusKeluarga3">Lainnya</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamatrumah" class="col-lg-2 col-form-label">8. Alamat Rumah Lengkap</label>
                            <div class="col-md-10">
                                <input class="form-control" name="alamatRumah" type="text" id="alamatrumah" value="<?php echo htmlspecialchars($data->alamat_lengkap) ?>" required disabled>
                                <div>
                                    <label class="d-inline">RT</label>
                                    <input class="form-control w-25 d-inline m-t-10 m-r-10" name="alamatRumahRt" type="number" value="<?php echo $data->alamat_rt ?>" required disabled>
                                    <label class="d-inline">RW</label>
                                    <input class="form-control w-25 d-inline m-t-10 m-r-10" name="alamatRumahRw" type="number" value="<?php echo $data->alamat_rw ?>" required disabled>
                                    <label class="d-inline">No</label>
                                    <input class="form-control w-25 d-inline m-t-10 m-r-10" name="alamatRumahNo" type="number" value="<?php echo $data->alamat_no ?>" required disabled>
                                </div>
                                <div class="form-group row m-t-10">
                                    <label for="alamatrumahdesa" class="col-lg-2 col-form-label">Desa/kelurahan</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahDesa" id="alamatrumahdesa" value="<?php echo $data->alamat_desa ?>" required disabled>
                                    </div>
                                </div>
                                <div class="form-group row m-t-5">
                                    <label for="alamatrumahkecamatan" class="col-lg-2 col-form-label">Kecamatan</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahKecamatan" id="alamatrumahkecamatan" value="<?php echo $data->alamat_kecamatan ?>" required disabled>
                                    </div>
                                </div>
                                <div class="form-group row m-t-5">
                                    <label for="alamatrumahkabupaten" class="col-lg-2 col-form-label">Kabupaten/Kota</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahKabupaten" id="alamatrumahkabupaten" value="<?php echo $data->alamat_kabupaten ?>" required disabled>
                                    </div>
                                </div>
                                <div class="form-group row m-t-5">
                                    <label for="alamatrumahpos" class="col-lg-2 col-form-label">Kode Pos</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahPos" id="alamatrumahpos" value="<?php echo $data->alamat_kodepos ?>" required disabled>
                                    </div>
                                </div>
                                <div class="form-group row m-t-5">
                                    <label for="alamatrumahtelpon" class="col-lg-2 col-form-label">Telepon/HP</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahTelepon" id="alamatrumahtelpon" value="<?php echo $data->alamat_hp ?>" required disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="mt-0 header-title"><strong>B. Riwayat Pendidikan</strong></h4>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">1. Lulusan Dari</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="lulusanPeserta" id="lulusanpeserta" value="<?php echo $data->pendidikan_asal ?>" required disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lulusanijazah" class="col-lg-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;a. Nomor ijazah</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="noIjazah" id="lulusanijazah" value="<?php echo $data->pendidikan_no_ijazah ?>" required disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lulusantahunijazah" class="col-lg-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;b. Tahun Ijazah</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="tahunIjazah" id="lulusantahunijazah" value="<?php echo $data->pendidikan_tahun_ijazah ?>" required disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lulusannisn" class="col-lg-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;c. NISN</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="nisn" id="lulusannisn" value="<?php echo $data->pendidikan_nisn ?>" required disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lulusannopeserta" class="col-lg-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;d. Nomor peserta Ujian Nasional</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="npun" id="lulusannopeserta" value="<?php echo $data->pendidikan_npun ?>" required disabled>
                            </div>
                        </div>
                        <hr>
                        <h4 class="mt-0 header-title"><strong>C. Keterangan Orang Tua/Wali</strong></h4>
                        <div class="form-group row">
                            <label for="namaayah" class="col-lg-2 col-form-label">1. Nama Ayah</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="namaAyah" id="namaayah" value="<?php echo $data->orangtua_ayah ?>" required disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namaibu" class="col-lg-2 col-form-label">2. Nama Ibu</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="namaIbu" id="namaibu" value="<?php echo $data->orangtua_ibu ?>" required disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pendidikanayah" class="col-lg-2 col-form-label">3. Pendidikan Ayah</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="pendidikanAyah" id="pendidikanayah" value="<?php echo $data->orangtua_pendidikan_ayah ?>" required disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pendidikanibu" class="col-lg-2 col-form-label">4. Pendidikan Ibu</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="pendidikanIbu" id="pendidikanibu" value="<?php echo $data->orangtua_pendidikan_ibu ?>" required disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pekerjaanayah" class="col-lg-2 col-form-label">5. Pekerjaan Ayah</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="pekerjaanAyah" id="pekerjaanayah" value="<?php echo $data->orangtua_pekerjaan_ayah ?>" required disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pekerjaanibu" class="col-lg-2 col-form-label">6. Pekerjaan Ibu</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="pekerjaanIbu" id="pekerjaanibu" value="<?php echo $data->orangtua_pekerjaan_ibu ?>" required disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamatrumahortu" class="col-lg-2 col-form-label">7. Alamat Rumah Lengkap</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="alamatRumahOrtu" id="alamatrumahortu" value="<?php echo $data->orangtua_alamat_lengkap ?>" required disabled>
                                <div>
                                    <label class="d-inline">RT</label>
                                    <input class="form-control w-25 d-inline m-t-10 m-r-10" name="alamatRumahOrtuRt" type="number" value="<?php echo $data->orangtua_alamat_rt ?>" required disabled>
                                    <label class="d-inline">RW</label>
                                    <input class="form-control w-25 d-inline m-t-10 m-r-10" name="alamatRumahOrtuRw" type="number" value="<?php echo $data->orangtua_alamat_rw ?>" required disabled>
                                    <label class="d-inline">No</label>
                                    <input class="form-control w-25 d-inline m-t-10 m-r-10" name="alamatRumahOrtuNo" type="number" value="<?php echo $data->orangtua_alamat_no ?>" required disabled>
                                </div>
                                <div class="form-group row m-t-10">
                                    <label for="alamatrumahortudesa" class="col-lg-2 col-form-label">Desa/kelurahan</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahOrtuDesa" id="alamatrumahortudesa" value="<?php echo $data->orangtua_alamat_desa ?>" required disabled>
                                    </div>
                                </div>
                                <div class="form-group row m-t-5">
                                    <label for="alamatrumahortukecamatan" class="col-lg-2 col-form-label">Kecamatan</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahKecamatan" id="alamatrumahortukecamatan" value="<?php echo $data->orangtua_alamat_kecamatan ?>" required disabled>
                                    </div>
                                </div>
                                <div class="form-group row m-t-5">
                                    <label for="alamatrumahortukabupaten" class="col-lg-2 col-form-label">Kabupaten/Kota</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahKabupaten" id="alamatrumahortukabupaten" value="<?php echo $data->orangtua_alamat_kabupaten ?>" required disabled>
                                    </div>
                                </div>
                                <div class="form-group row m-t-5">
                                    <label for="alamatrumahortupos" class="col-lg-2 col-form-label">Kode Pos</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahPos" id="alamatrumahortupos" value="<?php echo $data->orangtua_alamat_kodepos ?>" required disabled>
                                    </div>
                                </div>
                                <div class="form-group row m-t-5">
                                    <label for="alamatrumahortutelpon" class="col-lg-2 col-form-label">Telepon/HP</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahTelepon" id="alamatrumahortutelpon" value="<?php echo $data->orangtua_alamat_hp ?>" required disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="pekerjaanibu" class="col-lg-2 col-form-label font-20"><b>Note</b></label>
                            <div class="col-md-10 font-20">
                                <p>Setelah Anda Berhasil Mendaftar Secara Online, Print Document Hasil Registrasi dan Bawa Document Anda ke Sekolah untuk Melanjutkan ke Tahap Pembayaran. Adapun Syarat yang Harus Anda Bawa ke Tata Usaha, yaitu; </p>
                                <ol>
                                    <li>Asli dan Fotocopy STTB, SKHUN SD/MI yang telah dilegalisir rangkap 2</li>
                                    <li>Pas Foto Ukuran : </li>
                                    <ul>
                                        <li>3x4 Sebanyak 4 Lembar</li>
                                        <li>2x4 Sebanyak 2 Lembar</li>
                                    </ul>
                                    <li>Foto copy KK & KTP Orang Tua</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <?php echo form_open('users/pendaftaran/save/'); ?>
                <div class="card m-b-30">
                    <div class="card-body">
                        <?php if (isset($message)) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <?php echo $message; ?>
                            </div>
                        <?php } ?>
                        <h4 class="mt-0 header-title"><strong>A. Keterangan Calon Siswa</strong></h4>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-2 col-form-label">1. Nama Lengkap (sesuai ijazah)</label>
                            <div class="col-md-10">
                                <input class="form-control" name="namaLengkap" required type="text" id="example-text-input" value="<?php echo set_value('namaLengkap') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-lg-2 col-form-label">2. Jenis Kelamin</label>
                            <div class="col-md-10">
                                <div class="custom-control custom-checkbox d-inline mr-3">
                                    <input type="radio" class="custom-control-input" id="customCheck1" name="jenisKelamin" value="laki laki" checked>
                                    <label class="custom-control-label" for="customCheck1">Laki Laki</label>
                                </div>
                                <div class="custom-control custom-checkbox d-inline">
                                    <input type="radio" class="custom-control-input" id="customCheck2" name="jenisKelamin" value="perempuan">
                                    <label class="custom-control-label" for="customCheck2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-lg-2 col-form-label">3. Tempat / Tanggal Lahir</label>
                            <div class="col-md-10">
                                <input class="form-control" name="tempatLahir" type="text" placeholder="Tempat Lahir" value="<?php echo set_value('tempatLahir') ?>" required id="example-email-input">
                                <input class="form-control m-t-10" name="tanggalLahir" type="date" value="<?php echo date('Y-m-d') ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-url-input" class="col-lg-2 col-form-label">4. Agama</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="agama" value="<?php echo set_value('agama') ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-tel-input" class="col-lg-2 col-form-label">5. Anak ke</label>
                            <div class="col-md-10">
                                <input class="form-control" name="anakKe" type="number" id="example-tel-input" value="<?php echo set_value('anakKe') ?>" required>
                            </div>
                        </div>
                        <div>
                            <label for="example-password-input" class="form-label">6. Jumlah Saudara</label>
                            <div class="form-group row">
                                <label for="kandung-input" class="col-lg-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;a. kandung</label>
                                <div class="col-md-10">
                                    <input class="form-control" name="saudaraKandung" type="number" id="kandung-input" value="<?php echo set_value('saudaraKandung') ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tiri-input" class="col-lg-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;b. Tiri</label>
                                <div class="col-md-10">
                                    <input class="form-control" name="saudaraTiri" type="number" id="tiri-input" value="<?php echo set_value('saudaraTiri') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-lg-2 col-form-label">7. Status Dalam Keluarga</label>
                            <div class="col-md-10">
                                <div class="custom-control custom-checkbox d-inline mr-3">
                                    <input type="radio" class="custom-control-input" id="statusKeluarga1" name="statusKeluarga" value="anak kandung" checked>
                                    <label class="custom-control-label" for="statusKeluarga1">Anak Kandung</label>
                                </div>
                                <div class="custom-control custom-checkbox d-inline mr-3">
                                    <input type="radio" class="custom-control-input" id="statusKeluarga2" name="statusKeluarga" value="anak tiri">
                                    <label class="custom-control-label" for="statusKeluarga2">Anak Tiri</label>
                                </div>
                                <div class="custom-control custom-checkbox d-inline">
                                    <input type="radio" class="custom-control-input" id="statusKeluarga3" name="statusKeluarga" value="lainnya">
                                    <label class="custom-control-label" for="statusKeluarga3">Lainnya</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamatrumah" class="col-lg-2 col-form-label">8. Alamat Rumah Lengkap</label>
                            <div class="col-md-10">
                                <input class="form-control" name="alamatRumah" type="text" id="alamatrumah" value="<?php echo set_value('alamatRumah') ?>" required>
                                <div>
                                    <label class="d-inline">RT</label>
                                    <input class="form-control w-25 d-inline m-t-10 m-r-10" name="alamatRumahRt" type="number" value="<?php echo set_value('alamatRumahRt') ?>" required>
                                    <label class="d-inline">RW</label>
                                    <input class="form-control w-25 d-inline m-t-10 m-r-10" name="alamatRumahRw" type="number" value="<?php echo set_value('alamatRumahRw') ?>" required>
                                    <label class="d-inline">No</label>
                                    <input class="form-control w-25 d-inline m-t-10 m-r-10" name="alamatRumahNo" type="number" value="<?php echo set_value('alamatRumahNo') ?>" required>
                                </div>
                                <div class="form-group row m-t-10">
                                    <label for="alamatrumahdesa" class="col-lg-2 col-form-label">Desa/kelurahan</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahDesa" id="alamatrumahdesa" value="<?php echo set_value('alamatRumahDesa') ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row m-t-5">
                                    <label for="alamatrumahkecamatan" class="col-lg-2 col-form-label">Kecamatan</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahKecamatan" id="alamatrumahkecamatan" value="<?php echo set_value('alamatRumahKecamatan') ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row m-t-5">
                                    <label for="alamatrumahkabupaten" class="col-lg-2 col-form-label">Kabupaten/Kota</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahKabupaten" id="alamatrumahkabupaten" value="<?php echo set_value('alamatRumahKabupaten') ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row m-t-5">
                                    <label for="alamatrumahpos" class="col-lg-2 col-form-label">Kode Pos</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahPos" id="alamatrumahpos" value="<?php echo set_value('alamatRumahPos') ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row m-t-5">
                                    <label for="alamatrumahtelpon" class="col-lg-2 col-form-label">Telepon/HP</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahTelepon" id="alamatrumahtelpon" value="<?php echo set_value('alamatRumahTelepon') ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="mt-0 header-title"><strong>B. Riwayat Pendidikan</strong></h4>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">1. Lulusan Dari</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="lulusanPeserta" id="lulusanpeserta" value="<?php echo set_value('lulusanPeserta') ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lulusanijazah" class="col-lg-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;a. Nomor ijazah</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="noIjazah" id="lulusanijazah" value="<?php echo set_value('noIjazah') ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lulusantahunijazah" class="col-lg-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;b. Tahun Ijazah</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="tahunIjazah" id="lulusantahunijazah" value="<?php echo set_value('tahunIjazah') ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lulusannisn" class="col-lg-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;c. NISN</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="nisn" id="lulusannisn" value="<?php echo set_value('nisn') ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lulusannopeserta" class="col-lg-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;d. Nomor peserta Ujian Nasional</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="npun" id="lulusannopeserta" value="<?php echo set_value('npun') ?>" required>
                            </div>
                        </div>
                        <hr>
                        <h4 class="mt-0 header-title"><strong>C. Keterangan Orang Tua/Wali</strong></h4>
                        <div class="form-group row">
                            <label for="namaayah" class="col-lg-2 col-form-label">1. Nama Ayah</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="namaAyah" id="namaayah" value="<?php echo set_value('namaAyah') ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namaibu" class="col-lg-2 col-form-label">2. Nama Ibu</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="namaIbu" id="namaibu" value="<?php echo set_value('namaIbu') ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pendidikanayah" class="col-lg-2 col-form-label">3. Pendidikan Ayah</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="pendidikanAyah" id="pendidikanayah" value="<?php echo set_value('pendidikanAyah') ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pendidikanibu" class="col-lg-2 col-form-label">4. Pendidikan Ibu</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="pendidikanIbu" id="pendidikanibu" value="<?php echo set_value('pendidikanIbu') ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pekerjaanayah" class="col-lg-2 col-form-label">5. Pekerjaan Ayah</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="pekerjaanAyah" id="pekerjaanayah" value="<?php echo set_value('pekerjaanAyah') ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pekerjaanibu" class="col-lg-2 col-form-label">6. Pekerjaan Ibu</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="pekerjaanIbu" id="pekerjaanibu" value="<?php echo set_value('pekerjaanIbu') ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamatrumahortu" class="col-lg-2 col-form-label">7. Alamat Rumah Lengkap</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="alamatRumahOrtu" id="alamatrumahortu" value="<?php echo set_value('alamatRumahOrtu') ?>" required>
                                <div>
                                    <label class="d-inline">RT</label>
                                    <input class="form-control w-25 d-inline m-t-10 m-r-10" name="alamatRumahOrtuRt" type="number" value="<?php echo set_value('alamatRumahOrtuRt') ?>" required>
                                    <label class="d-inline">RW</label>
                                    <input class="form-control w-25 d-inline m-t-10 m-r-10" name="alamatRumahOrtuRw" type="number" value="<?php echo set_value('alamatRumahOrtuRw') ?>" required>
                                    <label class="d-inline">No</label>
                                    <input class="form-control w-25 d-inline m-t-10 m-r-10" name="alamatRumahOrtuNo" type="number" value="<?php echo set_value('alamatRumahOrtuNo') ?>" required>
                                </div>
                                <div class="form-group row m-t-10">
                                    <label for="alamatrumahortudesa" class="col-lg-2 col-form-label">Desa/kelurahan</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahOrtuDesa" id="alamatrumahortudesa" value="<?php echo set_value('alamatRumahOrtuDesa') ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row m-t-5">
                                    <label for="alamatrumahortukecamatan" class="col-lg-2 col-form-label">Kecamatan</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahKecamatan" id="alamatrumahortukecamatan" value="<?php echo set_value('alamatRumahKecamatan') ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row m-t-5">
                                    <label for="alamatrumahortukabupaten" class="col-lg-2 col-form-label">Kabupaten/Kota</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahKabupaten" id="alamatrumahortukabupaten" value="<?php echo set_value('alamatRumahKabupaten') ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row m-t-5">
                                    <label for="alamatrumahortupos" class="col-lg-2 col-form-label">Kode Pos</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahPos" id="alamatrumahortupos" value="<?php echo set_value('alamatRumahPos') ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row m-t-5">
                                    <label for="alamatrumahortutelpon" class="col-lg-2 col-form-label">Telepon/HP</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamatRumahTelepon" id="alamatrumahortutelpon" value="<?php echo set_value('alamatRumahTelepon') ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                </form>
        <?php }
        } ?>

    </div> <!-- end container -->
</div>
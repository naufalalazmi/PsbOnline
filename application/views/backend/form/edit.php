<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Drixo</a></li>
                        <li class="breadcrumb-item"><a href="#">Forms</a></li>
                        <li class="breadcrumb-item active">Form Validation</li>
                    </ol>
                </div>
                <h5 class="page-title">Tambah Pendaftar</h5>
            </div>
        </div>
        <!-- end row -->

        <div class="card m-b-30">
            <div class="p-3">
                <div class="mini-stat-icon">
                    <span class="btn btn-primary float-right"><?php echo $data->no_form; ?></span>
                </div>
                <h6 class="text-uppercase">Edit Pendaftar</h6>
            </div>
            <div class="card-body">
                <?php if (isset($message)) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <?php echo $message; ?>
                    </div>
                <?php } ?>
                <?php echo form_open('admin/form/update/' . $data->id); ?>
                <input type="hidden" name="idPendaftaran" value="<?php echo $data->id_pendaftaran; ?>">
                <h4 class="mt-0 header-title"><strong>A. Keterangan Calon Siswa</strong></h4>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">1. Nama Lengkap (sesuai ijazah)</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="namaLengkap" required type="text" value="<?php echo $data->nama_lengkap; ?>" id="example-text-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2 col-form-label">2. Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <div class="custom-control custom-checkbox d-inline mr-3">
                            <input type="radio" class="custom-control-input" id="customCheck1" name="jenisKelamin" value="laki laki" <?php echo $data->jenis_kelamin == 'laki laki' ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="customCheck1">Laki Laki</label>
                        </div>
                        <div class="custom-control custom-checkbox d-inline">
                            <input type="radio" class="custom-control-input" id="customCheck2" name="jenisKelamin" value="perempuan" <?php echo $data->jenis_kelamin == 'perempuan' ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="customCheck2">Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-sm-2 col-form-label">3. Tempat / Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="tempatLahir" type="text" placeholder="Tempat Lahir" value="<?php echo $data->tempat_lahir; ?>" id="example-email-input" required>
                        <input class="form-control m-t-10" name="tanggalLahir" type="date" value="<?php echo $data->tanggal_lahir; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-sm-2 col-form-label">4. Agama</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="agama" value="<?php echo $data->agama; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">5. Anak ke</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="anakKe" type="number" value="<?php echo $data->anak_ke; ?>" id="example-tel-input" required>
                    </div>
                </div>
                <div>
                    <label for="example-password-input" class="form-label">6. Jumlah Saudara</label>
                    <div class="form-group row">
                        <label for="kandung-input" class="col-sm-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;a. kandung</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="saudaraKandung" type="number" id="kandung-input" value="<?php echo $data->anak_kandung; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tiri-input" class="col-sm-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;b. Tiri</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="saudaraTiri" type="number" id="tiri-input" value="<?php echo $data->anak_tiri; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-sm-2 col-form-label">7. Status Dalam Keluarga</label>
                    <div class="col-sm-10">
                        <div class="custom-control custom-checkbox d-inline mr-3">
                            <input type="radio" class="custom-control-input" id="statusKeluarga1" name="statusKeluarga" value="anak kandung" <?php echo $data->status_keluarga == 'anak kandung' ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="statusKeluarga1">Anak Kandung</label>
                        </div>
                        <div class="custom-control custom-checkbox d-inline mr-3">
                            <input type="radio" class="custom-control-input" id="statusKeluarga2" name="statusKeluarga" value="anak tiri" <?php echo $data->status_keluarga == 'anak tiri' ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="statusKeluarga2">Anak Tiri</label>
                        </div>
                        <div class="custom-control custom-checkbox d-inline">
                            <input type="radio" class="custom-control-input" id="statusKeluarga3" name="statusKeluarga" value="lainnya" <?php echo $data->status_keluarga == 'lainnya' ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="statusKeluarga3">Lainnya</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamatrumah" class="col-sm-2 col-form-label">8. Alamat Rumah Lengkap</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="alamatRumah" type="text" id="alamatrumah" value="<?php echo $data->alamat_lengkap ?>" required>
                        <div>
                            <label class="d-inline">RT</label>
                            <input class="form-control w-25 d-inline m-t-10 m-r-10" name="alamatRumahRt" type="number" value="<?php echo $data->alamat_rt ?>" required>
                            <label class="d-inline">RW</label>
                            <input class="form-control w-25 d-inline m-t-10 m-r-10" name="alamatRumahRw" type="number" value="<?php echo $data->alamat_rw ?>" required>
                            <label class="d-inline">No</label>
                            <input class="form-control w-25 d-inline m-t-10 m-r-10" name="alamatRumahNo" type="number" value="<?php echo $data->alamat_no ?>" required>
                        </div>
                        <div class="form-group row m-t-10">
                            <label for="alamatrumahdesa" class="col-sm-2 col-form-label">Desa/kelurahan</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="alamatRumahDesa" id="alamatrumahdesa" value="<?php echo $data->alamat_desa ?>" required>
                            </div>
                        </div>
                        <div class="form-group row m-t-5">
                            <label for="alamatrumahkecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="alamatRumahKecamatan" id="alamatrumahkecamatan" value="<?php echo $data->alamat_kecamatan ?>" required>
                            </div>
                        </div>
                        <div class="form-group row m-t-5">
                            <label for="alamatrumahkabupaten" class="col-sm-2 col-form-label">Kabupaten/Kota</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="alamatRumahKabupaten" id="alamatrumahkabupaten" value="<?php echo $data->alamat_kabupaten ?>" required>
                            </div>
                        </div>
                        <div class="form-group row m-t-5">
                            <label for="alamatrumahpos" class="col-sm-2 col-form-label">Kode Pos</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="alamatRumahPos" id="alamatrumahpos" value="<?php echo $data->alamat_kodepos ?>" required>
                            </div>
                        </div>
                        <div class="form-group row m-t-5">
                            <label for="alamatrumahtelpon" class="col-sm-2 col-form-label">Telepon/HP</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="alamatRumahTelepon" id="alamatrumahtelpon" value="<?php echo $data->alamat_hp ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h4 class="mt-0 header-title"><strong>B. Riwayat Pendidikan</strong></h4>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">1. Lulusan Dari</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="lulusanPeserta" id="lulusanpeserta" value="<?php echo $data->pendidikan_asal ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lulusanijazah" class="col-sm-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;a. Nomor ijazah</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="noIjazah" id="lulusanijazah" value="<?php echo $data->pendidikan_no_ijazah ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lulusantahunijazah" class="col-sm-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;b. Tahun Ijazah</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tahunIjazah" id="lulusantahunijazah" value="<?php echo $data->pendidikan_tahun_ijazah ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lulusannisn" class="col-sm-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;c. NISN</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="nisn" id="lulusannisn" value="<?php echo $data->pendidikan_nisn ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lulusannopeserta" class="col-sm-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;d. Nomor peserta Ujian Nasional</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="npun" id="lulusannopeserta" value="<?php echo $data->pendidikan_npun ?>" required>
                    </div>
                </div>
                <hr>
                <h4 class="mt-0 header-title"><strong>C. Keterangan Orang Tua/Wali</strong></h4>
                <div class="form-group row">
                    <label for="namaayah" class="col-sm-2 col-form-label">1. Nama Ayah</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="namaAyah" id="namaayah" value="<?php echo $data->orangtua_ayah ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namaibu" class="col-sm-2 col-form-label">2. Nama Ibu</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="namaIbu" id="namaibu" value="<?php echo $data->orangtua_ibu ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pendidikanayah" class="col-sm-2 col-form-label">3. Pendidikan Ayah</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="pendidikanAyah" id="pendidikanayah" value="<?php echo $data->orangtua_pendidikan_ayah ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pendidikanibu" class="col-sm-2 col-form-label">4. Pendidikan Ibu</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="pendidikanIbu" id="pendidikanibu" value="<?php echo $data->orangtua_pendidikan_ibu ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pekerjaanayah" class="col-sm-2 col-form-label">5. Pekerjaan Ayah</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="pekerjaanAyah" id="pekerjaanayah" value="<?php echo $data->orangtua_pekerjaan_ayah ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pekerjaanibu" class="col-sm-2 col-form-label">6. Pekerjaan Ibu</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="pekerjaanIbu" id="pekerjaanibu" value="<?php echo $data->orangtua_pekerjaan_ibu ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamatrumahortu" class="col-sm-2 col-form-label">7. Alamat Rumah Lengkap</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="alamatRumahOrtu" id="alamatrumahortu" value="<?php echo $data->orangtua_alamat_lengkap ?>" required>
                        <div>
                            <label class="d-inline">RT</label>
                            <input class="form-control w-25 d-inline m-t-10 m-r-10" name="alamatRumahOrtuRt" type="number" value="<?php echo $data->orangtua_alamat_rt ?>" required>
                            <label class="d-inline">RW</label>
                            <input class="form-control w-25 d-inline m-t-10 m-r-10" name="alamatRumahOrtuRw" type="number" value="<?php echo $data->orangtua_alamat_rw ?>" required>
                            <label class="d-inline">No</label>
                            <input class="form-control w-25 d-inline m-t-10 m-r-10" name="alamatRumahOrtuNo" type="number" value="<?php echo $data->orangtua_alamat_no ?>" required>
                        </div>
                        <div class="form-group row m-t-10">
                            <label for="alamatrumahortudesa" class="col-sm-2 col-form-label">Desa/kelurahan</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="alamatRumahOrtuDesa" id="alamatrumahortudesa" value="<?php echo $data->orangtua_alamat_desa ?>" required>
                            </div>
                        </div>
                        <div class="form-group row m-t-5">
                            <label for="alamatrumahortukecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="alamatRumahKecamatan" id="alamatrumahortukecamatan" value="<?php echo $data->orangtua_alamat_kecamatan ?>" required>
                            </div>
                        </div>
                        <div class="form-group row m-t-5">
                            <label for="alamatrumahortukabupaten" class="col-sm-2 col-form-label">Kabupaten/Kota</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="alamatRumahKabupaten" id="alamatrumahortukabupaten" value="<?php echo $data->orangtua_alamat_kabupaten ?>" required>
                            </div>
                        </div>
                        <div class="form-group row m-t-5">
                            <label for="alamatrumahortupos" class="col-sm-2 col-form-label">Kode Pos</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="alamatRumahPos" id="alamatrumahortupos" value="<?php echo $data->orangtua_alamat_kodepos ?>" required>
                            </div>
                        </div>
                        <div class="form-group row m-t-5">
                            <label for="alamatrumahortutelpon" class="col-sm-2 col-form-label">Telepon/HP</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="alamatRumahTelepon" id="alamatrumahortutelpon" value="<?php echo $data->orangtua_alamat_hp ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="statusPembayaran" class="col-sm-2 col-form-label">Status Pembayaran</label>
                    <div class="col-sm-2">
                        <select class="form-control" name="statusPembayaran" id="statusPembayaran">
                            <option value="belum lunas" <?php echo $data->status_pembayaran == 'belum lunas' ? 'selected' : ''; ?>>Belum Lunas</option>
                            <option value="lunas" <?php echo $data->status_pembayaran == 'lunas' ? 'selected' : ''; ?>>Lunas</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        <a href="<?php echo base_url('admin/pendaftaran/form/' . $data->id_pendaftaran) ?>" class="btn btn-secondary waves-effect m-l-5">Cancel</a>
                    </div>
                </div>
                </form>
            </div>
        </div> <!-- end row -->

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
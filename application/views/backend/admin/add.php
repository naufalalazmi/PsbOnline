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
                <h5 class="page-title">Tambah Admin</h5>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Tambah Admin</h4>

                        <?php if (!empty(form_error('email'))) { ?>
                            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php echo form_error('email'); ?>
                            </div>
                        <?php } ?>
                        <?php if (!empty(form_error('nip'))) { ?>
                            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php echo form_error('nip'); ?>
                            </div>
                        <?php } ?>
                        
                        <?php echo form_open('admin/user/save_admin'); ?>
                            <div class="form-group">
                                <label>NIP</label>
                                <div>
                                    <input type="text" name="nip" class="form-control" required placeholder="NIP" value="<?php echo set_value('nip') ?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" required placeholder="Nama Lengkap" value="<?php echo set_value('name') ?>"/>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" rows="5"></textarea>
                            </div>

                            <div class="form-group">
                                <label>No Telepon</label>
                                <div>
                                    <input type="number" name="no_telepon" class="form-control" placeholder="No Telepon" value="<?php echo set_value('telepon') ?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" required placeholder="Tempat Lahir" value="<?php echo set_value('tempat_lahir') ?>"/>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <div>
                                    <input class="form-control" name="tanggal_lahir" type="date" value="<?php echo date('Y-m-d') ?>" id="example-date-input">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <div>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="laki laki" selected>Laki Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>E-Mail</label>
                                <div>
                                    <input type="email" name="email" class="form-control" required placeholder="Enter a valid e-mail" value="<?php echo set_value('email') ?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required placeholder="Username" value="<?php echo set_value('username') ?>"/>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <div>
                                    <input type="password" name="password" class="form-control" required placeholder="Password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                    <a href="<?php echo base_url('admin/user/admin') ?>" class="btn btn-secondary waves-effect m-l-5">Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
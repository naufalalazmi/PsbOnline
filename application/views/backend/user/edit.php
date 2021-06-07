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
                <h5 class="page-title">Edit Calon PSB</h5>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Edit Calon PSB</h4>

                        <?php if (!empty(form_error('email'))) { ?>
                            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php echo form_error('email'); ?>
                            </div>
                        <?php } ?>
                        <?php if (!empty(form_error('nisn'))) { ?>
                            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php echo form_error('nisn'); ?>
                            </div>
                        <?php } ?>

                        <?php echo form_open('admin/user/update_siswa/' . $data->id); ?>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" required placeholder="Nama Lengkap" value="<?php echo $data->nama_lengkap ?>" />
                        </div>

                        <div class="form-group">
                            <label>E-Mail</label>
                            <div>
                                <input type="email" name="email" class="form-control" required placeholder="Enter a valid e-mail" value="<?php echo $data->email ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>NISN</label>
                            <div>
                                <input type="text" name="nisn" class="form-control" required placeholder="NISN" value="<?php echo $data->nisn ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>No Telepon</label>
                            <div>
                                <input type="number" name="telepon" class="form-control" placeholder="No Telepon" value="<?php echo $data->no_telepon ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <div>
                                <input type="password" name="password" class="form-control" placeholder="Password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                <a href="<?php echo base_url('admin/user/siswa') ?>" class="btn btn-secondary waves-effect m-l-5">Cancel</a>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
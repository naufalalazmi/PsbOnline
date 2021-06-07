<!-- Begin page -->
<div class="accountbg">
    <div class="content-center">
        <div class="content-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8">
                        <div class="card">
                            <div class="card-body">

                                <h3 class="text-center mt-0 m-b-15">
                                    <a href="index.html" class="logo logo-admin"><img src="<?php echo base_url('assets/frontend/images/logo.png') ?>" height="50" alt="logo"></a>
                                    <p>MTs Raudhatussa'adah Rumpin</p>
                                </h3>

                                <h4 class="text-muted text-center font-18"><b>Register</b></h4>

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

                                <div class="p-3">
                                    <form class="form-horizontal m-t-20" action="<?php echo base_url('users/auth/save') ?>" method="post">

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label>Nama Lengkap</label>
                                                <input class="form-control" type="text" name="name" required="" placeholder="Nama Lengkap" value="<?php echo set_value('name') ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label>E-Mail</label>
                                                <input class="form-control" type="email" name="email" required="" placeholder="Email" value="<?php echo set_value('email') ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label>NISN</label>
                                                <input type="text" name="nisn" class="form-control" required placeholder="NISN" value="<?php echo set_value('nisn') ?>" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label>No Telepon</label>
                                                <input type="number" name="telepon" class="form-control" name="telepon" placeholder="No Telepon" value="<?php echo set_value('telepon') ?>" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label>Password</label>
                                                <input class="form-control" type="password" name="password" required="" placeholder="Password">
                                            </div>
                                        </div>

                                        <div class="form-group text-center row m-t-20">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Register</button>
                                            </div>
                                        </div>

                                        <div class="form-group m-t-10 mb-0 row">
                                            <div class="col-12 m-t-20 text-center">
                                                <a href="<?php echo base_url('login') ?>" class="text-muted">Already have account?</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>
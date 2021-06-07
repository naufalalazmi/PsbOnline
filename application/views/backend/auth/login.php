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
                                    <p class="text-dark">MTs Raudhatussa'adah Rumpin</p>
                                </h3>

                                <h4 class="text-muted text-center font-18"><b>Sign In</b></h4>

                                <div class="p-2">
                                    <?php if (!empty($this->session->flashdata('message'))) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Maaf !</strong> <?php echo $this->session->flashdata('message'); ?>
                                        </div>
                                    <?php } ?>
                                    <form class="form-horizontal m-t-20" action="<?php echo base_url('admin/auth/validate') ?>" method="post">

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" name="username" type="text" required="" placeholder="Username">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                            </div>
                                        </div>

                                        <div class="form-group text-center row m-t-20">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
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
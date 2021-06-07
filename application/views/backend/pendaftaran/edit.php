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
                <h5 class="page-title">Edit Pendaftaran</h5>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Edit Pendaftaran</h4>

                        <?php echo form_open('admin/pendaftaran/update/'.$data->id); ?>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="<?php echo $data->title ?>" required placeholder="Title"/>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Buka</label>
                                <div>
                                    <input class="form-control" name="start_date" type="datetime-local" value="<?php echo date("Y-m-d\TH:i:s", strtotime($data->start_date)) ?>" id="example-datetime-local-input">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Tutup</label>
                                <div>
                                    <input class="form-control" name="end_date" type="datetime-local" value="<?php echo date("Y-m-d\TH:i:s", strtotime($data->end_date)) ?>" id="example-datetime-local-input">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Tes</label>
                                <div>
                                    <input class="form-control" name="date" type="datetime-local" value="<?php echo date("Y-m-d\TH:i:s", strtotime($data->date)) ?>" id="example-datetime-local-input">
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                    <a href="<?php echo base_url('admin/pendaftaran') ?>" class="btn btn-secondary waves-effect m-l-5">Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
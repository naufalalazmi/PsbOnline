<!-- DataTables -->
<link href="<?php echo base_url('assets/backend/plugins/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/backend/plugins/datatables/buttons.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="<?php echo base_url('assets/backend/plugins/datatables/responsive.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Pendaftaran</li>
                    </ol>
                </div>
                <h5 class="page-title">List Hasil Tes</h5>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="p-3">
                        <h6 class="text-uppercase">Laporan Hasil Tes PSB Online</h6>
                    </div>
                    <div class="card-body table-responsive">

                        <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Buka</th>
                                    <th>Tanggal Tutup</th>
                                    <th>Tanggal Ujian</th>
                                    <th>Total Pendaftar</th>
                                    <th>Total Lulus</th>
                                    <th>Total Tidak Lulus</th>
                                    <th>Total Belum Dinilai</th>
                                    <th width="10%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo ++$key ?></td>
                                        <td><?php echo $value->title ?></td>
                                        <td><?php echo $value->start_date ?></td>
                                        <td><?php echo $value->end_date ?></td>
                                        <td><?php echo $value->date ?></td>
                                        <td><?php echo $value->total ?></td>
                                        <td><?php echo $value->lulus ?></td>
                                        <td><?php echo $value->tidak_lulus ?></td>
                                        <td><?php echo $value->belum ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/pendaftaran/printListHasil/' . $value->id) ?>" class="btn btn-success" title="List <?php echo $value->title ?>" target="_blank"><i class="dripicons-print"></i></a>
                                            <a href="<?php echo base_url('admin/pendaftaran/listHasil/' . $value->id) ?>" class="btn btn-primary" title="List <?php echo $value->title ?>"><i class="dripicons-preview"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->

<!-- Required datatable js -->
<script src="<?php echo base_url('assets/backend/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/backend/plugins/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Responsive examples -->
<script src="<?php echo base_url('assets/backend/plugins/datatables/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('assets/backend/plugins/datatables/responsive.bootstrap4.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
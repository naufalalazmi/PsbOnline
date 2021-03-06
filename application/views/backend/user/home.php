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
                        <li class="breadcrumb-item active">Pengguna</li>
                        <li class="breadcrumb-item active">Calon PSB</li>
                    </ol>
                </div>
                <h5 class="page-title">List Pengguna Calon PSB</h5>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="p-3">
                        <div class="mini-stat-icon">
                            <a href="<?php echo base_url('admin/user/add/user') ?>" class="btn btn-primary float-right">Tambah</a>
                        </div>
                        <h6 class="text-uppercase">List Pengguna Calon PSB</h6>
                    </div>
                    <div class="card-body table-responsive">

                        <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>NISN</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
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
        var table = $('#datatable').DataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?php echo site_url('admin/user/data_user') ?>",
            "bAutoWidth": false,
            "bPaginate": true,
            "iDisplayLength": "10",
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "aaSorting": [
                [1, "desc"]
            ],
            "sPaginationType": "full_numbers",
            "oLanguage": {
                "sLengthMenu": "Tampilkan _MENU_ baris per halaman",
                "sZeroRecords": "Tidak menemukan data."
            },
            "aoColumnDefs": [{
                    "searchable": false,
                    "targets": [0]
                },
                {
                    "orderable": false,
                    "targets": [0, 1, 2]
                },
                {
                    "sWidth": "5",
                    "sClass": "text-center",
                    "aTargets": [0]
                },
                {
                    "sWidth": "125",
                    "sClass": "medium",
                    "aTargets": [1]
                },
                {
                    "sWidth": "125",
                    "sClass": "medium",
                    "aTargets": [2]
                },
                {
                    "sWidth": "125",
                    "sClass": "medium",
                    "aTargets": [3]
                },
                {
                    "sWidth": "5",
                    "sClass": "text-center",
                    "aTargets": [4]
                }
            ]
        });
        table.on('draw.dt', function() {
            var info = table.page.info();
            table.column(0, {
                search: 'applied',
                order: 'applied',
                page: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1 + info.start;
            });
        });
    });
</script>
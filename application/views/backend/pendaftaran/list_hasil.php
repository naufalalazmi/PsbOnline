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
                        <li class="breadcrumb-item active">Pendaftar</li>
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
                        <h6 class="text-uppercase">List Hasil Tes PSB Online</h6>
                    </div>
                    <div class="card-body table-responsive">

                        <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Registrasi</th>
                                    <th>Nama Siswa</th>
                                    <th>NISN</th>
                                    <th>Nilai B.Indo</th>
                                    <th>Nilai MTK</th>
                                    <th>Nilai IPA</th>
                                    <th>Nilai B.Ing</th>
                                    <th>Nilai Rata - Rata</th>
                                    <th>status</th>
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

<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php echo form_open('admin/pendaftaran/updateStatus/' . $id); ?>
            <div class="modal-header">
                <h5 class="modal-title mt-0">Center modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="idForm" id="idForm">
                <div class="form-group">
                    <label>Total Nilai Akhir Ujian PSB Online</label>
                    <input type="text" name="nilai_bindo" class="form-control" id="nilai_bindo" placeholder="Nilai Bahasa Indonesia" />
                    <input type="text" name="nilai_mtk" class="form-control" id="nilai_mtk" placeholder="Nilai Matematika" />
                    <input type="text" name="nilai_ipa" class="form-control" id="nilai_ipa" placeholder="Nilai IPA" />
                    <input type="text" name="nilai_bing" class="form-control" id="nilai_bing" placeholder="Nilai Bahasa Inggris" />
                </div>
                <div class="form-group">
                    <label>Hasil Tes</label>
                    <select name="hasil" class="form-control" id="hasil">
                        <option value="lulus">Lulus</option>
                        <option value="tidak lulus">Tidak Lulus</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
            "sAjaxSource": "<?php echo site_url('admin/pendaftaran/data_json_list/' . $id) ?>",
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
                    "targets": [0, 6]
                },
                {
                    "sWidth": "5",
                    "sClass": "text-center",
                    "aTargets": [0]
                },
                {
                    "sWidth": "50",
                    "sClass": "text-center",
                    "aTargets": [4, 5, 6, 7, 8]
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

    function buttonClick(id, nilai_bindo, nilai_mtk, nilai_ipa, nilai_bing, status) {
        $('#idForm').val(id);
        $('#nilai_bindo').val(nilai_bindo);
        $('#nilai_mtk').val(nilai_mtk);
        $('#nilai_ipa').val(nilai_ipa);
        $('#nilai_bing').val(nilai_bing);
        if (status) {
            $('#hasil').val(status);
        }
    }
</script>
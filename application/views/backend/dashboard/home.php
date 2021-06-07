<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h5 class="page-title">Dashboard</h5>
            </div>
        </div>
        <!-- end row -->
        <?php $years = date("Y"); ?>
        <?php $tahun = strtotime("+1 year"); ?>
        <?php $date = date("Y", $tahun); ?>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat m-b-30">
                    <div class="p-3 bg-primary text-white">
                        <div class="mini-stat-icon">
                            <i class="fa fa-star-o float-right mb-0"></i>
                        </div>
                        <h6 class="text-uppercase mb-0">Nilai Tertinggi</h6>
                    </div>
                    <div class="card-body">
                        <div class="border-bottom pb-4 text-center">
                            <span class="badge badge-success"><?php echo isset($name) ? $name->nama_lengkap : '-' ?></span>
                        </div>
                        <div class="mt-4 text-muted">
                            <div class="float-right">
                                <p class="m-0">Tahun Ajaran <?php echo $years . "/" . $date ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat m-b-30">
                    <div class="p-3 bg-primary text-white">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-account-multiple float-right mb-0"></i>
                        </div>
                        <h6 class="text-uppercase mb-0">Total Pendaftar</h6>
                    </div>
                    <div class="card-body">
                        <div class="border-bottom pb-4 text-center">
                            <span class="badge badge-success"><?php echo $totalPendaftar ?></span>
                        </div>
                        <div class="mt-4 text-muted">
                            <div class="float-right">
                                <p class="m-0">Tahun Ajaran <?php echo $years . "/" . $date ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat m-b-30">
                    <div class="p-3 bg-primary text-white">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-account-network float-right mb-0"></i>
                        </div>
                        <h6 class="text-uppercase mb-0">Total User Admin</h6>
                    </div>
                    <div class="card-body">
                        <div class="border-bottom pb-4 text-center">
                            <span class="badge badge-success"><?php echo $totalUser ?></span>
                        </div>
                        <div class="mt-4 text-muted">
                            <div class="float-right">
                                <p class="m-0">Tahun Ajaran <?php echo $years . "/" . $date ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat m-b-30">
                    <div class="p-3 bg-primary text-white">
                        <div class="mini-stat-icon">
                            <i class="ion-clock float-right mb-0"></i>
                        </div>
                        <h6 class="text-uppercase mb-0">Waktu</h6>
                    </div>
                    <div class="card-body">
                        <div class="border-bottom pb-4 text-center">
                            <span class="badge badge-success" id="jam"></span><span class="ml-2 text-muted"> : </span><span class="ml-2 badge badge-success" id="menit"></span><span class="ml-2 text-muted"> : </span><span class="ml-2 badge badge-success" id="detik"></span>
                            <br>
                        </div>
                        <div class="mt-4 text-muted">
                            <div class="float-right">
                                <p class="m-0">Tahun Ajaran <?php echo $years . "/" . $date ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
<!-- dashboard -->
<script src="<?php echo base_url('assets/backend/pages/dashboard.js') ?>"></script>
<script>
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = waktu.getHours();
        document.getElementById("menit").innerHTML = waktu.getMinutes();
        document.getElementById("detik").innerHTML = waktu.getSeconds();
    }
</script>
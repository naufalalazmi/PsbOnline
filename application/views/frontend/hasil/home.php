<?php
$koneksi = mysqli_connect('sql113.epizy.com', 'epiz_27134687', 'XUmI0APJ8hZz', 'epiz_27134687_psbonline');

if (isset($_SESSION['idPendaftaranForm'])) {
    $id_pendaftaran = $_SESSION['idPendaftaranForm'];
    $query = "SELECT pendaftaran.date FROM form INNER JOIN pendaftaran ON form.id_pendaftaran = pendaftaran.id WHERE form.id_pendaftaran = '$id_pendaftaran'";

    $row = mysqli_query($koneksi, $query);

    $value = mysqli_fetch_assoc($row);

    $tgl_test = date("l", strtotime($value['date']));

    if ($tgl_test == "Monday") {
        $hari = "Senin";
    } else if ($tgl_test == "Tuesday") {
        $hari = "Selasa";
    } else if ($tgl_test == "Wednesday") {
        $hari = "Rabu";
    } else if ($tgl_test == "Thursday") {
        $hari = "Kamis";
    } else if ($tgl_test == "Friday") {
        $hari = "Jum'at";
    } else if ($tgl_test == "Saturday") {
        $hari = "Sabtu";
    } else if ($tgl_test == "Sunday") {
        $hari = "Minggu";
    }
}

?>
<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Hasil</li>
                        </ol>
                    </div>
                    <?php $years = date("Y"); ?>
                    <?php $tahun = strtotime("+1 year"); ?>
                    <?php $date = date("Y", $tahun); ?>
                    <h4 class="page-title">Tahun Akademik <?php echo $years . " - " . $date ?></h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-xl-8 col-md-12 offset-xl-2">
                <div class="card mini-stat m-b-30">
                    <?php if (isset($data) && !empty($data->status_tes)) { ?>
                        <div class="card-body <?php echo ($data->status_tes == "tidak lulus") ? "bg-danger" : "bg-success" ?>">
                            <div class="text-center pt-4 pb-4">
                                <h3 class="ml-2 text-white">Anda Dinyatakan <?php echo $data->status_tes ?></h3><br>
                                <h3 class="ml-2 text-white">Dengan Nilai</h3>
                                <h3 class="ml-2 text-white">Bahasa Indonesia <?php echo $data->nilai_bindo ?></h3>
                                <h3 class="ml-2 text-white">Matematika <?php echo $data->nilai_mtk ?></h3>
                                <h3 class="ml-2 text-white">IPA <?php echo $data->nilai_ipa ?></h3>
                                <h3 class="ml-2 text-white">Bahasa Inggris <?php echo $data->nilai_bing ?></h3><br>
                                <h3 class="ml-2 text-white">Hasil Akhir <?php echo $data->nilai_rata2 ?></h3>
                            </div>
                        </div>
                    <?php } elseif (isset($data) && empty($data->status_tes)) { ?>
                        <?php if ($data->status_pembayaran == "belum lunas") { ?>
                            <div class="card-body bg-primary">
                                <div class="text-center pt-4 pb-4">
                                    <h3 class="ml-2 text-white">Harap Lunasi Pembayaran Registrasi Terlebih Dahulu</h3>
                                </div>
                            </div>
                        <?php } else if ($data->status_pembayaran == "lunas") { ?>
                            <div class="card-body bg-primary">
                                <div class="text-center pt-4 pb-4">
                                    <h3 class="ml-2 text-white">Anda Telah Melunasi Pembayaran Registrasi!</h3>
                                    <h3 class="ml-2 text-white">Tanggal Ujian Pada Hari, <?php echo $hari . date(" d F Y ", strtotime($value['date'])) . "Pkl : " . date("H:i:s", strtotime($value['date'])) ?></h3>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="card-body bg-primary">
                            <div class="text-center pt-4 pb-4">
                                <h3 class="ml-2 text-white">Anda Belum Daftar</h3>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->
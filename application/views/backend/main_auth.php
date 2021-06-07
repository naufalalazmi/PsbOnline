<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>ADMIN - Login MTs Raudhatussa'adah</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?php echo base_url('assets/frontend/images/logo.png') ?>">

    <link href="<?php echo base_url('assets/backend/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/backend/css/icons.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/backend/css/style.css') ?>" rel="stylesheet" type="text/css">

</head>


<body class="pb-0">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <?php $this->load->view($subview); ?>

    <!-- jQuery  -->
    <script src="<?php echo base_url('assets/backend/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/modernizr.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/detect.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/fastclick.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/jquery.slimscroll.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/jquery.blockUI.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/waves.js') ?>"></script>

    <!-- App js -->
    <script src="<?php echo base_url('assets/backend/js/app.js') ?>"></script>

</body>

</html>
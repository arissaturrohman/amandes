<?php

session_start();
include("inc/config.php");
include("inc/tgl_indo.php");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi Manajemen Perangkat Desa | Amandes</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/dist/css/ekko-lightbox.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>


</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <?php
                if (!isset($_SESSION["login"])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" role="button">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" role="button">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <!-- <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>            
            </ul> -->
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="assets/dist/img/AdminLTELogo.png" alt="Logo Aplikasi" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Amandes</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <?php
                if (isset($_SESSION["login"])) {
                ?>
                    <!-- Sidebar user (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="assets/img/logo.png" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="index.php" class="d-block">
                                <?php
                                $level = $_SESSION['level'] == 'admin';
                                if ($level) {
                                    echo "Administrator";
                                } else {
                                    echo $_SESSION['nama'];
                                }
                                ?>
                            </a>
                        </div>
                    </div>
                <?php } ?>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="?page=perdes" class="nav-link">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>Data Perangkat Desa</p>
                            </a>
                        </li>
                        <?php
                        if (isset($_SESSION["login"])) {
                        ?>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-cogs"></i>
                                    <p>
                                        Setting
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="?page=kec" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Kecamatan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="?page=desa" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Desa</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="?page=jabatan" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Jabatan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="?page=pendidikan" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Pendidikan</p>
                                        </a>
                                    </li>
                                    <?php
                                    if ($_SESSION["level"] == "admin") {
                                    ?>
                                        <li class="nav-item">
                                            <a href="?page=user" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>User</p>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <?php include('inc/content.php'); ?>

        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2019-<?= date('Y'); ?> <a href="#">Kecamatan Gajah</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- Modal Rincian Tunjangan -->
    <div class="modal fade" id="rincian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rincian </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Coming soon (Dalam Pengembangan)
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <script src="assets/dist/js/ekko-lightbox.js"></script>
    <script src="assets/dist/js/ekko-lightbox.min.js"></script>
    <!-- DataTables -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>

    <script>
        $(document).ready(function() {
            $('#kec').change(function() {
                var kecamatan = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: 'autoload.php',
                    data: 'id_kec=' + kecamatan,
                    success: function(msg) {
                        $('#desa').html(msg);
                    }
                });
            })
        });
    </script>
    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
                "ordering": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <!-- <script>
$('input[type="checkbox"]').click(function(){ 
    if($(this).prop("checked")){ 
        $(this).val("Y");
        // alert("ok") ;
        $.ajax({
            type: 'POST',
            url: 'cek.php',
            data: data,
            success: function()
        });
    }
    else{ 
        $(this).val("N"); 
    }
});
</script> -->

</body>

</html>
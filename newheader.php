<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php

include_once("model/sql.php");
$lsLoaiFromDB = Loai::getListFromDB();
?>

<div class="wrapper">

   
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="newindex.php" class="brand-link">
            <img src="source/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Nhìn vui vui</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="source/logo.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">MyWebLogo</a>
        </div>
      </div> -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                   
                    <li class="nav-item">
                        <a href="newindex.php?ms=all" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Tất cả
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Loại
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"><?php echo count($lsLoaiFromDB)?></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <?php
                            foreach ($lsLoaiFromDB as $key => $value) {
                                ?>
                                <li class="nav-item">
                                    <a href="newindex.php?maloai=<?php echo $value->MaLoai ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p><?php echo $value->TenLoai?></p>
                                       
                                        <span class="badge badge-info right">
                                            <?php echo Loai::countSachOfLoai($value->MaLoai)?>
                                        </span>
                                    </a>
                                </li>

                            <?php
                            }
                            ?>
                            <!-- <li class="nav-item">
                                <a href="pages/layout/top-nav.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Top Navigation</p>
                                </a>
                            </li>
                             -->
                        </ul>
                    </li>


                    <li class="nav-header">LABELS</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-danger"></i>
                            <p class="text">Đỏ này</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-warning"></i>
                            <p>Vàng này</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Xanh này</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="assets/alazea-gh-pages/img/core-img/icon.ico">
  <title>Sistem Pakar Padi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/jquery/jquery.min.js">
  <!-- jsGrid -->
  <!-- jsGrid -->
  <link rel="stylesheet" href="assets/plugins/jsgrid/jsgrid.min.css">
  <link rel="stylesheet" href="assets/plugins/jsgrid/jsgrid-theme.min.css">
  <!-- Font Awesome -->
  <!-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->
  <style type="text/css">
    h1,
    h2,
    p,
    a {
      font-family: sans-serif;
      font-weight: normal;
    }

    .jam_analog_malasngoding {
      background: #e7f2f7;
      position: relative;
      width: 150px;
      height: 150px;
      border: 16px solid #52b6f0;
      border-radius: 50%;
      padding: 20px;
      margin: 20px auto;
    }

    .rumah_jam {
      height: 100%;
      width: 100%;
      position: relative;
    }

    .jarum {
      position: absolute;
      width: 50%;
      background: #232323;
      top: 50%;
      transform: rotate(90deg);
      transform-origin: 100%;
      transition: all 0.05s cubic-bezier(0.1, 2.7, 0.58, 1);
    }

    .lingkaran_tengah {
      width: 24px;
      height: 24px;
      background: #232323;
      border: 4px solid #52b6f0;
      position: absolute;
      top: 50%;
      left: 50%;
      margin-left: -14px;
      margin-top: -14px;
      border-radius: 50%;
    }

    .jarum_detik {
      height: 2px;
      border-radius: 1px;
      background: #F0C952;
    }

    .jarum_menit {
      height: 4px;
      border-radius: 4px;
    }

    .jarum_jam {
      height: 8px;
      border-radius: 4px;
      width: 35%;
      left: 15%;
    }
  </style>
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>

      </ul>
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="right fas fa-user"></i>
            &nbsp;<?php echo $_SESSION['username_user'] ?>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="logout.php" class="dropdown-item dropdown-footer">Keluar</a>
          </div>
        </li>
      </ul>
      </a>
      </li>
      </ul>
    </nav>
    <!-- /.navbar -->
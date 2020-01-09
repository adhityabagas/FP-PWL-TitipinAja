<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap dan JQuery -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-4.4.1/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-4.4.1/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/font-awesome/font-awesome.min.css">

  <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>

  <script type="text/javascript" src="assets/js/popper.min.js"></script>

  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="assets/css/cart.css">
  <link rel="stylesheet" type="text/css" href="assets/css/trackorder.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

  <!-- Home CSS -->
  <!-- <link rel="stylesheet" type="text/css" href="assets/css/home.css"> -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style-two.css">


  <!-- <link rel="stylesheet" type="text/css" href="admin/css/sb-admin-2.min.css"> -->

  <title>TitipinAja</title>
</head>

<body>
  <!-- Navigation
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <ul class="navbar-brand" href="index.php">
        <img src="assets/image/512px-Bootstrap_logo.svg.png" width="30" height="30" class="d-inline-block align-top"
          alt="">
        TitipinAja
      </ul>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto container-fluid"></ul>
        <a class="nav-link btn" href="trackorder.php">TrackOrder</a>
        <a class="nav-link btn" href="#"> <i class="fa fa-shopping-cart"></i></a>
        <a class="nav-link btn btn-outline-dark mx-4" href="#">Daftar/Login</a>
      </div>
    </nav>
  </div> -->

  <!--==========================
    Header
  ============================-->

  <?php

// session_start(); 
require_once 'admin/koneksi.php';

// $id_cust = $_SESSION["customer"];

?>

  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
        <h2><a href="index.php"><span style="font-size: 25px;">TitipinAja</span></a></h2>
        <a href="#intro" class="scrollto"><img src="img/logo.png" alt="" title=""></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <!-- <li class="menu-active"><a href="#intro">Track Order</a></li> -->
          <li><a href="trackorder.php">Track Order</a></li>
          <!-- <li><a href="#speakers">Speakers</a></li>
          <li><a href="#schedule">Schedule</a></li>
          <li><a href="#venue">Venue</a></li>
          <li><a href="#hotels">Hotels Salary</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#supporters">Sponsors</a></li> -->
          <!-- <li><a href="#contact">Contact</a></li> -->
          <li><a href="keranjang.php"><i class="fa fa-shopping-cart"></i></a></li>

          <?php if(isset($_SESSION["customer"])): ?>
          <!-- <li class="buy-tickets"><a href="logout.php"><?php echo $detail['nama_customer']?></a></li> -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                <!-- perintah session -->
                <?php
                if($_SESSION['customer']){
                  $user_login = $_SESSION['customer'];
                }

                $ambil = $koneksi->query("SELECT * FROM customer WHERE id_customer='$user_login'");
                $pecah = $ambil->fetch_assoc();
                ?>

                Hi, <?php echo $pecah['nama_customer']; ?>

              </span>
              <img class="img-profile rounded-circle" style="height:1rem;"
                src="customer/upload/<?php echo $pecah['image_customer'];?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="profile.php?id=<?php echo $pecah['id_customer']; ?>">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>
              <!-- <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
              </a> -->
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalSaya">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>
          <?php else: ?>
          <li class="buy-tickets"><a href="register.php">Daftar / Masuk</a></li>
          <?php endif ?>
        </ul>

      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

<!-- Modal logout -->
  <div class="modal fade" id="modalSaya" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalSayaLabel">Anda yakin?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Pilih logout jika anda ingin keluar.
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
      </div>
    </div>
  </div>
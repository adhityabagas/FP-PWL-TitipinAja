<?php
session_start();

include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/scripts.php');
require_once 'koneksi.php';

// Mengamankan akun admin
  // if(!isset($_SESSION['login'])) {
  //   echo "<script>alert('Anda harus login!');</script>";
  //   echo "<script>location='login.php';</script>";
  //   header('location: login.php');
  //   exit();
  // }
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Content Row -->
  <?php 
  if(isset($_SESSION["nama_customer"])){
        if(isset($_GET['profile'])) {
        if ($_GET['profile']=="profile") {
          include 'profile.php';
        } elseif ($_GET['profile']=="profile_edit") {
          include 'profile_edit.php';
        } elseif ($_GET['profile']=="address") {
            include 'address.php';
        } elseif ($_GET['profile']=="address_edit") {
            include 'address_edit.php';
        } elseif ($_GET['profile']=="bank") {
            include 'bank.php';
        } elseif ($_GET['profile']=="bank_edit") {
          include 'bank_edit.php';
        } elseif ($_GET['profile']=="password") {
          include 'password.php';
        } elseif ($_GET['profile']=="detail_pembayaran") {
          include 'detail_pembayaran.php';
        } elseif ($_GET['profile']=="riwayat_belanja") {
          include 'riwayat_belanja.php';
    }
   } else {
        include 'profile.php';
    } 
  ?>

</div>
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

require_once 'koneksi.php';

// Mengamankan akun admin
  if(!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda harus login!');</script>";
    echo "<script>location='login.php';</script>";
    header('location: login.php');
    exit();
  }
?>


<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Content Row -->

  <?php 
  if(isset($_GET['halaman'])) {
        if ($_GET['halaman']=="produk") {
          include 'produk.php';
        } elseif ($_GET['halaman']=="pembelian") {
            include 'pembelian.php';
        } elseif ($_GET['halaman']=="customer") {
            include 'customer.php';
        } elseif ($_GET['halaman']=="detail_pembelian") {
            include 'detail_pembelian.php';
        } elseif ($_GET['halaman']=="tambah_produk") {
          include 'tambah_produk.php';
        } elseif ($_GET['halaman']=="hapus_produk") {
          include 'hapus_produk.php';
        } elseif ($_GET['halaman']=="ubah_produk") {
          include 'ubah_produk.php';
        } elseif ($_GET['halaman']=="logout") {
          include 'logout.php';
        } elseif ($_GET['halaman']=="refund") {
          include 'refund.php';
        } elseif ($_GET['halaman']=="konfirmasi_refund") {
          include 'konfirmasi_refund.php';
        } elseif ($_GET['halaman']=="pembayaran") {
          include 'pembayaran.php';
        } elseif ($_GET['halaman']=="penghasilan") {
          include 'penghasilan.php';
        } elseif ($_GET['halaman']=="request") {
          include 'request_produk.php';
        }
    } else {
        include 'dashboard.php';
    } 
  ?>

</div>




<?php
include('includes/scripts.php');
// include('includes/footer.php');
?>
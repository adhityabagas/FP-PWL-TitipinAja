<?php
session_start();
include('includes/header.php'); 
require_once 'admin/koneksi.php';

// mendapatkan id pembelian
$id_pembelian = $_GET['id'];

// menhambil data pembayran berdasarkan id_pembelian
$ambil = $koneksi->query("SELECT * FROM pembayaran JOIN pembelian 
                ON pembayaran.id_pembelian = pembelian.id_pembelian 
                WHERE pembayaran.id_pembelian='$id_pembelian'");
$detail_pembayaran = $ambil->fetch_assoc();

// echo "<pre>";

// print_r($detail_pembayaran);

// echo "</pre>";

// validasi cek data untuk menampilkan data pembayaran
if (empty($detail_pembayaran)) 
{
    echo "<script>alert('Belum ada data pembayaran!');</script>";
    echo "<script>location='riwayat_belanja.php';</script>";
    exit();
}

//validasi data pembayaran tidak sesuai dg yg login
if($_SESSION['customer']){
    $user_login = $_SESSION['customer'];
    }
    
    $ambil = $koneksi->query("SELECT * FROM customer WHERE id_customer='$user_login'");
    $pecah = $ambil->fetch_assoc();

    $id_customerbeli = $detail_pembayaran['id_customer'];

    $id_customerlogin = $pecah['id_customer'];

    if ($id_customerbeli!=$id_customerlogin) 
    {
        echo "<script>alert('Bukan hak anda!')</script>";
        echo "<script>location='riwayat_belanja.php';</script>";
        exit();
    }

?>

<link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
<link rel="stylesheet" href="assets/css/profile.css">

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-item-has-children active dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-user-circle"></i>Akun Saya</a>
                    <ul class="sub-menu children active dropdown-menu">
                        <li><i class="fa fa-user-circle"></i><a
                                href="profile.php?id=<?php echo $pecah['id_customer']; ?>">Profile</a></li>
                        <li><i class="fa fa-address-card"></i><a
                                href="address.php?id=<?php echo $pecah['id_customer']; ?>">Address</a></li>
                        <li><i class="fas fa-money-check"></i><a
                                href="bank.php?id=<?php echo $pecah['id_customer']; ?>">Rekening Bank</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Pesanan</a>
                    <ul class="sub-menu children dropdown-menu">
                        <!-- <li><i class="fa fa-table"></i><a href="detail_pembayaran.php?id=<?php echo $pecah['id_customer']; ?>">Detail Pembayaran</a></li> -->
                        <li><i class="fa fa-table"></i><a
                                href="riwayat_belanja.php?id=<?php echo $pecah['id_customer']; ?>">Riwayat
                                Belanja</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>

<div id="right-panel" class="right-panel">

    <div class="content">

        <div class="animated fadeIn">
            <div class="container">
                <h3 class="m-0 font-weight-bold">Data Konfirmasi Pembayaran</h3>
                <br>
                <div class="row">
                    <div class=col-md-9>
                        <div class="card shadow mb-4">
                            <div class="card-header py-9">
                                <h6 class="m-0 font-weight-bold text-primary">Data Konfirmasi Pembayaran</h6>
                            </div>

                            <div class="card-body">

                                <div class="table-responsive">

                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th> Nama Penyetor </th>
                                                <td> <?php echo $detail_pembayaran['nama_customer'] ?> </td>
                                            </tr>

                                            <tr>
                                                <th> Bank </th>
                                                <td> <?php echo $detail_pembayaran['bank'] ?> </td>
                                            </tr>

                                            <tr>
                                                <th> Total Pembayaran </th>
                                                <td> <?php echo $detail_pembayaran['jumlah'] ?> </td>
                                            </tr>

                                            <tr>
                                                <th> Tanggal Pembayaran </th>
                                                <td> <?php echo $detail_pembayaran['tanggal_pembayaran'] ?> </td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h6 class="m-0 font-weight-bold text-primary">Foto Bukti Pembayaran</h6>
                        <br>
                        <img width="300" height="250" src="bukti_bayar/<?php echo $detail_pembayaran['bukti']?>" alt=""
                            class="img-responsive">
                    </div>

                </div>

            </div>
        </div>

    </div>

</div>
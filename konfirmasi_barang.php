<?php
session_start();
include 'includes/header.php';
require_once 'admin/koneksi.php';
include 'includes/sidemenu.php';

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

// harus login untuk mengakses pembayaran
if (!isset($_SESSION['customer']) OR empty ($_SESSION['customer'])) 
{
    echo "<script>alert('Silahkan Login!');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}


// mendapatkan id pembelian
$id_pembelian = $_GET["id"];

// ambil data produk
$ambil_barang = $koneksi -> query("SELECT * FROM pembelian_produk JOIN produk 
                        ON pembelian_produk.id_produk=produk.id_produk
                        WHERE pembelian_produk.id_pembelian='$id_pembelian'" );
$barang = $ambil_barang->fetch_assoc();


//ambil data pembelian
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN customer
                        ON pembelian.id_customer=customer.id_customer
                        WHERE pembelian.id_pembelian='$id_pembelian'");
$konfirmasi_barang = $ambil->fetch_assoc();
  
// mendpatkan ud customer
$id_cust = $konfirmasi_barang["id_customer"];

// mendpatkan ud customer yg login
$id_customer_login = $pecah["id_customer"];

if ($id_cust!=$id_customer_login) 
{
    echo "<script>alert('Bukan hak anda!');</script>";
    echo "<script>location='riwayat_belanja.php';</script>";
    exit();
}

// echo "<pre>";

// print_r($konfirmasi_barang);
// print_r($barang);
// print_r($_SESSION);

// echo "<pre>";


?>

<div id="right-panel" class="right-panel">

    <div class="content">

        <div class="animated fadeIn">
            <div class="container-fluid">

                <div class="row">
                    <div class=col-md-9>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Terima Barang</h6>
                                    </div>
                                    <div class="col-md-3">
                                        <h6 class="m-0 font-weight-bold text-danger">No. Pembelian :
                                            <?php echo $konfirmasi_barang['id_pembelian']?></h6>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="table-responsive">

                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th> Nama Customer </th>
                                                <td> <?php echo $konfirmasi_barang['nama_customer'] ?> </td>
                                            </tr>

                                            <tr>
                                                <th> Email Customer </th>
                                                <td> <?php echo $konfirmasi_barang['email_customer'] ?> </td>
                                            </tr>

                                            <tr>
                                                <th> Nama Produk </th>
                                                <td> <?php echo $barang['nama'] ?> </td>
                                            </tr>

                                            <tr>
                                                <th> Total Pembayaran </th>
                                                <td> Rp.
                                                    <?php echo number_format($konfirmasi_barang['total_pembelian']); ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th> Tanggal Pembelian </th>
                                                <td> <?php echo $konfirmasi_barang['tanggal_pembelian'] ?> </td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>
                                <form action="" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h6 class="m-2 font-weight-bold">Alasan Refund</h6>
                                                <input class="form-control" type="text" name="refund"
                                                    placeholder="masukkan alasan refund barang">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h6 class="m-2 font-weight-bold">Status</h6>
                                                <select class="form-control" name="status">
                                                    <option value="">Pilih status</option>
                                                    <option value="Barang diterima">Barang Diterima</option>
                                                    <option value="Barang direfund">Refund Barang</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-2">
                                                <button class="m-2 btn btn-info" name="proses">Proses</button>
                                            </div>
                                            <div class="col-md-10">
                                                
                                            </div>
                                        </div>
                                </form>

                                <!-- update nambah alasan refund -->
                                <?php

                                if (isset($_POST['proses']))
                                {
                                    $refund = $_POST['refund'];
                                    $status = $_POST['status'];
                                    $tanggal = date("Y-m-d");

                                    $koneksi->query("UPDATE pembelian SET tanggal_diterima='$tanggal', ket_refund='$refund', status_pembelian='$status'
                                                WHERE id_pembelian='$id_pembelian'");

                                    echo "<script>alert('Data konfirmasi barang sudah update');</script>";
                                    echo "<script>location='riwayat_belanja.php';</script>";
                                }

                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="padding-top: 15px">

                        <h6 class="m-0 font-weight-bold text-primary">Foto Produk</h6>
                        <br>
                        <img width="300" height="350" src="admin/upload/<?php echo $barang['image_produk']?>" alt=""
                            class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
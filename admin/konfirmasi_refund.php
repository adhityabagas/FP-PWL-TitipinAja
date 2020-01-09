<?php
include 'includes/header.php';
require_once 'koneksi.php';

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

// echo "<pre>";

// print_r($konfirmasi_barang);
// print_r($barang);
// print_r($_SESSION);

// echo "<pre>";


?>

<div class="container-fluid">

    <div class="row">
        <div class=col-md-9>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Refund Baranag</h6>
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
                                    <h6 class="m-2 font-weight-bold">Status</h6>
                                    <select class="form-control" name="status">
                                        <option value="">Pilih status</option>
                                        <option value="Proses refund">Proses Refund</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h6 class="m-2 font-weight-bold"></h6>
                                    
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
                    $status = $_POST['status'];

                    $koneksi->query("UPDATE pembelian SET status_pembelian='$status'
                                       WHERE id_pembelian='$id_pembelian'");

                    echo "<script>alert('Data konfirmasi barang sudah update');</script>";
                    echo "<script>location='index.php?halaman=pembelian';</script>";
                    }

                     ?>

                </div>
            </div>
        </div>
        <div class="col-md-3" style="padding-top: 15px">

            <h6 class="m-0 font-weight-bold text-primary">Foto Produk</h6>
            <br>
            <img width="300" height="350" src="upload/<?php echo $barang['image_produk']?>" alt=""
                class="img-responsive">
        </div>
    </div>
</div>
<?php
include('includes/header.php'); 
require_once 'koneksi.php';

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
?>

<div class="container-fluid">
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
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h6 class="m-2 font-weight-bold">No. Resi Pengiriman</h6>
                                    <input class="form-control" type="text" name="resi">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h6 class="m-2 font-weight-bold">Status</h6>
                                    <select class="form-control" name="status">
                                        <option value="">Pilih status</option>
                                        <option value="Barang dikirim">Barang Dikirim</option>
                                        <option value="Pesanan dibatalkan">Batalkan Pesanan</option>
                                    </select>
                                </div>
                            </div>
                            <button class="m-2 btn btn-primary" name="proses">Proses</button>
                        </div>
                    </form>

                    <!-- update nambah resi pengirimanm -->
                    <?php

                    if (isset($_POST['proses']))
                    {
                        $resi = $_POST['resi'];
                        $status = $_POST['status'];

                        $koneksi->query("UPDATE pembelian SET nomor_resi='$resi', status_pembelian='$status'
                                    WHERE id_pembelian='$id_pembelian'");

                        echo "<script>alert('Data pembelian sudah update');</script>";
                        echo "<script>location='index.php?halaman=pembelian';</script>";
                    }

                    ?>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <br>
            <h6 class="m-0 font-weight-bold text-primary">Foto Bukti Pembayaran</h6>
            <br>
            <img width="300" height="350" src="../bukti_bayar/<?php echo $detail_pembayaran['bukti']?>" alt="" class="img-responsive">
        </div>

    </div>

</div>
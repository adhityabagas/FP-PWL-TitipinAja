<?php
session_start();
include 'includes/header.php';
require_once 'admin/koneksi.php';
echo "<br><br><br><br>";

$id_cust = $pecah["id_customer"];

// echo "<pre>";

// // print_r($data_pembelian);
// print_r($_SESSION);

// echo "<pre>";

?>


<div class="container">

    <h3 class="font-weight-bold">Request Produk</h3>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Request Produk</h6>
        </div>
        <form method="POST" enctype="multipart/form-data">

            <div class="card-body">

                <div class="form-group">
                    <label>Nama Produk </label>
                    <input type="text" name="nama_produk" class="form-control" placeholder="masukkan nama produk"
                        required>
                </div>
                <div class="form-group">
                    <label>Berat Produk</label>
                    <input type="number" name="berat" class="form-control" placeholder="masukkan berat produk" required>
                </div>
                <div class="form-group">
                    <label>Harga Produk</label>
                    <input type="number" name="harga_produk" class="form-control"
                        placeholder="masukkan harga produk" required>
                </div>
                <div class="form-group">
                    <label>Link Produk</label>
                    <input type="text" name="link" class="form-control" placeholder="masukkan link produk" required>
                </div>
                <div class="form-group">
                    <label>Upload Foto Produk</label>
                    <input type="file" name="foto_produk" id="upload_image" class="form-control" required>
                </div>

            </div>
            <div class="card-footer">
                <a href="index.php" class="btn btn-secondary">Keluar</a>
                <button type="submit" name="request" class="btn btn-primary">Kirim</button>
            </div>
        </form>
    </div>
</div>

<?php

// upload data request produk
if (isset($_POST["request"]))
{
    //upload ifoto bukti
    $nama_bukti = $_FILES["foto_produk"]["name"];
    $lokasi_bukti = $_FILES["foto_produk"]["tmp_name"];
    $nama_bukti_date = date("YmdHis").$nama_bukti;
    move_uploaded_file($lokasi_bukti, "request_produk/$nama_bukti_date");

    $nama_produk = $_POST["nama_produk"];
    $berat = $_POST["berat"]; 
    $harga = $_POST["harga_produk"];    
    $link = $_POST["link"];
    $tanggal = date("Y-m-d");

    // simpan data ke tabel pembayaran
    $koneksi->query("INSERT INTO produk_request (id_customer, nama_request, berat_request, harga_request, link_request, image_request)
                    VALUES ('$id_cust', '$nama_produk', '$berat', '$harga', '$link', '$nama_bukti_date')");

    // update data data pembelian pending menjadi sudah kirim pembayaran
    // $koneksi->query("UPDATE request_produk SET status_request='Request pending'
    //             WHERE id_customer='$id_cust'");

    echo "<script>alert('Terimakasih sudah mengirimkan Request Produk');</script>";
    echo "<script>location='index.php';</script>";
}

?>
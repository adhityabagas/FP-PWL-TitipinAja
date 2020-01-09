<?php
session_start();
include 'includes/header.php';
require_once 'admin/koneksi.php';
echo "<br><br><br><br>";

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
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$id_pembelian'");
$data_pembelian = $ambil->fetch_assoc();
  
// mendpatkan ud customer
$id_cust = $data_pembelian["id_customer"];

// mendpatkan ud customer yg login
$id_customer_login = $pecah["id_customer"];

if ($id_cust!=$id_customer_login) 
{
    echo "<script>alert('Bukan hak anda!');</script>";
    echo "<script>location='riwayat_belanja.php';</script>";
    exit();
}

// echo "<pre>";

// print_r($data_pembelian);
// print_r($_SESSION);

// echo "<pre>";


?>

<div class="container">

    <h3 class="font-weight-bold">Konfirmasi Pembayaran</h3>

    <div class="container-fluid">
        <div class="row">
            <div class="alert alert-info">
                Total pembayaran Anda sebesar <strong>Rp.
                    <?php echo number_format($data_pembelian['total_pembelian']) ?></strong><br>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Pembayaran</h6>
        </div>
        <form method="POST" enctype="multipart/form-data">

            <div class="card-body">

                <div class="form-group">
                    <label>Nama Penyetor </label>
                    <input type="text" name="nama_penyetor" class="form-control" placeholder="masukkan nama penyetor"
                        required>
                </div>
                <div class="form-group">
                    <label>Bank</label>
                    <input type="text" name="bank" class="form-control" placeholder="masukkan bank" required>
                </div>
                <div class="form-group">
                    <label>Total Pembayaran</label>
                    <input type="number" name="total_pembayaran" class="form-control"
                        placeholder="masukkan total pembayaran" required>
                </div>
                <div class="form-group">
                    <label>Upload Foto Bukti</label>
                    <input type="file" name="foto_bukti" id="upload_image" class="form-control" required>
                </div>

            </div>
            <div class="card-footer">
                <a href="riwayat_belanja.php?id=<?php echo $pecah['id_customer']?>" class="btn btn-secondary">Keluar</a>
                <button type="submit" name="bayar" class="btn btn-primary">Kirim</button>
            </div>
        </form>
    </div>
</div>

<?php

// upload data konfirmasi pembayaran
if (isset($_POST["bayar"]))
{
    //upload ifoto bukti
    $nama_bukti = $_FILES["foto_bukti"]["name"];
    $lokasi_bukti = $_FILES["foto_bukti"]["tmp_name"];
    $nama_bukti_date = date("YmdHis").$nama_bukti;
    move_uploaded_file($lokasi_bukti, "bukti_bayar/$nama_bukti_date");

    $nama_penyetor = $_POST["nama_penyetor"];
    $bank = $_POST["bank"];
    $jumlah = $_POST["total_pembayaran"];
    $tanggal = date("Y-m-d");

    // simpan data ke tabel pembayaran
    $koneksi->query("INSERT INTO pembayaran (id_pembelian, nama_customer, bank, jumlah, tanggal_pembayaran, bukti)
                    VALUES ('$id_pembelian', '$nama_penyetor', '$bank', '$jumlah', '$tanggal', '$nama_bukti_date')");

    // update data data pembelian pending menjadi sudah kirim pembayaran
    $koneksi->query("UPDATE pembelian SET status_pembelian='Sudah kirim pembayaran'
                WHERE id_pembelian='$id_pembelian'");

    echo "<script>alert('Terimakasih sudah mengirimkan bukti pembayaran');</script>";
    echo "<script>location='riwayat_belanja.php';</script>";
}

?>
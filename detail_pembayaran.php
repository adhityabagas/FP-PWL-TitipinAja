<?php
session_start();
include 'includes/header.php';
require_once 'admin/koneksi.php';
include 'includes/sidemenu.php';

$ambil = $koneksi->query("SELECT * FROM pembelian JOIN customer
        ON pembelian.id_customer=customer.id_customer
        WHERE pembelian.id_pembelian='$_GET[id]'");
$detail_pembayaran = $ambil->fetch_assoc();

if($_SESSION['customer']){
    $user_login = $_SESSION['customer'];
    }
    
    $ambil = $koneksi->query("SELECT * FROM customer WHERE id_customer='$user_login'");
    $pecah = $ambil->fetch_assoc();

?>

<!-- Mengamankan nota pembayaran -->
<?php
    $id_customerbeli = $detail_pembayaran['id_customer'];

    $id_customerlogin = $pecah['id_customer'];

    if ($id_customerbeli!=$id_customerlogin) 
    {
        echo "<script>alert('bukan hak anda!')</script>";
        echo "<script>location='riwayat_belanja.php';</script>";
        exit();
    }

?>


<body>

    <div id="right-panel" class="right-panel">

        <div class="content">

            <div class="animated fadeIn">
                <!--  Traffic  -->
                <!-- MENAMPILKAN ADDRESS -->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h6 class="m-0 font-weight-bold text-primary">Detail Pembelian</h6>
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="m-0 font-weight-bold text-danger">No. Pembelian :
                                                <?php echo $detail_pembayaran['id_pembelian']?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a>
                                        <h6 class="m-0 font-weight-bold text-gray-800">
                                            <i class="fas fa-fw fa-tachometer-alt"></i> Nama Customer
                                        </h6>
                                    </a>
                                    <h6 class="m-0 text-gray-800"><?php echo $detail_pembayaran['nama_customer']?>
                                    </h6><br>

                                    <a>
                                        <h6 class="m-0 font-weight-bold text-gray-800">
                                            <i class="fas fa-fw fa-tachometer-alt"></i> Email Customer
                                        </h6>
                                    </a>
                                    <h6 class="m-0 text-gray-800"><?php echo $detail_pembayaran['email_customer']?>
                                    </h6><br>

                                    <a>
                                        <h6 class="m-0 font-weight-bold text-gray-800">
                                            <i class="fas fa-fw fa-tachometer-alt"></i> Telepon Customer
                                        </h6>
                                    </a>
                                    <h6 class="m-0 text-gray-800">
                                        <?php echo $detail_pembayaran['telepon_customer']?> </h6><br>

                                    <a>
                                        <h6 class="m-0 font-weight-bold text-gray-800">
                                            <i class="fas fa-fw fa-tachometer-alt"></i> Tanggal Pembelian
                                        </h6>
                                    </a>
                                    <h6 class="m-0 text-gray-800">
                                        <?php echo $detail_pembayaran['tanggal_pembelian']?> </h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Pengiriman</h6>
                                </div>
                                <div class="card-body">
                                    <a>
                                        <h6 class="m-0 font-weight-bold text-gray-800">
                                            <i class="fas fa-fw fa-tachometer-alt"></i> Kabupaten
                                        </h6>
                                    </a>
                                    <h6 class="m-0 text-gray-800"><?php echo $detail_pembayaran['nama_kota']?> </h6>
                                    <br>

                                    <a>
                                        <h6 class="m-0 font-weight-bold text-gray-800">
                                            <i class="fas fa-fw fa-tachometer-alt"></i> Ongkos Kirim
                                        </h6>
                                    </a>
                                    <h6 class="m-0 text-gray-800">Rp.
                                        <?php echo number_format($detail_pembayaran['tarif'])?> </h6>
                                    <br>

                                    <a>
                                        <h6 class="m-0 font-weight-bold text-gray-800">
                                            <i class="fas fa-fw fa-tachometer-alt"></i> Alamat Tujuan
                                        </h6>
                                    </a>
                                    <h6 class="m-0 text-gray-800"><?php echo $detail_pembayaran['alamat_lengkap']?>
                                    </h6><br>

                                    <a>
                                        <h6 class="m-0 font-weight-bold text-gray-800"><br></h6>
                                        <h6 class="m-0 text-gray-800"><br></h6>
                                    </a>
                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Informasi Produk</h6>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td> No. </td>
                                            <td> Nama Produk </td>
                                            <td> Gambar Produk </td>
                                            <td> Berat (Gram) </td>
                                            <td> Harga Produk </td>
                                            <td> Jumlah Produk </td>
                                            <td> Total Harga </td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $nomor=1;?>
                                        <?php $ambil = $koneksi -> query("SELECT * FROM pembelian_produk JOIN produk 
                                                ON pembelian_produk.id_produk=produk.id_produk
                                                WHERE pembelian_produk.id_pembelian='$_GET[id]'" );?>
                                        <?php WHILE ($pecah = $ambil -> fetch_assoc()) { ?>
                                        <tr>
                                            <th> <?php echo $nomor?> </th>
                                            <td> <?php echo $pecah['nama'] ?> </td>
                                            <td> <img src="admin/upload/<?php echo $pecah['image_produk'] ?>"
                                                    width=100"> </td>
                                            <td> <?php echo $pecah['berat']?></td>
                                            <td> Rp. <?php echo number_format($pecah['harga']) ?> </td>
                                            <td> <?php echo $pecah['jumlah_produk'] ?> </td>
                                            <td> Rp. <?php echo number_format($pecah['sub_harga']);?> </td>
                                        </tr>
                                        <?php $nomor++; ?>
                                        <?php } ?>

                                    </tbody>
                                </table>


                            </div>
                            <a>
                                <h6 class="m-0 text-gray-800">
                                    <i class="fas fa-fw fa-tachometer-alt"></i> Total Pembayaran + Ongkir
                                </h6>
                            </a>
                            <h6 class="m-0 text-gray-800"> Rp.
                                <?php echo number_format($detail_pembayaran['total_pembelian']) ?>
                            </h6>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="alert alert-info">
                                Silahkan melakukan pembayaran sebesar <strong>Rp.
                                    <?php echo number_format($detail_pembayaran['total_pembelian']) ?></strong><br>
                                ke <strong>Rekening BANK BCA 089-98702 An. TitipinAja</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
<?php
session_start();
include 'includes/header.php';
require_once 'admin/koneksi.php';
include 'includes/sidemenu.php';

// harus login untuk mengakses riwayat belanja
if (!isset($_SESSION['customer']) OR empty ($_SESSION['customer'])) 
{
    echo "<script>alert('Silahkan Login!');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

?>

<!-- <pre><?php print_r($_SESSION) ?></pre> -->

<body>


    <div id="right-panel" class="right-panel">

        <div class="content">

            <div class="animated fadeIn">
                <!--  Traffic  -->
                <!-- MENAMPILKAN ADDRESS -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Riwayat Belanja</h6>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th> No. </th>
                                            <th> Tanggal Pembelian </th>
                                            <th> Total Pembelian </th>
                                            <th> Status </th>
                                            <th> Resi Pengiriman </th>
                                            <th> Tanggal Diterima </th>
                                            <th> Opsi </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $nomor=1;?>
                                        <?php 
                                        if($_SESSION['customer']){
                                            $user_login = $_SESSION['customer'];
                                        }
                                        $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_customer='$user_login' ORDER BY tanggal_pembelian DESC");

                                        $id_customer = $pecah["id_customer"];

                                        ?>
                                        <?php WHILE ($pecah = $ambil -> fetch_assoc()) { ?>
                                        <tr>
                                            <td> <?php echo $nomor?>. </td>
                                            <td> <?php echo $pecah['tanggal_pembelian'] ?> </td>
                                            <td> Rp. <?php echo number_format($pecah['total_pembelian']) ?></td>
                                            <td> <button style="color:white;" class="btn btn-warning">
                                                    <?php echo $pecah['status_pembelian']?> </button>
                                            </td>
                                            <td>
                                            <?php if (!empty($pecah['nomor_resi'])): ?>
                                            <?php echo $pecah['nomor_resi'];?>
                                            <?php endif ?>
                                            </td>
                                            <td>
                                            <?php if (!empty($pecah['tanggal_diterima'])): ?>
                                            <?php echo $pecah['tanggal_diterima'];?>
                                            <?php endif ?>
                                            </td>
                                            <td>
                                                <form action="" method="">
                                                    <a href="detail_pembayaran.php?id=<?php echo $pecah['id_pembelian']?>"
                                                        class="btn btn-info">Detail</a>

                                                    <?php if ($pecah['status_pembelian']=="Pending"): ?>
                                                    <a href="pembayaran.php?id=<?php echo $pecah['id_pembelian']?>" class="btn btn-success">Bayar</a>
                                                    <?php elseif ($pecah['status_pembelian']=="Sudah kirim pembayaran"): ?>
                                                    <a style="color:white;" href="lihat_pembayaran.php?id=<?php echo $pecah['id_pembelian']?>" class="btn btn-success">Lihat</a>
                                                    <?php elseif ($pecah['status_pembelian']=="Barang dikirim"): ?>
                                                    <a style="color:white;" href="lihat_pembayaran.php?id=<?php echo $pecah['id_pembelian']?>" class="btn btn-success">Lihat </a>
                                                    <a style="color:white;" href="konfirmasi_barang.php?id=<?php echo $pecah['id_pembelian']?>" class="btn btn-danger">Konfirmasi</a>
                                                    <?php endif ?>
                                                </form>

                                            </td>
                                        </tr>
                                        <?php $nomor++; ?>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
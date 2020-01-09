<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN customer
        ON pembelian.id_customer=customer.id_customer
        WHERE pembelian.id_pembelian='$_GET[id]'");
$detail_pembelian = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail_pembelian);
// echo "</pre>";
?>

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
                                <?php echo $detail_pembelian['id_customer']?></h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <a>
                        <h6 class="m-0 font-weight-bold text-gray-800">
                            <i class="fas fa-fw fa-tachometer-alt"></i> Nama Customer
                        </h6>
                    </a>
                    <h6 class="m-0 text-gray-800"><?php echo $detail_pembelian['nama_customer']?>
                    </h6><br>

                    <a>
                        <h6 class="m-0 font-weight-bold text-gray-800">
                            <i class="fas fa-fw fa-tachometer-alt"></i> Email Customer
                        </h6>
                    </a>
                    <h6 class="m-0 text-gray-800"><?php echo $detail_pembelian['email_customer']?>
                    </h6><br>

                    <a>
                        <h6 class="m-0 font-weight-bold text-gray-800">
                            <i class="fas fa-fw fa-tachometer-alt"></i> Telepon Customer
                        </h6>
                    </a>
                    <h6 class="m-0 text-gray-800">
                        <?php echo $detail_pembelian['telepon_customer']?> </h6><br>

                    <a>
                        <h6 class="m-0 font-weight-bold text-gray-800">
                            <i class="fas fa-fw fa-tachometer-alt"></i> Tanggal Pembelian
                        </h6>
                    </a>
                    <h6 class="m-0 text-gray-800">
                        <?php echo $detail_pembelian['tanggal_pembelian']?> </h6>
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
                    <h6 class="m-0 text-gray-800"><?php echo $detail_pembelian['nama_kota']?> </h6>
                    <br>

                    <a>
                        <h6 class="m-0 font-weight-bold text-gray-800">
                            <i class="fas fa-fw fa-tachometer-alt"></i> Ongkos Kirim
                        </h6>
                    </a>
                    <h6 class="m-0 text-gray-800">Rp.
                        <?php echo number_format($detail_pembelian['tarif'])?> </h6>
                    <br>

                    <a>
                        <h6 class="m-0 font-weight-bold text-gray-800">
                            <i class="fas fa-fw fa-tachometer-alt"></i> Alamat Tujuan
                        </h6>
                    </a>
                    <h6 class="m-0 text-gray-800"><?php echo $detail_pembelian['alamat_lengkap']?>
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
                            <th> No. </th>
                            <th> Nama Produk </th>
                            <th> Gambar Produk </th>
                            <th> Berat (Gram) </th>
                            <th> Harga Produk </th>
                            <th> Jumlah Produk </th>
                            <th> Total Harga </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $nomor=1;?>
                        <?php $ambil = $koneksi -> query("SELECT * FROM pembelian_produk JOIN produk 
                                                    ON pembelian_produk.id_produk=produk.id_produk
                                                    WHERE pembelian_produk.id_pembelian='$_GET[id]'" ); ?>
                        <?php while ($pecah = $ambil -> fetch_assoc()) { ?>
                        <tr>
                            <th> <?php echo $nomor?> </th>
                            <td> <?php echo $pecah['nama'] ?> </td>
                            <td> <img src="upload/<?php echo $pecah['image_produk'] ?>" width=100"> </td>
                            <td> <?php echo $pecah['berat']?></td>
                            <td> Rp. <?php echo number_format($pecah['harga']) ?> </td>
                            <td> <?php echo $pecah['jumlah_produk'] ?> </td>
                            <td> Rp. <?php echo number_format($pecah['sub_harga']) ?> </td>
                        </tr>
                        <?php $nomor++; ?>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
            <a>
                <h6 class="m-0 font-weight-bold text-gray-800">
                    <i class="fas fa-fw fa-tachometer-alt"></i> Total Pembayaran
                </h6>
            </a>
            <h6 class="m-0 text-gray-800"> Rp. <?php echo number_format($detail_pembelian['total_pembelian']) ?>
            </h6>
        </div>
    </div>
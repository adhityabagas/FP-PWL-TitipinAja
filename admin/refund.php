<?php
include('includes/header.php'); 
require_once 'koneksi.php';

?>

<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Refund Barang</h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> No. </th>
              <th> Nama Customer </th>
              <th> Tanggal </th>
              <th> Total Pembayaran </th>
              <th> Status </th>
              <th> Detail </th>
            </tr>
          </thead>
          <tbody>

            <!-- Menampilkan data pembelian yang ada di database -->
            <?php $nomor=1;?>
            <?php $query = mysqli_query($koneksi, "SELECT * FROM pembelian JOIN customer ON pembelian.id_customer=customer.id_customer 
                                          WHERE status_pembelian='Barang direfund' OR status_pembelian='Proses refund' ORDER BY tanggal_pembelian DESC"); ?>
            <?php while ($pecah = mysqli_fetch_array($query)) { ?>
            <tr>
              <th> <?php echo $nomor?>. </th>
              <td> <?php echo $pecah['nama_customer'] ?> </td>
              <td> <?php echo $pecah['tanggal_pembelian'] ?> </td>
              <td> Rp. <?php echo number_format($pecah['total_pembelian']) ?> </td>
              <td>
                <?php if ($pecah['status_pembelian'] == "Barang direfund"): ?>
                <button style="color:white;" class="btn btn-danger">
                  <?php echo $pecah['status_pembelian']?>
                </button>
                <?php elseif ($pecah['status_pembelian'] == "Proses refund"): ?>
                <button style="color:white;" class="btn btn-warning">
                  <?php echo $pecah['status_pembelian']?>
                </button>
                <?php endif ?>
              </td>
              <td>
                <form action="" method="post">
                  <a href="index.php?halaman=detail_pembelian&id=<?php echo $pecah['id_pembelian']?>"
                    class="btn btn-info">Detail</a>

                  <?php if ($pecah['status_pembelian'] == "Barang direfund"): ?>
                    <a href="index.php?halaman=konfirmasi_refund&id=<?php echo $pecah['id_pembelian']?>"
                    class="btn btn-success">Proses Refund</a>
                  <?php endif ?>
                </form>
              </td>
              <!-- <td>
                <form action="" method="post">
                  <input type="hidden" name="hapus_id" value="">
                  <button type="submit" name="hapus_btn" class="btn btn-danger">Batalkan</button>
                </form>
            </td> -->
            </tr>

            <?php $nomor++; ?>
            <?php } ?>

          </tbody>
        </table>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->



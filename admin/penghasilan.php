<?php
include('includes/header.php'); 
require_once 'koneksi.php';
?>

<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Penghasilan</h6>
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
              <th> Detail </th>
            </tr>
          </thead>
          <tbody>

            <!-- Menampilkan data pembelian yang ada di database -->
            <?php $totalpenghasilan = 0;?>
            <?php $nomor=1;?>
            <?php $query = mysqli_query($koneksi, "SELECT * FROM pembelian JOIN customer ON pembelian.id_customer=customer.id_customer ORDER BY tanggal_pembelian DESC"); ?>
            <?php while ($pecah = mysqli_fetch_array($query)) { 
                if($pecah['status_pembelian']=="Barang diterima") {
                    $subtotal = $pecah['total_pembelian'];
            ?>
            <tr>
              <th> <?php echo $nomor?>. </th>
              <td> <?php echo $pecah['nama_customer'] ?> </td>
              <td> <?php echo $pecah['tanggal_pembelian'] ?> </td>
              <td> Rp. <?php echo number_format($pecah['total_pembelian']) ?> </td>
              <td><a href="index.php?halaman=detail_pembelian&id=<?php echo $pecah['id_pembelian']?>"
                    class="btn btn-info">Detail</a></td>
              <?php  $totalpenghasilan += $subtotal; ?>
              <?php } ?>
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
        <h5 class="text-gray-800"><strong>Total Penghasilan : </strong> Rp. <?php echo number_format ($totalpenghasilan); ?></h5>
      </div>
    </div>
  </div>

</div>
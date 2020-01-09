<?php
include('includes/header.php'); 
require_once 'koneksi.php';
?>


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Request Produk</h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> No. </th>
              <th> Nama Customer </th>
              <th> Nama Produk </th>
              <th> Harga Produk </th>
              <th> Gambar Produk </th>
              <th> Status </th>
              <th> Opsi </th>
            </tr>
          </thead>
          <tbody>

            <!-- Menampilkan data pembelian yang ada di database -->
            <?php $nomor=1;?>
            <?php $query = mysqli_query($koneksi, "SELECT * FROM produk_request JOIN customer ON produk_request.id_customer=customer.id_customer"); ?>
            <?php while ($pecah = mysqli_fetch_array($query)) { ?>
            <tr>
              <th> <?php echo $nomor?>. </th>
              <td> <?php echo $pecah['nama_customer'] ?> </td>
              <td> <?php echo $pecah['nama_request'] ?> </td>
              <td> Rp. <?php echo number_format($pecah['harga_request']) ?> </td>
              <td> <img src="../request_produk/<?php echo $pecah['image_request'] ?>" width=100"> </td>
              <td> 
                <?php if ($pecah['status_request'] == "Request pending"): ?>
                  <button style="color:white;" class="btn btn-warning">
                    <?php echo $pecah['status_request']?> 
                  </button>
                <?php endif ?>
              </td>
              <td>
                <form action="" method="post">
                    <?php if ($pecah['status_request'] == "Request pending"): ?>
                      <a href="#"
                        class="btn btn-success">Proses request</a>
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
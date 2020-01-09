<?php
include('includes/header.php'); 
require_once 'koneksi.php';
?>

<!-- Modal tambah produk
<div class="modal fade" id="addproduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="code.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label> Nama Produk </label>
                <input type="text" name="nama_prod" class="form-control" placeholder="masukkan nama produk" required>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="type" name="harga_prod" class="form-control" placeholder="masukkan harga" required>
            </div>
            <div class="form-group">
                <label>Berat Produk</label>
                <input type="text" name="berat_prod" class="form-control" placeholder="masukkan berat produk" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" name="desc_prod" class="form-control" placeholder="masukkan deskripsi produk" required>
            </div>

            <div class="form-group">
                <label>Upload Gambar</label>
                <input type="file" name="berkas" id="upload_image" class="form-control" required>
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="addproduk" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div> -->


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Data Produk
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        
          <tr>
            <th> No. </th>
            <th> Nama Produk </th>
            <th> Harga </th>
            <th> Berat (Gram) </th>
            <th> Gambar Produk </th>
            <th> Edit </th>
            <th> Hapus </th>
          </tr>
        
        </thead>
        <tbody>

          <!-- Menampilkan produk yang ada di database -->
          <?php $nomor=1;?>
          <?php $query = mysqli_query($koneksi, "SELECT * FROM produk"); ?>
          <?php while ($pecah = mysqli_fetch_assoc($query)) { ?>

          <tr>
            <th> <?php echo $nomor ?>. </th>
            <td> <?php echo $pecah['nama_produk'] ?></td>
            <td> Rp. <?php echo number_format($pecah['harga_produk']); ?> </td>
            <td> <?php echo $pecah['berat_produk']?> </td>
            <td> <img src="upload/<?php echo $pecah['image_produk'] ?>" width=100"> </td>
            <td>
                <!-- <form action="" method="post"> -->
                  <!-- <input type="hidden" name="ubah_id" value=""> -->
                  <h6 class="m-0 font-weight-bold text-primary"> 
                    <a href="index.php?halaman=ubah_produk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                  </h6>
                <!-- </form> -->
                </td>
                <td>
                <!-- <form action="" method="post"> -->
                  <!-- <input type="hidden" name="hapus_id" value=""> -->
                  <!-- <button type="submit" name="hapus_btn" class="btn btn-danger">Hapus</button> -->
                <h6 class="m-0 font-weight-bold text-primary"> 
                  <a href="index.php?halaman=hapus_produk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></a>
                </h6>
                </td>
          </tr>

          <?php $nomor++; ?>
          <?php } ?>
        
        </tbody>
      </table>

        <!-- <a href="index.php?halaman=tambah_produk" class="btn btn-primary">Tambah Produk</a> -->
        <h6 class="m-0 font-weight-bold text-primary"> 
            <a href="index.php?halaman=tambah_produk" class="btn btn-primary">Tambah Produk</a>
        </h6>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

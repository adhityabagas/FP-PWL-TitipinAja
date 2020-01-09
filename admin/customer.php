<?php
include('includes/header.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Nama Produk </label>
                <input type="text" name="username" class="form-control" placeholder="masukkan nama produk...">
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="email" name="email" class="form-control" placeholder="masukkan harga...">
            </div>
            <div class="form-group">
                <label>Berat Produk</label>
                <input type="password" name="password" class="form-control" placeholder="masukkan berat produk...">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="masukkan deskripsi produk...">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Customer
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        
          <tr>
            <th> No. </th>
            <th> Nama Customer </th>
            <th> Email Customer </th>
            <th> Telepon Customer </th>
            <th> Hapus </th>
          </tr>
        
        </thead>
        <tbody>

          <?php $nomor=1;?>
          <?php $query = mysqli_query($koneksi, "SELECT * FROM customer"); ?>
          <?php while ($pecah = mysqli_fetch_array($query)) { ?>

          <tr>
            <th> <?php echo $nomor; ?>. </th>
            <td> <?php echo $pecah['nama_customer'] ?> </td>
            <td> <?php echo $pecah['email_customer'] ?></td>
            <td> <?php echo $pecah['telepon_customer'] ?></td>
            <td>
                <form action="" method="post">
                  <input type="hidden" name="hapus_id" value="">
                  <button type="submit" name="hapus_btn" class="btn btn-danger fas fa-trash-alt"></button> 
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
<!-- /.container-fluid -->

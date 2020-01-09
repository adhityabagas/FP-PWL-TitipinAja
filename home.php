<?php

session_start(); 
require_once 'admin/koneksi.php';

include 'includes/header.php';

// print_r($_SESSION["customer"]);

?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "200",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    function notificationin() {    
        toastr.success('Berhasil Login');
    };

    function notificationout() {
        toastr.success('Berhasil Logout');
    };
</script>


<!-- Content Top -->
<div class="jumbotron bg-banner mb-0 jumbotron-fluid" style="height: 550px; padding-top: 120px;">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="col-md-10">
          <br>
          <h3>Bingung beli barang di luar negeri?</h3>
          <p style="margin: 0px 0px 0px;">TitipinAja di sini, bisa titip dari mana aja!</p>
          <p>Bikin Request, dijamin barang langsung dibelikan</p>
        </div>
        <br><br>

        <div class="d-flex align-items-center flex-column justify-content-center">
          <form action="pencarian.php" method="GET">
            <div class="form-inline form-group">
              <input class="form-control form-control-lg" name="keyword" style="border-radius: 5px 0px 0px
                  5px; width: 700px;" type="search" placeholder="cari produk disini...">
              <button class="btn btn-light fa text-danger fa-search" style="height: 3rem;">
                <!-- <a class="fa text-danger fa-search" style="border-radius: 0px 5px 5px 0px;" href="pencarian.php"></a> -->
              </button>
            </div>
          </form>
          <br><br>
          <span class="form-group">Titip produk apapun dari Jepang, Amerika, Korea, Thailand, Malaysia,
            China</span>
          <div class="form-group">
            <!-- <button class="btn btn-info" style="border-radius: 5px 5px 5px 5px;" type="submit">Buat
              Request</button> -->
            <a href="request_produk.php" class="btn btn-info" style="border-radius: 5px 5px 5px 5px;">Buat Request</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Content Request Berdasarkan Negara -->
<!-- <br>
  <div class="container">
    <div class="d-flex align-items-center flex-column justify-content-center">
      <h4 class="mt-md-3 mb-sm-5">Lihat Request Berdasarkan Negara</h4>

      <section class="row no-gutter align-items-center">
        <div class="row mx-auto">
          <div class="card" style="width: 18rem; margin: 0px 20px 50px 0">
            <img class="card-img-top" src="assets/image/japan.jpg" alt="Card image cap">
            <h4 class="centered-text">Japan</h4>
          </div>
          <div class="card" style="width: 18rem; margin: 0px 20px 50px 0">
            <img class="card-img-top" src="assets/image/american.jpg" alt="Card image cap">
            <h4 class="centered-text">Amerika</h4>
          </div>
          <div class="card" style="width: 18rem; margin: 0px 20px 50px 0">
            <img class="card-img-top" src="assets/image/south-korea.jpg" alt="Card image cap">
            <h4 class="centered-text">Korea</h4>
          </div>
        </div>
      </section>
      <section class="row no-gutter align-items-center">
        <div class="row mx-auto">
          <div class="card" style="width: 18rem; margin: 0px 20px 20px 0">
            <img class="card-img-top" src="assets/image/thailand.jpg" alt="Card image cap">
            <h4 class="centered-text">Thailand</h4>
          </div>
          <div class="card" style="width: 18rem; margin: 0px 20px 20px 0">
            <img class="card-img-top" src="assets/image/malaysia.jpg" alt="Card image cap">
            <h4 class="centered-text">Malaysia</h4>
          </div>
          <div class="card" style="width: 18rem; margin: 0px 20px 20px 0">
            <img class="card-img-top" src="assets/image/china.jpg" alt="Card image cap">
            <h4 class="centered-text">China</h4>
          </div>
        </div>
      </section>

    </div>
  </div> -->

<!-- Content Request Berdasarkan Negara -->
<br>
<div class="content">
  <div class="container">
    <div class="d-flex align-items-center flex-column justify-content-center">
      <h3 class="mt-md-3 mb-sm-5 text-dark" style="font-size:28px;">Produk Rekomendasi</h3>

      <!-- <pre> 
        <?php print_r($_SESSION["nama_customer"]); ?>
      </pre> -->

      <div class="row">

        <?php $query = mysqli_query($koneksi, "SELECT * FROM produk"); ?>
        <?php while ($pecah = mysqli_fetch_assoc($query)) { ?>
        <!-- <pre> <?php print_r($pecah) ?> </pre> -->

        <div class="col-lg-4 col-md-6">
          <div class="single-product">
            <div class="product-img">
              <img class="img-fluid w-100" src="admin/upload/<?php echo $pecah['image_produk']?>" alt="" />
              <div class="p_icon">
                <a href="detail_produk.php?id=<?php echo $pecah['id_produk']?>">
                  <i class="fa fa-eye"></i>
                </a>
                <a href="cart.php">
                  <i class="fa fa-shopping-cart"></i>
                </a>
              </div>
            </div>
            <div class="product-btm">
              <a href="detail_produk.php?id=<?php echo $pecah['id_produk']?>" class="d-block">
                <h4 style="font-size:18px;"><?php echo $pecah['nama_produk']?></h4>
              </a>
              <div class="mt-3">
                <span class="mr-4" style="color:orange; font-size:16px;">Rp.
                  <?php echo number_format($pecah['harga_produk'])?></span>
                <!-- <del>$35.00</del> -->
              </div>
              <!-- <a href="detail_produk.php?id=<?php echo $pecah['id_produk']?>" class="btn btn-success">Detail</a> -->
            </div>
          </div>
        </div>

        <?php } ?>

      </div>

      <div class="form-group">
        <a href="katalog.php" class="btn btn-info" style="border-radius: 5px 5px 5px 5px;" type="submit">Lihat
          Semua</a>
      </div>
    </div>
  </div>
</div>

<?php     
  include 'includes/footer.php';
?>

<?php
  if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'successlogin') {
    echo "<script>notificationin()</script>";
    unset($_SESSION['alert']);
  }

  if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'successlogout') {
    echo "<script>notificationout()</script>";
    unset($_SESSION['alert']);
  }

  // if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'successlogout') {
  //   echo "<script>setTimeout(function() {alert('Anda berhasil logout');}, 500);</script>";
  //   unset($_SESSION['alert']);
  // }
?>
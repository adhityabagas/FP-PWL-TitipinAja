<?php
session_start();
include 'includes/header.php';
require_once 'admin/koneksi.php';
echo "<br><br><br><br>";

// perintah harus login dahulu sebelum masuk checkout
if (!isset($_SESSION["customer"])) 
{
  echo "<script>alert('silahkan login');</script>";
  echo "<script>location='login.php';</script>"; 
}

// perintah untuk menampilkan session customer
// if($_SESSION['customer']){
//   $user_login = $_SESSION['customer'];
// }

// $ambil = $koneksi->query("SELECT * FROM customer WHERE id_customer='$user_login'");
// $pecah = $ambil->fetch_assoc();


// if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
// {
//   echo "<script>alert('keranjang kosong, silahkan belanja dulu');</script>";
//   echo "<script>location='index.php';</script>";
// }
?>


<div class="container" style="padding-top: 30px;">
  <h3 class="font-weight-bold text-primary">Checkout</h3>

  <label style="color: black; padding-left: 20px;">Produk</label>

  <div class="shopping-cart">

    <div class="column-labels" style="margin-bottom: 40px;">
      <label class="product-image">Image</label>
      <label class="product-details">Product</label>
      <label class="product-price" style="color: black;">Harga</label>
      <label class="product-quantity" style="color: black;">Jumlah</label>
      <label class="product-removal">Remove</label>
      <label class="product-line-price" style="color: black;">Total</label>
    </div>

    <div class="a">
      <?php $subtotal = 0; ?>
      <?php         
        foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
      <!-- menampilkan produk yang dibeli -->
      <?php
        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
        $detail = $ambil->fetch_assoc();
        $subharga = $detail["harga_produk"]*$jumlah;
        ?>

      <div class="product">
        <div class="product-image">
          <img src="admin/upload/<?php echo $detail['image_produk'] ?>">
        </div>
        <div class="product-details">
          <div class="product-description"><?php echo $detail['nama_produk']; ?></div>
          <p class="product-title">
            <?php echo $detail['deskripsi_produk']; ?></p>
        </div>
        <div class="product-price"><?php echo number_format ($detail['harga_produk']); ?></div>
        <div class="product-quantity">
          <input type="number" name="jumlah_pesanan" value="<?php echo $jumlah;?>">

        </div>
        <div class="product-removal">
          <a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="remove-product btn btn-sm btn-danger">
            <i class="fa fa-trash"></i>
          </a>
        </div>
        <div class="product-line-price"><?php echo number_format ($subharga); ?></div>
      </div>
      <?php 
        $subtotal += $subharga;
        // $grandtotal = $subtotal + $shipping;
      ?>

      <?php endforeach ?>
    </div>

    <div class="totals" style="margin-top: 40px;">
      <div class="totals-item">
        <label>Subtotal</label>
        <div class="totals-value" id="cart-subtotal">
          <?php echo number_format ($subtotal); ?>
        </div>
      </div>
    </div>

  </div>
  <br>
  <h4 class="font-weight-bold">Data Cutomer</h4>
  <form action="" method="POST">
    <div class="row">

      <div class=col-md-6>
        <div class=form-group>
          <p style="color:black; margin-bottom:10px; font-size:14px;">Nama Customer</p>
          <input class=form-control type="text" readonly value="<?php echo $pecah["nama_customer"]; ?>">
        </div>
      </div>
      <div class=col-md-6>
        <div class=form-group>
          <p style="color:black; margin-bottom:10px; font-size:14px;">Telepon Customer</p>
          <input class=form-control type="text" readonly value="<?php echo $pecah["telepon_customer"]; ?>">
        </div>
      </div>
      <div class=col-md-6>
        <div class=form-group>
          <p style="color:black; margin-bottom:10px; font-size:14px;">Email</p>
          <input class=form-control type="text" readonly value="<?php echo $pecah["email_customer"]; ?>">
        </div>
      </div>
      <div class=col-md-6>
        <div class=form-group>
          <p style="color:black; margin-bottom:10px; font-size:14px;">Alamat Lengkap</p>
          <input class=form-control type="text" readonly value="<?php echo $pecah["alamat_lengkap"]; ?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class=col-md-9>

      </div>
      <div class=col-md-3>
        <div class=form-group>
          <select class="form-control" name="id_ongkir" required>
            <option value="">Pilih Ongkos Kirim</option>

            <?php 
                $ambilongkir = $koneksi->query("SELECT * FROM ongkir");
                WHILE($perongkir = $ambilongkir->fetch_assoc()){
            ?>
            <option value="<?php echo $perongkir["id_ongkir"]?>">
              <?php echo $perongkir["nama_kota"];?> -
              Rp. <?php echo number_format($perongkir["tarif"]);?>
            </option>

            <?php } ?>
          </select>
        </div>


      </div>

    </div>
    <button class="checkout" name="checkout">Checkout</button>
  </form>

  <?php

  if(isset($_POST["checkout"])) 
  {
    // error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    // perintah memanggil session customer
    if($_SESSION['customer']){
      $user_login = $_SESSION['customer'];
    }

    $ambil = $koneksi->query("SELECT * FROM customer WHERE id_customer='$user_login'");
    $pecah = $ambil->fetch_assoc();
    
    // init view
    $id_customer = $pecah["id_customer"];
    $id_ongkir = $_POST["id_ongkir"];
    $tanggal_pembelian = date("Y-m-d");

    // mendapatkan id ongkir
    $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
    $arrayongkir = $ambil->fetch_assoc();
    $nama_kota = $arrayongkir["nama_kota"];
    $tarif = $arrayongkir["tarif"];
    
    $total_pembelian = $subtotal + $tarif;

    // simpan data ke tabel pembelian (oop)
    $koneksi->query("INSERT INTO pembelian (id_customer, id_ongkir, tanggal_pembelian, total_pembelian, nama_kota, tarif)
                  VALUES ('$id_customer', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian', '$nama_kota', '$tarif')"); 

    //simpan data terbaru ke tabel pembelian produk
    $id_pembelian_terbaru = $koneksi->insert_id;

    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {

      // mendapatkan data berdasarkan id produk
      $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
      $perproduk = $ambil->fetch_assoc();

      $nama = $perproduk['nama_produk'];
      $harga = $perproduk['harga_produk'];
      $berat = $perproduk['berat_produk'];

      $sub_berat = $perproduk['berat_produk']*$jumlah;
      $sub_harga = $perproduk['harga_produk']*$jumlah;

      // procedural
      $query = ("INSERT INTO pembelian_produk (id_pembelian, id_produk, jumlah_produk, nama, harga, berat, sub_berat, sub_harga)
                  VALUES ('$id_pembelian_terbaru', '$id_produk', '$jumlah', '$nama', '$harga', '$berat', '$sub_berat', '$sub_harga')");
      mysqli_query($koneksi, $query);

      // update stok
      $koneksi->query("UPDATE produk SET stok=stok - $jumlah
            WHERE id_produk='$id_produk'");
    }

    unset($_SESSION['keranjang']);

    echo "<script>alert ('pembelian sukses');</script>";
    echo "<script>location='detail_pembayaran.php?id=$id_pembelian_terbaru';</script>";

  }

  ?>



</div>

<?php

include 'includes/footer.php';

?>
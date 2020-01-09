
<?php
session_start();
include 'includes/header.php';
require_once 'admin/koneksi.php';
echo "<br><br><br><br>";
// echo "<pre>";
// print_r ($_SESSION['keranjang']);
// echo "</pre>";

//redirect jika keranjang kosong
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
{
    echo "<script>alert('keranjang kosong, silahkan belanja dulu');</script>";
    echo "<script>location='index.php';</script>";
}

?>




<body>
    <div class="container" style="padding-top: 30px;">

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
                <?php 
                $subtotal = 0;
                $grandtotal = 0;
                ?>
                <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
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
                        <a href="hapuskeranjang.php?id=<?php echo $id_produk ?>"
                            class="remove-product btn btn-sm btn-danger">
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
                <!-- <div class="totals-item">
                    <label>Shipping</label>
                    <div class="totals-value" id="cart-shipping">
                        <?php echo number_format ($shipping); ?>
                    </div>
                </div> -->
                <!-- <div class="totals-item totals-item-total">
                    <label>Grand Total</label>
                    <div class="totals-value" id="cart-total">
                        <?php echo number_format ($grandtotal); ?>
                    </div>
                </div> -->
            </div>

            <a href="checkout.php">
                <button class="checkout" style="">Checkout</button>
            </a>
            <a href="index.php">
                <button class="order" style="">Lanjutkan Belanja</button>
            </a>

        </div>
    </div>
</body>

<?php     
  include 'includes/footer.php';
?>
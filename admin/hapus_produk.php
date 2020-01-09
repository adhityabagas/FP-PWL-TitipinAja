<?php 

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$gambar_produk = $pecah['image_produk'];

if (file_exists("/upload/$gambar_produk")) {
    unlink("/upload/$gambar_produk");
}

$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");

// echo "<script><div class='alert alert-danger alert-dismissible fade show'>Produk Terhapus</div>;<script>";
echo "<script>location='index.php?halaman=produk';</script>";

?>


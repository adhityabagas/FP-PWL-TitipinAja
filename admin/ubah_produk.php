<?php 
    // Menampilkan isi dari Table Produk sesuai ID produk
    $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $pecah = mysqli_fetch_assoc($query);

?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ubah Produk</h6>
        </div>
        <form method="POST" enctype="multipart/form-data">

            <div class="card-body">

                <div class="form-group">
                    <label>Nama Produk </label>
                    <input type="text" name="nama_produk" class="form-control" value="<?php echo $pecah['nama_produk'];?>" >
                </div>
                <div class="form-group">
                    <label>Harga (Rp)</label>
                    <input type="number" name="harga_produk" class="form-control" value="<?php echo $pecah['harga_produk'];?>" >
                </div>
                <div class="form-group">
                    <label>Berat Produk (Gram)</label>
                    <input type="number" name="berat_produk" class="form-control" value="<?php echo $pecah['berat_produk'];?>" >
                </div>
                <div class="form-group">
                    <label>Deskripsi Produk</label>
                    <textarea name="deskripsi_produk" class="form-control" rows='5' ><?php echo $pecah['deskripsi_produk']?></textarea>
                </div>

                <div class="form-group">
                    <img src="upload/<?php echo $pecah['image_produk'] ?>" width=300">
                </div>

                <div class="form-group">
                    <label>Ganti Gambar</label>
                    <input type="file" name="file_gambar" id="upload_image" class="form-control" >
                </div>

            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                <button type="submit" name="ubahproduk" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>


<?php
// Ubah Produk
if(isset($_POST['ubahproduk'])) {

    // $nama = $_POST['nama_produk'];
    // $harga = $_POST['harga_produk'];
    // $berat = $_POST['berat_produk'];
    // $desc = $_POST['desc_produk'];

    // $upload = $_FILES['file_gambar']['name'];

    //ambil data file
    $namaFile = $_FILES['file_gambar']['name'];
    $lokasi = $_FILES['file_gambar']['tmp_name'];

    //tentukan lokasi file akan dipindahkan
    $dirUpload = "upload/";

    if(!empty($lokasi)) {
        move_uploaded_file($lokasi, $dirUpload.$namaFile);

        $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama_produk]', harga_produk='$_POST[harga_produk]', 
                berat_produk='$_POST[berat_produk]', deskripsi_produk='$_POST[deskripsi_produk]', image_produk='$namaFile'
                WHERE id_produk='$_GET[id]'");
    } else {
        $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama_produk]', harga_produk='$_POST[harga_produk]', 
                berat_produk='$_POST[berat_produk]', deskripsi_produk='$_POST[deskripsi_produk]' 
                WHERE id_produk='$_GET[id]'");
    }
    echo "<script>location='index.php?halaman=produk';</script>";
}           
?>

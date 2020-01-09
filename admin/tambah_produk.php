<?php

// Menambah Produk
if(isset($_POST['addproduk']))
{
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga_produk'];
    $berat = $_POST['berat_produk'];
    $desc = $_POST['desc_produk'];

    $upload = $_FILES['file_gambar']['name'];
    // $ekstensi_diperbolehkan	= array('png','jpg');
    // $x = explode('.', $upload);
	// $ekstensi = strtolower(end($x));
    // $ukuran	= $_FILES['berkas']['size'];

	//ambil data file
	$namaFile = $_FILES['file_gambar']['name'];
    $lokasi = $_FILES['file_gambar']['tmp_name'];

    //tentukan lokasi file akan dipindahkan
    $dirUpload = "upload/";
    
    $query = "INSERT INTO produk (nama_produk, harga_produk, berat_produk, deskripsi_produk, image_produk)
                VALUES ('$nama', '$harga', '$berat', '$desc', '$upload')"; 
    $hasil = mysqli_query($koneksi, $query);

    if($hasil) {
        //upload gambar ke direktori
        move_uploaded_file($lokasi, $dirUpload.$namaFile);
        // echo "<div class='alert alert-info' role='alert'>Produk ditambahkan</div>";
        // echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
        echo "<script>location='index.php?halaman=produk';</script>";
    } else {
        echo 'Gagal';
    }    
}
?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Produk</h6>
        </div>
        <form method="POST" enctype="multipart/form-data">

            <div class="card-body">

                <div class="form-group">
                    <label>Nama Produk </label>
                    <input type="text" name="nama_produk" class="form-control" placeholder="masukkan nama produk"
                        required>
                </div>
                <div class="form-group">
                    <label>Harga (Rp)</label>
                    <input type="number" name="harga_produk" class="form-control" placeholder="masukkan harga" required>
                </div>
                <div class="form-group">
                    <label>Berat Produk (Gram)</label>
                    <input type="number" name="berat_produk" class="form-control" placeholder="masukkan berat produk"
                        required>
                </div>
                <div class="form-group">
                    <label>Deskripsi Produk</label>
                    <!-- <input type="text" name="desc_produk" class="form-control" placeholder="masukkan deskripsi produk"
                        required> -->
                    <textarea name="desc_produk" class="form-control" rows='5' required></textarea>
                </div>

                <div class="form-group">
                    <label>Upload Gambar</label>
                    <input type="file" name="file_gambar" id="upload_image" class="form-control" required>
                </div>

            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                <button type="submit" name="addproduk" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
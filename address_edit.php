<?php
session_start(); 
require_once 'customer/koneksi.php';
include 'includes/header.php';
include 'includes/sidemenu.php';


if($_SESSION['customer']){
$user_login = $_SESSION['customer'];
}

$ambil = $koneksi->query("SELECT * FROM customer WHERE id_customer='$user_login'");
$pecah = $ambil->fetch_assoc();
?>

<link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
<link rel="stylesheet" href="assets/css/profile.css">

<body>

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!--  Traffic  -->
                <!-- UPDATE ADDRESS -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Alamat Saya</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" entype="multipart/form-data">
                                <input type="hidden" name="edit_id_address" value="<?php echo $pecah['id_customer']?>">

                                <div class="form-group">
                                    <label>Nama Penerima</label>
                                    <input type="text" name="edit_nama_penerima"
                                        value="<?php echo $pecah['nama_penerima']?>" class="form-control"
                                        placeholder="Enter Nama Penerima">
                                </div>

                                <div class="form-group">
                                    <label>No. Penerima</label>
                                    <input type="text" name="edit_no_penerima"
                                        value="<?php echo $pecah['no_penerima']?>" class="form-control"
                                        placeholder="Enter No. Penerima">
                                </div>

                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input type="text" name="edit_kecamatan" value="<?php echo $pecah['kecamatan']?>"
                                        class="form-control" placeholder="Enter Kota">
                                </div>

                                <div class="form-group">
                                    <label>Kabupaten</label>
                                    <input type="text" name="edit_kabupaten" value="<?php echo $pecah['kabupaten']?>"
                                        class="form-control" placeholder="Enter Kecamatan">
                                </div>

                                <div class="form-group">
                                    <label>Alamat Lengkap</label>
                                    <input type="text" name="edit_alamat_lengkap"
                                        value="<?php echo $pecah['alamat_lengkap']?>" class="form-control"
                                        placeholder="Enter Alamat Lengkap">
                                </div>

                                <a href="address.php?id=<?php echo $pecah['id_customer'] ?>"
                                    class="btn btn-danger">Cancel</a>
                                <button type="submit" name="address_updatebtn" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


<!-- PHP UPDATE ADDRESS -->
<?php
if(isset($_POST['address_updatebtn']))
{
    $id_customer = $_GET[id];
    $nama_penerima = $_POST['edit_nama_penerima'];
    $no_penerima = $_POST['edit_no_penerima'];
    $kecamatan = $_POST['edit_kecamatan'];
    $kabupaten = $_POST['edit_kabupaten'];
    $alamat_lengkap = $_POST['edit_alamat_lengkap'];



    $koneksi->query("UPDATE customer SET nama_penerima='$nama_penerima', no_penerima='$no_penerima', kecamatan='$kecamatan', kabupaten='$kabupaten', alamat_lengkap='$alamat_lengkap' 
    WHERE id_customer='$id_customer'"); 
    
    if($koneksi){
    $_SESSION['success'] = "Update Alamat Berhasil";
    echo "<script>location='address.php';</script>";
}
else
{
    $_SESSION['status'] = "Update Alamat Tidak Berhasil";
    echo "<script>location='address.php';</script>";
}
}
?>
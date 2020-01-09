<?php

session_start(); 
require_once 'admin/koneksi.php';
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
                <!-- MENAMPILKAN PROFILE -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="container-fluid">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Profile Saya</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id_customer"
                                            value="<?php echo $pecah['id_customer']; ?>">

                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="col">
                                                    <label class="font-weight-bold">Nama Customer</label>
                                                    <input type="text" name="nama_customer"
                                                        value="<?php echo $pecah['nama_customer']; ?>"
                                                        class="form-control">
                                                </div>
                                                <br>    
                                                <div class="form-group">
                                                    <div class="col">
                                                        <label class="font-weight-bold">Email</label>
                                                        <input type="text" name="email_customer"
                                                            value="<?php echo $pecah['email_customer']; ?>"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col">
                                                        <label class="font-weight-bold">No. Handphone</label>
                                                        <input type="text" name="telepon_customer"
                                                            value="<?php echo $pecah['telepon_customer']; ?>"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col">
                                                        <label class="font-weight-bold">Password</label>
                                                        <input type="password" name="password_customer"
                                                            value="<?php echo $pecah['password_customer']; ?>"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <!-- <div class="form-group">
                                                        <div class="col">
                                                            <label>Jenis Kelamin</label><br>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" name="gender" value="Male" class="form-check-input">Male
                                                                </label>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" name="gender" value="Female" class="form-check-input">Female
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div> -->

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="text-center">
                                                        <img src="customer/upload/<?php echo $pecah['image_customer'];?>"
                                                            class="rounded-circle" style="width:200px;height:200px">
                                                        <input type="file" name="foto" id="upload_image">
                                                    </div>
                                                </div>
                                                </hr><br>
                                            </div>
                                            <div style="padding-left:30px" class="text-center">
                                                <button type="submit" name="customer_updatebtn"
                                                    class="btn btn-primary">Simpan</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div>
            </div>
        </div>
    </div>
    <!-- /#right-panel -->
</body>

</html>


<!-- PHP UPDATE PROFILE -->
<?php
if(isset($_POST['customer_updatebtn']))
{
    
    // $id_customer=$_GET[id];
    // $nama_customer = $_POST['nama_customer'];
    // $email_customer = $_POST['email_customer'];
    // $telepon_customer = $_POST['telepon_customer'];
    // $password_customer = $_POST['password_customer'];
    $namafoto=$_FILES['foto']['name'];
    $lokasifoto=$_FILES['foto']['tmp_name'];
    
    $dirUpload = "customer/upload/";

    if(!empty($lokasifoto))
    {
        move_uploaded_file($lokasifoto, $dirUpload.$namafoto);

        $koneksi->query("UPDATE customer SET nama_customer='$_POST[nama_customer]', email_customer='$_POST[email_customer]', 
        telepon_customer='$_POST[telepon_customer]', password_customer='$_POST[password_customer]', image_customer='$namafoto' 
        WHERE id_customer='$_GET[id]'"); 
    }else
    {
        $koneksi->query("UPDATE customer SET nama_customer='$_POST[nama_customer]', email_customer='$_POST[email_customer]', 
        telepon_customer='$_POST[telepon_customer]', password_customer='$_POST[password_customer]' WHERE id_customer='$_GET[id]'"); 
    }
    echo "<script>alert('Anda berhasil Memperbarui Profil');</script>";
    echo "<script>location='profile.php';</script>";
}

?>
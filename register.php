<?php 
require_once 'admin/koneksi.php';

include 'includes/header.php';


if(isset($_POST["registerbtn"])) 
{
    session_start();
    //Menampung value
    $nama_customer = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $email_customer = mysqli_real_escape_string($koneksi, $_POST['email_customer']);
    $pass_customer = mysqli_real_escape_string($koneksi, $_POST['pass_customer']);
    $repass_customer = mysqli_real_escape_string($koneksi, $_POST['repass_customer']);

    //Cek inputan password apakah sama atau tidak
    if($pass_customer == $repass_customer) 
    {
        // $pass_customer = md5($pass_customer);
        $query = "INSERT INTO customer (nama_customer, email_customer, password_customer)
                VALUES ('$nama_customer', '$email_customer', '$pass_customer')";
        mysqli_query($koneksi, $query);
        $_SESSION['status'] = "berhasil";
        // $_SESSION['nama_customer'] = $nama_customer;
        // echo "<div class='alert alert-info'> Register berhasil </div>";
        header("location: login.php");
    } 
    else 
    {
        $_SESSION['status'] = "gagal";

    }
}

?>

<link rel="stylesheet" type="text/css" href="assets/css/login-register.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>
    function notificationme() {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        toastr.warning('Password yang anda inputkan tidak sama!', 'Gagal Register');
    };
</script>




<div class="main">
    <!-- Sign up form -->

    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form">
                        <div class="form-group">
                            <label><i class="zmdi zmdi-account fa fa-user"></i></label>
                            <input type="text" name="nama_lengkap" placeholder="Your Name" required />
                        </div>
                        <div class="form-group">
                            <label><i class="zmdi fa fa-envelope"></i></label>
                            <input type="email" name="email_customer" placeholder="Your Email" required />
                        </div>
                        <div class="form-group">
                            <label><i class="zmdi fa fa-lock"></i></label>
                            <input type="password" name="pass_customer" placeholder="Password" required />
                        </div>
                        <div class="form-group">
                            <label><i class="zmdi fa fa-unlock-alt"></i></label>
                            <input type="password" name="repass_customer" placeholder="Repeat your password" required />
                        </div>
                        <!--   -->
                        <div class="form-group form-button">
                            <input type="submit" name="registerbtn" class="form-submit" value="Register" />
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="assets/image/signup-image.jpg" alt="sing up image"></figure>
                    <a href="login.php" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php     
  include 'includes/footer.php';
?>

<?php

if(isset($_SESSION['status']) && $_SESSION['status'] == 'gagal') {
    echo "<script>notificationme() </script>";
    unset($_SESSION['status']);
  }

?>
<?php

session_start(); 
require_once 'admin/koneksi.php';

include 'includes/header.php';

?>

<link rel="stylesheet" type="text/css" href="assets/css/login-register.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
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
    function notificationout() {
        toastr.warning('Gagal Login!');
    };
</script>

<div class="main">

    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="assets/image/signin-image.jpg" alt="sing up image"></figure>
                    <a href="register.php" class="signup-image-link">Create an account</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Sign in</h2>
                    <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account fa fa-user"></i></label>
                            <input type="text" name="email_cust" id="your_name" placeholder="Email" />
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi fa fa-lock"></i></label>
                            <input type="password" name="pass_cust" id="your_pass" placeholder="Password" />
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="login" id="signin" class="form-submit" value="Log in" />
                        </div>
                    </form>
                    <!-- <div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi fab fa-facebook success"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi fab fa-twitter success"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi fab fa-google danger"></i></a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

</div>

<?php     
  include 'includes/footer.php';
?>

<?php

  if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'failurelogin') {
    echo "<script>notificationout() </script>";
    unset($_SESSION['alert']);
  }

?>


<?php 
if(isset($_POST["login"])) 
{
    $email = $_POST['email_cust'];
    $pass = $_POST['pass_cust'];

    $ambil = $koneksi->query("SELECT * FROM customer WHERE email_customer='$email' AND password_customer='$pass'");
    $akun_login = $ambil->fetch_assoc();
    $login = $ambil->num_rows;

    if($login==1) 
    {
        // $_SESSION["customer"] = $akun_login;
        $_SESSION["customer"] = $akun_login['id_customer'];
        $_SESSION["alert"] = 'successlogin';
        // $_SESSION["email_customer"] = $akun_login['email_customer'];
        // $_SESSION["telepon_customer"] = $akun_login['telepon_customer'];
        // $_SESSION["customer"] = $akun_login['nama_customer'];
        // $_SESSION["nama_customer"] = $akun_login;


        // echo "<script>alert('Anda berhasil login');</script>";
        if (isset($_SESSION['keranjang']) OR !empty ($_SESSION['keranjang'])) 
        {
            echo "<script>location='checkout.php';</script>";    
        } 
        else
        {
            echo "<script>location='index.php';</script>";    
        }
    } 
    else 
    {
        $_SESSION["alert"] = 'failurelogin';
    }
}

?>
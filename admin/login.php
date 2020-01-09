<?php
include('includes/header.php'); 
require_once 'koneksi.php'
?>

<?php

    // if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
    // {
    //     echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
    //     unset($_SESSION['status']);
    // }
?>

<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-6">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                </div>

                <form class="user" method="POST">

                  <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-user"
                      placeholder="Enter Username...">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user"
                      placeholder="Password">
                  </div>

                  <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                  <hr>

                </form>
                <?php              
                  if(isset($_POST['login_btn'])) 
                  {
                    $username = $_POST['username'];
                    $pass = $_POST['password'];
                    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$pass'");
                    $hasil = $query->num_rows;

                    if($hasil==1) {
                      $_SESSION['admin']=$query->fetch_assoc();
                        echo "<div class='alert alert-info'>Login Sukses</div>";
                        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                    } else {
                        echo "<div class='alert alert-danger'>Login Gagal</div>";
                        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                    }
                  }
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>


<?php
include('includes/scripts.php'); 
?>
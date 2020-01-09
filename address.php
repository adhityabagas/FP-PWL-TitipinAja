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
                <!-- MENAMPILKAN ADDRESS -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Alamat Saya</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            if(isset($_SESSION['success']) && $_SESSION['success'] !='')
                                {
                                    echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].'</h2>';
                                    unset($_SESSION['success']);
                                }
                                if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                                {
                                    echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].'</h2>';
                                    unset($_SESSION['status']);
                                }
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Penerima</th>
                                            <th>No. penerima</th>
                                            <th>Kecamatan</th>
                                            <th>Kabupaten</th>
                                            <th>Alamat Lengkap</th>
                                            <th>EDIT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $pecah['nama_penerima'];?></td>
                                            <td><?php echo $pecah['no_penerima'];?></td>
                                            <td><?php echo $pecah['kecamatan'];?></td>
                                            <td><?php echo $pecah['kabupaten'];?></td>
                                            <td><?php echo $pecah['alamat_lengkap'];?></td>
                                            <td>
                                                <a href="address_edit.php?id=<?php echo $pecah['id_customer']; ?>" class="btn btn-success">EDIT</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#right-panel -->
</body>

</html>
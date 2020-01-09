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
                <!-- UPDATE REKENING BANK -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Rekening Bank Saya</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="edit_id_bank" value="<?php echo $pecah['id_customer']?>">

                                <div class="form-group">
                                    <label>Nama Bank</label>
                                    <input type="text" name="edit_nama_bank" value="<?php echo $pecah['nama_bank']?>"
                                        class="form-control" placeholder="Enter Nama Bank">
                                </div>

                                <div class="form-group">
                                    <label>No. Rekening</label>
                                    <input type="text" name="edit_no_rek" value="<?php echo $pecah['no_rek']?>"
                                        class="form-control" placeholder="Enter No. Rekening">
                                </div>

                                <a href="bank.php?id=<?php echo $pecah['id_customer'] ?>" class="btn btn-danger">Cancel</a>
                                <button type="submit" name="bank_updatebtn" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<!-- PHP UPDATE REKENING BANK -->
<?php
if(isset($_POST['bank_updatebtn']))
{
    $id_customer = $_GET[id];
    $nama_bank = $_POST['edit_nama_bank'];
    // $nama_lengkap = $_POST['edit_nama_lengkap'];
    // $wilayah = $_POST['edit_wilayah'];
    // $cabang = $_POST['edit_cabang'];
    $no_rek = $_POST['edit_no_rek'];

    $koneksi->query("UPDATE customer SET nama_bank='$nama_bank', no_rek='$no_rek'
    WHERE id_customer='$id_customer'"); 

    if($koneksi)
    {
        $_SESSION['success'] = "Rekening Bank Berhasil Diupdate";
        echo "<script>location='bank.php';</script>";
      }
      else 
      {
        $_SESSION['status'] = "Rekening Bank Tidak Berhasil Diupdate";
        echo "<script>location='bank.php';</script>";
      }
}

?>
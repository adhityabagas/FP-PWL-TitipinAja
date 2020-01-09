<?php
session_start();

$connection = mysqli_connect("localhost","root","","titipinaja");


// // Rekening Bank
// if(isset($_POST['bankbtn']))
// {
//     $nama_bank = $_POST['nama_bank'];
//     $nama_lengkap = $_POST['nama_lengkap'];
//     $wilayah = $_POST['wilayah'];
//     $cabang = $_POST['cabang'];
//     $no_rek = $_POST['no_rek'];

//         $query = "INSERT INTO bank (nama_bank,nama_lengkap,wilayah,cabang,no_rek) VALUES ('$nama_bank','$nama_lengkap','$wilayah','$cabang','$no_rek')";
//         $query_run = mysqli_query($connection, $query);
    
//         if($query_run)
//         {
//             //echo "Saved";
//             $_SESSION['success'] = "Rekening Berhasil Ditambahkan";
//             header('Location: bank.php');
//         }
//         else
//         {
//             $_SESSION['status'] = "Rekening Tidak Berhasil Ditambahkan";
//             header("Location: bank.php");
//         }
// }

// if(isset($_POST['bank_updatebtn']))
// {
//     $id_bank = $_POST['edit_id_bank'];
//     $nama_bank = $_POST['edit_nama_bank'];
//     $nama_lengkap = $_POST['edit_nama_lengkap'];
//     $wilayah = $_POST['edit_wilayah'];
//     $cabang = $_POST['edit_cabang'];
//     $no_rek = $_POST['edit_no_rek'];

//     $query = "UPDATE bank SET nama_bank='$nama_bank', nama_lengkap='$nama_lengkap', wilayah='$wilayah', cabang='$cabang', no_rek='$no_rek' WHERE id_bank='$id_bank'"; 
//     $query_run = mysqli_query($connection, $query);

//     if($query_run)
//     {
//         //echo "Saved";
//         $_SESSION['success'] = "Update Rekening Berhasil";
//         header('Location: bank.php');
//     }
//     else
//     {
//         $_SESSION['status'] = "Update Rekening Tidak Berhasil";
//         header("Location: bank.php");
//     }
// }

// if(isset($_POST['bank_delete_btn']))
// {
//     $id_bank = $_POST['bank_delete_id'];

//     $query = "DELETE FROM bank WHERE id_bank='$id_bank'";
//     $query_run = mysqli_query($connection, $query);

//     if($query_run)
//     {
//         $_SESSION['success'] = "Rekening Berhasil Dihapus";
//         header('Location: bank.php');
//     }
//     else
//     {
//         $_SESSION['status'] = "Rekening Tidak Berhasil Dihapus";
//         header('Location: bank.php');
//     }
// }

// // Address
// if(isset($_POST['addressbtn']))
// {
//     $nama_penerima = $_POST['nama_penerima'];
//     $no_penerima = $_POST['no_penerima'];
//     $provinsi = $_POST['provinsi'];
//     $kota = $_POST['kota'];
//     $kecamatan = $_POST['kecamatan'];
//     $alamat_lengkap = $_POST['alamat_lengkap'];

    
//         $query = "INSERT INTO address (nama_penerima,no_penerima,provinsi,kota,kecamatan,alamat_lengkap) VALUES ('$nama_penerima','$no_penerima','$provinsi','$kota','$kecamatan','$alamat_lengkap')";
//         $query_run = mysqli_query($connection, $query);
    
//         if($query_run)
//         {
//             //echo "Saved";
//             $_SESSION['success'] = "Alamat Baru Berhasil Ditambahkan";
//             header('Location: address.php');
//         }
//         else
//         {
//             $_SESSION['status'] = "Alamat Baru Tidak Berhasil Ditambahkan";
//             header("Location: address.php");
//         }
// }

// if(isset($_POST['address_updatebtn']))
// {
//     $id_address = $_POST['edit_id_address'];
//     $nama_penerima = $_POST['edit_nama_penerima'];
//     $provinsi = $_POST['edit_provinsi'];
//     $kota = $_POST['edit_kota'];
//     $kecamatan = $_POST['edit_kecamatan'];
//     $alamat_lengkap = $_POST['edit_alamat_lengkap'];



//     $query = "UPDATE address SET nama_penerima='$nama_penerima', provinsi='$provinsi', kota='$kota', kecamatan='$kecamatan', alamat_lengkap='$alamat_lengkap' WHERE id_address='$id_address'"; 
//     $query_run = mysqli_query($connection, $query);

//     if($query_run)
//     {
//         //echo "Saved";
//         $_SESSION['success'] = "Update Alamat Berhasil";
//         header('Location: address.php');
//     }
//     else
//     {
//         $_SESSION['status'] = "Update Alamat Tidak Berhasil";
//         header("Location: address.php");
//     }
// }

// if(isset($_POST['address_delete_btn']))
// {
//     $id_address = $_POST['address_delete_id'];

//     $query = "DELETE FROM address WHERE id_address='$id_address'";
//     $query_run = mysqli_query($connection, $query);

//     if($query_run)
//     {
//         $_SESSION['success'] = "Alamat Berhasil Dihapus";
//         header('Location: address.php');
//     }
//     else
//     {
//         $_SESSION['status'] = "Alamat Tidak Berhasil Dihapus";
//         header('Location: address.php');
//     }
// }


// password
if(isset($_POST['updatepassword']))
{
    $id_customer = $_POST['id_customer'];
    $passlama = $_POST['passlama'];
    $passbaru = $_POST['passbaru'];
    $conpassbaru = $_POST['conpassbaru'];

    $query = "SELECT password_customer FROM customer WHERE id_customer = '$id_customer'";
    $query_run = mysqli_query($connection, $query);

    // $query = "UPDATE customer SET password_customer='$passwordbaru' WHERE password='$id_customer'"; 
 

    while($row = mysqli_fetch_array($query_run))
    {
        $pass = $row['password_customer'];
        if($pass == $passlama)
        {
           if($passbaru == $conpassbaru)
           {
               $q="UPDATE customer SET password_customer='$passbaru' WHERE id_customer='$id_customer'";
               $update = mysqli_query($connection, $q);
           }
           else
           {
            header("Location: profile.php");
           }
        }
        else
        {
            header('Location: address.php');
        }
        
    }
    // else
    // {
    //     header("Location: profile.php");
        
        // //echo "Saved";
        // $_SESSION['success'] = "Update Alamat Berhasil";
        // header('Location: password.php');
    }
    // else
    // {
    //     $_SESSION['status'] = "Update Alamat Tidak Berhasil";
    //     header("Location: password.php");
    // }
// }


// customer update
if(isset($_POST['customer_updatebtn']))
{
    $id_customer = $_POST['edit_id_customer'];
    $nama_customer = $_POST['edit_nama_customer'];
    $email_customer = $_POST['edit_email_customer'];
    $telepon_customer = $_POST['edit_telepon_customer'];
    $password_customer = $_POST['edit_password_customer'];
    $gender = $_POST['gender'];
    $upload = $_FILES['file_gambar']['name'];
    $alamat_lengkap = $_POST['edit_alamat_lengkap'];
    // $query = "SELECT * FROM customer WHERE id_customer='$id_customer'";
    // $query_run = mysqli_query($connection, $query);


    $namaFile = $_FILES['file_gambar']['name'];
    $lokasi = $_FILES['file_gambar']['tmp_name'];

    $dirUpload = "upload/";

    $query = "UPDATE customer SET nama_customer='$nama_customer', email_customer='$email_customer', telepon_customer='$telepon_customer', password_customer='$password_customer', gender='$gender', image_customer='$upload' WHERE id_customer='$id_customer'"; 
    $query_run = mysqli_query($connection, $query);

    if(($query_run))
    {
        move_uploaded_file($lokasi, $dirUpload.$namaFile);
    
    // $query = "UPDATE customer SET nama_customer='$nama_customer', email_customer='$email_customer', telepon_customer='$telepon_customer', password_customer='$password_customer', gender='$gender', image_customer='$upload' WHERE id_customer='$id_customer'"; 
    // // $query_run = mysqli_query($connection, $query);
    
    //     //echo "Saved";
        
        $_SESSION['success'] = "Update Profile Berhasil";
        header('Location: profile.php');
    }
    else
    {
    //     $query = "UPDATE customer SET nama_customer='$nama_customer', email_customer='$email_customer', telepon_customer='$telepon_customer', password_customer='$password_customer', gender='$gender', image_customer='$upload' WHERE id_customer='$id_customer'"; 
    // // $query_run = mysqli_query($connection, $query);
    
        $_SESSION['status'] = "Update Profile Tidak Berhasil";
        header("Location: profile.php");
    }
    echo "<script>location='profile.php';</script>";
}

?>
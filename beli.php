<?php
session_start();
require_once 'admin/koneksi.php';
$id_produk = $_GET['id'];

if(isset($_SESSION['keranjang'][$id_produk])) 
    {
        $_SESSION['keranjang'][$id_produk]+=1;
    }
    else
    {
        $_SESSION['keranjang'][$id_produk]=1;
    } 
    
    echo "<script>location='keranjang.php'</script>";
    
?>
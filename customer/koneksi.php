<?php 
    $koneksi = mysqli_connect("localhost", "root");
    if (!$koneksi) {
        die('Koneksi gagal : ' .mysqli_error());
    }

    mysqli_select_db($koneksi, "titipinaja");
?>

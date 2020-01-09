<?php 
session_start(); 

session_destroy();

session_start(); 
$_SESSION["alert"] = 'successlogout';

// echo "<script>alert('Anda telah keluar');</script>";
echo "<script>location='index.php';</script>";

?>
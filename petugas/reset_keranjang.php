<?php
include('koneksi.php');
session_start();
$_SESSION['cart'] = [];
header('location:penjualan.php')
?>
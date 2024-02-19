<?php
include('koneksi.php');
session_start();



if(isset($_POST['produk'])){
    $id_produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];

    $data = mysqli_query($koneksidb, "SELECT * FROM produk WHERE produk_id = '$id_produk'");
    $b = mysqli_fetch_assoc($data);

     $barang = [
        'produk_id' => $b['produk_id'],
        'nama_produk' => $b['nama_produk'],
        'harga' => $b['harga'],
        'jumlah' => $jumlah
    ];

    $_SESSION['cart'][]=$barang;
    header('location:penjualan.php');
}


  
?>  
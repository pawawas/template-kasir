<?php
include('koneksi.php');
session_start();

$tanggal = date('Y-m-d');
$total = $_POST['total'];
$pelanggan = $_POST['pelanggan'];


mysqli_query($koneksidb, "insert into penjualan (
    penjualan_id,tanggal_penjualan,total_harga,pelanggan_id) values (NULL, '$tanggal','$total',
    '$pelanggan')");

    $id_transaksi = mysqli_insert_id($koneksidb);

    foreach ($_SESSION['cart'] as $key => $value) {
        $id_barang = $value['produk_id'];
        $harga = $value['harga'];
        $jumlah = $value['jumlah'];
        $tot = $harga*$jumlah;

        mysqli_query($koneksidb, "insert into detailpenjualan (
            detail_id, penjualan_id,produk_id,jumlah_produk,subtotal) values (NULL, '$id_transaksi', '$id_barang', 
            '$jumlah', '$tot')");
            $sql = "SELECT * from  produk where produk_id = '$id_barang' ";
                $query = mysqli_query($koneksidb, $sql);
                $result = mysqli_fetch_array($query);
            $stok = $result['stok']-$jumlah;
            
            mysqli_query($koneksidb,  "update produk set stok = '$stok' where produk_id = $id_barang");
        # code...
    }
    $_SESSION['cart'] = [];
    echo "<script type='text/javascript'>
    alert('Transaksi Berhasil.'); 
    document.location = 'penjualan.php';

    </script>";

?>
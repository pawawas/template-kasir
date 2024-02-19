<?php
include('koneksi.php');

$nama	= $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$sql 	= "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama','$harga','$stok')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'produk.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'produk.php'; 
		</script>";

}
?>
<?php
include('koneksi.php');
$id=$_POST['id'];
$nama	= $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$sql 	= "UPDATE produk SET nama_produk='$nama',harga = '$harga', stok= '$stok' where produk_id='$id'";;
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 
			document.location = 'produk.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'edit_produk.php'; 
		</script>";

}
?>
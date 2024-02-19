<?php
include('koneksi.php');
$id=$_POST['id'];
$nama	= $_POST['nama'];
$alamat = $_POST['alamat'];
$nomer_telepon = $_POST['nomer'];
$sql 	= "UPDATE pelanggan SET nama_pelanggan='$nama',alamat = '$alamat', nomor_telepon= '$nomer_telepon' where pelanggan_id='$id'";;
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 
			document.location = 'pelanggan.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'edit_pelanggan.php'; 
		</script>";

}
?>
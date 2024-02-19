<?php
include('koneksi.php');
$nama	= $_POST['nama'];
$password = md5($_POST['password']);
$sql 	= "INSERT INTO user (nama, password,level) VALUES ('$nama','$password','petugas')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'petugas.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
		document.location = 'petugas.php'; 
		</script>";

}
?>
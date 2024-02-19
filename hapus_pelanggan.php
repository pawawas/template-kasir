<?php
include('koneksi.php');
if(isset($_GET['id'])){
	$id	= $_GET['id'];
	$mySql	= "DELETE FROM pelanggan WHERE pelanggan_id='$id'";
	$myQry	= mysqli_query($koneksidb, $mySql);
	echo "<script type='text/javascript'>
			alert('Data berhasil dihapus.'); 
			document.location = 'pelanggan.php'; 
		</script>";
}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'pelanggan.php'; 
		</script>";

}
?>
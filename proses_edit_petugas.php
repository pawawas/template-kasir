<?php
include('koneksi.php');
$id=$_POST['id'];
$nama	= $_POST['nama'];
$password = md5($_POST['password']);

$sql 	= "UPDATE user SET nama='$nama' WHERE user_id ='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 	
			
			document.location = 'petugas.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'edit_petugas.php?id=$id'; 
		</script>";

}
if(isset($_POST['ubah'])){
	$password=md5($_POST['password']);
	
$sql1 = "UPDATE user SET nama='$nama', password='$password' WHERE user_id ='$id'";
	$query1 	= mysqli_query($koneksidb,$sql1);
	if($query1){
		echo "<script type='text/javascript'>
				alert('Berhasil edit data.'); 	
				document.location = 'petugas.php'; 
			</script>";
	
	}else {
		echo "<script type='text/javascript'>
				alert('Terjadi kesalahan, silahkan coba lagi!.'); 
				document.location = 'edit_petugas.php?id=$id'; 
			</script>";
	}
}
?>
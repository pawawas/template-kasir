<?php
session_start();
include('koneksi.php');
if(isset($_POST['login']))
{
$nama=$_POST['nama'];
$password=md5($_POST['password']);
$sql = "SELECT * FROM user WHERE nama='$nama' AND Password='$password'";
$query = mysqli_query($koneksidb,$sql);
$results = mysqli_fetch_array($query);
if(mysqli_num_rows($query)>0){
	if ($results['level']=="petugas") {
		$_SESSION['alogin']=$_POST['nama'];
	echo "<script type='text/javascript'> document.location = 'penjualan.php'; </script>";
	}elseif ($results['level']=="admin") {
		$_SESSION['alogin']=$_POST['nama'];
	echo "<script type='text/javascript'> document.location = '../penjualan.php'; </script>";
	}else{
		echo "<script>alert('Data Login Tidak Valid');</script>";
	}
	
} else{
	echo "<script>alert('Data Login Tidak Valid');</script>";
}
}

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<title>Kasir Niken</title>
	<link rel="stylesheet" href="asset_login/style.css">
	
</head>

<body>
	
<div class="wrapper">
    <form method="post">
        <h1>Login</h1>
        <div class="input-box">
            <input type="text" name="nama" placeholder="Username" required>
            <i class='bx bxs-user-pin' ></i>
        </div>
        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class='bx bxs-lock-alt'></i>
        </div>
        <div class="box">
        <input type="submit" name="login" value="Login" />
        </div>

	
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
<?php
# Konek ke Web Database
$myHost  = "localhost";
$myUser  = "root";
$myPass  = "";
$myDbs  = "kasir";

$koneksidb = mysqli_connect($myHost, $myUser, $myPass, $myDbs);
if (!$koneksidb) {
  echo "Failed Connection !";
}

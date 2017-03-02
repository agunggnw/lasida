<?php
include 'config.php';
include 'Class/DB.php';

$pelanggan = $_POST['pelanggan'];

$pel = new DB('pelanggan');

$fetch = mysql_fetch_array($pel->getOne('No_Pel', $pelanggan));
$val = $fetch['id'];

mysql_query("insert into tagihan values('','$val', ' ', ' ', ' ', ' ', '$ts', '0')");
header("location:tagihan.php?bayar=0");

 ?>
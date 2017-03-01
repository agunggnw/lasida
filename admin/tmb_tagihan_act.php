<?php
include 'config.php';

$pelanggan = $_POST['pelanggan'];
$ts = time();

mysql_query("insert into tagihan values('','$pelanggan', ' ', ' ', ' ', ' ', '$ts', '0')");
header("location:tagihan.php?bayar=0");

 ?>
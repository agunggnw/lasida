<?php
include 'config.php';

$id = $_POST['id'];
$tanggal = strtotime($_POST['tanggal']);
$meteran = $_POST['meteran'];
$jumlah = $_POST['jumlah'];

mysql_query("update tagihan set mKubik='$meteran', jumlah_bayar='$jumlah', ts_bayar='$tanggal', status='1'  where id='$id'")or die (mysql_error());
header("location:tagihan.php?bayar=1");

 ?>
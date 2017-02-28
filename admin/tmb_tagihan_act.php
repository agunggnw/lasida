<?php
include 'config.php';
$noPlgn=$_POST['noPlgn'];
$tahun=$_POST['tahun'];
$nama=$_POST['nama'];
$tglBayar=$_POST['tglBayar'];
$bulan=$_POST['bulan'];
$meteran=$_POST['meteran'];
$jmlTagihan=$_POST['jmlTagihan'];
$jmlBayar=$_POST['jmlBayar'];

$pelanggan = $_POST['pelanggan'];
$mKubik = $_POST['meteran'];
$ts = time();

mysql_query("insert into tagihan values('','$pelanggan', '$mKubik', '$ts', '0')");
header("location:tagihan.php");

 ?>
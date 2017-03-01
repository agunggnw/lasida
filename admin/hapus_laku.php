<?php
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from tagihan where id='$id'");
header("location:tagihan.php?bayar=0");
 ?>

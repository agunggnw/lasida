<?php
include '../config.php';
$uname = $_POST['uname'];
$password = md5($_POST['password']);
if ($_POST['role_id'] == 1) {
	mysql_query("INSERT INTO `admin` (`id`, `uname`, `pass`, `foto`, `role_id`) VALUES (NULL, '$uname', '$password', 'logo.jpg', '1')") or die("Error");
	header("location:../administrator.php?saved=1");
}
if ($_POST['role_id'] == 2) {
	mysql_query("insert into admin values('','$uname', '$password', 'logo.jpg', '2')");
	header("location:../administrator.php?saved=2");
}
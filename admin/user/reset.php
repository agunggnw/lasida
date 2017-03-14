<?php
require_once '../config.php';
$id = $_POST['id'];

if ($_POST['password'] != $_POST['confirm']) {
	header("location:../forgot.php");
} else {
	$password = md5($_POST['password']);
	mysql_query("update admin set pass='$password' where id='$id'")or die (mysql_error());
}

if ($_POST['role'] == 1) {
	header("location:../administrator.php?saved=3");
} else {
	header("location:../forgot.php?saved=3");
}


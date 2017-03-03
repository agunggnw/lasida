<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
	include 'cek.php';
	include 'config.php';
	?>
	<title>PELAYANAN PELANGGAN PDAM</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="http://www.malasngoding.com" class="navbar-brand">PELAYANAN PELANGGAN PDAM TIRTA BENTENG KOTA TANGERANG</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a id="pesan_sedia" href="#" data-toggle="modal" data-target="#modalpesan"><span class='glyphicon glyphicon-comment'></span>  Pesan</a></li>
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hy , <?php echo $_SESSION['uname']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- modal input -->


	<div class="col-md-2">
		<div class="row">
			<?php
			$use=$_SESSION['uname'];
			$fo=mysql_query("select foto from admin where uname='$use'");
			while($f=mysql_fetch_array($fo)){
				?>

				<div class="col-xs-6 col-md-12">
					<a class="thumbnail">
						<img class="img-responsive" src="foto/<?php echo $f['foto']; ?>">
					</a>
				</div>
				<?php
			}
			?>
		</div>

		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>
			<li><a href="pelanggan.php"><span class="glyphicon glyphicon-briefcase"></span>  Pelanggan</a></li>
			<li><a href="tagihan.php?bayar=0"><span class="glyphicon glyphicon-briefcase"></span>  Pembayaran</a></li>
			<li><a href="laporan.php"><span class="glyphicon glyphicon-briefcase"></span>  Laporan</a></li>
			<li><a href="administrator.php"><span class="glyphicon glyphicon-lock"></span> Administrator</a></li>
			<li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>
		</ul>
	</div>
	<div class="col-md-10">

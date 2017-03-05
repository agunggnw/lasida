<?php 
	include 'header.php'; 
	include 'Class/DB.php';

	$per_hal=10;
	$jumlah_record=mysql_query("SELECT COUNT(*) from tagihan");
	$jum=mysql_result($jumlah_record, 0);
	$halaman=ceil($jum / $per_hal);
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$start = ($page - 1) * $per_hal;
?>


<div class="row">
	<div class="col-md-12">
		<p class="lead">Laporan Tagihan</p>
		<hr>
	</div>
	<div class="row">
			<div class="col-md-4">
				<form action="laporan_tagihan_by_nopel.php" method="post">
						<div class="panel panel-default">
						  <div class="panel-heading">Berdasarkan No Pelanggan</div>
						  <div class="panel-body">
						    <input type="text" class="form-control" placeholder="No Pelanggan" name="nopel">
						    <hr>
								<button class="btn btn-primaty" type="submit">Lihat</button>
								<?php 
									if (isset($_GET['stbyno'])) {
										$no = $_GET['no'];
										echo "<a type='submit' href='pdf/laporan_tagihan_pdf.php?stbyno=1&no=$no'	class='btn btn-success'>Cetak</a>";
									}
								?>
						  </div>
						</div>
				</form>
			</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="row" style="margin-top: 50px">
					<?php 
						if (isset($_GET['stbyno'])) {
						include 'laporan_tagihan_stbyno.php';
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
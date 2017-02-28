<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Tagihan</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tagihan Baru</button>
<br/>
<br/>


<?php
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from tagihan");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Tagihan</td>
			<td><?php echo $jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
</div>
<form action="cari_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari .." aria-describedby="basic-addon1" name="cari">
	</div>
</form>
<br/>
<table class="table">
	<tr>
		<th>No</th>
		<th>No. Pelanggan</th>
		<th>Nama Pelanggan</th>
		<th>Tanggal Bayar</th>
		<th>Bulan </th>
		<th>Meteran </th>
		<th>Jumlah Bayar</th>
		<th>Status</th>
		<th>Opsi</th>
	</tr>
	<?php
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from tagihan where Nama like '%$cari%' or No_Pel like '%$cari%	'");
	}else{
		$brg=mysql_query("select * from tagihan limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<?php 
				$params = $b['id_pelanggan']; 
				$sql = mysql_query("select * from pelanggan where id = '$params'");
				while($val=mysql_fetch_array($sql)){ ?>
				<td><?php echo $val['No_Pel']; ?></td>
				<td><?php echo $val['Nama']; ?></td>
			<td><?php echo date('d', $b['timestamps']) ?></td>
			<td><?php echo date('F', $b['timestamps']) ?></td>
			<td><?php echo $b['mKubik'] ?></td>
			<td><?php echo "Rp.".number_format($b['mKubik']*12000).",-" ?></td>
			<?php
				}
			?>
			<td><?php 
				if ($b['status'] != 1) {
					echo "Belum dibayar";
				} else {
					echo "Sudah dibayar";
				}
			 ?></td>
			<td>
				<a href="det_tagihan
				.php?id=<?php echo $b['id']; ?>" class="btn btn-info">Detail</a>
				<a href="edit_laku.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_laku.php?id=<?php echo $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>

		<?php
	}
	?>
	<tr>
		<td colspan="7">Total Pemasukan</td>
		<?php
		if(isset($_GET['tanggal'])){
			$tanggal=mysql_real_escape_string($_GET['tanggal']);
			$x=mysql_query("select sum(total_harga) as total from tagihan where tanggal='$tanggal'");
			$xx=mysql_fetch_array($x);
			echo "<td><b> Rp.". number_format($xx['total']).",-</b></td>";
		}else{

		}

		?>
	</tr>
	<tr>
		<td colspan="7">Total Laba</td>
		<?php
		if(isset($_GET['tanggal'])){
			$tanggal=mysql_real_escape_string($_GET['tanggal']);
			$x=mysql_query("select sum(laba) as total from tagihan where tanggal='$tanggal'");
			$xx=mysql_fetch_array($x);
			echo "<td><b> Rp.". number_format($xx['total']).",-</b></td>";
		}else{

		}

		?>
	</tr>
</table><ul class="pagination">
			<?php
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>
		</ul>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Tagihan Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_tagihan_act.php" method="post">
					<div class="form-group">
						<label>No Pelanggan</label>
						<select type="submit" name="pelanggan" class="form-control" onchange="submit">
							<option>No Pelanggan ..</option>
							<?php
							$pil=mysql_query("select * from pelanggan");
							while($p=mysql_fetch_array($pil)){
								?>
								<option value="<?php echo $p['id'] ?>"><?php echo $p['No_Pel']." a.n ".$p['Nama'] ?></option>
								<?php
							} 
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Meteran</label>
						<input name="meteran" type="text" class="form-control" placeholder="Meteran Baru..">
					</div>
					<div class="form-group">
					<label>Jumlah Tagihan</label>
						<input name="jmlTagihan" type="text" class="form-control" placeholder="Jumlah Bayar ..">
				</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
			</form>
		</div>
	</div>
</div>
</div>



<?php
include 'footer.php';
?>

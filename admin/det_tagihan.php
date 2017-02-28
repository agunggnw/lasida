<?php
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Tagihan</h3>
<a class="btn" href="tagihan.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_brg=mysql_real_escape_string($_GET['id']);


$det=mysql_query("select * from tagihan where id='$id_brg'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>
	<table class="table">
		<tr>
			<td>No. Pelanggan</td>
			<td><?php echo $d['No_Pel']; ?></td>
		</tr>
		<tr>
			<td>Nama Pelanggan</td>
			<td><?php echo $d['Nama']; ?></td>
		</tr>
		<tr>
			<td>No Telepon</td>
			<td><?php echo $d['Telp']; ?></td>
		</tr>
		<tr>
			<td>No. KTP</td>
			<td><?php echo $d['No_Ktp']; ?></td>
		</tr>
		<tr>
			<td>No. Kartu Keluarga</td>
			<td><?php echo $d['No_KK']; ?></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td><?php echo $d['Gender']; ?></td>
		</tr>
		<tr>
			<td>Kecamatan</td>
			<td><?php echo $d['Kecamatan']; ?></td>
		</tr>
		<tr>
			<td>Kelurahan</td>
			<td><?php echo $d['Kelurahan']; ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><?php echo $d['Alamat']; ?></td>
		</tr>
		<tr>
			<td>Status</td>
			<td><?php echo $d['Status']; ?></td>
		</tr>
	</table>
	<?php
}
?>
<?php include 'footer.php'; ?>

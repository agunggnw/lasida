<!-- modal input -->
<div id="tambahTagihan" class="modal fade">
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
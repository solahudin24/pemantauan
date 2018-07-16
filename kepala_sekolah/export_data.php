<?php
require( '../koneksi.php' );
$link = koneksi_db();
		?>
		<form action="export.php" method="POST" onSubmit="return confirm('Apakah anda yakin ingin menyimpan data?');" enctype="multipart/form-data">
			<input type="hidden" name="nuptk" value="<?php echo $row['nuptk']; ?>">
			<div class="form-group">
				<label for="password_lama">Tingkatan :</label>
				<select name="target">
					<option value="SDLB">SDLB </option>
					<option value="SMPLB">SMPLB </option>
					<option value="SMALB">SMALB </option>
				</select>
			</div>
			<div class="form-group">
				<label for="pass_baru">Tahun :</label>
				<select name="tahun">
					<option value="2018">2018 </option>
				</select>
			</div>
			<div class="form-group">
				<label for="pass_baru">Bulan :</label>
				<select name="tahun">
					<option value="2018">2018 </option>
				</select></div>
			<div>
			<button type="submit" class="btn btn-primary" name="submit">Export</button>
			</div>
		</form>

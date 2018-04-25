<!--
<script type="text/javascript">
	function cek() {
		var msg = confirm( "Apakah anda yakin ingin menyimpan data?" );
		if ( msg == true ) {
			window.location = "contoh.html";
		} else {
			window.location = "contoh1.html";
		}
	}
</script>
-->

<?php
require('../koneksi.php');
$link = koneksi_db();
if (isset($_POST[ 'idx' ])  ) {
	$nuptk = $_POST[ 'idx' ];
	$query = "SELECT * FROM tb_guru WHERE nuptk = $nuptk";
	$res = mysqli_query( $link, $query );
	while ( $row = mysqli_fetch_assoc( $res ) ) {
		?>
		<form action="proses_edit_data_guru.php" method="POST" onSubmit="return confirm('Apakah anda yakin ingin menyimpan data?');">
			<div class="form-group">
				<label for="nuptk">NUPTK:</label>
				<input type="text" class="form-control" name="nuptk" value="<?php echo $row['nuptk']; ?>">
			</div>
			<div class="form-group">
				<label for="nip">NIP:</label>
				<input type="text" class="form-control" name="nip" value="<?php echo $row['nip']; ?>">
			</div>
			<div class="form-group">
				<label for="nama">Nama Guru:</label>
				<input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
			</div>
			<div class="form-group">
				<label for="tempat_lahir">Tempat Lahir:</label>
				<input type="text" class="form-control" name="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>">
			</div>
			<div class="form-group">
				<label for="tanggal_lahir">Tanggal Lahir:</label>
				<input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>">
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>">
			</div>
			<!--                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#konfirmasi2">Simpan</button>-->
			<button type="submit" class="btn btn-primary">Simpan</button>
			<button type="reset" class="btn btn-primary">Reset</button>
		</form>



		<?php
	}
}else if(isset($_POST['rowid'])){
	$nis = $_POST[ 'rowid' ];
	$query = "SELECT * FROM tb_siswa WHERE nis = $nis";
	$res = mysqli_query( $link, $query );
	while ( $row = mysqli_fetch_assoc( $res ) ) {
		?>
		<form action="proses_edit_data_siswa.php" method="POST" onSubmit="return confirm('Apakah anda yakin ingin menyimpan data?');">
			<div class="form-group">
				<label for="nis">NIS:</label>
				<input type="text" class="form-control" name="nis" value="<?php echo $row['nis']; ?>">
			</div>
			<div class="form-group">
				<label for="nama">Nama Siswa:</label>
				<input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
			</div>
			<div class="form-group">
				<label for="alamat">Alamat:</label>
				<input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat']; ?>">
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>">
			</div>
			
			<!--                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#konfirmasi2">Simpan</button>-->
			<button type="submit" class="btn btn-primary">Simpan</button>
			<button type="reset" class="btn btn-primary">Reset</button>
		</form>



		<?php
	}
}
?>
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
include "koneksi.php";
if ( $_POST[ 'idx' ] ) {
	$nuptk = $_POST[ 'idx' ];
	$link = koneksi_db();
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
				<label for="nama">Nama Guru:</label>
				<input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
			</div>
			<div class="form-group">
				<label for="mengajar">Mengajar:</label>
				<input type="text" class="form-control" name="mengajar" value="<?php echo $row['tugas_mengajar']; ?>">
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>">
			</div>
			<!--                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#konfirmasi2">Simpan</button>-->
			<button type="submit" class="btn btn-primary" >Simpan</button>
			<button type="reset" class="btn btn-primary">Reset</button>
</form>



			<?php } }
?>
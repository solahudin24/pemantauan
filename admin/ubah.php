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
				<input type="text" class="form-control" readonly name="nuptk" value="<?php echo $row['nuptk']; ?>">
			</div>
			<div class="form-group">
				<label for="nama">Nama Guru:</label>
				<input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>">
			</div>
			<!--                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#konfirmasi2">Simpan</button>-->
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
		

		<?php
	}
}else if(isset($_POST['nis'])){
	$nis=$_POST['nis'];
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
		</form>



		<?php
	}
}else if(isset($_POST['id_orangtua'])){
	$id_orangtua=$_POST['id_orangtua'];
	$query = "SELECT * FROM tb_orangtua WHERE id_orangtua = $id_orangtua";
	$res = mysqli_query( $link, $query );
	while ( $row = mysqli_fetch_assoc( $res ) ) {
		?>
		<form action="proses_edit_data_orangtua.php" method="POST" onSubmit="return confirm('Apakah anda yakin ingin menyimpan data?');">
			<div class="form-group">
				<label for="nis">Id Orangtua :</label>
				<input type="text" class="form-control" name="id_orangtua" value="<?php echo $row['id_orangtua']; ?>">
			</div>
			<div class="form-group">
				<label for="nama">Nama Orangtua:</label>
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
		</form>



		<?php
	}
}else if(isset($_POST['id_kelas'])){
	$id_kelas=$_POST['id_kelas'];
	$query = "SELECT * FROM tb_kelas WHERE id_kelas = $id_kelas";
	$res = mysqli_query( $link, $query );
	while ( $row = mysqli_fetch_assoc( $res ) ) {
		?>
		<form action="proses_edit_data_kelas.php" method="POST" onSubmit="return confirm('Apakah anda yakin ingin menyimpan data?');">
			<div class="form-group">
				<label for="nis">Id Kelas :</label>
				<input type="text" class="form-control" name="id_kelas" value="<?php echo $row['id_kelas']; ?>">
			</div>
			<div class="form-group">
				<label for="nama">Kelas:</label>
				<input type="text" class="form-control" name="Kelas" value="<?php echo $row['Kelas']; ?>">
			</div>
			<div class="form-group">
				<label for="alamat">Tingkatan:</label>
				<input type="text" class="form-control" name="tingkatan" value="<?php echo $row['tingkatan']; ?>">
			</div>
			<div class="form-group">
				<label for="password">Jam Masuk:</label>
				<input type="text" class="form-control" name="jam_masuk" value="<?php echo $row['jam_masuk']; ?>">
			</div>
			<div class="form-group">
				<label for="password">Jam Keluar:</label>
				<input type="text" class="form-control" name="jam_keluar" value="<?php echo $row['jam_keluar']; ?>">
			</div>
			
			<!--                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#konfirmasi2">Simpan</button>-->
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>



		<?php
	}
}else if(isset($_POST['kode_jabatan'])){
	$kode_jabatan=$_POST['kode_jabatan'];
	$query = "SELECT * FROM tb_jabatan WHERE kode_jabatan = $kode_jabatan";
	$res = mysqli_query( $link, $query );
	while ( $row = mysqli_fetch_assoc( $res ) ) {
		?>
		<form action="proses_edit_data_jabatan.php" method="POST" onSubmit="return confirm('Apakah anda yakin ingin menyimpan data?');">
			<div class="form-group">
				<label for="nis">Kode Jabatan :</label>
				<input type="text" class="form-control" name="kode_jabatan" value="<?php echo $row['kode_jabatan']; ?>">
			</div>
			<div class="form-group">
				<label for="nama">Nama Jabatan:</label>
				<input type="text" class="form-control" name="nama_jabatan" value="<?php echo $row['nama_jabatan']; ?>">
			</div>
			
			<!--                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#konfirmasi2">Simpan</button>-->
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>



		<?php
	}
}
?>
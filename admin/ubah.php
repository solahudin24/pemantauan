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
require( '../koneksi.php' );
$link = koneksi_db();
if ( isset( $_POST[ 'idx' ] ) ) {
	$nuptk = $_POST[ 'idx' ];
	$query = "SELECT * FROM tb_guru WHERE nuptk = $nuptk";
	$res = mysqli_query( $link, $query );
	while ( $row = mysqli_fetch_assoc( $res ) ) {
		?>
		<form action="proses_edit_data_guru.php?nuptk=<?php echo $nuptk; ?>" method="POST" onSubmit="return confirm('Apakah anda yakin ingin menyimpan data?');" enctype="multipart/form-data">
			<div class="form-group">
				<label for="nuptk">NUPTK:</label>
				<input type="text" class="form-control" readonly name="nuptk" value="<?php echo $row['nuptk']; ?>">
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
				<label for="password">Password:</label>
				<input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>">
			</div>
			<div class="form-group">
				<label for="tempat_lahir">Tempat Lahir:</label>
				<input type="text" class="form-control" name="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>" required>
			</div>
			<div class="form-group">
				<label for="tgl_lahir">Tanggal Lahir:</label>
				<input type="date" class="form-control" name="tgl_lahir" value="<?php echo $row['tgl_lahir']; ?>" required>
			</div>
			<div class="form-group">
				<label for="id_kelas">Kelas:</label>
				<select name="id_kelas" class="form-control">
					<?php
					//								$link = koneksi_db();
					$sql = "SELECT * FROM tb_kelas";
					$res = mysqli_query( $link, $sql );
					while ( $data_kelas = mysqli_fetch_array( $res ) ) {
						?>
					<option value="<?php echo $data_kelas['id_kelas']; ?>" <?php if($row['id_kelas']==$data_kelas['id_kelas']){ echo "selected"; } ?> >
						<?php echo $data_kelas['kelas']." ".$data_kelas['tingkatan']; ?>
					</option>
					<?php
					}
					//								$link -> close();
					?>

				</select>
			</div>
			<div class="form-group">
				<label for="id_jabatan">Jabatan:</label>
				<select name="id_jabatan" class="form-control">
					<?php
					//								$link = koneksi_db();
					$sql = "SELECT * FROM tb_jabatan";
					$res = mysqli_query( $link, $sql );
					while ( $data_jabatan = mysqli_fetch_array( $res ) ) {
						?>
					<option value="<?php echo $data_jabatan['kode_jabatan']; ?>" <?php if($row['kode_jabatan']==$data_jabatan['kode_jabatan']){ echo "selected"; } ?>>
						<?php echo $data_jabatan['nama_jabatan']; ?>
					</option>
					<?php
					}
					//								$link -> close();
					?>

				</select>
			</div>
			<div class="form-group">
				<label for="foto">Foto:</label>
				<input type="file" class="form-control" name="foto" >
			</div>
			<button type="submit" class="btn btn-primary" name="submit">Simpan</button>
		</form>


		<?php
	}
} else if ( isset( $_POST[ 'nis' ] ) ) {
	$nis = $_POST[ 'nis' ];
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
} else if ( isset( $_POST[ 'id_orangtua' ] ) ) {
	$id_orangtua = $_POST[ 'id_orangtua' ];
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
} else if ( isset( $_POST[ 'id_kelas' ] ) ) {
	$id_kelas = $_POST[ 'id_kelas' ];
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
} else if ( isset( $_POST[ 'kode_jabatan' ] ) ) {
	$kode_jabatan = $_POST[ 'kode_jabatan' ];
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
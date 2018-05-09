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
				<input type="text" class="form-control" readonly name="nuptk" value="<?php echo $row['nuptk']; ?>" required>
			</div>
			<div class="form-group">
				<label for="nip">NIP:</label>
				<input type="text" class="form-control" name="nip" value="<?php echo $row['nip']; ?>" required>
			</div>
			<div class="form-group">
				<label for="nama">Nama Guru:</label>
				<input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>" required>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>" required>
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
			<div class="form-group">
				<label for="status">Status:</label>
				<select name="status" class="form-control">
				<option value="<?php echo $row['status']; echo "selected"; ?>">
				<?php
					if ($row['status']==0) {
						echo "Aktif";
					}else {
						echo "Tidak Aktif";
					}
				?>
				</option>
				<?php
					if ($row['status']==0) {
						echo "<option value='1'>Tidak Aktif";
					}else {
						echo "<option value='0'>Aktif";
					}
				?>
				</option>
				</select>
			</div>
			<div>
			<button type="submit" class="btn btn-primary" name="submit">Simpan</button>
			</div>
		</form>


		<?php
	}
} else if ( isset( $_POST[ 'nis' ] ) ) {
	$nis = $_POST[ 'nis' ];
	$query = "SELECT * FROM tb_siswa WHERE nis = $nis";
	$res = mysqli_query( $link, $query );
	while ( $row = mysqli_fetch_assoc( $res ) ) {
		?>
		<form action="proses_edit_data_siswa.php?nis=<?php echo $nis; ?>" method="POST" onSubmit="return confirm('Apakah anda yakin ingin menyimpan data?');" enctype="multipart/form-data">
			<div class="form-group">
				<label for="nuptk">NIS:</label>
				<input type="text" class="form-control" readonly name="nis" value="<?php echo $row['nis']; ?>" required>
			</div>
			<div class="form-group">
				<label for="nama">Nama Siswa:</label>
				<input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>" required>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>" required>
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
				<label for="id_orangtua">Orangtua:</label>
				<select name="id_orangtua" class="form-control">
					<?php
					//								$link = koneksi_db();
					$sql = "SELECT * FROM tb_orangtua where Status='0'";
					$res = mysqli_query( $link, $sql );
					while ( $data_orangtua = mysqli_fetch_array( $res ) ) {
						?>
					<option value="<?php echo $data_orangtua['id_orangtua']; ?>" <?php if($row['id_orangtua']==$data_orangtua['id_orangtua']){ echo "selected"; } ?>>
						<?php echo $data_orangtua['nama']; ?>
					</option>
					<?php
					}
					//								$link -> close();
					?>

				</select>
			</div>
			<div class="form-group">
				<label for="nuptk">Guru:</label>
				<select name="nuptk" class="form-control">
					<?php
					//								$link = koneksi_db();
					$sql = "SELECT * FROM tb_guru where Status='0'";
					$res = mysqli_query( $link, $sql );
					while ( $data_guru = mysqli_fetch_array( $res ) ) {
						?>
					<option value="<?php echo $data_guru['nuptk']; ?>" <?php if($row['nuptk']==$data_guru['nuptk']){ echo "selected"; } ?>>
						<?php echo $data_guru['nama']; ?>
					</option>
					<?php
					}
					//								$link -> close();
					?>

				</select>
			</div>
			<div class="form-group">
                 <label for="alamat">Alamat :</label>
                       <textarea class="form-control" rows="3" name="alamat"><?php echo $row['alamat'];?></textarea>
            </div>
			<div class="form-group">
				<label for="foto">Foto:</label>
				<input type="file" class="form-control" name="foto" >
			</div>
			<div class="form-group">
				<label for="status">Status:</label>
				<select name="status" class="form-control">
				<option value="<?php echo $row['status']; echo "selected"; ?>">
				<?php
					if ($row['status']==0) {
						echo "Aktif";
					}else {
						echo "Tidak Aktif";
					}
				?>
				</option>
				<?php
					if ($row['status']==0) {
						echo "<option value='1'>Tidak Aktif";
					}else {
						echo "<option value='0'>Aktif";
					}
				?>
				</option>
				</select>
			</div>
			<div>
			<button type="submit" class="btn btn-primary" name="submit">Simpan</button>
			</div>
		</form>


		<?php
	}
} else if ( isset( $_POST[ 'id_orangtua' ] ) ) {
	$id_orangtua = $_POST[ 'id_orangtua' ];
	$query = "SELECT * FROM tb_orangtua WHERE id_orangtua = '$id_orangtua'";
	$res = mysqli_query( $link, $query );
	while ( $row = mysqli_fetch_assoc( $res ) ) {
		?>
		<form action="proses_edit_data_orangtua.php?id_orangtua=<?php echo $id_orangtua; ?>" method="POST" onSubmit="return confirm('Apakah anda yakin ingin menyimpan data?');" enctype="multipart/form-data">
			<div class="form-group">
				<label for="id_orangtua">Id Orangtua:</label>
				<input type="text" class="form-control" readonly name="id_orangtua" value="<?php echo $row['id_orangtua']; ?>" required>
			</div>
			<div class="form-group">
				<label for="nama">Nama Orangtua:</label>
				<input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>" required>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>" required>
			</div>
			<div class="form-group">
                 <label for="alamat">Alamat :</label>
                       <textarea class="form-control" rows="3" name="alamat"><?php echo $row['alamat'];?></textarea>
            </div>
            <div class="form-group">
                 <label for="no_telp">Nomor Telepon :</label>
                       <input type="text" class="form-control" name="no_telp" value= "<?php echo $row['no_telp']; ?>">
            </div>
			<div class="form-group">
				<label for="foto">Foto:</label>
				<input type="file" class="form-control" name="foto" >
			</div>
			<div class="form-group">
				<label for="status">Status:</label>
				<select name="status" class="form-control">
				<option value="<?php echo $row['status']; echo "selected"; ?>">
				<?php
					if ($row['status']==0) {
						echo "Aktif";
					}else {
						echo "Tidak Aktif";
					}
				?>
				</option>
				<?php
					if ($row['status']==0) {
						echo "<option value='1'>Tidak Aktif";
					}else {
						echo "<option value='0'>Aktif";
					}
				?>
				</option>
				</select>
			</div>
			<div>
			<button type="submit" class="btn btn-primary" name="submit">Simpan</button>
			</div>
		</form>


		<?php
	}
} else if ( isset( $_POST[ 'id_kelas' ] ) ) {
	$id_kelas = $_POST[ 'id_kelas' ];
	$query = "SELECT * FROM tb_kelas WHERE id_kelas = '$id_kelas'";
	$res = mysqli_query( $link, $query );
	while ( $row = mysqli_fetch_assoc( $res ) ) {
		?>
		<form action="proses_edit_data_kelas.php?id_kelas=<?php echo $id_kelas; ?>" method="POST" onSubmit="return confirm('Apakah anda yakin ingin menyimpan data?');" enctype="multipart/form-data">
			<div class="form-group">
				<label for="nis">Id Kelas :</label>
				<input type="text" class="form-control" readonly name="id_kelas" value="<?php echo $row['id_kelas']; ?>">
			</div>
			<div class="form-group">
				<label for="nama">Kelas:</label>
				<input type="text" class="form-control" name="kelas" value="<?php echo $row['kelas']; ?>">
			</div>
			<div class="form-group">
				<label for="alamat">Tingkatan:</label>
				<select class="form-control" name='tingkatan'>
				<?php if ($row['tingkatan']=='SDLB') {
					echo "<option value='SDLB' selected>SDLB</option>";
                    echo "<option value='SMPLB'>SMPLB</option>";
                    echo "<option value='SMALB'>SMALB</option>";
				}else if ($row['tingkatan']=='SMPLB') {
					echo "<option value='SDLB'>SDLB</option>";
                    echo "<option value='SMPLB' selected>SMPLB</option>";
                    echo "<option value='SMALB'>SMALB</option>";
				} else if ($row['tingkatan']=='SMALB') {
					echo "<option value='SDLB'>SDLB</option>";
                    echo "<option value='SMPLB'>SMPLB</option>";
                    echo "<option value='SMALB' selected>SMALB</option>";
				}?>
				</select>
			</div>
			<div class="form-group">
				<label for="password">Jam Masuk:</label>
				<input type="text" class="form-control" name="jam_masuk" value="<?php echo $row['jam_masuk']; ?>">
			</div>
			<div class="form-group">
				<label for="password">Jam Keluar:</label>
				<input type="text" class="form-control" name="jam_keluar" value="<?php echo $row['jam_keluar']; ?>">
			</div>
			<div>
			<button type="submit" class="btn btn-primary" name="submit">Simpan</button>
			</div>
		</form>


		<?php
	}
} else if ( isset( $_POST[ 'kode_jabatan' ] ) ) {
	$kode_jabatan = $_POST[ 'kode_jabatan' ];
	$query = "SELECT * FROM tb_jabatan WHERE kode_jabatan = '$kode_jabatan'";
	$res = mysqli_query( $link, $query );
	while ( $row = mysqli_fetch_assoc( $res ) ) {
		?>
		<form action="proses_edit_data_jabatan.php?kode_jabatan=<?php echo $kode_jabatan; ?>" method="POST" onSubmit="return confirm('Apakah anda yakin ingin menyimpan data?');" enctype="multipart/form-data">
			<div class="form-group">
				<label for="kode_jabatan">Kode Jabatan:</label>
				<input type="text" class="form-control" readonly name="kode_jabatan" value="<?php echo $row['kode_jabatan']; ?>" required>
			</div>
			<div class="form-group">
				<label for="nama_jabatan">Nama Jabatan:</label>
				<input type="text" class="form-control" name="nama_jabatan" value="<?php echo $row['nama_jabatan']; ?>" required>
			</div>
			<div>
			<button type="submit" class="btn btn-primary" name="submit">Simpan</button>
			</div>
		</form>


		<?php
	}
}
?>
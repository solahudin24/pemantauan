<?php
session_start();
include "../koneksi.php";
if ( isset( $_POST[ 'submit' ] ) ) {
	$nuptk = $_POST[ 'nuptk' ];
	$nama = $_POST[ 'nama' ];
	$password = $_POST[ 'password' ];
	if ( empty( $nuptk ) ) {
		$_SESSION[ 's_pesan' ] = "NUPTK Tidak Boleh Kosong!";
		?>
		<script language="javascript">
			document.location.href = "home_admin.php?tampil=guru";
		</script>
		<?php
	} elseif ( empty( $nama ) ) {
		$_SESSION[ 's_pesan' ] = "Nama Tidak Boleh Kosong!";
		?>
			<script language="javascript">
				document.location.href = "home_admin.php?tampil=guru";
			</script>
		<?php
	} elseif ( empty( $password ) ) {
		$_SESSION[ 's_pesan' ] = "Password Tidak Boleh Kosong!";
		?>
				<script language="javascript">
					document.location.href = "home_admin.php?tampil=guru";
				</script>
		<?php
	} else {
		$link = koneksi_db();
		$query = "insert into tb_guru (nuptk,nama,password) values ('$nuptk','$nama','$password');";
		$res = mysqli_query( $link, $query );

		if ( $res ) {
			$_SESSION[ 's_pesan' ] = "Data Berhasil Disimpan!"
			?>
					<script language="javascript">
						document.location.href = "home_admin.php?tampil=guru";
					</script>
			<?php
		} else {
			$_SESSION[ 's_pesan' ] = "Data Gagal Disimpan!"
			?>
					<script language="javascript">
						document.location.href = "home_admin.php?tampil=guru";
					</script>
			<?php
		}
		$link->close();
	}
}
?>
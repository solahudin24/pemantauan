<?php
session_start();
include "../koneksi.php";
$link = koneksi_db();
if ( isset( $_POST[ 'submit' ] ) ) {
	$nuptk = $_POST[ 'nuptk' ];
	$nip = $_POST[ 'nip' ];
	$nama_guru = $_POST[ 'nama' ];
	$password = $_POST[ 'password' ];
	$tempat_lahir = $_POST[ 'tempat_lahir' ];
	$tgl_lahir = $_POST[ 'tgl_lahir' ];
	$id_kelas = $_POST[ 'id_kelas' ];
	$id_jabatan = $_POST[ 'id_jabatan' ];

	$time = time();
	$nama = $_FILES[ 'foto' ][ 'name' ];
	$error = $_FILES[ 'foto' ][ 'error' ];
	$size = $_FILES[ 'foto' ][ 'size' ];
	$tmp_name = $_FILES[ 'foto' ][ 'tmp_name' ];
	$type = $_FILES[ 'foto' ][ 'type' ];
	$format = pathinfo( $nama, PATHINFO_EXTENSION );
	

	if ( $error == 0 || $error == 4 ) {
		if ( $size < 5000000 ) {
			if ( $format == "jpg" || $format == "png" || $format == "jpeg" || $format == "JPG" || $format == "PNG" || $format == "JPEG" || $format == "" ) {

				if ( $error == 4 ) {
					$nama1 = "foto-default.jpg";
				} else {
					$format2 = "." . $format;
					$namafile = "../images/guru/" . $nama;
					$namafile = str_replace( $format2, "", $namafile );
					$namafile = $namafile . "_" . $time . $format2;
					move_uploaded_file( $tmp_name, $namafile );
					$nama1 = str_replace( $format2, "", $nama );
					$nama1 = $nama1 . "_" . $time . $format2;
				}


				$sql = "insert into tb_guru values ('$nuptk','$nip','$nama1', '$nama_guru', '$tempat_lahir','$tgl_lahir', '$id_jabatan','$password',NULL,NULL,'0','$id_kelas');";
				$res = mysqli_query( $link, $sql );

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

			} else {
				$_SESSION[ 's_pesan' ] = "format harus berbentuk JPG/PNG/JPEG";
				?>
				<script language="javascript">
					document.location.href = "home_admin.php?tampil=guru";
				</script>
				<?php
			}
		} else {
			$_SESSION[ 's_pesan' ] = "size file terlalu besar";
			?>
			<script language="javascript">
				document.location.href = "home_admin.php?tampil=guru";
			</script>
			<?php
		}
	} else {
		$_SESSION[ 's_pesan' ] = "ada error";

		?>
		<script language="javascript">
			document.location.href = "home_admin.php?tampil=guru";
		</script>
		<?php
	}
} else {
	?>
	<script language="javascript">
		document.location.href = "home_admin.php?tampil=guru";
	</script>
	<?php
}
?>
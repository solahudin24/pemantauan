<?php
session_start();
include "../koneksi.php";
$link = koneksi_db();
if ( isset( $_POST[ 'submit' ] ) ) {
	$nuptk = $_POST[ 'nuptk' ];

	$sql_ambil_foto = "select * from tb_guru where nuptk='$nuptk';";
	$res_ambil_foto = mysqli_query( $link, $sql_ambil_foto );
	$data_ambil_foto = mysqli_fetch_array( $res_ambil_foto );

	$nip = $_POST[ 'nip' ];
	$nama_guru = $_POST[ 'nama' ];
	$password = $_POST[ 'password' ];
	$tempat_lahir = $_POST[ 'tempat_lahir' ];
	$tgl_lahir = $_POST[ 'tgl_lahir' ];
	$id_kelas = $_POST[ 'id_kelas' ];
	$id_jabatan = $_POST[ 'id_jabatan' ];
	$status=$_POST['status'];
	
	$time = time();
	$nama = $_FILES[ 'foto' ][ 'name' ];
	$error = $_FILES[ 'foto' ][ 'error' ];
	$size = $_FILES[ 'foto' ][ 'size' ];
	$tmp_name = $_FILES[ 'foto' ][ 'tmp_name' ];
	$type = $_FILES[ 'foto' ][ 'type' ];
	$format = pathinfo( $nama, PATHINFO_EXTENSION );
	echo $error;
	echo $format;

	if ( $error == 0 || $error == 4 ) {
		if ( $size < 5000000 ) {
			if ( $format == "jpg" || $format == "png" || $format == "jpeg" || $format == "JPG" || $format == "PNG" || $format == "JPEG" || $format == "" ) {

				if ( $error == 4 ) {
					$sql = "UPDATE `tb_guru` SET `nuptk`='$nuptk',`nip`='$nip',`nama`='$nama_guru',`tempat_lahir`='$tempat_lahir',`tgl_lahir`='$tgl_lahir',`kode_jabatan`='$id_jabatan',`password`='$password',`id_kelas`='$id_kelas',status = '$status' WHERE nuptk='" . $_GET[ 'nuptk' ] . "'";

				} else {
					$format2 = "." . $format;
					$namafile = "../images/guru/" . $nama;
					$namafile = str_replace( $format2, "", $namafile );
					$namafile = $namafile . "_" . $time . $format2;
					move_uploaded_file( $tmp_name, $namafile );
					$nama1 = str_replace( $format2, "", $nama );
					$nama1 = $nama1 . "_" . $time . $format2;

					if ( $data_ambil_foto[ 'foto' ] != "foto-default.jpg" ) {
						if ( file_exists( "../images/guru/" . $data_ambil_foto[ 'foto' ] ) ) {
							unlink( "../images/guru/" . $data_ambil_foto[ 'foto' ] );
						}
					}

					$sql = "UPDATE `tb_guru` SET `nuptk`='$nuptk',`nip`='$nip',`nama`='$nama_guru',`tempat_lahir`='$tempat_lahir',`tgl_lahir`='$tgl_lahir',`kode_jabatan`='$id_jabatan',`password`='$password',`id_kelas`='$id_kelas', foto='$nama1', status = '$status' WHERE nuptk='" . $_GET[ 'nuptk' ] . "'";

				}

				$res = mysqli_query( $link, $sql );


				if ( $res ) {
					$_SESSION[ 's_pesan' ] = "Data Berhasil Diubah!"
					?>
					<script language="javascript">
						document.location.href = "home_admin.php?tampil=guru";
					</script>
					<?php
				} else {
					$_SESSION[ 's_pesan' ] = "Data Gagal Diubah!"
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
}



$link->close();

?>
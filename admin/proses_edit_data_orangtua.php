<?php
session_start();
include "../koneksi.php";
$link = koneksi_db();
if ( isset( $_POST[ 'submit' ] ) ) {
	$id_orangtua = $_POST[ 'id_orangtua' ];

	$sql_ambil_foto = "select * from tb_orangtua where id_orangtua='$id_orangtua';";
	$res_ambil_foto = mysqli_query( $link, $sql_ambil_foto );
	$data_ambil_foto = mysqli_fetch_array( $res_ambil_foto );

	$id_orangtua=$_POST['id_orangtua'];
	$nama_orangtua=$_POST['nama'];
	$alamat=$_POST['alamat'];
	$no_telp=$_POST['no_telp'];
	$password=$_POST['password'];
	$status=$_POST['status'];

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
					$sql = "UPDATE `tb_orangtua` SET `id_orangtua`='$id_orangtua',`nama`='$nama_orangtua',`alamat`='$alamat',`password`='$password',`no_telp`='$no_telp',status = '$status' WHERE id_orangtua='" . $_GET[ 'id_orangtua' ] . "'";

				} else {
					$format2 = "." . $format;
					$namafile = "../images/orangtua/" . $nama;
					$namafile = str_replace( $format2, "", $namafile );
					$namafile = $namafile . "_" . $time . $format2;
					move_uploaded_file( $tmp_name, $namafile );
					$nama1 = str_replace( $format2, "", $nama );
					$nama1 = $nama1 . "_" . $time . $format2;

					if ( $data_ambil_foto[ 'foto' ] != "foto-default.jpg" ) {
						if ( file_exists( "../images/orangtua/" . $data_ambil_foto[ 'foto' ] ) ) {
							unlink( "../images/orangtua/" . $data_ambil_foto[ 'foto' ] );
						}
					}

					$sql = "UPDATE `tb_orangtua` SET `id_orangtua`='$id_orangtua',`nama`='$nama_orangtua',`alamat`='$alamat',`password`='$password',`no_telp`='$no_telp',status = '$status',foto = '$nama1' WHERE id_orangtua='" . $_GET[ 'id_orangtua' ] . "'";

				}

				$res = mysqli_query( $link, $sql );


				if ( $res ) {
					$_SESSION[ 's_pesan' ] = "Data Berhasil Diubah!"
					?>
					<script language="javascript">
						document.location.href = "home_admin.php?menu=orangtua&action=tampil";
					</script>
					<?php
				} else {
					$_SESSION[ 's_pesan' ] = "Data Gagal Diubah!"
					?>
					<script language="javascript">
						document.location.href = "home_admin.php?menu=orangtua&action=tampil";
					</script>
					<?php
				}
				$link->close();

			} else {
				$_SESSION[ 's_pesan' ] = "format harus berbentuk JPG/PNG/JPEG";
				?>
				<script language="javascript">
					document.location.href = "home_admin.php?menu=orangtua&action=tampil";
				</script>
				<?php
			}
		} else {
			$_SESSION[ 's_pesan' ] = "size file terlalu besar";
			?>
			<script language="javascript">
				document.location.href = "home_admin.php?menu=orangtua&action=tampil";
			</script>
			<?php
		}
	} else {
		$_SESSION[ 's_pesan' ] = "ada error";

		?>
		<script language="javascript">
			document.location.href = "home_admin.php?menu=orangtua&action=tampil";
		</script>
		<?php
	}
}

$link->close();

?>
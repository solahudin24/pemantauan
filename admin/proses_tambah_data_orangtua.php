<?php
session_start();
include "../koneksi.php";
$link = koneksi_db();
if(!empty($_POST['id_orangtua']))
{
	$id_orangtua=$_POST['id_orangtua'];
	$nama_orangtua=$_POST['nama'];
	$alamat=$_POST['alamat'];
	$no_telp=$_POST['no_telp'];
	$password=$_POST['password'];
	
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
					$namafile = "../images/orangtua/" . $nama;
					$namafile = str_replace( $format2, "", $namafile );
					$namafile = $namafile . "_" . $time . $format2;
					move_uploaded_file( $tmp_name, $namafile );
					$nama1 = str_replace( $format2, "", $nama );
					$nama1 = $nama1 . "_" . $time . $format2;
				}


				$sql = "insert into tb_orangtua values ('$id_orangtua','$nama_orangtua','$nama1', '$alamat','$no_telp', '$password','0');";
				$res = mysqli_query( $link, $sql );

				if ( $res ) {
					$_SESSION[ 's_pesan' ] = "Data Berhasil Disimpan!"
					?>
					<script language="javascript">
						document.location.href = "home_admin.php?tampil=orangtua";
					</script>
					<?php
				} else {
					$_SESSION[ 's_pesan' ] = "Data Gagal Disimpan!"
					?>
					<script language="javascript">
						document.location.href = "home_admin.php?tampil=orangtua";
					</script>
					<?php
				}
				$link->close();

			} else {
				$_SESSION[ 's_pesan' ] = "format harus berbentuk JPG/PNG/JPEG";
				?>
				<script language="javascript">
					document.location.href = "home_admin.php?tampil=orangtua";
				</script>
				<?php
			}
		} else {
			$_SESSION[ 's_pesan' ] = "size file terlalu besar";
			?>
			<script language="javascript">
				document.location.href = "home_admin.php?tampil=orangtua";
			</script>
			<?php
		}
	} else {
		$_SESSION[ 's_pesan' ] = "ada error";

		?>
		<script language="javascript">
			document.location.href = "home_admin.php?tampil=orangtua";
		</script>
		<?php
	}
} else {
	?>
	<script language="javascript">
		document.location.href = "home_admin.php?tampil=orangtua";
	</script>
	<?php
}
?>
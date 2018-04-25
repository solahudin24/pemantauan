<?php
include "../koneksi.php";
$link = koneksi_db();
$nuptk = $_GET[ 'nuptk' ];


$query = "delete from tb_guru WHERE nuptk='$nuptk';";
$res = mysqli_query( $link, $query );

if ( $res ) {
	?>
	<script language="javascript">
		alert( 'Berhasil dihapus!' );
		document.location.href = "home_admin.php?tampil=guru";
	</script>
	<?php
} else {
	?>
	<script language="javascript">
		alert( 'Gagal menghapus data!' );
		document.location.href = "home_admin.php?tampil=guru";
	</script>
	<?php
}


$link->close();

?>
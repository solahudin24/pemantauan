<?php
session_start();
include "../koneksi.php";
$link = koneksi_db();
if ( isset( $_GET[ 'nuptk' ] ) ) {
	$nuptk = $_GET[ 'nuptk' ];


	$query = "update tb_guru set status='1' WHERE nuptk='$nuptk';";
	$res = mysqli_query( $link, $query );

	if ( $res ) {
		$_SESSION['s_pesan'] = "Berhasil menghapus data!";
		?>
		<script language="javascript">
			document.location.href = "home_admin.php?tampil=guru";
		</script>
		<?php
	} else {
		$_SESSION['s_pesan'] = "Gagal menghapus data!";
		?>
		<script language="javascript">
			document.location.href = "home_admin.php?tampil=guru";
		</script>
		<?php
	}
}else{
	?>
		<script language="javascript">
		
			document.location.href = "home_admin.php?tampil=guru";
		</script>
		<?php
}

?>
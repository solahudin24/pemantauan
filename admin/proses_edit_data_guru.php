<?php
include "../koneksi.php";
$link = koneksi_db();
$nuptk = $_POST[ 'nuptk' ];
$nama = $_POST[ 'nama' ];
$password = $_POST[ 'password' ];


$query = "update tb_guru set nama='$nama', password='$password' WHERE nuptk='$nuptk';";
$res = mysqli_query( $link, $query );

if ( $res ) {
	?>
	<script language="javascript">
		alert( 'Berhasil Disimpan!' );
		document.location.href = "home_admin.php?tampil=guru";
	</script>
	<?php
} else {
	?>
	<script language="javascript">
		alert( 'Gagal mengubah data!' );
		document.location.href = "home_admin.php?tampil=guru";
	</script>
	<?php
}


$link->close();

?>
<?php
include "../koneksi.php";
$link = koneksi_db();
$nuptk = $_POST[ 'nuptk' ];
$nip = $_POST[ 'nip' ];
$tempat_lahir = $_POST[ 'tempat_lahir' ];
$tanggal_lahir = $_POST[ 'tanggal_lahir' ];
$nama = $_POST[ 'nama' ];
$password = $_POST[ 'password' ];


$query = "update tb_guru set nip='$nip', nama='$nama', tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir', password='$password' WHERE nuptk='$nuptk';";
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
<?php
include "../koneksi.php";
$link = koneksi_db();
$nis = $_POST[ 'nis' ];
$nama = $_POST[ 'nama' ];
$alamat = $_POST[ 'alamat' ];
$password = $_POST[ 'password' ];



$query = "update tb_siswa set nama='$nama', alamat='$alamat', password='$password' WHERE nis='$nis';";
$res = mysqli_query( $link, $query );

if ( $res ) {
	?>
	<script language="javascript">
		alert( 'Berhasil Disimpan!' );
		document.location.href = "home_admin.php?tampil=siswa";
	</script>
	<?php
} else {
	?>
	<script language="javascript">
		alert( 'Gagal mengubah data!' );
		document.location.href = "home_admin.php?tampil=siswa";
	</script>
	<?php
}


$link->close();

?>
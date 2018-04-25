<?php
include "../koneksi.php";
if ( !empty( $_POST[ 'nis' ] ) ) {
	$nis = $_POST[ 'nis' ];
	$nama = $_POST[ 'nama' ];
	$alamat = $_POST[ 'alamat' ];
	$password = $_POST[ 'password' ];

	$link = koneksi_db();
	$query = "insert into tb_siswa (nis,nama,alamat,password) values ('$nis','$nama','$alamat',$password);";
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
			alert( 'Gagal Disimpan!' );
			document.location.href = "home_admin.php?tampil=siswa";
		</script>
		<?php
	}
	$link->close();
}
?>
<?php
session_start();
include "../koneksi.php";
$link = koneksi_db();
if(!empty($_POST['kode_jabatan']))
{
	$kode_jabatan=$_POST['kode_jabatan'];
	$nama_jabatan=$_POST['nama_jabatan'];

	$sql = "insert into tb_jabatan values ('$kode_jabatan','$nama_jabatan');";
	$res = mysqli_query( $link, $sql );

	if ( $res ) {
		$_SESSION[ 's_pesan' ] = "Data Berhasil Disimpan!"
	?>
	    <script language="javascript">
			document.location.href = "home_admin.php?menu=jabatan&action=tampil";
		</script>
	<?php
	} else {
		$_SESSION[ 's_pesan' ] = "Data Gagal Disimpan!"
	?>
		<script language="javascript">
			document.location.href = "home_admin.php?menu=jabatan&action=tampil";
		</script>
	<?php
	}
	$link->close();
} else {
	?>
	<script language="javascript">
		document.location.href = "home_admin.php?menu=jabatan&action=tampil";
	</script>
	<?php
}
?>
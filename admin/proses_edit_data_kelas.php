<?php
session_start();
include "../koneksi.php";
$link = koneksi_db();
if(!empty($_POST['id_kelas']))
{
	$id_kelas=$_POST['id_kelas'];
	$kelas=$_POST['kelas'];
	$tingkatan=$_POST['tingkatan'];
	$jam_masuk = $_POST['jam_masuk'];
	$jam_keluar = $_POST['jam_keluar'];

	$sql = "Update tb_kelas set kelas='$kelas',tingkatan='$tingkatan',jam_masuk='$jam_masuk',jam_keluar='$jam_keluar' where  id_kelas='$id_kelas';";
	$res = mysqli_query( $link, $sql );

	if ( $res ) {
		$_SESSION[ 's_pesan' ] = "Data Berhasil Diubah!"
	?>
	    <script language="javascript">
			document.location.href = "home_admin.php?tampil=kelas";
		</script>
	<?php
	} else {
		$_SESSION[ 's_pesan' ] = "Data Gagal Diubah!"
	?>
		<script language="javascript">
			document.location.href = "home_admin.php?tampil=kelas";
		</script>
	<?php
	}
	$link->close();
} else {
	?>
	<script language="javascript">
		document.location.href = "home_admin.php?tampil=kelas";
	</script>
	<?php
}
?>
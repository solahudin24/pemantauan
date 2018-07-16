<?php
require( '../koneksi.php' );
$link = koneksi_db();
if(isset($_POST['command'])){
	if($_POST['command'] == "update-konfirmasi"){
		?>
<script>alert('1');</script>
<?php
		$nis = $_POST['nis'];
		$waktu = $_POST['waktu'];
		$id_notifikasi = $_POST['idNotifikasi'];
		
		$query_update_konfirmasi = "update tb_notifikasi set status=1 where id_notifikasi='$id_notifikasi'";
		$result_update_konfirmasi = mysqli_query($link,$query_update_konfirmasi);
		
		$query_insert_laporan = "insert into tb_laporan values (NULL,'$nis','$waktu',NULL,NULL,NULL)";
		$result_insert_laporan = mysqli_query($link,$query_insert_laporan);
		
	}else if($_POST['command'] == "update-ketemu"){
		$nis = $_POST['nis'];
		$waktu = $_POST['waktu'];
		$id_notifikasi = $_POST['idNotifikasi'];
		$lat = $_POST['lat'];
		$longtitude = $_POST['longtitude'];
		
		
		
	}
}
?>
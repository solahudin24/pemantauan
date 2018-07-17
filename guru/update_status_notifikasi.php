<?php
require( '../koneksi.php' );
$link = koneksi_db();
if(isset($_POST['command'])){
	if($_POST['command'] == "update-konfirmasi"){
		$nis = $_POST['nis'];
		$waktu = $_POST['waktu'];
		$id_notifikasi = $_POST['idNotifikasi'];
		
		$query_update_konfirmasi = "update tb_notifikasi set status=1 where id_notifikasi='$id_notifikasi'";
		$result_update_konfirmasi = mysqli_query($link,$query_update_konfirmasi);
		
		$query_insert_laporan = "insert into tb_laporan values (NULL,'$nis','$waktu',NULL,NULL,NULL)";
		$result_insert_laporan = mysqli_query($link,$query_insert_laporan);
		
	}else if($_POST['command'] == "update-ketemu"){
		$nis = $_POST['nis'];
		$id_notifikasi = $_POST['idNotifikasi'];
		
		$query_ambil_lat_long = "select * from tb_siswa where nis='$nis'";
		$result_ambil_lat_long = mysqli_query($link,$query_ambil_lat_long);
		$data_lat_long = mysqli_fetch_array($result_ambil_lat_long);
		
		$query_waktu_kabur = "select * from tb_notifikasi where id_notifikasi='$id_notifikasi'";
		$result_waktu_kabur = mysqli_query($link,$query_waktu_kabur);
		$data_waktu_kabur = mysqli_fetch_array($result_waktu_kabur);
		
		$query_update_laporan = "update tb_laporan set waktu_ketemu=CURRENT_TIMESTAMP , lat='".$data_lat_long['lat']."', longtitude='".$data_lat_long['longitude']."' where waktu_kabur='".$data_waktu_kabur['waktu']."' ";
		$result_update_laporan = mysqli_query($link,$query_update_laporan);
		
	}
}
?>
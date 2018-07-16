<?php
require( '../koneksi.php' );
$link = koneksi_db();
//jika menggunakan query
//silahkan masukan query mysql anda di sini //

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$perintah = $_POST['perintah'];

if($perintah=="0 jadi 2"){

	$sql_notifikasi = "insert into tb_notifikasi values (NULL,'$nis','kelas - ".$kelas." - keluar sekolah',CURRENT_TIMESTAMP,'0');";
	$res_notifikasi = mysqli_query( $link, $sql_notifikasi );

	$sql_ubah_status_siswa = "UPDATE `tb_siswa` SET `status`='2' WHERE nis='$nis';";
	$res_ubah_status_siswa = mysqli_query($link, $sql_ubah_status_siswa);
}else if($perintah == "2 jadi 0"){
	?>
<script>
alert("kesini");
</script>
	<?php
	$sql_notifikasi = "insert into tb_notifikasi values (NULL,'$nis','kelas -".$kelas." - kembali ke sekolah',CURRENT_TIMESTAMP,'0');";
	$res_notifikasi = mysqli_query( $link, $sql_notifikasi );

	$sql_ubah_status_siswa = "UPDATE `tb_siswa` SET `status`='0' WHERE nis='$nis';";
	$res_ubah_status_siswa = mysqli_query($link, $sql_ubah_status_siswa);
}


?>
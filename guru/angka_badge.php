<?php
require( '../koneksi.php' );
$link = koneksi_db();



if ( isset( $_POST[ 'command' ] ) ) {
	$sql_update_badge = "UPDATE `tb_notifikasi` SET status='1' where status='0'";
	$res_update_badge = mysqli_query( $link, $sql_update_badge );
	//echo "<script> alert('jiwa'); </script>";
}
	$sql_tampil_badge = "SELECT * FROM `tb_notifikasi` where status='0'";
	$res_tampil_badge = mysqli_query( $link, $sql_tampil_badge );
	$jumlah = mysqli_num_rows( $res_tampil_badge );
	$data = array(
		'jumlah' => $jumlah
	);

	echo json_encode( $data );


?>
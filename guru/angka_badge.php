<?php
session_start();
require( '../koneksi.php' );
$link = koneksi_db();



if ( isset( $_POST[ 'command' ] ) ) {
	$sql_select_id = "SELECT * FROM `tb_notifikasi` WHERE id_notifikasi not in (SELECT id_notifikasi from tb_status where id_user='".$_SESSION[ 's_nuptk' ]."')";
	$res_select_id = mysqli_query( $link, $sql_select_id );
	while($data_select_id = mysqli_fetch_array($res_select_id)){
		$query_insert_status = "insert into tb_status values(NULL,'".$data_select_id['id_notifikasi']."','".$_SESSION[ 's_nuptk' ]."',NULL)";
		$res_insert_status = mysqli_query($link,$query_insert_status);
	}
}
	$sql_tampil_badge = "SELECT * FROM `tb_notifikasi` WHERE id_notifikasi not in (SELECT id_notifikasi from tb_status where id_user='".$_SESSION[ 's_nuptk' ]."')";
	$res_tampil_badge = mysqli_query( $link, $sql_tampil_badge );
	$jumlah = mysqli_num_rows( $res_tampil_badge );
	
	$data = array(
		'jumlah' => $jumlah
	);

	echo json_encode( $data );


?>
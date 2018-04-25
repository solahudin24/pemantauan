<?php
session_start();
require( 'koneksi.php' );

$link = koneksi_db();
$username = $_POST[ 'username' ];
$password = $_POST[ 'password' ];
$temp = substr( $username, 0, 1 );

if ( $temp == "O" || $temp == "o" ) {
	$sql_orangtua = "select * from tb_orangtua where id_orangtua='" . $username . "' and password='" . $password . "' and status='0'";
	$res_orangtua = mysqli_query( $link, $sql_orangtua );
	$ketemu = mysqli_num_rows( $res_orangtua );
	if ( $ketemu > 0 ) {
		while ( $data = mysqli_fetch_array( $res_orangtua ) ) {
			$id_orangtua = $data[ 'id_orangtua' ];
			$password = $data[ 'password' ];
			$nama = $data[ 'nama' ];
			$no_telp = $data[ 'no_telp' ];
			$alamat = $data[ 'alamat' ];
		}

		$_SESSION[ 's_id_orangtua' ] = $id_orangtua;
		$_SESSION[ 's_password' ] = $password;
		$_SESSION[ 's_nama' ] = $nama;
		$_SESSION[ 's_no_telp' ] = $no_telp;
		$_SESSION[ 's_alamat' ] = $alamat;
		echo( "<script> location.href ='home_ortu.php';</script>" );
	} else {
		$_SESSION[ 's_pesan' ] = "Email atau Password Salah";
		echo( "<script> location.href ='index.php';</script>" );
	}

}else{
	$sql_guru = "select * from tb_guru where nuptk='" . $username . "' and password='" . $password . "' and status='0'";
	$res_guru = mysqli_query( $link, $sql_guru );
	$ketemu = mysqli_num_rows( $res_guru );
	if ( $ketemu > 0 ) {
		while ( $data = mysqli_fetch_array( $res_guru ) ) {
			$nuptk = $data[ 'nuptk' ];
			$password = $data[ 'password' ];
			$nama = $data[ 'nama' ];
			$nip = $data['nip'];
			$kode_jabatan = $data[ 'kode_jabatan' ];
			$id_kelas = $data['id_kelas'];
		}

		$_SESSION[ 's_nuptk' ] = $nuptk;
		$_SESSION[ 's_password' ] = $password;
		$_SESSION[ 's_nama' ] = $nama;
		$_SESSION[ 's_nip' ] = $nip;
		$_SESSION[ 's_kode_jabatan' ] = $kode_jabatan;
		$_SESSION[ 's_id_kelas'] = $id_kelas;
		echo( "<script> location.href ='admin/home_admin.php';</script>" );
	} else {
		$_SESSION[ 's_pesan' ] = "Email atau Password Salah";
		echo( "<script> location.href ='index.php';</script>" );
	}
}


//if ( $pilihan == "rumah_sakit" ) {
//	$sql = "select * from rumah_sakit where username='" . $_POST[ 'username' ] . "' and password='" . $_POST[ 'password' ] . "'";
//	$res = mysqli_query( $link, $sql );
//	$ketemu = mysqli_num_rows( $res );
//	while ( $data = mysqli_fetch_array( $res ) ) {
//		$username = $data[ 'USERNAME' ];
//		$password = $data[ 'PASSWORD' ];
//		$nama_rumah_sakit = $data[ 'NAMA' ];
//		$email = $data[ 'EMAIL' ];
//		$no_telp = $data[ 'NO_TELEPON' ];
//		$alamat = $data[ 'ALAMAT' ];
//	}
//	if ( $ketemu > 0 ) {
//		$_SESSION[ 's_password' ] = $password;
//		$_SESSION[ 's_rumah_sakit_id' ] = $username;
//		$_SESSION[ 's_nama_rumah_sakit' ] = $nama_rumah_sakit;
//		$_SESSION[ 's_email' ] = $email;
//		$_SESSION[ 's_no_telp' ] = $no_telp;
//		$_SESSION[ 's_alamat' ] = $alamat;
//		echo( "<script> location.href ='rumahsakit.php?menu=profile&action=tampil';</script>" );
//
//	} else {
//		$_SESSION[ 's_pesan' ] = "Email atau Password Salah";
//		echo( "<script> location.href ='halaman_utama.php';</script>" );
//	}
//} else if ( $pilihan == "petugas" ) {
//	$sql = "select * from petugas_pmi where username='" . $_POST[ 'username' ] . "' and password='" . $_POST[ 'password' ] . "'";
//	$res = mysqli_query( $link, $sql );
//	$ketemu = mysqli_num_rows( $res );
//	while ( $data = mysqli_fetch_array( $res ) ) {
//		$username = $data[ 'USERNAME' ];
//		$password = $data[ 'PASSWORD' ];
//		$email = $data[ 'EMAIL' ];
//		$nama_petugas = $data[ 'NAMA' ];
//		$petugas_id = $data[ 'PETUGAS_PMI_ID' ];
//	}
//	if ( $ketemu > 0 ) {
//		$_SESSION[ 's_username' ] = $username;
//		$_SESSION[ 's_password' ] = $password;
//		$_SESSION[ 's_email' ] = $email;
//		$_SESSION[ 's_nama' ] = $nama_petugas;
//		$_SESSION[ 's_petugas_id' ] = $petugas_id;
//		echo( "<script> location.href ='petugas.php?menu=beranda&action=tampil';</script>" );
//
//	} else {
//		$_SESSION[ 's_pesan' ] = "Email atau Password Salah";
//		echo( "<script> location.href ='halaman_utama.php';</script>" );
//	}
//}





?>
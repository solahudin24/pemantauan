<?php
session_start();
include "../koneksi.php";
$link = koneksi_db();
if(!empty($_POST['id_orangtua']))
{
	$id_orangtua=$_POST['id_orangtua'];
	$pass_lama=$_POST['pass_lama'];
	$pass_baru=$_POST['pass_baru'];
	$konf_pass=$_POST['konf_pass'];

	$sql_orangtua = "select * from tb_orangtua where id_orangtua='$id_orangtua'";
    $res_orangtua= mysqli_query($link,$sql_orangtua);
    $data_gorangtua = mysqli_fetch_array($res_orangtua);
    echo $data_guru['password'];

	//validasi
	if ($pass_lama==$data_guru['password']) {
		if ($pass_baru==$konf_pass) {
			$sql = "update tb_orangtua set password='$pass_baru' where id_orangtua='$id_orangtua';";
			$res = mysqli_query( $link, $sql );

				if ( $res ) {
				$_SESSION[ 's_pesan' ] = "Password Berhasil Diubah!"
				?>
			    <script language="javascript">
					document.location.href = "../orangtua/home_ortu.php";
				</script>
				<?php
				} else {
					$_SESSION[ 's_pesan' ] = "Password Gagal Diubah!"
			?>
				<script language="javascript">
					document.location.href = "../../orangtua/home_ortu.php";
				</script>
			<?php
			}
			$link->close();
		}else{
			$_SESSION[ 's_pesan' ] = "Password Baru dan Konfirmasi Password Tidak Sesuai!"
			?>
				<script language="javascript">
					document.location.href = "../orangtua/home_ortu.php";
				</script>
	<?php
		}
	}else{
		$_SESSION[ 's_pesan' ] = "Password Salah!"
			?>
				<script language="javascript">
					document.location.href = "../orangtua/home_ortu.php";
				</script>
	<?php
	}

	
} else {
	?>
	<script language="javascript">
		document.location.href = "../orangtua/home_ortu.php";
	</script>
	<?php
}
?>
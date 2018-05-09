<?php
require( '../koneksi.php' );
$link = koneksi_db();
if ( isset( $_POST[ 'nis' ] ) ) {
	$nis = $_POST[ 'nis' ];
	$query = "SELECT * FROM tb_siswa WHERE nis = $nis";
	$res = mysqli_query( $link, $query );
	while ( $data = mysqli_fetch_assoc( $res ) ) {
		?>
		<table width="100%" class="table table-striped table-bordered table-hover">
			<tr>
				<td colspan="2">
				<center>
					<img src="../images/siswa/<?php echo $data['foto']; ?>" class="img-rounded" width="240" height="320">
				</center>
				</td>
			</tr>
			<tr>
				<td class="col-md-4">NIS</td>
				<td class="col-md-8">
					<?php echo $data['nis']; ?>
				</td>
			</tr>
			<tr>
				<td>Nama Siswa</td>
				<td>
					<?php echo $data['nama']; ?>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>
					<?php echo $data['alamat']; ?>
				</td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>
					<?php 
					$sql_kelas = "select * from tb_kelas where id_kelas='".$data['id_kelas']."'";
					$res_kelas = mysqli_query($link,$sql_kelas);
					$data_kelas = mysqli_fetch_array($res_kelas);
					echo $data_kelas['kelas']." ".$data_kelas['tingkatan']; ?>
				</td>
			</tr>
			<tr>
				<td>Orangtua</td>
				<td>
					<?php 
					$sql_orangtua = "select * from tb_orangtua where id_orangtua='".$data['id_orangtua']."'";
					$res_orangtua = mysqli_query($link,$sql_orangtua);
					$data_orangtua = mysqli_fetch_array($res_orangtua);
					echo $data_orangtua['nama']; ?>
				</td>
			</tr>
			<tr>
				<td>Guru</td>
				<td>
					<?php 
					$sql_guru = "select * from tb_guru where nuptk='".$data['nuptk']."'";
					$res_guru = mysqli_query($link,$sql_guru);
					$data_guru = mysqli_fetch_array($res_guru);
					echo $data_guru['nama']; ?>
				</td>
			</tr>
			<tr>
				<td>Lokasi</td>
				<td>
					<?php
					echo $data['lat'].",".$data['longitude'];
					?>
				</td>
			</tr>
			<tr>
				<td>Baterai</td>
				<td>
					<?php
					echo $data['baterai']."%";
					?>
				</td>
			</tr>
			<tr>
				<td>Update Terakhir</td>
				<td>
					<?php
					echo $data['update_time'];
					?>
				</td>
			</tr>
		</table>


		<?php
	}
}?>
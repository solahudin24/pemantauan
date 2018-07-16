<?php
require( '../koneksi.php' );
$link = koneksi_db();
//jika menggunakan query
//silahkan masukan query mysql anda di sini //

$sql_siswa = "select * from tb_siswa";
$res_siswa = mysqli_query( $link, $sql_siswa );

while ( $data = mysqli_fetch_array( $res_siswa ) ) {
	echo "<li>";
	?> <a href = "#detail_siswa" id = "custId" data-toggle = "modal" data-id="<?php echo $data['nis'];?>">
		<div class="row">
			<div class="col-md-4">
				<img class="img-rounded" src="../images/siswa/<?php echo $data['foto'];?>" width="75" height="75">
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<?php echo $data['nama'];?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<img src="../images/icons/baterai.png" width='30' height='40'>
						<?php echo " ".$data['baterai'];?>%
					</div>
				</div>
			</div>
		</div> 
	</a>

	<?php
	echo "</li>";
	if ( $data[ 'baterai' ] < 15 ) {
		?>
		<script>
			//										alert("baterai lemah");
		</script>
		<?php
	}
}
?>
	<li class="divider"></li>
</table>
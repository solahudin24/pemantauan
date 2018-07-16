<?php
require( '../koneksi.php' );
$link = koneksi_db();


$sql_siswa = "SELECT * FROM `tb_notifikasi` JOIN tb_siswa ON tb_notifikasi.nis = tb_siswa.nis ORDER BY tb_notifikasi.id_notifikasi DESC LIMIT 3";
$res_siswa = mysqli_query( $link, $sql_siswa );
$i = 0;
while ( $data_siswa = mysqli_fetch_array( $res_siswa ) ) {
	if ( $i != 0 ) {
		?>

		<li class="divider"></li>

		<?php } ?>
		<li>
			<a href="#">
				<div>
					<strong>
						<?php echo $data_siswa['nama']; ?>
					</strong>
					<span class="pull-right text-muted">
                                        <em><?php echo $data_siswa['waktu']; ?></em>
                                    </span>
				</div>
				<div><?php echo $data_siswa['pesan_notif']; ?></div>
			</a>
		</li>

		<?php
		$i++;
	}
	?>
	<li class="divider"></li>
	<li>
		<a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
	


	</li>
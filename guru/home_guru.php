<?php
session_start();
if ( isset( $_SESSION[ 's_nuptk' ] ) ) {
	require "../koneksi.php";
	$link = koneksi_db();
	$title = 'Guru SLB C Sukapura Kota Bandung';
	$halaman = 'admin';
	require( '../header.php' );

	if ( isset( $_SESSION[ 's_pesan' ] ) ) {
		?>
		<div class="alert alert-warning" role="alert" align="center">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<?php echo $_SESSION['s_pesan']; ?>
		</div>
		<?php
		unset( $_SESSION[ 's_pesan' ] );
	}

	?>

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="../guru/home_guru.php">Guru </a>
			</div>
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">

				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
					</a>

					<ul class="dropdown-menu dropdown-user">
						<li class="divider"></li>
						<li><a href="#ubah_pw" id="custId" data-toggle="modal" data-id="<?php echo $_SESSION['s_nuptk'];?>"><i class="fa fa-edit fa-fw"></i> Ubah Password</a></li>
						<li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
						</li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->
			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<li class="active">
							<ul class="nav nav-second-level" aria-expanded="true" style>
								<?php 
								$sql_siswa = "select * from tb_siswa where status='0'";
								$res_siswa = mysqli_query($link,$sql_siswa);
								while ( $data = mysqli_fetch_array( $res_siswa ) ) {
									echo "<li>";
									?><a class="img-rounded" href="#detail_siswa" id="custId" data-toggle="modal" data-id="<?php echo $data['nis'];?>"> 
									<img src="../images/siswa/<?php echo $data['foto'];?>" width="75" height="75"><?php echo $data['nama'];?></a>
									<?php echo "</li>";
								}
								?>
							</ul>
							<!-- /.nav-second-level -->
						</li>
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>

		<!-- isi -->

		<!-- Page-Level Demo Scripts - Tables - Use for reference -->


		<!-- modal ubah -->
		<div class="modal fade" id="ubah_pw" tabindex="-1" role="dialog" aria-labelledby="ubah" aria-hidden="true">
			<div class="modal-dialog" role="document">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<center>
							<h4 class="modal-title">Ubah Password</h4>
						</center>
					</div>
					<div class="modal-body">
						<div class="hasil-data"></div>
					</div>

				</div>
			</div>
		</div>

		<!-- modal detail -->
		<div class="modal fade" id="detail_siswa" tabindex="-1" role="dialog" aria-labelledby="detail" aria-hidden="true">
			<div class="modal-dialog" role="document">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<center>
							<h4 class="modal-title">Detail Siswa</h4>
						</center>
					</div>
					<div class="modal-body">
						<div class="hasil-data"></div>
					</div>

				</div>
			</div>
		</div>

		<script type="text/javascript">
			$( document ).ready( function () {
				$( '#ubah_pw' ).on( 'show.bs.modal', function ( e ) {
			var idx = $( e.relatedTarget ).data( 'id' ); //harus tetap id, jika tidak akan data tak akan terambil
			//menggunakan fungsi ajax untuk pengambilan data
			$.ajax( {
				type: 'post',
				url: 'ubah_pw.php',
				data: 'nuptk=' + idx,
				success: function ( data ) {
					$( '.hasil-data' ).html( data ); //menampilkan data ke dalam modal
				}
			} );
		} );
			} );

			$( document ).ready( function () {
				$( '#detail_siswa' ).on( 'show.bs.modal', function ( e ) {
			var idx = $( e.relatedTarget ).data( 'id' ); //harus tetap id, jika tidak akan data tak akan terambil
			//menggunakan fungsi ajax untuk pengambilan data
			$.ajax( {
				type: 'post',
				url: 'detail_siswa.php',
				data: 'nis=' + idx,
				success: function ( data ) {
					$( '.hasil-data' ).html( data ); //menampilkan data ke dalam modal
				}
			} );
		} );
			} );
		</script>

		<?php 
		require('../footer.php');
	}else{
		echo( "<script> location.href ='../index.php';</script>" );
	}
	?>
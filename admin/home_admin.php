<?php
session_start();
if ( isset( $_SESSION[ 's_nuptk' ] ) ) {
	require "../koneksi.php";
	$link = koneksi_db();
	$title = 'Administrator SLB C Sukapura Kota Bandung';
	$halaman = 'admin';
	require( '../header.php' );


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
			



				<a class="navbar-brand" href="home_admin.php">Administrator</a>
			</div>
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">

				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
				



					<ul class="dropdown-menu dropdown-user">
						<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
						</li>
						<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
						</li>
						<li class="divider"></li>
						<li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
						</li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->
			<?php
			if ( isset( $_GET[ 'tampil' ] ) ) {
				$tampil = $_GET[ 'tampil' ];
				if ( $tampil == 'guru' ) {
					require( 'menu_guru.php' );
				} else if ( $tampil == 'siswa' ) {
					require( 'menu_siswa.php' );
				} else if ( $tampil == 'orangtua' ) {
					require( 'menu_orangtua.php' );
				} else if ( $tampil == 'jabatan' ) {
					require( 'menu_jabatan.php' );
				} else if ( $tampil == 'kelas' ) {
					require( 'menu_kelas.php' );
				}
			} else {
				require( 'menu_dashboard.php' );
			}
			?>



			<!-- /.navbar-static-side -->
		</nav>

		<?php
		if ( isset( $_GET[ 'tampil' ] ) ) {
			$tampil = $_GET[ 'tampil' ];
			if ( $tampil == 'guru' ) {
				require( 'tampil_guru.php' );
			} else if ( $tampil == 'siswa' ) {
				require( 'tampil_siswa.php' );
			}
			//		else if($tampil == 'orangtua'){
			//						require('menu_orangtua.php');
			//					}else if($tampil == 'jabatan'){
			//						require('menu_jabatan.php');
			//					}else if($tampil == 'kelas'){
			//						require('menu_kelas.php');
			//					}
		} else {
			require( 'tampil_guru.php' );
		}
		?>

		<!-- Page-Level Demo Scripts - Tables - Use for reference -->


		<?php 
require('../footer.php');
}else{
	echo( "<script> location.href ='../index.php';</script>" );
}
?>
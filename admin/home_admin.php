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
						<li class="divider"></li>
						<li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
						</li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->
			<!-- /.KIRI -->
			<?php
			if ( isset( $_GET[ 'menu' ] )) {
				if((($_GET['action']=='tampil')||($_GET['action']=='cari'))){

					$menu = $_GET[ 'menu' ];
					if ( $menu == 'guru' ) {
						require( 'menu_guru.php' );
					} else if ( $menu == 'siswa' ) {

						require( 'menu_siswa.php' );
					} else if ( $menu == 'orangtua' ) {
						require( 'menu_orangtua.php' );
					} else if ( $menu == 'jabatan' ) {
						require( 'menu_jabatan.php' );
					} else if ( $menu == 'kelas' ) {
						require( 'menu_kelas.php' );
					}
				}
			} else {
				require( 'menu_dashboard.php' );
			}
			?>



			<!-- /.navbar-static-side -->
		</nav>
		<!-- /.KANAN -->
		<?php
		if ( isset( $_GET[ 'menu' ] ) ) {
			$action = $_GET[ 'action' ];
			if(($_GET['menu']=='guru') && ($_GET['action']=='tampil'))
					{
						//panggil file tampil data guru
						require( 'tampil_guru.php' );
					}
			else if(($_GET['menu']=='guru') && ($_GET['action']=='cari'))
					{
						//panggil file tampil data guru
						require( 'tampil_cari_guru.php' );
					}
			else if(($_GET['menu']=='siswa') && ($_GET['action']=='tampil'))
					{
						//panggil file tampil data guru
						require( 'tampil_siswa.php' );
					}
			else if(($_GET['menu']=='siswa') && ($_GET['action']=='cari'))
					{
						//panggil file tampil data guru
						require( 'tampil_cari_siswa.php' );
					}
			else if(($_GET['menu']=='orangtua') && ($_GET['action']=='tampil'))
					{
						//panggil file tampil data guru
						require( 'tampil_orangtua.php' );
					}
			else if(($_GET['menu']=='orangtua') && ($_GET['action']=='cari'))
					{
						//panggil file tampil data guru
						require( 'tampil_cari_orangtua.php' );
					}
			else if(($_GET['menu']=='jabatan') && ($_GET['action']=='tampil'))
					{
						//panggil file tampil data guru
						require( 'tampil_jabatan.php' );
					}
			else if(($_GET['menu']=='jabatan') && ($_GET['action']=='cari'))
					{
						//panggil file tampil data guru
						require( 'tampil_cari_jabatan.php' );
					}
			else if(($_GET['menu']=='kelas') && ($_GET['action']=='tampil'))
					{
						//panggil file tampil data guru
						require( 'tampil_kelas.php' );
					}
			else if(($_GET['menu']=='kelas') && ($_GET['action']=='cari'))
					{
						//panggil file tampil data guru
						require( 'tampil_cari_kelas.php' );
					}
			} else {
			require( 'tampil_dashboard.php' );
		}
		?>

		<!-- Page-Level Demo Scripts - Tables - Use for reference -->


		<?php 
require('../footer.php');
}else{
	echo( "<script> location.href ='../index.php';</script>" );
}
?>
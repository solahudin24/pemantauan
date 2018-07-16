<?php
session_start();
if ( isset( $_SESSION[ 's_nuptk' ] ) ) {
	require "../koneksi.php";
	$link = koneksi_db();
	$title = 'Kepala Sekolah SLB C Sukapura Kota Bandung';
	$halaman = 'kepsek';
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
				<a class="navbar-brand" href="home_kepsek.php">Kepala Sekolah</a>
			</div>
			<!-- /.navbar-header -->

			<!-- /.navbar-top-links -->
			<?php
			if ( isset( $_GET[ 'tampil' ] ) ) {
				$tampil = $_GET[ 'tampil' ];
				if ( $tampil == 'guru' ) {
					require( 'menu_statisik_siswa.php' );
				} else if ( $tampil == 'siswa' ) {
					require( 'menu_lokasi_siswa.php' );
				}
			} else {
				require( 'menu_statistik_siswa.php' );
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
			} else if ( $tampil == 'orangtua' ) {
				require( 'tampil_orangtua.php' );
			} else if ( $tampil == 'jabatan' ) {
				require( 'tampil_jabatan.php' );
			} else if ( $tampil == 'kelas' ) {
				require( 'tampil_kelas.php' );
			}
		} else {
			require( 'tampil_dashboard.php' );
		}
		?>

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

            <div class="modal fade" id="export" tabindex="-1" role="dialog" aria-labelledby="export" aria-hidden="true">
                <div class="modal-dialog" role="document">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <center>
                                <h4 class="modal-title">Export Data</h4>
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
                $( '#export' ).on( 'show.bs.modal', function ( e ) {
                    var idx = $( e.relatedTarget ).data( 'id' ); //harus tetap id, jika tidak akan data tak akan terambil
                    //menggunakan fungsi ajax untuk pengambilan data
                    $.ajax( {
                        type: 'post',
                        url: 'export_data.php',
                        data: 'nuptk=' + idx,
                        success: function ( data ) {
                            $( '.hasil-data' ).html( data ); //menampilkan data ke dalam modal
                        }
                    } );
                } );
            } );
            </script>

		<?php 
	$halaman = 'admin';
	require('../footer.php');
}else{
    echo( "<script> location.href ='../index.php';</script>" );
}
?>
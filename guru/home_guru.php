<?php
session_start();
if ( isset( $_SESSION[ 's_nuptk' ] ) ) {
	require "../koneksi.php";
	$link = koneksi_db();
	$title = 'Guru SLB C Sukapura Kota Bandung';
	$halaman = 'guru';
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
						<li><a href="#ubah_pw" id="custId" data-toggle="modal" data-id="<?php echo $_SESSION['s_nuptk'];?>"><i class="fa fa-edit fa-fw"></i> Ubah Password</a>
						</li>
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
								$sql_siswa = "select * from tb_siswa where status='0' and id_kelas = '".$_SESSION[ 's_id_kelas']."'";
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
		<div id="page-wrapper">
			<div id="map_canvas" style="width: 800px; height: 600px"></div>
			<script type="text/javascript">
				//Icons
				var customIcons = {
					free: {
						icon: '../images/pin-green.png',
						shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
					},
					busy: {
						icon: '../images/pin-red.png',
						shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
					}
				};

				//Popup dos markers
				var infoWindow = null;

				//Visibilitas peta harus bersifat global
				var map = null;

				//Ini adalah susunan global penanda yang ada di layar
				var markersArray = [];

				/*
				 * Inisialisasi Google Maps API
				 */
				function initialize() {

					//Saya tidak akan menjelaskan yang jelas !!!
					var myLatlng = new google.maps.LatLng( -6.930447, 107.654425 );
					var myOptions = {
						zoom: 21,
						center: myLatlng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					}
					map = new google.maps.Map( document.getElementById( "map_canvas" ),
						myOptions );
					
					var triangleCoords = [ {
							lat: -6.930547,
							lng: 107.654587
						}, //kanan bawah
						{
							lat: -6.930447,
							lng: 107.654325
						}, ///kiri bawah
						{
							lat: -6.930347,
							lng: 107.654395
						}, //kiri atas
						{
							lat: -6.930437,
							lng: 107.654628
						} //kanan atas
					];

					// Construct the polygon.
					var bermudaTriangle = new google.maps.Polygon( {
						paths: triangleCoords,
						strokeColor: '#FF0000',
						strokeOpacity: 0.8,
						strokeWeight: 3,
						fillColor: '#FF0000',
						fillOpacity: 0.35
					} );
					bermudaTriangle.setMap( map );

					infoWindow = new google.maps.InfoWindow;

					//Metode ini saya buat untuk melakukan pemuatan penanda pada peta
					//Eksekusi segera !!!
					updateMaps();

					//Kami juga mendefinisikan eksekusi dengan interval waktu
					window.setInterval( updateMaps, 5000 );

				}

				/*
				 * Metode yang menghapus hamparan dari penanda
				 */
				function clearOverlays() {
					for ( var i = 0; i < markersArray.length; i++ ) {
						markersArray[ i ].setMap( null );
					}
				}

				/*
				 * Metode yang memanggil jalur data xml
				 * dan memperbarui peta
				 */
				function updateMaps() {

					// Mari kita hapus apa yang sudah overlay
					// Anda dapat menerapkan penghapusan dan penyisipan selektif
					clearOverlays();

					//Di sini adalah lompatan kucing, banyak orang kehilangan tidur malam
					//dan ketika Anda berhenti untuk melihat solusinya, sadarilah bahwa itu sangat jelas

					//Ketika kita memanggil file, browser dapat mengambil keputusan
					//ke cache. Jika browser menggunakan cache, selanjutnya
					//permintaan dari sumber yang sama tidak mengenai server.

					//Menentukan pengubah unik untuk file data yang kami dapat "DILAKUKAN"
					//browser untuk mengunduh file lagi.

					//Di Jawa saya menggunakan header http untuk mengatakan NO-CACHE !!

					var timestamp = new Date().getTime();
					var data = 'data.php?t=' + timestamp;

					//Me guardo o direito a não explicar o óbvio, novamente
					$.get( data, {}, function ( data ) {
						$( data ).find( "marker" ).each(
							function () {
								var marker = $( this );
								var status = marker.attr( "status" )
								var nis = marker.attr( "nis" )
								var icon = customIcons[ status ] || {};
								var latlng = new google.maps.LatLng( parseFloat( marker
									.attr( "lat" ) ), parseFloat( marker.attr( "lng" ) ) );
								var html = "<b><a href=\"#detail_siswa\" id=\"custId\" data-toggle=\"modal\" data-id=\""+nis+"\">"+ status + "</b></a>";
								var marker = new google.maps.Marker( {
									position: latlng,
									map: map,
									icon: icon.icon,
									shadow: icon.shadow,
								} );

								google.maps.event.addListener( marker, 'click', function () {
									infoWindow.setContent( html );
									infoWindow.open( map, marker );
								} );

								//Opa... bora guardar as referências dos markers??
								markersArray.push( marker );

								google.maps.event.addListener( marker, "click", function () {} );
							} );
					} );

				}

				google.setOnLoadCallback( initialize );
			</script>

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
		$halaman = 'admin';
		require('../footer.php');
	}else{
		echo( "<script> location.href ='../index.php';</script>" );
	}
	?>
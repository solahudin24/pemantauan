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
	<style>
		.customMarker {
			position: absolute;
			cursor: pointer;
			background: #424242;
			width: 100px;
			height: 100px;
			/* -width/2 */
			margin-left: -50px;
			/* -height + arrow */
			margin-top: -110px;
			border-radius: 50%;
			padding: 0px;
		}
		
		.customMarker:after {
			content: "";
			position: absolute;
			bottom: -10px;
			left: 40px;
			border-width: 10px 10px 0;
			border-style: solid;
			border-color: #424242 transparent;
			display: block;
			width: 0;
		}
		
		.customMarker img {
			width: 90px;
			height: 90px;
			margin: 5px;
			border-radius: 50%;
		}
	</style>
	<script>
		var refreshId = setInterval( function () {
			$( '.responsecontainer' ).load( 'batre.php' );
		}, 1000 );
		
		$.ajax( {
			type: 'post',
			url: 'angka_badge.php',
			data: {
				view: ''
			},
			dataType: "json",
			success: function ( data ) {
				$( '.angka-badge' ).html( data.jumlah );
			}
		} );

		$.ajax( {
			type: 'post',
			url: 'notifikasi.php',
			success: function ( data ) {
				$( '.notif' ).html( data );
			}
		} );

		
	</script>
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
			






				<a class="navbar-brand" href="../guru/home_guru.php">Guru</a>
			</div>
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">

				<li class="dropdown update-badge">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i><span class="badge angka-badge"></span> <i class="fa fa-caret-down"></i>
                    </a>
					
					<ul class="dropdown-menu dropdown-messages notif">

					</ul>
					<!-- /.dropdown-messages -->
				</li>
				<script>
					$( document ).on( 'click', '.update-badge', function () {

						//menampilkan jumlah status 1
						$.ajax( {
							type: 'post',
							url: 'angka_badge.php',
							data: {
								command: "update-badge"
							},
							dataType: "json",
							success: function ( data ) {
								$( '.angka-badge' ).html( data.jumlah );
							}
						} );
					} );
				</script>

				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
					</a>
				


					<ul class="dropdown-menu dropdown-user">

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
							<ul class="nav nav-second-level responsecontainer" aria-expanded="true" style>

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
			<div id="map" style="width: pxpx; height: 575px"></div>
			<script type="text/javascript">
				//Popup dos markers
				var infoWindow = null;

				//Visibilitas peta harus bersifat global
				var map = null;

				//Ini adalah susunan global penanda yang ada di layar
				var markersArray = [];
				var guruMarkerArray = [];
				var guruCircleArray = [];
				
				

				/*
				 * Inisialisasi Google Maps API
				 */
				function initialize() {

					//Saya tidak akan menjelaskan yang jelas !!!
					var myLatlng = new google.maps.LatLng( -6.930447, 107.654425 );
					var myOptions = {
						zoom: 12,
						center: myLatlng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					}
					map = new google.maps.Map( document.getElementById( "map" ),
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
					window.setInterval( updateMaps, 10000 );

				}

				/*
				 * Metode yang menghapus hamparan dari penanda
				 */

				function CustomMarker( latlng, map, imageSrc ) {
					this.latlng_ = latlng;
					this.imageSrc = imageSrc;

					// Once the LatLng and text are set, add the overlay to the map.  This will
					// trigger a call to panes_changed which should in turn call draw.
					this.setMap( map );
				}

				CustomMarker.prototype = new google.maps.OverlayView();

				CustomMarker.prototype.draw = function () {
					// Check if the div has been created.
					//			alert(this.div_);
					var div = this.div_;

					if ( !div ) {
						// Create a overlay text DIV
						div = this.div_ = document.createElement( 'div' );
						// Create the DIV representing our CustomMarker
						div.className = "customMarker"


						var img = document.createElement( "img" );

						img.src = this.imageSrc;
						div.appendChild( img );
						google.maps.event.addDomListener( div, "click", function ( event ) {
							google.maps.event.trigger( me, "click" );
						} );


						// Then add the overlay to the DOM
						var panes = this.getPanes();
						panes.overlayImage.appendChild( div );
					}

					// Position the overlay 
					var point = this.getProjection().fromLatLngToDivPixel( this.latlng_ );
					if ( point ) {
						div.style.left = point.x + 'px';
						div.style.top = point.y + 'px';
					}
				};

				CustomMarker.prototype.remove = function () {
					// Check if the overlay was on the map and needs to be removed.
					//					this.div_.parentNode.removeChild( this.div_ );
					//					this.div_ = null;
					if ( this.div_ ) {
						this.div_.parentNode.removeChild( this.div_ );
						this.div_ = null;
					}
				};

				CustomMarker.prototype.getPosition = function () {
					return this.latlng_;
				};

				function clearOverlays() {
					for ( var i = 0; i < markersArray.length; i++ ) {
						markersArray[ i ].setMap( null );
					}
					
					for ( var i = 0; i < guruMarkerArray.length; i++ ) {
						guruMarkerArray[ i ].setMap( null );
					}
					
					for ( var i = 0; i < guruCircleArray.length; i++ ) {
						guruCircleArray[ i ].setMap( null );
					}
				}


				/*
				 * Metode yang memanggil jalur data xml
				 * dan memperbarui peta
				 */

				var i = 0;

				function load_notification() {
					$.ajax( {
						type: 'post',
						url: 'angka_badge.php',
						data: {
							view: ''
						},
						dataType: "json",
						success: function ( data ) {
							$( '.angka-badge' ).html( data.jumlah );
						}
					} );

					$.ajax( {
						type: 'post',
						url: 'notifikasi.php',
						success: function ( data ) {
							$( '.notif' ).html( data );
						}
					} );
				}
				
				function showPosition(position) {
					var myLatLngGuru = {lat: position.coords.latitude, lng: position.coords.longitude};

					var markerGuru = new google.maps.Marker({
					  position: myLatLngGuru,
					  map: map,
						title: 'ini guru'
					});

					
					var guruCircle = new google.maps.Circle({
						strokeColor: '#FF0000',
						strokeOpacity: 0.8,
						strokeWeight: 2,
						fillColor: '#FF0000',
						fillOpacity: 0.35,
						map: map,
						center: {lat: position.coords.latitude, lng: position.coords.longitude},
						radius: 20
					  });
					
					guruMarkerArray.push(markerGuru);
					guruCircleArray.push(guruCircle);
				}
				

				function updateMaps() {
					
					if ( i != 0 ) {
						clearOverlays();
					} else {
						i = i + 1;
					}
					
					
						
					navigator.geolocation.getCurrentPosition(showPosition);
					
					
					
					
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

					var bermudaTriangle = new google.maps.Polygon( {
						paths: triangleCoords,
						strokeColor: '#FF0000',
						strokeOpacity: 0.8,
						strokeWeight: 3,
						fillColor: '#FF0000',
						fillOpacity: 0.35
					} );

					var timestamp = new Date().getTime();
					var data = 'data.php?t=' + timestamp;

					//Me guardo o direito a não explicar o óbvio, novamente
					$.get( data, {}, function ( data ) {
						$( data ).find( "marker" ).each(
							function () {
								var marker = $( this );


								var overlay = new CustomMarker( new google.maps.LatLng( parseFloat( marker.attr( "lat" ) ), parseFloat( marker.attr( "lng" ) ) ), map, "../images/siswa/" + marker.attr( "foto" ) );

								var myLatlng = new google.maps.LatLng( marker.attr( "lat" ), marker.attr( "lng" ) );

								var hasil = google.maps.geometry.poly.containsLocation( myLatlng, bermudaTriangle ) ? "didalam" : "diluar";

								if ( hasil == "diluar" && marker.attr( "status" ) == 0 ) {
									
									$.ajax( {
										type: 'post',
										url: 'update_notifikasi.php',
										data: {
											nis: marker.attr( "nis" ),
											kelas: marker.attr( "kelas" ),
											nama: marker.attr( "nama" ),
											perintah: "0 jadi 2"
										},
										success: function ( data ) {
											load_notification();
										}
									} );

								} else if ( hasil == "didalam" && marker.attr( "status" ) == 2 ) {
									
									$.ajax( {
										type: 'post',
										url: 'update_notifikasi.php',
										data: {
											nis: marker.attr( "nis" ),
											kelas: marker.attr( "kelas" ),
											nama: marker.attr( "nama" ),
											perintah: "2 jadi 0"
										},
										success: function ( data ) {
											load_notification();
										}
									} );
									
								}

								markersArray.push( overlay );
								
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
<?php
session_start();
if ( isset( $_SESSION[ 's_nuptk' ] ) ) {
	require "../koneksi.php";
	$link = koneksi_db();
	$title = 'Kepala Sekolah SLB C Sukapura Kota Bandung';
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
			



				<a class="navbar-brand" href="../kepala_sekolah/home_kepsek.php">Kepala Sekolah </a>
			</div>
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
		<div id="page-wrapper">
			<div id="map" style="width: pxpx; height: 575px"></div>
			<script type="text/javascript">
				//Icons


				//Popup dos markers
				var infoWindow = null;

				//Visibilitas peta harus bersifat global
				var map = null;

				//Ini adalah susunan global penanda yang ada di layar
				var markersArray = [];
				
				
				<?php
					$sql_siswa = "select * from tb_siswa where status='0'";
					$res_siswa = mysqli_query($link,$sql_siswa);
					$jumlah_siswa = mysqli_num_rows($res_siswa);
					for($i = 0 ; $i<$jumlah_siswa ; $i++){
						echo "var overlay".$i.";";
					}
				?>
				
				



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
					window.setInterval( updateMaps, 5000 );

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
					this.div_.parentNode.removeChild( this.div_ );
					this.div_ = null;
				};

				CustomMarker.prototype.getPosition = function () {
					return this.latlng_;
				};

				function clearOverlays() {
					for (var i = 0; i < markersArray.length; i++ ) {
	   					markersArray[i].setMap(null);
	  				}
				}

				/*
				 * Metode yang memanggil jalur data xml
				 * dan memperbarui peta
				 */

				var i = 0;
				
				function updateMaps() {

					if ( i != 0 ) {
						clearOverlays();
					} else {
						i = i + 1;
					}
					
					var timestamp = new Date().getTime();
					var data = 'data.php?t=' + timestamp;

					//Me guardo o direito a não explicar o óbvio, novamente
					$.get( data, {}, function ( data ) {
						$( data ).find( "marker" ).each(
							function () {
								var marker = $( this );
							

								var overlay = new CustomMarker( new google.maps.LatLng( parseFloat( marker.attr( "lat" ) ), parseFloat( marker.attr( "lng" ) ) ), map, "../images/siswa/" + marker.attr( "foto" ) );
								
								markersArray.push(overlay);
								
								
							} );
					} );
					
					

					

				}

				google.setOnLoadCallback( initialize );
			</script>

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
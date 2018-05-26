<script>
				// This example creates a simple polygon representing the Bermuda Triangle.
				// When the user clicks on the polygon an info window opens, showing
				// information about the polygon's coordinates.

				var map;
				var infoWindow;
				
				function initMap() {
					map = new google.maps.Map( document.getElementById( 'map' ), {
						zoom: 25,
						center: {
							lat: -6.930447,
							lng: 107.654425
						},
						mapTypeId: 'terrain'
					} );
					<?php 
						$marker = "marker";
						$latlng = "myLatLng";
						$nilai = 1;
						$sql_siswa = "select * from tb_siswa where status='0' and id_kelas = '".$_SESSION[ 's_id_kelas']."'";
						$res_siswa = mysqli_query($link,$sql_siswa);
						while($data_siswa = mysqli_fetch_array($res_siswa)){
							
					?>
							var  <?php echo $latlng.$nilai; ?> = {
								lat: <?php echo $data_siswa['lat']; ?>,
								lng: <?php echo $data_siswa['longitude']; ?>
							};

							var <?php echo $marker.$nilai; ?> = new google.maps.Marker( {
								position: <?php echo $latlng.$nilai; ?>,
								map: map,
								title: '<?php echo $data_siswa['nama']; ?>'
							} );
					<?php
							$nilai= $nilai + 1;
						}
						
					?>



					// Define the LatLng coordinates for the polygon.
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

					// Add a listener for the click event.
					bermudaTriangle.addListener( 'click', showArrays );

					infoWindow = new google.maps.InfoWindow;
				}

				/** @this {google.maps.Polygon} */
				function showArrays( event ) {
					// Since this polygon has only one path, we can call getPath() to return the
					// MVCArray of LatLngs.
					var vertices = this.getPath();

					var contentString = '<b>Bermuda Triangle polygon</b><br>' +
						'Clicked location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
						'<br>';

					// Iterate over the vertices.
					for ( var i = 0; i < vertices.getLength(); i++ ) {
						var xy = vertices.getAt( i );
						contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' +
							xy.lng();
					}

					// Replace the info window's content and position.
					infoWindow.setContent( contentString );
					infoWindow.setPosition( event.latLng );

					infoWindow.open( map );
				}
			</script>
			<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeSbTd4xPktRSQwbytnDN33ugM6sJrq_0&callback=initMap">
			</script>



<!--sementara-->
<?php 
					$sql_siswa = "select * from tb_siswa where status='0' and id_kelas = '".$_SESSION[ 's_id_kelas']."'";
								$res_siswa = mysqli_query($link,$sql_siswa);
					while($data_siswa = mysqli_fetch_array($res_siswa)){
				?>
				var foto_<?php echo $data_siswa['nis']; ?> = {
					url: "../images/siswa/<?php echo $data_siswa['foto']; ?>", // url
					scaledSize: new google.maps.Size( 50, 50 ), // scaled size
					origin: new google.maps.Point( 0, 0 ), // origin
					anchor: new google.maps.Point( 0, 0 ) // anchor
				};
				<?php
					}
	?>

				var customIcons = {
					<?php
					$sql_siswa = "select * from tb_siswa where status='0' and id_kelas = '".$_SESSION[ 's_id_kelas']."'";
					$res_siswa = mysqli_query($link,$sql_siswa);
					while($data_siswa = mysqli_fetch_array($res_siswa)){
	?>
					icon<?php echo $data_siswa['nis']; ?>: {
						icon: foto_<?php echo $data_siswa['nis']; ?>,
						shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
					},
					<?php
					}
	?>
				};
<!--custom marker-->
<script>
function CustomMarker( latlng, map, imageSrc ) {
					this.latlng_ = latlng;
					this.imageSrc = imageSrc;
					this.map_ = map;
					// Once the LatLng and text are set, add the overlay to the map.  This will
					// trigger a call to panes_changed which should in turn call draw.
					this.setMap( map );
				}

				CustomMarker.prototype = new google.maps.OverlayView();

				CustomMarker.prototype.draw = function () {
					// Check if the div has been created.

					var div = this.div_;

					if ( !div ) {
						// Create a overlay text DIV
						div = this.div_ = document.createElement( 'div' );
						// Create the DIV representing our CustomMarker
						div.id = "customMarker"


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
					var i; 
					if (this.div_.parentNode) {
						this.div_.parentNode.removeChild(this.div_); 
					} 
				};

				CustomMarker.prototype.getPosition = function () {
					return this.latlng_;
				};

				CustomMarker.prototype.toggleDOM = function () {
					if ( this.getMap() ) {
						// Note: setMap(null) calls OverlayView.onRemove()
						this.setMap( null );
					} else {
						this.setMap( this.map_ );
					}
				};

new CustomMarker( new google.maps.LatLng( parseFloat( marker.attr( "lat" ) ), parseFloat( marker.attr( "lng" ) ) ), map, "../images/siswa/" + marker.attr( "foto" ) )
	
	
									var nama = marker.attr( "nama" );
																	var nis = marker.attr( "nis" );
																	var icon = customIcons[ nis ] || {};
																	var latlng = new google.maps.LatLng( parseFloat( marker.attr( "lat" ) ), parseFloat( marker.attr( "lng" ) ) );
																	var html = "<b><a href=\"#detail_siswa\" id=\"custId\" data-toggle=\"modal\" data-id=\"" + nis + "\">" + nama + "</b></a>";
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
									
																	markersArray.push( marker );
																	
																	google.maps.event.addListener( marker, "click", function () {} );
</script>
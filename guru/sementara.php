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
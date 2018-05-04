<?php 
	require "../koneksi.php";
	$link = koneksi_db();
	$title = 'Administrator SLB C Sukapura Kota Bandung';
	$halaman = 'admin';
	require( '../header.php' );
?>
	<style>
		/* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
		/* Optional: Makes the sample page fill the window. */
		
		html,
		body {
			height: 100%;
			margin: 20;
			padding: 20;
		}
		
		#map {
			height: 400px;
			width: 100%;
		}
	</style>

<body>
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
			


				<a class="navbar-brand" href="home_admin.php">Orangtua</a>
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
						<li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
						</li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->
		</nav>

	</div>
	<div id="map"></div>
	
	<?php 
	//lokasi siswa
      	$query = "SELECT * FROM tb_siswa WHERE nis = '111'";
		$res = mysqli_query( $link, $query );
		while ( $row = mysqli_fetch_assoc( $res ) ) {
			$nama = $row['nama'];
			$latitude=$row['lat'];
			$longitude=$row['longitude'];
		}
		
     ?>
    <script>
    var nama = '<?php echo $nama; ?>';
    var lat = '<?php echo $latitude;?>';
    var longitude = '<?php echo $longitude;?>';
      // This example creates a simple polygon representing the Bermuda Triangle.
      // When the user clicks on the polygon an info window opens, showing
      // information about the polygon's coordinates.

      var map;
      var infoWindow;

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 25,
          center: {lat: -6.930447, lng: 107.654425},
          mapTypeId: 'terrain'
        });

        var myLatLng = {lat: -6.930447, lng: 107.654425};

		  var marker = new google.maps.Marker({
		    position: myLatLng,
		    map: map,
		    title: nama
		  });


        // Define the LatLng coordinates for the polygon.
        var triangleCoords = [
            {lat: -6.930547, lng: 107.654587},//kanan bawah
            {lat: -6.930447, lng: 107.654325},///kiri bawah
            {lat: -6.930347, lng: 107.654395},//kiri atas
            {lat: -6.930437, lng: 107.654628} //kanan atas
        ];

        // Construct the polygon.
        var bermudaTriangle = new google.maps.Polygon({
          paths: triangleCoords,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#FF0000',
          fillOpacity: 0.35
        });
        bermudaTriangle.setMap(map);

        // Add a listener for the click event.
        bermudaTriangle.addListener('click', showArrays);

        infoWindow = new google.maps.InfoWindow;
      }

      /** @this {google.maps.Polygon} */
      function showArrays(event) {
        // Since this polygon has only one path, we can call getPath() to return the
        // MVCArray of LatLngs.
        var vertices = this.getPath();

        var contentString = '<b>Bermuda Triangle polygon</b><br>' +
            'Clicked location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
            '<br>';

        // Iterate over the vertices.
        for (var i =0; i < vertices.getLength(); i++) {
          var xy = vertices.getAt(i);
          contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' +
              xy.lng();
        }

        // Replace the info window's content and position.
        infoWindow.setContent(contentString);
        infoWindow.setPosition(event.latLng);

        infoWindow.open(map);
      }
    </script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeSbTd4xPktRSQwbytnDN33ugM6sJrq_0&callback=initMap">
	</script>





</body>

</html>
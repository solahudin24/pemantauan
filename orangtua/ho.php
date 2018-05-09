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

<body onload="initialize()">
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
      var marker;
      function initialize() {
          
        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;
        
        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        } 
        
        // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('map'){
          zoom: 25,
          center: {lat: -6.930447, lng: 107.654425},
          mapTypeId: 'terrain'
        });
              
        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();

        // Pengambilan data dari database
        <?php
            $query = mysqli_query($con,"select * from tb_siswa");
            while ($data = mysqli_fetch_array($query))
            {
                $nama = $data['nama'];
                $lat = $data['lat'];
                $lon = $data['lonngitude'];
                
                echo ("addMarker($lat, $lon, '<b>$nama</b>');\n");                        
            }
          ?>
          
        // Proses membuat marker 
        function addMarker(lat, lng, info) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: map,
                position: lokasi
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
         }
        
        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
        }
      google.maps.event.addDomListener(window, 'load', initialize);
      
      }
    </script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeSbTd4xPktRSQwbytnDN33ugM6sJrq_0&callback=initMap">
	</script>





</body>

</html>
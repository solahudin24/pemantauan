<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="cordova.js"></script>
    <script type="text/javascript">
    var map;
    document.addEventListener("deviceready", function() {
      var div = document.getElementById("map_canvas");

      // Initialize the map view
      map = plugin.google.maps.Map.getMap(div);

      // Wait until the map is ready status.
      map.addEventListener(plugin.google.maps.event.MAP_READY, onMapReady);
    }, false);

    function onMapReady() {
      const GORYOKAKU_JAPAN = new plugin.google.maps.LatLng(41.796875,140.757007);

      map.animateCamera({
          'target': GORYOKAKU_JAPAN,
          'zoom': 18,
      }, function() {
        console.log("The animation is done");
      });
    }
    </script>
  </head>
  <body>
    <h3>Cordova-GoogleMaps-Plugin</h3>
    <div style="width:100%;height:400px" id="map_canvas"></div>
  </body>
</html>
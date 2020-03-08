<?php

//make connection to db
$conn=mysqli_connect('localhost','root','','map');

//select db
// mysqli_select_db('map');
$sql="SELECT * FROM location_and_information";

$records=mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html>
<head>
<title>Your Location Map</title>
<meta name="viewport" content="initial-scale=1.0, width=device-width" />
<link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css?dp-version=1542186754" />
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>

<style type="text/css">
 #map { 
 
    border: solid 3px;

}
body{
  background-color: #fcf3cf;
}
</style>

</head>
<body>



<center>
<h1><u><strong>Your Project Details:</strong></u></h1>
</center>
<center>
  <table width="600" border="1" cellpadding="1" cellspacing="1">

  <tr>
  <th>ProjectName</th>
  <th>ProjectType</th>
  <th>VillageName</th>
  <th>TehsilName</th>
  <th>DistrictName</th>
  <th>StateName</th>
  <th>Latitude</th>
  <th>Longitude</th>


  </tr>
  </center>
<?php
    while($location_and_information=mysqli_fetch_assoc($records)){

     echo "<tr>";

     echo"<td>".$location_and_information['ProjectName']."</td>";
      echo"<td>".$location_and_information['ProjectType']."</td>";

 echo"<td>".$location_and_information['VillageName']."</td>";

 echo"<td>".$location_and_information['TehsilName']."</td>";

 echo"<td>".$location_and_information['DistrictName']."</td>";

 echo"<td>".$location_and_information['StateName']."</td>";

 echo"<td>".$location_and_information['Latitude']."</td>";

 echo"<td>".$location_and_information['Longitude']."</td>";

     echo"</tr>";
    }//end while

?>



  </table>
  <br>
  <div id="map" style="width: 100%; height: 400px; background: grey" />
  <script  type="text/javascript" charset="UTF-8" >
    
/**
 * Adds a polyline between Dublin, London, Paris and Berlin to the map
 *
 * @param  {H.Map} map      A HERE Map instance within the application
 */
function addPolylineToMap(map) {
  var lineString = new H.geo.LineString();
var lat=[<?php
$conn=mysqli_connect("localhost","root","","map");
 $sql="SELECT * FROM location_and_information";
 $records=mysqli_query($conn,$sql);
 $i=0;
  while($location_and_information=mysqli_fetch_assoc($records)){
    
    if($i==0){
      echo $location_and_information['Latitude'];
    }
    else{
      echo ','.$location_and_information['Latitude'];
    }
    $i=$i+1;
  }
 ?>];
var lon=[<?php
$conn=mysqli_connect("localhost","root","","map");
 $sql="SELECT * FROM location_and_information";
 $records=mysqli_query($conn,$sql);
 $i=0;
  while($location_and_information=mysqli_fetch_assoc($records)){
    
    if($i==0){
      echo $location_and_information['Longitude'];
    }
    else{
      echo ','.$location_and_information['Longitude'];
    }
    $i=$i+1;
  }
 ?>];
 var i=0;
 var j=lat.length;
  while(i<j){
    lineString.pushPoint({lat:parseFloat(lat[i]), lng:parseFloat(lon[i])});
    i=i+1;
  }
  
  map.addObject(new H.map.Polyline(
    lineString, { style: { lineWidth: 4 }}
  ));
}
/**
 * Boilerplate map initialization code starts below:
 */
//Step 1: initialize communication with the platform
var platform = new H.service.Platform({
 app_id: 'NYxgUKPDa0gcIklkEhDy',
  app_code: 'WKEwHBeahatrveb7tR_oJA',
  useHTTPS: true
});
var pixelRatio = window.devicePixelRatio || 1;
var defaultLayers = platform.createDefaultLayers({
  tileSize: pixelRatio === 1 ? 256 : 512,
  ppi: pixelRatio === 1 ? undefined : 320
});
//Step 2: initialize a map - this map is centered over Europe
var map = new H.Map(document.getElementById('map'),
  defaultLayers.normal.map,{
  center: {lat:28.631, lng:77.2173},
  zoom: 5,
  pixelRatio: pixelRatio
});
//Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
// Create the default UI components
var ui = H.ui.UI.createDefault(map, defaultLayers);
// Now use the map as required...
addPolylineToMap(map);

  </script>
  <br>
  <button style="padding: 5px;" title="You will be redirected to Registration Page" type="button"  onclick="location.href='http://localhost/testing/Login_v16/index.php';" onclick="">OK</button>


</body>
</html>


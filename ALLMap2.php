<!DOCTYPE html>
<html>
<head>
<title>All Location Map</title>
<meta name="viewport" content="initial-scale=1.0, width=device-width" />
<link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css?dp-version=1542186754" />
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
</head>
<body>
<style type="text/css">
  
 #map { 
 
    border: solid 3px ;

}
body{
  background-color: #fcf3cf;
}
</style>


  <div id="map" style="width: 50%; height: 700px; background: grey" />
  <div id="panel" style="position:absolute; width:49%; left:51%; height:100%; background:white" ></div>

  <script  type="text/javascript" charset="UTF-8" >
    

function addPolylineToMap(map) {
  

var lat=[<?php
$conn=mysqli_connect("localhost", "root","","map");
 $sql="SELECT  Latitude FROM original_data order by UserName,SerialNumber";
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
var projectNames=[<?php
$conn=mysqli_connect("localhost", "root","","map");
 $sql="SELECT ProjectName FROM original_data order by UserName,SerialNumber";
 $records=mysqli_query($conn,$sql);
 $i=0;
  while($location_and_information=mysqli_fetch_assoc($records)){
    
    if($i==0){
      echo '\''.$location_and_information['ProjectName'].'\'';
    }
    else{
      echo ','.'\''.$location_and_information['ProjectName'].'\'';
    }
    $i=$i+1;
  }
 ?>];
var lon=[<?php
$conn=mysqli_connect("localhost", "root","","map");
 $sql="SELECT Longitude FROM original_data order by UserName,SerialNumber";
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

// Get Intersection Points from DATABASE
var lat_intersection=[<?php
$conn=mysqli_connect("localhost", "root","","map");
 $sql="SELECT Latitude FROM intersectionpoints order by SerialNumber";
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

 var lon_intersection=[<?php
$conn=mysqli_connect("localhost", "root","","map");
 $sql="SELECT Longitude FROM intersectionpoints order by SerialNumber";
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
 
var n=projectNames.length;
var count=0;
var flag=0;
var colors=["maroon", "red", "purple", "fushsia", "green", "lime", "olive", "yellow", "navy", "blue", "teal","aqua"];
var lencolor=colors.length;

while(count<n-1){
  if(flag==0){
      var lineString = new H.geo.LineString(); 
  }
  if(count>=n-2){
    lineString.pushPoint({lat:parseFloat(lat[count]), lng:parseFloat(lon[count])});
    lineString.pushPoint({lat:parseFloat(lat[count+1]), lng:parseFloat(lon[count+1])});
    map.addObject(new H.map.Polyline(
    lineString, { style: { lineWidth: 4 ,strokeColor: colors[count%lencolor]}}));
  }
  else{
  if(projectNames[count]==projectNames[count+1])
    {
      lineString.pushPoint({lat:parseFloat(lat[count]), lng:parseFloat(lon[count])});
      flag=1;
    }
  else
    {
      lineString.pushPoint({lat:parseFloat(lat[count]), lng:parseFloat(lon[count])});
       map.addObject(new H.map.Polyline(
      lineString, { style: { lineWidth: 4,strokeColor: colors[count%lencolor]} }));
      flag=0;
    }
 }

  count=count+1;
}

for (var i = 0; i < lat_intersection.length; i++) {
  var marker = new H.map.Marker({lat:parseFloat(lat_intersection[i]), lng:parseFloat(lon_intersection[i])});
  // add 'tap' event listener, that opens info bubble, to the group
  marker.addEventListener('tap', function (evt) {
    // event target is the marker itself, group is a parent event target
    // for all objects that it contains
    var bubble =  new H.ui.InfoBubble(evt.target.getPosition(), {
      // read custom data
      content: evt.target.getData()
    });
    // show info bubble
    ui.addBubble(bubble);
  }, false);
  var bubble_data=lat_intersection[i]+","+lon_intersection[i];
  addMarkerToGroup(marker,'<div>Location : </a>'+bubble_data+'</div>',map);
  save1(lat_intersection[i],lon_intersection[i]);
  //map.addObject(marker_intersection);
}

}

function addMarkerToGroup(marker,html,map) {
  marker.setData(html);
  map.addObject(marker);
}

// get info on Intersection Points

function save1(lat,lon){
var platform = new H.service.Platform({
  app_id: 'NYxgUKPDa0gcIklkEhDy',
  app_code: 'WKEwHBeahatrveb7tR_oJA',
  useHTTPS: true
});

reverseGeocode(platform,lat,lon);

}



function reverseGeocode(platform,lat,lon) {

var add= new String(lat+","+lon+",1");
var geocoder = platform.getGeocodingService(),
    reverseGeocodingParameters = {
      prox: add,
      mode: 'retrieveAddresses',
      maxresults: '1',
      jsonattributes : 1
    };

  geocoder.reverseGeocode(
    reverseGeocodingParameters,
    onSuccess,
    onError
  );

 }

 function onError(error) 
{
 console.log("Not Found")
  alert('Ooops!');
}

function onSuccess(result) {
  var locations = result.response.view[0].result;

  addLocationsToPanel(locations);

}

function addLocationsToPanel(locations){
 var nodeOL = document.createElement('ul'),
    i;

  nodeOL.style.fontSize = 'small';
  nodeOL.style.marginLeft ='5%';
  nodeOL.style.marginRight ='5%';


   for (i = 0;  i < locations.length; i += 1) {
     var li = document.createElement('li'),
        divLabel = document.createElement('div'),
        address = locations[i].location.address,
        content =  '<strong style="font-size: large;">' + address.label  + '</strong></br>';
        position = {
          lat: locations[i].location.displayPosition.latitude,
          lng: locations[i].location.displayPosition.longitude
        };

      content += '<strong>houseNumber:</strong> ' + address.houseNumber + '<br/>';
      content += '<strong>street:</strong> '  + address.street + '<br/>';
      content += '<strong>district:</strong> '  + address.district + '<br/>';
      content += '<strong>city:</strong> ' + address.city + '<br/>';
      content += '<strong>postalCode:</strong> ' + address.postalCode + '<br/>';
      content += '<strong>county:</strong> ' + address.county + '<br/>';
      content += '<strong>country:</strong> ' + address.country + '<br/>';
      content += '<br/><strong>position:</strong> ' +
        Math.abs(position.lat.toFixed(4)) + ((position.lat > 0) ? 'N' : 'S') +
        ' ' + Math.abs(position.lng.toFixed(4)) + ((position.lng > 0) ? 'E' : 'W');

      divLabel.innerHTML = content;
      li.appendChild(divLabel);

      nodeOL.appendChild(li);

  }

  locationsContainer.appendChild(nodeOL);

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
var locationsContainer = document.getElementById('panel');


// Now use the map as required...
addPolylineToMap(map);
  </script>
</body>
</html>
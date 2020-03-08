

<h2><u><center>Please Confirm Your Data :</center></u></h2>
<br>
<div class="data">
Welcome :

  <u><?php echo $_POST["username"]; ?></u>
 
<br>
 Your Project Name is: <u><?php echo $_POST["Pname"]; ?></u>
<br>
Your Selected Project Type is: <u><?php echo $_POST["PTname"]; ?></u>
<br>
Your Selected Village is: <u><?php echo $_POST["Vname"]; ?></u>
<br>
Your Selected Tehsil is: <u><?php echo $_POST["Tname"]; ?></u>
<br>
Your Selected District is: <u><?php echo $_POST["Dname"]; ?></u>
<br>
Your Selected State is: <u><?php echo $_POST["Sname"]; ?></u>
<br>
<br>
</div>
<br>
<h2><u>Check your location on the MAP given below:</u></h2>
<a href="#" onclick="javascript:window.close();opener.window.focus();" >
    <button class="button" title="Change any mistake in the form">Make Changes</button>
</a> 

 <button  class="button" title="Once submitted data will be saved" type="button"  onclick="javascript:submission();">Final Submission</button>

<br><br>

<!DOCTYPE html>
<html>
<head>
<title>Map</title>
<meta name="viewport" content="initial-scale=1.0, width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css?dp-version=1542186754" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>

<style type="text/css">
  .button {
  display: inline-block;
  padding: 10px;
  font-size: 15px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: darkblue;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}


.button:active {
  background-color: darkblue;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
  .data{

    font-size: 30px;
    text-indent: block;
    background-color: powderblue;
  }
  #map { 
 
    border: solid 3px;
    

}
body{
  background-color: powderblue;
}
</style>


</head>
<body>

  <div id="map" style="position:absolute; width:49%; height:100%; background:grey" ></div>
  <div id="panel" style="position:absolute; width:49%; left:51%; height:100%; background:inherit" ></div>

  <script  type="text/javascript" charset="UTF-8" >
    


/**
 * Calculates and displays the address details of 200 S Mathilda Ave, Sunnyvale, CA
 * based on a free-form text
 *
 *
 * A full list of available request parameters can be found in the Geocoder API documentation.
 * see: http://developer.here.com/rest-apis/documentation/geocoder/topics/resource-geocode.html
 *
 * @param   {H.service.Platform} platform    A stub class to access HERE services
 */
function geocode(platform,m) {
  var geocoder = platform.getGeocodingService(),
    geocodingParameters = {
      searchText: m,
      jsonattributes : 1
    };

  geocoder.geocode(
    geocodingParameters,
    onSuccess,
    onError
  );
}
/**
 * This function will be called once the Geocoder REST API provides a response
 * @param  {Object} result          A JSONP object representing the  location(s) found.
 *
 * see: http://developer.here.com/rest-apis/documentation/geocoder/topics/resource-type-response-geocode.html
 */
function onSuccess(result) {
  var locations = result.response.view[0].result;
 /*
  * The styling of the geocoding response on the map is entirely under the developer's control.
  * A representitive styling can be found the full JS + HTML code of this example
  * in the functions below:
  */
  addLocationsToMap(locations);
  addLocationsToPanel(locations);
  // ... etc.
}

/**
 * This function will be called if a communication error occurs during the JSON-P request
 * @param  {Object} error  The error message received.
 */
function onError(error) {
  alert('Ooops!');
}




/**
 * Boilerplate map initialization code starts below:
 */

var VillageName=new String(<?php echo $_POST['Vname'] ?> );
var TehsilName=new String(<?php echo $_POST['Tname'] ?> );
var DistrictName=new String(<?php echo $_POST['Dname'] ?> );
var StateName=new String(<?php echo $_POST['Sname'] ?> );
var m=VillageName+" "+TehsilName+" "+DistrictName+" "+StateName;

var lat;
var long;

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

//Step 2: initialize a map - this map is centered over California
var map = new H.Map(document.getElementById('map'),
  defaultLayers.normal.map,{
  center: {lat:37.376, lng:-122.034},
  zoom: 15,
  pixelRatio: pixelRatio
});

var locationsContainer = document.getElementById('panel');

//Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

// Create the default UI components
var ui = H.ui.UI.createDefault(map, defaultLayers);

// Hold a reference to any infobubble opened
var bubble;

/**
 * Opens/Closes a infobubble
 * @param  {H.geo.Point} position     The location on the map.
 * @param  {String} text              The contents of the infobubble.
 */
function openBubble(position, text){
 if(!bubble){
    bubble =  new H.ui.InfoBubble(
      position,
      {content: text});
    ui.addBubble(bubble);
  } else {
    bubble.setPosition(position);
    bubble.setContent(text);
    bubble.open();
  }
}

/**
 * Creates a series of list items for each location found, and adds it to the panel.
 * @param {Object[]} locations An array of locations as received from the
 *                             H.service.GeocodingService
 */
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
      
      lat=new String(Math.abs(position.lat.toFixed(4)) + ((position.lat > 0) ? 'N' : 'S'));
      long=new String(Math.abs(position.lng.toFixed(4)) + ((position.lng > 0) ? 'E' : 'W'));

      divLabel.innerHTML = content;
      li.appendChild(divLabel);

      nodeOL.appendChild(li);
      openBubble(position,address.city)
  }
 
  locationsContainer.appendChild(nodeOL);
}


/**
 * Creates a series of H.map.Markers for each location found, and adds it to the map.
 * @param {Object[]} locations An array of locations as received from the
 *                             H.service.GeocodingService
 */
function addLocationsToMap(locations){
  var group = new  H.map.Group(),
    position,
    i;

  // Add a marker for each location found
  for (i = 0;  i < locations.length; i += 1) {
    position = {
      lat: locations[i].location.displayPosition.latitude,
      lng: locations[i].location.displayPosition.longitude
    };
    marker = new H.map.Marker(position);
    marker.label = locations[i].location.address.label;
    group.addObject(marker);
  }

  group.addEventListener('tap', function (evt) {
    map.setCenter(evt.target.getPosition());
    openBubble(
       evt.target.getPosition(), evt.target.label);
  }, false);

  // Add the locations group to the map
  map.addObject(group);
  map.setCenter(group.getBounds().getCenter());
}

// Now use the map as required...
geocode(platform,m);

function submission(){

var data = {

  UserName: <?php echo $_POST['username'] ?>+ "" ,
  Password: <?php echo $_POST['password'] ?>+ "" ,
  EmailId: <?php echo $_POST['email'] ?>+ "" ,
   ProjectName : <?php echo $_POST['Pname'] ?>+ "" ,
   ProjectType: <?php echo $_POST['PTname'] ?>+ "" ,
   VillageName : <?php echo $_POST['Vname'] ?>+ "" ,
   TehsilName : <?php echo $_POST['Tname'] ?>+ "",
   DistrictName : <?php echo $_POST['Dname'] ?>+ "",
   StateName : <?php echo $_POST['Sname'] ?>+ "",
   LAT: lat,
   LONG : long
};
$.post("dataEntry.php",data);
alert("You can close the window now");
window.close();

}
  
</script>

</body>
</html>
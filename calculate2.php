

<!DOCTYPE html>
<html>
<head>
<title>Register Page</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
</head>
<body>

<div class="header">
	<h2>Register</h2>
</div>
<form method="post" action="Individual_Data_Entry_Form.php">

	<div class="input-group">
			<label style="color: white"><strong>USERNAME</strong></label>
						<input readonly  type="text" name="username" id="sample"  value="'<?php echo $_POST['username'] ?>'">
	</div>
	<div class="input-group">
			<label style="color: white"><strong>EMAIL ID</strong></label>
						<input readonly  type="text" name="email" id="sample"  value="'<?php echo $_POST['email'] ?>'">
	</div>
	<div class="input-group">
			<label style="color: white"><strong>PASSWORD</strong></label>
						<input readonly class="input100" type="pass" name="password" id="sample"  value="'<?php echo $_POST['password'] ?>'">
</div>
<div class="input-group">
      <label style="color: white"><strong>ProjectName</strong></label>
            <input readonly  type="text" name="projectname" id="sample"  value="'<?php echo $_POST['projectname'] ?>'">
  </div>
  <div class="input-group">
      <label style="color: white"><strong>Radius</strong></label>
            <input readonly class="input100" type="text" name="radius" id="sample"  value="'<?php echo $_POST['radius'] ?>'">
</div>

	<center>
	<div class="input-group">
			<button  class="button" title="Once submitted data will be saved" type="submit">
			Fill Places Individually
			</button>
	</div>
	<div class="input-group">
			<button  class="button" title="Once submitted data will be saved" type="button" style="color:white" onclick="location.href='Excel_Plugin/Excel_Upload_Page.php';">
			Upload EXCEL SHEET
			</button>
	</div>
  
   </center>
	</form>


  <form method="post" action="excel_export.php">
    <div class="input-group">

      <label style="color: white"><strong>Download Section 164!</strong></label>
      <label style="color: white"><strong>Enter ProjectName</strong></label>
            <input  type="text" name="projectname" id="projectname"  value="<?php echo $_POST['projectname'] ?>">
  </div>
  <center>
	<div class="input-group">
      <button class="button"  type="submit">Download 164</button>
      </button>
  </div>
  </center>

</form>





<script type="text/javascript">

function download(){
var dataPakage = {
 ProjectName: <?php echo "'".$_POST['projectname']."'" ?>+ "" , 
 };
 $.post("excel_export.php",dataPakage);
}





function save1(){
var platform = new H.service.Platform({
  app_id: 'NYxgUKPDa0gcIklkEhDy',
  app_code: 'WKEwHBeahatrveb7tR_oJA',
  useHTTPS: true
});

reverseGeocode(platform);

}

function reverseGeocode(platform) {

  // Latitude is extracted
var lat=[<?php
$conn=mysqli_connect("localhost", "root","","map");
 $sql="SELECT Latitude FROM village_data order by SerialNumber";
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

// Longitude is Extrated
 var lon=[<?php
$conn=mysqli_connect("localhost", "root","","map");
 $sql="SELECT Longitude FROM village_data order by SerialNumber";
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
 // get serial number also
  var SN=[<?php
$conn=mysqli_connect("localhost", "root","","map");
 $sql="SELECT SerialNumber as SN FROM village_data order by SerialNumber";
 $records=mysqli_query($conn,$sql);
 $i=0;
  while($location_and_information=mysqli_fetch_assoc($records)){
    
    if($i==0){
      echo $location_and_information['SN'];
    }
    else{
      echo ','.$location_and_information['SN'];
    }
    $i=$i+1;
  }
 ?>];

 var n=lat.length;
 var count=0;
 
// send the original lat and lon from: village data to original data
while(count<=n-1){
 
var add= new String(lat[count]+","+lon[count]+","+<?php echo "'".$_POST['radius']."'" ?>);
    // transfer daa from village_c to its dublicate to onsiver original data;
    transferDATA(lat[count],lon[count],SN[count]);

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
count=count+1;
 }
}

function getNeededData() {

  // get data 
  // can also store as dictionary of project name and count, so as to make array smaller
var pName=[<?php
$conn=mysqli_connect("localhost", "root","","map");
 $sql="SELECT ProjectName FROM original_data Group By ProjectName order by ProjectName,SerialNumber";
 $records=mysqli_query($conn,$sql);
 $i=0;
  while($location_and_information=mysqli_fetch_assoc($records)){
    
    if($i==0){
      echo "'".$location_and_information['ProjectName']."'";
    }
    else{
      echo ','."'".$location_and_information['ProjectName']."'";
    }
    $i=$i+1;
  }
 ?>];

//get the Project Name

var currProjectName = <?php echo "'".$_POST['projectname']."'" ?>;

// check if current project is in DB
var flag = 0;
var currProjectIndicator=0;

for(i=0;i<pName.length;i++){
  if((currProjectName == pName[i]) && flag!=1){
    console.log("Project Is Present");
    flag = 1;
    currProjectIndicator = i;
  }
  if(flag == 1){
    break;
  }
}
console.log(flag);
// if the project is present !! then perform the calculations
if(flag==1)
{
// get current project data if it was here


 var lat=[<?php
$pro = $_POST['projectname'];
$conn=mysqli_connect("localhost", "root","","map");
$sql = "SELECT original_data.Latitude as Lat from original_data WHERE ProjectName like'".$pro."'";
$records=mysqli_query($conn,$sql);
 $i=0;
  while($location_and_information=mysqli_fetch_assoc($records)){
    
    if($i==0){
      echo $location_and_information['Lat'];
    }
    else{
      echo ','.$location_and_information['Lat'];
    }
    $i=$i+1;
  }
 ?>];


var lon=[<?php
$pro = $_POST['projectname'];
$conn=mysqli_connect("localhost", "root","","map");
$sql = "SELECT original_data.Longitude as Lon from original_data WHERE ProjectName like'".$pro."'";
$records=mysqli_query($conn,$sql);
 $i=0;
  while($location_and_information=mysqli_fetch_assoc($records)){
    
    if($i==0){
      echo $location_and_information['Lon'];
    }
    else{
      echo ','.$location_and_information['Lon'];
    }
    $i=$i+1;
  }
 ?>];

// get the other projects data 

 var lat2=[<?php
$pro = $_POST['projectname'];
$conn=mysqli_connect("localhost", "root","","map");
$sql = "SELECT original_data.Latitude as Lat from new2 NATURAL join original_data WHERE DistrictName in (SELECT DISTINCT(DistrictName) from new2 WHERE ProjectName like '".$pro."') and ProjectName not LIKE "."'".$pro."'";
$records=mysqli_query($conn,$sql);
 $i=0;
  while($location_and_information=mysqli_fetch_assoc($records)){
    
    if($i==0){
      echo $location_and_information['Lat'];
    }
    else{
      echo ','.$location_and_information['Lat'];
    }
    $i=$i+1;
  }
 ?>];

 var lon2=[<?php
$pro = $_POST['projectname'];
$conn=mysqli_connect("localhost", "root","","map");
$sql = "SELECT original_data.Longitude as lon from new2 NATURAL join original_data WHERE DistrictName in (SELECT DISTINCT(DistrictName) from new2 WHERE ProjectName like '".$pro."') and ProjectName not LIKE "."'".$pro."'";
$records=mysqli_query($conn,$sql);
 $i=0;
  while($location_and_information=mysqli_fetch_assoc($records)){
    
    if($i==0){
      echo $location_and_information['lon'];
    }
    else{
      echo ','.$location_and_information['lon'];
    }
    $i=$i+1;
  }
 ?>];
 
 //calculate the points of intersection
var intersectionpoints_lat= [];
var intersectionpoints_lon= [];

   for(i=0;i<lon2.length;i++){

    for(j=0;j<lon2.length;j++){
      calculate(lat[i],lon[i],lat[i+1],lon[i+1],lat2[j],lon2[j],lat2[j+1],lon2[j+1],intersectionpoints_lat,intersectionpoints_lon,j+i*lon2.length); 

    } 
     
   }

for(i=0;i<intersectionpoints_lat.length;i++){

if(intersectionpoints_lat[i]!=null){
  console.log(intersectionpoints_lat[i],intersectionpoints_lon[i]);
	sendIntersectionData(intersectionpoints_lat[i],intersectionpoints_lon[i]);
}

}


}//If END


else{
console.log("Not Present PLease Referesh");
}

}// function END


function mySum(ar,index){
  var sum=0;
  for(i=0;i<index;i++){
    sum = sum + ar[i];
  }
  return sum;

}

function getSum(total, num){

  return total + num;
}


function onSuccess(result) {
  var locations = result.response.view[0].result;
 
  addLocationsToPanel(locations);

}

function onError(error) 
{
 console.log("Not Found")
  alert('Ooops!');
}



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


function addLocationsToPanel(locations){

address = locations[0].location.address;
var District = address.county;
var city = address.city;
var postalcode = address.postalCode;
sendDATA(District,city,postalcode);

 }


function sendIntersectionData(latitude, longitude){
var dataPakage = {
  Latitude : latitude +"",
  Longitude : longitude +"",
};
$.post("dataEntry_IntersectionTable.php",dataPakage);

}
function transferDATA(latitude,longitude,sn){

var dataPakage = {
  UserName: <?php echo "'".$_POST['username']."'" ?>+ "" ,
  Password: <?php echo "'".$_POST['password']."'" ?>+ "" ,
  EmailId:  <?php echo "'".$_POST['email']."'" ?>+ "" ,
  ProjectName: <?php echo "'".$_POST['projectname']."'" ?>+ "",
  SN: sn + "",
  Latitude: latitude + "",
  Longitude: longitude + "",
 };


 $.post("dataEntry3.php",dataPakage);

}

function calculate( p0_x,  p0_y,  p1_x,  p1_y, p2_x,  p2_y, p3_x,p3_y,intersectionpoints_lat,intersectionpoints_lon,index)
{
    var s1_x;
    var s1_y;
    var s2_x;  
    var s2_y;
    var i_x = 0;
    var i_y = 0;
    s1_x = p1_x - p0_x;     
    s1_y = p1_y - p0_y;
    s2_x = p3_x - p2_x;     
    s2_y = p3_y - p2_y;

    var s; 
    var t;
    s = (-s1_y * (p0_x - p2_x) + s1_x * (p0_y - p2_y)) / (-s2_x * s1_y + s1_x * s2_y);
    t = ( s2_x * (p0_y - p2_y) - s2_y * (p0_x - p2_x)) / (-s2_x * s1_y + s1_x * s2_y);

    if (s >= 0 && s <= 1 && t >= 0 && t <= 1)
    {
        // Collision detected
        if (i_x != null)
        {
            i_x = p0_x + (t * s1_x);
            intersectionpoints_lat[index]=i_x;
        }
        if (i_y != null)
        {
            i_y = p0_y + (t * s1_y);
            intersectionpoints_lon[index]=i_y;
        }
        
        
        
        
    }
     // No collision
}


function sendDATA(district,city,postalcode){
//console.log(city);
//console.log(postalcode);
 var dataPakage = {
 	UserName: <?php echo "'".$_POST['username']."'" ?>+ "" ,
  EmailID: <?php echo "'".$_POST['email']."'" ?>+ "" ,
 Radius: <?php echo "'".$_POST['radius']."'" ?>+ "" ,
 ProjectName: <?php echo "'".$_POST['projectname']."'" ?>+ "" , 
  District: district + "",
  City: city + "",
  Postalcode: postalcode + "",
 };
 $.post("dataEntry2.php",dataPakage);

}
save1();
getNeededData();
</script>

</body>
</html>

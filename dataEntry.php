<?php 
  // $random_number = $_POST['UID'];
  $username = $_POST['UserName'];
  $email = $_POST['EmailId'];
  $password = $_POST['Password'];
  $villagename = $_POST['VillageName'];
  $tehsilname = $_POST['TehsilName'];
  $districtname = $_POST['DistrictName'];
  $statename = $_POST['StateName'];
  $lat= $_POST['LAT'];
  $long= $_POST['LONG'];
  $pname=$_POST['ProjectName'];
  $ptname=$_POST['ProjectType'];

  
  $connection=mysqli_connect("localhost", "root","","map");// Establishing Connection with Server..
 
  if (isset($_POST['VillageName'])) {
     $query = mysqli_query($connection,"insert into location_and_information(UserName,Email,Password,ProjectName,ProjectType,VillageName, TehsilName, DistrictName, StateName,Latitude,Longitude) values ('$username','$email','$password','$pname','$ptname','$villagename', '$tehsilname', '$districtname','$statename','$lat','$long')");
  
    
  }
  mysql_close($connection); // Connection Closed
?>



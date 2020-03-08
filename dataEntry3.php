<?php 

  $username = $_POST['UserName'];
  $email = $_POST['EmailId'];
  $password = $_POST['Password'];
  $latitude = $_POST['Latitude'];
  $longitude = $_POST['Longitude'];
  $projectname = $_POST['ProjectName'];
  $SN = $_POST['SN'];
  
  $connection=mysqli_connect("localhost", "root","","map");// Establishing Connection with Server..
 
  if (isset($_POST['UserName'])) {
    
$query=mysqli_query($connection,"insert into original_data(UserName,EmailID,Password,Latitude,Longitude,ProjectName,SerialNumber) values ('$username','$email','$password','$latitude','$longitude','$projectname','$SN')"); 

}
  mysql_close($connection); // Connection Closed
?>

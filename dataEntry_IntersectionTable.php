<?php 
  $latitude = $_POST['Latitude'];
  $longitude = $_POST['Longitude'];  
  $connection=mysqli_connect("localhost", "root","","map");// Establishing Connection with Server..
  if(isset($latitude)){
  $query = mysqli_query($connection,"insert into intersectionpoints(Latitude,Longitude) values ('$latitude','$longitude')"); 
}
  mysql_close($connection); // Connection Closed
?>

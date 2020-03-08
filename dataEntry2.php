<?php 
  $username = $_POST['UserName'];
  $email = $_POST['EmailID'];
  $districtname = $_POST['District'];
  // $countryname = $_POST['Country'];
  // $postalcode = $_POST['PostalCode'];
  // $city = $_POST['City'];
  // $county = $_POST['County'];
  // $street = $_POST['Street'];
  $radius = $_POST['Radius'];
  $projectname = $_POST['ProjectName'];

  
 $connection=mysqli_connect("localhost", "root","","map");// Establishing Connection with Server..
 
  if (isset($_POST['UserName'])) {
    
     $query = mysqli_query($connection,"insert into new2(DistrictName,Radius,ProjectName,UserName) values ('$districtname','$radius','$projectname','$username')"); 
  $query2 = mysqli_query($connection,"delete from village_data");
}
  mysql_close($connection); // Connection Closed
?>

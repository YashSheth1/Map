<?php 
  $name2 = $_POST['V1'];
  $email2 = $_POST['T1'];
  $password2 = $_POST['D1'];
  $contact2 = $_POST['S1'];
  $lat= $_POST['LAT'];
  $long= $_POST['LONG'];
  $pname=$_POST['P1'];
  $ptname=$_POST['PT1'];
  $connection = mysqli_connect("localhost", "root", "","map"); // Establishing Connection with Server..
  // $db = mysqli_select_db("map", $connection);
  echo "yash" ;// Selecting Database
  if (isset($_POST['V1'])) {
  	 $query = mysqli_query($connection,"insert into village(ProjectName,ProjectType,Village, Tehsil, District, State,LAT,LON) values ('$pname','$ptname','$name2', '$email2', '$password2','$contact2','$lat','$long')"); 
  	//$query = mysqli_query($connection,"insert into village(Village, Tehsil, District, State) values ('$name2', '$email2', '$password2','$contact2')"); //Insert Query
  	echo "Form Submitted succesfully";
  }
  mysql_close($connection); // Connection Closed
?>

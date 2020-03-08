<?php 
  // $random_number = $_POST['UID'];
  // $username = $_POST['UserName'];
  // $email = $_POST['EmailId'];
  // $password = $_POST['Password'];
  // $villagename = $_POST['VillageName'];
  // $tehsilname = $_POST['TehsilName'];
  // $districtname = $_POST['DistrictName'];
  // $statename = $_POST['StateName'];
  // $lat= $_POST['LAT'];
  // $long= $_POST['LONG'];
  // $pname=$_POST['ProjectName'];
  // $ptname=$_POST['ProjectType'];

  
  $connection=mysqli_connect("localhost", "root","","map");// Establishing Connection with Server..


   $username = "";
  $email = "";
  if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql_u = "SELECT * FROM location_and_information WHERE UserName='$username'";
    $sql_e = "SELECT * FROM location_and_information WHERE Email='$email'";
    $res_u = mysqli_query($connection, $sql_u);
    $res_e = mysqli_query($connection, $sql_e);

    if (mysqli_num_rows($res_u) > 0) {
      $name_error = "Username already taken";  
    }else if(mysqli_num_rows($res_e) > 0){
      $email_error = "Email Id already Registered, please Login";  
    }else{
          $query = mysqli_query($connection,"insert into location_and_information(UserName,Email,Password) values ('$username','$email','$password')");
           echo 'Saved!';
           exit();
    }
  }
 
  // if (isset($_POST['VillageName'])) {
  //    $query = mysqli_query($connection,"insert into location_and_information(UserName,Email,Password,ProjectName,ProjectType,VillageName, TehsilName, DistrictName, StateName,Latitude,Longitude) values ('$username','$email','$password','$pname','$ptname','$villagename', '$tehsilname', '$districtname','$statename','$lat','$long')");
  
    
  // }
  // mysql_close($connection); // Connection Closed
?>



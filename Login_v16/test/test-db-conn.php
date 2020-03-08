
<?php

$host="localhost";
$user="root";
$password="";
$con=mysqli_connect("localhost","root","","map");
if($con) {
  echo '<h1>Connected to MySQL</h1>';
} else {
   echo '<h1>MySQL Server is not connected</h1>';
}

?>
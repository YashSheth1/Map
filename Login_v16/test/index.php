<?php
	// echo $_POST['username'];
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password_1=$_POST['password_1'];




	$con = mysqli_connect("localhost","root","","map");

	$query = "insert into location_and_information(UserName,Email,Password)values('$username','$email','$password_1')";

	$run = mysqli_query($con,$query);

	if($run == TRUE)
		echo "Data Insert Successfully";
	else
		echo "Error!";

?>

<form action="Maps.php" method="post"  target="_blank">
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Form Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style>

.input100::placeholder { /* Most modern browsers support this now. */
   color:    white;
}
.focus-input100::data-placeholder{
	color: white;
}
.input100{
	color: white;
/*}


.button {
  display: inline-block;
  padding: 10px;
  font-size: 15px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: grey;
  border: none;
  border-radius: 15px;
  box-shadow: 0 2px white;
}


.button:active {
  background-color: grey;
  box-shadow: 0 2px white;
  transform: translateY(4px);
}*/

</style>

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image:url('bg.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Comapany Title
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="Maps.php" method="post" target="_blank">
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="username" id="sample" placeholder=<?php echo $_POST['username']?>+"hi" >
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="Pname" placeholder="Project Name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

						<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="PTname" placeholder="Project Type">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

						<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="Vname" placeholder="Village name">
						<span class="focus-input100" data-placeholder="&#xe82a;" ></span>
					</div>
						<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="Tname" placeholder="Tehsil name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
						<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="Dname" placeholder="District name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

						<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="Sname" placeholder="State Name">
						<span class="focus-input100" data-placeholder="&#xe82a;" ></span>
					</div>
					

					<div class="container-login100-form-btn m-t-32">
						<button  title="Sumit your data" type="submit" onclick="javascript:submission();" style="color: white">
							Submit
						</button>
					</div>

					
				</form>
					<!-- <div class="container-login100-form-btn m-t-32">
				<a href="http://localhost/testing/Login_v16/records_2.php">
   				 <button title="After submitting every location check all Project Locations together" style="color:white">
   				 View Final MAP 
   				 </button>
				</a> 
					</div> -->
					<div class="container-login100-form-btn m-t-32">
				<button   title="After submitting every location check all Project Locations together" style="color:white" onclick="location.href='http://localhost/testing/Login_v16/records_2.php';" type="button">
     			View My Map
     			</button>
     				</div>
     				<div class="container-login100-form-btn m-t-32">
				<button   title="After submitting every location check all Project Locations together" style="color:white" onclick="location.href='http://localhost/testing/Login_v16/ALLMap.php';" type="button">
     			View All Map
     			</button>
     				</div>
     			
			</div>
		</div>
	</div>
	
<script type="text/javascript">

	

var U1=new String(<?php echo $_POST['username'] ?> );
var PW1=new String(<?php echo $_POST['password_1'] ?> );
var E1=new String(<?php echo $_POST['email'] ?> );


function submission(){

//   var n= new String(<?php
//   // Fetching Values From URL
//   $name2 = $_POST['Vname'];
//   $email2 = $_POST['Tname'];
//   $password2 = $_POST['Dname'];
//   $contact2 = $_POST['Sname'];
//   $connection = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server..
//   $db = mysql_select_db("map", $connection); // Selecting Database
//   if (isset($_POST['Vname'])) {
//   $query = mysql_query("insert into form_element(name, email, password, contact) values ('$name2', '$email2', '$password2','$contact2')"); //Insert Query
//   echo "Form Submitted succesfully";
//   }
//   mysql_close($connection); // Connection Closed
//   ?>)
var data = {
	U1: <?php echo $_POST['username'] ?>,
	E1 :<?php echo $_POST['email'] ?>,
	PW1:<?php echo $_POST['password_1'] ?>
};
$.post("dataEntry.php",data);

 
</script>



</script>
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
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
}

</style>

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image:url('bg.jpg'); background-size: cover;">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41" style=" font-family:georgia;">
					Comapany Title
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="Maps.php" method="post" target="_blank">
		
					<div class="wrap-input100 validate-input" >
					<label style="color: white"><strong>USERNAME</strong></label>
						<input readonly class="input100" type="text" name="username" id="sample"  value="'<?php echo $_POST['username'] ?>'">
						<span class="focus-input100" ;"></span>
					</div>

					<div class="wrap-input100 validate-input" >
					<label style="color: white"><strong>EMAIL ID</strong></label>
						<input readonly class="input100" type="text" name="email" id="sample"  value="'<?php echo $_POST['email'] ?>'">
						<span class="focus-input100" ;"></span>
					</div>
					<div class="wrap-input100 validate-input" >
					<label style="color: white"><strong>PASSWORD</strong></label>
						<input readonly class="input100" type="pass" name="password" id="sample"  value="'<?php echo $_POST['password'] ?>'">
						<span class="focus-input100" ;"></span>
					</div>
		
		

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="Pname" placeholder="Enter Project Name"> 
						<span class="focus-input100" ></span>
					</div>

						<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="PTname" placeholder="Enter Project Type" >
						<span class="focus-input100" ></span>
					</div>

						<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="Vname" placeholder="Enter Village name" >
						<span class="focus-input100"  ></span>
					</div>
						<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="Tname" placeholder="Enter Tehsil name" >
						<span class="focus-input100" ></span>
					</div>
						<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="Dname" placeholder="Enter District name" >
						<span class="focus-input100" ></span>
					</div>

						<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="Sname" placeholder="Enter State Name" >
						<span class="focus-input100" ></span>
					</div>
					

					<div class="container-login100-form-btn m-t-32">
						<button  title="Sumit your data" type="submit" style="color: white">
							Submit
						</button>
					</div>

						<div class="container-login100-form-btn m-t-32">
				<button   title="After submitting every location check all Project Locations together" style="color:white" onclick="location.href='http://localhost/testing/login_v16/test/Test_File.php';" type="button">
     			Upload
     			</button>
     				</div>
					
				</form>
     				<div class="container-login100-form-btn m-t-32">
				<button   title="After submitting every location check all Project Locations together" style="color:white" onclick="location.href='http://localhost/testing/Login_v16/ALLMap.php';" type="button">
     			View All Map
     			</button>
     				</div>
     			
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>
	

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
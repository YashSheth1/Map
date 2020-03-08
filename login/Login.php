<?php include('process.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" type="text/css" href="styleLogin.css">
<style type="text/css">
	p{
		text-align: center;
	}
</style>
</head>
<body>
	

<form method="post" action="index.php" id="register_form">
<h1>Login</h1>
	<div >
	
	<input type="text" name="username"  placeholder="Username">
	</div>
	<!-- <div class="input-group">
	<label>Email</label>
	<input type="text" name="email">
	</div>  -->
	<div >
	
	<input type="text" name="password" placeholder="Password">
	</div>
	<!-- <div class="input-group">
	<label>Confirm Password</label>
	<input type="text" name="password_2">
	</div> -->
	<div>

	<button  class="button" title="Once submitted data will be saved" type="submit" id="reg_btn" onclick="javascript:submission();">Login</button>
	</div>
	<p >
		Not yet a member?<a href="register.php">Sign Up</a>
	</p>
	</form>

</form>



</body>
</html>

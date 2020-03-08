<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" type="text/css" href="stylelogin.css">
</head>
<body>
	<div class="header">
	<h2>Login</h2>
</div>

<form method="post" action="index.php">
	<div class="input-group">
	<label>UserName</label>
	<input type="text" name="username">
	<!-- </div>
	<div class="input-group">
	<label>Email</label>
	<input type="text" name="email">
	</div> -->
	<div class="input-group">
	<label>Password</label>
	<input type="text" name="password_1">
	</div>
	<!-- <div class="input-group">
	<label>Confirm Password</label>
	<input type="text" name="password_2">
	</div> -->
	<div class="input-group">

	<button  class="button" title="Once submitted data will be saved" type="submit"  onclick="javascript:submission();">Login</button>
	</div>
	<p>
		Not yet a member?<a href="Register.php">Sign Up</a>
	</p>
	</form>

</form>



</body>
</html>


<!DOCTYPE html>
<html>
<head>
<title>Register Page</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Register</h2>
</div>
<form method="post" action="index.php">

	<div class="input-group">
			<label>Username</label>
			<input type="text" id="first" required="" name="username">
	</div>
	<div class="input-group">
			<label>Email</label>
			<input type="text"  required="" name="email">
	</div>
	<div class="input-group">
			<label>Password</label>
			<input type="password" required="" name="password_1">
	</div>
	<!-- <div class="input-group">
			<label>UserId</label>
			<input type="text" id="first"  value="'<?php echo $_POST['random_number'] ?>'" name="random_number">
	</div> -->
	<center>
	<div class="input-group">
			<button  class="button" title="Once submitted data will be saved" type="submit">
			Register
			</button>
	</div>
	</center>
	<div class="sign-in">
	<p style="text-align: right;">
		Already a member?<a href="Login.php">Sign In</a>
	</p>
	</div>
	</form>
<script type="text/javascript">
		
var UID=new String(<?php echo $_POST['random_number'] ?>);
function submission(){
var data = {
	UID: <?php echo $_POST['username'] ?>
	};
$.post("dataEntry.php",data);
}
</script>



</body>
</html>

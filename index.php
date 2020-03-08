
 <?php include('process.php') ?>
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
<form method="post" action="calculate.php">

	<div class="input-group">
			<label>Username</label>
	<div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
	  <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
	  <?php if (isset($name_error)): ?>
	  	<span><?php echo $name_error; ?></span>
	  <?php endif ?>
  	</div>
	</div>
	<div class="input-group">
			<label>Email</label>
			<div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
      <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
      <?php if (isset($email_error)): ?>
      	<span><?php echo $email_error; ?></span>
      <?php endif ?>
  	</div>
	<div class="input-group">
			<label>Password</label>
			<input type="password" required="" name="password" pattern=".{1,}">
	</div>
	<div class="input-group">
			<label>Project Name</label>
			<input type="text" required="" name="projectname" placeholder="Project Name">
	</div>
	<div class="input-group">
			<label>Radius</label>
			<input type="text" required="" name="radius" placeholder="Radius" >
	</div>


	<center>
	<div class="input-group">
			<button  class="button" name="register" title="Once submitted data will be saved" type="submit">
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

<form method="post" action="ALLMap2.php">
<div class="input-group">
			<button  class="button" name="See Map" title="See Map" type="submit">
			See Map
			</button>
	</div>
</form>	
<script type="text/javascript">
	
	function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }

        return true;

}


</script>


</body>
</html>

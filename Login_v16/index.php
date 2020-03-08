

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
<form method="post" action="Intermediate_Form.php">

	<div class="input-group">
			<label>Username</label>
			<input type="text"  required="" name="username" pattern=".{8,}">
	</div>
	<div class="input-group">
			<label>Email</label>
			<input type="text"  required="" name="email" onblur="validateEmail(this);">
	</div>
	<div class="input-group">
			<label>Password</label>
			<input type="password" required="" name="password" pattern=".{8,}">
	</div>
	<!--          <div class="input-group">
			<label>Project Name</label>
			<input type="text"  required="" name="Pname" >
	</div>
	<div class="input-group">
			<label>Project Type</label>
			<input type="text"  required="" name="PTname" >
	</div>
	<div class="input-group">
			<label>Village Name</label>
			<input type="text"   name="Vname" >
	</div>
	<div class="input-group">
			<label>Tehsil Name</label>
			<input type="text"   name="Tname">
	</div>                                                                                                                                                       
	<div class="input-group">
			<label>District Name</label>
			<input type="text"   name="Dname">
	</div>
	<div class="input-group">
			<label>State Name</label>
			<input type="text"   name="Sname" >
	</div>

 -->

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

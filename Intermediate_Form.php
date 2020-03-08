

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
<form method="post" action="TryForm.php">

	<div class="input-group">
			<label style="color: white"><strong>USERNAME</strong></label>
						<input readonly  type="text" name="username" id="sample"  value="'<?php echo $_POST['username'] ?>'">
	</div>
	<div class="input-group">
			<label style="color: white"><strong>EMAIL ID</strong></label>
						<input readonly  type="text" name="email" id="sample"  value="'<?php echo $_POST['email'] ?>'">
	</div>
	<div class="input-group">
			<label style="color: white"><strong>PASSWORD</strong></label>
						<input readonly class="input100" type="pass" name="password" id="sample"  value="'<?php echo $_POST['password'] ?>'">
</div>
	<center>
	<div class="input-group">
			<button  class="button" title="Once submitted data will be saved" type="submit">
			Fill Places Individually
			</button>
	</div>
	<div class="input-group">
			<button  class="button" title="Once submitted data will be saved" type="button" style="color:white" onclick="location.href='http://localhost/testing/Login_v16/test/Test_File.php';">
			Upload EXCEL SHEET
			</button>
	</div>
	<div class="input-group">
			<button  class="button" title="Once submitted data will be saved" type="button" style="color:white" onclick="location.href='http://localhost/testing/Login_v16/Find_Address.php';">
			Save Excel DATA
			</button>
	</div>
	</center>
	
	</form>



</body>
</html>

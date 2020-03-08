

<!DOCTYPE html>
<html>
<head>
<title>Register Page</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Company Title</h2>
</div>
<form method="post" action="Maps.php" target="_blank">

	<div class="input-group">
			<label style="color: white"><strong>USERNAME</strong></label>
						<input readonly  type="text" name="username" id="sample"  value="<?php echo $_POST['username'] ?>">
	</div>
	<div class="input-group">
			<label style="color: white"><strong>EMAIL ID</strong></label>
						<input readonly  type="text" name="email" id="sample"  value="<?php echo $_POST['email'] ?>">
	</div>
	<div class="input-group">
			<label style="color: white"><strong>PASSWORD</strong></label>
						<input readonly class="input100" type="pass" name="password" id="sample"  value="<?php echo $_POST['password'] ?>">
	</div>

<div class="input-group">
			<label style="color: white"><strong>ProjectName</strong></label>
						<input   type="text" name="Pname" id="sample"  value="<?php echo $_POST['projectname'] ?>"" >
	</div>
	<div class="input-group">
			<label style="color: white"><strong>Radius</strong></label>
						<input   type="text" name="Pname" id="sample"  value="<?php echo $_POST['radius'] ?>"" >
	</div>
	<div class="input-group">
			<label style="color: white"><strong>ProjectType</strong></label>
						<input   type="text" name="PTname" id="sample" placeholder="Enter Project Type" >
	</div>
	<div class="input-group">
			<label style="color: white"><strong>VillageName</strong></label>
						<input  class="input100" type="text" name="Vname" id="sample" placeholder="Enter Village Name" >

						<div class="input-group">
			<label style="color: white"><strong>TehsilName</strong></label>
						<input   type="text" name="Tname" id="sample" placeholder="Enter Tehsil Name"  >
	</div>
	<div class="input-group">
			<label style="color: white"><strong>DistrictName</strong></label>
						<input   type="text" name=Dname id="sample" placeholder="Enter District Name"  >
	</div>
	<div class="input-group">
			<label style="color: white"><strong>StateName</strong></label>
						<input  class="input100" type="text" name="Sname" id="sample"  placeholder="Enter State Name" >

	<center>
	<div class="input-group">
			<button  title="Sumit your data" type="submit" style="color: white">
							Submit
						</button>


	</div>
	<div class="input-group">
			<button   title="After submitting every location check all Project Locations together" style="color:white" onclick="location.href='ALLMap2.php';" type="button">
     			View All Map
     			</button>

	</div>

	</center>
	
	</form>

</body>
</html>

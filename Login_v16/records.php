<?php

//make connection to db
$conn=mysqli_connect('localhost','root','','map');

//select db
// mysqli_select_db('map');
$sql="SELECT * FROM location_and_information";

$records=mysqli_query($conn,$sql);

?>
<html>

<head>
<title>Project Data</title>
</head>
<body>

	<table width="600" border="1" cellpadding="1" cellspacing="1">

	<tr>
	<th>ProjectName</th>
	<th>ProjectType</th>
	<th>VillageName</th>
	<th>TehsilName</th>
	<th>DistrictName</th>
	<th>StateName</th>
	<th>Latitude</th>
	<th>Longitude</th>


	</tr>
<?php
		while($location_and_information=mysqli_fetch_assoc($records)){

		 echo "<tr>";

		 echo"<td>".$location_and_information['ProjectName']."</td>";
		  echo"<td>".$location_and_information['ProjectType']."</td>";

 echo"<td>".$location_and_information['VillageName']."</td>";

 echo"<td>".$location_and_information['TehsilName']."</td>";

 echo"<td>".$location_and_information['DistrictName']."</td>";

 echo"<td>".$location_and_information['StateName']."</td>";

 echo"<td>".$location_and_information['Latitude']."</td>";

 echo"<td>".$location_and_information['Longitude']."</td>";

		 echo"</tr>";
		}//end while

?>



	</table>

</body>
</html>
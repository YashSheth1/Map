<?php
$projectname = $_POST['projectname'];

$conn=mysqli_connect("localhost", "root","","map");
$sql="SELECT DISTINCT ProjectName as P,Postalcode as PC,City as C,DistrictName as D FROM new2 where ProjectName = '$projectname'";
$resultt=mysqli_query($conn,$sql);
$filename = 'users.csv';
// file creation
$file = fopen($filename,"w");
  
// for ($i = 0; $i < mysql_num_fields($resultt); $i++) {
// echo mysql_field_name($resultt,$i) . "\t";
// }
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=".$filename);
header("Content-Type: application/csv; "); 
$i=0;
$sep=",";
echo "Project Name".$sep."City".$sep."District".$sep."Postalcode\n";
while($ans=mysqli_fetch_assoc($resultt)){ 
            echo $ans['P'].$sep.$ans['C'].$sep.$ans['D'].$sep.$ans['PC']."\t\n";
            $i=$i+1;
}die();


fclose($file);

// download


readfile($filename);

// deleting file
unlink($filename);
exit();

 ?>
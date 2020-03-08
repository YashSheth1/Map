<?php
$conn = mysqli_connect("localhost","root","","map");
require_once('C:\xampp\htdocs\testing\Login_v16\test\php-excel-reader\excel_reader2.php');
require_once('C:\xampp\htdocs\testing\Login_v16\test\SpreadsheetReader.php');

if (isset($_POST["import"]))
{
       
  $allowedFileType = ['application/vnd.ms-excel','text/csv','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $SerialNumber= "";
                if(isset($Row[0])) {
                    $SerialNumber = mysqli_real_escape_string($conn,$Row[0]);
                }
                
                $latitude = "";
                if(isset($Row[1])) {
                    $latitude = mysqli_real_escape_string($conn,$Row[1]);
                }

                 $longitude = "";
                if(isset($Row[2])) {
                    $longitude = mysqli_real_escape_string($conn,$Row[2]);
                }
                
                if (!empty($SerialNumber) || !empty($latitude)) {
                    $query = "insert into village_c(SerialNumber,Latitude,Longitude) values('".$SerialNumber."','".$latitude."','".$longitude."')";
                    $result = mysqli_query($conn, $query);
                
                    if (! empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
}
?>
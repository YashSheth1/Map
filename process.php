<?php 
  $db = mysqli_connect("localhost", "root","","map");
  $username = "";
  $email = "";
  if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
  
    
    $sql_u = "SELECT * FROM new2 WHERE UserName='$username'";
    $sql_e = "SELECT * FROM new2 WHERE EmailID='$email'";
    $res_u = mysqli_query($db, $sql_u);
    $res_e = mysqli_query($db, $sql_e);

    if (mysqli_num_rows($res_u) > 0) {
      $name_error = "Username already taken";  
    }else if(mysqli_num_rows($res_e) > 0){
      $email_error = "Email Id already Registered, please Login";  
    }else{
           $query = "INSERT INTO new2 (UserName, EmailID, Password) 
                VALUES ('$username', '$email', '$password')";
           $results = mysqli_query($db, $query);
           echo 'Saved!';
            exit();
               }
  }
?>

          
 